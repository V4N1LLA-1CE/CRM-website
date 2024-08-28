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
  <title>Projects</title>
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
              <a class="nav-link active" href="./projects.php">Projects</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="./contractors.php">Contractors</a>
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
</body>

<!-- Button trigger modal -->
<button type="button" class="btn btn-dark mx-5 py-2 mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add New Project +
</button>


<main class="m-5 px-5 py-3 shadow overflow-auto">
  <h1>Projects</h1>
  <table id="userTable" class="display border">
    <thead>
      <tr>
        <th>Project ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Technique Required</th>
        <th>Due Date</th>
        <th>Project Management Tool Link</th>
        <th>Organisation</th>
        <th>Contractor</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include './database/connection.php';
      global $projectDao;
      global $contractorDao;
      global $orgDao;
      $projects = $projectDao->getProjects();
      $contractors = $contractorDao->getContractors();
      $orgs = $orgDao->getOrgs();

      // hashmap of organisations
      $orgMap = [];
      foreach ($orgs as $org) {
        $orgMap[$org['id']] = $org['name'];
      }

      // hashmap of contractors
      $contractorMap = [];
      foreach ($contractors as $contractor) {
        $contractorMap[$contractor['id']] = ($contractor['first_name'] . " " . $contractor['last_name']);
      }

      foreach ($projects as $project) {
        // check if id exists in both project and map
        $orgName = (isset($project['org_id']) && isset($orgMap[$project['org_id']]) ? $orgMap[$project['org_id']] : "--");
        $contractorName = (isset($project['contractor_id']) && isset($contractorMap[$project['contractor_id']]) ? $contractorMap[$project['contractor_id']] : "--");

      ?>
        <tr>
          <td><?= $project['id']  ?></td>
          <td><?= $project['name'] ?></td>
          <td><?= $project['desc'] ?></td>
          <td><?= $project['technique_required'] ?></td>
          <td><?= $project['due_date'] ?></td>
          <td><?= $project['pmt_link'] ?></td>
          <td><?= $orgName ?></td>
          <td><?= $contractorName  ?></td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <a href="edit-page.php?id2edit=<?= $project['id'] ?>&mode=project">
                <button class="btn btn-secondary">
                  <img src="./assets/img/edit.svg" alt=" edit icon" width="20" />
                </button>
              </a>
              <a href="delete.php?id2delete=<?= $project['id'] ?>&mode=project">
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add a New Project</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-5">
        <form action="add.php" method="POST">

          <div class="mb-3">
            <label for="name" class="form-label">Project Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
          </div>
          <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <input type="text" class="form-control" id="desc" required name="description">
          </div>
          <div class="mb-3">
            <label for="treq" class="form-label">Technique Required</label>
            <input type="text" class="form-control" id="treq" name="technique_required" required>
          </div>
          <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" required>
          </div>
          <div class="mb-3">
            <label for="pmt_link" class="form-label">Project Management Tool Link</label>
            <input type="url" class="form-control" id="pmt_link" name="pmt_link" required>
          </div>
          <div class="mb-3">
            <label for="org" class="form-label">Organisation</label>
            <select class="form-select" id="org" name="org_id" required>
              <option selected disabled>Select Organisation</option>

              <?php foreach ($orgs as $org) { ?>
                <option value="<?= $org['id'] ?>"><?= ($org['name']) ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="contractor" class="form-label">Contractor</label>
            <select class="form-select" id="contractor" name="contractor_id" required>
              <option selected disabled>Select Organisation</option>
              <?php foreach ($contractors as $contractor) { ?>
                <option value="<?= $contractor['id'] ?>"><?= ($contractor['first_name'] . " " . $contractor['last_name']) ?></option>
              <?php } ?>
            </select>
          </div>


          <button type="submit" class="btn btn-dark">Add Project</button>
          <input type="hidden" name="mode" value="project">

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

</html>
