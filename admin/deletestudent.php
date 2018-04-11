<?php 
$id = $_GET['sid'];
echo $id;
include("../session.php");
include("../dbconnection.php");

$sql = "delete from tbl_student where sid = $id";
print_r($sql);
$run = mysqli_query($connection, $sql);

if ($run == true) {
	?>
	<script>
		alert("Data Deleted Successfully");
		window.location.href = "dashboard.php";
	</script>
	<?php
}
else{?>
	echo "Delete Unsuccessfully";
	<script>
		// window.location.href = "dashboard.php"
		alert( "Delete Unsuccessfully");
	</script>
	<?php
}

?>