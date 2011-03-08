<?php
include("cfatheader.php");
include("menu.php");
include("admin/functions.php");
 
$query = "SELECT * FROM `blog` ORDER BY id DESC LIMIT 3";
$blog = mysql_query($query,$db);

$query = "SELECT c.time, c.content, c.from, c.bracket, b.name, b.person  FROM `comments` c, `brackets` b WHERE b.id = c.bracket ORDER BY c.time DESC";
$comments = mysql_query($query,$db);

if($blog == NULL) {
	echo "Please <a href=\"admin/install.htm\">configure the site <br />
               AFTER setting up admin/database.php to point to your database.</a>\n";
	exit();
}
?>
	
		
			
				<?php
                if(isset($_SESSION['success'])) {
				?>
                <div class="success"><?php echo $_SESSION['success']?></div>
				<?php
				}
				if(isset($_SESSION['errors'])) { 
				?>
                <div class="errors"><p><em>Errors:</em></p><?php echo $_SESSION['errors']?></div>
				<?php
				}
				unset($_SESSION['errors']);
				unset($_SESSION['success']);
				
				while ($post = mysql_fetch_row($blog)){
					echo "<h2>$post[1]</h2>\n";
					echo "<h3>$post[2]</h3>\n";
					echo "$post[3]\n";
					echo "<p class=\"date\">$post[4]</p>\n";
				}
			?>
				<br />
			
		
<?php
	include("cfatfooter.php");
?>