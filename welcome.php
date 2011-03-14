<?php
// session_start();
// date_default_timezone_set('America/Los_Angeles');

include("cfatheader.php");

?>
        <h1 style="text-align: left;">Welcome to Change for a 10!</h1>
        <div style="text-align: left; color: #000000; font-size: 15pt; font-weight: normal;"> &nbsp;&nbsp;
            Enter the Pool. Fight Hunger. Are you in?&nbsp;&nbsp;&nbsp;
                <!-- input id="submit" class="btn_donate" name='donate' type='button' value='Yes! Donate $10 and Play'/-->
                <?php
                    include('paypal_form.php');
                ?>
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
                                        Pick all games correctly and your chosen charity will receive an additional
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
                                    <a href="/">Click here to play without donating</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        


        

<?php
include("cfatfooter.php");
?>
