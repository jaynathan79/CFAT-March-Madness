<?php
// session_start();
date_default_timezone_set('America/Los_Angeles');

include("cfatheader.php");

?>
        <h1>Welcome, to Change for a 10. Together we'll do big things.</h1>
        <h3>This month...</h3>

        <table style="width: 100%">
            <tr>
		<td style="vertical-align: top;" colspan="2">
                    <div style="text-align: center;">
                        <img src="http://placekitten.com/850/200">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="bluebold">
                        Pick all 63 games correctly and we’ll donate an additional $10,000 to your hunger-related charity!
                    </div>
                </td>
            </tr>
            <tr>
                <td style="width: 50%; text-align: center;">
                    <nav class="round bluenavright">
                        <ul>
                            <li>
                                <a onclick="document.forms.paypal.submit();return false;" href="#">Let's play! And i want to <u>DONATE</u>.</a>
                            </li>
                        </ul>
                    </nav>
                </td>
                <td style="width: 50%; text-align: center;">
                    <nav class="round bluenavleft">
                        <ul>
                            <li><a href="">No donation, but I'd like to play...</a></li>
                        </ul>
                    </nav>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top;">
                    <div class="footnote">
                        1 standard credit card transaction fees apply. Change for a 10 pass on 100% of proceeds after transaction fees to hunger-related nonprofits.
                    </div>
                </td>
                <td style="vertical-align: top;">
                    <div class="footnote">
                        2 Participants that play without donating are still eligible to place 1st, 2nd, or 3rd and direct money to a hunger-related charity of their choice, as described in the “Play and Donate” section
                    </div>
                </td>
            </tr>

        </table>

        <form id="paypal" target="_top" action="https://www.paypal.com/cgi-bin/webscr" method="post">

            <!-- Identify your business so that you can collect the payments. -->
            <input type="hidden" name="business" value="scott.butler@changefora10.org">
            <input type="hidden" name="address_override" value="1">
            <input type="hidden" name="email" value="jay.nathan@blackbaud.com">

            <!-- Specify a Donate button. -->
            <input type="hidden" name="cmd" value="_donations">

            <!-- Specify details about the contribution -->
            <input type="hidden" name="amount" value="1.00">
            <input type="hidden" name="item_name" value="Hoops for Hunger Donation">

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

            <input type="hidden" name="cancel_" value="http://www.changefora10.org/paymentcancel.php">

            <!-- input type="submit" value="submit" -->
            <!-- Display the payment button. -->
            <!-- input type="image" name="submit" border="0" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" alt="PayPal - The safer, easier way to pay online">
            <img alt="" border="0" width="1" height="1" src="https://www.paypal.com/en_US/i/scr/pixel.gif" -->

        </form>


<?php
include("cfatfooter.php");
?>
