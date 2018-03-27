<?php
session_start();

$user_id=$_SESSION['user_id'];


date_default_timezone_set('Asia/Kolkata');


$timestamp=date('Y-m-d H:i:s');

$ID=$_POST['tracking_id'];
$to=$_POST['addressee'];

$remarks=$_POST['remarks'];

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($servername, $username, $password, $db);


if($user_id=='1')
{
	$from="Dean" ;
}
else
{
	$from="DR" ;
}


$qry="insert into document(ID,location,submitted_on,submitted_by,remarks,recieved_on) values ('$ID','$to','$timestamp','$from','$remarks','$timestamp')";

$insert_blo= mysqli_query($conn, $qry);

if($insert_blo)
{
  echo "<script>alert('Form Submitted!')</script>";
  echo "<script>window.open('home.php','_self')</script>";
}
else
{
 echo "<script>alert('Failed')</script>";
  echo "<script>window.open('home.php','_self')</script>";
}


?>
