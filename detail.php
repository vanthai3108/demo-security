<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="styles/header-search-footer.css">
	<link rel="stylesheet" href="styles/pro-de.css">
	<link rel="stylesheet" href="styles/detail.css">
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
				<ul class="col-lg-6 col-12" id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="product.php" id="now">Product</a></li>
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
		<div class="container" id="search">
			<div class="row d-flex justify-content-center">
				<form class="col-xl-5 col-ld-6 col-md-7 col-sm-8 col-11" action="results.php">
					<div class="row d-flex justify-content-center">
						<input class="col-10" type="text" name="searchName"  placeholder="search...">
						<button class="col-2"><i class="fas fa-search fa-lg " name="search"></i></button>	
					</div>
				</form>					
			</div>
		</div>
		<div class="container" id="product">
			<div class="row">
				<div class="col-xl-2 col-md-3 col-12">
					<ul id="sidebar">
						<li><a href="product.php">All</a></li>
						<?php  
							include("connect.php"); 		
							$sql = " select* from category";
							$result = mysqli_query($connect, $sql);
							while($row_cats =  mysqli_fetch_array($result)){
								$category_id =$row_cats['CategoryID'];						
								$category_name =$row_cats['CategoryName'];						
								echo "<li><a href='product.php?category_id=$category_id'>$category_name</a></li>";		
							}
						?>
					</ul>
				</div>
				<div class="col-xl-10 col-md-9 col-12 " id="product-main">
					<div class="row d-flex justify-content-start">
						<?php 
							if (isset($_GET["product_id"])) {	 
							include("connect.php");
							$product_id = intval($_GET['product_id']); 		
							$sql = " select ProductID, ProductName, Prices, Description, Images, CategoryName from product, category where product.CategoryID = category.CategoryID AND ProductID=$product_id";
							$result = mysqli_query($connect, $sql);
							while($row_pro =  mysqli_fetch_array($result)){
								$product_id =$row_pro['ProductID'];
								$product_name =$row_pro['ProductName'];
								$product_price =$row_pro['Prices'];
								$product_des =$row_pro['Description'];
								$category_name =$row_pro['CategoryName'];
								$product_image =$row_pro['Images'];
								echo "
									<div class='col-12'>
										<div class='row d-flex justify-content-center'>
											<h3 class='col-12'>$product_name</h3>
											<img class='col-4' src='$product_image'>
											<h4 class='col-12'>Detail information</h4>
											<div class='col-6'>
												<p>Category: <span>$category_name</span></p>
												<p>Price: $<span>$product_price</span></p>
												<p>Desscription: <span>$product_des</span></p>
											</div>
											<div class='col-12'>
												<a href='detail.php?add_cart=$product_id'><button>Add to cart</button></a>
											</div>
										</div>
									</div>
								";
							}
						}
						?>
						<?php include("add-cart.php"); ?>
					</div>
				</div>
			</div>	
		</div>
	</div>
	<?php include("footer.php"); ?>
</body>
</html>