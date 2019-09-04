<?php
require('includes/config.php');
require('includes/functions.php');
require('includes/db_connection.php');

//This script initiates payment using the details gotten from the payment page.
//It calls the Flutterwav Rave API with some options (see below), processes payment & returns a response

if (!isset($_GET['user']) || !isset($_GET['email']) || !isset($_GET['amount']) || !isset($_GET['firstname']) || !isset($_GET['lastname'])) {

  //if any of the required details is missing, we redirect back to the homepage.
  header('Location: index.php');
  exit(0);
}

$userId = (int) $_GET['user']; //cast to integer / number
$email = $_GET['email'];
$amount = (int) $_GET['amount']; //cast to integer / number
$first_name = $_GET['firstname'];
$last_name = $_GET['lastname'];

$reference = generateRef($userId); //this function generate a unique transaction reference for the payment. (requred by flutterwave)

$redirectUrl = $baseUrl . '/process_payment.php'; //the ourl / link to redicrect to after payment

$curl = curl_init();

$customer_email = $email;
$currency = "NGN";
$txref = $reference; //unique references for transaction.
$PBFPubKey = $flutterWavePublicKey; //FlutterWave Public Key
// $first_name = 'Jude';
// $last_name = 'Jonathan';
$logo = $baseUrl . '/images/logo.png';
$button = 'Donate';
$title = 'VolunteerNG';



curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount' => $amount,
    'customer_email' => $customer_email,
    'customer_firstname' => $first_name,
    'customer_lastname' => $last_name,
    'customer_logo' => $logo,
    'pay_button_text' => $button,
    'custom_title' => $title,
    'currency' => $currency,
    'txref' => $txref,
    'PBFPubKey' => $PBFPubKey,
    'redirect_url' => $redirectUrl

  ]),
  CURLOPT_HTTPHEADER => [
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if ($err) {
  // there was an error contacting the rave API
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if (!$transaction->data && !$transaction->data->link) {
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}

// redirect to page so Donor can pay
header('Location: ' . $transaction->data->link);
