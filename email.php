<?php 
require("sendgrid-php/sendgrid-php.php");

$from = $_POST['Email']; // this is the sender's Email address
$name = $_POST['Name'];
$subject = $_POST['Subject'];
$message = $_POST['Message'];

$request_body = json_decode('{
  "personalizations": [
    {
      "to": [
        {
          "email": "mrgndwnn@gmail.com"
        }
      ],
      "subject": "' . $subject . '"
    }
  ],
  "from": {
    "email":  "' . $from . '"
  },
  "content": [
    {
      "type": "text/plain",
      "value": "' . $message .'"
    }
  ]
}');

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($request_body);
echo $response->statusCode();
echo $response->body();
echo $response->headers();
?>