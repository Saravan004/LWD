<?php
//session.start();
include "db.php";
session_start();
if(isset($_POST['register']))
{
	$user_name = $_POST['username'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$psw1=$_POST['password'];

	//echo "<script>alert('1 record added');document.location='index.php';</script>";
	//echo"1 record added";
	$q=mysqli_query($con,"insert into user values('$user_name','$name','$email','$psw1')");
	//$sql="INSERT INTO tb_regn(User_id,Age,BMI) VALUES(NULL,'$user_id','$age','$bmi')";
	if(!$q)
	{
		//die('Error'. mysql_error());
		$_SESSION['invalid']=1;
		header('location: signin.php');
	}
	else
	{
		$_SESSION['user_name']=$user_name;
    	header("location:display.php");
	}
}
//mysqli_close($con);
?>