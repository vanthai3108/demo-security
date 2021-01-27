<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../styles/admin-header.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
	<link rel="stylesheet" href="../../styles/admin-view.css">
	<link href="../../fontawesome/css/all.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
	<title>Web | admin</title>
</head>
<body>

	<header>
		<div>
			<ul>
				<li><a href="../index.php">Home</a></li>
				<li><a href="../product/view_product.php">Manage products</a></li>
				<li id="now"><a href="view_category.php">Manage categories</a></li>
			</ul>
			<ul>
				<li><a href="../../logout.php">Log out</a></li>
			</ul>
		</div>
		
	</header>
	<div>
		<h2>This is the category management page</h2>
		<a href='add-edit_category.php' id='icon3'><i class='fas fa-plus fa-2x'></i></a>
	</div>
	<div id="list-items">
		<table>
			<tr>
				<th>Category ID</th>
				<th>Category Name</th>
				<th colspan="2">Actions</th>
			</tr>
			<?php  
				include("../../connect.php"); 		
				$sql = " select * from category";
				$result = mysqli_query($connect, $sql);
				while($row_cat =  mysqli_fetch_array($result)){
					$category_id =$row_cat['CategoryID'];
					$category_name =$row_cat['CategoryName'];
					echo "
						<tr>
							<td>$category_id</td>
							<td>$category_name</td>
							<td><a href='view_category.php?category_id=$category_id'><i class='fas fa-trash fa-2x' id='icon1'></i></a></td>
							<td><a href='add-edit_category.php?category_id=$category_id'><i class='fas fa-edit fa-2x' id='icon2'></i><a></td>
						</tr>
					";		
				}
			?>
		</table>
		<?php 
			include("../../connect.php");
			$category_id='-1';
			if (isset($_GET["category_id"])) {	
				$category_id = intval($_GET['category_id']);
				$sql="delete from category where CategoryID=$category_id";
				$result = mysqli_query($connect, $sql);
				if ($result) {
					echo "<script>alert('Category has been deleted successfull!')</script>";
					echo "<script>window.open('view_category.php','_self')</script>";
				}
				else {
					echo "<script>alert('Error')</script>";

				}
			}
		?>
	</div>
</body>
</html>