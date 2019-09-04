<?php

//isLogged In
function isLoggedIn()
{
    if (empty($_SESSION['user_id'])) :
        header('Location: ../index.php');
    endif;
}

function validateEmail($email)
{
    return (!preg_match(
        "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",
        $email
    ))
        ? FALSE : TRUE;
}

//Generate Unique Transacrion Reference
function generateRef($userId)
{
    $uniqueId = uniqid();
    return $userId . '-VLTNG_' . $uniqueId;
}

//Show Alert function
function showAlert()
{
    if (isset($_SESSION['alert_flag']) && isset($_SESSION['alert_message'])) {
        if ($_SESSION['alert_flag'] == 'error') { ?>

            <!-- Add CSS & FrontEnd to display Errors here -->
            <!-- Do this by exposing: -->
            <?php echo "<span style='color: red'>".$_SESSION['alert_message']."</span>"; ?> 

        <?php } elseif ($_SESSION['alert_flag'] == 'success') { ?> <div class="row" style="margin-top: 8px;">

                <!-- Add CSS & FrontEnd to display Success Messages here -->
                <!-- Do this by exposing: -->
            <?php echo "<span style='color: green'>".$_SESSION['alert_message']."</span>"; ?> 

            <?php } elseif ($_SESSION['alert_flag'] == 'info') { ?>

                <!-- Add CSS & FrontEnd to display Notices here -->
                <!-- Do this by exposing: -->
            <?php echo "<span style='color: blue'>".$_SESSION['alert_message']."</span>"; ?> 
    <?php }
            //DON'T EDIT!!!
            unset($_SESSION['alert_flag']);
            unset($_SESSION['alert_message']);
        }
    }

    //Add Alert function
    function addAlert($flag, $message)
    {
        //PLEASE, DON'T EDIT!!!
        if ($flag !== '' && $message !== '') {
            $_SESSION['alert_flag'] = $flag;
            $_SESSION['alert_message'] = $message;
        } else {
            unset($_SESSION['alert_flag']);
            unset($_SESSION['alert_message']);
        }
    }
