<?php
session_start();

require('includes/db_connection.php');
include('includes/functions.php');


$query = mysqli_query($con, "SELECT * FROM users") or die(mysqli_error($con));
$count = mysqli_num_rows($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Volunteer NG | Entities</title>
    <link rel="stylesheet" href="./css/team.css" />
    <link rel="stylesheet" href="./css/signup.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link href="./css/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="./css/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="./css/fontawesome/css/solid.css" rel="stylesheet" />
    <link rel="icon" href="images/favicon.ico" sizes="16x16" type="image/png" />
</head>

<body>
    <!-- Top Header -->

    <!-- Top-Most Nav Starts Here -->
    <div class="topmost-nav">
        <div class="left col-3">
            <a href=""><i class="fab fa-facebook"></i> </a> &nbsp; &nbsp; &nbsp;
            <a href=""><i class="fab fa-instagram"></i> </a> &nbsp; &nbsp; &nbsp;
            <a href=""><i class="fab fa-twitter"></i> </a> &nbsp; &nbsp; &nbsp;
            <a href=""><i class="fab fa-youtube"></i> </a> &nbsp; &nbsp; &nbsp;
        </div>
        <div class="right col-6">
            <a href="tel:7071234567"><i class="fa fa-phone"></i> +234 7071234567</a>
            <a href="mailto:volunteerng@gmail.com"><i class="fa fa-envelope"></i> volunteerng@gmail.com</a>
        </div>
    </div>

    <!-- Header -->
    <header>
        <div class="container">
            <div id="branding">
                <a href="index.php">
                    <img src="images/logo.png" width="165" height="70" alt="Volunteer.ng Logo" />
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li class="current"><a href="entities.php">Entities</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="team.php">The Team</a></li>
                    <li class="auth_button">
                        <a href="sign-in.php"> <i class="fa fa-user"></i>
                            Sign In | Sign Up</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <div style="float: center">
            <h1>Entities</h1>
            <div class="horizontalLine2"></div>
        </div>

        <br><br>

        <?php

        if ($count == 0) {
            echo "<h1>No Enitity Yes!</h1>";
        } else {
            while ($row = mysqli_fetch_array($query)) {
                $userId = $row['user_id'];
                //Get total donations for user
                $user_donation_query = mysqli_query($con, "SELECT SUM(amount) as totalDonations FROM donations WHERE user_id = '$userId'") or die(myslqli_error($con));
                $donation_row = mysqli_fetch_array($user_donation_query);

                $donations = $donation_row['totalDonations'];
                ?>

                <div class="shadow">
                    <div class="entity">
                        <div class="col-2">
                            <img src="images/avatar.png">
                        </div>
                        <div class="col-10">
                            <span class="entity-text"> <?php echo $row['name'] ?> </span> <br>
                            <span class="entity-text"> <?php echo $row['title'] ?> </span>
                            <br>
                            <span class='entity-text-green'> <?php echo $row['type'] ?> </span>
                        </div>
                    </div>

                    <span class="entity-text-desc">
                        <?php echo $row['description'] ?>
                    </span>

                    <div class="entity-bottom-text">
                        <span class="entity-goal-text"><b>Goal: N<?php echo $row['donation_amount'] ?></b></span>
                        <span class="entity-raised-text"><b>Raised: <?php echo $donations == '' || $donations == 0 ? 'Nothing' : 'N' . $donations ?></b></span>
                    </div>
                    <br>
                    <div class="entity-donate-button">
                        <a href="make-payment.php?id=<?php echo $row['user_id'] ?>">Donate Now</a>
                    </div>
                </div>

        <?php }
        }

        ?>


    </div>




    <footer>
        <div class="footer">
            <div class="col-3">
                <img src="./images/volunteerNG_white_full.png" height="100" width="130"> <br>
                <a href=""><i class="fa fa-phone"></i>+234 7071234567</a>
                <a href=""><i class="fa fa-envelope"></i>volunteerng@gmail.com</a>
                <a href=""><i class="fas fa-map-marker"></i>Find Us</a>
            </div>
            <div class="col-3">
                <h3>Donations</h3>
                <ul>
                    <li><i class="fas fa-arrow-right"></i>&nbsp; Food Donation</li>
                    <li><i class="fas fa-arrow-right"></i>&nbsp; Money Donation</li>
                    <li><i class="fas fa-arrow-right"></i>&nbsp; Water Supply</li>
                    <li><i class="fas fa-arrow-right"></i>&nbsp; Outfit Donation</li>
                    <li><i class="fas fa-arrow-right"></i>&nbsp; Food Item Donation</li>
                    <li><i class="fas fa-arrow-right"></i>&nbsp; Medical Donations</li>
                </ul>
            </div>
            <div class="col-3">
                <h3>Quick Links</h3>
                <ul>
                    <li><i class="fas fa-arrow-right"></i>&nbsp; Our Team</li>
                    <li><i class="fas fa-arrow-right"></i>&nbsp; Testimonies</li>
                    <li><i class="fas fa-arrow-right"></i>&nbsp; Gallery</li>
                    <li><i class="fas fa-arrow-right"></i>&nbsp; About Us</li>
            </div>
            <div>
                <h3>Stay Updated</h3>
                <span>Subscribe to our newsletter</span>
                <div class="input-field">
                    <form>
                        <input type="text">
                        <span class="submit"><i class="fas fa-arrow-right"></i></span>
                    </form>
                </div>
                <div class="inline">
                    <a href=""><i class="fab fa-facebook"></i> </a> &nbsp; &nbsp;
                    <a href=""><i class="fab fa-instagram"></i> </a> &nbsp; &nbsp;
                    <a href=""><i class="fab fa-twitter"></i> </a> &nbsp; &nbsp;
                    <a href=""><i class="fab fa-youtube"></i> </a> &nbsp; &nbsp;
                </div>
            </div>
        </div>
    </footer>

</body>

</html>