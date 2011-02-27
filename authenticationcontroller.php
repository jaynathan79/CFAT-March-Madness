<?php

include("class.login.php");

$log = new logmein();
$log->encrypt = true;

if($_REQUEST['action'] == "login"){
    // do login
    if($log->login("logon", $_REQUEST['username'], $_REQUEST['password']) == true){
        // assuming login request is successful, redirect to game page
        echo ("Login succeeded.");
    }else{
        // redirect back to login page
        header('Location: login.php?result=loginfailed');
    }
}

if ($_REQUEST['action'] == 'register'){

    if($log->register($_REQUEST['registerusername'], $_REQUEST['registerpassword']) == true){
        // redirect to game
        echo "successful registration, redirect to game.";
    } else {
        // redirect back to login/registration page, something wasn't right
        header('Location: login.php?result=registrationfailed');
        // TODO: need more detailed failure result - did the email already exist
        //       also need to create individual methods that can be called from the
        //       client for determining whether or not a username is available and whether passwords
        //       match and are complex enough.
    }
}

?>
