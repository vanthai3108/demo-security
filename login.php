<!DOCTYPE html>
<html>
<head>
	<title>Web | Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles/login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
</head>
<body>

	<div class="container-fluid" id="login">
		<div class="container">
			<div class="row d-flex justify-content-center" id="login-main">
				<div class="col-lg-5 col-md-9 col-12"><img src="images/login.png" id="login-image"></div>
				<div class="col-lg-1 col-0">
					
				</div>
				<form method="post" class="col-xl-4 col-lg-5 col-md-7 col-sm-9 col-12" id="login-form">
					<div class="row d-flex justify-content-center">
						<div class="col-auto">
							<h3>Login</h3>
						</div>
					</div>
					<div class="row d-flex justify-content-between">
						<div class="col-12">Username</div>
						<input class="col-12" type="text" required="" placeholder="Enter your username" name="Username">						
					</div>
					<div class="row d-flex justify-content-between">
						<div class="col-12">Password</div>
						<input class="col-12" type="password" required="" placeholder="Enter your password" name="Password">
					</div>
					<div class="row d-flex justify-content-center">
						<a class="col-auto" href="admin/product/add_product.html">Forgot Password ?</a>						
					</div>
					<div class="row d-flex justify-content-center">
						<input type="submit" name="login" value="Login" class="col-auto" id="button-login">	
					</div>						
					<div class="row d-flex justify-content-center or">
						<span class="col-auto">Or login with</span>					
					</div>
					<div class="row d-flex justify-content-center">
						<div class="col-6">
							<button class="btn-icon" id="icon1">
								<i class="fab fa-facebook-f fa-lg"></i>
							</button>
						</div>
						<div class="col-6">
							<button class="btn-icon" id="icon2">
								<i class="fab fa-google fa-lg"></i>
							</button>
						</div>									
					</div>
					<div class="row d-flex justify-content-center">
						<p class="col-12">Don't have an account? <a href="signup.php">Sign up here!</a></p>
					</div>
					<div class="row d-flex justify-content-center">
						<p class="col-12">Or <a href="index.php">Back home</a></p>
					</div>
				</form>
				<?php 
					session_start();				 
					include("connect.php");

					if(isset($_POST['login'])){
						$username = $_POST['Username'];
						$password = $_POST['Password'];
						$sql="select * from users where Username='$username' AND Password='$password'";
						$result = mysqli_query($connect, $sql);
						$check_login = mysqli_num_rows($result);
						$checkadmin=mysqli_fetch_array($result);
						$sql2="select * from users where Username='$username' AND Password='$password' AND permission='admin'";
						$result2 = mysqli_query($connect, $sql2);
						$check_permission = mysqli_num_rows($result2);	
						if ($check_login == 0){
							echo "<script>alert('Password or Username is incorrect, please try again !')</script>";
							exit();
						}
						if ($check_login > 0 && $check_permission > 0) {
								echo "<script>window.open('admin/index.php','_self')</script>";	
						}
						if ($check_login > 0 && $check_permission == 0) {
							    $_SESSION['Username'] = $username;
								echo "<script>alert('You have logged in successfull !')</script>";
								echo "<script>window.open('index.php','_self')</script>";
								die();
						} 	
					}

				?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="bootstrap/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>