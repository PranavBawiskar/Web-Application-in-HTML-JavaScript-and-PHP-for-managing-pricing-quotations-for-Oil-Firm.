<?php
session_start();
$_SESSION['username'] = $name;
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

$email = $_POST['email'];
//$name = $_POST['username'];
$pass = $_POST['password'];
$pass = md5($pass);

//Fetching the name from clientinfo where email is equal to the email entered by the user
$query = "SELECT username FROM clientinfo where email='$email' AND password IS NOT NULL";
$res = mysqli_query($con,$query);
$row = mysqli_fetch_Array($res);
$name = $row['0'];

//Validating the user credentials
$q = "SELECT * FROM clientinfo where email='$email' AND password='$pass'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);

if(mysqli_num_rows($result)> 0)
{
		 
    $a = "SELECT * FROM clientinfo where username='$name' AND fullname IS NULL AND password IS NOT NULL";
    $res = mysqli_query($con,$a);
    if(mysqli_num_rows($res) > 0)
    {    
        $_SESSION['username']=$name;    
        header('location: clientprofile.php');
    }
    else
    {
        $_SESSION['username']=$name;
        header('location: fuelquote2.php');
    }
}
else
{
    header('location: unsuccessful_login.php');    

}

?>
