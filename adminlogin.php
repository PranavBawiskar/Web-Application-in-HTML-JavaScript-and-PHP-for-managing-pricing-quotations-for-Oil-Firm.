<?php
//STARTING SESSION OF THE ADMIN
session_start();
?>

<html>
	<head>
		<title>Admin Login</title>
	 	<link rel="stylesheet" href='adminloginstyle.css'>
			<! INCLUDING THE LATO FONT, href IS THE LINK TO THE GOOGLE FONT >
		  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
			<! ENCODING USED IS UTF-8 >
		  <meta charset="utf-8">
			<! THIS WILL HELP THE PAGES TO RUN ON EVERY DEVICE >
		  <meta name="viewport" content="width=device-width, initial-scale=1">
			<! WE BASICALLY WANTED TO USE BOOTSTRAP FOR NAVBAR AND HENCE THE 3 LINKS TO THE SAME >
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

	<body>
		<! THE NAVBAR >
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
		  	<div class="navbar-header">
		    	<a id="headings"class="navbar-brand" href="#">FUEL & CO.</a>
		    </div>
		    <ul class="nav navbar-nav">
					<li><a id="headings" href="login.php">Login</a></li>
					<! THE CLASS ACTIVE ALLOWS THE TAB TO BE HIGHLIGHTED IN THE NAVBAR MEANING THAT WE ARE CURRENTLY ON THAT TAB >
		    	<li class="active"><a id="headings"href="adminlogin.php">Admin Login</a></li>
		    	<li><a id="headings"href="#">About Us</a></li>
		    	<li><a id="headings"href="#">Contact Us</a></li>
		    </ul>
				<ul class="nav navbar-nav navbar-right">
					<! RIGHT PART OF THE NAVBAR HAVING THE GLYPHICON FOR LOGIN >
		      <li><a id="headings"href="login.php"><span class="glyphicon glyphicon-log-in"></span> LOGIN </a></li>
		    </ul>
			</div>
		</nav>

		<div class="login-page">
		  <div class="form">
				<! ACTION BELOW REDIRECTS THE CONTROL OF THE FORM TO THE adminvalidation.php WHICH HAS THE VALIDATION LOGIC >
				<! METHOD FIELD HAS BEEN SET TO POST BECAUSE WE WANT THE VALUES TO BE HIDDEN FROM THE URL WHICH OTHERWISE OCCURS IF METHOD IS SET TO GET >
				<form class="login-form" action="adminvalidation.php" method="post">
			    <h3>Admin Login</h3>
		      <input type="text" name="username" placeholder="Username*" required="True"/>
		      <input type="password" name="password" placeholder="Password*" required="True"/>
		      <button type="submit" name="login" class="btn">Login</button>
		    </form>
			</div>
		</div>
	</body>
</html>

