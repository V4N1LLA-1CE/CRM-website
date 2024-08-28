<?php
include './database/connection.php';
global $userDao;
global $orgDao;
global $contactDao;
global $contractorDao;
global $projectDao;

$id = intval($_GET['id2delete']);
$mode = ($_GET['mode']);

switch ($mode) {
  case 'user':
    $userDao->deleteUser($id);
    header("Location: users.php");
    exit();
    break;

  case 'org':
    // When a organisation is deleted, the associated project and contact us messages should be deleted.
    // Delete associated contact-us messages
    $contactDao->deleteAssociatedData($id);

    // Delete associated project
    $projectDao->deleteAssociatedProject($id);

    // Delete organisation
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
    // When a contractor is deleted, the associated projects do not get deleted, the contractor field could be blank.
    // Delete contractor from the associated projects before deleting contractor
    $projectDao->deleteContractorData($id);

    $contractorDao->deleteContractor($id);
    header("Location: contractors.php");
    exit();
    break;

  default:
    echo "ERROR GET/POST for CRUD must be made with a mode!";
    break;
}
