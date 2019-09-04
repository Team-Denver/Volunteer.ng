<?php

include_once('includes/config.php');
include('includes/db_connection.php');
//Here, we process payment, whether succcessfull or failed and update our databse.


if (isset($_GET['txref'])) {
    $ref = $_GET['txref'];
    $amount = ""; //Correct Amount from Server
    $currency = ""; //Correct Currency from Server

    $query = array(
        "SECKEY" => $flutterWaveSecretKey,
        "txref" => $ref
    );

    $data_string = json_encode($query);

    $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($ch);

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);

    curl_close($ch);

    $resp = json_decode($response, true);

    $paymentStatus = $resp['data']['status'];
    $chargeResponsecode = $resp['data']['chargecode'];
    $chargeAmount = $resp['data']['amount'];
    $chargeCurrency = $resp['data']['currency'];

    //Donor details
    $fullName = $resp['data']['custname'];
    $email = $resp['data']['custemail'];


    //For tests
    // $paymentStatus = '1';
    // $chargeResponsecode = '00';
    // $chargeAmount = '3000';
    // $chargeCurrency = 'NGN';

    // $fullName = 'Jude Jonathan';
    // $email = 'jonathanjude@gmail.com';

    // $txref = '1-VLT_5b6677637';

    if (($chargeResponsecode == "00" || $chargeResponsecode == "0")) {
        // transaction was successful...
        // please check other things like whether you already gave value for this ref
        // if the email matches the customer who owns the product etc
        //Give Value and return to Success page



        //Get User ID from transaction ref
        $uArray = explode('-', $txref);
        $userId = $uArray[0];

        $user_query = mysqli_query($con, "SELECT * FROM users WHERE user_id = '$userId'") or die(mysqli_error($con));
        $row = mysqli_fetch_array($user_query);

        //Get total donations for user
        $user_donation_query = mysqli_query($con, "SELECT SUM(amount) as totalDonations FROM donations WHERE user_id = '$userId'") or die(myslqli_error($con));
        $donation_row = mysqli_fetch_array($user_donation_query);

        $totalDonations = $donation_row['totalDonations'];
        $sum = $totalDonations + $chargeAmount;
        $neededAmount = $row['donation_amount'];


        if ($sum >= $neededAmount) {
            //Funding already gotten, update to completed!
            mysqli_query($con, "UPDATE users SET is_completed = 1 WHERE user_id = '$userId'") or die(myslqli_error($con));
        }

        //query db and add new donation
        $queryDB = mysqli_query($con, "INSERT INTO donations SET status = 'Successful', transaction_ref = '$txref', amount = '$chargeAmount', user_id = '$userId', email_of_donor = '$email', name_of_donor = '$fullName'") or die(mysqli_error($con));
        if ($queryDB) {

            //TODO: Redirect to payment success page
            echo "<script type='text/javascript'>document.location='success-page-index.html'</script>";

            exit(0);
        } else {

            echo "<script type='text/javascript'>document.location='success-page-index.html'</script>";

            exit(0);
        }
    } else {
        //Trasanction failed

        echo "<script type='text/javascript'>document.location='failed-page-index.html'</script>";
        exit(0);
    }
} else {

    echo "<script type='text/javascript'>alert('No Transaction Ref provided')</script>";
    echo "<script type='text/javascript'>document.location='failed-page-index.html'</script>";
    // header('Location: index.php');
}
