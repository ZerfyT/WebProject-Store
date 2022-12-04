<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="">
    <style>
        .gradient-custom {

            /* fallback for old browsers */
            /* background: #6a11cb; */

            /* Chrome 10-25, Safari 5.1-6 */
            /* background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)); */

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            /* background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)) */
        }
    </style>

    <!-- Header - Navigation Bar -->
    <?php include "includes/navbar_dark.php"; ?>


    <!-- Container -->
    <div class="container h-100 gradient-custom">
        <!-- <section class=""> -->
        <!-- <div class="container py-5"> -->
        <div class="row d-flex justify-content-center my-4">

            <!-- Left Side -->
            <div class="col-md-8">
                <!-- Cart Items -->
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Your Shopping Cart</h5>
                    </div>
                    <div class="card-body">

                        <?php
                        if (!isset($_SESSION['user'])) {
                            header('location: index.php');
                        }
                        $stmt = $conn->prepare("SELECT * FROM `item` INNER JOIN `cart` ON `cart`.`item_id`=`item`.`item_id` WHERE  `cart`.`user_id`= :id");
                        $stmt->execute(['id' => $_SESSION['user']]);

                        if ($stmt->rowCount() < 1) {
                            echo '<h1 class="h1">Your Cart is Empty.</h1>';
                        } else {
                            foreach ($stmt as $row) {
                        ?>
                                <!-- Single item -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                            <img src="<?php echo 'images/' . $row['pictures'] ?>" class="w-100" alt="" />
                                            <a href="#">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                            </a>
                                        </div>
                                        <!-- Image -->
                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong><?php echo $row['title'] ?></strong></p>
                                        <p><?php echo $row['description'] ?></p>
                                        <!-- <p>Size: M</p> -->
                                        <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Remove item">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip" title="Move to the wish list">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        <!-- Data -->
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                        <!-- Quantity -->
                                        <div class="d-flex mb-4" style="max-width: 300px">
                                            <button class="btn btn-primary px-3 me-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <div class="form-outline">
                                                <input id="form1" min="0" name="quantity" value="<?php echo $row['quantity'] ?>" type="number" class="form-control" onchange="updatePrice(this.parentNode.parentNode.parentNode.querySelector('strong'), this.target.value);" />
                                                <label class="form-label" for="form1">Quantity</label>
                                            </div>

                                            <button class="btn btn-primary px-3 ms-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <!-- Quantity -->

                                        <!-- Price -->
                                        <p class="text-start text-md-center">
                                            <strong><?php echo $row['price'] ?></strong>
                                        </p>
                                        <!-- Price -->
                                    </div>
                                </div>
                                <!-- Single item -->
                                <hr class="my-4" />

                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
                <!-- Cart Items -->

                <!-- Shipping Estimate Time -->
                <!-- <div class="card mb-4">
                    <div class="card-body">
                        <p><strong>Expected shipping delivery</strong></p>
                        <p class="mb-0">12.10.2020 - 14.10.2020</p>
                    </div>
                </div> -->
                <!-- Shipping Estimate Time -->

                <!-- Payment Methods -->
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body">
                        <p><strong>We accept</strong></p>

                        <!-- <i class="fab fa-cc-paypal me-2 h1 bg-transparent text-primary"></i> -->
                        <!-- <i class="fab fa-cc-mastercard me-2 h1 bg-transparent text-primary"></i> -->
                        <!-- <i class="fab fa-cc-visa me-2 h1 bg-transparent text-primary"></i> -->

                        <img class="me-2" width="45px" src="images/visa.svg" alt="Visa" />
                        <img class="me-2" width="45px" src="images/amex.svg" alt="American Express" />
                        <img class="me-2" width="45px" src="images/mastercard.svg" alt="Mastercard" />
                        <img class="me-2" width="45px" src="images/paypal-1.svg" alt="PayPal acceptance mark" />

                        <!-- <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg" alt="Visa" /> -->
                        <!-- <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg" alt="American Express" /> -->
                        <!-- <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg" alt="Mastercard" /> -->
                        <!-- <img class="me-2" width="45px" src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.webp" alt="PayPal acceptance mark" /> -->
                    </div>
                </div>
                <!-- Payment Methods -->
            </div>
            <!-- Left Side -->

            <!-- Right Side -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Products
                                <span>$53.98</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>Gratis</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                <span><strong>$53.98</strong></span>
                            </li>
                        </ul>

                        <button type="button" class="btn btn-primary btn-lg btn-block">
                            Go to checkout
                        </button>
                    </div>
                </div>
            </div>
            <!-- Right Side -->

        </div>
        <!-- </div> -->
        <!-- </section> -->

    </div>

    <script>
        function updatePrice(ele, price, qt) {
            console.log(ele);
            console.log(price);
            console.log(qt);
            ele.innerHTML = price * qt;
        }

        function increment_quantity(cart_id) {
            var inputQuantityElement = $("#input-quantity-" + cart_id);
            var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
            save_to_db(cart_id, newQuantity);
        }

        function decrement_quantity(cart_id) {
            var inputQuantityElement = $("#input-quantity-" + cart_id);
            if ($(inputQuantityElement).val() > 1) {
                var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
                save_to_db(cart_id, newQuantity);
            }
        }

        function save_to_db(cart_id, new_quantity) {
            var inputQuantityElement = $("#input-quantity-" + cart_id);
            $.ajax({
                url: "update_cart_quantity.php",
                data: "cart_id=" + cart_id + "&new_quantity=" + new_quantity,
                type: 'post',
                success: function(response) {
                    $(inputQuantityElement).val(new_quantity);
                }
            });
        }
    </script>


    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
</body>

</html>