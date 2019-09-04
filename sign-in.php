<?php
session_start();

require('includes/db_connection.php');
include('includes/functions.php');


if (isset($_POST['login'])) {
    $email_unsafe = $_POST['email'];
    $pass_unsafe = $_POST['password'];

    $email = mysqli_real_escape_string($con, $email_unsafe);
    $password = mysqli_real_escape_string($con, $pass_unsafe);

    //Query DB for details
    $check_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die(mysqli_error($con));
    $count = mysqli_num_rows($check_query);

    if ($count == 0) {
        //Display Error here
        echo "<script type='text/javascript'>alert('Invalid Details Provided')</script>";
        echo "<script type='text/javascript'>
    document.location = 'login.php'
</script>";
    } else {
        //process login here

        $user = mysqli_fetch_array($check_query);
        $isUserActive = $user['is_active'];
        $userId = $user['user_id'];
        $userFullName = $user['name'];

        $_SESSION['user_id'] = $userId;
        $_SESSION['name'] = $userFullName;

        //Redirect to User Dashboard
        echo "<script type='text/javascript'>alert('You Successfully Logged in')</script>";
        echo "<script type='text/javascript'>
    document.location = 'dashboard.php'
</script>";
        exit(0);
    }
}


//Sign Up
if (isset($_POST['signup'])) {
    $email_unsafe = $_POST['email'];
    $pass_unsafe = $_POST['password'];
    $pass_conf_unsafe = $_POST['password_confirmation'];
    $name_unsafe = $_POST['name'];
    $title_unsafe = $_POST['title'];
    $desc_unsafe = $_POST['desc'];
    $amount_unsafe = $_POST['amount'];

    $email = mysqli_real_escape_string($con, $email_unsafe);
    $password = mysqli_real_escape_string($con, $pass_unsafe);
    $password_confirmation = mysqli_real_escape_string($con, $pass_conf_unsafe);
    $name = mysqli_real_escape_string($con, $name_unsafe);
    $title = mysqli_real_escape_string($con, $title_unsafe);
    $desc = mysqli_real_escape_string($con, $desc_unsafe);
    $amount = mysqli_real_escape_string($con, $amount_unsafe);

    //Query DB for details
    $user_check_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'") or die(mysqli_error($con));
    $count = mysqli_num_rows($user_check_query);

    if ($count > 0) {
        //Display Error here

        echo "<script type='text/javascript'>alert('Email address already exists')</script>";
        echo "<script type='text/javascript'>document.location='sign-in.php'</script>";
        exit(0);
    } elseif ($password != $password_confirmation) {

        echo "<script type='text/javascript'>alert('Passwords dont Match')</script>";
        echo "<script type='text/javascript'>document.location='sign-in.php'</script>";
        exit(0);
    } elseif (!validateEmail($email)) {

        echo "<script type='text/javascript'>alert('Invalid Email address')</script>";
        echo "<script type='text/javascript'>document.location='sign-in.php'</script>";
        exit(0);
    } else {
        //process registration here

        $result = mysqli_query($con, "INSERT INTO users SET name= '$name', email = '$email', password = '$password', title = '$title', description = '$desc', donation_amount = '$amount'") or die(mysqli_error($con));

        if ($result) {
            echo "<script type='text/javascript'>alert('Welcome to Volunteer! Kindly Sign In to begin')</script>";
            echo "<script type='text/javascript'>document.location='sign-in.php'</script>";
        } else {
            echo "<script type='text/javascript'>alert('Something went wrong! Conteact volunteerng@gmail.com')</script>";
            echo "<script type='text/javascript'>document.location='sign-in.php'</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Volunteer NG | Sign In / Sign Up</title>
    <link rel="stylesheet" href="./css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/all.min.css" rel="stylesheet" />
    <link rel="icon" href="images/favicon.ico" sizes="16x16" type="image/png" />
</head>

<link rel="stylesheet" href="./css/sign-in.css">

<body>

    <head>
        <div class="container">
            <div class="form-container sign-up-container">
                <form action="" method="POST">
                    <!--Signup-->
                    <h2>Create Account</h2>
                    <!-- <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div> -->
                    <span>Enter Information about your cause</span>
                    <!--<input type=" " placeholder="Reason for Donation" />-->
                    <!-- <select name="cars" required>
                        <option value="Individual">Individual</option>
                        <option value="Organization">Organization</option>
                    </select> -->
                    <input type="text" name="name" placeholder="Full Name" required />
                    <input type="email" name="email" placeholder="Email" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
                    <input type="text" name="title" placeholder="Title" required />
                    <input type="text" name="desc" placeholder="What you need?" required />
                    <input type="number" name="amount" placeholder="Amount Needed" required />
                    <button type="submit" name="signup">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="" method="POST">
                    <!--SignIn-->
                    <h1>Sign in</h1>
                    <!-- <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div> -->
                    <span>or use your account</span>
                    <input type="email" name="email" placeholder="Email" />
                    <input type="password" name="password" placeholder="Password" />
                    <button type="submit" name="login">Sign In</button>
                </form>
            </div>
            <!--Signup Message-->
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome to Volunteer.Ng!</h1>
                        <!--Default message shuffles different words when signup button is clicked.-->
                        <p id="change">About 80 percent of Small and Medium Enterprises, SMEs, in Nigeria fail within
                            the first five
                            years of their existence due to lack of experience and other wrong business practices.
                            Do you need a capable and professional hand willing to volunteer for a project?</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <!--Sign Up-->
                    <div class="overlay-panel overlay-right">
                        <h1>Welcome Back to Volunteer.Ng!</h1>
                        <p>To stay connected with us please login with your personal info</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
            <script src="js/volunteerng-sign-in.js"></script>
        </div>

</body>

</html>