<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-image: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)), url('./assets/img/white-bg.jpg');
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-position: center;
      color: #333;
    }

    .navbar {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand img {
      transition: transform 0.3s;
    }

    .navbar-brand img:hover {
      transform: scale(1.1);
    }

    .nav-link {
      transition: color 0.3s;
    }

    .nav-link:hover {
      color: #007bff;
    }

    .btn-danger {
      transition: background-color 0.3s, transform 0.3s;
    }

    .btn-danger:hover {
      background-color: #dc3545;
      transform: scale(1.05);
    }
  </style>
</head>

<body>
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
              <a class="nav-link active" aria-current="page" href="./dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./projects.php">Projects</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./contractors.php">Contractors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./organisations.php">Organisations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./users.php">Users</a>
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

  <div class="w-100  d-flex justify-content-center align-items-center border" style="height: 100vh !important;">
    <h1 class="mb-5">Welcome To Your Dashboard!</h1>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
