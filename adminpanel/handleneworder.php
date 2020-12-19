<?php
	session_start();
	if (!isset($_SESSION['email'])) {
		header('location: ../index.php');
	}
?>
<?php
	include('conn.php');

	$pid=$_POST['purchase_id'];

	$sql = "select * from new_orders where purchaseid ='$pid'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		$row = mysqli_fetch_assoc($result);
		$id = $row['purchaseid'];
		$email = $row['customer'];
		$total = $row['total'];
		$date = $row['date_purchase'];

		$sql = " insert into available_orders(purchaseid, customer, total, date_purchase) values ( '$id', '$email', '$total', '$date' ) ";
		$conn->query($sql);

		$sql = " insert into sales(purchaseid, customer, total, date_purchase) values ( '$id', '$email', '$total', '$date' ) ";
		$conn->query($sql);

		$sql="delete from new_orders where purchaseid='$pid'";
		$conn->query($sql);

		header('location:neworders.php');		
   		
	}else{
		?>
		<script>
			window.alert('Please select a valid ID');
			window.location.href='neworders.php';
		</script>
		<?php
	}
?>







