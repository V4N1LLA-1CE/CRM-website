<?php
include './database/connection.php';
global $userDao;
global $orgDao;
global $contractorDao;

$id2edit = intval($_GET['id2edit']);
$mode = $_GET['mode'];

$display;
$backlink;

switch ($mode) {
  case 'user':
    $users = $userDao->getUsers();

    foreach ($users as $user) {
      if ($id2edit === $user['id']) {
        $display = $user['first_name'] . " " . $user['last_name'];
        break;
      }
    }
    $img = "assets/img/admin.svg";
    $backlink = "./users.php";
    break;

  case 'org':
    $orgs = $orgDao->getOrgs();

    foreach ($orgs as $org) {
      if ($id2edit === $org['id']) {
        $display = $org['name'];
        break;
      }
    }
    $img = "assets/img/organisation.svg";
    $backlink = "./organisations.php";
    break;

  case 'contractor':
    $contractors = $contractorDao->getContractors();
    $backlink = "./contractors.php";
    $img = $_GET['contractor-img'];

    foreach ($contractors as $contractor) {
      if ($contractor['id'] === $id2edit) {
        $display = $contractor['first_name'] . " " . $contractor['last_name'];
      }
    }

    break;

  default:
    echo "You must use a mode with GET request!";
}


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="assets/css/edit-user.css" rel="stylesheet""/>
</head>

<body class=" justify-content-center d-flex align-items-center flex-column">
  <a href=<?= $backlink ?> class="mb-4"><button class="btn btn-dark">Back</button></a>
  <form action="./modify.php" method="POST" class="d-flex flex-column gap-4 p-5  shadow" enctype="multipart/form-data">
    <div class="align-self-center d-flex flex-column justify-content-center align-items-center mb-4 ">
      <img class="<?= ($mode === 'contractor' ? 'rounded-circle' : '') ?>" src=<?= $img ?> alt="display image" width="60">
      <h5 class="mt-2"><?= $display ?></h5>
    </div>

    <!-- field for hidden posts (id and mode)-->
    <input name="id2edit" class="form-control" type="hidden" value="<?= $id2edit ?>">
    <input name="mode" class="form-control" type="hidden" value="<?= $mode ?>">

    <?php if ($mode === 'user') { ?>
      <div><input value="<?= $user['email'] ?>" class="form-control" type="email" name="email" placeholder="Email" required /></div>
      <div><input value="<?= $user['password'] ?>" type="text" name="password" class="form-control" placeholder="Password" required /></div>
      <div><input value="<?= $user['first_name'] ?>" type="text" class="form-control" name="firstname" placeholder="Firstname" required /></div>
      <div><input value="<?= $user['last_name'] ?>" type="text" name="lastname" class="form-control" placeholder="Lastname" required /></div>
    <?php } elseif ($mode === 'org') { ?>
      <div><input value="<?= $org['name'] ?>" class="form-control" type="text" name="name" placeholder="Name" required /></div>
      <div><input value="<?= $org['website'] ?>" type="text" name="website" class="form-control" placeholder="Website" required /></div>
      <div><input value="<?= $org['desc'] ?>" type="text" class="form-control" name="description" placeholder="Description" required /></div>
      <div><input value="<?= $org['industry'] ?>" type="text" name="industry" class="form-control" placeholder="Industry" required /></div>
    <?php } elseif ($mode === 'contractor') { ?>
      <div class="d-flex flex-column gap-3">
        <label for="file">Upload Profile Image</label>
        <input type="file" id="file" name="file" />
      </div>
      <div><input value="<?= $contractor['first_name'] ?>" class="form-control" type="text" name="firstname" placeholder="First Name" required /></div>
      <div><input value="<?= $contractor['last_name'] ?>" class="form-control" type="text" name="lastname" placeholder="Last Name" required /></div>
      <div><input value="<?= $contractor['specialisation'] ?>" class="form-control" type="text" name="specialisation" placeholder="Specialisation" required /></div>
      <div><input value="<?= $contractor['email'] ?>" class="form-control" type="email" name="email" placeholder="Email" required /></div>
      <div><input value="<?= $contractor['phone_number'] ?>" class="form-control" pattern="0\d{9}" type="tel" name="phone" placeholder="Phone" required /></div>
      <div><input value="<?= $contractor['address'] ?>" class="form-control" type="text" name="address" placeholder="Address" required /></div>
    <?php } ?>

    <button type="submit" class="btn btn-dark">Confirm Changes</button>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

</html>
