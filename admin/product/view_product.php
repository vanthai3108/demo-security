<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../styles/admin-header.css">
	<link rel="stylesheet" href="../../styles/admin-view.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
	<link href="../../fontawesome/css/all.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
	<title>Web | admin</title>
</head>
<body>
	<header>
		<div>
			<ul>
				<li><a href="../index.php">Home</a></li>
				<li id="now"><a href="view_product.php">Manage products</a></li>
				<li><a href="../category/view_category.php">Manage categories</a></li>
			</ul>
			<ul>
				<li><a href="../../logout.php">Log out</a></li>
			</ul>	
		</div>		
	</header>
	<div>
		<h2>This is the product management page</h2>
		<a href='add-edit_product.php' id='icon3'><i class='fas fa-plus fa-2x'></i></a>
	</div>
	<div id="list-items">
		<form method="post">
		<table>
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Prices</th>
				<th>Description</th>
				<th>Images</th>
				<th>Category Name</th>
				<th colspan="3">Actions</th>
			</tr>

			<?php  
				include("../../connect.php"); 		
				$sql = " select ProductID, ProductName, Prices, Description, Images, CategoryName from product, category where product.CategoryID = category.CategoryID";
				$result = mysqli_query($connect, $sql);
				while($row_pro =  mysqli_fetch_array($result)){
					$product_id =$row_pro['ProductID'];
					$product_name =$row_pro['ProductName'];
					$product_price =$row_pro['Prices'];
					$product_des =$row_pro['Description'];
					$product_image =$row_pro['Images'];
					$category_name =$row_pro['CategoryName'];
					echo "
						<tr>
							<td>$product_id</td>
							<td>$product_name</td>
							<td><span>$</span>$product_price</td>
							<td>$product_des</td>
							<td><img src='../../$product_image'></td>
							<td>$category_name</td>
							<td><a href='view_product.php?product_id=$product_id'><i class='fas fa-trash fa-2x' id='icon1'></i></a></td>
							<td><a href='add-edit_product.php?product_id=$product_id'><i class='fas fa-edit fa-2x' id='icon2'></i><a></td>
						</tr>
					";
	
				}

			?>
		</table>
		<?php 
			include("../../connect.php");
			$product_id='-1';
			if (isset($_GET["product_id"])) {	
				$product_id = intval($_GET['product_id']);
				$sql="delete from product where ProductID=$product_id";
				$result = mysqli_query($connect, $sql);
				if ($result) {
					echo "<script>alert('Product has been deleted successfull!')</script>";
					echo "<script>window.open('view_product.php','_self')</script>";
				}
				else {
					echo "<script>alert('Error')</script>";
				}
			}
		?>
	</div>
</body>
</html>