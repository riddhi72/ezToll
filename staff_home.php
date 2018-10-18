<?php 
	session_start();
	
?>





<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
	<?php
		if (isset($_SESSION['message'])) {
			echo "<div>", $_SESSION['message'], "</div>";
			unset($_SESSION['message']);	
		}
	?>

    <h2>Staff-Home</h2>
    <div>
        <h4>Welcome, <?php echo $_SESSION['staff_name']; ?> </h4>
    </div>
    <br><br>
    <div><a href="logout.php">Logout</a></div>
</body>

</html>
