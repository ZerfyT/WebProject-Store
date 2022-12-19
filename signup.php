<?php include 'includes/session.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hardware Store</title>
    <?php include 'includes/header.php'; ?>
    <style>
    </style>
</head>
<?php
if (isset($_SESSION['user'])) {
    header('location: cart_view.php');
}

?>

<body class="hold-transition register-page">
    <!-- Header - Navigation Bar -->
    <?php include "includes/navbar_dark.php"; ?>

    <div class="container m-5 p-5 register-box d-flex justify-content-center">
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
        <div class="register-box-body w-50">
            <p class="login-box-msg">Register a new membership</p>

            <form action="register.php" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="user-name" placeholder="Full Name" value="<?php echo (isset($_SESSION['user-name'])) ? $_SESSION['user-name'] : '' ?>" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="user-email" placeholder="Email" value="<?php echo (isset($_SESSION['user-email'])) ? $_SESSION['user-email'] : '' ?>" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="user-passwd" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="number" class="form-control" name="user-tp" placeholder="Telephone Number">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="user-address" placeholder="Address">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" name="bt-signup"><i class="fa fa-pencil"></i> Sign Up</button>
                    </div>
                </div>
            </form>
            <br>
            <a href="login.php">I already have a membership</a><br>
            <a href="index.php"><i class="fa fa-home"></i> Home</a>
        </div>
    </div>

    <?php include 'includes/scripts.php' ?>
    <?php include 'includes/footer.php' ?>
</body>

</html>