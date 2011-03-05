<div id="subheader">
	<div id="menu">
	  	<ul>
			<li><a href="index.php">HOME</a></li>
			<li><a href="submit.php">CREATE BRACKET</a></li>
			<li><a href="rules.php">RULES</a></li>
			<li><a href="choose.php">STANDINGS</a></li>
			<?php if($meta['cost'] != 0) { ?>
			<li><a href="paid.php">PAYMENT TRACKER</a></li>
			<?php } ?>
			<?php if($meta['mail'] != 0 ) { ?>
			<li><a href="contact.php">CONTACT</a></li>
			<?php } ?>
		</ul>
	</div>
</div>