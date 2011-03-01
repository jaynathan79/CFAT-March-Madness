<!DOCTYPE html>
<html>
<head>
  	<title>[TITLE]</title>
	<!--
	<link href='css/blueprint/screen.css' media='screen' rel='stylesheet' type='text/css' />
	-->
	<link href='css/custom.css' media='screen' rel='stylesheet' type='text/css' />
	
	<!-- wijmo -->
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="http://cdn.wijmo.com/themes/aristo/jquery-wijmo.css" rel="stylesheet" type="text/css" />
    <link href="http://cdn.wijmo.com/jquery.wijmo-open.1.0.1.css" rel="stylesheet" type="text/css" />
    <link href="http://cdn.wijmo.com/jquery.wijmo-complete.1.0.1.css" rel="stylesheet"
        type="text/css" />
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
	
	
</head>
<body>
	<div class="container">
		<header>
			<img src="images/cfattemplogo.png" border="0">
			<nav class="round login">
				<ul>
					<li><a href="/">Login</a></li>
				</ul>
			</nav>	
			<nav class="round">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="/">Blog</a></li>
				</ul>
			</nav>
			
		</header>
		
		<section class="round content">
			<div id="padded">
				
		<!-- end header -->