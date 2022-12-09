<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="">
    <style>
    </style>

    <!-- Header - Navigation Bar -->
    <?php include "includes/navbar_dark.php"; ?>


    <!-- Container -->
    <div class="container-fluid my-4">

        <form method="post">
            <input type="search" name="input-search" placeholder="Search" />
            <button name="bt-search" class="input-group-text border-0">
            </button>
        </form>

        <div class="row g-2">

            <div id="search-right" class="col-md-10">
                <div class="row g-2">

                    <?php


                    $search_key = "";

                    if (isset($_POST['bt-search'])) {
                        $search_key = $_POST['input-search'];
                    }


// --------------------------------------------------------------------------------------------

                    $sql = "SELECT * FROM `item`,`cart` WHERE `title` LIKE '%$search_key%' OR `title2` LIKE '%$search_key%'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
                        }
                    } else {
                        echo "0 results";
                    }

// --------------------------------------------------------------------------------------------


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
                                                    <i class="fa fa-heart-o"></i>
                                                </span>
                                                <span class="product_fav">
                                                    <i class="fa fa-opencart"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>

                    <?php
                        }
                    }
                    $pdo->close();
                    ?>

                </div>
            </div>

        </div>
    </div>


    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
</body>

</html>