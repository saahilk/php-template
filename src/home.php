<?php

session_start();
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
  	$row  = mysqli_fetch_array($result);

  	if(is_array($row)) {
    	$_SESSION['user_id'] = $row['flag'];
   	 	$_SESSION['username']=$_POST['user_name'];
  	}
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

$user_id=$_SESSION['user_id'];

?>
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


	<body style="padding:0;margin:0;font-family: arial, sans-serif;">
		  <div class="navBar">
		  	<ul class="navItemList">
		      		<li>
					<div class="navtitle"><a href="home.php">
						<b>Doc Tracker</b></a>
					</div>	
				</li>
		      		<li style="font-family: arial, sans-serif;float:right;margin-right:5px;">
					<a href="#" onclick="signOut()"><b>Logout</b></a>
				</li>
		    
		      		<li style="font-family: arial, sans-serif;float:right;margin-right:5px;">
					<b>
<?php 
echo $people[$_SESSION['user_id']]

?>

		      	
		   		     	</b>
				</li>
		    	</ul>
		</div>
	<center>
		<?php
				if($_SESSION['user_id']=='0'){
					?>
				</br>
					<form action="add_trackingid.php" method="post" enctype="multipart/form-data">
  <table align="center" width="600" height="400" border="1" bgcolor="skyblue" style="background-color: #DDDDDD">
    <tr align="center">
      <td colspan="5"><h1 style="text-align:center">ADD A NEW TRACKING NUMBER</h1></td>
    </tr>

<tr>
      <td align="right">Tracking Id</td>
      <td><input type="text"  name="tracking_id" value="" /></td>
    </tr>
    
    
   
    
    <tr align="center" style="font-size:1.5em;">
      <td colspan="5"><input type="submit" name="insert_post" value="Submit"/></td>
    </tr>




  </table>
</form>

<?php

				}
				elseif($_SESSION['user_id']=='1'){

					
					?>
					<div>
					</br>
					<table  style="background-color:#DDDDDD;     margin-left: 200px;" align="center" width="1000"  border="5" >

					<tr align="center" >
 				  <th style="text-align: center;line-height: 25px;">S.no</th>
				  <th style="text-align: center;line-height: 25px;">TRACKING ID</th>
				  <th style="text-align: center;line-height: 25px;">STATUS</th>
				  <th style="text-align: center;line-height: 25px;">DATE AND TIME</th>
				  <th style="text-align: center;line-height: 25px;">Forward</th>
				  <th style="text-align: center;line-height: 25px;">Submit</th>
  
  
					</tr>


					<?php




 

				$i=1;

  
  				$user_id=$_SESSION['user_id'];
  				$qry="SELECT * FROM document WHERE location='$user_id' order by timestamp desc";
  				$run_blog=mysqli_query($conn,$qry);
  while($row_blog=mysqli_fetch_array($run_blog))
  {
    $ID=$row_blog['ID'];
    $timestamp=$row_blog['timestamp'];
    $location=$row_blog['location'];
    $var=$people[$location];
    
     echo '<tr align="center">
  <td>'.$i.'</td>
  
  
  <td>'.$ID.'</td>
  <td>'.$var.'</td>
  
  
<td>'.$timestamp.'</td>
<td> 
<select name="flist" form="fwd'.$i.'">';
for($j=1;$j<=7;$j++){
	if($j!=$location and $j!=$user_id)
	{
		echo '<option value="'.$j.'">'.$people[$j].'</option>';
	}
}

echo '</select></td><td><form action="forward.php" id="fwd'.$i.'" method="post" >
	<input type="hidden" name="ID" value="'.$ID.'">
	<input align="center" type="submit">
</form></td>
  
  
</tr>';

$i=$i+1;

  }

  ?>


				</table>
				</div>
</br>
</br>

<div>
					</br>
					<table  style="background-color:#DDDDDD;     margin-left: 200px;" align="center" width="1000"  border="5" >

					<tr align="center" >
 				  <th style="text-align: center;line-height: 25px;">S.no</th>
				  <th style="text-align: center;line-height: 25px;">TRACKING ID</th>
				  <th style="text-align: center;line-height: 25px;">STATUS</th>
				  <th style="text-align: center;line-height: 25px;">DATE AND TIME</th>
				  
  
  
					</tr>


					<?php




 

				$i=1;

  
  				$user_id=$_SESSION['user_id'];
  				$qry="SELECT * FROM document WHERE location<>'$user_id' order by timestamp desc";
  				$run_blog=mysqli_query($conn,$qry);
  while($row_blog=mysqli_fetch_array($run_blog))
  {
    $ID=$row_blog['ID'];
    $timestamp=$row_blog['timestamp'];
    $location=$row_blog['location'];
    $var=$people[$location];
    
     echo '<tr align="center">
  <td>'.$i.'</td>
  
  
  <td>'.$ID.'</td>
  <td>'.$var.'</td>
  
  
<td>'.$timestamp.'</td>' ;




$i=$i+1;

  }

  ?>


				</table>
				</div>



					<?php
				}
				else{
					
					$user_id=$_SESSION['user_id'];
					?>
					<div>
					</br>
					<table  style="background-color:#DDDDDD;     margin-left: 200px;" align="center" width="1000"  border="5" >

					<tr align="center" >
 				  <th style="text-align: center;line-height: 25px;">S.no</th>
				  <th style="text-align: center;line-height: 25px;">TRACKING ID</th>
				  <th style="text-align: center;line-height: 25px;">DATE AND TIME</th>
				  <th style="text-align: center;line-height: 25px;">Forward</th>
				  <th style="text-align: center;line-height: 25px;">Submit</th>
  
  
					</tr>


					<?php




 

				$i=1;

  
  				
  				$qry="SELECT * FROM document WHERE location='$user_id' order by timestamp desc";
  				$run_blog=mysqli_query($conn,$qry);
  while($row_blog=mysqli_fetch_array($run_blog))
  {
    $ID=$row_blog['ID'];
    $timestamp=$row_blog['timestamp'];

 echo '<tr align="center">
  <td>'.$i.'</td>
  
  
  <td>'.$ID.'</td>
<td>'.$timestamp.'</td>
<td> 
<select name="flist" form="fwd'.$i.'">';
for($j=1;$j<=7;$j++){
	if($j!=$user_id)
	{
		echo '<option value="'.$j.'">'.$people[$j].'</option>';
	}
}

echo '</select></td><td><form action="forward.php" id="fwd'.$i.'" method="post" >
	<input type="hidden" name="ID" value="'.$ID.'">
	<input align="center" type="submit">
</form></td>
  
  
</tr>';

$i=$i+1;

  }

  ?>


				</table>
				</div>


					<?php
				}
			?>
			</center>



	</body>
</html>
