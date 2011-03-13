<?php

function getRanksForScores( $scoreData )
{
	$rankCounter = 1;
	$currentScore = -1;
	foreach( $scoreData as $scoreInfo )
	{
		if( $currentScore != $scoreInfo['score'] )
		{
			$rank = $rankCounter;
		}

		$currentScore = $scoreInfo['score'];

		$rankMap[ $scoreInfo['id'] ] = $rank;

		$rankCounter += 1;
	}

	return $rankMap;
}

function isClosedToSubmissions()
{
	$closed = "SELECT closed FROM `meta` WHERE id=1 LIMIT 1";
	$closed = mysql_query($closed); //boolean if bracket submission is over
	$closed = @mysql_fetch_array($closed); //boolean if bracket submission is over
	return $closed[0] == 1;
}

function userHasBracket($uid)
{
	$query = "SELECT count(id) FROM `brackets` WHERE userid=".$uid;
	$result = mysql_query($query);
	$row = @mysql_fetch_array($result);
	return $row[0] > 0;
}

function getBracketForUserID($uid)
{
	$query = "SELECT id FROM `brackets` WHERE userid=".$uid;
	$result = mysql_query($query);
	$row = @mysql_fetch_assoc($result);
	return $row;
}

function getBracketCount()
{
	$query = "SELECT COUNT(id) FROM `brackets`";
	$result = mysql_query($query);
	$row = @mysql_fetch_array($result);
	return $row[0];
}

function getPaidBracketCount()
{
	$query = "SELECT COUNT(id) FROM `brackets` WHERE `paid`=1";
	$paidentries = mysql_query($query);
	$paidentries = @mysql_fetch_array($paidentries);
	return $paidentries[0];
}	

function getUserCount()
{
	$query = "SELECT COUNT(*) FROM `users`";
	$result = mysql_query($query);
	$row = @mysql_fetch_array($result);
	return $row[0];
}

// SUBMISSION FUNCTIONS ////////////////////////////

function getMeta()
{
	$query = "SELECT * from `meta` where id = 1";
	$result = mysql_query($query);
	$meta = @mysql_fetch_array($result);
	return $meta;
}

function getMasterBracketTeams()
{
	$teams = "SELECT * FROM `master` WHERE `id`=1"; //select teams
	$teams = mysql_query($teams);
	$teams = @mysql_fetch_array($teams);
	return $teams;
}

function getMasterBracketTeamNames()
{
	$teamNames = "SELECT * FROM `master` WHERE `id`=1"; //select teams
	$teamNames = mysql_query($teamNames);
	$teamNames = @mysql_fetch_array($teamNames);
	return $teamNames;
}

function getMasterBracketSeeds()
{
	$seeds = "SELECT * FROM `master` WHERE `type`='seeds'"; //select seeds
	$seeds = mysql_query($seeds);
	$seeds = @mysql_fetch_array($seeds);
	return $seeds;
}
?>