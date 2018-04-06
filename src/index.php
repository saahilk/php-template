<?php
session_start();
?>


<title>NITC</title>


<html>
	<head>

		<meta name="google-signin-client_id" content="952937888060-b470t00um3s9uclet4qaua91ocvrjfus.apps.googleusercontent.com">
		<meta name="google-signin-hosted_domain" content="nitc.ac.in" />
		
<?php

if(isset($_SESSION["user_id"]) && $_SESSION["user_id"]!= ""){
	$_SESSION["user_id"]= "";
	// echo '<h1>user_id:'.$_SESSION['user_id'].'</h1>';
}
?>
		<style>

			.navBar {
				margin: 0;
				padding: 0;
				overflow: hidden;
				background-color: #39B7CD;
				display: block;
				align-content: flex-start;
			}

			.navItemList li a {
			    	display: block;
			    	color: white;
			    	text-align: center;
			    	padding: 0 16px;
			    	text-decoration: none;
			}

			.navtitle{
			 	font-family: arial, sans-serif;
			  	color: white;
			  	text-align: center;
			  	padding: 0px 200px 14px 6px;
			  	margin-right: 200px;
			  	font-size: 20px;
			  	text-decoration: none;
			}

			.subButton{
			  	position: relative;
			  	margin-top:10px;
			  	background-color: #39B7CD;;
			  	border: none;
			  	color: #fff;
			  	border-radius: 15px;
			  	width: 100px;
			  	height: 40px;
			  	cursor: pointer;
			}

			.blog{
			  	border-style: solid;
			 	border-width:1px;
			  	border-color: #DCDCDC;
			  	border-radius: 15px;
			  	margin-top:10px;
			  	padding:5px;
			}

			.blogdel{
			  	margin-bottom:7px;
			}
	
			.navItemList{
			  	list-style-type: none;
			}

			.navItemList li {
			    	float: left;
			}
			
			.navItemList li a:hover {
			}

			.navtitle a:hover{
			}
			
			#feeds{
			  	align-content:center;
			}

			#feeds{
			  	border-style: solid;
			  	border-width: 0px;
			  	padding:10px;
			  	border-color: #333;
			  	border-radius: 15px;
			  	margin: 25px 50px;
			}

		</style>


 <meta name="google-signin-client_id" content="198245615700-pgvukhlk6acg5e6767spu3b35fkcld31.apps.googleusercontent.com"> 
<meta name ="google-signin-hosted_domain" content="nitc.ac.in"/> 
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>

		var i =0;
		
		function onSignIn(googleUser) {
		  	var profile = googleUser.getBasicProfile();
		  
			document.getElementById("emailval").value=profile.getEmail();
		  	document.getElementById("nameval").value=profile.getName();
		  	document.getElementById("signinform").submit();
		 
			i=1;
		}

		function signOut() {
			var auth2 = gapi.auth2.getAuthInstance();
			
			auth2.signOut().then(function () {
				console.log('User signed out.');
			});
		}

		function signIN(){
			if(i==1)
				document.getElementById("signinform").submit();
		}

	</script>
	</head>

	<body style="padding:0;margin:0;font-family: arial, sans-serif;">
		<div class="navBar">
	  		<ul class="navItemList">
	     	 		<li><div class="navtitle"><a href="#"><b>Doc Tracker</b></a></div></li>
	    		</ul>
	  	</div>
		<center>
			<h1>Sign In</h1>
			<form action="home.php" id="signinform" method="post" style="display:none">
				<input name="user_email" id="emailval" style="display:none" required/>
				<input name="user_name" id="nameval" style="display:none" required/>
			</form>
			<div class="g-signin2" data-onsuccess="onSignIn" onclick="signIN();"></div>
		</center>
	</body>

</html>
