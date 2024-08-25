<?php
$rows = 3;
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Users</title>
  <link rel="stylesheet" href="lib/datatables/dataTables.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <header>
    <nav class="navbar bg-dark border-bottom border-body navbar-expand-lg" data-bs-theme="dark">
      <div class="container-fluid gap-3">
        <img src="./assets/img/b2b-logo.svg" width="220" alt="Buiness logo" />
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" aria-current="page" href="#">Dashboard</a>
            <a class="nav-link" href="#">Projects</a>
            <a class="nav-link" href="#">Contractors</a>
            <a class="nav-link" href="#">Organisations</a>
            <a class="nav-link active" href="#">Users</a>
            <a class="nav-link" href="#">Contact Us</a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main class="m-5 px-5 py-3 rounded-5 shadow">
    <h1>Users</h1>
    <table id="userTable" class="display border">
      <thead>
        <tr>
          <th>User ID</th>
          <th>Email</th>
          <th>Password</th>
          <th>First Name</th>
          <th>Last Name</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($r = 1; $r <= $rows; $r++) { ?>
          <tr>
            <td><?= $r ?></td>
            <td>xxx@gmail.com</td>
            <td>xxx</td>
            <td>xxx</td>
            <td>xxx</td>
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
