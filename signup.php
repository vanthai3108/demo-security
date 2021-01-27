<!DOCTYPE html>
<html>
<head>
	<title>Web | Sign Up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles/signup.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid" id="signup">
		<div class="container">
			<div class="row d-flex justify-content-center" id="signup-main">
				<form method="post" class="col-xl-5 col-lg-6 col-md-8 col-sm-11 col-12" id="signup-form" enctype="multipart/form-data">
					<div class="row d-flex justify-content-center">
						<div class="col-auto">
							<h3>Sign Up</h3>
						</div>
					</div>
					<div class="row d-flex justify-content-between">
						<div class="col-5">Username</div>
						<input class="col-7" type="text" required="" placeholder="Enter your username" name="Username">
					</div>
					<div class="row d-flex justify-content-between">
						<div class="col-5">Password</div>
						<input class="col-7" type="password" required="" placeholder="Enter your password" name="Password">
					</div>
					<div class="row d-flex justify-content-between">
						<div class="col-5">Confirm password</div>
						<input class="col-7" type="password" required="" placeholder="Confirm your password" name="Confirm">
					</div>
					<div class="row d-flex justify-content-between">
						<div class="col-5">Email address</div>
						<input class="col-7" type="email" placeholder="Enter your email" name="Email">
					</div>
					<div class="row d-flex justify-content-between" >
						<div class="col-5">Phone number</div>
						<input class="col-7" type="phone" placeholder="Enter your phone" name="Phone">
					</div>
					<div class="row d-flex justify-content-center" id="checkbox">
						<div class=" col-5">Avatar image</div>
						<input class="col-7" type="file" name="Image" id="avatar">
					</div>
					<div class="row d-flex justify-content-center">
						<input type="submit" name="signup" value="Sign Up" class="col-auto" id="button-signup">
					</div>						
					<div class="row d-flex justify-content-center or">
						<span>Or sign up with</span>					
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
						<p>Did have an account? <a href="login.php">Login here!</a></p>
					</div>
					<div class="row d-flex justify-content-center">
						<p class="col-12">Or <a href="index.php">Back home</a></p>
					</div>
				</form>
				<?php  
					include("connect.php");
					if(isset($_POST['signup'])){
						$file = $_FILES['Image']['name'];
						$file_tmp = $_FILES['Image']['tmp_name'];
						$path = "images/";
						move_uploaded_file($file_tmp, $path.$file);
						$username = $_POST['Username'];
						$password = $_POST['Password'];
						$confirm = $_POST['Confirm'];
						$email= $_POST['Email'];
						$phone= $_POST['Phone'];
						$sql1="select * from users where Username='$username'";
						$result1 = mysqli_query($connect, $sql1);
						$check_user = mysqli_num_rows($result1);
						if ($check_user > 0) {
							echo "<script>alert('Username available')</script>";
							echo "<script>window.open('signup.php','_self')</script>";
						}
						elseif($password !== $confirm) {
							echo "<script>alert('Confirm password is incorrect')</script>";
							echo "<script>window.open('signup.php','_self')</script>";
						}
						else {
							$sql="insert into users values ('','$username','$password','$email','$phone','','$file')";
							$result = mysqli_query($connect, $sql);
							if ($result) {
								echo "<script>alert('Account has been created successfull!')</script>";
								echo "<script>window.open('login.php','_self')</script>";
							}
							else {
								echo "<script>alert('Error')</script>";
								echo "<script>window.open('signup.php','_self')</script>";
							}
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