<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="styles/header-search-footer.css">
	<link rel="stylesheet" href="styles/home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
	<link href="fontawesome/css/all.css" rel="stylesheet">
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
					<li><a href="index.php" id="now">Home</a></li>
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
	<div class="container-fluid" id="content">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<img class="col-12" src="images/noel5.png">
			</div>
		</div>
		<div class="container" id="achievement">
			<div class="row">
				<h3 class="col-12">Achievements of my company</h3>
			</div>
			<div class="row d-flex justify-content-between">
				<div class="col">
					<div class="row d-flex justify-content-start">
						<div class="col-xl-5 col-lg-6 col-12 achievement-content">
							<span><img src="images/icon1.png"></span>
							<div>
								<h4>Sales</h4>
								<p>With sales of more than 1,000,000 products in 2019. My company is honored to be one of the 10 best retailer of technology products of the year.</p>
							</div>
						</div>
					</div>
					<div class="row d-flex justify-content-end">
						<div class="col-xl-5 col-lg-6 col-12 achievement-content">
							<span><img src="images/icon2.png"></span>
							<div>
								<h4>Quality</h4>
								<p>With continuously improving quality and customer care services. The products and companies have been highly appreciated by partners and customers. None of the company's products sold were rated below 5 stars.</p>	
							</div>
						</div>
					</div>
					<div class="row d-flex justify-content-start">
						<div class="col-xl-5 col-lg-6 col-12 achievement-content">
							<span><img src="images/icon3.png"></span>
							<div>
								<h4>Prices</h4>
								<p>Although the quality of the products is very high, the price is very affordable. They are sold for 10% cheaper than the market price.</p>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<?php include("footer.php"); ?>

<script type="text/javascript" src="script.js"></script>
</body>
</html>