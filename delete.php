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
    // Delete contact-us messages associated to this organisation
    $contactDao->deleteAssociatedData($id);

    // Delete associated project to this organisation
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
    // Delete contractor field from the associated projects before deleting contractor
    $projectDao->deleteContractorData($id);

    $contractorDao->deleteContractor($id);
    header("Location: contractors.php");
    exit();
    break;

  case 'project':
    // When a project is deleted, the related organisation don't get deleted, but this project will be deleted from the contractor.     

    // Delete project
    $projectDao->deleteProject($id);
    header("Location: projects.php");
    exit();
    break;

  default:
    echo "ERROR GET/POST for CRUD must be made with a mode!";
    break;
}
