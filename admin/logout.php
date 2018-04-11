<?php 
session_start();

if (isset($_SESSION['aId'])) {
	session_destroy();   
}
	header('location:../adminlogin.php');
 ?>