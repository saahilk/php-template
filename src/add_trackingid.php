<?php
session_start();

$user_id=$_SESSION['user_id'];


date_default_timezone_set('Asia/Kolkata');


$timestamp=date('Y-m-d H:i:s');

$ID=$_POST['tracking_id'];

$servername = "localhost";
$username = "root";
$password = "";
$db="track";

$conn = new mysqli($servername, $username, $password, $db);


$qry="insert into document(ID,location,timestamp) values ('$ID','1','$timestamp')";

$insert_blo= mysqli_query($conn, $qry);

if($insert_blo)
{
  echo "<script>alert('THE NEW TRACKING NUMBER IS ADDED!')</script>";
  echo "<script>window.open('home.php','_self')</script>";
}


?>