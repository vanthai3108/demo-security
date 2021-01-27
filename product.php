<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="styles/header-search-footer.css">
	<link rel="stylesheet" href="styles/product.css">
	<link rel="stylesheet" href="styles/pro-de.css">
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
				<form class="col-xl-5 col-ld-6 col-md-7 col-sm-8 col-11" method="get" action="results.php" enctype="multipart/form-data">
					<div class="row d-flex justify-content-center">
						<input class="col-10" type="text" name="searchName" placeholder="search...">
						<button ><i class="fas fa-search fa-lg" name="search"></i></button>
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
							$sql = " select * from category";
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

							include("connect.php"); 
							$category_id='-1';
							if (isset($_GET["category_id"])) {	
							$category_id = intval($_GET['category_id']);
							}
							if ($category_id=='-1') {
								$sql = " select * from product ";
							$result = mysqli_query($connect, $sql);
							while($row_pro =  mysqli_fetch_array($result)){
								$product_id =$row_pro['ProductID'];
								$product_name =$row_pro['ProductName'];
								$product_price =$row_pro['Prices'];
								$category_id =$row_pro['CategoryID'];
								$product_image =$row_pro['Images'];
								echo "
									<div class='col-lg-4 col-sm-6 col-12'>
										<div>
											<img src='$product_image'>
											<h4>$product_name</h4>
											<p>Price: $<span>$product_price</span></p>
											<div>
												<a href='detail.php?product_id=$product_id'>Details</a>
												<a href='product.php?add_cart=$product_id'><button name='addcart'>Add to cart</button></a>
											</div>
										</div>
									</div>
								";		
							}
							}
							else {
							$sql = " select* from product where CategoryID = $category_id";
							$result = mysqli_query($connect, $sql);
							while($row_pro =  mysqli_fetch_array($result)){
								$product_id =$row_pro['ProductID'];
								$product_name =$row_pro['ProductName'];
								$product_price =$row_pro['Prices'];
								$category_id =$row_pro['CategoryID'];
								$product_image =$row_pro['Images'];
								echo "
									<div class='col-lg-4 col-sm-6 col-12'>
										<div>
											<img src='$product_image'>
											<h4>$product_name</h4>
											<p>Price: $<span>$product_price</span></p>
											<div>
												<a href='detail.php?product_id=$product_id'>Details</a>
												<a href='product.php?add_cart=$product_id'><button>Add to cart</button></a>
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