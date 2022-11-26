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
    header{
      position: initial;
    }
  </style>
  
</head>

<body class="d-flex flex-column">

    
  <main class="container w-25 h-100 my-4 p-5">
    <h1 class="h1 text-center">Admin Login</h1>
    <!-- <div class="card p-5"> -->
        <form action="" method="post">
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="../bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>