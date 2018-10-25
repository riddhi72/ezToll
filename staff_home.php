<?php 
	session_start();
	$conn = new mysqli('localhost', 'root', '', 'ezToll');

	$staff_name = $_SESSION['staff_name'];
	$badge_no = $_SESSION['badge_no'];

	$getToll_query = "SELECT toll FROM Staff WHERE badge_no = '$badge_no' ";
	$result = mysqli_fetch_array(mysqli_query($conn, $getToll_query)); 
	$staff_toll = $result['toll'];

	// Query used to all views in Database
			/*
				SELECT Transaction.tid,
				    Transaction.plateno,
				    Payment.transtype,
				    Payment.amt,
				    Transaction.tdatetime,
				    Transaction.approve
				FROM Transaction
				INNER JOIN Payment ON Transaction.payid = Payment.pid
				WHERE
				    Payment.pid = ANY(
					    SELECT
					        pid
					    FROM
					        Payment
					    WHERE
					        toll = 'Vashi Toll Plaza'
					)
			*/
	$search_query_result = mysqli_query($conn, "SELECT * FROM abc");
	$queryflag=0;
	switch ($staff_toll) {
		case 'Airoli Toll Plaza':
	 		$get_tollData_query = "SELECT * FROM Airoli_Approval_View ORDER BY tid DESC";
	 		if(isset($_POST['filter'])){
	 		    $search_input = $_POST['search'];
	 		    $search_query = "SELECT * FROM Airoli_Approval_View WHERE transtype LIKE '$search_input%' ORDER BY tid DESC";
        		$search_query_result = mysqli_query($conn, $search_query);
        		$queryflag = 1;
    		}
	 		break;
	 	case 'Dahisar Toll Plaza':
	 		$get_tollData_query = "SELECT * FROM Dahisar_Approval_View ORDER BY tid DESC";
	 		if(isset($_POST['filter'])){
	 		    $search_input = $_POST['search'];
        		$search_query = "SELECT * FROM Dahisar_Approval_View WHERE transtype LIKE '$search_input%' ORDER BY tid DESC";
        		$search_query_result = mysqli_query($conn, $search_query);
        		$queryflag = 1;
    		}
	 		break;
	 	case 'Mulund Eastern Express Highway Toll Plaza':
	 		$get_tollData_query = "SELECT * FROM MulundEEH_Approval_View ORDER BY tid DESC";
	 		if(isset($_POST['filter'])){
	 		    $search_input = $_POST['search'];
        		$search_query = "SELECT * FROM MulundEEH_Approval_View WHERE transtype LIKE '$search_input%' ORDER BY tid DESC";
        		$search_query_result = mysqli_query($conn, $search_query);
        		$queryflag = 1;
    		}
	 		break;
	 	case 'Mulund LBS Marg Toll Plaza':
	 		$get_tollData_query = "SELECT * FROM MulundLBS_Approval_View ORDER BY tid DESC";
	 		if(isset($_POST['filter'])){
	 		    $search_input = $_POST['search'];
        		$search_query = "SELECT * FROM MulundLBS_Approval_View WHERE transtype LIKE '$search_input%' ORDER BY tid DESC";
        		$search_query_result = mysqli_query($conn, $search_query);
        		$queryflag = 1;
    		}
	 		break;			
	 	case 'Vashi Toll Plaza':
	 		$get_tollData_query = "SELECT * FROM Vashi_Approval_View ORDER BY tid DESC";
	 		if(isset($_POST['filter'])){
	 		    $search_input = $_POST['search'];
        		$search_query = "SELECT * FROM Vashi_Approval_View WHERE transtype LIKE '$search_input%' ORDER BY tid DESC";
        		$search_query_result = mysqli_query($conn, $search_query);
        		$queryflag = 1;
    		}
	 		break;	 	
	} 

	$tollData_result = mysqli_query($conn, $get_tollData_query);

	if(isset($_POST['approve'])){
		if(!empty($_POST['check_list'])){
			foreach ($_POST['check_list'] as $selected) {
				$setApprove_query = "UPDATE Transaction SET approve=1 WHERE tid = $selected ";
				$result = mysqli_query($conn, $setApprove_query);
			}
		}
	}
   

?>





<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
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

    <h1>Staff-Home</h1>
    <div>
        <h3>Welcome, <?php echo $staff_name; ?> </h3>
        <form method="post" action="staff_home.php">
            <input type="text" name="search" placeholder="Search...." style: align="right">
            <input type="submit" class="button" name="filter" value="Filter">
        </form>

        <form method="post" action="staff_home.php">
        <input type="submit" name="approve" style="float: right;" class="button" value="Approve" />	
        <table class="columns" style="text-align: center">
			<tr class="name">
	    		<td class="header">Transaction Id</td>
	    		<td class="header">Vehicle Plate Number</td>
	        	<td class="header">Vehicle Type</td> 
	        	<td class="header">Amount (Rs)</td>
	        	<td class="header">Transaction Time</td>
	        	<td class="header">Approve</td>
	        </tr>
			<?php 
				 if($queryflag=1 && mysqli_num_rows($search_query_result)!=0){
				 	$querySelect=$search_query_result;
				 	$queryflag = 0;
				 	 //$tollData_row = mysqli_fetch_array($tollData_result)  ;
				 }				 	
				 else
				 	$querySelect=$tollData_result;
				//||
				while ($tollData_row = mysqli_fetch_array($querySelect)  )
				{

			?>
	        <tr class="name" >
	    		<td class="grey"><?php echo $tollData_row['tid']; $testID = $tollData_row['tid']; ?></td>
	    		<td class="grey"><?php echo $tollData_row['plateno']; ?></td>
	        	<td class="grey"><?php echo $tollData_row['transtype']; ?></td> 
	        	<td class="grey"><?php echo $tollData_row['amt']; ?></td>
	        	<td class="grey"><?php echo $tollData_row['tdatetime']; ?></td>
	        	<td class="grey">
	        		<?php 
	        			switch ($tollData_row['approve']) {
	        				case '0':
	        					?>
	        					<input type='checkbox' name ='check_list[]' value='<?php echo $tollData_row['tid']; ?>'><label>Approve</label>
	        					<?php
	        					break;
	        				case '1':
	        					echo "Approved.";
	        					break;
	        			}
	        		?>
	        	</td>
	        </tr>
		    <?php    
		        }
		    ?>
		</table>
		</form>
    </div>
    <br><br>
    <h3><a style="float:right" href="logout.php"> Logout</a></h3>
</body>

<script type="text/javascript">




</script>

</html>

