<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form action="registrationcontroller.php" method="POST" id="resetpasswordform" name="resetpasswordform">
            <label for="email">Please enter your email address to reset your password</label><br/>
            <input type="text" id="email" name="email" value=""/><br/>
            <input type="hidden" value="passwordreset" id="action" name="action"/>
            <input type="submit" value="Send New Password" name="submit" id="submit"/>
        </form>
    </body>
</html>
