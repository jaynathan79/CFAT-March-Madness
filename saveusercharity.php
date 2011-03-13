<?php
/*
 *
 * This is a call that can be used to verify whether or not an email address
 * already exists in the system. The result of this page is serialized to JSON
 *
 */
include("admin/database.php");
include("class.login.php");

$log = new logmein();
$log->username_logon = $user;
$log->password_logon = $pass;

$userid = "";
$charity = "";

$is_valid = false;
$json_result = "";

$userid = (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) ? $_SESSION['userid'] : "";
$charity = (isset($_GET['charity']) && !empty($_GET['charity'])) ? $_GET['charity'] : "";

$is_valid = $log->save_user_charity($userid, $charity);

$error_message = "no error";

if(!$is_valid){
    $error_message = $log->last_error_message;
}

$arr = array('isvalid'=>$is_valid,'errormessage'=>$error_message,'userid'=>$userid);
$json_result = json_encode($arr);

header('Content-type: application/json');

echo $json_result;

?>
