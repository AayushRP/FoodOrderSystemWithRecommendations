<?php
	session_start();
	if (!isset($_SESSION['email'])) {
		header('location: ../index.php');
	}
?>
<?php
	include('conn.php');
	if(isset($_POST['productid'])){
 		
 		$sql = "select * from current_logged_user";
 		$result = $conn->query($sql);
 		$row = $result->fetch_assoc();

		$customeremail=$row['email'];

		$sql="insert into new_orders (customer, date_purchase) values ('$customeremail', NOW())";
		$conn->query($sql);

		$sql="insert into purchase (customer, date_purchase) values ('$customeremail', NOW())";
		$conn->query($sql);
		$pid=$conn->insert_id;
 
		$total=0;
 
		foreach($_POST['productid'] as $product):
		$proinfo=explode("||",$product);
		$productid=$proinfo[0];
		$iterate=$proinfo[1];
		$sql="select * from product where productid='$productid'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();
		$productname=$row['productname'];
		$chia=$row['CHI'];
		$bufa=$row['BUF'];
 		$vegga=$row['VEGG'];
		if (isset($_POST['quantity_'.$iterate])){
			$subt=$row['price']*$_POST['quantity_'.$iterate];
			$total+=$subt;

			$sql="insert into current_order (productname, CHI, BUF, VEGG) values ('$productname', '$chia', '$bufa', '$vegga')";
			$conn->query($sql);

			$sql="insert into purchase_detail (purchaseid, productid, quantity) values ('$pid', '$productid', '".$_POST['quantity_'.$iterate]."')";
			$conn->query($sql);
		}
		endforeach;
 		$sql="update new_orders set total='$total' where purchaseid='$pid'";
 		$conn->query($sql);

 		$sql="update purchase set total='$total' where purchaseid='$pid'";
 		$conn->query($sql);
		include('changeattributes.php');
		header('location:myhistorycust.php');

	}
	else{
		?>
		<script>
			window.alert('Please select a product');
			window.location.href='custorder.php';
		</script>
		<?php
	}
?>