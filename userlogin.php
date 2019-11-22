
<?php
require "db.php";
$r=$_POST['$user_name'];
echo "Welcome";
session_start();
if(isset($_POST['user_name'],$_POST['password']))
{
	$user_name=$_POST['user_name'];
	$pass=$_POST['password'];
	$query=mysqli_query($con,"select * from user where user_name='$user_name' and password='$pass'") or die(mysqli_error($con));
    $row=mysqli_num_rows($query);
    if($row==1)
    {
    	$_SESSION['user_name']=$user_name;
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