<?php

include_once("admin/database.php");
include_once("admin/functions.php");
include_once("bracket_functions.php");

session_start();

$closed = isClosedToSubmissions();

$userbracket = getBracketForUserID($userid);

if($closed == false && $userbracket['userid'] != $userid) {
	$_SESSION['errors'] = "No peeking until submission is closed!";
	header('Location:home.php');
	exit();
}
include("cfatheader.php");
include("menu.php");

$id = (int) $_GET['id'];
$query = "SELECT *, u.useremail, u.displayname FROM `brackets` b join users u on u.userid = b.userid WHERE b.id = '$id'";
$picks = mysql_query($query,$db);
$picks = mysql_fetch_array($picks);

if($picks['id'] != NULL)
{

	$team_query = "SELECT * FROM `master` WHERE `id`=1"; //select teams
	$team_data = mysql_query($team_query,$db);
	$team_data = mysql_fetch_array($team_data);
	
	$master_query = "SELECT * FROM `master` WHERE `id`=2"; //select winners
	$master_data = mysql_query($master_query,$db);
	$master_data = mysql_fetch_array($master_data);
	
	$loserMap = getLoserMap($db);
	$seedMap = getSeedMap($db);	
	
	for( $i=0; $i<64; $i++ )
	{
		$team_data[$i] = $seedMap[$team_data[$i]].". ".$team_data[$i];
	}
	
	$query = "SELECT * FROM `scores` WHERE `id` = '$id' and scoring_type='main' "; //select entry
	$score_data = mysql_query($query,$db);
	$score_data = mysql_fetch_array($score_data);
	
	$query = "SELECT * FROM `best_scores` WHERE `id` = '$id' and scoring_type='main' "; //select entry
	$best_data = mysql_query($query,$db);
	$best_data = mysql_fetch_array($best_data);
	
	//get rank
	$query = "SELECT * FROM `scores`  WHERE scoring_type='main' ORDER BY `score` DESC";
	$result = mysql_query($query,$db) or die(mysql_error());  
	$i=1;
	$rankCounter = 0;
	$prevScore = -1;
	while($user = mysql_fetch_array($result)) {
		// Print out the contents of each row into a table
		if( $user['score'] != $prevScore )
		{
			$rankCounter = $i;
		}
		
		if ($user['id'] == $id) {
			$rank = $rankCounter;
			break;
		}
		
		$prevScore = $user['score'];
		$i++;
			
	}
	
	$scoring = getScoringArray($db, 'main');
	$roundMap = getRoundMap();
	
	
	for($j=1;$j<64;$j++)
	{
		$gameValue = $scoring[ $seedMap[$picks[$j]] ][ $roundMap[$j] ];
		$gameValueStr = " <span class=\"gamevalue\">(".$gameValue.")</span>";
		$pickSeed = "<span class=\"gamevalue\">".$seedMap[$picks[$j]].". </span>";
		
		$nextGameValue = $scoring[ $seedMap[$picks[$j]] ][ $roundMap[$j] + 1 ];
		$nextGameValueStr = " onmouseover=\"return displayNextRoundWinValue('".$nextGameValue."');\" onmouseout=\"return clearStatus();\"";

		if($master_data[$j] != NULL)
		{
			
			if($picks[$j] != $master_data[$j]) 
			{
				$correctSeed = "<span class=\"gamevalue\">".$seedMap[$master_data[$j]].". </span>";
				$correctValue = $scoring[ $seedMap[$master_data[$j]] ][ $roundMap[$j] ];
				$correctValueStr = " <span class=\"gamevalue\">(".$correctValue.")</span>";
				
				$nextCorrectGameValue = $scoring[ $seedMap[$master_data[$j]] ][ $roundMap[$j] + 1 ];
				$nextCorrectGameValueStr = " onmouseover=\"return displayNextRoundWinValue('".$nextCorrectGameValue."');\"";
				
				$picks[$j] = "<span class=\"strike\">".$pickSeed.$picks[$j].$gameValueStr;
				$picks[$j] .= "</span>";
				$picks[$j] .= "<br/><span class=\"correction\"".$nextCorrectGameValueStr.">".$correctSeed.$master_data[$j].$correctValueStr;
				$picks[$j] .= "</span>";
			}
			
			if($picks[$j] == $master_data[$j])
			{
				$picks[$j] = "<span class=\"right\"".$nextGameValueStr.">" .$pickSeed.$picks[$j].$gameValueStr;
				$picks[$j] .= "</span>";
			}
		}
		else if( $loserMap[$picks[$j]] == 1 )
		{
			$picks[$j] = "<span class=\"strike\">".$pickSeed.$picks[$j].$gameValueStr;
			$picks[$j] .= "</span>";
		}
		else
		{
			$picks[$j] = "<span ".$nextGameValueStr.">".$pickSeed.$picks[$j].$gameValueStr."</span>";
		}	
	}	
?>

<?php 

include('bracket_view_module.php');
viewBracket( $meta, $picks, $team_data, $rank, $score_data, $best_data );

$query = "SELECT * FROM `brackets` WHERE `id` = $id LIMIT 0,1"; //select entry
$user = mysql_query($query,$db);
$user = mysql_fetch_array($user);

} else {
?> 
	<h2 align="center">Sorry. That bracket does not exist.</h2> 
    <h2 align="center"><br /> 
      Please try again. </h2> 
    <p align="center"> 
      <input type=button value="Back" onClick="history.back()" /> 
    </p> 
<?php 	
}
include("cfatfooter.php");
?>

