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
  <title>Organisations</title>
  <link rel="stylesheet" href="lib/datatables/dataTables.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/datatable.css" />
</head>

<body style="background-image: url('./assets/img/white-bg.jpg');">
  <header>
    <nav class="navbar navbar-expand-lg" style="background-color: #e6f0f1;">
      <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="./assets/img/b2b-logo.svg" alt="b2b-logo" width="220" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="./dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./projects.php">Projects</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="./contractors.php">Contractors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./organisations.php">Organisations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="./users.php">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./contacts.php">Contacts</a>
            </li>
          </ul>
          <a href="./logout.php" class="nav-link"><button class="btn btn-danger">Logout</button></a>
        </div>
      </div>
    </nav>
  </header>


  <!-- Button trigger modal -->
  <button type="button" class="btn btn-dark mx-5 py-2 mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add New Organisation +
  </button>

  <main class="m-5 px-5 py-3 shadow overflow-auto">
    <h1>Organisations</h1>
    <table id="userTable" class="display border">
      <thead>
        <tr>
          <th>Organisation ID</th>
          <th>Name</th>
          <th>Website</th>
          <th>Description</th>
          <th>Industry</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include './database/connection.php';
        global $orgDao;
        $orgs = $orgDao->getOrgs();
        foreach ($orgs as $org) {
        ?>
          <tr>
            <td><?= $org['id']  ?></td>
            <td><?= $org['name'] ?></td>
            <td><?= $org['website'] ?></td>
            <td><?= $org['desc'] ?></td>
            <td><?= $org['industry'] ?></td>
            <td>
              <div class="d-flex align-items-center gap-2">
                <a href="">
                  <button class="btn btn-secondary">
                    <img src="./assets/img/edit.svg" alt=" edit icon" width="20" />
                  </button>
                </a>
                <a href="#">
                  <button class="btn btn-danger px-3">X</button>
                </a>
              </div>
            </td>
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add a New Organisation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5">
          <form action="add-org.php" method="POST">

            <div class="mb-3">
              <label for="name" class="form-label">Organisation Name</label>
              <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
              <label for="website" class="form-label">Website</label>
              <input type="text" class="form-control" id="website" required name="website">
            </div>
            <div class="mb-3">
              <label for="desc" class="form-label">Description</label>
              <input type="text" class="form-control" id="desc" name="description" required>
            </div>
            <div class="mb-3">
              <label for="industry" class="form-label">Industry</label>
              <input type="text" class="form-control" id="industry" name="industry" required>
            </div>

            <button type="submit" class="btn btn-dark">Add Organisation</button>
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
