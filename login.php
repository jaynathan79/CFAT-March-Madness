<?php
session_start();

include("admin/database.php");
include("class.login.php");

$log = new logmein();
$log->encrypt = true;


/* the following code creates a form which looks like the following:

<form name="loginform" method="post" id="loginform" class="loginform" enctype="application/x-www-form-urlencoded" action="autenticationcontroller.php">
        <div><label for="username">Username</label>
        <input name="username" id="username" type="text"></div>
        <div><label for="password">Password</label>
        <input name="password" id="password" type="password"></div>
        <input name="action" id="action" value="login" type="hidden">
        <div><input name="submit" id="submit" value="Login" type="submit"></div>
</form>
 *
 * The registration page should handle making sure that the passwords
 * match, then pass email and password values on to the register method
 * of logmein();
 */
$log->loginform("loginform", "form", "authenticationcontroller.php");

$log->registerform("registerform", "form", "authenticationcontroller.php");

/*

$db = mysql_connect($host, $user, $pass) 
	or die(mysql_error());

mysql_select_db($database,$db) 
	or die(mysql_error());

$_SESSION['admin'] = true;
		header("Location: admin/index.php"); 
*/

// Comment out for now. protect by htaccess in the mean time
/*
$username = mysql_query("SELECT * FROM meta");

if( $username['name'] != $_POST["password"] )
{	
	// Retrieve all the data from the "example" table
	$result = mysql_query("SELECT * FROM passwords where label ='admin_password'")
	or die(mysql_error());  
	
	// store the record of the "example" table into $row
	$row = mysql_fetch_array( $result );
	// Print out the contents of the entry 
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	
		echo md5($_POST["password"]);
		echo  $row["value"];
		if ((md5($_POST["password"]) == $row["value"]) && ($row["label"] == "admin_password"))
		{
			$_SESSION['admin'] = true;
			header("Location: admin/index.php"); 
			exit();
		}
		
		if ((md5($_POST["password"]) == $row["value"]) && ($row["label"] == "general_user_password"))
		{
			$_SESSION['admin'] = true;
			header("Location: index.php"); 
			exit();
		}
	
	}
}
else
{
	//header("Location: login.html");
}*/

?>
