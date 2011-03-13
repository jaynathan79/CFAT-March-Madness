<?php
include("database.php");
include 'functions.php';
validatecookie();
include("header.php");
$query = "SELECT userid, useremail, displayname, paid FROM `users`";
$users = mysql_query($query,$db);
?>
	<div id="main">
		<div class="full">
			<h2>Who Paid?</h2>
			<table class="adminPaid">
				<tr class="paidHeader">
					<td class="paidPerson">User</th>
					<td class="paidBracket">Email</th>
					<td class="paidSelector">Paid?</th>
				</tr>
				<?php
				$rowCount = 0;
				while($user=mysql_fetch_assoc($users)) {
					$rowCount = $rowCount + 1;
				?>
					<tr>
					<td> <?=stripslashes($user['displayname'])?></td>
					<td> <?=stripslashes($user['useremail'])?></td>
					<td> <?=$user['paid']?"Yes":"No"?></td>
					</tr>
				<?php	
				}
				?>
			</table>
	</div>
</div>
</div>
</body>
</html>
