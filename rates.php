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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="style/table_data.css">
</head>
<body>
	<h1>Rates</h1>
	<?php
		if (isset($_SESSION['message'])) {
			echo "<div>", $_SESSION['message'], "</div>";
			unset($_SESSION['message']);	
		}

	?>
	<table class="columns" style="text-align: center">
		<tr class="name">
    		<td class="header">Sr No.</td>
    		<td class="header">Toll Location</td>
        	<td class="header">Transport</td> 
        	<td class="header">Amount (Rs)</td>
        </tr>
	<?php 
		while ($row = mysqli_fetch_array($result))
		{
	?>
        <tr class="name">
    		<td class="grey"><?php echo $row['pid']; ?></td>
    		<td class="grey"><?php echo $row['toll']; ?></td>
        	<td class="grey"><?php echo $row['transtype']; ?></td> 
        	<td class="grey"><?php echo $row['amt']; ?></td>
        </tr>
    <?php    
        }
    ?>
	</table>

</body>

</html>