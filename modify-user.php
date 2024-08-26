<?php
include './database/connection.php';
global $userDao;

$id = intval($_POST['id2edit']);
$email = $_POST['email'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

var_dump($id, $email, $password, $firstname, $lastname);
$userDao->modifyUser($id, $email, $password, $firstname, $lastname);
header("Location: users.php");
exit();
