<!DOCTYPE html>
<html lang="en">

<?php
$pageTitle = 'Home';
include('includes/head.php');
?>

<body>
    <!-- Include Top Nav & Header files -->
    <?php
    include('includes/header.php');
    ?>

    <!-- Main -->
    <section id="main">
        <div class="container">
            <h1>You can make a difference!</h1>
            <p>Commited to making the World a better place for Everyone</p>
            <p>

                <a href="entities.php" class="main_link_button">
                    <i class="fa fa-heart white-fa"></i> Donate</a>
                <a href="sign-in.php" class="main_link_button">
                    <i class="fas fa-hand-holding-heart white-fa"></i> I Need a Volunteer</a>
            </p>
        </div>
    </section>

    <!-- How you can Help -->

    <section>
        <div class="u-center-text u-margin-top-small">
            <h1 class="heading-secondary">How You Can Help</h1>
        </div>
        <div class='page-wrapper'>
            <div class='row  u-margin-top-small'>
                <div class='column'>
                    <div class='col-1-of-3'>
                        <img src="images/coin.svg" alt="coin" class="help-image">
                        <h2 class="heading-tertiary u-margin-top-small u-margin-bottom-small">Give Donation</h2>
                        <p class="help-text">
                            Lorem ipsum dolor adipisicing elit. Onnumquam reiciendisexplicabo consequatur, at excepturi
                            tempore itaque odio omnis unde? Placeat voluptatum temporibus sint excepturi!
                        </p>
                        <a href="entities.php" class="donate-button">Donate</a>
                    </div>
                </div>
                <div class='column'>
                    <div class='col-2-of-3'>
                        <img src="images/giftbox.svg" alt="giftbox" class=" help-image">
                        <h2 class="heading-tertiary  u-margin-top-small u-margin-bottom-small">Give Material</h2>
                        <p class="help-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.cum, facere velit repellendus sequi!
                            In
                            hic accusamus repellendus tenetur eos nostrum illo? Eaque.
                        </p>
                        <a href="material-gift.html" class="donate-button">Donate</a>
                    </div>
                </div>
                <div class='column'>
                    <div class='col-3-of-3'>
                        <img src="images/customer.svg" alt="customer" class="help-image">
                        <h2 class="heading-tertiary u-margin-top-small u-margin-bottom-small">Give Service</h2>
                        <p class="help-text">
                            Lorem ipsum dolor sit amet consectetur excepturi quae sapiente numquam error deserunt, hic
                            minus
                            et iure, obcaecati eaque quam velit voluptatibus labore. Adipisci?
                        </p>
                        <a href="render-a-service.html" class="donate-button">Donate</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What we Do -->
    <section id="what-we-do">
        <div class="container">
            <h1>What we Do</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi
                augue, viverra sit amet ultricies
            </p>
        </div>
    </section>

    <!-- Our Cause -->

    <section id="boxes">
        <div class="container">
            <h2 style="text-align: center">Our Cause</h2>
            <div class="box">
                <img src="./images/education.jpg" />
                <h3>Feed the Hungry</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi
                    augue, viverra sit amet ultricies
                </p>
                <br />
                <div class="box-bottom-text">
                    <span class="goal-text"><b>Goal: N10,000</b></span>
                    <span class="raised-text"><b>Raised: N1,000</b></span>
                </div>
                <div style="clear: both"></div>
            </div>
            <div class="box">
                <img src="./images/disaster.jpg" />
                <h3>Provide Clean Water</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi
                    augue, viverra sit amet ultricies
                </p>
                <br />
                <div class="box-bottom-text">
                    <span class="goal-text"><b>Goal: N10,000</b></span>
                    <span class="raised-text"><b>Raised: N1,000</b></span>
                </div>
                <div style="clear: both"></div>
            </div>
            <div class="box">
                <img src="./images/medical_care.jpg" />
                <h3>Medical Care</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi
                    augue, viverra sit amet ultricies
                </p>
                <br />
                <div class="box-bottom-text">
                    <span class="goal-text"><b>Goal: N10,000</b></span>
                    <span class="raised-text"><b>Raised: N1,000</b></span>
                </div>
                <div style="clear: both"></div>
            </div>
        </div>
    </section>

    <br><br>
    <h1 style="text-align: center">Our Sponsors</h1> <br>
    <div class="sponsors">
        <div class="col-4">
            <img src="images/flutterwave.png" width="70%">
        </div>
        <div class="col-4">
            <img src="images/hng.png" width="70%">
        </div>
        <div class="col-4">
            <img src="images/start_ng.png" width="70%">
        </div>
    </div>

    <!-- Include Footer -->
    <?php
    include('includes/footer.php');
    ?>

</body>

</html>