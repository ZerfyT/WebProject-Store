<?php
// Session Start
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <title>SignIn</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="../css/home_bs5.css"> -->

  <style>
    header {
      position: initial;
    }
  </style>

</head>

<body class="d-flex flex-column">


  <main class="container w-25 h-100 my-4 p-5">
    <h1 class="h1 text-center">Admin Login</h1>
    <!-- <div class="card p-5"> -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="mb-3">
        <label for="admin-name" class="form-label">Username</label>
        <input type="text" name="admin-name" class="form-control" id="admin-name">
      </div>
      <div class="mb-3">
        <label for="admin-passwd" class="form-label">Password</label>
        <input type="password" name="admin-passwd" class="form-control" id="admin-passwd">
      </div>
      <button type="submit" name="bt-login" class="d-block btn btn-primary w-50 mx-auto">Login</button>
    </form>
    <!-- </div> -->

  </main>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="../bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<!-- PHP Admin Login ------------------------------------------------------------------------------------ -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  require '../php/connection.php';

  if (isset($_POST['bt-login'])) {

    if (empty($_POST['admin-name']) || empty($_POST['admin-passwd'])) {
      die("ERROR: Username or Password is empty.");
    }
    $admin_name = $_POST["admin-name"];
    $admin_passwd = $_POST["admin-passwd"];

    $sql = "SELECT `password` FROM `admin` WHERE `username` LIKE '$admin_name'";
    $result = $conn->query($sql);

    if ($result->num_rows != 1) {
      die('ERROR: Username did not match.');
    }

    $row = $result->fetch_assoc();
    $passwd = $row['password'];
    if (!hash_equals($admin_passwd, $passwd)) {
      die('ERROR: Password did not match.');
    }
    echo "<p>Login Successful : $admin_name , $admin_passwd , $passwd </p>";

    // Set session variables
    $_SESSION["admin-name"] = "$admin_name";
    $_SESSION["admin-is-logged"] = true;
    echo "Session variables are set.";

    // Redirect to Dashboard Page
    header('Location: dashboard.php');
    exit;
  }
}
?>