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
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body style="background: #ecfafd;">
	<?php
		if (isset($_SESSION['message'])) {
			echo "<div>", $_SESSION['message'], "</div>";
			unset($_SESSION['message']);	
		}
	?>

    <h2>Driver-Receipt</h2>

	<div style="margin-top: 50px;width:80%;height:auto;background-color:white;padding-top:10px;padding-bottom:10px;margin-left:auto;margin-right: auto;border:1px dotted black;border-radius:2%;">
		<h4 style="margin: 15px;font-family:Quicksand;">Toll : <?php echo $_SESSION['tollToday'];?> 
		<hr style="margin-left:1rem;margin-right:1rem;">
		<p style="font-size:20px;margin: 15px;font-family:Quicksand;">
			Licence Number<span style="float:right"><?php echo $licno;?></span>
			<br>
			Driver Name<span style="float:right"><?php echo $_SESSION['driver_name'];?></span>
			<br>
			Vehicle Type<span style="float:right"><?php echo $transtype;?></span>
			<br>
			<br>
		</p>
		<hr style="margin-left:1rem;margin-right:1rem;">
		<p style="font-size:25px;margin:15px 15px 0px 15px;font-family:Quicksand;">Amount :<span style="float:right">Rs. <?php echo $payment_row['amt']; ?> </span>
	<br>
	</div>
</div>
 <form id="form" method="post" style="text-align:center" class="w3-container" action="receipt.php">  
<div id="id01" class="w3-modal">
	 <div class="w3-modal-content w3-animate-top w3-card-4">
		 <header class="w3-container w3-teal">
			 <span onclick="document.getElementById('id01').style.display='block'"
			 class="w3-button w3-display-topright">&times;</span>
			 <h2 style="text-align:center">Enter your password</h2>
		 </header>
		 <div class="w3-container" style="text-align:center;padding:10px;">
			<input type="password" name="password">
			<button type="submit" class="btn w3-button w3-teal" name="confirm">Confirm</button>
		 </div>
	 </div>
 </div>
</form>

    <br><br> 

    <form id="form" method="post" style="text-align:center" class="w3-container" action="receipt.php">  
	    <div class="input-group">
	        <label>Password</label>
	        <input type="password" name="password">
	    </div>
	    <br><br>
	    <div class="input-group">
		    <button type="submit" class="btn w3-button w3-teal" name="confirm">Confirm</button>
		</div>
	</form>
	<h3><a style="float:right" href="logout.php"> Logout</a></h3>

</body>

</html>
