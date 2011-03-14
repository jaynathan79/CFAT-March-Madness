<?php
include 'functions.php';
include("database.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>March Madness Bracket Competition</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta http-equiv="Content-Language" content="en-us" />
	<meta name="author" content="Matt Felser, Brian Battaglia, John Holder, Robert Jailall" />
	<style type="text/css" media="all">@import "../images/style.css";</style>
</head>
<body>
<div class="content">
	<div id="top">
		<div class="rightlinks"><a href="http://sourceforge.net/projects/tourney"><span class="info"><?php echo $mmm_info ?> | <?php echo $mmm_vers ?></span></a></div>
	</div>
		<div id="header">
			
			<div class="info">
				<h1>March Madness Bracket Competition</h1>
				<h2>Site Administration</h2>
			</div>
		</div>
	
		<div id="subheader">
			<div id="menu">
			  	<ul>
					<li><a href="../admin/">ADMIN AREA</a></li>
     			</ul>
			</div>
		</div>

	<div id="main">
		<div class="full">
			<h2>Install Status</h2>
<?php

if(isset($_POST['mail'])) {
	$mail = 1;
}
else {
	$mail = 0;
}

$_POST['title'] = str_replace("'","''",$_POST['title']); 
$_POST['subtitle'] = str_replace("'","''",$_POST['subtitle']); 

mysql_query("DELETE FROM `meta`",$db) or die(mysql_error());

$meta = "INSERT INTO `meta` (`title`,`subtitle`,`name`,`cost`,`cut`,`cutType`,`email`,`sweet16`,`closed`,`rules`,`mail`,`region1`,`region2`,`region3`,`region4`,`db_version`) VALUES ('$_POST[title]','$_POST[subtitle]','$_POST[adminname]','$_POST[cost]','$_POST[cut]','$_POST[cutType]','$_POST[email]',0,0,'<p>No additional rules have been set.</p>','$mail','$_POST[region1name]','$_POST[region2name]','$_POST[region3name]','$_POST[region4name]','ver 1.6.0')";
mysql_query($meta,$db) or die(mysql_error());

/*
$pwq = "INSERT INTO `passwords` (`label`,`value`) VALUES ('admin_password','".md5($_POST[password])."') ON DUPLICATE KEY UPDATE value = '".md5($_POST[password])."'";

mysql_query($pwq,$db) or die(mysql_error());
*/


mysql_query("DELETE FROM `scoring` WHERE type='main'",$db) or die(mysql_error());


$main_scoring = "INSERT INTO `scoring` (`seed`, `1`, `2`, `3`, `4`, `5`, `6`, `type`) VALUES ";

for( $i=1; $i < 17; $i++ )
{
	$row = "('".$i."',";
	for( $j=1; $j < 6; $j++ )
	{
		$row .= "'".$_POST[$i."-".$j."_scoring"]."',";	
	}
	$row .= "'".$_POST[$i."-".$j."_scoring"]."','main')";
	
	if( $i < 16 )
	{
		$row .= ",";
	}
	
	$main_scoring .= $row;
}

mysql_query($main_scoring,$db) or die(mysql_error());



// Update the scoring_info table for scoring type main

mysql_query("DELETE FROM `scoring_info` WHERE type='main'",$db) or die(mysql_error()) or die(mysql_error());

$scoring = mysql_query("SELECT seed,`1`,`2`,`3`,`4`,`5`,`6` FROM `scoring` WHERE `type` = 'main' ORDER BY `seed`",$db) or die(mysql_error());


$table_text = "<table border='1' align='center'><tr><td colspan='8'>Value of a win by a seed in a particular round</td></tr><tr><td>Seed #</td><td>R1</td><td>R2</td><td>R3</td><td>R4</td><td>R5</td><td>R6</td></tr>";

while ($row = mysql_fetch_assoc($scoring))
{
	$table_text .=  "<tr><td>".$row['seed']."</td>";
	
	for( $i=1; $i < 7; $i++ )
	{
		$table_text .=  "<td>".$row[$i]."</td>";
	}
	
	$table_text .=  "</tr>";
}


$table_text .= "</table>";


mysql_query("INSERT INTO `scoring_info` (`type`,`display_name`, `description`) VALUES ('main','Actual','".addslashes($table_text)."')") or die(mysql_error());

echo "<br>If no errors appear above, installation is complete!";

?>


		</div>
	</div>
</div>
</body>
</html>
