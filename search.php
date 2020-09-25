

<!DOCTYPE html>
<html>
<head>
	<title>Search</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/js/bootstrap.js">

</head>
<body>
	<div class="container">
	<h1>Assignment# 02</h1>
	<h2>BAHER EDRISE</h2>
	<h3>MU 2020</h3>
	<h4>Faculty Computer Science</h4>
	<h4>SUBJECT: SEARCH BY ID AND NAME</h4>
	<h5>PHP & MYSQL</h5>
	<hr>
	<hr>
	<hr>

			<fieldset>
				<legend>Search Area</legend>
				<div class="form-group">
			<form method="POST" action="" class="">
			<input class="form-control" name="keyword" type="text" placeholder="Search By ID or Name"><br>
			<button name="search" class="btn btn-primary">Search</button>
				</div>
			</form>
			</fieldset>
		<br><br>

		<?php 

		//control the table heading show off
		function showtabletag(){
			?>


		<table border="1" width="100%" class="table table-dark">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Password</th>
		</tr>

			<?php
		}

		?>


	<?php
		$connection=mysqli_connect("localhost","root","","search");
		if (!$connection) {
			echo "Error to establish connection!";
		}
		$flag=false;

		if (isset($_POST['search'])) {
			
			$flag=true;
			if($flag==true){

				showtabletag();
			}

			$i=$_POST['keyword'];
			
			if (is_numeric($i)) {

			$sql="SELECT* FROM users WHERE id=$i";

			$result= mysqli_query($connection, $sql);

			if (mysqli_num_rows($result)>0) {
				while ($row= mysqli_fetch_array($result)) {
					?>

					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['subject']; ?></td>
					</tr>





				<?php
			}//end of while loop
		}//end of if block of row counting
			}//END OF THE CHECKING ID BLOCK

			elseif (!is_numeric($i)) {
				
			$sql="SELECT* FROM users WHERE name='$i'";

			$result= mysqli_query($connection, $sql);

			if (mysqli_num_rows($result)>0) {
				while ($row= mysqli_fetch_array($result)) {
					?>

					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['subject']; ?></td>
					</tr>





				<?php
			}//end of while loop
		}//end of if block of row counting

			}//end of checking name block

		}//END OF THE SEARCH BUTTON CLICK BLOCK
	?>

	</table>
</div>
</body>
</html>