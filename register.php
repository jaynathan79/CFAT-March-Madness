<?php
    include("cfatheader.php");
?>
        <h1>Create Your Change for a 10 Account</h1>

        <table style="width: 100%">
            <tr>
		<td style="vertical-align: middle; width: 50%">
                    
                    <p style="color: #000000; font-weight: bold; font-size: 12pt;">
                        What can a $10 donation really accomplish?
                    </p>
                    <p style="color: #000000; font-weight: bold; font-size: 12pt;">
                        Will recruiting 10 friends really help?
                    </p>
                    <p style="color: #000000; font-weight: bold; font-size: 12pt;">
                        How quickly can we connect, engage, and have an impact? 
                    </p>
                    <div style="vertical-align: middle; text-align: right; color: #000000; font-weight: bold; font-size: 24pt;">
                        Let's Find Out!! >>> <!-- img src="images/Arrow-64.png" alt="Let's Find Out!!"-->
                    </div>
				
		</td>
                <td style="vertical-align: top; width: 50%">
                    <div class="unit size1of2">
                        <!--div class="in15"-->
                            <div id="error" class="error">
                                There was a problem with your registration.
                            </div>
                            <form action='registrationcontroller.php' id='registerform' method='post' name='tryit'>
                                <input name="action" id="action" value="register" type="hidden"/>
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <!-- label for='email'>Email</label-->
                                        <div style="font-weight: bold; font-size: 10pt">Email</div>
                                        <input class='required big two-column' id='registerusername' name='registerusername' type='email' value='' />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="font-weight: bold; font-size: 10pt">Password</div>
                                        <input class='required big one-column' id='registerpassword' name='registerpassword' type='password' value='' />
                                    </td>
                                    <td>
                                        <div style="font-weight: bold; font-size: 10pt">Confirm Password</div>
                                        <input class='required big one-column' id='registerconfirmpassword' name='registerconfirmpassword' type='password' value='' />
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
                                        <input id="submit" class="btn_join" name='submit' type='submit' value='Create Account' /> 
                                        <br/>
                                        <br/>
                                    </td>
                                    <td>
                                        ...Or <a href="login.php">log in now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>
                                            By clicking this button you acknowledge our <a href="privacy.php" target="_blank">Privacy Policy</a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            </form>
                        <!-- /div -->
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table style="width: 90%">
                        <tr>
                            <td>
                                <div class="unit size1of2">
                                    <div class="in15">
                                        <div style="font-size: 16pt">This Month's Featured Event</div>
                                        <p style="font-size: 10pt">
                                            <img src="images/HoopsToFightHunger_SignInPa.jpg" alt="Hoops to Fight Hunger, 2011"/>
                                        </p>
                                        <p>
                                            Pick all 63 games correctly and we’ll donate an additional $10,000 to the hunger-related charity of your choice!
                                        </p>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <p>
                                    <b>Change for a 10</b> is about much more than a one-time pool to raise money for
                                    hunger-related profits.
                                </p>
                                <p>
                                    But before our official launch later this year, we want to have a little fun...
                                    and pose this question...
                                </p>
                                <p>
                                    Will you donate $10 this year to play our pool to fight hunger, instead of paying $10
                                    to enter your office pool?
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <script type="text/javascript" language="javascript">

            $(document).ready(function(){
                $("#error").hide();

                $('#submit').click(function(event){
                
                    var isvalid = false;

                    var data = {};
                    data['username'] = $("input#registerusername").val();
                    data['password'] = $("input#registerpassword").val();
                    data['confirmpassword'] = $("input#registerconfirmpassword").val();

                    /* $.getJSON('validateregistration.php', data, function(jd){
                        isvalid = jd.isvalid;
                        if(!jd.isvalid){
                            $("#error").html(jd.errormessage);
                            $("#error").show();
                            $("#error").effect("shake", {times:1}, 100);
                            return false;
                        }
                   }); */

                   $.ajax({
                       url: 'validateregistration.php',
                       dataType: 'json',
                       data: data,
                       async: false,
                       success: function(jd){
                            isvalid = jd.isvalid;
                            if(!jd.isvalid){
                                $("#error").html(jd.errormessage);
                                $("#error").show();
                                $("#error").effect("shake", {times:1}, 100);
                                return false;
                            } else {
                                isvalid = true;
                                return true;
                            }
                       }
                   }); 
                    
                    if (isvalid){
                        // submit form once everything is confirmed valid from the server.
                        $("#registerform").submit();
                    } else {
                        // don't submit form unless everything is valid
                        return false;
                    }
                });
            });

        </script>

<?php
    include("cfatfooter.php");
?>
