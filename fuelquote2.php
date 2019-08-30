<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username']))
header('location:login.php');
?>

<html>
	<head>
		<title>Your fuel Quote</title>
			<link rel="stylesheet" href="fuelquote2style.css">
			<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
		    <meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
				<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
				<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
				<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
				<script>
					$( function() {
			 			$( "#date" ).datepicker({
							dateFormat: "dd-mm-yy",
			 				minDate: 0
			 			});
					});
				</script>

				<script language="javascript">
					function validateForm() 
					{
						var x = document.forms["form1"]["gallons"].value;
						var y = document.forms["form1"]["date"].value;
						if (x == "") {
							alert("Gallons is missing");
							return false;
						}
						else if ( y == ""){
							alert("Delivery Date is missing");
							return false;
						}
					}

					function HistoryCheck()
					{
						var z = document.forms["form2"]["todate"].value;
						var a = document.forms["form2"]["fromdate"].value;
						if (a == "") {
							alert("From date is missing");
							return false;
						}
						else if (z == ""){
							alert("To date is missing");
							return false;
						}
						
					}a ==""
				</script>
	</head>

	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" id="headings" href="#"><h5>FUEL & CO.</h5></a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a id="headings" href="fuelquote2.php"><h5>FUEL QUOTE</h5></a></li> 
					<li><a id="headings" href="updateprofile.php"><h5>PROFILE</h5></a></li>      		  
				  <li><a id="headings"href="#"><h5>ABOUT US</h5></a></li>
				  <li><a id="headings"href="#"><h5>CONTACT US</h5></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a id="headings" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
				</ul>
			</div>
		</nav> 

		<div class="message">
        	<center><h2 class="welcome"> Welcome <?php echo $_SESSION['username']; ?></h2></center>       
    	</div><br></br>

<div class="left">
		<?php
			error_reporting(0);
			$conn = mysqli_connect('localhost','root');
			if(!$conn)
			{
				die("Couldn't connect: ".mysqli_error());
			}
			else
			{
				mysqli_select_db($conn,'project');
			$result = mysqli_query($conn,"SELECT * FROM clientinfo WHERE username='".$_SESSION['username']."' AND address1 IS NOT NULL");
				while($row = mysqli_fetch_Array($result))
				{
			?>
				
					<form class="quotation" method="post">
						<h2>FUEL QUOTE FORM</h2><br></br>
						<h4>Delivery Address:</h4>
						<input type="text" id="address" value="<?php echo(htmlspecialchars($row['address1']));?>" readonly>
					</form>
			<?php
					}
				}
			?>

					<form name="form1" id=form1 class="quotation" method="post" autocomplete="off" onsubmit="return validateForm()">
						<h4>Gallons:</h4>

						<!BY SETTING THE VALUE TO A PHP CONDITION, WE PREVENT THE FORM FROM LOOSING THE VALUES EVEN AFTER THE GET PRICE BUTTON IS CLICKED >
						<input type="number" min="1" maxlength="6" oninput="validity.valid||(value='');" name="gallons" value="<?php echo isset($_POST['gallons']) ? $_POST['gallons'] : '' ?>" placeholder="Gallons">
						<h4>Delivery Date:</h4>
						<input type="text" placeholder="Delivery Date" id="date" value="<?php echo isset($_POST['date']) ? $_POST['date'] : '' ?>"name="date">
						
						<h4>Current Price:</h4>

						<?php
						$conn = mysqli_connect('localhost','root'); 
						mysqli_select_db($conn,'project'); 
						$res = mysqli_query($conn,"SELECT currentprice from ratetable where currentprice IS NOT NULL"); 
						$row = mysqli_fetch_Array($res);
						?>

						<input type="number" name="price" value="<?php echo(htmlspecialchars($row[0])) ?>" readonly><br></br>     
						<button type="submit" id="getprice" name="getprice" class="button"> GET PRICE </button>			
						<button type="submit" id="submit" name="submit" class="button"> SUBMIT PRICE </button>

		<?php
			error_reporting(0);
			$conn = mysqli_connect('localhost','root');
			if(!$conn)
			{
				die("Couldn't Connect: ".mysqli_error());
			}
			else
			{
				mysqli_select_db($conn,'project');
				$gallons = $_POST['gallons'];
				$date = $_POST['date'];

				$date = date('Y-m-d', strtotime($date));

				//fetching value for the current price from price table (ratetable)
				$q = "SELECT currentprice from ratetable";
				$res = mysqli_query($conn,$q);
				$row = mysqli_fetch_row($res);
				$CP = $row['0'];

				//fetching value for the company profit factor (CPF) from the price table (ratetable)
				$q = "SELECT cpf from ratetable";
				$res = mysqli_query($conn,$q);
				$row = mysqli_fetch_row($res);
				$CPF = $row['0'];
				$CPF = $CPF/100;

				//CHECKING IF THE CLIENT HAS STATE AS TEXAS - LF = LOCATION FACTOR
				$s = "SELECT * FROM clientinfo where username='".$_SESSION['username']."' AND state='TX'";
				$res = mysqli_query($conn,$s);
				if(mysqli_num_rows($res) > 0)
				{
					$LF = 0.02;
				}
				else
				{
					$LF = 0.04;
				}

				//CHECKING IF THE CLIENT HAS REQUESTED MORE THAN 1000 gallons - GRF = GALLONS REQUESTED FACTOR
				if($gallons > 1000)
				{
						$GRF = 0.02;
				}
				else
				{
						$GRF = 0.03;
				}

				//CHECKING IF THE CLIENT HAS ANY QUOTE HISTORY - HF = HISTORY FACTOR
				$q = "SELECT * FROM clientinfo where username='".$_SESSION['username']."' AND gallons IS NOT NULL";
				$res = mysqli_query($conn,$q);
				if(mysqli_num_rows($res) > 0)
				{
					// fetching the value of discount from the ratetable where the admin has set the discount %
					$fetch = "SELECT discount FROM ratetable";
					$result = mysqli_query($conn,$fetch);
					$row = mysqli_fetch_Array($result);
					$HF = $row['0'];
					$HF = $HF/100;
				}
				else
				{
					$HF = 0.0;
				}

				// FETCHING THE MONTH NAME
				$month = date('F', strtotime($date));

				// CHECKING IF THE CLIENT HAS REQUESTED FOR DELIVERY IN SUMMER
				if($month=='June' || $month == 'July' || $month =='August' || $month == 'September')
				{
					// fetching the value of summerrate from the ratetable where the admin has set the summerrate %
					$fetch = "SELECT summerrate FROM ratetable";
					$result = mysqli_query($conn,$fetch);
					$row = mysqli_fetch_Array($result);
					$RF = $row['0'];
					$RF = $RF/100;
				}
				
				// CHECKING IF THE CLIENT HAS REQUESTED FOR DELIVERY IN SPRING
				elseif($month == 'February' || $month == 'March' || $month == 'April' || $month == 'May')
				{
					// fetching value for springrate from the ratetable where the admin has set the springrate %
					$fetch = "SELECT springrate FROM ratetable";
					$result = mysqli_query($conn,$fetch);
					$row = mysqli_fetch_Array($result);
					$RF = $row['0'];
					$RF = $RF/100;
				}
				
				// CHECKING IF THE CLIENT HAS REQUESTED FOR DELIVERY IN FALL
				elseif($month == 'October' || $month == 'November' || $month == 'December' || $month == 'January')
				{
					// fetching value for fallrate from the ratetable where the admin has set the fallrate %
					$fetch = "SELECT fallrate FROM ratetable";
					$result = mysqli_query($conn,$fetch);
					$row = mysqli_fetch_Array($result);
					$RF = $row['0'];
					$RF = $RF/100;
				}
			
				//CALCULATING THE MARGIN
				$margin = ($CP)*($LF - $HF + $GRF + $CPF + $RF);
				$suggestedprice = $CP + $margin;
				$total = $suggestedprice*$gallons;				
				
				if((isset($_POST['submit']) && $gallons!=NULL) && (isset($_POST['submit'])) && $date > '1970-01-01')
				{
	    		mysqli_select_db($conn, 'project');
					// THE USER IS FETCHING THE DATABASE FROM THE CLIENT INFOTABLE RATHER THAN A NEW TABLE.
	    		//piece of code to calculate the total amount by fetching the price from the datatabse.

					//changing the date format
					$date = date('Y-m-d', strtotime($date));
	    		$q = "SELECT * FROM clientinfo where username= '".$_SESSION['username']."' AND gallons IS NULL";
	    		$result = mysqli_query($conn,$q);
	    		$num = mysqli_num_rows($result);

	    		if(mysqli_num_rows($result) > 0)
	    		{
	        	$query = " UPDATE clientinfo SET username='".$_SESSION['username']."',gallons='$gallons', date='$date',price='$CP',amount='$total' WHERE username='".$_SESSION['username']."' ";
	        	mysqli_query($conn,$query);
						
	    		}
	    		else
	    		{
	        	$new = " INSERT INTO clientinfo (username, gallons, date, price,amount) VALUES ('".$_SESSION['username']."','$gallons','$date','$CP','$total')";
	        	mysqli_query($conn,$new);
	        	
	    		}
								
				?>
				<br></br>
				<h4>Submitted Successfully!</h4>
				<?php		
				}
				
				
				//HERE we are checcking if get price button is clicked and gallons is present and get price button is clicked and date is present
				elseif((isset($_POST['getprice']) && $gallons!=NULL)&&(isset($_POST['getprice'])) && $date > '1970-01-01')
				{
					
				?>
				<br></br>
				<button class="reset" type="submit" name="resets">RESET</button><br></br>
				<h4>Suggested Price:</h4>
				<input name="suggestedprice" readonly type="text" value="<?php echo($suggestedprice);?>"><br></br>
				<h4>Total:</h4>
				<input name="total" readonly type="text" value="<?php echo($total);?>">

				<?php
				}
				elseif(isset($_POST['resets']))
				{
				?>
				<br></br>
				
				<h4>Suggested Price:</h4>
				<input type="text" readonly name="suggestedprice" value="<?php $dummy = 0.0; echo($dummy); ?>"><br></br>
				<h4>Total:</h4>
				<input type="text" readonly name="total" value="<?php $dummy = 0.0; echo($dummy);?>">
				
				<?php
				}
				
				}
				
				?>
			</form>
	</div>
		
		<div class="right">
			<form name="form2" class="history" method="post" onsubmit="return HistoryCheck()">
				<h2> FUEL QUOTE HISTORY </h2>
				<div class="containers">						
					<div class="mid-left">
						<h4>FROM DATE:</h4>
						<input type="date" name="fromdate">
					</div>
					<div class="mid-right">
						<h4>TO DATE:</h4>				
						<input type="date" name="todate">
					</div>
				</div>

				<div class="checkhistory">
					<button class="button" type="submit"name="go">CHECK HISTORY</button>	
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
					if(isset($_POST['go']))
					{
						$conn = mysqli_connect('localhost','root');
						if(!$conn)
						{
							die("Couldn't Connect: ".mysqli_error());
						}
						else
						{
							$fromdate = $_POST['fromdate'];
							$todate = $_POST['todate'];

							mysqli_select_db($conn,'project');
							$q = "SELECT id,username,gallons,date,price,amount from clientinfo where username='".$_SESSION['username']."' and date BETWEEN '$fromdate' AND '$todate'";
							$result = mysqli_query($conn,$q);
							if(mysqli_num_rows($result) > 0)
							{
								while($row = mysqli_fetch_assoc($result))
									{
										echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td> <td>".$row['gallons']."</td> <td>".$row['date']."</td> <td>".$row['price']."</td> <td>".$row['amount']."</td></tr>";            
									}
									echo "</table>";
							}
							else
							{
								echo"0 result";
							}
						}
					}
					
					
					?>
					</table>
				</div>
			</form>
		</div>
	</body>	
</html>
