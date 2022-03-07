<?php
// Uncomment next line if you're not using a dependency loader (such as Composer)
// require_once '<PATH TO>/sendgrid-php.php';


use SendGrid\Mail\From;
use SendGrid\Mail\HtmlContent;
use SendGrid\Mail\Mail;
use SendGrid\Mail\PlainTextContent;
use SendGrid\Mail\Subject;
use SendGrid\Mail\To;

if (isset($_POST["submit"])) {
$from = new From("test@example.com", "Example User");
$subject = new Subject("Sending with Twilio SendGrid is Fun");
$to = new To("test@example.com", "Example User");
$plainTextContent = new PlainTextContent(
    "and easy to do anywhere, even with PHP"
);
$htmlContent = new HtmlContent(
    "<strong>and easy to do anywhere, even with PHP</strong>"
);
$email = new Mail(
    $from,
    $to,
    $subject,
    $plainTextContent,
    $htmlContent
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}
} else {
	header("location: ../update-profile.php");
    exit();
}