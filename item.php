<?php @include 'includes/session.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hardware Store</title>
    <?php @include 'includes/header.php'; ?>
    <style>
    </style>
</head>

<body class="">
    <!-- Header - Navigation Bar -->
    <?php @include "includes/navbar_dark.php"; ?>


    <!-- Container -->
    <div class="container">

        <?php

        if (!isset($_GET['item_id'])) {
            echo '<h2 class="h2"> Error! Invalid Request.</h2>';
            die(0);
        }

        $conn = $pdo->open();
        $item_id = $_GET['item_id'];

        $stmt = $conn->prepare("SELECT * FROM `item` INNER JOIN `category` ON `category`.`cat_id`=`item`.`cat_id` WHERE `item_id` = :id");
        $stmt->execute(['id' => "$item_id"]);

        if ($stmt->rowCount() < 1) {
            echo '<h2 class="h2">No results found.</h2>';
            die(0);
        }

        foreach ($stmt as $row) {

        ?>

            <!-- Product section-->
            <div class="container px-4 px-lg-5 my-5">
                <?php
                if (isset($_GET['msg'])) {
                    echo '<h3 class="bg-warning">' . $_GET['msg'] . '</h3>';
                    $_GET['msg'] = '';
                }
                ?>
                <div class="row gx-4 gx-lg-5 align-items-center position-relative">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="uploads/<?php echo $row['pictures'] ?>" width="100%" height="500" alt="..." /></div>
                    <div class="col-md-6 d-flex flex-column justify-content-between h-100">
                        <h1 class="h1 fw-bolder"><?php echo $row['title'] ?></h1>
                        <div class="fs-5 mb-5">
                            <span class="">LKR <?php echo $row['price'] ?></span>
                        </div>
                        <div class="small mb-1"><?php echo $row['cat_name'] ?></div>
                        <p class="lead"><?php echo $row['description'] ?></p>
                        <form action="cart_add.php" method="get">
                            <div class="d-flex position-absolute bottom-0">
                                <!-- Quantity Buttons -->
                                <button id="minus" class="btn btn-primary px-3">
                                    <i class="fas fa-minus"></i>
                                </button>

                                <input id="input_qty" min="0" name="quantity" value="1" type="number" class="form-control text-center mx-1" style="max-width: 3rem" readonly />

                                <button id="add" class="btn btn-primary px-3 me-2">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <!-- Quantity Buttons -->

                                <!-- Add to Cart Button -->
                                <input type="hidden" name="item_id" value="<?php echo $row['item_id'] ?>" type="text" readonly />
                                <button type="submit" name="add-to-cart" class="btn btn-primary text-uppercase flex-shrink-0">Add to cart</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        <?php
        }

        ?>

        <!-- Related items section-->
        <!-- <section class="py-5 bg-light"> -->
        <div class="container px-4 px-lg-5 mt-5 bg-light">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Fancy Product</h5>
                                <!-- Product price-->
                                $40.00 - $80.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Special Item</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                $18.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Sale Item</h5>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">$50.00</span>
                                $25.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Popular Item</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                $40.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php @include 'includes/footer.php'; ?>
    <?php @include 'includes/scripts.php'; ?>
    <script>
        $(function() {
            $('#add').click(function(e) {
                e.preventDefault();
                var quantity = $('#input_qty').val();
                quantity++;
                $('#input_qty').val(quantity);
            });
            $('#minus').click(function(e) {
                e.preventDefault();
                var quantity = $('#input_qty').val();
                if (quantity > 1) {
                    quantity--;
                }
                $('#input_qty').val(quantity);
            });

        });
    </script>

</body>

</html>