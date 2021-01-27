<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../styles/admin-header.css">
	<link rel="stylesheet" href="../../styles/admin-add.css">
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
		<h2>This is the edit product page</h2>
	</div>
	<div id="add">
		<form method="post" enctype="multipart/form-data">
			<table>
				<?php 
					include("../../connect.php");
					$product_id='-1';
					$product_name='';
					$product_price ='0';
					$product_des ='';
					$product_image ='';
					if (isset($_GET["product_id"])) {	
						$product_id = intval($_GET['product_id']);
						$sql = " select* from product where ProductID = $product_id";
						$result = mysqli_query($connect, $sql);
						while($row_pro =  mysqli_fetch_array($result)){
							$product_id =$row_pro['ProductID'];
							$product_name =$row_pro['ProductName'];
							$product_price =$row_pro['Prices'];
							$product_des =$row_pro['Description'];
							$product_image =$row_pro['Images'];
						}
					}
					echo "
						<tr>
							<td>Product Name</td>
							<td><input type='text' name='ProductName' value='$product_name'></td>
						</tr>
						<tr>
							<td>Prices</td>
							<td><input type='text' name='Prices' value='$product_price'></td>
						</tr>
						<tr>
							<td>Description</td>
							<td><input type='text' name='Description' value='$product_des'></td>
						</tr>
						<tr>
							<td>Images</td>
							<td><input type='file' name='Images' value='$product_image'></td>
						</tr>
					";
				?>
				<tr>
					<td>Category Name</td>
					<td colspan='2'>
						<select name='CategoryID'>
							<?php 
								include("../../connect.php");  		
								$sql2 = 'select * from category';
								$result2 = mysqli_query($connect, $sql2);
								while($row_cat =  mysqli_fetch_array($result2)){
									$category_id =$row_cat['CategoryID'];
									$category_name =$row_cat['CategoryName'];
									echo "<option value='$category_id'>$category_name</option>";		
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><input type="submit" name="add" value="Add"></td>
					<td><input type="submit" name="edit" value="Update"></td>
				</tr>				
			</table>
		</form>
		<?php 
			include("../../connect.php");
			if(isset($_POST['add'])){
				$file = $_FILES['Images']['name'];
				$file_tmp = $_FILES['Images']['tmp_name'];
				$path = "../../images/";
				move_uploaded_file($file_tmp, $path.$file);
				$product_name =$_POST['ProductName'];
				$product_price =$_POST['Prices'];
				$product_des =$_POST['Description'];
				$category_id =$_POST['CategoryID'];
				$sql="insert into product values ('','$product_name','$product_price','$product_des','images/$file','$category_id')";
				$result = mysqli_query($connect, $sql);
				if ($result) {
					echo "<script>alert('Product has been added successfull!')</script>";
					echo "<script>window.open('view_product.php','_self')</script>";
				}
				else {
					echo "<script>alert('Error')</script>";
				}
			}
			if(isset($_POST['edit'])){
				$file = $_FILES['Images']['name'];
				$file_tmp = $_FILES['Images']['tmp_name'];
				$path = "../../images/";
				move_uploaded_file($file_tmp, $path.$file);
				$product_name =$_POST['ProductName'];
				$product_price =$_POST['Prices'];
				$product_des =$_POST['Description'];
				$category_id =$_POST['CategoryID'];
				$sql="update product set ProductName='$product_name', Prices=$product_price, Description='$product_des', Images='images/$file', CategoryID='$category_id' where ProductID='$product_id'";
				$result = mysqli_query($connect, $sql);
				if ($result) {
					echo "<script>alert('Product has been edited successfull!')</script>";
					echo "<script>window.open('view_product.php','_self')</script>";
				}
				else {
					echo "<script>alert('Error')</script>";
				}
			}
		?>
	</div>
	<div style="height: 157px;">
		
	</div>
</body>
</html>