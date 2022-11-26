<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/home_bs5.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->

</head>

<body class="bg-dark d-flex flex-column">

  <!-- Carousel (Image Slider) -->
  <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
      <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
      <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
      <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img src="images/slide_1.jpg" class="w-100 d-block" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h3>Title</h3>
          <p>Description</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/slide_2.jpg" class="w-100 d-block" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h3>Title</h3>
          <p>Description</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/slide_3.jpg" class="w-100 d-block" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h3>Title</h3>
          <p>Description</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Header - Navigation Bar -->
  <?php
  $IPATH = $_SERVER['DOCUMENT_ROOT'] . "/PHPPrac/Web/";
  include($IPATH . "html/navigation.html");
  ?>


  <!-- Cards - Top Items -->
  <div class="container container-fluid">

    <h3 class="main-title h3 w-100 d-block text-light text-center">
      <span class="bg-dark">TRENDING PRODUCTS</span>
    </h3>

    <div class="row row-cols-4 g-4">
      <div class="col">
        <div class="card">
          <img src="images/car_img_1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="images/slide_1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="images/slide_2.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This </p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="images/slide_3.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This</p>
          </div>
        </div>
      </div>
    </div>

  </div>


  <!-- Footer -->
  <?php
  include($IPATH . "html/footer.html");
  ?>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script> -->
</body>

</html>