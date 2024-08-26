<?php

include './database/connection.php';
global $userDao;

$email = $_POST["email"];
$password = $_POST["password"];

// get users from db
$users = $userDao->getUsers();

foreach ($users as $user) {
  if ($user['email'] === $email && $user['password'] === $password) {
    header("Location: dashboard.php");
    exit();
  }
}

header("Location: login.html?error=failed");
exit();
