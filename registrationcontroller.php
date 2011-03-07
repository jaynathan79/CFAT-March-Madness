<?php
date_default_timezone_set('America/Los_Angeles');
include("class.login.php");

$log = new logmein();
$log->encrypt = true;

if($_REQUEST['action'] == "login"){
    // do login
    if($log->login("logon", $_REQUEST['username'], $_REQUEST['password']) == true){
        // assuming login request is successful, redirect to game page
        echo ($_SESSION["userid"]."<br/>");
        echo ($_SESSION["loggedin"]."<br/>");
        /*
        $_SESSION['userid'] = $userid;
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $username;
            $_SESSION['ispaid'] = false;
         * */


        echo ("Login succeeded.");
    }else{
        // redirect back to login page
        header('Location: login.php?result=loginfailed');
    }    
}

if ($_REQUEST['action'] == 'register'){

    $displayname = substr($_REQUEST['registerusername'], 0, strrpos($_REQUEST['registerusername'], "@"));
    $username = $_REQUEST['registerusername'];
    $password = $_REQUEST['registerpassword'];
    $confirmpassword = $_REQUEST['registerconfirmpassword'];

    if($log->register($username, $password, $confirmpassword, $displayname) == true){
        // if registration was a success, login. Login returns -1 if it failed
        $userid = $log->login($username, $password);

        if($userid > -1){
            session_start();
            $_SESSION['userid'] = $userid;
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $username;
            $_SESSION['ispaid'] = false;

            // registration and login were successful, redirect to welcome page
            header('Location: welcome.php');
            //echo "<script>window.location.href='welcome.php';</script>";
        } else {
            echo "login failed.";
            session_destroy();
        }
            
            
    } else {
        echo $log->last_error_message;
        // redirect back to login/registration page, something wasn't right
        // header('Location: login.php?result=registrationfailed');
        // TODO: need more detailed failure result - did the email already exist
        //       also need to create individual methods that can be called from the
        //       client for determining whether or not a username is available and whether passwords
        //       match and are complex enough.
    }
}




?>
