<?php
// session_start();
// date_default_timezone_set('America/Los_Angeles');

include("cfatheader.php");

?>
        <h1 style="text-align: left;">Welcome to Change for a 10!</h1>
        <div style="text-align: left; color: #000000; font-size: 15pt; font-weight: normal;"> &nbsp;&nbsp;
            Enter the Pool. Fight Hunger. Are you in?&nbsp;&nbsp;&nbsp;
                <input id="submit" class="btn_donate" name='donate' type='button' value='Yes! Donate $10 and Play'/>
        </div>
        <div>

            <table style="width: 100%; border: none">
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td align="center" style="">
                        <table align="center" style="margin-left: auto; margin-right: auto; width: 95%;">
                            <tr>
                                <td style="width: 50%; vertical-align: top; ">
                                    <p class="question">
                                        What will you win?
                                    </p>
                                    <p class="normaltext">
                                            Nothing.
                                    </p>
                                    <p class="normaltext">
                                        
                                            100% of donations will be directed to three hunger-related charities.
                                    </p>
                                    <p class="normaltext">
                                           We won't keep a nickel, and you won't win a nickel either.
                                    </p>
                                </td>
                                <td style="width: 50%; vertical-align: top;">
                                    <p class="question">
                                        Which hunger-related organizations benefit?
                                    </p>
                                    <p class="normaltext">
                                        The organizations chosen by the 1st, 2nd, and 3rd place winners of the pool.
                                    </p>
                                    <p class="question">
                                        Do I have to donate to play or win?
                                    </p>
                                    <p class="normaltext">
                                        No. But if you don't donate, no money gets raised. No hungry people are fed. So
                                        nobody <b><i>really</i></b> wins.
                                    </p>
                                </td>
                            </tr>


                            <tr>
                                <td colspan="2">
                                    <div class="info2">
                                        Pick all 63 games correctly and your chosen charity will receive an additional
                                        $10,000 contribution from Change for a 10 (above and beyond what is raised by the
                                        pool!).
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                                <td style="text-align: right; font-size: 10pt;">
                                    <a href="nextsteps.php">Click here to play without donating</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        
        <div id="dialog-message" title="Dialog Title" style="display: none;">
            <p>
                You will now be taken to PayPal to make a secure, one-time donation to Change for a 10
                for the Hoops to Fight Hunger campaign.
            </p>
            <p>
                Please follow the instructions and pay with your credit card or Paypal account.
                After payment click the <b>Return to Change for a 10, Inc.</b>
                button to return to our site.
            </p>
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
            <input type="hidden" name="amount" value="10.00">
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

         <script type="text/javascript" language="javascript">

            $(document).ready(function() {

                $("#submit").click(function(){

                    $("#dialog-message" ).dialog({
                        height:250,
                        width: 500,
                        modal: true,
                        position: "center",
                        title: "Change for a 10",
                        show: "slide",
                        closeText: "",
                        buttons: [{
                                    text: "Proceed to Paypal",
                                    click: function() { document.forms.paypal.submit(); $(this).dialog("close"); }
                                },
                                {
                                    text: "Cancel",
                                    click: function() { $(this).dialog("close"); }
                                }]
                    });
                    // $("#dialog").dialog();
                });

            });

        </script>


<?php
include("cfatfooter.php");
?>
