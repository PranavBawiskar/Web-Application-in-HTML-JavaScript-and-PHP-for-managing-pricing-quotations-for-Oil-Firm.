<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username']))
header('location:login.php');
?>

<html>
	<head>
		<title>Profile Form</title>
		<link rel="stylesheet" href="updateprofilestyle.css">		  
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
		    <li><a id="headings"href="fuelquote2.php">Fuel Quote</a></li>
				<li class="active"><a id="headings" href="updateprofile.php">Profile</a></li>
		    <li><a id="headings"href="#">About Us</a></li>
		    <li><a id="headings"href="#">Contact Us</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
		    <li><a id="headings"href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		  </ul>
		</div>
	</nav>


	<div>
		<center><h2 class="message2"> Welcome <?php echo $_SESSION['username']; ?></h2></center>
		<center><h2 class="message2"> Looks like you want to update your profile </h2></center>
	</div>
	<div class="profile-page">
		  <div class="form">
			<?php
				$conn = mysqli_connect('localhost','root');
				if(!$conn)
				{
					die("Couldn't connect".mysqli_error());
				}
				else
				{
					mysqli_select_db($conn,'project');
					$fn = $_POST['fullname'];
					$add1 = $_POST['address1'];
					$add2 = $_POST['address2'];
					$ci = $_POST['city'];
					$st = $_POST['state'];
					$zip = $_POST['zipcode'];
					
					$st = strtolower("$st");

					$query = "SELECT fullname, address1, address2, city, state, zipcode FROM clientinfo where username='".$_SESSION['username']."' AND password IS NOT NULL";
					$result = mysqli_query($conn,$query);
					$row = mysqli_fetch_Array($result);
					$fullname = $row['0'];
					$address1 = $row['1'];
					$address2 = $row['2'];
					$city = $row['3'];
					$state = $row['4'];
					$zipcode = $row['5'];
					
					
						if(isset($_POST['update']))
						{
							$q = "UPDATE clientinfo SET fullname='$fn', address1='$add1', address2='$add2', city='$ci', zipcode='$zip' WHERE username='".$_SESSION['username']."' AND password IS NOT NULL";
							mysqli_query($conn,$q);
							
							if($st=='texas' || $st == 'tx')
							{
								$res = "UPDATE clientinfo SET state='TX' WHERE username='".$_SESSION['username']."' AND password IS NOT NULL";		
								mysqli_query($conn,$res);	
							}
						
				?>
				<center><h2 class="message2">Updated Successfully!</h2></center>
				<?php
					}
					//running this query again to update the field values, as in fetching the values from the updated DB.
					$query = "SELECT fullname, address1, address2, city, state, zipcode FROM clientinfo where username='".$_SESSION['username']."' AND password IS NOT NULL";
					$result = mysqli_query($conn,$query);
					$row = mysqli_fetch_Array($result);
					$fullname = $row['0'];
					$address1 = $row['1'];
					$address2 = $row['2'];
					$city = $row['3'];
					$state = $row['4'];
					$zipcode = $row['5'];
			
				}
			?>
		    <form class="profile-form" action="updateprofile.php" method="post" autocomplete="off">
		      <h3>Client Profile</h3>
					<h4>Full Name:</h4>
		      <input type="text" name="fullname" value="<?php echo(htmlspecialchars($fullname)); ?>"placeholder="<?php echo(htmlspecialchars($fullname)); ?>" autocomplete="off" maxlength="50">
					<h4>Address 1:</h4>		      
					<input type="text" name="address1" value="<?php echo(htmlspecialchars($address1)); ?>"placeholder="<?php echo(htmlspecialchars($address1));?>" autocomplete="off" maxlength="100">
					<h4>Address 2:</h4>
		      <input type="text" name="address2" value="<?php echo(htmlspecialchars($address2)); ?>" placeholder="<?php echo(htmlspecialchars($address2));?>" autocomplete="off"  maxlength="100">
					<h4>City:</h4>
		      <input type="text" name="city" value="<?php echo(htmlspecialchars($city)); ?>"placeholder="<?php echo(htmlspecialchars($city));?>" autocomplete="off" maxlength="100">
					<h4>State:</h4>
		      <input type="text" name="state" autocomplete="off" value="<?php echo(htmlspecialchars($state)); ?>"placeholder="<?php echo(htmlspecialchars($state)); ?>" list="l1">
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
					<h4>Zipcode: </h4>
					<input type="text" name="zipcode" value="<?php echo(htmlspecialchars($zipcode)); ?>" placeholder="<?php echo(htmlspecialchars($zipcode)); ?>" pattern="[0-9]*" maxlength="9"/>
		     
					<button type="submit" name="update" class="btn">Update Profile</button>
		    </form>
		  </div>
		</div>
	</body>
</html>
