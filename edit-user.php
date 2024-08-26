<?php
include './database/connection.php';
global $userDao;
$id2edit = intval($_GET['id2edit']);
$users = $userDao->getUsers();
$fullname;

foreach ($users as $user) {
  if ($id2edit === $user['id']) {
    $fullname = $user['first_name'] . " " . $user['last_name'];
    break;
  }
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
  <a href=" ./users.php" class="mb-4"><button class="btn btn-dark">Back to Users</button></a>
  <form action="./modify-user.php" method="POST" class="d-flex flex-column gap-4 p-5  shadow">
    <div class="align-self-center d-flex flex-column justify-content-center align-items-center mb-4 ">
      <img src="assets/img/admin.svg" alt="admin profile" width="60">
      <h5><?= $fullname ?></h5>
    </div>

    <!-- display field for id -->
    <div><input name="id2edit" class="form-control" type="hidden" value="<?= $id2edit ?>"></div>

    <div><input value="<?= $user['email'] ?>" class="form-control" type="email" name="email" placeholder="Email" required /></div>
    <div><input value="<?= $user['password'] ?>" type="text" name="password" class="form-control" placeholder="Password" required /></div>
    <div><input value="<?= $user['first_name'] ?>" type="text" class="form-control" name="firstname" placeholder="Firstname" required /></div>
    <div><input value="<?= $user['last_name'] ?>" type="text" name="lastname" class="form-control" placeholder="Lastname" required /></div>
    <button type="submit" class="btn btn-dark">Confirm Changes</button>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

</html>
