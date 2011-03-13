<?php
include("admin/database.php");
session_start();

// these variables should be available to every page which includes cfatheader
$userid = (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) ? $_SESSION['userid'] : "";
$useremail = (isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])) ? $_SESSION['useremail'] : "";
$ispaid = (isset($_SESSION['ispaid']) && !empty($_SESSION['ispaid'])) ? $_SESSION['ispaid'] : false;
$loggedin = (isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])) ? $_SESSION['loggedin'] : false;
$isadmin = (isset($_SESSION['isadmin']) && !empty($_SESSION['isadmin'])) ? $_SESSION['isadmin'] : false;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Hoops for Hunger by Change for a 10</title>
<!--<link href='css/blueprint/screen.css' media='screen' rel='stylesheet' type='text/css' />-->
<link href='css/custom.css' media='screen' rel='stylesheet' type='text/css' />
<link  href="http://fonts.googleapis.com/css?family=PT+Serif:regular,italic,bold,bolditalic" rel="stylesheet" type="text/css" >
<link  href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,italic,bold,bolditalic" rel="stylesheet" type="text/css" >
<link  href="http://fonts.googleapis.com/css?family=Arimo:regular,italic,bold,bolditalic" rel="stylesheet" type="text/css" >
<!-- wijmo -->
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="http://cdn.wijmo.com/themes/aristo/jquery-wijmo.css" rel="stylesheet" type="text/css" />
    <link href="http://cdn.wijmo.com/jquery.wijmo-open.1.0.1.css" rel="stylesheet" type="text/css" />
    <link href="http://cdn.wijmo.com/jquery.wijmo-complete.1.0.1.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.3.min.js" type="text/javascript"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
    <script src="http://cdn.wijmo.com/external/jquery.bgiframe-2.1.3-pre.js" type="text/javascript"></script>
    <script src="http://cdn.wijmo.com/external/jquery.glob.min.js" type="text/javascript"></script>
    <script src="http://cdn.wijmo.com/external/jquery.mousewheel.min.js" type="text/javascript"></script>
    <script src="http://cdn.wijmo.com/external/raphael-min.js" type="text/javascript"></script>
    <script src="http://cdn.wijmo.com/jquery.wijmo-open.1.0.1.min.js" type="text/javascript"></script>
    <script src="http://cdn.wijmo.com/jquery.wijmo-complete.1.0.1.min.js" type="text/javascript"></script>

	<script type="text/javascript">
        $(document).ready(function () {
			//Form Decorator
            $(":input[type='text'],:input[type='password'],:input[type='textarea'],:input[type='email']").wijtextbox();
			$( "#repeat" ).buttonset();
		});
	</script>
	
	<!-- from tourney header -->
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/emailall.js"></script>
	<?php
	//if this is the submit or what-if page, include the necessary javascript
	if(strpos($_SERVER['PHP_SELF'],"submit.php") !== FALSE || strpos($_SERVER['PHP_SELF'],"whatif.php") !== FALSE) {
	?>
	<script type="text/javascript" src="js/submitwhatif.js"/>
	<?php } ?>
	<!-- end from tourney header -->
	
	
</head>
<body>
        <img class="noprint" src="images/cfattemplogo.png" alt="Change for a 10" style="position:absolute; top: 25px; left: 25px; right: 0px; z-index: 10;">
        <div class="container">
            <header>

                 <?php
                    if($loggedin == false) {
                        echo "<a href='./login.php' id='login' class='login'>Log In</a>";
                    } else {
                        echo "<span id='login' class='noprint'>Logged in as ".$useremail." <a href='./logout.php' id='login'>(log out)</a><span>";
						//echo "<span class='printonly'>".$useremail."'s Bracket</span>";
                    }
                ?>
            </div>
		</header>
		
		<section class="round content">
			<div id="padded">
                            
		<!-- end header -->
