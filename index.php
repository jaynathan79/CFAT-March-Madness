<?php
include("cfatheader.php");
include("menu.php");
include("admin/functions.php");

if(isset($_SESSION['errors'])){
?>
<div id="error" class="error">
    <?=$_SESSION['errors'] && strlen($_SESSION['errors']) > 0 ?>
	<?php unset($_SESSION['errors'])?>
</div>
<?php
}
?>			
<h3><?=$useremail?></h3>		
<?php
	include("sidebar.php");
	include("cfatfooter.php");
?>
