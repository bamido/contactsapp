	<?php include('adminheader.php'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			<h4>All Contacts</h4>
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th>S/No</th>
							<th>Lastname</th>
							<th>Firstname</th>
							<th>Nickname</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Meet At</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					// create phonebook object
						$outputobj = new phonebook();
						// echo "<pre>";
						// print_r($outputobj->viewContact()); 
						// echo "</pre>";

						$contacts = $outputobj->viewContact();
						$kounter = 1;
						foreach ($contacts as $item) {
							
					?>
						<tr>
							<td><?php echo $kounter++; ?></td>
							<td><?php echo $item['lastname']; ?></td>
							<td><?php echo $item['firstname']; ?></td>
							<td><?php echo $item['nickname']; ?></td>
							<td><?php echo $item['emailaddress']; ?></td>
							<td><?php echo $item['phonenumber']; ?></td>
							<td><?php echo $item['contactaddress']; ?></td>
							<td><?php echo $item['meetat']; ?></td>
							<td>
								<a href="editcontact.php?contactid=<?php echo $item['contactid']; ?>">
									Edit
								</a>
								<a href="deletecontact.php?contactid=<?php echo $item['contactid']; ?>&name=<?php echo $item['firstname']." ".$item['lastname']; ?>">
									Delete
								</a>
							</td>
						</tr>
					<?php
						}
					?>
					</tbody>
					<tfoot>
						<tr>
							<th>S/No</th>
							<th>Lastname</th>
							<th>Firstname</th>
							<th>Nickname</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Meet At</th>
							<th>Action</th>
						</tr>
					</tfoot>
				</table>
				
			</div>
		</div>
		
	</div>
<?php include('footer.php'); ?>