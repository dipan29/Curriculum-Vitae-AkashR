<?php
	$sender = "notification@mindwebs.org";

	$to = "meakashroy.ar@gmail.com";
	
    $from = $_POST['email'];
    $name = $_POST['name'];
    $csubject = $_POST['subject'];
    $cmessage = htmlentities($_POST['message']);

	$headers = "From: MinD Webs <" . $sender . ">" . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "[AkashRoy.com] You Have a new Contact Form";

    $logo = 'http://akashroy.com/img/logo.png';
    $link = 'http://www.akashroy.com';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>MinD Webs Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	$body .= "</tr>";
	$body .= "<tr>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
	// $body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'><strong>Message:</strong> ". nl2br($cmessage) ". </td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

	//$send = mail($to, $subject, $body, $headers);
	
	if(mail($to, $subject, $body, $headers)) {
		?>
		<script>
		alert("Message Sent Successfully!");
			window.history.go(-1);
		</script>
		<?php
	} else {
		echo "There was an error!";
	}

?>