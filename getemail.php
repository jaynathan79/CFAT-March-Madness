<?php
session_start();
include("admin/database.php");

$type = $_GET['type'];
if($type == 'logout') {
	setcookie("useremail", "", mktime(12,0,0,1, 1, 1970), "/"); 
}
else
{
	$_SESSION['useremail'] = strip_tags($_POST['useremail']); ;
	setcookie("useremail", strip_tags($_POST['useremail']), time()+60*60*24*30, "/");
}
header("Location: index.php"); 

?>
