<?php

$userId = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = 'Money Donation';
include('includes/head.php');
?>
<link rel="stylesheet" href="./css/render.css" />


<body>
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

    <!-- Top-Most Nav Starts Here -->

    <!-- Second Nav starts here -->
    <!-- Header -->
    <header>
        <div class="container">
            <div id="branding">
                <a href="index.html">
                    <img src="images/logo.png" alt="VolunteerNG logo" width="165" height="70" />
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="entities.php">Entities</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="team.php">The Team</a></li>
                    <li class="auth_button">
                        <a href="sign-in.php"> <i class="fa fa-user" style="color: white"></i>
                            Sign In | Sign Up</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>



    <!--inputted code here-->
    <a href="">
        <h2 id="render"><u>Mon</u>ey Donation</h2>
    </a><br />
    <div id="container">

        <div class="how">How do you wish to <a href="">donate?</a></div>
        <a href="make-payment.html">
            <div id="midmenuwhite"> <i class="fa fa-money-bill"></i> Money Donations</div>
        </a>
        <a href="render-a-service.html">
            <div class="midmenugreen"> <i class="fas fa-hand-holding-heart  white-fa"></i> Render A Service
            </div>
        </a>
        <a href="material-gift.html">
            <div class="midmenugreen"> <i class="fa fa-gift white-fa"></i> Material Gift</div>
        </a>
        <div class="break"></div>

        <div id="tohelp"> <strong> Your Information</strong></div>


        <form method="GET" action="pay.php">
            <input type="hidden" name="user" aaction="<?php echo $userId ?>">
            <div class="contactmenu">First Name <br />
                <input type="text" name="firstname" placeholder="First Name" required /></div>
            <div class="contactmenu">Last Name <br />
                <input type="text" name="lastname" placeholder="Last Name" required /></div>


            <div class="break"></div>
            <div class="number">Email <br />
                <input type="email" name="email" placeholder="Email" required /></div>
            <div class="number">Phone Number <br />
                <input type="number" name="phone" placeholder="Phone Number" /></div>

            <div class="break"></div>
            <div class="number">Dedicate donation in honour this Person (optional) <br />
                <input type="text" placeholder="Full Name of Person" /></div>
            <div class="number">Amount to Donate <br />
                <input type="number" name="amount" placeholder="Amount" required /></div>

            <div class="break"></div>
            <div class="service">Message</div>
            <div class="othersinput">
                <input type="text" placeholder="Leave a Message" />
            </div>


            <div class="pay-button-container">
                <button type="submit" class="pay-button">Make Payment</button>
            </div>
        </form>

        <br>
        <div class="pay-button-container">
            <img src="images/trusted_by_flutterwave.png" alt="Flutterwave donation channel">
        </div>
        <!--I dont know how "RECAPTCHA" works-->


    </div>



    </div>


    </div>


    </div>
    <footer>
        <div class="footer">
            <div class="col-3">
                <img src="images/volunteerNG green background-01png" alt="VolunteerNG logo" height="100" width="130"> <br>
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