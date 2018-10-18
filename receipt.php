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

	if (isset($_POST['confirm'])){
		$pwd = mysqli_real_escape_string($conn,$_POST['password']);
        
        $get_driverList_query = " SELECT User.u_id, Driver.licno, User.password, User.uname
                                  FROM User
                                  INNER JOIN Driver 
                                  ON User.u_id=Driver.fk_uid
                                  WHERE Driver.licno = '$licno'
                                ";
		$driver_row = mysqli_fetch_array(mysqli_query($conn, $get_driverList_query)); 
        if ($driver_row['password'] == $pwd) {
        	$_SESSION['pay'] = $payment_row['amt'];
        	header("location: transaction.php");   
        }
        else {
            $_SESSION['message'] = "Incorrect Password.";
        }
    }

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

    <h2>Driver-Receipt</h2>
    
    <?php
	    echo $_SESSION['licno']. "<br>"; 
		echo $_SESSION['driver_name']. "<br>";
		echo $_SESSION['vehToday']. "<br>";
		echo $_SESSION['tollToday']. "<br>";
		echo $payment_row['amt']. "<br>";
    ?> 

    <br><br> 

    <form id="form" method="post" action="receipt.php">  
	    <div class="input-group">
	        <label>Password</label>
	        <input type="password" name="password">
	    </div>
	    <br><br>
	    <div class="input-group">
		    <button type="submit" class="btn" name="confirm">Confirm</button>
		</div>
	</form>

	<!--Use this for logout in nav-->
	<br><br><br><br>
    <div><a href="logout.php">Logout</a></div>

</body>

</html>
