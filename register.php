<?php
include("cfatheader.php");
?>
        <h1>Create Your Change for a 10 Account</h1>

        <table style="width: 100%">
            <tr>
		<td style="vertical-align: top; width: 50%">

                    <div class="unit size1of2">
                        <div class="in15">
                            <form action='authenticationcontroller.php' id='registerform' method='post' name='tryit'>
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <label for='email'>Email</label><br/>
                                        <input class='required big two-column' id='registerusername' name='registerusername' type='email' value='' />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for='password'>Password</label><br/>
                                        <input class='required big one-column' id='registerpassword' name='registerpassword' type='password' value='' />
                                    </td>
                                    <td>
                                        <label for='password_confirm' id='confirm'>Confirm Password</label>
                                        <input class='required big one-column' id='registerconfirmpassword' name='registerconfirmpassword' type='password' />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <sub>
                                            At least 6 characters, including a number / special character
                                        </sub>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="btn_join" name='submit' type='submit' value='Join Us Now!' />
                                        <br/>
                                        <br/>
                                    </td>
                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>
                                            By clicking this button, you agree to the <a href="/legal/terms" target="_blank">Privacy Policy &amp; Terms of Use</a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>
				
		</td>
                <td style="vertical-align: top; width: 50%">
                    <div class="unit size1of2">
                        <div class="in15">
                            <h2 class='top20'>Join us now!</h2>
                            <p>
                                Change for a $10 is blah blah blah.
                            </p>
                            <h3 class='top20'>Did you know?.</h3>
                            <p class='bottom0'>
                                Other stuff to tell them.
                            </p>
                            <h3 class='top20'>
                                <a href='/learnmore' title='Learn More'>Learn More</a>
                            </h3>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
<?php
include("cfatfooter.php");
?>
