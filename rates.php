<?php 
	session_start();
	$conn = new mysqli('localhost', 'root', '', 'ezToll');
	$display_table_query = "SELECT * FROM Payment";
	$result = mysqli_query($conn, $display_table_query);
	
?>





<!DOCTYPE html>
<html>
<head>
    <title>Rates</title>
</head>
<body>
	<h2>Rates</h2>
	<?php
		if (isset($_SESSION['message'])) {
			echo "<div>", $_SESSION['message'], "</div>";
			unset($_SESSION['message']);	
		}

	?>
	<table>
		<tr>
    			<td>Sr No.</td>
    			<td>Toll Location</td>
        		<td>Transport</td> 
        		<td>Amount (Rs)</td>
        </tr>
	<?php 
		while ($row = mysqli_fetch_array($result))
		{
	?>
        <tr>
    		<td><?php echo $row['pid']; ?></td>
    		<td><?php echo $row['toll']; ?></td>
        	<td><?php echo $row['transtype']; ?></td> 
        	<td><?php echo $row['amt']; ?></td>
        </tr>
    <?php    
        }
    ?>
	</table>

</body>

</html>