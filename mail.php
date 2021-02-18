<?php
//index.php
// require 'dbconfig/config.php';
$message = '';
$connect = new PDO("mysql:host=localhost;dbname=userlogin", "root", "");
function fetch_customer_data($connect)
{
	$query = "SELECT * FROM product";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();

	$query1 = "SELECT SUM(prod_price) as total FROM product";
	$statement1 = $connect->prepare($query1);
	$statement1->execute();
	$result2 = $statement1->fetchAll(); 
	$sum=$result2[0]['total'];
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
		<h2>Total Price:'. $sum.'</h2>
	</div>
	';
	return $output;
}

if(isset($_POST["action"]))
{
	include('pdf.php');
	$file_name = md5(rand()) . '.pdf';
	$html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
	$html_code .= fetch_customer_data($connect);
	$pdf = new Pdf();
	$pdf->load_html($html_code);
	$pdf->render();
	$file = $pdf->output();
	file_put_contents($file_name, $file);
	
	require 'includes/class.phpmailer.php';
	$mail = new PHPMailer;
	$mail->IsSMTP();								//Sets Mailer to send message using SMTP
	$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = '587';								//Sets the default SMTP server port
	$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->Username = 'ramwaghmode145@gmail.com';					//Sets SMTP username
	$mail->Password = 'omjayram@145';					//Sets SMTP password
	$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = 'ramwaghmode145@gmail.com';			//Sets the From email address for the message
	$mail->FromName = 'WMSOrg';			//Sets the From name of the message
	$mail->AddAddress('mangeshpotdar1999@gmail.com', 'Name');		//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML				
	$mail->AddAttachment($file_name);     				//Adds an attachment from a path on the filesystem
	$mail->Subject = 'Customer Details';			//Sets the Subject of the message
	$mail->Body = 'Please Find Customer details in attach PDF File.';				//An HTML or plain text message body
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		$message = '<label class="text-success">Customer Details has been send successfully...</label>';
	}
	unlink($file_name);
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
		<br />
		<div class="container">
			<h3 align="center">Product Bill Data</h3>
			<br />
			<form method="post">
				<input type="submit" name="action" class="btn btn-danger" value="PDF Send" /><?php echo $message; ?>
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