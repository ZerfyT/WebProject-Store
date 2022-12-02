<?php include 'includes/session.php'; ?>
<?php
if (isset($_SESSION['user'])) {
    header('location: cart_view.php');
}
?>
<?php include 'includes/header.php'; ?>

<body class="bg-dark d-flex flex-column">
<main class="container d-flex w-50 h-100 my-4 py-5 px-4 align-items-center justify-content-center bg-secondary">
    <!-- <div class="card p-5"> -->

    <?php
        if (isset($_SESSION['error'])) {
            echo "
          <div class='callout callout-danger text-center'>
            <p>" . $_SESSION['error'] . "</p> 
          </div>
        ";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo "
          <div class='callout callout-success text-center'>
            <p>" . $_SESSION['success'] . "</p> 
          </div>
        ";
            unset($_SESSION['success']);
        }
        ?>


        <form action="userLogin.php" method="post">
            <div class="mb-3">
              <label for="user-email" class="form-label">Email address</label>
              <input type="email" name="user-email" class="form-control" id="user-email" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="user-passwd" class="form-label">Password</label>
              <input type="password" name="user-passwd" class="form-control" id="user-passwd">
            </div>
            <!-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" name="bt-login" class="d-block btn btn-primary w-50 mx-auto">Submit</button>
          </form>
    <!-- </div> -->
 
  </main>




    <div class="login-box">
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="verify.php" method="POST">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
                    </div>
                </div>
            </form>
            <br>
            <a href="password_forgot.php">I forgot my password</a><br>
            <a href="signup.php" class="text-center">Register a new membership</a><br>
            <a href="index.php"><i class="fa fa-home"></i> Home</a>
        </div>
    </div>

    <?php include 'includes/scripts.php' ?>
</body>

</html>