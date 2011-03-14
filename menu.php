<?php
	include_once("bracket_functions.php");
?>
<div class="noprint">
	<nav class="tourney">
	  	<ul>
			<li><a href="index.php">HOME</a></li>
			<?php if(userHasBracket($userid)){ ?>
			<li><a href="view.php?id=">VIEW MY BRACKET</a></li>
			<?php }else{ ?>
			<li><a href="submit.php">CREATE BRACKET</a></li>
			<?php } ?>
			<li><a href="rules.php">RULES</a></li>
			<li><a href="choose.php">STANDINGS</a></li>
			<?php if($isadmin == true) { ?>
			<li><a href="admin">ADMIN</a></li>
			<?php } ?>
		</ul>
	</nav>
</div><br><br>