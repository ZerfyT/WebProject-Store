<?php
include 'includes/session.php';

if (isset($_POST['bt-login'])) {

  $conn = $pdo->open();

  $email = $_POST['user-email'];
  $password = $_POST['user-passwd'];

  $stmt = $conn->prepare("SELECT * FROM user WHERE email=:em");
  $stmt->execute(['em' => $email]);
  // $row = $stmt->fetch();

  if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch();

    if (hash_equals($password, $row['password'])) {
      if ($row['ac_type'] == 1) {
        $_SESSION['admin'] = $row['user_id'];
        $_SESSION['login-success'] = 1;
        header('location: admin/admin.php');

      } else if ($row['ac_type'] == 0) {
        $_SESSION['user'] = $row['user_id'];
        $_SESSION['login-success'] = 1;
        header('location: index.php');
      }
    } else {
      $_SESSION['error'] = "Incorrect Password";
    }
  } else {
    $_SESSION['error'] = "Email not found";
  }
  $pdo->close();
  // header('location: signin.php');
} else {
}

// if (isset($_SESSION['user'])) {
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Hardware Store</title>
  <?php include 'includes/header.php'; ?>
</head>

<body class="d-flex flex-column justify-content-between g-3 w-100">

  <!-- Header - Navigation Bar -->
  <?php include "includes/navbar_dark.php"; ?>

  <div class="container my-5 py-5">
    <div class="row justify-content-center">
      <div class="col-xl-5 col-md-8">
        <h3 class="text-center m-4">LOGIN AS EXISTING CUSTOMER</h3>
        <form method="post" class="bg-white  rounded-5 shadow-5-strong p-5">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="user-email" class="form-control" name="user-email" required />
            <label class="form-label" for="user-email">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="user-passwd" class="form-control" name="user-passwd" required />
            <label class="form-label" for="user-passwd">Password</label>
          </div>

          <!-- 2 column grid layout for inline styling -->
          <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                <label class="form-check-label" for="form1Example3">
                  Remember me
                </label>
              </div>
            </div>

            <div class="col text-center">
              <!-- Simple link -->
              <a href="#!">Forgot password?</a>
            </div>
          </div>

          <!-- Submit button -->
          <div class="text-lg-start pt-2">
            <button type="submit" name="bt-login" class="btn btn-warning btn-block">Sign in</button>
            <p class="text-center small fw-bold mt-2 pt-1">Don't have an account? <a href="signup.php" class="link-danger">Register</a></p>
          </div>

          <div class="my-2">
            <?php
            if (isset($_SESSION['error'])) {
              echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
              unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
              echo '<div class="alert alert-success" role="alert">' . $_SESSION['error'] . '</div>';
              unset($_SESSION['success']);
            }
            ?>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/scripts.php'; ?>
</body>

</html>