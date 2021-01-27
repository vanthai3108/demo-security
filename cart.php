<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="styles/header-search-footer.css">
	<link rel="stylesheet" href="styles/cart.css">
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
	<div class="container-fluid" id="cart">
		<div class="container">
				<form class="row d-flex justify-content-center" method="post">
					<table class="col-10">
						<tr class="row d-flex justify-content-center">
							<th class='col-1'></th>
							<th class='col-3'>Product Name</th>
							<th class='col-2'>Images</th>
							<th class='col-1'>Prices</th>
							<th class='col-3'>Quantily</th>
							<th class='col-2'></th>
						</tr>
						<?php 			 
							include("connect.php");
							$Username = $_SESSION['Username'];
							$sql="select * from cart where UserName='$Username'";
							$result = mysqli_query($connect, $sql);
							$check_user = mysqli_num_rows($result);
							if ($check_user == 0){
							echo "<tr class='row d-flex justify-content-center'>
									<td colspan='6' class='col-4'><h5>Your shopping cart is empty</h5></td>
								</tr>";
							}
							else {
								$sql = " select CartID, ProductName, Images, Prices, Quantily from product, cart where product.ProductID = cart.ProductID AND UserName='$Username'";
								
								$result = mysqli_query($connect, $sql);
								while($row_cart =  mysqli_fetch_array($result)){
									$cart_id =$row_cart['CartID'];						
									$cart_pro_name =$row_cart['ProductName'];	
									$cart_pro_image =$row_cart['Images'];	
									$cart_pro_price =$row_cart['Prices'];	
									$cart_pro_quantily =$row_cart['Quantily'];		
                                    $sql2 = " select ProductID from cart where UserName='$Username' AND CartID =$cart_id";
                                    $result2 = mysqli_query($connect, $sql2);
									while($row_cart2 =  mysqli_fetch_array($result2)){
										$cart_pro_id =$row_cart2['ProductID'];
									}
									echo "
										<tr class='row d-flex justify-content-center'>
											<td class='col-1'><input type='checkbox' name='ProductID' value='$cart_id'></td>
											<td class='col-3'><a href='detail.php?product_id=$cart_pro_id' >$cart_pro_name</a></td>
											<td class='col-2'><img src='$cart_pro_image'></td>
											<td class='col-1'><span>$</span>$cart_pro_price</td>
											<td class='col-3'><input type='text' name='Quantily' value='$cart_pro_quantily'></td>
											<td class='col-2'><a href='cart.php?delete_cart_pro=$cart_id'>Delete</a></td>
										</tr>
									";
								}
								echo "
									<tr class='row d-flex justify-content-center'>
							            <th class='col-1' colspan='6'><a href='#' id='buy'>Buy</a></th>
									</tr>
								";
							}
						?>

					</table>
				</form>
		</div>
	</div>
	<?php 
		include("connect.php");
		if (isset($_GET["delete_cart_pro"])) {	
			$CartID = intval($_GET['delete_cart_pro']);
			$sql="delete from cart where CartID =$CartID";
			$result = mysqli_query($connect, $sql);
			if ($result) {
				echo "<script>window.open('cart.php','_self')</script>";
			}
			else {
				echo "<script>alert('Error')</script>";
				echo "<script>window.open('cart.php','_self')</script>";
			}
		}

	 ?>
	<?php include("footer.php"); ?>

<script type="text/javascript" src="script.js"></script>
</body>
</html>