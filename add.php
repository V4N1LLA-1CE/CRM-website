<?php
include './database/connection.php';
global $userDao;
global $orgDao;

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

  default:
    echo "ERROR GET/POST for CRUD must be made with a mode!";
}
