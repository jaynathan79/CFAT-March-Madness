<?php
include("cfatheader.php");
include("menu.php");

$closed = "SELECT closed FROM `meta` WHERE id=1 LIMIT 1";
$closed = mysql_query($closed,$db); //boolean if bracket submission is over
if(!($closed = @mysql_fetch_array($closed))) {//if fetching the array fails, prompt configuration
	echo "Please <a href=\"admin/install.htm\">configure the site.</a>\n";
	exit();
}
$teams = "SELECT * FROM `master` WHERE `id`=1"; //select teams

$teams = mysql_query($teams,$db);

if(!($teams = @mysql_fetch_array($teams))) {//if fetching the array fails, prompt configuration
	echo "The bracket has not yet been released.\n";
	exit();
}


$sweet16 = "SELECT sweet16 FROM `meta` WHERE id=1 LIMIT 1";
$sweet16 = mysql_query($sweet16,$db); //boolean if sweet 16 has started
$sweet16 = mysql_fetch_array($sweet16);

?>

		

	

			

				<h2>The Standings </h2>

				<h3>Please select the data you wish to view: </h3>
				
				<ul>
				 <li><a href="master.php">Master Bracket</a></li>
				 </ul>

				<ul>

					
										
					<?php
					if($closed[0] == 1) {
					?>
					<li><a href="standings.php?type=normal">Standings</a></li>															
					<!--<li><a href="champ.php">Champion selections</a></li>
					<li><a href="scoredetail.php">Who picked whom?</a> - (By round)</li>
					<li><a href="standings.php?type=best">Best possible scores</a></li>-->
					</ul>
					<?php
						if($sweet16[0] == 1 && false) {
					?>
					<ul>
					<li><a href="endgamesummary.php">End Game Scenarios</a></li>
					<li><a href="whatif.php">What If?</a> (Fill out the rest of the bracket and see the potential standings)</li>					
					</ul>
					<?php
						}
					}
					?>

		

<?php
	include("cfatfooter.php");
?>