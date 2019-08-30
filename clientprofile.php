<?php
session_start();
//BY CHECKING IF THE SESSION VARIBALE IS SET TO THE USERNAME, WE PRESERVE THE SESSION FOR THAT SPECIFIC USER AND IF IT IS NOT PRESERVED, WE REDIRECT TO THE LOGIN PAGE
if(!isset($_SESSION['username']))
header('location:login.php');
?>

<html>
	<head>
		<title>Profile Form</title>
		<link rel="stylesheet" href="clientprofilestyle.css">   		  
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
		    <li class="active"><a id="headings" href="clientprofile.php">Profile</a></li>
		    <li><a id="headings"href="#">About Us</a></li>
		    <li><a id="headings"href="#">Contact Us</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
		    <li><a id="headings"href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		  </ul>
		</div>
	</nav>


	<div>
		<center><h2 class="message2"> Welcome <?php echo $_SESSION['username'];?>, Please Complete your Profile</h2></center>
	</div>
	<div class="profile-page">
		  <div class="form">
		    <form class="profile-form" action="insertprofile.php" method="post">
		      <h3>Client Profile</h3>
					<h4>Full Name: </h4>
					<! THE MAXLENGTH FIELDS SET THE MAXIMUM LIMIT AND REQUIRED FILED MAKES THE FIELD MANDATORY >
		      <input type="text" name="fullname" placeholder="Enter Full Name*" maxlength="50" required="True">
					<h4>Address 1:</h4>
		      <input type="text" name="address1" placeholder="Enter Address 1*" maxlength="100" required="True">
					<h4>Address 2:</h4>
		      <input type="text" name="address2" placeholder="Enter Address 2" maxlength="100">
					<h4>City:</h4>
		      <input type="text" name="city" placeholder="Enter City*" maxlength="20">
					<h4>State: </h4>
		      <input type="text" name="state" placeholder=" Select State*" list="l1" required>
		      <datalist id="l1">
		        <option value="AL">Alabama</option>
		        <option value="AK">Alaska</option>
		        <option value="AZ">Arizona</option>
		        <option value="AR">Arkansas</option>
		        <option value="CA">California</option>
		        <option value="CO">Colorado</option>
		        <option value="CT">Connecticut</option>
		        <option value="DE">Delaware</option>
		        <option value="DC">District of Columbia</option>
		        <option value="FL">Florida</option>
		        <option value="GA">Georgia</option>
		        <option value="HI">Hawaii</option>
		        <option value="ID">Idaho</option>
		        <option value="IL">Illinois</option>
		        <option value="IN">Indiana</option>
		        <option value="IA">Iowa</option>
		        <option value="KS">Kansas</option>
		        <option value="KY">Kentucky</option>
		        <option value="LA">Louisiana</option>
		        <option value="ME">Maine</option>
		        <option value="MD">Maryland</option>
		        <option value="MA">Massachusetts</option>
		        <option value="MI">Michigan</option>
		        <option value="MN">Minnesota</option>
		        <option value="MS">Mississippi</option>
		        <option value="MO">Missouri</option>
		        <option value="MT">Montana</option>
		        <option value="NE">Nebraska</option>
		        <option value="NV">Nevada</option>
		        <option value="NH">New Hampshire</option>
		        <option value="NJ">New Jersey</option>
		        <option value="NM">New Mexico</option>
		        <option value="NY">New York</option>
		        <option value="NC">North Carolina</option>
		        <option value="ND">North Dakota</option>
		        <option value="OH">Ohio</option>
		        <option value="OK">Oklahoma</option>
		        <option value="OR">Oregon</option>
		        <option value="PA">Pennsylvania</option>
		        <option value="RI">Rhode Island</option>
		        <option value="SC">South Carolina</option>
		        <option value="SD">South Dakota</option>
		        <option value="TN">Tennessee</option>
		        <option value="TX">Texas</option>
		        <option value="UT">Utah</option>
		        <option value="VT">Vermont</option>
		        <option value="VA">Virgina</option>
		        <option value="WA">Washington</option>
		        <option value="WV">West Virginia</option>
		        <option value="WI">Wisconsin</option>
		        <option value="WY">Wyoming</option>
		      </datalist>
					<h4>Zipcode:</h4>
					<! THE PATTERN HERE MAKES THE USER ENTER ONLY VALUES BETWEEN 0-9 AND NOTHING ELSE >
					<input type="text" name="zipcode" placeholder=" Enter Zipcode*" required="True" pattern="[0-9]*" maxlength="9"/>
		      <button type="submit" class="btn">Create Profile</button>
		    </form>
		  </div>
		</div>
	</body>
</html>
