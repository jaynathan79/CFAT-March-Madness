<?php
    include("cfatheader.php");
?>
        <h1>Thanks for signing up! Here's what's next... </h1>

        <table style="width: 100%">
            <tr>
		<td style="vertical-align: top; width: 65%">
                    <div class="unit size1of2">
                        <div class="in15">
                            <form action='registrationcontroller.php' id='registerform' method='post' name='tryit'>
                                <input name="action" id="action" value="register" type="hidden"/>
                            <table>
                                <tr>
                                    <td>
                                        <div style="font-size: 16pt;">
                                            1. Choose your favorite charity
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="charityselectedmsg" class="valid" style="width: 75%;">
                                            Your selection has been saved!
                                        </div>
                                        If you place in the top 3 within the tournament, you get to choose how to spend the money.
                                        Here are your choices:<br/>
                                        <select id="charityselector" name="charityselector">
                                            <option value="charity 1">charity 1</option>
                                            <option value="charity 2">charity 2</option>
                                            <option value="charity 3">charity 3</option>
                                        </select><br/>
                                        <input type="button" id="charityselectbutton" value="Save Selection" name="charityselectbutton">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="font-size: 16pt;">
                                            2. Recruit your friends
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul>
                                            <li>Share on Facebook wall</li>
                                            <li>Like Hoops to Fight Hunger on Faceboook</li>
                                            <li>Tweet about it!</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="font-size: 16pt;">
                                            3. Make your picks
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Your bracket will be ready on <B>[DATE]</B>. We'll send you and email
                                        reminder to come back and make your picks.
                                    </td>
                                </tr>
                            </table>
                            </form>
                        </div>
                    </div>
		</td>
                <td style="vertical-align: top; width: 35%">
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

                $('#charityselectbutton').click(function(event){

                    var data = {};
                    data['charity'] = $("select#charityselector").val();

                    $.ajax({
                       url: 'saveusercharity.php',
                       dataType: 'json',
                       data: data,
                       async: false,
                       success: function(jd){

                            if(jd.isvalid){
                                $("#charityselectedmsg").html(jd.message);
                                $("#charityselectedmsg").show();
                                $("#charityselectedmsg").hide();
                                $("#charityselectedmsg").fadeIn(2000);

                               // $("#charityselectedmsg").effect("shake", {times:1}, 100);
                                return true;
                            } else {
                                return false;
                            }
                       },
                       error: function(jq, textStatus, e) {alert("error: " + e);}
                    });
                });
            });

        </script>

<?php
    include("cfatfooter.php");
?>
