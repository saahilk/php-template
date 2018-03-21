<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
       
 
<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
// Create connection
$conn = new mysqli($servername, $username, $password, $db);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

      
$roll=mysqli_real_escape_string($conn, $_POST['rollno']);
$status=mysqli_real_escape_string($conn, $_POST['status']);
$date=mysqli_real_escape_string($conn, $_POST['date']);
	   
$sql = "UPDATE project SET date='$date' WHERE rollno='$roll' ";

  $sql3 = " INSERT INTO history(rollno,status,datemodify) VALUES 
('$roll','$status','$date')";


if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error" . $conn->error;
}

if ($conn->query($sql3) === TRUE) {
    echo "";
} else {
    echo "Error" . $conn->error;
}

$sql1 = "UPDATE project SET status='$status' WHERE rollno='$roll' ";

if ($conn->query($sql1) === TRUE) {
 echo "<script>alert('Details edited successfully');window.location.href='adminhome.php';</script>";
} else {
    echo "Error " . $conn->error;
}



mysqli_close($conn);

?>

 </body>
</html>
