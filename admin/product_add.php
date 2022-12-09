<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>


<?php

$msg = "";
if (isset($_POST['bt-add'])) {
    $p_title = $_POST['i-title'];
    $p_desc = $_POST['i-desc'];
    $p_price = $_POST['i-price'];
    $p_qty = $_POST['i-stock'];
    $p_cate = $_POST['i-cate'];

    // FILE UPLOADING
    $file_path = uploadImage();

    $sql = "INSERT INTO `item` (`title`, `description`, `price`, `avail_stock`, `pictures`, `cat_id`) 
    VALUES ('$p_title','$p_desc','$p_price','$p_qty','$file_path','$p_cate');";

    $conn = $pdo->open();
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        $msg = "New Item Added.";
    }
    $pdo->close();
}


/**
 * Upload image files to web server. Multiple file uploading supported.
 * @return string $file_paths Return an array of uploaded file names.
 */
function uploadImage()
{
    $uploads_dir = "uploads";
    $newFileName = "";
    if (isset($_FILES['i-image']) && $_FILES['i-image']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES["i-image"]["tmp_name"];
        $fileName = $_FILES["i-image"]["name"];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        if (move_uploaded_file($tmpName, "../$uploads_dir/$newFileName")) {
            $msg = 'File is successfully uploaded.';
            echo $msg;
            return $newFileName;
        }
    }
    return $newFileName;
}

?>

<body class="">
    <style>

    </style>

    <!-- Header - Navigation Bar -->
    <?php include "includes/navbar.php"; ?>

    <!-- Container -->
    <main style="margin-top: 58px">
        <div class="container pt-4 px-4">
            <h1>Add New Product</h1>


            <form class="" method="post" enctype="multipart/form-data">
                <!-- Title input -->
                <div class="form-outline mb-4">
                    <input name="i-title" type="text" id="form4Example1" class="form-control" />
                    <label class="form-label" for="form4Example1">Title</label>
                </div>

                <!-- Description input -->
                <div class="form-outline mb-4">
                    <textarea name="i-desc" class="form-control" id="form4Example3" rows="4"></textarea>
                    <label class="form-label" for="form4Example3">Description</label>
                </div>

                <div class="d-flex justify-content-between">
                    <!-- Price input -->
                    <div class="form-outline mb-4 w-25">
                        <input name="i-price" type="number" id="form4Example2" class="form-control" />
                        <label class="form-label" for="form4Example2">Price</label>
                    </div>

                    <!-- Stock input -->
                    <div class="form-outline mb-4 w-25">
                        <input name="i-stock" type="number" id="form4Example2" class="form-control" />
                        <label class="form-label" for="form4Example2">Stock</label>
                    </div>

                </div>

                <!-- File input -->
                <div class="form-outline mb-4">
                    <input name="i-image" type="file" class="form-control" id="customFile" />
                    <label class="form-label" for="customFile"></label>
                </div>

                <div class="d-flex justify-content-between mb-4">

                    <!-- <div class="form-outline mb4"> -->
                    <!-- <input class="form-control select-input active" type="text" role="listbox"> -->
                    <!-- <input type="text" class="form-control select-input active" role="listbox"> -->
                    <!-- </div> -->

                    <div class="d-flex justify-content-between w-100">
                        <!-- <input class="form-control select-input active" type="text">Example label</label><span class="select-arrow"></span> -->

                        <select name="i-cate" class="form-control form-select select-input w-50">

                            <?php
                            $conn = $pdo->open();
                            $stmt = $conn->prepare("SELECT * FROM `category`");
                            $stmt->execute();
                            foreach ($stmt as $row) {
                            ?>
                                <option value="1"><?php echo $row['cat_name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <!-- Submit button -->
                        <button name="bt-add" type="submit" class="btn btn-primary">Send</button>
                    </div>

                </div>

            </form>

            <?php
            if (!$msg == "") {
                echo "<h3>$msg</h3>";
                $msg = "";
            }
            ?>
        </div>

    </main>
    <!-- Container -->

    <?php include 'includes/scripts.php'; ?>
</body>

</html>



<script>
    // $(function() {
    //     $(document).on('click', '.full-model', function(e) {
    //         e.preventDefault();
    //         $('#order_details_model').modal('show');
    //         var id = $(this).data('id');
    //         $.ajax({
    //             type: 'POST',
    //             url: 'data_order_details.php',
    //             data: {
    //                 id: id
    //             },
    //             dataType: 'json',
    //             success: function(response) {
    //                 $('#detail').prepend(response.list);
    //                 $('#total').html(response.total);
    //             }
    //         });
    //     });

    //     $("#order_details_model").on("hidden.bs.modal", function() {
    //         $('.prepend_items').remove();
    //     });
    // });
</script>
</body>

</html>