<?php include 'includes/session.php'; ?>

<?php
if (!isset($_SESSION['user'])) {
    header('location: signin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hardware Store</title>
    <?php include 'includes/header.php'; ?>

    <style>
        #cart-view .bg-image img {
            object-fit: fill;
            max-height: 150px;
        }

        #cart-view .bg-image .mask {
            background-color: rgba(251, 251, 251, 0.2);
        }

        #cart-view .qty .form-outline {
            /* width: fit-content; */
            flex-grow: 0;
            /* max-width: 200px; */
        }

        #cart-view .qty .form-outline {
            width: max-content;
            max-width: 75px;
        }

        .gradient-custom {

            /* fallback for old browsers */
            /* background: #6a11cb; */

            /* Chrome 10-25, Safari 5.1-6 */
            /* background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)); */

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            /* background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)) */
        }
    </style>
</head>

<body>

    <!-- Header - Navigation Bar -->
    <?php include "includes/navbar_dark.php"; ?>


    <!-- Container -->
    <div class="container h-100 py-5 gradient-custom">
        <div class="row d-flex justify-content-center">

            <!-- Left Side -->
            <div class="col-md-8">

                <!-- Cart Items -->
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Your Shopping Cart</h5>
                    </div>
                    <div id="cart-view" class="card-body">
                    </div>
                </div>
                <!-- Cart Items -->

                <!-- Payment Methods -->
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body">
                        <p><strong>We accept</strong></p>

                        <img class="me-2" width="45px" src="images/visa.svg" alt="Visa" />
                        <img class="me-2" width="45px" src="images/amex.svg" alt="American Express" />
                        <img class="me-2" width="45px" src="images/mastercard.svg" alt="Mastercard" />
                        <img class="me-2" width="45px" src="images/paypal-1.svg" alt="PayPal acceptance mark" />

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
                                <span id="total"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span id="shipping">Free</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                <span><strong id="net-total"></strong></span>
                            </li>
                        </ul>
                        <form name="cart-checkout" action="cart_checkout.php" method="post">
                            <!-- <input type="hidden" name="user_id" value="1"> -->
                            <button id="cart-checkout" name="cart-checkout" type="submit" class="btn btn-primary btn-lg btn-block">
                                Go to checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Right Side -->

        </div>
        <!-- </div> -->
        <!-- </section> -->

    </div>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>

    <script>
        $(document).ready(function() {
            ('#cart-checkout').click(function() {
                
            });
        });

        // $($(document).ready(function () {
            getCart();
            // const btDelete = document.querySelector('.bt-delete');
            // btDelete.addEventListener('click', updateCart(this));

            // async function updateCart(e) {
            //     let id_item = e.data('id-item');
            //     let id_user = e.data('id-user');
            //     let formData = new FormData();
            //     formData.append('id_item', id_item);
            //     formData.append('id_user', id_user);

            //     const data = fetch('cart_delete.php', {
            //         method: 'POST',
            //         body: formData
            //     });
            //     const response = await data.json();
            //     document.querySelector('.card-body').innerHTML = response;
            // }

            // Delete Cart Item
            $(function() {
                $(document).on('click', '.bt-delete', function(e) {
                    e.preventDefault();
                    var id_item = $(this).data('id-item');
                    $.ajax({
                        type: 'POST',
                        url: 'cart_delete.php',
                        data: {
                            id_item: id_item
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (!response.error) {
                                getCart();
                                getTotal();
                            }
                        }
                    });
                });
            });

            // Get Cart items from DB
            async function getCart() {
                //Use Fetch Api to fetch Cart Items
                await fetch('cart_fetch.php', {
                    method: 'POST'
                })
                    .then(responce => responce.json())
                    .then(data => {
                        $('#cart-view').html(data.list);
                        $('.cart_count').html(data.count);
                        $('#total').html('LKR ' + data.total);
                        $('#net-total').html('LKR ' + data.total);
                    });
            }


            // Quantity Minus
            $(document).on('click', '.minus', function(e) {
                e.preventDefault();
                var id_item = $(this).data('id-item');
                var qty = $('#qty_' + id_item).val();
                if (qty > 1) {
                    qty--;
                }
                $('#qty_' + id_item).val(qty);
                $.ajax({
                    type: 'POST',
                    url: 'cart_update.php',
                    data: {
                        id_item: id_item,
                        qty: qty
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (!response.error) {
                            getCart();
                            getTotal();
                        }
                    }
                });
            });

            // Quantity Add
            $(document).on('click', '.add', function(e) {
                e.preventDefault();
                var id_item = $(this).data('id-item');
                var qty = $('#qty_' + id_item).val();
                qty++;
                $('#qty_' + id_item).val(qty);
                $.ajax({
                    type: 'POST',
                    url: 'cart_update.php',
                    data: {
                        id_item: id_item,
                        qty: qty
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (!response.error) {
                            getCart();
                            getTotal();
                        }
                    }
                });
            });
        // }););
    </script>
</body>

</html>