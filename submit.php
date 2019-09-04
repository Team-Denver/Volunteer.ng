<?php

require('includes/db_connection.php');
include('includes/functions.php');

if (isset($_POST['submit'])) {

    $cloudinaryImage = $_POST['cloudinary'];
    $fullName = $_POST['name'];
    $contribution = $_POST['contribution'];
    $cvLink = $_POST['cv'];
    $code = $_POST['code'];
    $track = $_POST['track'];

    //Query DB for details
    $user_check_query = mysqli_query($con, "SELECT * FROM submissions WHERE code = '$code'") or die(mysqli_error($con));
    $count = mysqli_num_rows($user_check_query);

    if ($count > 0) {
        //Display Error here

        echo "<script type='text/javascript'>alert('You already submitted')</script>";
        echo "<script type='text/javascript'>document.location='team.php'</script>";
        exit(0);
    } else {

        $result = mysqli_query($con, "INSERT INTO submissions SET fullname= '$fullName', cloudinary = '$cloudinaryImage', contribution = '$contribution', cv_link = '$cvLink', code = '$code', track = '$track'") or die(mysqli_error($con));

        if ($result) {
            echo "<script type='text/javascript'>alert('Your submision has been recorded')</script>";
            echo "<script type='text/javascript'>document.location='team.php'</script>";
        } else {
            echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
            echo "<script type='text/javascript'>document.location='submit.php'</script>";
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
    <title>Volunteer NG | Submit Task</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/login.css" />
    <link href="./css/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="./css/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="./css/fontawesome/css/solid.css" rel="stylesheet" />
    <link rel="icon" href="images/favicon.ico" sizes="16x16" type="image/png" />
    <link rel="stylesheet" href="./team/team.css" />

</head>

<body>
    <!--Login Form-->
    <div class="container">
        <div class="form">

            <ul class="tab-group">
                <li class="tab active"><a href="https://docs.google.com/spreadsheets/d/1IT-zTY_AaC_vaBa1QTNoQ9coP_3dZE97xaoPgl9GpUg/edit?usp=sharing" target="_blank">Team Denver Task Submission</a></li>
            </ul>

            <div class="tab-content">

                <div id="login">
                    <h2>Don't submit this form is your name is not on this <a target="_blank" href="https://docs.google.com/spreadsheets/d/1IT-zTY_AaC_vaBa1QTNoQ9coP_3dZE97xaoPgl9GpUg/edit?usp=sharing"> list! </a></h2>
                    <form action="" method="post" autocomplete="off">

                        <div class="field-wrap">
                            <label>
                                Fullname
                            </label>
                            <input type="text" required autocomplete="off" name="name" />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Cloudinary Image Link
                            </label>
                            <input type="text" required autocomplete="off" name="cloudinary" />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Hosted CV Link
                            </label>
                            <input type="text" required autocomplete="off" name="cv" />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Contribution to Team task (short pls)
                            </label>
                            <input type="text" required autocomplete="off" name="contribution" />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Code on Tracking sheet (e.g shn00012)
                            </label>
                            <input type="text" required autocomplete="off" name="code" />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Track (Front end, Backend, UI etc)
                            </label>
                            <input type="text" required autocomplete="off" name="track" />
                        </div>

                        <button class="button button-block" name="submit">Submit</button>

                    </form>

                </div>
                <div id="signup">


                </div>
            </div><!-- tab-content -->

        </div> <!-- /form -->
    </div>
</body>

</html>