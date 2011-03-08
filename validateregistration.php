<?php
/*
 *
 * This is a call that can be used to verify whether or not an email address
 * already exists in the system. The result of this page is serialized to JSON
 *
 */

include("class.login.php");

$log = new logmein();
$username = "";
$password = "";
$confirmpassword = "";

$json_result = "";

/* if (isset($_GET['email'])){
    $email = $_GET['email'];
    $json_result = json_encode($log->is_email_taken($email));
}else{
    $json_result(false);
    exit;
}*/
$username = (isset($_GET['username']) && !empty($_GET['username'])) ? $_GET['username'] : "";
$password = (isset($_GET['password']) && !empty($_GET['password'])) ? $_GET['password'] : "";
$confirmpassword = (isset($_GET['confirmpassword']) && !empty($_GET['confirmpassword'])) ? $_GET['confirmpassword'] : "";
$is_valid = $log->is_registration_valid($username, $password, $confirmpassword);

$error_message = "";

if(!$is_valid){
    $error_message = $log->last_error_message;
}

$arr = array('username'=>$username, 'password'=>$password, 'confirmpassword'=>$confirmpassword, 'isvalid'=>$is_valid, 'errormessage'=>$error_message);
$json_result = json_encode($arr);

header('Content-type: application/json');

echo $json_result;

?>