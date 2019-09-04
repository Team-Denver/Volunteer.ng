<?php

session_start();

require('includes/db_connection.php');

$userId = $_SESSION['user_id'];

$donations = mysqli_query($con, "SELECT * FROM  donations WHERE user_id = '$userId'") or die(mysqli_error($con));
?>

<h1>Welcom to your Dashboard <br><br>
    Page Under Construction
</h1>