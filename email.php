<?php 
require("sendgrid-php/sendgrid-php.php");


var_dump($GLOBALS);

$request_body = json_decode('{
  "personalizations": [
    {
      "to": [
        {
          "email": "repstein95@gmail.com"
        }
      ],
      "subject": "$subject"
    }
  ],
  "from": {
    "email": "repstein95@gmail.com"
  },
  "content": [
    {
      "type": "text/plain",
      "value": "Hello, Email!"
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