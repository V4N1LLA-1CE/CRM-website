<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/login.css" />
  </head>
  <body
    class="bg-light d-flex justify-content-center align-items-center flex-column"
  >
    <div
      class="container d-flex justify-content-center align-items-center flex-column"
    >
      <a href="/" class="link-underline-dark"
        ><button
          class="btn btn-dark d-flex justify-content-center align-items-center gap-2 mb-5"
        >
          <img src="assets/img/back-arrow.svg" alt="back-arrow" width="20" />
          <div>Back to Home</div>
        </button></a
      >
      <div class="col-md-4 shadow p-5 bg-light loginForm">
        <div
          class="m-5 d-flex flex-column justify-content-center align-items-center"
        >
          <img src="assets/img/lock.svg" alt="lock icon" width="100" />
          <h2 class="">Login</h2>
        </div>
        <form action="/auth.php" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-control"
              required
            />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
              type="password"
              id="password"
              name="password"
              class="form-control"
              required
            />
          </div>
          <button type="submit" class="btn btn-dark w-100 mt-3">Login</button>
        </form>
      </div>
    </div>
    <script>
      // check for "error = true" in query param (?error=true)
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get("error") === "failed") {
        // trigger alert if login failed
        alert("Invalid email or password. Please try again.");
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
