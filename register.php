<?php
    include("cfatheader.php");
?>
        <h1>Create Your Change for a 10 Account</h1>

        <table style="width: 100%">
            <tr>
		<td style="vertical-align: top; width: 50%">

                    <div class="unit size1of2">
                        <div class="in15">
                            <div id="error" class="error">
                                There was a problem with your registration.
                            </div>
                            <form action='registrationcontroller.php' id='registerform' method='post' name='tryit'>
                                <input name="action" id="action" value="register" type="hidden"/>
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <!-- label for='email'>Email</label-->
                                        <div style="font-size: 12pt">Email</div>
                                        <input class='required big two-column' id='registerusername' name='registerusername' type='email' value='' />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="font-size: 12pt">Password</div>
                                        <input class='required big one-column' id='registerpassword' name='registerpassword' type='password' value='' />
                                    </td>
                                    <td>
                                        <div style="font-size: 12pt">Confirm Password</div>
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
                                        &nbsp;
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
                        </div>
                    </div>
				
		</td>
                <td style="vertical-align: top; width: 50%">
                    <div class="unit size1of2">
                        <div class="in15">
                            <div style="font-size: 14pt">This month's event:</div>
                            <p style="font-size: 10pt">
                                <img src="images/HoopsToFightHunger_SignInPa.jpg" alt="Hoops to Fight Hunger, 2011"/>
                            </p>
                            <p>
                                Pick all 63 games correctly and we’ll donate an additional $10,000 to the hunger-related charity of your choice!
                            </p>
                            
                        </div>
                    </div>
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
