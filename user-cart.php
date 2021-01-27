<?php 
	session_start();
	include("connect.php"); 
	if (isset($_SESSION['Username']) && $_SESSION['Username'] != null){
  	$Username = $_SESSION['Username'];
  	$sql=" select * from users where Username = '$Username' ";
  	$result = mysqli_query($connect, $sql);
	while($row_user =  mysqli_fetch_array($result)){
		$avatar = $row_user['Avatar'];

	echo "
		<li id='icon-buy'><a href='cart.php'><i class='fas fa-shopping-cart fa-2x'></a></i></li>
		<li><a id='user' href='' ><img id='userimg' src='images/$avatar'></a>
		  <ul>
				<li><a href='logout.php'>Logout</a></li>
				<li><a href='profile.php'>Profile</a></li>
			</ul>
		</li>
	";
	}
	}
	else{
		echo"
			<li id='icon-buy'><i class='fas fa-shopping-cart fa-2x'></i></li>
			<li><a href='signup.php'>Sign up</a></li>
			<li><a href='login.php'>Login</a></li>     
		";     	
	 }
?>