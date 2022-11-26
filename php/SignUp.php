<!doctype html>
<html lang="en">

<head>
    <title>SignUp</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/home_bs5.css">

    <style>
        header {
            position: initial;
        }
    </style>

</head>

<body class="bg-dark d-flex flex-column">

    <?php
    $IPATH = $_SERVER['DOCUMENT_ROOT'] . "/PHPPrac/Web/";
    include($IPATH . "html/navigation.html");
    ?>


    <main class="container d-flex w-25 h-100 my-4 py-5 px-4 align-items-center justify-content-center text-light">
        <!-- <div class="card p-5"> -->
        <form action="userRegister.php" method="post" class="w-100">

            <div class="mb-3">
                <label for="user-name" class="form-label">Full Name</label>
                <input type="text" name="user-name" class="form-control w-100" id="user-name">
            </div>

            <div class="mb-3">
                <label for="user-email" class="form-label">Email address</label>
                <input type="email" name="user-email" class="form-control w-100" id="user-email">
            </div>

            <div class="mb-3">
                <label for="user-passwd" class="form-label">Password</label>
                <input type="password" name="user-passwd" class="form-control w-100" id="user-passwd">
            </div>

            <div class="mb-3">
                <label for="user-tp" class="form-label">Telephone Number</label>
                <input type="number" name="user-tp" class="form-control w-100" id="user-tp">
            </div>

            <div class="mb-3">
                <label for="user-address" class="form-label">Address</label>
                <input type="text" name="user-address" class="form-control w-100" id="user-address">
            </div>

           
            <!-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" name="bt-register" class="d-block btn btn-primary w-50 mx-auto">Sign Up</button>
        </form>
        <!-- </div> -->

    </main>


    <?php
    include($IPATH . "html/footer.html");
    ?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>