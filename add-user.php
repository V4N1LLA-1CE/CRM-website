<?php
include './database/connection.php';
global $userDao;

$email = $_POST['email'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

$userDao->insertUser($email, $password, $firstname, $lastname);
header("Location: users.php");
exit();
