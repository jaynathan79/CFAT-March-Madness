<?php
    include("cfatheader.php");
?>
        <h1>Thanks for signing up! Next steps... </h1>

        <table style="width: 100% color: #000000;">
            <tr>
		<td style="vertical-align: top; width: 100%">
                    <div class="unit size1of2">
                        <div class="in15">
                            <form action='registrationcontroller.php' id='registerform' method='post' name='tryit'>
                                <input name="action" id="action" value="register" type="hidden"/>
                            <table>
                                <tr>
                                    <td>
                                        <div style="font-size: 16pt; color: #000000;">
                                            1. Choose your favorite charity
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" color: #000000;">
                                        <div id="charityselectedmsg" class="valid" style="width: 75%;">
                                            Your selection has been saved!
                                        </div>
                                        If you place in the top 3 within the tournament, you get to choose how to spend the money.
                                        Here are your choices:<br/>
                                        
                                        <table>
                                            <tr>
                                                <td>
                                                    <select id="charityselector" name="charityselector">
                                                        <option value="-1">Choose one...</option>
                                                        <option value="Local Feeding America Chapter">Local Feeding America Chapter</option>
                                                        <option value="Local Meals on Wheels Chapter">Local Meals on Wheels Chapter</option>
                                                        <option value="Other">Specify Other...</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="required big two-column" type="text" name="writeincharity" id="writeincharity" value=""/>
                                                </td>
                                            <tr>
                                                <td>
                                                    <input type="button" class="btn_join" id="charityselectbutton" value="Save Selection" name="charityselectbutton"/>
                                                </td>
                                                <td style="vertical-align: top; font-weight: bold; color: #FF0000;">
                                                    <span id="inputotherprompt" style="visibility: hidden;" name="inputotherprompt">
                                                        Please specify other, or choose a charity from the list.
                                                    </span>
                                                </td>
                                            </tr>
                                                
                                        </table>
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="font-size: 16pt; color: #000000;">
                                            2. Recruit your friends
                                            <br/>
                                            <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.changefora10.org/index.php" show_faces="true" width="450" font="arial"></fb:like>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul style=" color: #000000;">
                                            <li>Share on Facebook wall</li>
                                            <li>Like Hoops to Fight Hunger on Faceboook</li>
                                            <li>Tweet about it!</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="font-size: 16pt; color: #000000;">
                                            3. Make your picks
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" color: #000000;">
                                        The stage is set, and your bracket is ready. If you have not already received an email from us, we'll be sending
                                        you one shortly.
                                    </td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>
		</td>
                <td style="vertical-align: top; width: 0%">
                    <div class="unit size1of2">
                        <div class="in15">
                            <!-- div style="font-size: 14pt">Join us now!</div>
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

                            <h5 class='top10'>
                                <a href='/learnmore' title='Learn More'>Tell me more...</a>
                            </h5>
                        </div-->
                    </div>
                </td>
            </tr>
        </table>

        <script type="text/javascript" language="javascript">

            $(document).ready(function(){
                $("#charityselectedmsg").hide();
                // set status of write in charity box to disabled
                //$("#writeincharity").attr('disabled', true);
                $("#writeincharity").hide();
                $("#inputotherprompt").hide();

                $('#charityselectbutton').click(function(event){
                    var data = {};
                    if($('#charityselector').val() == "-1")
                        return false;
                    
                    if($('#charityselector').val() == "Other"){
                        if($('#writeincharity').val() == ""){
                            $('#inputotherprompt').fadeIn(3000);
                            $('#inputotherprompt').fadeOut(3000);
                            return false;
                        }
                        data['charity'] = $('#writeincharity').val();
                    } else {
                        data['charity'] = $("select#charityselector").val();
                    }
                                      
                    $.ajax({
                       url: 'saveusercharity.php',
                       dataType: 'json',
                       data: data,
                       async: false,
                       success: function(jd){

                            if(jd.isvalid){
                                $("#charityselectedmsg").html(jd.message);
                                //$("#charityselectedmsg").show();
                                //$("#charityselectedmsg").hide();
                                $("#charityselectedmsg").fadeIn(2000);
                                $("#charityselectedmsg").fadeOut(3000);

                               // $("#charityselectedmsg").effect("shake", {times:1}, 100);
                                return true;
                            } else {
                                return false;
                            }
                       },
                       error: function(jq, textStatus, e) {alert("error: " + e);}
                    });
                });

                $('#charityselector').change(function(event){

                    if($('#charityselector').val() == 'Other'){
                        // $('#writeincharity').addClass('bigfocus');
                        // $('#writeincharity').attr('disabled', false);
                        $("#writeincharity").show();
                        $('#writeincharity').focus();
                    } else {
                        // $('#writeincharity').removeAttr('disabled');
                        // $('#writeincharity').removeClass('bigfocus');
                        $("#writeincharity").hide();
                    }
                    
                });

                $('#writeincharity').blur(function(event){
                    $('#writeincharity').removeClass('bigfocus');

                });
            });

        </script>

<?php
    include("cfatfooter.php");
?>
