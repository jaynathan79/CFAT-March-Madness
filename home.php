<?php
include("cfatheader.php");
include("menu.php");
include("admin/functions.php");

if(isset($_SESSION['errors'])){
?>
<div id="error" class="error">
    <?=$_SESSION['errors']?>
	<?php unset($_SESSION['errors'])?>
</div>

<?php
}

include('paypal_form.php');
?>

<h3><?=$useremail?></h3>		
<?php
	include("sidebar.php");
	include("cfatfooter.php");
?>