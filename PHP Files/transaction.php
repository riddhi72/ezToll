<?php 
	session_start();
	$conn = new mysqli('localhost', 'root', '', 'ezToll');

	$licno = $_SESSION['licno'];
	$vehToday = $_SESSION['vehToday'];
	$tollToday = $_SESSION['tollToday'];
	
	$vehType_query = "SELECT Vtype FROM Vehicle WHERE plateno = '$vehToday' ";
	$vehType_row = mysqli_fetch_array(mysqli_query($conn, $vehType_query)); 
	$transtype = $vehType_row['Vtype']; 
	
	$receipt_details_query = "SELECT * FROM Payment WHERE toll = '$tollToday' AND transtype = '$transtype' ";	
	$payment_row = mysqli_fetch_array(mysqli_query($conn, $receipt_details_query)); 

?>





<!DOCTYPE html>
<html>
<head>
    <title>Transaction</title>
</head>
<body>
	<?php
		if (isset($_SESSION['message'])) {
			echo "<div>", $_SESSION['message'], "</div>";
			unset($_SESSION['message']);	
		}
	?>

    <h2>Driver-Transaction</h2>
    <h3>Transaction Successful</h3>
    
    <?php
	    echo $_SESSION['licno']. "<br>"; 
		echo $_SESSION['driver_name']. "<br>";
		echo $_SESSION['vehToday']. "<br>";
		echo $_SESSION['tollToday']. "<br>";
		echo $payment_row['amt']. "<br>";
    ?> 

    <br><br> 

    <!--Use this for logout in nav-->
	<br><br><br><br>
    <div><a href="logout.php">Logout</a></div>

</body>

</html>
