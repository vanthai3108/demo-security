<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="styles/header-search-footer.css">
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
				<ul class="col-lg-6 col-12" id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="product.php">Product</a></li>
					<li><a href="news.php">News</a></li>
					<li><a href="aboutme.php" id="now">About me</a></li>
				</ul>
				<ul class="col-lg-4 col-12" id="menu">
					<?php include("user-cart.php"); ?>
				</ul>
			</div>
		</div>
	</header>
	<div class="container-fluid" id="content">
		<div class="container">
			<div class="row d-flex justify-content-center" id="maintenance">
				<img class="col-xl-4 col-lg-5 col-8" src="images/maintenance1.png" style="margin: 7px 0px">
				<h5 class="col-12">Feature coming soon</h5>
			</div>
		</div>
	</div>
	<?php include("footer.php"); ?>
	
</body>
</html>