<?php
include './database/connection.php';
global $orgDao;

$name = $_POST['name'];
$website = $_POST['website'];
$desc = $_POST['description'];
$industry = $_POST['industry'];

$orgDao->insertOrg($name, $website, $desc, $industry);
header("Location: organisations.php");
exit();
