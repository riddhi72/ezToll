<?php
	session_start();
	session_destroy();
	unset($_SESSION['driver_name']);
	$_SESSION['message'] = "Logged out successfully";
	header("location: index.php");
?>	