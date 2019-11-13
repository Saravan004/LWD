<?php
//session.start();
include "db.php";






if(isset($_POST['register']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$user_id=$_POST['user_id'];
$psw1=$_POST['password'];

	//echo "<script>alert('1 record added');document.location='index.php';</script>";
	//echo"1 record added";
$q=mysqli_query($con,"insert into user values('$name','$email','$user_id','$psw1')");
//$sql="INSERT INTO tb_regn(User_id,Age,BMI) VALUES(NULL,'$user_id','$age','$bmi')";
/*if(!mysqli_query($con,$sql))
{
	//die('Error'. mysql_error());
	echo "<script>alert('You have already created an account with this Email-Id ');document.location='index.php';</script>";
}
else
{
	//header('location: index.php');
 echo "<script>alert('Welcome $name');document.location='index.php';</script>";
}*/
}



//mysqli_close($con);

?>