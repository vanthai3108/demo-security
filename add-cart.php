<?php 
	include("connect.php");
	if (isset($_GET["add_cart"])) {	
		$ProductID =  intval($_GET['add_cart']);
		if (isset($_SESSION['Username']) && $_SESSION['Username'] != null){
			$UserName = $_SESSION['Username'];
			$sql="select * from cart where ProductID = $ProductID AND UserName='$UserName'";
			$result = mysqli_query($connect, $sql);
			$check_product = mysqli_num_rows($result);
			if ($check_product > 0) {
				echo "<script>alert('Products already in the cart')</script>";
				echo "<script>window.open('product.php','_self')</script>";
			}
			else {
				$sql = " insert into cart values ('', $ProductID, 1, '$UserName') ";
				$result = mysqli_query($connect, $sql);	
				if ($result) {
					echo "<script>alert('Product added to the cart successfully!')</script>";
					echo "<script>window.open('product.php','_self')</script>";
				}
				else {
					echo "<script>alert('Error')</script>";
					echo "<script>window.open('product.php','_self')</script>";
				}
			}
		}
		else {
			echo "<script>alert('You need to be logged in to perform this action')</script>";
			echo "<script>window.open('product.php','_self')</script>";
		}
	}					
?>