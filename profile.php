<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="styles/header-search-footer.css">
	<link rel="stylesheet" href="styles/profile.css">
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
	<title>Web</title>
</head>
<body>
	<header class="container-fluid">
		<div class="container">
			<div class="row d-flex justify-content-between">
				<a class="col-lg-2 col-12" href="index.php"><img src="images/logo.png" alt=""></a>
				<ul class="col-lg-6 col-12">
					<li><a href="index.php">Home</a></li>
					<li><a href="product.php">Product</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="aboutme.php">About me</a></li>
				</ul>


				<ul class="col-lg-4 col-12" id="menu">
					<?php include("user-cart.php"); ?>

				</ul>
			</div>
		</div>
	</header>
	<div class="container-fluid" id="profile">
		<div class="container">
			<form class="row d-flex justify-content-center" method="post" enctype="multipart/form-data">
				<table class="col-6">
					<tr class="row d-flex justify-content-center">
						<td class="col-12" colspan="2"><h2>Personal Information</h2></td>
					</tr>
					<?php 
					include("connect.php"); 
					$username = $_SESSION['Username']; 	
						$sql = " select * from users where Username = '$username' ";
						$result = mysqli_query($connect, $sql);
						while($row_user =  mysqli_fetch_array($result)){
							$username=$row_user['Username'];												
							$email=$row_user['Email'];						
							$phone=$row_user['Phone'];						
							$avatar=$row_user['Avatar'];						
								echo "
					<tr class='row d-flex justify-content-center'>
						<td class='col-4' colspan='2'><img src='images/$avatar'></td>
					</tr>
					<tr class='row d-flex justify-content-center'>
						<td class='col-2' >Username:</td>
						<td class='col-2'>$username</td>
					</tr>
					<tr class='row d-flex justify-content-center'>
						<td class='col-4'>Avatar:</td>
						<td class='col-4'><input type='file' name='Image'></td>
					</tr>
					<tr class='row d-flex justify-content-center'>
						<td class='col-4'>Email address:</td>
						<td class='col-4'><input type='text' name='Email' value='$email'></td>
					</tr>
					<tr class='row d-flex justify-content-center'>
						<td class='col-4'>Phone Number:</td>
						<td class='col-4'><input type='text' name='Phone' value='$phone'></td>
					</tr>
					<tr class='row d-flex justify-content-center'>
						<td class='col-12' colspan='2'><input type='submit' name='save' value='Save'></td>
					</tr>
					";
					}
					?>

				</table>			
			</form>	
			<?php 
			include("connect.php");
			if(isset($_POST['save'])){
				$file = $_FILES['Image']['name'];
				$file_tmp = $_FILES['Image']['tmp_name'];
				$path = "images/";
				move_uploaded_file($file_tmp, $path.$file);				
				$username =  $_SESSION['Username'];
				$email = $_POST['Email'];
				$phone = $_POST['Phone'];
				$sql="update users set Email = '$email', Phone = $phone, Avatar ='$file' where Username = '$username'";
				$result = mysqli_query($connect, $sql);
				if ($result) {
					echo "<script>alert('User updated successfull!')</script>";
					echo "<script>window.open('profile.php','_self')</script>";
				}
				else {
					echo "<script>alert('Error')</script>";
				}
			}			
			 ?>		
		</div>
	</div>
		
	<?php include("footer.php"); ?>

<script type="text/javascript" src="script.js"></script>
</body>
</html>