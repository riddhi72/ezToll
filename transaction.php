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

	$now_query = "SELECT current_timestamp()";
	$now = mysqli_fetch_array(mysqli_query($conn, $now_query));
	$time = $now[0];

	$payment_id = $payment_row['pid'];
	$make_transaction_query = "INSERT INTO Transaction(payid, tdatetime, plateno) VALUES ('$payment_id', '$time', '$vehToday')"; 
	$transaction_row = mysqli_query($conn, $make_transaction_query); 
	$get_transaction_query = "SELECT * FROM Transaction WHERE tdatetime = '$time'";
	$get_transaction_row = mysqli_fetch_array(mysqli_query($conn, $get_transaction_query));

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

    <div style="margin-top: 50px;width:80%;height:auto;background-color:white;padding-top:10px;padding-bottom:10px;margin-left:auto;margin-right: auto;border:1px dotted black;border-radius:2%;">
		<h4 style="margin: 15px;font-family:Quicksand;">DateTime : <?php echo $get_transaction_row['tdatetime'];?> 
		<span style="float:right">Transaction ID: <?php echo $get_transaction_row['tid']?></span></h4>
		<hr style="margin-left:1rem;margin-right:1rem;">
		<p style="font-size:20px;margin: 15px;font-family:Quicksand;">
			Licence Number<span style="float:right"><?php echo $licno;?></span>
			<br>
			Driver Name<span style="float:right"><?php echo $_SESSION['driver_name'];?></span>
			<br>
			Vehicle Type<span style="float:right"><?php echo $transtype;?></span>
			<br>
			Toll<span style="float:right"><?php echo $_SESSION['tollToday'];?></span>
			<br>
			<br>
			<br>
		</p>
		<hr style="margin-left:1rem;margin-right:1rem;">
		<p style="font-size:25px;margin:15px 15px 0px 15px;font-family:Quicksand;">Amount :<span style="float:right">Rs. <?php echo $payment_row['amt']; ?> </span>
	<br>
	</div>
</div>


    <br><br> 

    <!--Use this for logout in nav-->
	<br><br><br><br>
	<h3><a style="float:left" href="home.php"> Back to Home</a></h3>
	<h3><a style="float:right" href="logout.php"> Logout</a></h3>


</body>

</html>
