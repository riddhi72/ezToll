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
    
    <form id="form" method="post" action="home.php">
    	<div class="input-group">
    		<label>What are you driving today ?</label>
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
	        <label>Which toll will you arrive at ?</label>
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
	            <button type="submit" class="btn" name="next">Next</button>
	    </div>
	</form>


	<!--Use this for logout in nav-->
	<br><br><br><br>
    <div><a href="logout.php">Logout</a></div>

</body>

</html>
