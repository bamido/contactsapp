<?php include('header.php'); ?>


	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">

				<h2>Login Form</h2>
				
	<?php
		if($_SERVER['REQUEST_METHOD']=="POST"){

			//var_dump($_POST);

		// validate username
		if(empty($_POST['username'])){
			$error1 = "<span class='error'> Username field cannot be empty</span>";
		}elseif(!filter_var($_POST['username'],FILTER_VALIDATE_EMAIL)){
			$error1 = "<span class='error'> Invalid Email Address</span>";
		}else{
			$username = $_POST['username'];
		}

		// validate password
		if(empty($_POST['password'])){
			$error2 = "<span class='error'> password field cannot be empty</span>";
		}else{
			$password = $_POST['password'];
		}

				if($error1=='' && $error2==''){

					// create instance/object of Authentication class
					$logger = new Authentication();
					$logger->login($username, $password);

				}

		}
	?>


				<form method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>">
					<table>
					<tr>
						<td>Username: * </td>
						<td>
							<input type="text" name="username" value="<?php echo $_POST['username'] ?>" placeholder="enter email address"> 
							<?php echo $error1; ?>
						
						</td>
					</tr>
					<tr>
						<td>Password: *</td>
						<td>
							<input type="password" name="password" value="<?php echo $_POST['password'] ?>"> 
							<?php echo $error2; ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
						<input type="reset" name="reset" value="Reset">
						<input type="submit" name="submit" value="Submit">
							
						</td>
					</tr>			
					</table>
				</form>

			</div>
			<div class="col-md-3"></div>
			
		</div>
		
	</div>

<?php include('footer.php'); ?>