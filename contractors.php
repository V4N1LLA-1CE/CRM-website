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
  <title>Contractors</title>
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
              <a class="nav-link active " href="./contractors.php">Contractors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="./organisations.php">Organisations</a>
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

  <main class="m-5 px-5 py-3 shadow overflow-auto">
    <h1>Contractors</h1>
    <table id="userTable" class="display border">
      <thead>
        <tr>
          <td>Profile</td>
          <th>Contractor ID</th>
          <th>Firstname</th>
          <th>LastName</th>
          <th>Specialisation</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include './database/connection.php';
        global $contractorDao;
        $contractors = $contractorDao->getContractors();
        foreach ($contractors as $contractor) {

          // define extensions
          $extensions = ['.jpg', '.jpeg', '.png', '.gif'];
          $path = "./assets/img/contractor_profiles/" . $contractor['id'];

          // check if file exists
          foreach ($extensions as $ext) {
            $pathToCheck = $path . $ext;
            if (file_exists($pathToCheck)) {
              $path =  $pathToCheck;
              break;
            }
          }

          // if there is still no file found, use default img
          if (!file_exists($path)) {
            $path = "./assets/img/contractor_profiles/default.svg";
          }

        ?>
          <tr>
            <td>
              <div class="d-flex align-items-center justify-content-center"><a href="edit-page.php"><img src="<?= $path ?>" alt="pfp" width="75" height="75" class="rounded-circle "></a></div>
            </td>
            <td><?= $contractor['id']  ?></td>
            <td><?= $contractor['first_name'] ?></td>
            <td><?= $contractor['last_name'] ?></td>
            <td><?= $contractor['specialisation'] ?></td>
            <td><?= $contractor['email'] ?></td>
            <td><?= $contractor['phone_number'] ?></td>
            <td><?= $contractor['address'] ?></td>
            <td>
              <div class="d-flex align-items-center gap-2">
                <a href="edit-page.php">
                  <button class="btn btn-secondary">
                    <img src="./assets/img/edit.svg" alt=" edit icon" width="20" />
                  </button>
                </a>
                <a href="delete.php?id2delete=<?= $contractor['id'] ?>&mode=contractor">
                  <button class="btn btn-danger px-3">X</button>
                </a>
              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>

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
