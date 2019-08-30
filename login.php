<?php
session_start();
?>
<html>
<head>
  <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
    	<div class="container-fluid">
      	<div class="navbar-header">
        	<a id="headings"class="navbar-brand" href="#">FUEL & CO.</a>
        </div>
        <ul class="nav navbar-nav">
       		<li class="active"><a id="headings" href="login.php">Login</a></li>
          <li><a id="headings"href="adminlogin.php">Admin Login</a></li>
       		<li><a id="headings"href="#">About Us</a></li>
          <li><a id="headings"href="#">Contact Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        	<li><a id="headings"href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        </ul>
       </div>
      </nav>

      <div class="login-page">
      	<div class="form">
         	<form class="login-form" action="validation.php" method="post">
          	<h3>Login</h3>
            <input type="email" name="email" placeholder="Email*" required="True"/>
            <input type="password" name="password" placeholder="Password*" required="True"/>
            <button type="submit" name="login" class="btn">Login</button>
            <p class="message">Haven't Registered yet?<br><br><a style="color: white" href="signup.php">Sign Up</a></p>
           </form>
          </div>
      	</div>
    	</body>
</html>

