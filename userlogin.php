
<?php
require "db.php";
session_start();
if(isset($_POST['a'],$_POST['b']))
{
	$mob=$_POST['a'];
	$pass=$_POST['b'];
	$query=mysqli_query($con,"select * from user where user='$name' and password='$password'") or die(mysqli_error($con));
    $row=mysqli_num_rows($query);
    if($row==1)
    {
    	$_SESSION['mob']=$mob;
    	header("location:display.php");
    }
    else
    {
    	$_SESSION['invalid']=1;
    	header("location:login.php");
    }
}
else
    {
    	$_SESSION['invalid']=1;
    	header("location:login.php");
    }
?>