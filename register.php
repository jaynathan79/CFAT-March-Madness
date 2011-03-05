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
                                        <input id="submit" class="btn_join" name='submit' type='submit' value='Signup' />
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
                            <div style="font-size: 14pt">Join us now!</div>
                            <p style="font-size: 10pt">
                                What can a $10 donation from one person really accomplish? What difference will adding 10 of your friends really have?
                            </p>
                            <p style="font-size: 10pt">
                                How quickly can one nonprofit attract a network of passionate supporters so large that it can do big things through small donations?
                            </p>

                            <div style="font-size: 14pt">Inaugural “Hoops to Fight Hunger” Event</div>
                            <p style="font-size: 10pt; ">
                                Change for a 10 is about much more than a basketball pool to raise money for hunger-related nonprofits.
                            </p>
                            <p style="font-size: 10pt; ">
                                Before we have our “big launch” later this year, we wanted to have a little fun with “March Madness”.
                                <br/><br/>
Let's see how many people we can get to join a pool where you donate $10 to fight hunger as opposed to paying $10 for an office pool.
                            </p>

                            <h3 class='top10'>
                                <a href='/learnmore' title='Learn More'>Learn More</a>
                            </h3>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <script type="text/javascript" language="javascript">

            function stopEvent(e) {
                if (e.stopPropagation) e.stopPropagation();
                else e.cancelBubble = true;

                if (e.preventDefault) e.preventDefault();
                else e.returnValue = false;
            }

            $(document).ready(function(){
                $("#error").hide();

                // $('#registerform').submit(function(event){
                $('#submit').click(function(event){
                    /*if(event.originalEvent.originalEventTarget.id == "submit"){
                        if()
                    }*/
                
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
                        $("#registerform").submit();
                    } else {
                        return false;
                    }
                });
            });

        </script>

<?php
    include("cfatfooter.php");
?>
