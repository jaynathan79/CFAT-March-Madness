<?php
// session_start();
// date_default_timezone_set('America/Los_Angeles');

include("cfatheader.php");

?>
        <h1>Welcome to Change for a 10</h1>
        <table style="width: 100%">
            <tr>
		<td style="vertical-align: top;" colspan="2">
                    <input id="submit" class="btn_donate" name='donate' type='button' value='Donate $10 and Play' onclick="document.forms.paypal.submit();return false;"/>
                    <br/><br/>
                    <!--div style="font-size: 16pt;">This month...</div-->
                    <div style="text-align: center;">
                        <a onclick="document.forms.paypal.submit();return false;" href="#">
                            <img src="images/Banner_WelcomePage.jpg">
                        </a>
                        <!-- img src="http://placekitten.com/850/200" -->
                    </div>
                </td>
            </tr>
            <!--tr>
                <td colspan="2">
                    <div class="bluebold">
                        Pick all 63 games correctly and we’ll donate an additional $10,000 to your hunger-related charity!
                    </div>
                </td>
            </tr-->
            <tr>
                <td style="text-align: left; width: 100%; ">
                    <input id="submit" class="btn_donate" name='donate' type='button' value='Donate $10 and Play' onclick="document.forms.paypal.submit();return false;"/>
                    <a style="font-size: 9pt; font-style: italic;" onclick="return false;" class="wijtooltip" title="It's true, I do have a tooltip!" href="#">Can I play if i don't donate?</a>
                    <!--a onclick="document.forms.paypal.submit();return false;" href="#">Donate $10 and Play</a-->
                </td>
            </tr>
        </table>

        <form id="paypal" target="_top" action="https://www.paypal.com/cgi-bin/webscr" method="post">

            <!-- Identify your business so that you can collect the payments. -->
            <input type="hidden" name="business" value="scott.butler@changefora10.org">
            <input type="hidden" name="address_override" value="1">
            <!-- this is the users email address on the account -->
            <input type="hidden" name="email" value="<?php echo $useremail; ?>">

            <!-- Specify a Donate button. -->
            <input type="hidden" name="cmd" value="_donations">

            <!-- Specify details about the contribution -->
            <input type="hidden" name="amount" value="1.00">
            <input type="hidden" name="item_name" value="Hoops to Fight Hunger Donation">

            <!-- custom variable is passed back to us - we pass in userid -->
            <input type="hidden" name="custom" value="<?php echo $userid; ?>">

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
