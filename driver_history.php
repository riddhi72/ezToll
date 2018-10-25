<?php 
	session_start();
	$conn = new mysqli('localhost', 'root', '', 'ezToll');

    $licno = $_SESSION['licno'];
    $get_driverHistory_query = "SELECT Transaction.tid,
                                        Transaction.tdatetime,
                                        Payment.toll,
                                        Transaction.plateno,
                                        Payment.transtype,
                                        Payment.amt
                                FROM Transaction
                                INNER JOIN Payment ON Transaction.payid = Payment.pid
                                WHERE
                                    Transaction.approve = '1'
                                    AND
                                    Transaction.plateno = ANY(
                                        SELECT 
                                            plateno 
                                        FROM 
                                            Vehicle 
                                        WHERE 
                                            did = '$licno'
                                    )
                                ";
	$history_result = mysqli_query($conn, $get_driverHistory_query);  
	
?>





<!DOCTYPE html>
<html>
<head>
    <title>History</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="style/table_data.css">
</head>
<body>
	<?php
		if (isset($_SESSION['message'])) {
			echo "<div>", $_SESSION['message'], "</div>";
			unset($_SESSION['message']);	
		}
	?>

    <h1>Driver - History</h1>
    <div>
        <table class="columns" style="text-align: center">
			<tr class="name">
	    		<td class="header">Transaction Id</td>
                <td class="header">Transaction Time</td>                
                <td class="header">Toll Booth</td>
	    		<td class="header">Vehicle Plate Number</td>
	        	<td class="header">Vehicle Type</td> 
	        	<td class="header">Amount (Rs)</td>
            </tr>
			<?php 
				while ($history_row = mysqli_fetch_array($history_result))
				{
			?>
	        <tr class="name">
	    		<td class="grey"><?php echo $history_row['tid']; ?></td>
                <td class="grey"><?php echo $history_row['tdatetime']; ?></td>                
                <td class="grey"><?php echo $history_row['toll']; ?></td>
	    		<td class="grey"><?php echo $history_row['plateno']; ?></td>
	        	<td class="grey"><?php echo $history_row['transtype']; ?></td> 
	        	<td class="grey"><?php echo $history_row['amt']; ?></td>
	        </tr>
		    <?php    
		        }
		    ?>
		</table>
    </div>
    <br><br>
    <h3><a style="float:right" href="logout.php"> Logout</a></h3>
</body>

</html>
