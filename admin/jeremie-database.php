<?php

/*
 * Add your DB config here!
 */
$database = "tourney";
$user = "root";
$pass = "root";
$host = "localhost:8888";
/*
 * Add a full URL to your site install, like:
 * $tourneyURL = "http://tourney.example.com/";
 * $tourneyURL = "http://example.com/tourney/";
*/
$tourneyURL = "";

/*
 * How many places do you want to have payout for in the final calculations?
 * $maxScoreRanks = 3;   means that the top 3 winners payout or have a prize
 */
$maxScoreRanks = 3;


/* **************** DO NOT EDIT BELOW THIS POINT **************** */

/*
 * The below data must appear in a valid release.  Do not edit.
 */
$mmm_vers = "ver 1.5.3.5";
$mmm_info = "&copy;2007-2010 tourney project";
$mmm_authors = "Copyright &copy; 2007-2008 Matt Felser, Copyright &copy; 2008-2010 Brian Battaglia, John Holder, Robert Jailall";
$dbschema_vers = "ver 1.5.1";

error_reporting(E_ERROR|E_CORE_ERROR|E_PARSE|E_COMPILE_ERROR|E_USER_ERROR|E_RECOVERABLE_ERROR);

$db = mysql_connect($host, $user, $pass) 
	or die(mysql_error());

mysql_select_db($database,$db) 
	or die(mysql_error());

?>
