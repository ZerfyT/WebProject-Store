<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
$where = '';
if (isset($_GET['category'])) {
    $catid = $_GET['category'];
    $where = 'WHERE cat_id =' . $catid;
}
function formatDate($date)
{
    $dateObj = new DateTime($date);
    return $dateObj->format('d-m-Y');
}
?>

<body class="">
    <style>

    </style>

    <!-- Header - Navigation Bar -->
    <?php include "includes/navbar.php"; ?>

    <!-- Container -->
    <main style="margin-top: 58px">

        <div class="container pt-4">
            <h1>Product List</h1>

            <div class="d-flex justify-content-between align-items-center">
                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-flat d-inline-block" id="addproduct"><i class="fa fa-plus text-center"></i> New</a>
                <form class="d-flex align-items-center">
                    <label class="form-label select-label">Category: </label>
                    <select class="form-control form-select" id="select_category">
                        <option value="0">ALL</option>
                        <?php
                        $conn = $pdo->open();

                        $stmt = $conn->prepare("SELECT * FROM category");
                        $stmt->execute();

                        foreach ($stmt as $crow) {
                            $selected = ($crow['cat_id'] == $catid) ? 'selected' : '';
                            echo "<option value='" . $crow['cat_id'] . "' " . $selected . ">" . $crow['cat_name'] . "</option>";
                        }

                        $pdo->close();
                        ?>
                    </select>

                </form>
            </div>


            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Tools</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $conn = $pdo->open();

                    try {
                        $stmt = $conn->prepare("SELECT * FROM item $where");
                        $stmt->execute();
                        foreach ($stmt as $row) {
                            $image = (!empty($row['pictures'])) ? '../uploads/' . $row['pictures'] : '../images/noimage.jpg';
                            echo
                            '<tr>
                                <td scope="row">' . $row['item_id'] . '</td>
                                <td>' . $row['title'] . '</td>
                                <td>
                                    <img src="' . $image . '" height="30px" width="30px">
                                    <span class="pull-right"><a href="#edit_photo" class="photo" data-toggle="modal" data-id="' . $row['item_id'] . '"><i class="fa fa-edit"></i></a></span>
                                </td>
                                <td><a href="#description" data-toggle="modal" class="btn btn-info btn-sm btn-flat desc" data-id="' . $row['item_id'] . '"><i class="fa fa-search"></i> View</a></td>
                                <td>LKR ' . number_format($row['price'], 3) . '</td>
                                <td>LKR ' . $row['avail_stock'] . '</td>
                                <td>
                                    <button class="btn btn-success btn-sm px-3 full-model edit btn-flat" data-id="' . $row['item_id'] . '" data-ripple-color="dark" data-mdb-toggle="modal" data-mdb-target="#"><i class="fa fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-sm px-3 full-model delete btn-flat" data-id="' . $row['item_id'] . '" data-ripple-color="dark" data-mdb-toggle="modal" data-mdb-target="#"><i class="fa fa-trash"></i> Delete</button>
                                </td>
                            </tr>';
                        }
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }

                    $pdo->close();
                    ?>

                </tbody>
            </table>
        </div>


        <?php
        if (isset($_SESSION['error'])) {
            echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
            unset($_SESSION['success']);
        }
        ?>

        <?php include 'includes/model_ord_details.php'; ?>
    </main>
    <!-- Container -->

    <?php include 'includes/scripts.php'; ?>
</body>

</html>



<script>
    $(function() {
        $(document).on('click', '.full-model', function(e) {
            e.preventDefault();
            $('#order_details_model').modal('show');
            var id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: 'data_order_details.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('#detail').prepend(response.list);
                    $('#total').html(response.total);
                }
            });
        });

        $("#order_details_model").on("hidden.bs.modal", function() {
            $('.prepend_items').remove();
        });
    });
    
    
    document.querySelector('#select_category').addEventListener('change', function(){
        let val = this.value;
        if (val == 0) {
            window.location.replace('products.php');
        } else {
            window.location.replace('products.php?category=' + val);
        }
    })
    // $('#select_category').change(function() {
    //     var val = $(this).val();
    //     if (val == 0) {
    //         window.location = 'products.php';
    //     } else {
    //         window.location = 'products.php?category=' + val;
    //     }
    // });
</script>
</body>

</html>