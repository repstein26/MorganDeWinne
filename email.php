<?php 
require("sendgrid-php/sendgrid-php.php");

if(isset($_POST['submit'])){
	$to = "mrgndwnn@gmail.com"; // this is your Email address
    $from = $_POST['Email']; // this is the sender's Email address
    $name = $_POST['Name'];
    $subject = $_POST['Subject'];
    $message = $name . " wrote the following:" . "\n\n" . $_POST['Message'];

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

 $mail     = new SendGrid\Email();
 $mail->addTo($to)->
    setFrom($from)->
    setSubject($subject)->
    setText($message);

$response = $sg->client->mail()->send($mail);
echo $response->statusCode();
echo $response->body();
echo $response->headers();
?>