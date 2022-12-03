<?php
include 'includes/session.php';

if (isset($_POST['bt-login'])) {

  $conn = $pdo->open();

  // if (empty($_POST['user-email'] || empty($_POST['user-passwd']))) {
  //   $_SESSION['error'] = "Email or Password is Empty";
  //   // header('location: signin.php');
  // }
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
        header('location: admin/dashboard.php');
      } else if ($row['ac_type'] == 0) {
        $_SESSION['user'] = $row['user_id'];
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




<?php include 'includes/header.php'; ?>

<body class="bg-dark d-flex flex-column">
  <main class="container d-flex w-50 h-100 my-4 py-5 px-4 align-items-center justify-content-center bg-secondary">
    <!-- <div class="card p-5"> -->

    <form method="post">

      <div class="mb-3">
        <label for="user-email" class="form-label">Email address</label>
        <input type="email" name="user-email" class="form-control" id="user-email" aria-describedby="emailHelp" required>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>

      <div class="mb-3">
        <label for="user-passwd" class="form-label">Password</label>
        <input type="password" name="user-passwd" class="form-control" id="user-passwd" required>
      </div>

      <div class="mb-3 text-center">
        <button type="submit" name="bt-login" class="d-block btn btn-primary w-50 mx-auto">Submit</button>
        <a href="password_forgot.php">I forgot my password</a><br>
        <a href="signup.php" class="text-center">Register a new membership</a><br>
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
  </main>


  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/scripts.php'; ?>
</body>

</html>