<?php
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Product Page</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/style1.css">
</head>
<body style="background-color:#bdc3c7">
	<header>
		<nav>
			<h1>E-Waste Management</h1>
			<link rel="stylesheet" href="css/style.css">
			<ul id="nav">
				<li><a class="homered1" href="product.php">Add New Entry</a></li>
				<li><a class="homered1" href="newproductdata.php">Entry Report</a></li>
				<li><a class="homered1" href="homepage.php">BACK</a></li>
				<!--<li><a class="homered" href="data.php">DATA</a></li>-->	
			</ul>
		</nav>
	</header>

	<div id="main-wrapper">
		<center>
			<h2>Product Entry</h2>
			<img src="imgs/recycle.jpg" class="avatar"/>
		</center>
	
		<form class="myform" action="product.php" method="post"> 
			Name: <input name="prod_name" type="text" class="inputvalues" placeholder="Enter product name" required/><br>
			Price: <input name="prod_price" type="text" class="inputvalues" placeholder="Enter product price" required/><br>
			<!--<label><b>:</b></label><br>!-->
			 Company: <input name="prod_company" type="text" class="inputvalues" placeholder="Enter product company name" required/><br> 
			 Model: <input name="model" type="text" class="inputvalues" placeholder="Enter product model" required/><br>
			 Date: <input name="prod_date" type="date" class="inputvalues" placeholder="Enter Date" required/><br> 
			 
			<a href="product.php"><input name="ok" type="submit" id="login_btn" value="Add"/><br>
		<!--	<a href="pbdata.php"><input name="bill" type="submit" id="login_btn" value="Generate Bill"/><br>-->
		</form>
		 <?php
			if(isset($_POST['ok']))
			{
				 
				$prod_name =$_POST['prod_name'];
				$prod_price =$_POST['prod_price'];
				$prod_company = $_POST['prod_company'];
				$prod_model = $_POST['model']; 
 				$prod_date = $_POST['prod_date']; 
 
						$query= "insert into entryproduct values('','$prod_name','$prod_price','$prod_company','$prod_model','$prod_date')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("Product Added Succesfully..") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error..!! While Adding Product ") </script>';
						}
					 
			}
		?>
	</div>
</body>
</html>