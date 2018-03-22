<?php

session_start();
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
// Create connection

date_default_timezone_set('Asia/Kolkata');


$timestamp=date('Y-m-d H:i:s');

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
if($_SESSION['user_id']=="") {
  	header('Location:index.php');
}

$people=[
	0=>"Staff",
	1=>"Dean",
	2=>"DR",
	3=>"GA1",
	4=>"GA2",
	5=>"GA3",
	6=>"GA4",
	7=>"GA5",
];

$flag=$_POST['flist'];
$track_no=$_POST['ID'];
$qry='UPDATE document SET location="'.$flag.'",timestamp="'.$timestamp.'" WHERE ID="'.$track_no.'"';
if($conn->query($qry)==TRUE)
{
    header('Location:home.php');
}
else
{
	echo "<script>alert('Failed')</script>";
  echo "<script>window.open('home.php','_self')</script>";
}
?>