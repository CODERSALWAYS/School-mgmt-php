
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>School Management</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<ul class="list-group">
	<li class="list-group-item list-group-item-danger" align="center"><a href="index.php" style="color: red;">SCHOOL MANAGEMENT </a><a href="adminlogin.php"><span class="glyphicon glyphicon-hand-right"></span> Admin Login</a></li>
	</ul>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form action="index.php" method="post">
					<h1 align="center">Student Details</h1>
					<hr>
					<label for="rollno">Roll No.</label>
					<input type="text" name="rollno" class="form-control"><br>
					<label for="std">Std</label>
					<select name="std" id="std" class="form-control">
						<option value="">Select Class</option>
						<option value="First Class">First Class</option>
						<option value="Second Class">Second Class</option>
						<option value="Third Class">Third Class</option>
						<option value="Fourth Class">Fourth Class</option>
						<option value="Fifth Class">Fifth Class</option>
						<option value="Six Class">Six Class</option>
						<option value="Seven Class">Seven Class</option>
					</select><br>
					<input type="submit" name="submit" class="btn btn-danger">
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div><br>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<table class="table table-stripped table-borderd">
		  				<?php if(isset($_POST['submit'])) {?>
		  					<tr style="background: lightgray;">
		  						<th>Photo</th>
		  						<th colspan="2">Details</th>
		  					</tr>
		  				<?php } ?>

		  				<?php 
		  				if (isset($_POST['submit'])) {
		  					include_once('dbconnection.php');
		  					$rollno = $_POST['rollno'];
	  					 	$std = $_POST['std'];

		  					$sql = "select * from tbl_student where rollno ='$rollno' AND class ='$std' ";
		  					
		  					$connect = mysqli_query($connection,$sql);

		  					$rows = mysqli_num_rows($connect);
		  					if ($rows < 1) {?>
		  						<h4 style="color: red" align="center">Wrong Credintials</h4>	
		  				 	<?php 
		  				 }
		  				 else{
		  				 	while($rows = mysqli_fetch_assoc($connect))
		  				 	 {?>
		  				 	 	<tr>
		  				 	 		<td rowspan="6" style="width: 150px;"> <img src="imageupload/<?php echo $rows['image']?>" alt=""? style="width: 150px;"></td>
		  				 	 	</tr>
	  							<tr>
		  				 			<th>Name</th>
		  				 			<td><?php echo $rows['name'] ?></td>
		  				 		</tr>
		  				 		<tr>
									<th>Age:-</th>
									<td><?php echo $rows['age'] ?></td>
								</tr>
								<tr>
									<th>Class:-</th>
									<td><?php echo $rows['class'] ?></td>
								</tr>
								<tr>
									<th>Parent Contact No.:-</th>
									<td><?php echo $rows['pcont'] ?></td>
								</tr>
								<tr>
									<th>Address:-</th>
									<td><?php echo $rows['address'] ?></td>
								</tr>	
		  				 	<?php }
		  				 }
		  				}
	  				 ?>
				</table>
			</div>
		</div>
	</div>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
</body>
</html>