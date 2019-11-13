<?php
/*$servername = "localhost";
$username = "add your sql username here";
$password = "add your sql password here";
$dbname = "railway";*/

$con = new mysqli("localhost","root","","reg");
if ($con->connect_error) 
{
 die("Connection failed: " . $con->connect_error);
} 
else
{
	echo "Connected";
}
?>
