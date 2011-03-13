<?php
	include("cfatheader.php");
?>
 <form action='registrationcontroller.php' method='post'>
<table style="width: 0%">
    <tr>
        <td colspan="2">
            <input name="action" id="action" value="login" type="hidden"/>
            <font class="formlabel">Email</font><br/>
            <input class='required big two-column'  type="text" name="username"/>
        </td>
    </tr>
    <tr>
        <td>
            <font class="formlabel">Password</font>
        </td>
        <td style="text-align: right;">
            <a href="resetpassword.php">Forgot Password</a>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input class='required big two-column'  type="password" name="password"/>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" class="btn_join" value="Login"/>
        </td>
    </tr>
</table>

 </form>
<!-- TODO: handle if logged in, only show form if logged out -->

<?php
	include("cfatfooter.php");
?>