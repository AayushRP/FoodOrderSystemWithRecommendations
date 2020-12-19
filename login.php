<?php
	session_start();
	//connect to database
	include ('conn.php');
	if(isset($_POST['login_btn'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password = md5($password);
		$sql = "SELECT * FROM usertable WHERE email='$email' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		$fname = $row['first_name'];
		$lname = $row['last_name'];
		$mail = $row['email'];
		$mob = $row['mobile'];
		$pass = $row['password'];
		$ch = $row['CHI'];
		$bu = $row['BUF'];
		$ve = $row['VEGG'];
		$addr = $row['address'];
		$hono = $row['house_number'];
		$user = $row['usertype'];


		if($password!=$pass){
					?><script>
			window.alert('Email or Password does not match');
			window.location.href='login.php';
		</script><?php
		}

		if (mysqli_num_rows($result) == 1){
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['email'] = $email;
			if ($row['usertype'] == 'customer') {

				$sql123 = "delete from current_logged_user";
				mysqli_query($conn, $sql123);
				
				$query = "INSERT INTO current_logged_user(first_name, last_name, email, mobile, password, CHI, BUF, VEGG, address, house_number, usertype)  VALUES ('$fname', '$lname', '$mail', '$mob', '$pass', '$ch', '$bu', '$ve', '$addr', '$hono', '$user')";
				mysqli_query($conn, $query);?>


				<?php
					include('filtering.php');
				?>
				<?php			
				header('location: customer/custhome.php');

			}elseif ($row['usertype'] == 'deliverer') {

				$query = "INSERT INTO current_logged_deliverer(first_name, last_name, email, mobile, password, address, house_number, usertype)  VALUES ('$fname', '$lname', '$mail', '$mob', '$pass', '$addr', '$hono', '$user')";
				mysqli_query($conn, $query);
				header('location: delivery/delhome.php');

			}elseif ($row['usertype'] == 'admin') {
				
				$query = "INSERT INTO current_logged_admin(first_name, last_name, email, mobile, password, address, house_number, usertype)  VALUES ('$fname', '$lname', '$mail', '$mob', '$pass', '$addr', '$hono', '$user')";
				mysqli_query($conn, $query);
				header('location: adminpanel/indexadmin.php');

			}
		}else{
			$_SESSION['message'] = "Email and Password do not match";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset=md-1">
				<div class="row">
					<div class="col-md-5 register-lefts">
						<img src="icon.png">
						<h3><a class="link-to-homes" href="index.php">Welcome To Bhok Lagyo</a></h3>
						<p>Making online food delivery more efficient</p>
					</div>
					<div class="col-md-7 register-right">
						<form method="POST" action="login.php">
							<h2>Login Here</h2>
							<div class="register-form">
								<div class="form-group">
									E-mail: <input type="email" class="form-control" name="email" placeholder="Enter Your E-mail Here" required>
								</div>
								<div class="form-group">
									Password: <input type="password" class="form-control" name="password" placeholder="Enter Your Password Here" required>
								</div>
								<button type="submit" name="login_btn" value="Login" class="btn btn-primary">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="foot" style="text-align: center;">NAME OF RESTAURENT</footer>
	<footer class="foot" style="text-align: center;">ADDRESS</footer>
	<footer class="foot" style="text-align: center;">PHONE NUMBER</footer>
</body>
</html>
