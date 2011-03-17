<?php
include("database.php");
include 'functions.php';
validatecookie();
include("header.php");
$query = "SELECT u.userid, u.useremail, u.displayname, u.paid, ifnull(b.id,-1) as bracketid FROM `users` u left join `brackets` b on b.userid = u.userid where u.paid = 1 and b.id is null";
$users = mysql_query($query,$db);
?>
	<div id="main">
		<div class="full">
			<h2>Who Paid?</h2>
			<table class="adminPaid">
				<tr class="paidHeader">
					<th class="paidPerson">User</th>
					<th class="paidBracket">Email</th>
					<th class="paidSelector">Paid?</th>
					<th class="paidPerson">Bracket?</th>
				</tr>
				<?php
				$rowCount = 0;
				while($user=mysql_fetch_assoc($users)) {
					$rowCount = $rowCount + 1;
				?>
					<tr>
					<td> <?=stripslashes($user['displayname'])?></td>
					<td> <?=stripslashes($user['useremail'])?></td>
					<td align="center"> <?=$user['paid']?"Yes":"No"?></td>
					<td align="center"> <?=$user['bracketid'] == -1?"NO":"Yes"?></td>
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
