<?php
session_start();

// check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Users</title>
  <link rel="stylesheet" href="lib/datatables/dataTables.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/users.css" />
</head>

<body style="background-image: url('./assets/img/white-bg.jpg');">
  <header>
    <nav class="navbar bg-dark border-bottom border-body navbar-expand-lg" data-bs-theme="dark">
      <div class="container-fluid gap-3">
        <a href="/">
          <img src="./assets/img/b2b-logo.svg" width="220" alt="Buiness logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" href="./dashboard.php">Dashboard</a>
            <a class="nav-link" href="./projects.php">Projects</a>
            <a class="nav-link" href="./contractors.php">Contractors</a>
            <a class="nav-link" href="./organisations.php">Organisations</a>
            <a class="nav-link active" href="./users.php">Users</a>
            <a class="nav-link" href="./contact.php">Contact Us</a>
          </div>
          <a href="./logout.php"><button class="btn btn-danger">Logout</button></a>
        </div>
      </div>
    </nav>
  </header>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-dark mx-5 py-2 mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create New User +
  </button>

  <main class="m-5 px-5 py-3 shadow overflow-auto">
    <h1>Users</h1>
    <table id="userTable" class="display border">
      <thead>
        <tr>
          <th>User ID</th>
          <th>Email</th>
          <th>Password</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include './database/connection.php';
        global $userDao;
        $users = $userDao->getUsers();
        foreach ($users as $user) {
        ?>
          <tr>
            <td><?= $user['id']  ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['password'] ?></td>
            <td><?= $user['first_name'] ?></td>
            <td><?= $user['last_name'] ?></td>
            <td class="d-flex justify-content-center align-items-center gap-3"><a href="delete-user.php?id2delete=<?= $user['id'] ?>"><button class="btn btn-danger px-3">X</button></a><a href="edit-user.php?id2edit=<?= $user['id'] ?>"><button class="btn btn-secondary"><img src="./assets/img/edit.svg" alt=" edit icon" width="20" /></button></a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create New User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5">
          <form action="add-user.php" method="POST">

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" required name="password">
            </div>
            <div class="mb-3">
              <label for="firstname" class="form-label">Firstname</label>
              <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="mb-3">
              <label for="lastname" class="form-label">Lastname</label>
              <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>

            <button type="submit" class="btn btn-dark">Create account</button>
          </form>

        </div>
      </div>
    </div>
  </div>

  <!-- jquery -->
  <script src="lib/jquery/jquery-3.7.1.min.js"></script>

  <!-- datatables -->
  <script src="lib/datatables/dataTables.js"></script>

  <script>
    $(document).ready(function() {
      $("#userTable").DataTable();
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
