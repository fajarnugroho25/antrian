<?php
require("sendgrid-php.php");

// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");

$from = new SendGrid\Email(null, "no-reply@triponyu.com");
$subject = "Hello World from the SendGrid PHP Library!";
$to = new SendGrid\Email(null, "choirudin.emcha@triponyu.com");
$content = new SendGrid\Content("text/plain", "Hello, Email!");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = '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';
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->headers();
echo $response->body();
