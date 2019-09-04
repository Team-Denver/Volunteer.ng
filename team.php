<?php
session_start();

require('includes/db_connection.php');
include('includes/functions.php');


$query = mysqli_query($con, "SELECT * FROM submissions") or die(mysqli_error($con));
$count = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Volunteer NG | The Team</title>
  <link href="./css/fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="./css/fontawesome/css/brands.css" rel="stylesheet" />
  <link href="./css/fontawesome/css/solid.css" rel="stylesheet" />
  <link rel="icon" href="./images/favicon.ico" sizes="16x16" type="image/png" />
  <link rel="stylesheet" href="./css/team.css" />
</head>

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
  <header>
    <div class="second-nav">
      <div id="branding">
        <img src="./images/logo.png" alt="VolunteerNG logo" width="120" height="70" />
      </div>
      <nav col-6>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="entities.php">Entities</a></li>
          <li><a href="about.html">About</a></li>
          <li class="current"><a href="team.php">The Team</a></li>
          <li class="auth_button">
            <a href="sign-in.php"> <i class="fa fa-user"></i> Login | Sign Up</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Second Nav starts here -->

  <section id="team-header">
    <h1>Our Team</h1>
    <p>
      In the words of Jim Kwon, he said: "One piece of log creates a small
      fire, adequate to warm you up, add just a few more pieces to blast an
      immense bonfire, large enough to warm up your entire circle of friends;
      needless to say, that individuality counts but teamwork dynamites."
    </p>
    <br />
    <h5>
      This wouldn't have been possible with only the Visionaire. Cheers to a
      great team!
    </h5>
  </section>

  <section id="teams">
    <div class="container col-12">

      <?php

      if ($count == 0) {
        echo "<h1> NO team member</h1>";
      } else {

        while ($row = mysqli_fetch_array($query)) {

          $link = $row["cv_link"];
          $fullname = $row["fullname"];
          $cloudinary = $row["cloudinary"];
          $track = $row["track"];
          $contribution = $row["contribution"];
          $code = $row["code"];

          ?>
          <div class="member">
            <img src="<?php echo $cloudinary ?>" alt="<?php echo $fullname ?>" /> <br />
            <h3><?php echo $fullname ?></h3>
            <p>
              Code: <b><?php echo $code ?></b> | Track: <b><?php echo $track ?></b> <br><br>
              Contribution: <?php echo $contribution ?>
            </p>
            <br>
            <a href="<?php echo $link; ?>" style="color: green; text-align: center"><b>More Details..</b></a>
          </div>
      <?php }
      }

      ?>



    </div>
  </section>
</body>

</html>