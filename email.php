<?php 
if(isset($_POST['submit'])){
    $to = "mrgndwnn@gmail.com"; // this is your Email address
    $from = $_POST['Email']; // this is the sender's Email address
    $name = $_POST['Name'];
    $subject = $_POST['Subject'];
    $message = $name . " wrote the following:" . "\n\n" . $_POST['Message'];
    $message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];

	$header.= "MIME-Version: 1.0\r\n"; 
	$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
	$header.= "X-Priority: 1\r\n"; 
    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    $status = mail($to,$subject,$message,$headers);
    mail($from,$subject,$message2,$headers2); // sends a copy of the message to the sender
    if($status)
	{ 
		echo '<p>Your mail has been sent!</p>';
	} else { 
		echo '<p>Something went wrong, Please try again!</p>'; 
	}
?>