
<?php
	session_start();
	if (!isset($_SESSION['email'])) {
		header('location: ../index.php');
	}
?>

<?php include('conn.php'); ?>

<?php 
	$id = $_POST['purchase_id'];

	$sql3 = "SELECT * FROM available_orders where purchaseid='$id'";
	$result3 = mysqli_query($conn, $sql3);
	$row3 = mysqli_fetch_assoc($result3);

	if (mysqli_num_rows($result3) > 0) {

		$sql = "SELECT * FROM current_logged_deliverer";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$email = $row['email'];
		$mobile = $row['mobile'];

		$sql2 = "INSERT INTO delivery_details(purchaseid, first_name, last_name, mobile, email) VALUES ('$id', '$first_name', '$last_name', '$mobile', '$email')";
		mysqli_query($conn, $sql2);


		$customer_name = $row3['customer_name'];
		$date_of_purchase = $row3['date_purchase'];
		$total = $row3['total'];
		$customer_email = $row3['customer'];

		$sql4 = "INSERT INTO delivery_hist(purchaseid, date_purchase, customer_name, total, customer, delivery_email) VALUES('$id','$date_of_purchase', '$customer_name', '$total', '$customer_email', '$email' )";
		mysqli_query($conn, $sql4);

		$sql5 = "DELETE FROM available_orders WHERE purchaseid='$id'";
		mysqli_query($conn, $sql5);
		header('location: salesdel.php');

	}else{
		?>
		<script>
			window.alert('Please select a valid ID');
			window.location.href='salesdel.php';
		</script>
		<?php
	}
?>

