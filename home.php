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
        <td style="width: 50%">
            <?php include("sidebar.php"); ?>
        </td>
        <td style="width: 50%">
            <?php
                if(!$ispaid){
                    echo "We noticed you opted to play without donating.<br/> Would you like to donate now?<br/>";
                    include('paypal_form.php');
                }else{
                    echo "Thanks for your donation!";
                }
            ?>

        </td>
    </tr>
    <tr>
        <td style="width: 50%">
            &nbsp;
        </td>
        <td style="width: 50%">
            <?php
                if($supportedCharity == ""){
                    include("selectcharity.php");
                } else {
                    echo "You are supporting <b>".$supportedCharity."</b>";
                }
            ?>
        </td>
    </tr>
</table>


		
<?php
    include("cfatfooter.php");
?>
