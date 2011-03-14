<?php
include("admin/database.php");
include("bracket_functions.php");
session_start();

// these variables should be available to every page which includes cfatheader
$userid = (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) ? $_SESSION['userid'] : "";
$useremail = (isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])) ? $_SESSION['useremail'] : "";
// $ispaid = (isset($_SESSION['ispaid']) && !empty($_SESSION['ispaid'])) ? $_SESSION['ispaid'] : false;
$ispaid = isPaid($userid);
$loggedin = (isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])) ? $_SESSION['loggedin'] : false;
$isadmin = (isset($_SESSION['isadmin']) && !empty($_SESSION['isadmin'])) ? $_SESSION['isadmin'] : false;



?>

<!DOCTYPE html>
<html>
<head>
  <title>Hoops for Hunger by Change for a 10</title>
<link href='css/blueprint/screen.css' media='screen' rel='stylesheet' type='text/css' />
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

        <link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="js/jquery.min.1.4.js"></script>
  <script src="js/jquery-ui.min.1.8.js"></script>

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
        <script type="text/javascript">

          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-17444271-3']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

        </script>
	<script type="text/javascript" src="js/submitwhatif.js"></script>

	
	
</head>
<body>
        <img src="images/cfattemplogo.png" class="noprint"" alt="Change for a 10" style="position:absolute; top: 25px; left: 25px; right: 0px; z-index: 1000;" />
        <div class="container">

            <header class="header">
                 
                <table class="round noprint" style="width: auto; float: right; background: #ffffff url('images/diagonal-gray.png');">
                            <tr>
                                <td style="color: #000; vertical-align: middle; text-align: right;">
                                    <a href="home.php">home</a> |
                                    <a href="faq.php">faq</a> |
                                    <a style="font-weight: bold;" href="welcome.php">donate!</a> |
                                
                                    <?php
                                        if($loggedin == false) {
                                            echo "<a href='./login.php'>log in</a>";
                                        } else {
                                            echo "<a class='noprint' href='./logout.php'>log out</a>: Logged in as ".$useremail;
                                        }
                                    ?>
                                </td>
                            </tr>
                </table>
                <br/>
		</header>
		
		<!-- section class="round content" -->
                <section class="round content" style="background: #ffffff url('images/diagonal-gray.png');'">
                      

                        <div id="padded">
                            
                            
		<!-- end header -->
