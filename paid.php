<?php
include("header.php");

$closed = "SELECT closed FROM `meta` WHERE id=1 LIMIT 1";
$closed = mysql_query($closed,$db); //boolean if bracket submission is over
if(!($closed = @mysql_fetch_array($closed))) {//if fetching the array fails, prompt configuration
	echo "Please <a href=\"admin/install.htm\">configure the site.</a>\n";
	exit();
}

$query = "SELECT name FROM `brackets` WHERE paid=0 ORDER BY name"; //select names of unpaid entrants
$unpaid = mysql_query($query,$db);

$query = "SELECT name FROM `brackets` WHERE paid=1 ORDER BY name"; //select names of paid entrants
$paid = mysql_query($query,$db);

$query = "SELECT name FROM `brackets` WHERE paid=2 ORDER BY name"; //select names of exempted entrants
$exempt = mysql_query($query,$db);
?>
		
		<div id="main">
			<div class="right_side">
				
								<?php include("sidebar.php"); ?>

			</div>
			<div class="left_side">
				<h2>The Paid List </h2>
				<h3>HAVE YOU PAID YET? </h3>
					<?php
					$row=mysql_fetch_row($unpaid);
					if($row[0] != NULL)
					{
						echo "<h4>Unpaid</h4>\n";
						echo "<ul>\n";
					   	echo "<li>".stripslashes($row[0])."</li>\n";
						while ($row=mysql_fetch_row($unpaid)){
   						   	echo "<li>".stripslashes($row[0])."</li>\n";
						}
						echo "</ul>\n";
					}
					$row=mysql_fetch_row($paid);
					if($row[0] != NULL)
					{
						echo "<h4>Paid</h4>\n";
						echo "<ul>\n";
					   	echo "<li>".stripslashes($row[0])."</li>\n";						
						while ($row=mysql_fetch_row($paid)){
							echo "<li>".stripslashes($row[0])."</li>\n";
						}
						echo "</ul>\n";
					}

					$row=mysql_fetch_row($exempt);
					if($row[0] != NULL)
					{
						echo "<h4>Exempted</h4>\n";
						echo "<ul>\n";
						echo "<li>".stripslashes($row[0])."</li>\n";						
						while ($row=mysql_fetch_row($exempt)){
   						   	echo "<li>".stripslashes($row[0])."</li>\n";
						}
						echo "</ul>\n";
					}

					?>
			</div>
			
		</div>
		
		<div id="footer">
		</div>
	</div>
</body>
</html>
