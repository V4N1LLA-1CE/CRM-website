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
  <link rel="stylesheet" href="lib/datatables/dataTables.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/datatable.css" />

  <title>Contacts</title>
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
              <a class="nav-link" href="./organisations.php">Organisations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./users.php">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="./contacts.php">Contacts</a>
            </li>
          </ul>
          <a href="./logout.php" class="nav-link"><button class="btn btn-danger">Logout</button></a>
        </div>
      </div>
    </nav>
  </header>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-dark mx-5 py-2 mt-5 " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Manage #
  </button>


  <main class="m-5 px-5 py-3 shadow overflow-auto">
    <h1>Contacts</h1>
    <table id="userTable" class="display border">
      <thead>
        <tr>
          <th>Contact ID</th>
          <th>FirstName</th>
          <th>LastName</th>
          <th>Phone</th>
          <th>Message</th>
          <th>Replied</th>
          <th>Organisation</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include './database/connection.php';
        global $contactDao;
        global $orgDao;

        $orgs = $orgDao->getOrgs();
        $contacts = $contactDao->getContacts();

        // make a map
        $map = [];
        foreach ($orgs as $org) {
          $map[$org['id']] = $org['name'];
        }

        foreach ($contacts as $contact) {
          // find corresponding organisation name to contact
          $orgName = isset($contact['org_id']) && isset($map[$contact['org_id']]) ? $map[$contact['org_id']] : "--";
        ?>

          <tr>
            <td><?= $contact['id']  ?></td>
            <td><?= $contact['first_name'] ?></td>
            <td><?= $contact['last_name'] ?></td>
            <td><?= $contact['phone_number'] ?></td>
            <td class="overflow-auto"><?= $contact['message'] ?></td>
            <td><?= ($contact['replied'] === 1 ? "✅" : "❌") ?></td>
            <td><?= $orgName ?></td>

            <td class="">
              <div class="d-flex align-items-center gap-2">
                <a href="delete.php?id2delete=<?= $contact['id'] ?>&mode=contact">
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
  <div class="modal fade mt-5" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Manage Replies and Organisation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="modify.php" method="POST">
            <input type="hidden" value="contact" name="mode" />
            <div class="mb-3">
              <select id="select" class="form-select" name="id2edit">
                <option selected disabled>Select Contact</option>

                <?php foreach ($contacts as $contact) { ?>
                  <option value="<?= $contact['id'] ?>"><?= ($contact['first_name'] . " " . $contact['last_name']) ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-check form-switch mt-4">
              <input name="replied" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
              <label for="flexSwitchCheckDefault" class="form-check-label">Replied?</label>
            </div>
            <div class="my-4 ">
              <select id="select" class="form-select" name="organisation">
                <option selected disabled>Select Organisation</option>
                <?php foreach ($orgs as $org) { ?>
                  <option value="<?= $org['id'] ?>"> <?= $org['name'] ?> </option>
                <?php } ?>
              </select>
            </div>

            <button class="btn btn-dark" type="submit">Confirm Changes</button>
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
