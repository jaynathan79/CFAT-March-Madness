<?php
	include("cfatheader.php");
	include("menu.php")
?>

<!-- TODO: handle if logged in, only show form if logged out -->
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
