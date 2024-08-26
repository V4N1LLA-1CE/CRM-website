<?php
include './database/connection.php';
global $userDao;

$id2delete = intval($_GET['id2delete']);

$userDao->deleteUser($id2delete);
header("Location: users.php");
exit();
