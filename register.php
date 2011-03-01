<?php
include("cfatheader.php");
?>
<h1>Create Your Change for a 10 Account</h1>

<table>
	<tr>
		<td style="vertical-align: top;">
			<form action='authenticationcontroller.php' id='registerform' method='post' name='tryit'>
			    <input name="action" id="action" value="register" type="hidden">

				
				
				<label for="email">Email:</label><br/>
				<input id="email" maxlength="50" name="email" size="25" type="textbox" placeholder="you@yourhost.com" /><br/><br>
				<label for="password">Password:</label><br/>
				<input id="password" maxlength="50" name="password" size="15" type="password" /><br/><br>
				<label for="passwordconfirm">Confim Password:</label><br/>
				<input id="passwordconfirm" maxlength="50" name="passwordconfirm" size="15" type="password" /><br/><br/>

				<button class="ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all" name='submit' type='submit'>
				   <span class="ui-button-text">Join Now!</span>
				</button>
			
			    <p>
			        By clicking this button, you agree to the <a href="/legal/terms" target="_blank">Privacy Policy &amp; Terms of Use</a>
			    </p>
			    
			  </form>
		</td>
		<td style="vertical-align: top;">
			 <h2 class='top20'>Join us now!</h2>
              <p>Change for a $10 is blah blah blah.</p>

              <h3 class='top20'>Did you know?.</h3>
              <p class='bottom0'>Other stuff to tell them.
              <h3 class='top20'>
                <a href='/learnmore' title='Learn More'>Learn More</a>
              </h3>
		</td>
	</tr>
</table>
<?php
include("cfatfooter.php");
?>