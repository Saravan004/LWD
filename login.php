<html>
<head>
  <title>USER LOGIN/SIGNUP</title>
  <link rel="stylesheet" type="text/css" href="s.css">
  <link rel="stylesheet" type="text/class" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
</head>

   

<div class="container">
  <div class="login-box">
  <div class="row">
    <div class="col-md-6 login-left">
      <i class="material-icons" style="font-size:48px;color:black">account_circle</i>
      <h2> Login Here</h2>
      <form action="userlogin.php" method="post">
      <div class="form-group">
        <i class="glyphicon glyphicon-user" style="font-size:24px;"></i>
      <label><b>Username</b></label> 
      <br><input type="text" name="user" class="form-control" required></br>
    </div>
    <div class="form-group">
      <i class ="material-icons">https</i>
      <label for="password"> <b>Password</b></label>
      <br><input type="password" name="password" class="form-control" required></br>
    </div>
    <div align="center">
       <br> <button type="submit" class="button">Login</button></br>
   </div>

</form>
</div>

<br>
<div align="center">
<div class="col-md-6 login-right ">
<form action="signin.html" method="post">
<br><h2>Haven't Signed Up Yet ?</h2></br>
<button type="submit" class="button">Sign-up</button>
</form>
<br><br><a href="Home.html">Home Page</a>
  
</div>
</div>

</br>
</div>
</div>
</div>


<div align="center">

<?php
session_start();
require "db.php";
if(isset($_SESSION['invalid']))
	echo"invalid username or password";
session_destroy();
?>
</html>