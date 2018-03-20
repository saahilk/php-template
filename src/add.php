<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="nitc.png">

<style>

body{
    background-color: #f2f2f2;
}

input[type=text], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

input[type=date], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

input[type=time], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}


input[type=file], select, textarea{
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
    background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

</style>




</head>


<body>
	<a href="index.php"><img src="back.png" height="50px" width="50px"></a>

<center>
<h1>NATIONAL INSTITUTE OF TECHNOLOGY CALICUT</h1>
<h2>phD Student Project Management System</h2></center>
<br><br>

 <div class="container">
 <form action="studentdata.php" method="POST" enctype="multipart/form-data">


   <label >Full Name</label>
    <input type="text"  name="name" placeholder="Name">
        <label >Roll No</label>
    <input type="text"  name="rollno" placeholder="Roll No">
        <label >Email Id</label>
    <input type="text"  name="emailid" placeholder="EmailId">

<label for="department">Department</label>
<select  name="department">
<option value="">Select the department</option>    
<option value="Architecture and Planning ">Architecture and Planning </option>
<option value="Chemical Engineering">Chemical Engineering</option>
<option value="Civil Engineering">Civil Engineering </option>
<option value="Computer Science & Engineering">Computer Science Engineering</option>
<option value="Electrical Engineering">Electrical Engineering</option>
<option value="Electronics & Communication Engineering">Electronics Communication Engineering </option>
<option value="Electrical Engineering">Electrical Engineering</option>
<option value="Mechanical Engineering">Mechanical Engineering  </option> 
<option value="Mathematics">Mathematics</option> 
<option value="Physics">Physics</option>   
<br>
</select>

<label >Guidance</label>
<input type="text"  name="guidance" placeholder="Guidance">
<label >Guidance Email-Id</label>
<input type="text"  name="guide_emailid" placeholder="Email -Id">


  <h3 style="color:green">Project Details</h3></center>
  <br>
  <label >Project Topic </label>
<input type="text"  name="topic" placeholder="project Name">
<label >Status of the project</label>

<select  name="status">
<option value=""></option>    
<option value="Dean's approval">Dean's approval</option>
<option value="Forwarded to reviewer">Forwarded to reviewer</option>
<option value="Pending Reviewer's Response">Pending Reviewer's Response</option>
</select>
<br>
<label >Date</label>
<input type="date"  name="date" placeholder="Date">

<input type="submit" value="Submit">
</form>

</div> 


</body>
</html>