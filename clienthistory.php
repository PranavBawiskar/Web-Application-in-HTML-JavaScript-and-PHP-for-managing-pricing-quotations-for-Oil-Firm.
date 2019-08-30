<?php
//PHP HAS A TENDENCY TO THROW WARNINGS OR NOTICES, THUS WE SET THEM TO 0
error_reporting(0);
?>

<html>
	<head>
		<title>Client Quote History</title>
			<link rel="stylesheet" href="clienthistorystyle.css">
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
					<a class="navbar-brand" id="headings" href="#"><h5>FUEL & CO.</h5></a>
				</div>
				<ul class="nav navbar-nav">
					<li><a id="headings" href="fuelparam.php"><h5>PARAMETERS</h5></a></li> 
					<li class="active"><a id="headings"href="clienthistory.php"><h5>CLIENT QUOTE HISTORY</h5></a></li>        
				  <li><a id="headings"href="#"><h5>ABOUT US</h5></a></li>
				  <li><a id="headings"href="#"><h5>CONTACT US</h5></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a id="headings" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> ADMIN LOGOUT</a></li>
				</ul>
			</div>
		</nav> 

		<div class="message">
        <center><h2 class="welcome"> Welcome ADMIN </h2></center>       
    </div><br></br>
	
		<div class="quote">
			<form name="form2"class="history" method="post">
				<h2>CHECK CLIENT FUEL QUOTE HISTORY </h2>
					<div class="containers">
						<div class="dateFields">
							<div class="mid-left">
							<h4>FROM DATE:</h4>
							<input type="date" name="fromdate">
						</div>
						<div class="mid-right">
							<h4>TO DATE:</h4>				
							<input type="date" name="todate">
						</div>
						</div>						
					</div>

					<div class="checkhistory">
						<h4>Search by Client username: </h4>
						<input type="text" name="search" placeholder=""><br></br>
						<button class="button" type="submit"name="go">CHECK HISTORY</button>	
						<div class="table-responsive"> 

						<table class="table"><br></br><br></br>
						        <tr>
						          <th>#</th>
						          <th>CLIENT</th>
						          <th>GALLONS</th>
						          <th>DATE</th>
						          <th>PRICE</th>
						          <th>AMOUNT</th>
						        </tr>
						<?php
						//CHECKING IF THE BUTTON GO IS PRESSED
						if(isset($_POST['go']))
						{	
							$conn = mysqli_connect('localhost','root');
							if(!$conn)
							{
								die("Couldn't Connect: ".mysqli_error());
							}
							else
							{
								$name = $_POST['search'];
								$fromdate = $_POST['fromdate'];
								$todate = $_POST['todate'];

								mysqli_select_db($conn,'project');
								//CHECKING THAT SEARCH FIELD ALONG WITH FROMDATE AND TODATE ARE NOT NULL
								if($_POST['search']!=NULL && $_POST['fromdate']!=NULL && $_POST['todate']!=NULL)
								{
										//SELECTING EVERYTHING BETWEEN DATES ENTERED BY THE USER AND FOR THAT SPECIFIC USER
										$q = "SELECT id,username,gallons,date,price,amount from clientinfo where username='$name' AND DATE BETWEEN '$fromdate' AND '$todate'";
										$result = mysqli_query($conn,$q);
										if(mysqli_num_rows($result) > 0)
										{
											//FETCHING ALL THOSE ROWS SATISFYING THE QUERY| PS - $row is a list/array hence we can access it via indexing.
											while($row = mysqli_fetch_assoc($result))
												{
													echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td> <td>".$row['gallons']."</td> <td>".$row['date']."</td> <td>".$row['price']."</td> <td>".$row['amount']."</td></tr>";            
												}
												echo "</table>";
										}

												
										
								}
								//CHECKING THAT SEARCH IS NOT USED AND ONLY FROMDATE AND TODATE IS USED
								elseif($_POST['search']==NULL && $_POST['fromdate']!=NULL && $_POST['todate']!=NULL)
								{
										//SELECTING EVERYTHING BETWEEN DATES ENTERED BY THE USER
										$q = "SELECT id,username,gallons,date,price,amount from clientinfo where DATE BETWEEN '$fromdate' AND '$todate'";
										$result = mysqli_query($conn,$q);
										if(mysqli_num_rows($result) > 0)
										{
											while($row = mysqli_fetch_assoc($result))
												{
													echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td> <td>".$row['gallons']."</td> <td>".$row['date']."</td> <td>".$row['price']."</td> <td>".$row['amount']."</td></tr>";            
												}
												echo "</table>";
										}
												
								}
								//CHECKING THAT SEARCH IS USED AND FROMDATE AND TODATE IS NOT USED
								elseif($_POST['search']!=NULL && $_POST['fromdate']==NULL && $_POST['todate']==NULL)
								{
										//SELECTING EVERYTHING FOR THAT SPECIFIC USER
										$q = "SELECT id,username,gallons,date,price,amount from clientinfo where username='$name'";
										$result = mysqli_query($conn,$q);
										if(mysqli_num_rows($result) > 0)
										{
											while($row = mysqli_fetch_assoc($result))
												{
													echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td> <td>".$row['gallons']."</td> <td>".$row['date']."</td> <td>".$row['price']."</td> <td>".$row['amount']."</td></tr>";            
												}
												echo "</table>";
										}
											
								}
							}
						}
						?>
					</table>
</div> 
				</div>
			</form>
		</div>
	</body>
</html>
