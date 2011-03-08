<?php
// session_start();
// date_default_timezone_set('America/Los_Angeles');

include("cfatheader.php");

?>
        <h1>Welcome to Change for a 10</h1>
        <div>
            <p>Enter the Pool, Fight Hunger.</p>
            
        </div>
        <div>

            <table style="width: 100%; border: none">
                <tr>
                    <td>
                        <p>
                            Why not donate $10 this year to play our pool and fight hunger, instead of paying $10 to enter the office pool?
                            <input id="submit" class="btn_donate" name='donate' type='button' value='Donate $10 and Play' onclick="document.forms.paypal.submit();return false;"/>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="text-align: center; width: 80%;">
                            <tr>
                                <td style="width: 50%;">
                                    <div class="question">
                                        What will you win?
                                    </div>
                                    <div class="normaltext">
                                        The joy of contributing $10 to something meaningful instead of
                                        "donating" it to the office pool.
                                    </div>
                                    <div class="normaltext">
                                        100% of donations to Hoops to Fight Hunger are directed to hunger-related
                                        nonprofit organizations.
                                    </div>
                                    <div class="normaltext">
                                        We won't keep a nickel, and we're OK with that. You won't win a nickel, and we
                                        hope you're okay with that, too!
                                    </div>
                                </td>
                                <td style="width: 50%;">
                                    <div class="question">
                                        Which organizations benefit?
                                    </div>
                                    <div class="normaltext">
                                        The 1st (60%), 2nd (30%) and 3rd (10%) place winners' hunger-related charities of their choice.
                                    </div>
                                    <div class="question">
                                        Do I have to donate to play or win?
                                    </div>
                                    <div class="normaltext">
                                        No way, but if you don't donate, no money gets raised; no hungry people are fed, so
                                        nobody <b><i>really</i></b> wins.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

        </div>

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
