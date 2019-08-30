<?php
session_start();
$con = mysqli_connect('localhost','root');
if($con)
{
    echo "Connection Successful";
}
else
{
    echo "No Connection";
}
    mysqli_select_db($con, 'project');

    $fullname = $_POST['fullname'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];

		$state = strtolower("$state");

		$qy = " UPDATE clientinfo SET fullname='$fullname',address1='$address1',address2='$address2',city='$city', zipcode='$zipcode' WHERE username='".$_SESSION['username']."' AND password IS NOT NULL";
		mysqli_query($con,$qy);
		if($state == 'texas' || $state == 'tx')
		{
			$qw = "UPDATE clientinfo SET state='TX' WHERE username='".$_SESSION['username']."' AND password IS NOT NULL";
			mysqli_query($con,$qw);
		}
    
    
    header("location: fuelquote2.php");
?>
