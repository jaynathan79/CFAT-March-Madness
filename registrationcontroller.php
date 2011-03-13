<?php
//date_default_timezone_set('America/Los_Angeles');
include("class.login.php");

$log = new logmein();
$log->encrypt = true;

if($_REQUEST['action'] == "login"){
    // do login
	$userid = $log->login($_REQUEST['username'], $_REQUEST['password']);
    if($userid > -1){
        session_start();
        $_SESSION['userid'] = $userid;
        $_SESSION['loggedin'] = true;
        $_SESSION['useremail'] = $_REQUEST['username'];
        $_SESSION['ispaid'] = false;
		
		$userInfo = $log->getUserInfo($userid);
		$_SESSION['ispaid'] = $userInfo["paid"];
		$_SESSION['isadmin'] = $userInfo["userlevel"] == 1;
		
        // registration and login were successful, redirect to welcome page
        header('Location: welcome.php');
        //echo "<script>window.location.href='welcome.php';</script>";
    } else {
        echo "login failed.";
        session_destroy();
    }    
}

if($_REQUEST['action'] == "logout"){
    // do login
	session_destroy();
	header('Location: login.php');
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
