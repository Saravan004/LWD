<?php
include 'connect.php';
session_start();
$user_name = $_SESSION['user_name'];

if(isset($_POST['uage'],$_POST['height'],$_POST['weight']))
{

	$age=$_POST['uage'];
	$height=$_POST['height'];
	$weight=$_POST['weight'];
	$bmi = $weight/($height**2);
	$query=mysqli_query($con,"select * from tb_regn where username='$user_name'");
    $row=mysqli_num_rows($query);
    if($row>=1)
    {
    	$query=mysqli_query($con,"update tb_regn set  age = '$age',weight = '$weight', height = '$height',bmi = '$bmi' where username = '$user_name'");
    }
    else
    {
    	$query=mysqli_query($con,"insert into tb_regn values('$user_name','$age','$weight','$height','$bmi')");
    }
    $query=mysqli_query($con,"select * from tb_regn where username='$user_name'") or die(mysqli_error($con));


if($bmi <= 18.4){
	$result=mysqli_query($con,"select * from diet where bmi = 'low'") or die(mysqli_error($con));
}
elseif ($bmi >18.4 and $bmi < 24.9) {
	$result=mysqli_query($con,"select * from diet where bmi = 'nor'") or die(mysqli_error($con));
}
else{
	$result=mysqli_query($con,"select * from diet where bmi = 'high'") or die(mysqli_error($con));
}
}
else{
	$result=mysqli_query($con,"select * from diet where bmi = '1'") or die(mysqli_error($con));
	$query=mysqli_query($con,"select * from diet where bmi = '2'") or die(mysqli_error($con));
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Enter BMI</title>
	<link rel="shortcut icon" type="image/png" href="./12.png"/>
</head>
<body>
	<a href='logout.php' style="margin-left: 1345px">Click here to log out</a>
<form action="display.php" method="POST">
      <label><b>Age</b></label> 
      <br><input type="text" name="uage" class="form-control" required></br>
      <label> <b>height</b></label>
      <br><input type="text" placeholder="Enter height in metre" name="height" class="form-control" required></br>
      <label> <b>weight</b></label>
      <br><input type="text" placeholder="Enter weight in Kilogram" name="weight" class="form-control" required></br>
      <button type="submit" class="adddetails" name ="adddetails">Submit</button>

      <table align="center" border="1px">
  <tr>
    <th>User Name</th>
    <th>Age</th>
    <th>weight</th>
    <th>height</th>
    <th>BMI</th>
  </tr>
  <?php 
while ($row = mysqli_fetch_array($query)){     // here too, you put a space between it
   ?>
   <tr>
   <td><?php echo $uname=$row['username']; ?></td>
   <td><?php echo $uage=$row['age'];  ?></td>
   <td><?php echo $ubmi=$row['weight']; ?></td>
   <td><?php echo $ubmi=$row['height']; ?></td>
    <td><?php echo $ubmi=$row['bmi']; ?></td>
</tr>
 <?php } ?>
</table>

<table align="center" border="1px" style="margin-top: 40px">
<tr>
    <th>Diet Plans</th>
  </tr>
  <?php 
while ($row2 = mysqli_fetch_array($result)){     // here too, you put a space between it
   ?>
   <tr>
   <td><?php echo $uname=$row2['diet_plan']; ?></td>
</tr>
 <?php } ?>
</table>
<a href="https://www.youtube.com/watch?v=4tpOxq4eHWQ" target="_blank">Exercise for Women</a><br>
<a href="https://www.youtube.com/watch?v=H1F-UfC8Mb8" target="_blank">Exercise for Men</a>
     
</form>
</body>
</html>