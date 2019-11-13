<?php
include "dp.php";
session_start();
if(isset($_POST['register']))
{
	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$error="Already registerd ";
	$message1="SUCCESSFULLY REGISTERED";
	$query=mysqli_query($con,"select * from citizen where username='$username'");
	$row=mysqli_num_rows($query);
	if($row==0)
	{
	$q=mysqli_query($con,"insert into citizen values('name','$username','$password','$email')") ;
	$_SESSION["message1"]=$message1;
	header("location:Signup.php");
	}
	else
	{
		$_SESSION["error"]=$error;
		header("location:Signup.php");
	}
}
?>