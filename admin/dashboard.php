<?php
// Session Start
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


  <style>
    .card:hover {
      background-color: var(--bs-gray-200);
      border-color: var(--bs-gray-600);
      box-shadow: 1px 1px 8px rgba(63, 63, 63, 0.678);
      ;
      transition: 0.3s;
    }
  </style>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>

    <div class="container p-5 m-5">

      <!-- Print the SESSION -->
      <?php
      print_r($_SESSION);
      ?>

      <div class="row m-4">

        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Insert New Data</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <a href="#" class="btn btn-success px-3">INSERT</a>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">View All Data</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <a href="#" class="btn btn-info px-3">SELECT</a>
            </div>
          </div>
        </div>


        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Delete An Item</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <a href="#" class="btn btn-danger px-3">DELETE</a>
            </div>
          </div>
        </div>

      </div>

      <div class="row m-4">

      <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">View All Data</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <a href="#" class="btn btn-info px-3">SELECT</a>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">View All Data</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <a href="#" class="btn btn-info px-3">SELECT</a>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">View All Data</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <a href="#" class="btn btn-info px-3">SELECT</a>
            </div>
          </div>
        </div>

    </div>

  </main>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>