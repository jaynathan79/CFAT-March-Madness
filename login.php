<?php
	include("cfatheader.php");
	include("menu.php")
?>

//todo: handle if logged in

//if not logged in:
<form action='registrationcontroller.php' method='post'>
<input name="action" id="action" value="login" type="hidden"/>
<label>Email</label>
<input type="text" name="username"/>
<label>Password</label>
<input type="password" name="password"/>
<input type="submit" value="Login"/>
</form>

<?php
	include("cfatfooter.php");
?>
