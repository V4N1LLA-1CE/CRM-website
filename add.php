<?php
include './database/connection.php';
global $userDao;
global $orgDao;
global $contactDao;
global $contractorDao;

// get mode from either POST or GET
if (isset($_GET['mode'])) {
  $mode = $_GET['mode'];
} else {
  $mode = $_POST['mode'];
}

switch ($mode) {
  case 'user':
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $userDao->insertUser($email, $password, $firstname, $lastname);

    header("Location: users.php");
    exit();
    break;

  case 'org':
    $mode = $_POST['mode'];
    $name = $_POST['name'];
    $website = $_POST['website'];
    $desc = $_POST['description'];
    $industry = $_POST['industry'];

    $orgDao->insertOrg($name, $website, $desc, $industry);
    header("Location: organisations.php");
    exit();
    break;

  case 'contact':
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // email for email header
    $email = $_POST['email'];

    $contactDao->insertContacts($firstname, $lastname, $phone, $message);

    // create mail components
    $to = "NathanJims@b2brecruitz.com";
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
      header("Location: index.php");
    } else {
      echo "Sorry, there was an error sending your message. Please try again later.";
      header("Location: index.php");
      exit();
    }
    break;

  case 'contractor':
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $specialisation = $_POST['specialisation'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // insert
    $contractorDao->insertContractor($firstname, $lastname, $specialisation, $email, $phone, $address);
    header("Location: contractors.php");
    exit();
    break;

  default:
    echo "ERROR GET/POST for CRUD must be made with a mode!";
    break;
}
