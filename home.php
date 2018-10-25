<?php 
	session_start();
	$conn = new mysqli('localhost', 'root', '', 'ezToll');
	$licno = $_SESSION['licno'];
	$get_vehicleList_query = "SELECT * FROM Vehicle WHERE did = '$licno' ";
    $vehicle_result = mysqli_query($conn, $get_vehicleList_query);

    if (isset($_POST['next'])){
    	$_SESSION['vehToday'] = $_POST['vehToday'];
    	$_SESSION['tollToday'] = $_POST['tollToday'];   
    	header("location: receipt.php");   
    }
	
?>





<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style/home.css">
</head>
<body>
	<?php
		if (isset($_SESSION['message'])) {
			echo "<div>", $_SESSION['message'], "</div>";
			unset($_SESSION['message']);	
		}
	?>

    <h1>Driver-Home</h1>
    <h3 align="right"><a href="driver_history.php">Check Previous Transactions</a></h3>
    <h2 align="center">Welcome, <?php echo $_SESSION['driver_name']; ?> ! </h2>

    <form id="form" method="post" action="home.php" style="border:1px solid #ccc;text-align:center;">
    	<div class="container">
	    	<div class="input-group">
	    		<label><b>Which vehicle are you driving today?</b></label>
	    		<br>
	        	<select name ="vehToday">
	        		<?php
	        		while($vehicle_row = mysqli_fetch_array($vehicle_result))
	        		{
	        			echo "<option value='" .$vehicle_row['plateno']. "'>" .$vehicle_row['plateno']. "  " .$vehicle_row['VType']. "</option>";
	        			
	        		}
	        		?>
	        	</select>
	        </div>
	    	<br><br>
		    <div class="input-group">  
		    	<label><b>Which toll are you heading towards?</b></label>
		        <br>
		        <select name="tollToday">
		        	<option value="Vashi Toll Plaza">Vashi Toll Plaza</option>
		        	<option value="Airoli Toll Plaza">Airoli Toll Plaza</option>
		        	<option value="Dahisar Toll Plaza">Dahisar Toll Plaza</option>
		        	<option value="Mulund Eastern Express Highway Toll Plaza">Mulund Eastern Express Highway Toll Plaza</option>
		        	<option value="Mulund LBS Marg Toll Plaza">Mulund LBS Marg Toll Plaza</option>
		        </select>
		    </div>
		    <br><br>
		    <div class="input-group">
		            <button type="submit" class="loginbtn" name="next">Next</button>
		    </div>
		</div>
	</form>

	<br><br>
	<h3><a style="float:right" href="logout.php"> Logout</a></h3>


</body>

</html>
