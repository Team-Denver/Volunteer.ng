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
                        <img src="images/coin.svg" alt="Donation coin" class="help-image">
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
                        <img src="images/giftbox.svg"  alt="donation giftbox" class=" help-image">
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
                        <img src="images/customer.svg" alt="volunteer" class="help-image">
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
                <img src="https://res.cloudinary.com/dprmplqfj/image/upload/v1567631143/VolunteersNG/education_nbhnlt.jpg" alt="volunteer cause: education" />
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
                <img src="https://res.cloudinary.com/dprmplqfj/image/upload/v1567631132/VolunteersNG/disaster_hmocam.jpg" alt="volunteer cause: disaster"/>
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
                <img src="https://res.cloudinary.com/dprmplqfj/image/upload/v1567631136/VolunteersNG/medical_care_zs8trg.jpg" alt="volunteer cause: medic-care"/>
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
            <img src="https://res.cloudinary.com/dprmplqfj/image/upload/v1567631130/VolunteersNG/flutterwave_o7dig2.png" alt="VolunteerNG sponsor: flutterwave" width="70%">
        </div>
        <div class="col-4">
            <img src="https://res.cloudinary.com/dprmplqfj/image/upload/v1567631133/VolunteersNG/hng_drueyb.png" alt="VolunteerNG sponsor: hng" width="70%">
        </div>
        <div class="col-4">
            <img src="https://res.cloudinary.com/dprmplqfj/image/upload/v1567631135/VolunteersNG/start_ng_xvr50b.png" alt="VolunteerNG sponsor: start" width="70%">
        </div>
    </div>

    <!-- Include Footer -->
    <?php
    include('includes/footer.php');
    ?>

</body>

</html>