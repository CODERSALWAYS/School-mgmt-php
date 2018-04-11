<?php 
session_start(); 
if (isset($_SESSION['aId'])) {
	header("location: admin/dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="panel-primary">
		<div class="panel panel-heading" align="center">Admin Login</div>
		<div class="panel panel-body" align="center"><span class="glyphicon glyphicon-hand-left"></span><a href="index.php">Back To Home Page </a></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form action="adminlogin.php" method="post">
					<label for="uname">Username:</label>
					<input type="text" name="uname" class="form-control" required=""><br>
					<label for="pass">Password:</label>
					<input type="password" name="pass" class="form-control" required=""><br>	
					<input type="submit" name="submit" class="btn btn-primary">
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>

<?php 
if (isset($_POST['submit'])) {
	include_once('dbconnection.php');
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];

	$sql = "select * from tbl_admin where username ='$uname' AND password = '$pass'";

	$connect = mysqli_query($connection, $sql);
	$rows = mysqli_fetch_row($connect);

	if ($rows < 1) {?>
		<h2 align="center" style="color: red">Wrong Credentials</h2>	
	<?php }
	else{
		$id = $rows[0];
		$name=$rows[1];

		$_SESSION['aId'] = $id;
		$_SESSION['uname'] = $name;

		header('location:admin/dashboard.php');
	}
}
 ?>