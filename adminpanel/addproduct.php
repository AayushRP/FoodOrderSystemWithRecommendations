<?php
	include('conn.php');

	$pname=$_POST['pname'];
	$price=$_POST['price'];
	$category=$_POST['category'];
	$chi=$_POST['chi'];
	$buf=$_POST['buf'];
	$vegg=$_POST['vegg'];

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}
	
	$sql="insert into product (productname, categoryid, price, photo, CHI, BUF, VEGG) values ('$pname', '$category', '$price', '$location', '$chi', '$buf', '$vegg')";
	$conn->query($sql);

	header('location:productadmin.php');

?>