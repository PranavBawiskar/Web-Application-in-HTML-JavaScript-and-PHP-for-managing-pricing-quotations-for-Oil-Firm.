<html>
	<head>
		
		<title>Sign Up</title>
		<link rel="stylesheet" href="signupstyle.css">
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
				  <li class="active"><a id="headings" href="#">Sign Up</a></li>      
				  <li><a id="headings"href="#">About Us</a></li>
				  <li><a id="headings" href="#">Contact Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				  <li><a id="headings" href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>
			</div>
		</nav>
		<div class="registration-page">
		  <div class="form">
		    <form class="register-form" action="insert.php" method="post">
		      <h3>Registration</h3>
					<input type="email" name="email" placeholder="Enter the Email" required="True" />
		      <input type="text" name="username" placeholder="Enter the username" required="True" />
		      <input type="password" name="password" placeholder="Enter the password" required="True"/>
		      <button type="submit" name="register" class="btn">Register</button>
		      <p class="message">Registered Already?</p>
					<a style="color:white"id="headings"href="login.php"> Login </a>
		    </form>
		  </div>
		</div>
	</body>
</html>
