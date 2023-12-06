<?php include 'includes/session.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hardware Store</title>
    <?php include 'includes/header.php'; ?>
    <style>
        header nav.navbar {
            position: absolute;
            top: 0;
            left: 0;
            /* --mdb-bg-opacity: 1; */
            /* background-color: transparent; */
        }

        .carousel-item .mask {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>

    <!-- Header - Navigation Bar -->
    <?php include "includes/navbar.php"; ?>

    <!-- Carousel wrapper -->
    <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active"></li>
            <li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
            <li data-mdb-target="#introCarousel" data-mdb-slide-to="2"></li>
        </ol>

        <!-- Inner -->
        <div class="carousel-inner">
            <!-- Single item -->
            <div class="carousel-item active">
                <div class="mask">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white text-center">
                            <h1 class="fw-bolder">Building Maintenance</h1>
                            <a class="btn btn-outline-white btn-lg m-2" href="" role="button" rel="nofollow"
                                target="_blank">View Products</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
                <div class="mask">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white text-center">
                            <h1 class="fw-bolder">Fabricating And Machining</h1>
                            <a class="btn btn-outline-white btn-lg m-2" href="" role="button" rel="nofollow"
                                target="_blank">View Products</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
                <!-- <div class="mask" style="
                background: linear-gradient(
                  45deg,
                  rgba(29, 236, 197, 0.7),
                  rgba(91, 14, 214, 0.7) 100%
                );
              "> -->
                <div class="mask">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white text-center">
                            <h1 class="fw-bolder">Power Tools Accessories</h1>
                            <a class="btn btn-outline-white btn-lg m-2" href="" target="_blank" role="button">View
                                Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <a class="carousel-control-prev" href="#introCarousel" role="button" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#introCarousel" role="button" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Carousel wrapper -->


    <!-- Card Items -->
    <div class="text-center container py-2">
        <h4 class="mt-4 mb-5"><strong>TRENDING PRODUCTS</strong></h4>

        <div class="row">

            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                        data-mdb-ripple-color="light">
                        <img src="images/slide_6.jpg" class="w-100" />
                        <a href="#">
                            <div class="mask">
                                <div class="d-flex justify-content-start align-items-end h-100">
                                    <h5><span class="badge bg-primary ms-2">New</span></h5>
                                </div>
                            </div>
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">
                        <a href="#" class="text-reset">
                            <h5 class="card-title mb-3">Product name</h5>
                        </a>
                        <a href="" class="text-reset">
                            <p>Category</p>
                        </a>
                        <h6 class="mb-3">LKR 1700</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                        data-mdb-ripple-color="light">
                        <img src="images/slide_5.jpg" class="w-100" />
                        <a href="#!">
                            <div class="mask">
                                <div class="d-flex justify-content-start align-items-end h-100">
                                    <h5><span class="badge bg-success ms-2">Eco</span></h5>
                                </div>
                            </div>
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">
                        <a href="" class="text-reset">
                            <h5 class="card-title mb-3">Product name</h5>
                        </a>
                        <a href="" class="text-reset">
                            <p>Category</p>
                        </a>
                        <h6 class="mb-3">LKR 1100</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
                        <img src="images/slide_4.jpg" class="w-100" />
                        <a href="#!">
                            <div class="mask">
                                <div class="d-flex justify-content-start align-items-end h-100">
                                    <h5><span class="badge bg-danger ms-2">-10%</span></h5>
                                </div>
                            </div>
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">
                        <a href="" class="text-reset">
                            <h5 class="card-title mb-3">Product name</h5>
                        </a>
                        <a href="" class="text-reset">
                            <p>Category</p>
                        </a>
                        <h6 class="mb-3">
                            <s>LKR 6500</s><strong class="ms-2 text-danger">LKR 4500</strong>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card">
                    <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
                        <img src="images/slide_2.jpg" class="w-100" />
                        <a href="#!">
                            <div class="mask">
                                <div class="d-flex justify-content-start align-items-end h-100">
                                    <h5>
                                        <span class="badge bg-success ms-2">Eco</span><span
                                            class="badge bg-danger ms-2">-10%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">
                        <a href="" class="text-reset">
                            <h5 class="card-title mb-3">Product name</h5>
                        </a>
                        <a href="" class="text-reset">
                            <p>Category</p>
                        </a>
                        <h6 class="mb-3">
                            <s>LKR 3200</s><strong class="ms-2 text-danger">LKR 1300</strong>
                        </h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                        data-mdb-ripple-color="light">
                        <img src="images/slide_3.jpg" class="w-100" />
                        <a href="#!">
                            <div class="mask">
                                <div class="d-flex justify-content-start align-items-end h-100"></div>
                            </div>
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">
                        <a href="" class="text-reset">
                            <h5 class="card-title mb-3">Product name</h5>
                        </a>
                        <a href="" class="text-reset">
                            <p>Category</p>
                        </a>
                        <h6 class="mb-3">LKR 5620</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light">
                        <img src="images/slide_6.jpg" class="w-100" />
                        <a href="#!">
                            <div class="mask">
                                <div class="d-flex justify-content-start align-items-end h-100">
                                    <h5>
                                        <span class="badge bg-primary ms-2">New</span><span
                                            class="badge bg-success ms-2">Eco</span><span
                                            class="badge bg-danger ms-2">-10%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </div>
                        </a>
                    </div>
                    <div class="card-body">
                        <a href="" class="text-reset">
                            <h5 class="card-title mb-3">Product name</h5>
                        </a>
                        <a href="" class="text-reset">
                            <p>Category</p>
                        </a>
                        <h6 class="mb-3">
                            <s>LKR 4700</s><strong class="ms-2 text-danger">LKR 2600</strong>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Cards - Best Selling Categories -->
    <div class="text-center container py-2">
        <h4 class="mt-4 mb-5"><strong>BEST SELLING CATEGORIES</strong></h4>
        <div class="card-group">

            <div class="card">
                <img src="images/cat_1.png" class="card-img-top hover-shadow" alt="" height="150" />
                <div class="card-body">
                    <h5 class="card-title">Tools</h5>
                    <!-- <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.
                </p> -->
                </div>
                <!-- <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div> -->
            </div>

            <div class="card">
                <img src="images/cat_2.jpg" class="card-img-top hover-shadow" alt="" height="150" />
                <div class="card-body">
                    <h5 class="card-title">Building Profiles</h5>
                    <!-- <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.
                </p> -->
                </div>
                <!-- <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div> -->
            </div>

            <div class="card">
                <img src="images/cat_3.jpg" class="card-img-top hover-shadow" alt="" height="150" />
                <div class="card-body">
                    <h5 class="card-title">Installation Systems</h5>
                    <!-- <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.
                </p> -->
                </div>
                <!-- <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div> -->
            </div>

            <div class="card">
                <img src="images/cat_4.png" class="card-img-top hover-shadow" alt="" height="150" />
                <div class="card-body">
                    <h5 class="card-title">Electronic Devices</h5>
                    <!-- <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.
                </p> -->
                </div>
                <!-- <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div> -->
            </div>

            <div class="card">
                <img src="images/cat_5.png" class="card-img-top hover-shadow" alt="" height="150" />
                <div class="card-body">
                    <h5 class="card-title">Clean & Wash</h5>
                    <!-- <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.
                </p> -->
                </div>
                <!-- <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div> -->
            </div>

            <div class="card">
                <img src="images/cat_6.jpg" class="card-img-top hover-shadow" alt="" height="150" />
                <div class="card-body">
                    <h5 class="card-title">Tapes and Mesh</h5>
                    <!-- <p class="card-text">
                    This is a wider card with supporting text below as a natural lead-in to
                    additional content. This content is a little bit longer.
                </p> -->
                </div>
                <!-- <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div> -->
            </div>
        </div>
    </div>



    <?php include 'includes/footer.php'; ?>

    <?php include 'includes/scripts.php'; ?>


    <?php
    if(isset($_SESSION['error'])) {
        // unset($_SESSION['error']);
        echo "<div class='container alert alert-danger'>".$_SESSION['error']."</div>";
    }
    if(isset($_SESSION['login-success'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Login Successfull
            <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
            </div>';
        unset($_SESSION['login-success']);
        // echo "<div class='container alert alert-danger'>Login Successfull</div>";
    }
    ?>
    <!-- <div class="alert alert-warning alert-dismissible fade show alert-fixed" role="alert">
        Login Successfull
        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
    </div> -->


</body>

</html>