<?php





?>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

    <!-- Identify your business so that you can collect the payments. -->
    <input type="hidden" name="business" value="jay.nathan@changefora10.org">
    <input type="hidden" name="address_override" value="1">
    <input type="hidden" name="email" value="jay.nathan@blackbaud.com">

    <!-- Specify a Donate button. -->
    <input type="hidden" name="cmd" value="_donations">

    <!-- Specify details about the contribution -->
    <input type="hidden" name="amount" value="10.00">
    <input type="hidden" name="item_name" value="Hoops for Hunger Registration">

    <!-- custom variable is passed back to us -->
    <input type="hidden" name="custom" value="jay.nathan@blackbaud.com|32">

    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="notify_url" value="http://www.changefora10.org/paypal_ipn.php">

    <!--
        return method variable - 2 = payers browser is redirected to the URL
        by the POST method with all payment variables included. 'rm' is only active
        if the 'return' variable has been set.
    -->
    <input type="hidden" name="return" value="http://www.changefora10.org/paymentsuccess.php">
    <input type="hidden" name="rm" value="2">

    <input type="hidden" name="cancel_" value="http://www.changefora10.org/paypal_cancel.php">

    <input type="submit" value="submit">
    <!-- Display the payment button. -->
    <!-- input type="image" name="submit" border="0" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" alt="PayPal - The safer, easier way to pay online">
    <img alt="" border="0" width="1" height="1" src="https://www.paypal.com/en_US/i/scr/pixel.gif" -->

</form>