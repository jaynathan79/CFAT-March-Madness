<?php
/************************************************
 * Processes bracket information to be stored in the database.
 * Processes information from submit.php
 ************************************************/

session_start();
include("admin/database.php");
include("admin/functions.php");

$userid = (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) ? $_SESSION['userid'] : "";
$useremail = (isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])) ? $_SESSION['useremail'] : "";
$ispaid = (isset($_SESSION['ispaid']) && !empty($_SESSION['ispaid'])) ? $_SESSION['ispaid'] : false;
$loggedin = (isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])) ? $_SESSION['loggedin'] : false;

$tiebreaker = $_POST['tiebreaker'];

$meta = "SELECT * FROM `meta` WHERE id=1";
$meta = mysql_query($meta,$db); //grabs administrator's email
$meta = mysql_fetch_array($meta);

/////////////////////// print ////////////////////////////

if(isset($_POST['print']))
{
	include('bracket_view_module.php');
	
	for( $i=1; $i < 64; $i++ )
	{
		$picks[$i.""] = $_POST["game".$i];
	}
	
	$picks['name'] = stripslashes($bracketname);
	$picks['tiebreaker'] = $tiebreaker;
	
	
	$team_query = "SELECT * FROM `master` WHERE `id`=1"; //select teams
	$team_data = mysql_query($team_query,$db);
	$team_data = mysql_fetch_array($team_data);
	
	$seedMap = getSeedMap($db);	
		
	for( $i=1; $i<65; $i++ )
	{
		$team_data[$i] = $seedMap[$team_data[$i]].". ".$team_data[$i];
	}
?>
<link rel="stylesheet" href="images/print.css" type="text/css" />
<?php

	viewBracket( $meta, $picks, $team_data, $rank, $score_data, $best_data );
	exit();
}
unset($_SESSION['print']);
/////////////////////////////////////////////////////////

$subject = "Brackets";
$adminEmail = $meta['email'];

//$query = "SELECT * FROM `users` where UPPER(`email`) = '".strtoupper($email)."' LIMIT 1";
//$result = mysql_query($query,$db);

//clean input
$i = 0;
while($_POST[$i] != NULL) {
	$_POST[$i] = Trim(stripslashes($_POST[$i])); 
	++$i;
}

//validate that the form was submitted to prevent spamming
if($tiebreaker != NULL && is_numeric($tiebreaker) && $person != NULL && $email != NULL)  
{
	$body = "Your bracket has been successfully submitted.";
	$_SESSION['success'] = "<p>".$body."</p>";
}
else
{
	$body = "Your bracket has been submitted with some sort of error. Saving it anyway. Contact <a href='mailto:".$meta['email']."'>".$meta['email']."</a> about a fix.";
	$_SESSION['errors'] = "<p>".$body."</p>";
}	

$paid = 0;
if( $meta['cost'] == 0 )
{
   $paid = 2; // if the cost to enter is zero, exempt every bracket on entry.
}

// submit bracket
$query = "INSERT INTO `brackets` (`userid`,`tiebreaker`,`paid`,`1`,`2`,`3`,`4`,`5`,`6`,`7`,`8`,`9`,`10`,`11`,`12`,`13`,`14`,`15`,`16`,`17`,`18`,`19`,`20`,`21`,`22`,`23`,`24`,`25`,`26`,`27`,`28`,`29`,`30`,`31`,`32`,`33`,`34`,`35`,`36`,`37`,`38`,`39`,`40`,`41`,`42`,`43`,`44`,`45`,`46`,`47`,`48`,`49`,`50`,`51`,`52`,`53`,`54`,`55`,`56`,`57`,`58`,`59`,`60`,`61`,`62`,`63`) VALUES (";
$query .= "'".mysql_real_escape_string($userid)."',";
$query .= "'".mysql_real_escape_string($tiebreaker)."',";
$query .= "'".mysql_real_escape_string($paid)."',";

for( $i=1; $i < 63; $i++ )
{
	$query .= "'".mysql_real_escape_string($_POST["game".$i])."',";
}
$query .= "'".mysql_real_escape_string($_POST["game63"])."'";
$query .= ")";

mysql_query($query) or die(mysql_error()); //inserts entry into the database

if($meta['mail']==1)
{ //if mail is configured
	
	// prepare administrator email body text
	$body .= "Entrant's Email: ";
	$body .= $useremail;
	$body .= "\n";
	$body .= "Tiebreaker (# of points in the championship): ";
	$body .= $tiebreaker;
	$body .= "\n";
	for($i=1;$i<=63;++$i) {
		$body .= "Game $i: ";
		$body .= $_POST["game$i"];
		$body .= "\n";
	}

	
	// send email to admin
	mail($adminEmail, $subject, "A bracket has been submitted to your pool.  This email should serve as a backup copy in the event that something happens to your database.\n\n".$body, "From: <$email>");
	// send confirmation to the entrant
	mail($useremail, "I have received your bracket","This is an automated email.  If you receive this, I have your submission.  Thanks for playing! -$meta[name]\n\n".$body, "From: <$adminEmail>");
}
//redirects to a confirmation notice
header('Location:home.php');
exit();
?>
