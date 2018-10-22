<?php
 	session_start();
	include('contactclass.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contacts App</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<!-- Bootstrap css -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<!-- external css -->
	<link rel="stylesheet" type="text/css" href="css/political.css">
	<style type="text/css">
		li{
			display: inline;
			padding: 10px;
			background-color: grey;
			color: white;
		}

		li:hover{
			background-color: green; 
			color: white;
		}

		a:hover{
			color: pink;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="container-fluid" >
		<div><h1>Contacts App</h1></div>
			<ul style="background-color: skyblue; padding: 10px;">
			<li><a href="index.php">Home</a></li>
			<li>About Us</li>
			<li><a href="signup.php">Sign Up</a></li>
			<li><a href="login.php">Login</a></li>
			
		</ul>

	</div>