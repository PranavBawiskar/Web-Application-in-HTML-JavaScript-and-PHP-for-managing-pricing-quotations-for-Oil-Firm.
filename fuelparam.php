<?php
error_reporting(0);
?>
<html>
	<head>
  	<title>Parameter Fluctutation</title>
    	<link rel="stylesheet" href="fuelparamstyle.css">
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
			    <a class="navbar-brand" id="headings"href="#">FUEL & CO.</a>
			  </div>
			  <ul class="nav navbar-nav">
			    <li class="active"><a id="headings"href="adminparam.php">PARAMETERS</a></li>
			    <li><a id="headings" href="clienthistory.php">CLIENT QUOTE HISTORY</a></li>
			    <li><a id="headings" href="#">ABOUT US</a></li>
			    <li><a id="headings"href="#">CONTACT US</a></li>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
			    <li><a id="headings" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> ADMIN LOGOUT </a></li>
			  </ul>
	  	</div>
		</nav>
 
		<div class="adminparam-page">
	  	<div class="form">
				<h1>WELCOME ADMIN</h1>

				<?php
					$conn = mysqli_connect('localhost', 'root');
					if(!$conn)
					{
						die("Couldn't connect".mysqli_error());
					}
				
					else
					{
						mysqli_select_db($conn, 'project');
						$currentprice= $_POST['currentprice'];
						$companyprofitfactor = $_POST['companyprofitfactor'];
						$disc = $_POST['discount'];
						$fall = $_POST['fallrate'];
						$spring = $_POST['springrate'];
						$summer = $_POST['summerrate'];

						$query = "SELECT currentprice,cpf,discount,fallrate,springrate,summerrate FROM ratetable WHERE id='1'";
						$result = mysqli_query($conn,$query);
						$row = mysqli_fetch_Array($result);
						$cp = $row['0'];
						$CPF = $row['1'];
						$discount = $row['2'];
						$fallrate = $row['3'];
						$springrate = $row['4'];
						$summerrate = $row['5'];
						
						
						if(isset($_POST['update']))
						{
							
							$q = "UPDATE ratetable SET currentprice='$currentprice', cpf='$companyprofitfactor', discount='$disc', fallrate='$fall', springrate='$spring', summerrate='$summer' WHERE id='1'";
							mysqli_query($conn,$q);
							
						
				?>
				<center><h2 class="message">Updated Successfully!</h2></center>
				<?php
					}
					$query = "SELECT currentprice,cpf,discount,fallrate,springrate,summerrate FROM ratetable WHERE id='1'";
					$res = mysqli_query($conn,$query);
					$row = mysqli_fetch_Array($res);
						$cp = $row['0'];
						$CPF = $row['1'];
						$discount = $row['2'];
						$fallrate = $row['3'];
						$springrate = $row['4'];
						$summerrate = $row['5'];
						
					}
				?>
	      <form class="adminparam-form" action="fuelparam.php" method="post">
					<h3>Fuel Quote Parameters</h3>
					<h4>Current Price ($):</h4>
					<input type="number" name="currentprice" value="<?php echo(htmlspecialchars($cp)); ?>" placeholder="<?php echo(htmlspecialchars($cp)); ?>" step=0.1 maxlength="3">
					<h4>Profit Margin (%):</h4>
					<input type="number" name="companyprofitfactor" placeholder="<?php echo(htmlspecialchars($CPF)); ?>" value="<?php echo(htmlspecialchars($CPF)); ?>" maxlength="3">
					<h4>Discount (%):</h4>
					<input type="number" name="discount" placeholder="<?php echo(htmlspecialchars($discount)); ?>" value="<?php echo(htmlspecialchars($discount)); ?>" maxlength="4">
					<br></br>
					<h3>Seasonal Rate Fluctuation Percentage</h3>
					<h4>Fall Rate (%):</h4>
					<input type="number" name="fallrate" placeholder="<?php echo(htmlspecialchars($fallrate)); ?>" value="<?php echo(htmlspecialchars($fallrate)); ?>" maxlength="100">
					<h4>Spring Rate (%):</h4>
					<input type="number" name="springrate" placeholder="<?php echo(htmlspecialchars($springrate)); ?>" value="<?php echo(htmlspecialchars($springrate)); ?>" maxlength="100">
					<h4>Summer Rate (%):</h4>
					<input type="number" name="summerrate" placeholder="<?php echo(htmlspecialchars($summerrate)); ?>" value="<?php echo(htmlspecialchars($summerrate)); ?>" maxlength="100">
					<button type="submit" name="update" class="btn">Update</button>
				</form>
	    </div>
	  </div>
	</body>
</html>
