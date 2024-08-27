<?php
include './database/connection.php';
global $userDao;
global $orgDao;
global $contactDao;
global $contractorDao;

$id = intval($_GET['id2delete']);
$mode = ($_GET['mode']);

switch ($mode) {
  case 'user':
    $userDao->deleteUser($id);
    header("Location: users.php");
    exit();
    break;

  case 'org':
    $orgDao->deleteOrg($id);
    header("Location: organisations.php");
    exit();
    break;

  case 'contact':
    $contactDao->deleteContact($id);
    header("Location: contacts.php");
    exit();
    break;

  case 'contractor':
    $contractorDao->deleteContractor($id);
    header("Location: contractors.php");
    exit();
    break;

  default:
    echo "ERROR GET/POST for CRUD must be made with a mode!";
    break;
}
