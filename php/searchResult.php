<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Result</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home_bs5.css">

    <style>
        .row {
            border: 1px solid #ccc;
            padding: 8px;
            display: grid;
            grid-template-columns: max-content 75%;
        }

        .label {
            grid-column: 1 / 2;
            margin-right: 8px;
        }

        .result {
            grid-column: 2 / 3;
        }
    </style>
</head>

<body>
    <?php
    require 'connection.php';

    if (isset($_GET['bt-search'])) {
        $search_key = $_GET['input-search'];
    }

    $sql = "SELECT * FROM `item` WHERE `title` LIKE '%$search_key%' ORDER BY `title`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            // echo "<div class='row'>";
            // echo "<span class='label'>ID :</span><span class='result'>". $row['id_num'] ."</span>";
            // echo "<span class='label'>Title :</span><span class='result'>". $row['title'] ."</span>";
            // echo "<span class='label'>Description :</span><span class='result'>". $row['description'] ."</span>";
            // echo "<span class='label'>Unit Price :</span><span class='result'>". $row['unit_price'] ."</span>";
            // echo "<span class='label'>Unit :</span><span class='result'>". $row['unit'] ."</span>";
            // echo "<span class='label'>Available Stock :</span><span class='result'>". $row['avail_stock'] ."</span>";
            // echo "<span class='label'>Pictures :</span><span class='result'>". $row['pictures'] ."</span>";
            // echo "</div>";

    ?>
            <div class='row'>
                <span class='label'>ID :</span><span class='result'><?php echo $row['id_num'] ?></span>
                <span class='label'>Title :</span><span class='result'><?php echo $row['title'] ?></span>
                <span class='label'>Description :</span><span class='result'><?php echo $row['description'] ?></span>
                <span class='label'>Unit Price :</span><span class='result'><?php echo $row['unit_price'] ?></span>
                <span class='label'>Unit :</span><span class='result'><?php echo $row['unit'] ?></span>
                <span class='label'>Available Stock :</span><span class='result'><?php echo $row['avail_stock'] ?></span>
                <span class='label'>Pictures :</span><span class='result'><?php echo $row['pictures'] ?></span>
            </div>

    <?php
        }
    }

    ?>

    <!-- Result Template -->
    <!-- <div class='row'>
        <span class='label'></span><span class='result'></span>
        <span class='label'></span><span class='result'></span>
        <span class='label'></span><span class='result'></span>
        <span class='label'></span><span class='result'></span>
        <span class='label'></span><span class='result'></span>
        <span class='label'></span><span class='result'></span>
        <span class='label'></span><span class='result'></span>
    </div> -->







    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>