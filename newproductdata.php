<?php

//index.php
// require 'dbconfig/config.php';

$message = '';

$connect = new PDO("mysql:host=localhost;dbname=userlogin", "root", "");

function fetch_customer_data($connect)
{
	$query = "SELECT * FROM entryproduct";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<tr>
				<th>Sr.No</th>
				<th>ProductName</th>
				<th>ProductPrice</th>
				<th>ProductCompany</th>
				<th>Model</th>
				<th>Date</th>
			</tr>
	';
	foreach($result as $row)
	{
		$output .= '
			<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["prod_name"].'</td>
				<td>'.$row["prod_price"].'</td>
				<td>'.$row["prod_company"].'</td>
				<td>'.$row["prod_model"].'</td>
				<td>'.$row["prod_date"].'</td>
				
			</tr>
		';
	}
	$output .= '
		</table>
	</div>
	';
	return $output;
}


?>
<!DOCTYPE html>
<html>
	<head>
		<script src="jquery.min.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css" />
		<script src="bootstrap.min.js"></script>
	</head>
	<body>
		<header>
		<nav>
			<link rel="stylesheet" href="style.css">
			<h1>E-Waste Management</h1>
			<ul id="nav">
				<li><a class="homered" href="product.php">BACK</a></li>
			</ul>
		</nav>
	</header>

		<br />
			<h3 align="center">New Product Report</h3>
			<br />
			<form method="post">
			<!--	<input type="submit" name="action" class="btn btn-danger" value="PDF Send" /><?php echo $message; ?>-->
			</form>
			<br />
			<?php
			echo fetch_customer_data($connect);
			?>			
		</div>
		<br />
		<br />
	</body>
</html>





