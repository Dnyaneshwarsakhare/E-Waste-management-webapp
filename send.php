<?php
require_once('includes/class.phpmailer.php');

$mail = new PHPMailer;
//$sender = $_REQUEST['email'] ;

/* $name = $_REQUEST['name'] ;
$mobile = $_REQUEST['mobile'] ;
$comment = $_REQUEST['comment'] ;
print_r($comment);exit; */

$mail->SMTPDebug = 0;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host ="smtp.gmail.com"; // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ramwaghmode145@gmail.com';                 // SMTP username
$mail->Password = 'password';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                     // TCP port to connect to

$mail->setFrom('ramwaghmode145@gmail.com');
$mail->addAddress('ramwaghmode145@gmail.com');     // Add a recipient
$mail->addAddress('sendfromwhom');               // Name is optional
//$mail->addAddress('contactkgn@gmail.com');               // Name is optional

//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');


$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Website Enquiry';
$mail->Body    = "<b>Name :xyz </b>"; 

//print_r($mail);

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

