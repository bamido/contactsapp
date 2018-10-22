<?php include('adminheader.php'); ?>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){

		// create object / instantiate a class
		$deleteobj = new PhoneBook();
		$deleteobj->deleteContact($_POST['contactid']);

	}
?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			<h4>Are you sure you want to delete <?php echo $_GET['name']; ?> record?</h4>

			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
				<input type="hidden" name="contactid" value="<?php echo $_GET['contactid']; ?>">
				<input type="submit" name="submit" value="Delete">
				<a href="viewcontacts.php"> Back </a>
			</form>


	</div>
<?php include('footer.php'); ?>