<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
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
      <h1>Orders History</h1>

      <table class="table align-middle">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Full Details</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $conn = $pdo->open();

          try {
            $stmt = $conn->prepare("SELECT `user_order`.`order_id` AS o_id,`user_order`.`order_date` AS o_date,`user`.`full_name` AS o_name FROM `user_order` INNER JOIN `user`ON `user_order`.`user_id`=`user`.`user_id` ORDER BY `order_date`");
            $stmt->execute();
            foreach ($stmt as $row) {
              $stmt2 = $conn->prepare("SELECT * FROM `order_details` LEFT JOIN `item` ON `order_details`.`item_id`=`item`.`item_id` WHERE `order_details`.`order_id`=:id;");
              $stmt2->execute(['id' => $row['o_id']]);
              $total = 0;
              foreach ($stmt2 as $details) {
                $subtotal = $details['price'] * $details['quantity'];
                $total += $subtotal;
              }

              echo
              '<tr>
                <td scope="row">' . $row['o_id'] . '</td>
                <td>' . formatDate(($row['o_date'])) . '</td>
                <td>' . $row['o_name'] . '</td>
                <td>LKR ' . number_format($total, 3) . '</td>
                <td><button type="button" class="btn btn-primary btn-sm px-3 full-model" data-id=' . $row['o_id'] . 'data-ripple-color="dark" data-mdb-toggle="modal" data-mdb-target="#order_details_model">
                      View Details
                    </button> </td>
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
</script>
</body>

</html>