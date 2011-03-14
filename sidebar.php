<?php
include_once("bracket_functions.php");

/* The following are assumed to be available to this included script.
$userid = (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) ? $_SESSION['userid'] : "";
$useremail = (isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])) ? $_SESSION['useremail'] : "";
$ispaid = (isset($_SESSION['ispaid']) && !empty($_SESSION['ispaid'])) ? $_SESSION['ispaid'] : false;
$loggedin = (isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])) ? $_SESSION['loggedin'] : false;
*/

$closed = isClosedToSubmissions();

if($closed)
{
	$query = 'SELECT * FROM `scores` WHERE `scoring_type`="main" ORDER BY `score` DESC, `name` ASC';
	$result = mysql_query($query) or die(mysql_error());  
	$scores;
	while($user = mysql_fetch_array($result))
	{
		$scores[] = $user;				
	}
	
	$rankMap = getRanksForScores($scores);
}

// if($loggedin){
// 	$row = getBracketForUserID($userid);
//	$mybracket = $rankMap[$row['id']]." <a href='view.php?id=".$row['id']."'>View My Bracket</a>";
//	echo $mybracket;
//}
	
?>
<br>
<?php
		$top=10;  // might make this a config setting someday

		echo "<h2>Top $top Standings</h2> ";
		if($closed)
		{
			if( count( $scores > 1 ) )
			{
				// Print out the top entries in an ordered list
				$lastRank = -1;
				foreach( $scores as $score )
				{
					$rank = $rankMap[$score['id']];
					if( $lastRank != $rank )
					{
						$lastRank = $rank;
					}

					if( $rank > $top )
					{
						break;
					}				
					
					$id = $score['id'];
					$name = stripslashes($score['name']);
					echo "$rank - <a href=\"view.php?id=$id\">$name</a>";
					echo "<br/>";
				}
				echo "<a href=\"standings.php?type=normal\">[full standings]</a><br/>";
			}
			else
			{				
				echo "<p>Standings will be available after the first games are completed.</p>\n";
			}
		}
		else
			echo "<p>Standings will be available when the tournament begins.</p>\n";
		?>

<?php if($isadmin){ ?>
	<br />
	<h2>Site Stats </h2>
	<ul id ='stats'>
	<li>Participants: <?= getUserCount() ?></li>
	<li>Total Brackets: <?= getBracketCount() ?></li>
	<li>Total Paid Brackets: <?= getPaidBracketCount() ?></li>
<?php } ?>

<?php
$needul = 1;
if($closed) {
	/*
	$query = "SELECT cost,cut,cutType FROM `meta` WHERE id=1";
	$pot = mysql_query($query,$db);
	$pot = mysql_fetch_array($pot);
	
	if($pot['cost'] != 0) {		
		if($pot['cutType']==1) {
			$cut = (100-$pot['cut'])/100;
			$totalPot = round($paidentries[0]*$pot['cost']*$cut,2);
		}
		else {
			$totalPot = $paidentries[0]*$pot['cost']-$pot['cut'];
		}
		echo "<li>&nbsp;&nbsp; Paid Brackets: ".$paidentries[0]." </li>\n";
		echo "<li>&nbsp;&nbsp; Pot Size: $",$totalPot,"</li>\n";
	}
	*/
	
	if($entries[0] != 0) {
		$query = "SELECT `63`, COUNT(*) AS `quantity` FROM `brackets` GROUP BY `63` ORDER BY `quantity` DESC";
		$favorites = mysql_query($query,$db) or die(mysql_error());
		echo "<li id=\"stats\"><b>Favorite Teams:</b></li></ul>\n";
		$needul=0;
		while( $favorite = mysql_fetch_array($favorites) ) {
			$percent = round($favorite['quantity']/$entries[0]*100,2);
			echo "<p>&nbsp;&nbsp; <a href='picks.php?team=$favorite[0]'>$favorite[0]</a> ($percent%)</p>\n";
		}
	}

}
if($needul == 1) echo "</ul>";
?>