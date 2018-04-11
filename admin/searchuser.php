
<?php include("../session.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search User</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include_once("header.php") ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<form action="searchuser.php" method="post">
				<table class="table table-striped">	
					<tr>
						<th>Roll No:</th>
						<td><input type="text" name="rollno" class="form-control"></td>
						<th>Name:</th>
						<td><input type="text" name="name" class="form-control"></td>
						<td><input type="submit" name="submit" class="btn btn-success"></td>
					</tr>
				</table>
				</form>
			</div>
			<div class="col-sm-2"></div>
		</div>
		<table class="table table-striped">  
			<tr>
				<th>Image:</th>
				<th>Name</th>
				<th>Age</th>
				<th>Roll No.</th>
				<th>Address</th>
				<th>City</th>
				<th>Paret Contact No.</th>
				<th>Action</th>
			</tr>
			<?php 

				include_once("../dbconnection.php");
			if (isset($_POST['submit'])) {
				$rollno = $_POST['rollno'];
				$name = $_POST['name'];

				$sql ="select * from tbl_student where rollno = '$rollno' AND name LIKE '%$name%'";
				$connect = mysqli_query($connection,$sql);
				$rows = mysqli_num_rows($connect);

				if ($rows < 1) {?>
				<tr>
					<table class="table">
						<tr >
						<td align="center">
						<h4 style="color: red">No Record Found</h4>	
						</td>
						</tr>
					</table>
				</tr>
				<?php
				}
				else{
					while ($row = mysqli_fetch_assoc($connect)) {?>
					<tr style="text-align: ">
					<td>
					<img src="../imageupload/<?php echo $row['image']; ?>" style="    width: 150px;" >
					</td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['age'] ?></td>
					<td><?php echo $row['rollno'] ?></td>
					<td><?php echo $row['address'] ?></td>
					<td><?php echo $row['city'] ?></td>
					<td><?php echo $row['pcont'] ?></td>
					<td><a href="updatestudent.php?sid=<?php echo $row['sid']?>">Update</a></td>
					<td><a href="deletestudent.php?sid=<?php echo $row['sid']?>">Delete</a></td>
		</tr>
					<?php
					}
				}
			}
			 ?>
		</table>
	</div>
</body>
</html>