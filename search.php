<?php include 'includes/session.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hardware Store</title>
    <?php include 'includes/header.php'; ?>
    <style>
        /* .t-products {
            background-image: linear-gradient(to right top, #5629c0, #5625cb, #5620d5, #551ae0, #5412eb);
            color: #fff;
            border-radius: 3px;
            border-right: 1px solid #333;
        } */

        /* .processor {
            background-color: #fff;
            margin-top: 5px;
            border-bottom: 1px solid #eee
        }

        .brand {
            background-color: #fff;
            border-bottom: 1px solid #eee
        }

        .type {
            background-color: #fff
        } */
        /* 
        .card-item {}

        .product {
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            position: relative;
            box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.1);
            margin: 1px;
        }

        .about span {
            color: #5629c0;
            font-size: 16px;
        }

        .cart-button button {
            font-size: 12px;
            color: #fff;
            background-color: #5629c0;
            height: 38px;
        }

        .cart-button button:focus,
        button:active {
            font-size: 12px;
            color: #fff;
            background-color: #5629c0;
            box-shadow: none;
        }

        .product_fav i {
            line-height: 40px;
            /* color: #5629c0; */
        /* font-size: 15px; */
        /* } */

        /* .product_fav {
            display: inline-block;
            width: 36px;
            height: 39px;
            padding: 8px;
            background: #FFFFFF;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
            border-radius: 11%;
            text-align: center;
            cursor: pointer;
            margin-left: 3px;
            -webkit-transition: all 200ms ease;
            -moz-transition: all 200ms ease;
            -ms-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease;
        }

        .product_fav:hover {
            background: #5629c0
        }

        .product_fav:hover i {
            color: #333; 
        } */

        /* .about {
            margin-top: 12px;
        } */

        /* .off {
            position: absolute;
            left: 65%;
            top: 6%;
            width: 80px;
            text-align: center;
            height: 30px;
            line-height: 8px;
            border-radius: 5px;
            font-size: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff
        } */
    </style>
</head>

<body>

    <!-- Header - Navigation Bar -->
    <?php include "includes/navbar_dark.php"; ?>


    <!-- Container -->
    <div class="container-fluid my-5">
        <div class="row g-2">
            <!-- Left Side -->
            <div class="col-md-2">

                <!-- Categories -->
                <div class="t-products p-2">
                    <h6 class="text-uppercase">Top Categories</h6>
                    <div class="p-lists">
                        <div class="d-flex justify-content-between mt-2"> <span>Tools</span> <span>23</span> </div>
                        <div class="d-flex justify-content-between mt-2"> <span>Fixings</span> <span>13</span> </div>
                        <div class="d-flex justify-content-between mt-2"> <span>Heating Systems</span> <span>46</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2"> <span>Building Materials</span>
                            <span>33</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2"> <span>Electronic</span> <span>12</span> </div>
                        <div class="d-flex justify-content-between mt-2"> <span>Chemicals</span> <span>53</span> </div>
                        <div class="d-flex justify-content-between mt-2"> <span>Concrete Underlay</span>
                            <span>203</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2"> <span>Clean & Wash</span> <span>23</span>
                        </div>
                    </div>
                </div>
                <!-- Categories -->

                <!-- Filters -->
                <!-- <div class="processor p-2">
                    <div class="heading d-flex justify-content-between align-items-center">
                        <h6 class="text-uppercase">Processor</h6> <span>--</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault"> Intel Core i7 </label> </div> <span>3</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Intel Core i6 </label> </div> <span>4</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Intel Core i3 </label> </div> <span>14</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Intel Centron </label> </div> <span>8</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Intel Pentinum </label> </div> <span>14</span>
                    </div>
                </div>
                <div class="brand p-2">
                    <div class="heading d-flex justify-content-between align-items-center">
                        <h6 class="text-uppercase">Brand</h6> <span>--</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault"> Apple </label> </div> <span>13</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Asus </label> </div> <span>4</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Dell </label> </div> <span>24</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Lenovo </label> </div> <span>18</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Acer </label> </div> <span>44</span>
                    </div>
                </div>
                <div class="type p-2 mb-2">
                    <div class="heading d-flex justify-content-between align-items-center">
                        <h6 class="text-uppercase">Type</h6> <span>--</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault"> Hybrid </label> </div> <span>23</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Laptop </label> </div> <span>24</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Desktop </label> </div> <span>14</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Touch </label> </div> <span>28</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked> <label class="form-check-label" for="flexCheckChecked"> Tablets </label> </div> <span>44</span>
                    </div>
                </div>
                 -->
                <!-- Filters -->
            </div>
            <!-- Left Side -->

            <!-- Right Side -->
            <div id="search-right" class="col-md-10">
                <div class="row g-2">

                    <?php

                    $conn = $pdo->open();
                    $search_key = "";

                    if (isset($_GET['input-search'])) {
                        $search_key = $_GET['input-search'];
                    }

                    // $sql = "SELECT * FROM `item` WHERE `title` LIKE :keyword";
                    $stmt = $conn->prepare("SELECT * FROM `item` WHERE `title` LIKE :keyword");
                    $stmt->execute(['keyword' => "%$search_key%"]);

                    if ($stmt->rowCount() < 1) {
                        echo '<h1 class="h1">No results found for <i>' . $search_key . '</i></h1>';
                    } else {
                        echo '<h1 class="h1">Search results for <i>' . $search_key . '</i></h1>';
                        // echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
                        foreach ($stmt as $row) {
                    ?>
                    <div class="col-md-4">
                        <a class="" href="item.php?item_id=<?php echo $row['item_id'] ?>">
                            <div class="product py-4 bg-light">
                                <!-- <span class="off bg-success">-25% OFF</span> -->
                                <div class="text-center">
                                    <img src="uploads/<?php echo $row['pictures'] ?>" width="200" height="200">
                                </div>
                                <div class="about text-center">
                                    <h5><?php echo $row['title'] ?></h5>
                                    <span>Rs. <?php echo $row['price'] ?></span>
                                </div>
                                <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center">
                                    <!-- <button class="btn btn-primary text-uppercase">Add to cart</button> -->
                                    <div class="add">
                                        <span class="product_fav">
                                            <i class="fa-solid fa-heart text-danger"></i>
                                        </span>
                                        <span class="product_fav">
                                            <i class="fa-solid fa-cart-shopping text-success"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>

                    <?php
                        }
                        // echo "</div>";
                    }
                    $pdo->close();
                    // }
                    ?>

                    <!-- <div class="col-md-4">
                        <div class="product py-4"> <span class="off bg-warning">SALE</span>
                            <div class="text-center"> <img src="https://i.imgur.com/VY0R9aV.png" width="200"> </div>
                            <div class="about text-center">
                                <h5>Hygen Smart watch </h5> <span>$123.43</span>
                            </div>
                            <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button class="btn btn-primary text-uppercase">Add to cart</button>
                                <div class="add"> <span class="product_fav"><i class="fa fa-heart-o"></i></span> <span class="product_fav"><i class="fa fa-opencart"></i></span> </div>
                            </div>
                        </div>
                    </div> -->


                </div>
            </div>
            <!-- Right Side -->

        </div>
    </div>


    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
</body>

</html>