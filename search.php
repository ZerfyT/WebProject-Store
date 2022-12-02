<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">

    <?php include 'includes/navbar.php'; ?>

        <div class="container m-4">

            <!-- Main content -->
            <?php

            $conn = $pdo->open();

            if (isset($_GET['bt-search'])) {
                $search_key = $_GET['input-search'];

                $sql = "SELECT * FROM `item` WHERE `title` LIKE :keyword ORDER BY `title`";
                $stmt = $conn->prepare($sql);
                $stmt->execute([':keyword' => $search_key]);
                $rows = $stmt->rowCount();
                if ($rows < 1) {
                    echo '<h1 class="h1">No results found for <i>' . $search_key . '</i></h1>';
                } else {
                    echo '<h1 class="h1">Search results for <i>' . $search_key . '</i></h1>';
                    echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
                    foreach ($stmt as $row) {
            ?>
                        <div class="col">
                            <div class="card result">
                                <img src="uploads/<?php echo $row['pictures'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['title'] ?></h5>
                                    <p class="card-text"><?php echo $row['description'] ?></p>
                                    <span class="card-text"><?php echo $row['unit'] ?> : <?php echo $row['unit_price'] ?></span>
                                </div>
                            </div>
                        </div>

            <?php
                    }
                    echo "</div>";
                }
                $pdo->close();
            }
            ?>
        </div>

    <?php include 'includes/footer.php'; ?>

    <?php include 'includes/scripts.php'; ?>
</body>

</html>