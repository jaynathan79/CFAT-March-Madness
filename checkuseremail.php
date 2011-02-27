<?php
/*
 *
 * This is a call that can be used to verify whether or not an email address
 * already exists in the system. The result of this page is serialized to JSON
 *
 */

include("class.login.php");

$log = new logmein();
$email = "";
$json_result = "";

if (isset($_GET['email'])){
    $email = $_GET['email'];
    $json_result = json_encode($log->isemailtaken($email));
}else{
    $json_result(false);
    exit;
}

echo $json_result;

?>
