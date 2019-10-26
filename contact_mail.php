<?php 
$errors = '';

$myemail = 'meakashroy.ar@gmail.com';


if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
//$phone = $_POST['phone'];
$subject = $_POST['subject'];
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "[CONTACT FORM] $name | $subject ";
	$email_body = "You have received a New Message | AkashRoy.COM . \n\n".
	"Here are the details:\n Name: $name \n Email: $email_address \n Phone Number : $phone \n \n Message: \n $message"; 
	
	$headers = "From: MinD Webs <notification@mindwebs.org>\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	
	//redirect to the 'thank you' page
	
	$value = "Your Message Has Been Successfully Sent";
	
	setcookie("msg_confirm", $value, time()+30, '/');
	
	header("Location: http://www.akashroy.com");
	
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>