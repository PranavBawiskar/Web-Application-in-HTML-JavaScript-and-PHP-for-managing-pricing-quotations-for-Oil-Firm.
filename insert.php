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
$email = $_POST['email'];
$name = $_POST['username'];
$pass = $_POST['password'];
$pass = md5($pass);

//checking if username is already used
$q = "SELECT * FROM clientinfo where username= '$name'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);

//CHecking if email is already used
$w = "SELECT * FROM clientinfo where email = '$email'";
$res = mysqli_query($con,$w);
$no = mysqli_num_rows($res);

if(mysqli_num_rows($result) > 0)
{      
    header("location: unsuccessful.php");
    exit;     
}


elseif($no > 0)
{
		header("location: unsuccessful2.php");
}

else
{
        $qy = "INSERT INTO clientinfo (email, username, password) VALUES ('$email','$name','$pass')";
        mysqli_query($con,$qy);
				
				header("location: login.php");

}
session_unset();
session_destroy();
?>
