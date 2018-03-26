<?php

session_start();
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
// Create connection

date_default_timezone_set('Asia/Kolkata');

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


$track_no=$_GET['ID'];
$var1=9;

$qry="SELECT * FROM document WHERE ID='$track_no' ";
$run_blog=mysqli_query($conn,$qry);

while($row_blog=mysqli_fetch_array($run_blog))
{

	$timestamp1=$row_blog['recieved_on'];
	$location=$row_blog['location'];

}	


$qry="INSERT into history(ID,location,starttime,endtime) values ('$track_no','$location','$timestamp1','$timestamp')";

$insert_blo= mysqli_query($conn, $qry);



$qry1='UPDATE document SET location="'.$var1.'" WHERE ID="'.$track_no.'"';

if($insert_blo&&$conn->query($qry1)==TRUE)
{
	
     echo "<script>alert('Document is marked as complete!')</script>";
  echo "<script>window.open('home.php','_self')</script>";
}
else
{
	echo "<script>alert('Operation Failed')</script>";
  echo "<script>window.open('home.php','_self')</script>";
}
?>