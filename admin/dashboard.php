<?php include("../session.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>sms</title>
</head>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
 
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
 
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

<body>
	<div class="panel-primary" align="center">
		<div class="panel panel-heading">	
		<span class="glyphicon glyphicon-hand-left"></span>
		<a href="../index.php" style="color: white">Back To Home Page</a>
		</div>
		<div class="panel panel-body"><span class="glyphicon glyphicon-off"></span><a href="logout.php">
			<?php echo $_SESSION['uname'] ?> Logout</a></div>
	</div>
	
	<div class="container">
		<?php 
			include_once("../dbconnection.php");
		
			$sql = "select * from tbl_student";

			$run = mysqli_query($connection, $sql);
			
		?>
			<div class="panel-success" align="center">
				<div class="panel panel-heading">
					<a href="addstudent.php">Add Student</a>
					<div class="search" style="margin-top: -20px;" align="right">
					<a href="searchuser.php"><span class="glyphicon glyphicon-search" style="color: red;margin-bottom: 10px; "></span></a>
					</div>
								<!-- <form action="dashboard.php" method="post">
					<input type="text" name="search" class="form-control">
					<input type="submit" name="submit" class="btn btn-primary">
						
					</form> -->
				</div>
			</div>	

		<table id="mytable" class="table table-striped">
			<thead>
				<tr>
					<th>Photo</th>
					<th>ID</th>
					<th>Name</th>
					<th>Class</th>
					<th>Roll NO.</th>
					<th>City</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php while($data = mysqli_fetch_assoc($run)){
				?>
				<tr>
					<td style="width: 150px;"><img src="../imageupload/<?php echo $data['image'] ?>" style="width: 150px;"></td>
					<td><?php echo $data['sid'] ?></td>
					<td><?php echo $data['name'] ?></td>
					<td><?php echo $data['class'] ?></td>
					<td><?php echo $data['rollno'] ?></td>
					<td><?php echo $data['city'] ?></td>
					<td><?php echo $data['address'] ?></td>
					<td><div class="btn btn-success">
						<a style="color: white; text-decoration: none; " href="updatestudent.php?sid=<?php echo $data['sid']?>">Update</a>
						</div> | <div class="btn btn-danger">
						<a style="color: white; text-decoration: none;" href="deletestudent.php?sid=<?php echo $data['sid']?>">Delete</a>
						</div>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<h2 align="center"></h2>
		<h2 align="center"></h2>
	</div>
	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
