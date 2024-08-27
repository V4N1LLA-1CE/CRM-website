<?php
include './database/connection.php';
global $userDao;
global $orgDao;

$id = intval($_GET['id2delete']);
$mode = ($_GET['mode']);

switch ($mode) {
  case 'user':
    $userDao->deleteUser($id);
    header("Location: users.php");
    exit();
    break; // idk if this is needed or not.. - Austin
  case 'org':
    $orgDao->deleteOrg($id);
    header("Location: organisations.php");
    exit();
    break;
}
