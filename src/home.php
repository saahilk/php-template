<!DOCTYPE html>
<title>NITC</title>
<html>
	<head>
		<meta name="google-signin-client_id" content="952937888060-b470t00um3s9uclet4qaua91ocvrjfus.apps.googleusercontent.com">
		<script src="https://apis.google.com/js/platform.js" async defer></script>

		<script>
    
			function signOut() {
      				var auth2 = gapi.auth2.getAuthInstance();

      				auth2.signOut().then(function () {
        			console.log('User signed out.');
        			window.location="index.php";
    				});
    			}	

    			function onLoad() {
      				gapi.load('auth2', function() {
      		  			gapi.auth2.init();
      				});
    			}

  		</script>

		<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>

		<style>

			.navBar {
			   	margin: 0;
    				padding: 0;
    				overflow: hidden;
    				background-color: #39B7CD;
    				display: block;
    				align-content: flex-start;
			}
		
			.navItemList{
  				list-style-type: none;
			}

			.navItemList li {
    				float: left;
			}

			.navItemList li a {
			    	display: block;
			    	color: white;
			    	text-align: center;
			    	padding: 0 16px;
			    	text-decoration: none;
			}

			.navItemList li a:hover {
			}

			.navtitle{
  				font-family: arial, sans-serif;
  				font-weight: bold;
  				color: white;
  				text-align: center;
  				padding: 0px 200px 14px 6px;
				margin-right: 200px;
				font-size: 20px;
				text-decoration: none;
			}

			.navtitle a:hover{
			}

			b{
			  	font-weight: bold;
			}
		</style>
	</head>
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

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  	$email_val = $_POST['user_email'];
  	
	$qry="SELECT * FROM user WHERE emailid='" . $email_val."'";
  
	$result = mysqli_query($conn,$qry);
  	$row  = mysqli_fetch_assoc($result);

  	if(is_array($row)) {
    		$_SESSION['user_id'] = $row['flag'];
   	 	$_SESSION['username']=$_POST['user_name'];
  	}
}

if($_SESSION['user_id']=="") {
  	header('Location:index.php');
}
?>

	<body style="padding:0;margin:0;font-family: arial, sans-serif;">
		  <div class="navBar">
		  	<ul class="navItemList">
		      		<li>
					<div class="navtitle"><a href="index.php">
						<b>Doc Tracker</b></a>
					</div>	
				</li>
		      		<li style="font-family: arial, sans-serif;float:right;margin-right:5px;">
					<a href="#" onclick="signOut()"><b>Logout</b></a>
				</li>
		    
		      		<li style="font-family: arial, sans-serif;float:right;margin-right:5px;">
					<a href="index.php"><b>
<?php 
if($_SESSION['user_id']=='1'){
	echo 'Dean';
}

elseif ($_SESSION['user_id']=='2') {
	echo 'DR';
}

else {
	$temp=$_SESSION['user_id']-2;
	echo 'GA';
	echo $temp;
}
?>
		      	
		   		     	</b></a>
				</li>
		    	</ul>
		</div>
		<div>
			<center>
		<?php
				if($_SESSION['user_id']=='0'){
					echo 'User';
				}
				elseif($_SESSION['user_id']=='1'){
					$qry="SELECT * FROM document";
					$result=mysqli_query($conn,$qry);
			        if($result) {
				        echo "<table>
				          <tr>
				            <th>Tracking ID</th>
				            <th>Status</th>				  
				          </tr>";
				        if(mysqli_num_rows($result)>0) {
				          while($row = mysqli_fetch_assoc($result)) {
				          	 echo '<tr>
			                	<td>'.$row['ID'].'</td><td>';
			                	

								if($row['location']=='1'){
									echo 'Dean';
								}

								elseif ($row['location']=='2') {
									echo 'DR';
								}

								else{
									$temp=$row['location']-2;
									echo 'GA';
									echo $temp;
								}
			                	echo "</td></tr>";

				          }
						
						}
					}
				}
				else{
					$qry="SELECT * FROM document WHERE location=".$_SESSION['user_id'];
					$result=mysqli_query($conn,$qry);
			        if($result) {
				        echo "<table>
				          <tr>
				            <th>Tracking ID</th>
				            <th>Status</th>				  
				          </tr>";
				        if(mysqli_num_rows($result)>0) {
				          while($row = mysqli_fetch_assoc($result)) {
				          	 echo '<tr>
			                	<td>'.$row['ID'].'</td><td>';
			                	
								if($_SESSION['user_id']=='1'){
									echo 'Dean';
								}

								elseif ($_SESSION['user_id']=='2') {
									echo 'DR';
								}

								else{
									$temp=$_SESSION['user_id']-2;
									echo 'GA';
									echo $temp;
								}
			                	echo "</td></tr>";
				          }
						
						}
					}
				}

			?>
			</center>
		</div>
		</body>
	</body>
</html>
