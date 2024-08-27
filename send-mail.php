<?php

// store post contents into variables
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// var_dump($firstname, $lastname, $email, $phone, $message);

$rto = "NathanJims@b2brecruitz.com";
$subject = "Contact Us Form Submission";
$body = "You have received a new message from the Contact Us form on your website.\n\n" .
  "Here are the details:\n" .
  "Full Name: $firstname $lastname\n" .
  "Email: $email\n" .
  "Phone: $phone\n" .
  "Message: \n$message\n";

$headers = "From: $email" . "\r\n" .
  "Reply-To: $email" . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

// send mail
if (mail($to, $subject, $body, $headers)) {
  header("Location: contact-us.php");
} else {
  echo "Sorry, there was an error sending your message. Please try again later.";
}
