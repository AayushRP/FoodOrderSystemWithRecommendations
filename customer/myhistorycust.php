<?php
	session_start();
	if (!isset($_SESSION['email'])) {
		header('location: ../index.php');
	}
?>
<?php include('header.php'); ?>
<body>
<?php include('navbarcust.php'); ?>
<div class="container">
	<h1 class="page-header text-center">My History</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Id</th>
			<th>Date</th>
			<th>Total Price</th>
			<th>Details</th>
			<th>Status</th>
		</thead>
		<tbody>
			<?php
			 	$sql = "select * from current_logged_user";
 				$result = $conn->query($sql);
 				$row = $result->fetch_assoc();

				$customer=$row['email'];

				$sql="select * from purchase where customer='$customer' order by date_purchase desc limit 10";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo $row['purchaseid'] ?></td>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
						<td class="text-right">&#8369; <?php echo number_format($row['total'], 2); ?></td>
						<td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
							<?php include('sales_modal.php'); ?>
						</td>
						<td><?php if($row['status']==0){
									echo"Pending";
								  }else{
								  	echo"Delivered";
								  }
							?></td>
					</tr>
					<?php
				}
			?>
		</tbody>

	</table>
	<div class="row" style="margin-left: 800px;">
		<form method="post" action="status.php">
			<div class="col-md-6">
				<input type="number" name="purchase_id" class="form-control" style="margin-right: 20px;" placeholder="Choose Order ID" required>
			</div>
			<div class="col-md-6">
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>  RECEIVED </button>
			</div>
		</form>
	</div>

</div>
</body>
</html>