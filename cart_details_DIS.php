<?php
include 'includes/session.php';

$conn = $pdo->open();

// function getItemDetails()
// {
    // global $conn;
    $stmt = $conn->prepare("SELECT * FROM `item` INNER JOIN `cart` ON `cart`.`item_id`=`item`.`item_id` WHERE  `cart`.`user_id`= :id");
    $stmt->execute(['id' => $_SESSION['user']]);
    $output = '';

    if ($stmt->rowCount() < 1) {
        echo '<h1 class="h1">Your Cart is Empty.</h1>';
    } else {
        foreach ($stmt as $row) {
        $output .=
            '<!-- Single item -->
            <div class="row">
                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                    <!-- Image -->
                    <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                        <img src="uploads/' . $row['pictures'] . '" class="w-100" alt="" style="object-fit: fill; max-height: 150px;" />
                        <a href="#">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                        </a>
                    </div>
                    <!-- Image -->
                </div>

                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                    <!-- Data -->
                    <p><strong>' . $row['title'] . '</strong></p>
                    <p>' . $row['description'] . '</p>
                    <button type="button" class="btn btn-primary btn-sm me-1 mb-2 bt-delete" data-mdb-toggle="tooltip" data-id-item="' . $row['item_id'] .'" data-id-user="' . $_SESSION['user'] . '" title="Remove item">
                        <i class="fas fa-trash"></i>
                    </button>
                    <!-- Data -->
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <!-- Quantity -->
                    <div class="d-flex mb-4" style="max-width: 300px">
                        <button class="btn btn-primary px-3 me-2" onclick="this.parentNode.querySelector(\'input[type=number]\').stepDown()">
                            <i class="fas fa-minus"></i>
                        </button>

                        <div class="form-outline">
                            <input id="form1" min="0" name="quantity" value="' . $row['quantity'] . '" type="number" class="form-control" onchange="updatePrice(this.parentNode.parentNode.parentNode.querySelector(\'strong\'), this.target.value);" />
                            <label class="form-label" for="form1">Quantity</label>
                        </div>

                        <button class="btn btn-primary px-3 ms-2" onclick="this.parentNode.querySelector(\'input[type=number]\').stepUp()">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <!-- Quantity -->

                    <!-- Price -->
                    <p class="text-start text-md-center">
                        <strong>' . $row['price'] . '</strong>
                    </p>
                    <!-- Price -->
                </div>
            </div>
            <!-- Single item -->
            <hr class="my-4" />';
        }
    }
    $pdo->close();
    echo json_encode($output); 
// }


