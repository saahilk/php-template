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
	8=>"GA6",
	9=>"GA7",
	10=>"GA8",
	11=>"GA9",
];

$people1=[
	0=>"Staff",
	1=>"Dean GA8",
	2=>"DR GA9",
	3=>"GA1",
	4=>"GA2",
	5=>"GA3",
	6=>"GA4",
	7=>"GA5",
	8=>"GA6",
	9=>"GA7",
	10=>"GA8",
	11=>"GA9",
];

$user_id=$_SESSION['user_id'];

?>
<!DOCTYPE html>
<title>NITC</title>
<html>
	<head>
		<meta name="google-signin-client_id" content="952937888060-b470t00um3s9uclet4qaua91ocvrjfus.apps.googleusercontent.com">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


			* {
    			box-sizing: border-box;
			}

			form.example input[type=text] {
			    padding: 10px;
			    font-size: 17px;
			    border: 1px solid grey;
			    float: left;
			    width: 80%;
			    background: #f1f1f1;
			}

			form.example button {
			    float: left;
			    width: 20%;
			    padding: 10px;
			    background: #2196F3;
			    color: white;
			    font-size: 17px;
			    border: 1px solid grey;
			    border-left: none;
			    cursor: pointer;
			}

			form.example button:hover {
			    background: #0b7dda;
			}

			form.example::after {
			    content: "";
			    clear: both;
			    display: table;
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
					<a href="https://accounts.google.com/Logout?&continue=https://appengine.google.com/_ah/logout?continue=http://acadtracker.nitc.ac.in:8081" ><b>Logout</b></a>
				</li>

				<?php

				if($_SESSION['user_id']=='1' or $_SESSION['user_id']=='2')
				{
					?>
					
					

					
				<li style="font-family: arial, sans-serif;float:right;margin-right:5px;">
					<a href="otherfiles.php" ><b>All Documents</b></a>
				</li>

				<li style="font-family: arial, sans-serif;float:right;margin-right:5px;">
					<a href="add_trackingid_dean.php"><b>Add TrackingID</b></a>
				</li>



					<?php

				}

				?>
				
				<li style="font-family: arial, sans-serif;float:right;margin-right:5px;">
					<a href="home.php"><b>Pending Documents</b></a>
				</li>
		    
		      		<li style="font-family: arial, sans-serif;float:right;margin-right:5px;">
					<b>
<?php 
echo $people1[$_SESSION['user_id']]

?>

		      	
		   		     	</b>
				</li>
		    	</ul>
		</div>
	<center>
		<?php

if(isset($_GET['search']))
{
	?>
		
		<div>
					<h2 align="center">Pending documents</h2>
					<br>
				</br>
				</br>

					<form align="right" class="example" action="search_pending.php" style="margin:auto;max-width:300px">
  						<input type="text" placeholder="Search.." name="search">
  						<button type="submit"><i class="fa fa-search"></i></button>
					</form>

				</br>
				</br>
				</br>


					<table  style="background-color:#DDDDDD;     margin-left: 200px;" align="center" width="1000"  border="5" >

					<tr align="center" >
 				 <th style="text-align: center;line-height: 25px;">S.no</th>
				  <th style="text-align: center;line-height: 25px;">Tracking ID</th>
				  <th style="text-align: center;line-height: 25px;">Submitted by</th>
				   <th style="text-align: center;line-height: 25px;">First Submitted on</th>
				   <th style="text-align: center;line-height: 25px;">Initial Remarks</th>
				  <th style="text-align: center;line-height: 25px;">Recieved here on</th>
				   <th style="text-align: center;line-height: 25px;">Current Remarks</th>
				  <th style="text-align: center;line-height: 25px;">Edit Remarks</th>
				 
				  <th style="text-align: center;line-height: 25px;">History</th>
				  
				  <th style="text-align: center;line-height: 25px;">Forward To</th>
				  <th style="text-align: center;line-height: 25px;">Submit</th>
  
					</tr>


					<?php




 

				$i=1;
				$text=$_GET['search'];
  
  				$user_id=$_SESSION['user_id'];
  				$qry="SELECT * FROM document WHERE ( `ID` LIKE '%$text%' OR  `initial_remarks` LIKE '%$text%' OR `final_remarks` LIKE '%$text%' OR `submitted_by` LIKE '%$text%' ) AND (location='$user_id') order by recieved_on desc";
  				$run_blog=mysqli_query($conn,$qry);
  while($row_blog=mysqli_fetch_array($run_blog))
  {
    $ID=$row_blog['ID'];
    $timestamp1=$row_blog['recieved_on'];
    $timestamp3= new DateTime($timestamp1);
    $timestamp4=$timestamp3->format('d-m-Y | H:i');
    $remarks1=$row_blog['initial_remarks'];
    $remarks2=$row_blog['final_remarks'];

    $submitted_by=$row_blog['submitted_by'];
    $timestamp2=$row_blog['submitted_on'];
    $timestamp5= new DateTime($timestamp2);
    $timestamp6=$timestamp5->format('d-m-Y | H:i');
    $var1=15;
    
    
    echo '<tr align="center">
  <td>'.$i.'</td>
  
  
  <td>'.$ID.'</td>
  <td>'.$submitted_by.'</td>
  <td>'.$timestamp4.'</td>
  <td>'.$remarks1.'</td>
  
  <td>'.$timestamp6.'</td>
  <td>'.$remarks2.'</td>
   <td><a href="edit.php?track_id='.$ID.'">Edit</a></td>
  <td><a href="history.php?track_id='.$ID.'">History</a></td>
<td> 
<select name="flist" form="fwd'.$i.'">';
for($j=1;$j<=11;$j++){
	if($j!=$location and $j!=$user_id)
	{
		echo '<option align="center" value="'.$j.'">'.$people[$j].'</option>';
	}
}

echo '<option align="center" value="'.$var1.'">Completed</option></select></td><td><form action="forward.php" id="fwd'.$i.'" method="post" >
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

</br>
</br>
</br>
</br>


			</center>



	</body>
</html>