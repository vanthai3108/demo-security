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
				<li><a href="../product/view_product.php">Manage products</a></li>
				<li id="now"><a href="view_category.php">Manage categories</a></li>
			</ul>
			<ul>
				<li><a href="../../loout.php">Log out</a></li>
			</ul>
		</div>
	</header>
	<div>
		<h2>This is the edit category page</h2>
	</div>
	<div id="add">
		<form method="post">
			<table>
					<?php 
						include("../../connect.php");
					$category_id='-1';
					$category_name='';
					if (isset($_GET["category_id"])) {	
						$category_id = intval($_GET['category_id']);
						$sql = " select* from category where CategoryID = $category_id";
						$result = mysqli_query($connect, $sql);
						while($row_cat =  mysqli_fetch_array($result)){
							$category_id =$row_cat['CategoryID'];
							$category_name =$row_cat['CategoryName'];
						}
					}
					echo "
						<tr>
							<td>Category Name</td>
							<td><input type='text' name='CategoryName' value='$category_name'></td>
						</tr>
					";
				?>
				<tr>
					<td><input type="submit" name="add" value="Add"></td>
					<td><input type="submit" name="edit" value="Update"></td>					
				</tr>				
			</table>
		</form>
		<?php 
			include("../../connect.php");
			if(isset($_POST['add'])){
				
				$category_name = $_POST['CategoryName'];
				$sql="insert into category values ('','$category_name')";
				$result = mysqli_query($connect, $sql);
				if ($result) {
					echo "<script>alert('Category has been added successfull!')</script>";
					echo "<script>window.open('view_category.php','_self')</script>";
				}
				else {
					echo "<script>alert('Error')</script>";
				}
			}
			if(isset($_POST['edit'])){
				
				$category_name = $_POST['CategoryName'];
				$sql="update category set CategoryName='$category_name' where CategoryID=$category_id";
				$result = mysqli_query($connect, $sql);
				if ($result) {
					echo "<script>alert('Category has been edited successfull!')</script>";
					echo "<script>window.open('view_category.php','_self')</script>";
				}
				else {
					echo "<script>alert('Error')</script>";
				}
			}
		?>
	</div>
	<div style="height: 440px;">
		
	</div>
</body>
</html>