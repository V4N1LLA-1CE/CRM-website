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
      <nav></nav>
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
            <td><?=$r ?></td>
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
      $(document).ready(function () {
        $("#userTable").DataTable();
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
