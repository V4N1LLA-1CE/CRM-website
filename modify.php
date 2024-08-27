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
    $file = ((isset($_FILES['file']) && $_FILES['file']['error'] == 0) ? $_FILES['file'] : NULL);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $specialisation = $_POST['specialisation'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // edit other changes
    $contractorDao->modifyContractor($id, $firstname, $lastname, $specialisation, $email, $phone, $address);

    // handle file checks and upload
    if ($file !== NULL) {
      // Set allowed file types
      $allowedTypes = [
        'text/plain',
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/jpg'
      ];

      // check file MIME type
      if (in_array($_FILES['file']['type'], $allowedTypes)) {
        // set filename to be the id of contractor
        // 1. get extension, 2. set destination with id and extension at the end
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileDestination = "assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "contractor_profiles" . DIRECTORY_SEPARATOR . $id . "." . $fileExtension;

        // move uploaded file to destination
        if (move_uploaded_file($file['tmp_name'], $fileDestination)) {
          header("Location: contractors.php");
          exit();
        } else {
          echo "<h1>File cannot be stored to the final destination!</h1>";
        }
      } else {
        echo "<h1 style='color:red'>You must upload a valid text or image file!</h1>";
      }
    }


    header("Location: contractors.php");
    exit();
    break;


  default:
    echo "ERROR! Your modify request must send a mode!";
}
