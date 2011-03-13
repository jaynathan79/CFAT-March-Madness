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

$email = "";
$json_result = "";

if (isset($_GET['email'])){
    $email = $_GET['email'];
    $json_result = json_encode($log->is_email_taken($email));
}else{
    $json_result(false);
    exit;
}

header('Content-type: application/json');

echo $json_result;

?>
