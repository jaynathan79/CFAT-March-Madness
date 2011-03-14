<?php
include("cfatheader.php");
include("menu.php");
include("admin/functions.php");
?>

<?php if(isset($_SESSION['errors'])){ ?>
    <div id="error" class="error">
        <?=$_SESSION['errors']?>
            <?php unset($_SESSION['errors'])?>
    </div>
<?php } ?>

<table>
    <tr>
        <td>
            <?php include("sidebar.php"); ?>
        </td>
        <td>
            <?php
                if(!$ispaid){
                    echo "We notice you opted to play without donating.<br/> Would you like to donate now?<br/>";
                    include('paypal_form.php');
                };
            ?>

        </td>
    </tr>
</table>


		
<?php
    include("cfatfooter.php");
?>
