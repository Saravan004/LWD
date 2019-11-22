

<?php

?>

<!DOCTYPE html>
<html>
<head>
<style>
	
table tr:nth-child(even) {
  background-color: white;
}
table tr:nth-child(odd) {
 background-color:rgba(211,211,211,0.5);
}
table th {
  background-color:rgba(211,211,211,0.5);
  color: black;
}

#tablelogout {
  background-color:rgba(211,211,211,0.5);
  color: black;
  border-color:rgba(211,211,211,0.5);
;
}
.logoutbutton {
  padding-left:100px;
}
</style>
	<title>DIETPLANS</title>
	<link rel="shortcut icon" type="image/png" href="./12.png"/>
     <link rel="stylesheet" type="text/class" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="ss.css">
</head>
<body>
  <?php
    session_start();
    $user_name = $_SESSION['user_name'];
    echo "<h1>Welcome $user_name</h1>";
  ?>
<div class="container" id="login-container" class="aa">
	<div class="lo">
	   <div class="row">
          <div class="col-md-8 login-l">
	          
                <table id="tablelogout" width=600px >
                  <tr>
                    <td>
                       <form action="display.php" method="POST">
                      <label><b>Age</b></label> 
                    <br><input type="number" name="uage" class="form-control" required></br>
                       <br><label> <b>height</b></label>
                       <br><input type="number" placeholder="Enter height in metre" name="height" class="form-control" required></br>
                       <br><label> <b>weight</b></label>
                       <br><input type="number" placeholder="Enter weight in Kilogram" name="weight" class="form-control" required></br>
                       <br><button type="submit" class="adddetails" name ="adddetails">Submit</button>
                      </form>
                    </td>

                    <td>
                      <form action="login.php" method="post">
                              <button type="submit" class="but">Logout</button></br>
                        </form>
                    </td>
                  </tr>
                </table>
                       
             </div>
        </div>

    </div>
</div>
      <table style="width: 50%" align="center" border="1px">
      	<caption>Your Calculated BMI</caption>
  <tr>
    <th>User Name</th>
    <th>Age</th>
    <th>weight</th>
    <th>height</th>
    <th>BMI</th>
  </tr>
  <?php 
    include 'connect.php';
    if(isset($_POST['uage'],$_POST['height'],$_POST['weight'])){
      $age=$_POST['uage'];
      $height=$_POST['height'];
      $weight=$_POST['weight'];
      $bmi =10000*($weight/($height**2));
      $query=mysqli_query($con,"select * from tb_regn where username='$user_name'");
      $row=mysqli_num_rows($query);
      
      if($row>=1){
        $query=mysqli_query($con,"update tb_regn set  age = '$age',weight = '$weight', height = '$height',bmi = '$bmi' where username = '$user_name'");
      } else {
        $query=mysqli_query($con,"insert into tb_regn values('$user_name','$age','$weight','$height','$bmi')");
      }
    }

    
    
    $query=mysqli_query($con,"select * from  tb_regn where username='$user_name'");

    $row = mysqli_fetch_assoc($query);//details here fetched
    $bmi = $row['bmi'];

    if($bmi <= 14.9){
      $result=mysqli_query($con,"select * from diet where bmi = 'low'") or die(mysqli_error($con));
    }else if ($bmi >14.9 and $bmi < 24.9) {
      $result=mysqli_query($con,"select * from diet where bmi = 'nor'") or die(mysqli_error($con));
      /*echo " If you eat meat and dairy foods, choose lean meats and low-fat dairy foods most of the time.";*/
    }else{
      $result=mysqli_query($con,"select * from diet where bmi = 'high'") or die(mysqli_error($con));
    }
  ?>
    <tr>
     <td><?php echo $uname=$row['username']; ?></td>
     <td><?php echo $uage=$row['age'];  ?></td>
     <td><?php echo $ubmi=$row['weight']; ?></td>
     <td><?php echo $ubmi=$row['height']; ?></td>
      <td><?php echo $ubmi=$row['bmi']; ?></td>
    </tr>

</table><br>

<table style="width: 75%"  align="center" border="1px" style="margin-top: 40px">
	<caption>PROPOSED DIETPLANS</caption>
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
<h3>IF you can,do excercises.</h3>
<h3>For Home-workouts,follow the link below.</h3>

<table style="width: 75%"  align="center" border="1px" style="margin-top: 40px">
	<tr>
  <td>
<h2><a href="https://www.youtube.com/watch?v=4tpOxq4eHWQ" target="_blank">Exercise for Women</a><br>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/4tpOxq4eHWQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></h2></td>
  <td>
    <h2>
<a href="https://www.youtube.com/watch?v=H1F-UfC8Mb8" target="_blank">Exercise for Men</a><br>
<iframe width="560" height="315" src="https://www.youtube.com/embed/H1F-UfC8Mb8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></h2></td></td></tr></h2>
  </table>   
</form>
</body>
</html>