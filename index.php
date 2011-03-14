<?php
    include("cfatheader.php");
?>
        <h1>Hoops to Fight Hunger - A <i>Change for a 10</i> event</h1>

        <table style="width: 100%">
            <tr>
		<td style="vertical-align: top; width: 50%">
                    <br/>
                    <p style="color: #000000; font-weight: bold; font-size: 16pt;">
                        For you $10 = 1 meal
                    </p>
                    <p style="color: #000000; font-weight: bold; font-size: 16pt;">
                        For them $10 = 1 <font style="text-decoration: underline">week</font> of meals
                    </p>
                    <p style="color: #000000; font-weight: bold; font-size: 16pt;">
                        Let's bring some sanity back to March Madness
                    </p>
                    <table style="padding: 0px;">
                        <tr>
                            <td style="color: #000; vertical-align: middle; text-align: right; font-size: 14pt;">
                                Sounds good to me. Let's go!
                            </td>
                            <td>
                                <img src="images/arrow.png" alt="">
                            </td>
                        </tr>
                    </table>
		</td>
                <td style="vertical-align: top; width: 50%">
                    <div class="unit size1of2">
                        <!--div class="in15"-->
                            <div id="error" class="error">
                                There was a problem with your registration.
                            </div>
                            <form action='registrationcontroller.php' id='registerform' method='post' name='tryit'>
                                <input name="action" id="action" value="register" type="hidden"/>
                                <br/>
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <!-- label for='email'>Email</label-->
                                        <div class="formlabel">Email</div>
                                        <input class='required big two-column' id='registerusername' name='registerusername' type='email' value='' />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div  class="formlabel">Password</div>
                                        <input class='required big one-column' id='registerpassword' name='registerpassword' type='password' value='' />
                                    </td>
                                    <td>
                                        <div  class="formlabel">Confirm Password</div>
                                        <input class='required big one-column' id='registerconfirmpassword' name='registerconfirmpassword' type='password' value='' />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <sub style="color: #000;">
                                            At least 6 characters, including a number / special character
                                        </sub>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input id="submit" class="btn_join" name='submit' type='submit' value='Join Now' />
                                        <br/>
                                        <br/>
                                    </td>
                                    <td>
                                        ...Or <a href="login.php">log in now</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p style="font-size: 10pt;">
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
                    <hr style="width=80%; height: 1px; margin: auto;">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table style="width: 90%">
                        <tr>
                            <td>
                                <!-- div class="unit size1of2">
                                    <div class="in15">
                                        <p style="font-size: 10pt"-->
                                            <img src="images/HoopsToFightHunger_SignInPa.jpg" alt="Hoops to Fight Hunger, 2011"/>
                                        <!-- /p>
                                    </div>
                                </div -->
                            </td>
                            <td style="vertical-align: top">
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
                        
                        // TODO: Show dialog box here
                    } else {
                        // don't submit form unless everything is valid
                        return false;
                    }
                });
            });

        </script>

<?php
	include("sidebar.php");
	include("cfatfooter.php");
?>
