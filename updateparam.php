<?php
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

$cp = $_POST['currentprice'];
$CPF = $_POST['companyprofitfactor'];
$discount = $_POST['discount'];
$fallrate = $_POST['fallrate'];
$springrate = $_POST['springrate'];
$summerrate = $_POST['summerrate'];

$CPF = $CPF/100;
$discount = $discount/100;
$fallrate = $fallrate/100;
$springrate = $springrate/100;
$summerrate = $summerrate/100;


if(isset($_POST['update']))
{
	
	$q = "UPDATE ratetable SET currentprice='$cp', cpf='$CPF',discount = '$discount', fallrate='$fallrate', springrate = '$springrate', summerrate='$summerrate'";
	mysqli_query($con,$q);
	header('location: update_success.php');
}

?>
