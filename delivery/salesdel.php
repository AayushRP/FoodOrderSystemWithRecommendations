<?php
	session_start();
	if (!isset($_SESSION['email'])) {
		header('location: ../index.php');
	}
?>
<?php include('header.php'); ?>
<body>
<?php include('navbardel.php'); ?>
<div class="container">
	<h1 class="page-header text-center">Available Orders</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Id</th>
			<th>Date</th>
			<th>Customer</th>
			<th>Total Price</th>
			<th>Details</th>
		</thead>
		<tbody>
			<?php 
				$sql="select * from available_orders order by date_purchase desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo $row['purchaseid'] ?></td>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
						<td><?php echo $row['customer']; ?></td>
						<td class="text-right">&#8369; <?php echo number_format($row['total'], 2); ?></td>
							<td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
								<?php include('sales_modaldel.php'); ?>
							</td>
					</tr>
					<?php
				}
			?>

		</tbody>
	</table>
	<div class="row" style="float: right;">
		<form method="post" action="delivery.php">
			<div class="col-md-6">
				<input type="number" name="purchase_id" class="form-control" style="margin-right: -35px;" placeholder="Choose Sales ID" required>
			</div>
			<div class="col-md-6">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span>  Take Delivery </button>
			</div>
		</form>
	</div>
</div>
</body>
</html>