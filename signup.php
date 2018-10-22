	<?php include('header.php'); ?>

	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){

		$username = $_POST['username'];
		$names = $_POST['name'];
		$password = $_POST['password'];

		// create instance/object of Authentication class
		$mysignup = new Authentication;
		$mysignup->signUp($username, $names, $password);
	}

	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<h2>Sign Up Form </h2>
				<?php echo str_repeat("*",50); ?>
				<!-- Bootstrap Form -->
				<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name" class="control-label col-md-4" > Names </label>
						<div class="col-md-8">
							<input type="text" name="name" id="name" class="form-control" placeholder="Names" value="<?php echo $_POST['name']; ?>">
							<span class="error"><?php echo $err1; ?></span>
						</div>
					</div>
					
					

					<div class="form-group">
						<label for="username" class="control-label col-md-4">Email Address </label>
						<div class="col-md-8">
							<input type="email" name="username" id="username" class="form-control" placeholder="enter valid email" value="<?php echo $_POST['username']; ?>">
							<span class="error"><?php echo $err4; ?></span>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="control-label col-md-4">Password</label>
						<div class="col-md-8">
							<input type="password" name="password" id="password" class="form-control" value="<?php echo $_POST['password']; ?>" >
							<span class="error"><?php echo $err5; ?></span>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-offset-6 col-md-6">
							<button type="reset" class="btn btn-default">Clear</button>
							<input type="submit" name="submit" Value="Register" class="btn btn-success" />
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-3"></div>
			
		</div>
		
	</div>
<?php include('footer.php'); ?>