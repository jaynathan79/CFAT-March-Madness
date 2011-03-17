<?php
include('functions.php');
include("header.php");
?>

<script type="text/javascript">

function confirmPathsToVictory(truncate)
{
	var message = "Are you sure you want to calculate paths? \n\n\
ONE sweet 16 game must have already been played or this will time out. \n\n\
If all sweet 16 games or more are left, you must run this from the terminal. \n\n\
	Example: php ./mmm/admin/calculate_paths_to_victory.php\n\n\
Obviously, you can only feasibly calculate this (hours instead of years) after the first round.";

	if( window.confirm(message) )
	{
		window.location.href ="calculate_paths_to_victory.php?truncate="+truncate;
	}
}

</script>

	<div id="main">
		<div class="full">
			<h2>Select a Task</h2>
			<ul>
				
				<li><a href="paid.php">View Paid List</a></li>
				<li><a href="paidnobracket.php">View The List of Paid Users With No Bracket</a></li>
				<!--<li><a href="contactall.php">Contact all users</a></li>-->
				
				<li><a href="bracket.php">Edit Master Bracket</a></li>
				<li><a href="edit.php">Edit a Bracket</a></li>
				<?php if($meta['closed']==0) { ?>
				<li><a href="close.php">Close Bracket Submission</a></li>
				<?php } else { ?>
				<li>Bracket Submission Is Closed</a></li>
				<?php } ?>
				<li><a href="score.php">Score All Brackets</a> (performed automatically when editing the master bracket)</li>
				<li><a href="javascript:confirmPathsToVictory(false)">Recalculate Paths To Victory</a> (From sweet 16)</li>
				<li><a href="javascript:confirmPathsToVictory(true)">Recalculate Paths To Victory AND delete previous calculations</a> (From sweet 16)</li>
			</ul>
			<ul>
				<li><a href="install.htm">(Re)Configure the site</a></li>
				<li><a href="rules.php">Edit Rules</a></li>
				<li><a href="start.htm">Initialize the Bracket</a></li>
			</ul>
		</div>
	</div>
</div>
</html>