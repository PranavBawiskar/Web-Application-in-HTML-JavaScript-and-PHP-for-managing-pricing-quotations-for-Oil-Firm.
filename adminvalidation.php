<?php
//STARTING THE ADMIN SESSION
session_start();

//ESTABLISHING CONNECTION
//THE RETURN TYPE OF THE FOLLOWING FUNCTION IS BOOL TYPE
$con = mysqli_connect('localhost','root');
if($con)
{
	echo "Connection Successful";
}
else
{
  echo "No Connection";
}

//SELECTING DATABASE
mysqli_select_db($con, 'project');

//THE POST METHOD THAT WE USED IN THE FORM IS USED HERE TO EXTRACT THE VALUES FROM THE FORM AND PUSH THEM INTO THE NAME AND PASSWORD VARIABLES
$name = $_POST['username'];
$pass = $_POST['password'];

//QUERY EXECUTION
$q = "SELECT * FROM admininfo where username='$name' && password='$pass'";

//THE FOLLOWING FUNCTION EXECUTES THE QUERY AND RETURNS THE ROW WHERE THE USERNAME AND PASSWORD MATCHES 
$result = mysqli_query($con,$q);

//THE FOLLOWING FUNCTION RETURNS THE NUMBER OF ROWS THAT ARE QUERIED SUCCESSFULLY
$num = mysqli_num_rows($result);

//CHECKING IF THE USERNAME AND PASSWORD MATCHES WITH DATABASE ENTRIES BY USING THE NUMBER OF ROWS RETURNED
if(mysqli_num_rows($result)> 0)
{
    $a = "SELECT * FROM admininfo where username='$name'";
    mysqli_query($con,$a);
		//HEADER WILL REDIRECT US TO THE NEXT PAGE
    header('location: fuelparam.php');
}
else
{
    header('location: unsuccessful_adminlogin.php');    
}
?>
