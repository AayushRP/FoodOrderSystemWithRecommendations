<?php
	session_start();
	//connect to database
	include ('conn.php');
	if(isset($_POST['register_btn'])){
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$mobile = $_POST['mobile'];
		$address = $_POST['address'];
		$house_no = $_POST['house_no'];
		$usertype = $_POST['usertype'];
		$chi = $_POST['chi'];
		if($chi > 10){
			$chi=10;
		}
		$buf = $_POST['buf'];
		if($buf > 10){
			$buf=10;
		}
		$vegg = $_POST['vegg'];
		if($vegg > 10){
			$vegg=10;
		}
		if($password == $password2){
			//create user
			$password = md5($password);//encrypt password
			$sql = "INSERT INTO usertable(first_name, last_name, email, mobile, password, CHI, BUF, VEGG, address, house_number, usertype) VALUES('$first_name', '$last_name', '$email', '$mobile', '$password', '$chi', '$buf', '$vegg', '$address', '$house_no', '$usertype')";
			mysqli_query($conn, $sql);
			header('location: index.php');
		}else{
					?>
		<script>
			window.alert('Passwords do not match');
			window.location.href='register.php';
		</script>
		<?php
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
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
					<div class="col-md-5 register-left">
						<img src="icon.png">
						<h3><a class="link-to-home" href="index.php">Welcome To Bhok Lagyo</a></h3>
						<p>Making online food delivery more efficient</p>
					</div>
					<div class="col-md-7 register-right">
						<form method="POST" action="register.php">
							<h2>Register Here</h2>
							<div class="register-form">
								<div class="form-group">
									First Name: <input type="text" class="form-control" name="first_name" placeholder="Enter Your First Name Here" required>
								</div>
								<div class="form-group">
									Last Name: <input type="text" class="form-control" name="last_name" placeholder="Enter Your Last Name Here" required>
								</div>
								<div class="form-group">
									E-mail: <input type="email" class="form-control" name="email" placeholder="Enter Your E-mail Here" required>
								</div>
								<div class="form-group">
									Password: <input type="password" class="form-control" name="password" placeholder="Enter Your Password Here" required>
								</div>
								<div class="form-group">
									Confirm Password: <input type="password" class="form-control" name="password2" placeholder="Re-enter Password Here" required>
								</div>
								<div class="form-group">
									Mobile Number: <input type="number" class="form-control" name="mobile" placeholder="Enter Your Mobile Number Here" required>
								</div>
								<div class="form-group">
									Address: <input type="text" class="form-control" name="address" placeholder="Enter Your Address Here" required>
								</div>
								<div class="form-group">
									House Number: <input type="number" class="form-control" name="house_no" placeholder="Enter Your House Number Here" required>
								</div>
								User Type: <select name="usertype" style="margin-left: 10px;">
    								<option value="customer">Customer</option>
    								<option value="deliverer">Deliverer</option>
  								</select>
								<div class="form-group" style="margin-top:10px;">
                            		<div class="row">
                                		<div class="col-md-12" style="margin-top:7px;">
                                    		<label class="control-label">Only For Customers. For Creating User Profile Give Your Liking On Food Categories. These Data Will Be Used To Recommend Food Items. Give Data Wisely. (Max Limit is 10):</label><br>
                                    		<div class="row">
                                    			<div class="col-md-4" style="margin-top:8px;">
                                        			<label class="control-label">CHICKEN</label><input type="text" class="form-control" name="chi">
                                    			</div>
                                    			<div class="col-md-4" style="margin-top:8px;">
                                        			<label class="control-label">BUFF</label><input type="text" class="form-control" name="buf">
                                    			</div>
                                    			<div class="col-md-4" style="margin-top:8px;">
                                        			<label class="control-label">VEG</label><input type="text" class="form-control" name="vegg">
                                    			</div>
                                    		</div>
                                		</div>
                            		</div>  
                        		</div> 
								<button type="submit" name="register_btn" value="Register" class="btn btn-primary">Register</button>
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
