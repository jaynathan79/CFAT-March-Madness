<?php
include("cfatheader.php");
?>
<h1>Create Your Change for a $10 Account</h1>

<table>
	<tr>
		<td style="vertical-align: top;">
			<form action='authenticationcontroller.php' id='registerform' method='post' name='tryit'>
			    <input name="action" id="action" value="register" type="hidden">

			    <label for='email'>Email</label><br/>
			    <input class='required big two-column' id='registerusername' name='registerusername' type='email' value='' /><br/>
			    <label for='username'>Name</label><br/>
			    <input class='required big two-column' id='username' name='username' type='text' value='' /><br/>
			    <label for='password'>Password</label><br/>
			    <input class='required big one-column' id='registerpassword' name='registerpassword' type='password' value='' /><br/>
			    <label for='password_confirm' id='confirm'>Confirm Password</label><br/>
			    <input class='required big one-column' id='registerconfirmpassword' name='registerconfirmpassword' type='password' /><br/>
			    <sub>
					At least 6 characters, including a number / special character
			    </sub><br/><br/>
			    <input class="btn_join" name='submit' type='submit' value='Join Us Now!' /><br/>
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