<?php 
session_start();
if (isset($_SESSION['aId'])) {
	echo "";
}
else{
	header('location: ../adminlogin.php');
}

 ?>