<?php
	include_once("bracket_functions.php");
?>
<div class="noprint">
	<nav class="tourney">
	  	<ul>
			<li><a href="home.php">Home</a></li>
			<?php 
			if(userHasBracket($userid)){ 
				$row = getBracketForUserID($userid);
				$mybracketurl = $rankMap[$row['id']]." <a href='view.php?id=".$row['id']."'>View My Bracket</a>";
			?>
			<li><?=$mybracketurl?></li>
			<?php }else{ ?>
			<li><a href="submit.php">Create Your Bracket</a></li>
			<?php } ?>
			<li><a href="rules.php">Rules</a></li>
			<li><a href="choose.php">Standings</a></li>
			<?php if($isadmin == true) { ?>
			<li><a href="admin">Admin</a></li>
			<?php } ?>
		</ul>
	</nav>
</div><br><br>