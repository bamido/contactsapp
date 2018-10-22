	<?php include('adminheader.php'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
			<?php
				// to display contacts data in the update form
				if($_SERVER['REQUEST_METHOD']=='GET'){

				$contactid = $_GET['contactid'];
					
					// create instance/object of PhoneBook class
					$contactobj = new PhoneBook;

					$output = $contactobj->getContactDetails($contactid);
					
				}

				// to update the new data/info
				if($_SERVER['REQUEST_METHOD']=='POST'){


					// create instance/object of PhoneBook class
					$contactobj = new PhoneBook;

					$contactobj->editContact($_POST['lastname'], $_POST['firstname'], $_POST['nickname'], $_POST['username'], $_POST['phone'], $_POST['contactaddress'], $_POST['meetat'], $_POST['contactid']);

				}

			?>
				<h2>Update Contact </h2>
				<?php echo str_repeat("*",50); ?>
				<!-- Bootstrap Form -->
				<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
					<div class="form-group">
						<label for="lastname" class="control-label col-md-4" >Lastname</label>
						<div class="col-md-8">
							<input type="text" name="lastname" id="lastname" class="form-control" placeholder="lastname" value="<?php echo $output['lastname']; ?>">
							<span class="error"><?php echo $err1; ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="firstname" class="control-label col-md-4" >Firstname</label>
						<div class="col-md-8">
							<input type="text" name="firstname" id="firstname" class="form-control" placeholder="firstname" value="<?php echo $output['firstname']; ?>">
							<span class="error"><?php echo $err2; ?></span>
						</div>
					</div>

					<div class="form-group">
						<label for="firstname" class="control-label col-md-4" >Nickname</label>
						<div class="col-md-8">
							<input type="text" name="nickname" id="nickname" class="form-control" placeholder="nickname" value="<?php echo $output['nickname']; ?>">
							<span class="error"><?php echo $err2; ?></span>
						</div>
					</div>
					
					

					<div class="form-group">
						<label for="username" class="control-label col-md-4">Email Address </label>
						<div class="col-md-8">
							<input type="email" name="username" id="username" class="form-control" placeholder="enter valid email" value="<?php echo $output['emailaddress']; ?>">
							<span class="error"><?php echo $err4; ?></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="phone" class="control-label col-md-4">Phone Number </label>
						<div class="col-md-8">
							<input type="text" name="phone" id="phone" class="form-control" placeholder="phone number" value="<?php echo $output['phonenumber']; ?>">
							<span class="error"><?php echo $err4; ?></span>
						</div>
					</div>

					<div class="form-group">
						<label for="contactaddress" class="control-label col-md-4"> Contact Address </label>
						<div class="col-md-8">
							<input type="text" name="contactaddress" id="contactaddress" class="form-control" placeholder="contact address" value="<?php echo $output['contactaddress']; ?>">
							<span class="error"><?php echo $err4; ?></span>
						</div>
					</div>

					<div class="form-group">
						<label for="meetat" class="control-label col-md-4"> Meet At </label>
						<div class="col-md-8">
							<input type="text" name="meetat" id="meetat" class="form-control" placeholder="Meet At" value="<?php echo $output['meetat']; ?>">
							<span class="error"><?php echo $err4; ?></span>
						</div>
					</div>

					
					<div class="form-group">
						<div class="col-md-offset-6 col-md-6">
							<input type="hidden" name="contactid" value="<?php echo $output['contactid']; ?>">
							<button type="reset" class="btn btn-default">Clear</button>
							<input type="submit" name="submit" Value="Save Changes" class="btn btn-success" />
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-3"></div>
			
		</div>
		
	</div>
<?php include('footer.php'); ?>