<?php
include './database/connection.php';
global $userDao;
global $orgDao;
global $contactDao;
global $contractorDao;

$id = intval($_POST['id2edit']);
$mode = ($_POST['mode']);

switch ($mode) {
  case 'user':
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $userDao->modifyUser($id, $email, $password, $firstname, $lastname);
    header("Location: users.php");
    exit();
    break;

  case 'org':
    $name = $_POST['name'];
    $site = $_POST['website'];
    $desc = $_POST['description'];
    $industry = $_POST['industry'];

    $orgDao->modifyOrg($id, $name, $site, $desc, $industry);
    header("Location: organisations.php");
    exit();
    break;

  case 'contact':
    $replied = ($_POST['replied'] === "on" ? true : false);
    $org = (isset($_POST['organisation']) ? $_POST['organisation'] : NULL);
    $contactDao->modifyRepliedAndOrg($id, $replied, $org);
    header("Location: contacts.php");
    exit();
    break;

  case 'contractor':
    // set variables sent
    $file = (isset($_FILES['file']) ? $_FILES['file'] : NULL);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $specialisation = $_POST['specialisation'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $contractorDao->modifyContractor($id, $firstname, $lastname, $specialisation, $email, $phone, $address);
    header("Location: contractors.php");

    exit();
    break;

    // handle file checks

    // edit other changes

  default:
    echo "ERROR! Your modify request must send a mode!";
}
