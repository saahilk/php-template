<?php
session_start();

$user_id=$_SESSION['user_id'];


date_default_timezone_set('Asia/Kolkata');


$timestamp=date('Y-m-d H:i:s');

$ID=$_POST['tracking_id'];
$to=$_POST['addressee'];
$from=$_POST['addresser'];

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($servername, $username, $password, $db);


$qry="insert into document(ID,location,timestamp) values ('$ID','1','$timestamp')";

$insert_blo= mysqli_query($conn, $qry);

if($insert_blo)
{
  echo "<script>alert('THE NEW TRACKING NUMBER IS ADDED!')</script>";
  echo "<script>window.open('home.php','_self')</script>";
}
else
{
 echo "<script>alert('Duplicate tracking number is added.')</script>";
  echo "<script>window.open('home.php','_self')</script>";
}


?>
