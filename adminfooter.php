<?php
	if($con){
		mysqli_close($con);
	}
?>
<div class="container">
	Copyright &copy; <?php echo date('Y'); ?> , Contacts App. All Rights Reserved.
</div>

<script type="text/javascript" src="bootstrap/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
 <script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
 <script type="text/javascript" src="tiny_mce/initialize_tinyz.js"></script>
  
<script type="text/javascript">
	$(document).ready(function(){

		// to search for users
		$('#search').keyup(function(){

			$('#searchresult').css('display','inline');
			
			// get the value from search unput element
			var searchvalue = $('#search').val();
			//alert(searchvalue);
			var searchurl = "search.php";
			// send the input data to the server
			$('#searchresult').load(searchurl, {searchword: searchvalue});


		});

		// to generate multiplication table
		$('#multitable').click(function(){

			var numbervalue = $('#num').val();

			//alert(numbervalue);
			// send the data to createtable.php using jquery ajax load
			$('#result').load("createtable.php", {number: numbervalue})

		});

		



	});
</script>
</body>
</html>