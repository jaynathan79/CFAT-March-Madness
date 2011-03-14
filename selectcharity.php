<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

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
                <option value="Local Feeding America Food Bank">Local Feeding America Food Bank</option>
                <option value="Local Meals on Wheels">Local Meals on Wheels</option>
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