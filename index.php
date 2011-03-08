<?php
include("cfatheader.php");
include("menu.php");
include("admin/functions.php");
?>

<div id="error" class="error">
    <?=$_SESSION['errors']?>
</div>
	
<h3><?=$useremail?></h3>

		
<?php
	include("sidebar.php");
	include("cfatfooter.php");
?>