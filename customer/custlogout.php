<?php include('conn.php'); ?>
<?php
	session_start();
	$sql1 = "DELETE FROM recom_details";
	mysqli_query($conn, $sql1);
	$sql2 = "DELETE FROM current_logged_user";
	mysqli_query($conn, $sql2);
	session_destroy();
	header('location: ../index.php');
?>