<?php
 	session_start();
	include('contactclass.php');

	// check if session IS set. then, give access to backend functionality.
	// Otherwise, redirect the user to the homepage or login page.

	if(!isset($_SESSION['africpoet'])){
		header("location: login.php");
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contacts App <?php echo $title; ?></title>
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
			margin-left: 2px;
		}

		li:hover{
			background-color: green; 
			color: white;
		}

		a:hover{
			color: pink;
			text-decoration: none;
		}
		a{
			color:yellow;
		}
		ul{
			margin: 15px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			<h1 style="display: inline;">Contacts App</h1>
			<input type="text" name="search" id="search" placeholder="search users" style="padding: 4px; width:250px;" >
			<div id="searchresult" style="display:none; position: absolute; top: 42px; left: 250px; border: 1px solid #333; z-index: 30; width:250px; background-color: white">
				display result here
			</div>
			<span class="text-info">
			Welcome! <?php echo $_SESSION['names']; ?>
			</span>
			</div>
		</div>
		<div class="row" style="background-color: skyblue">
			<div class="col-md-12">
				<ul>
					<li><a href="home.php">Dashboard</a></li>
					<li><a href="addcontact.php">Add Contacts</a></li>
					<li><a href="viewcontacts.php">View Contacts</a></li>
					
					<li><a href="logout.php">Log Out</a></li>
				</ul>
				
			</div>
		</div>

		
		<span>
			Today's Date is <?php echo date('dS F, Y : h:i:s a'); ?>
		</span>

	</div>