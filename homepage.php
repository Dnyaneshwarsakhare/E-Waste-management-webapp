<?php
 //	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>E-Waste Management</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="..style.css">
</head>
<body>
	<header>
		<nav>
			<h1>E-Waste Management</h1>
			<ul id="nav">
				<li><a class="homeblack" href="product.php">PRODUCT</a></li>
				<li><a class="homeblack" href="company.php">SEND</a></li>
				<li><a class="homeblack" href="addwaste.php">WASTE</a></li>
				<li><a class="homeblack" href="bill.php">BILL</a></li>
				<li><a class="homeblack" href="data.php">DATA</a></li>
				<li><a class="homeredd" href="index.php">LOGOUT</a></li>
			</ul>
		</nav>
	</header>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
	
	<div id="main-wrapper">
		<center>
			<h3>Welcome To Waste Management System
				<!-- <?php echo $_SESSION['user_name']; ?> -->
			</h3>
			<!--<img src="imgs/avatar.png" class="avatar"/>
		</center>
	
		<form class="myform" action="homepage.php" method="post">
			<input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>
			
		</form>
		
		<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				header('location:index.php');
			}
		?>-->
	</div>
</body>
</html>




