<?php
		session_start();
		require 'dbconfig/prodconfig.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Product Page</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color:#bdc3c7">
	<header>
		<nav>
			<h1>E-Waste Management</h1>
			<link rel="stylesheet" href="css/style.css">
			<ul id="nav">
				<li><a class="homered1" href="homepage.php">BACK</a></li>
				<li><a class="homered" href="data.php">DATA</a></li>	
			</ul>
		</nav>
	</header>

	<div id="main-wrapper">
		<center>
			<h2>Product Entry</h2>
			<img src="imgs/avatar.png" class="avatar"/>
			<link rel="stylesheet" href="css/style.css">
		</center>
	
		<form class="myform" action="sample.php" method="post">
			<label><b>Product:</b></label><br>
			<input name="pname" type="text" class="inputvalues" placeholder="Enter product name" required/><br>
			<!--<label><b>:</b></label><br>!-->
			<input name="pcompany" type="text" class="inputvalues" placeholder="Enter product company name" required/><br>
			<input name="pmodel" type="text" class="inputvalues" placeholder="Enter product model" required/><br>
			<a href="sample.php"><input name="ok" type="submit" id="login_btn" value="Add"/><br>
			<a href="pbill.php"><input name="ok" type="submit" id="login_btn" value="Bill"/><br>
		</form>

		<?php
			if(isset($_POST['login_btn']))
			{
				//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';

				$prod_name =$_POST['pname'];
				$prod_company = $_POST['pcompany'];
				$model = $_POST['pmodel'];

				//echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
				//echo '<script type="text/javascript"> alert("'.$fullname.' ---'.$username.' --- '.$password.' --- '.$gender.' --- '.$qualification.'"  ) </script>';

				if($prod_name==$prod_name)
				{
					$query= "select * from ewms WHERE pname='$prod_name'";
 
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with the same username
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else
					{ 
						$query= "insert into product values('','$prod_name','$prod_company','$model')";
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("User Registered.. Go to login page to login") </script>';
						}
						else
						{
							echo '<script type="text/javascript"> alert("'.mysqli_error($con).'") </script>';
						}
					}
					
					
				}
				else{
				echo '<script type="text/javascript"> alert("Password and confirm password does not match!") </script>';	
				}

			}
		?>
</div>
</body>
</html>