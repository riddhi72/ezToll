<?php 
	session_start();
	$conn = new mysqli('localhost', 'root', '', 'ezToll');
	//echo $_SESSION['licno'];
	//echo $_SESSION['driver_name'];
	//echo $_SESSION['vehToday'];
	//echo $_SESSION['tollToday'];
	
?>





<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
</head>
<body>
	<?php
		if (isset($_SESSION['message'])) {
			echo "<div>", $_SESSION['message'], "</div>";
			unset($_SESSION['message']);	
		}
	?>

    <h2>Driver-Home</h2>
    <h4>Welcome, <?php echo $_SESSION['driver_name']; ?> </h4>
    

	<!--Use this for logout in nav-->
	<br><br><br><br>
    <div><a href="logout.php">Logout</a></div>

</body>

</html>
