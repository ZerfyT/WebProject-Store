<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="">
  <style>

  </style>

  <!-- Header - Navigation Bar -->
  <?php include "includes/navbar.php"; ?>


  <main style="margin-top: 58px">
    <div class="container pt-4">
      <h1>Orders History</h1>


      <table class="table align-middle">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Name</th>
            <th scope="col">Full Details</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $conn = $pdo->open();

          try {
            $stmt = $conn->prepare("SELECT `user_order`.`order_id`,`user_order`.`order_date`,`user`.`full_name` FROM `user_order` INNER JOIN `user`ON `user_order`.`user_id`=`user`.`user_id` ORDER BY `order_date`");
            $stmt->execute();
            foreach ($stmt as $row) {
              $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE details.sales_id=:id");
              $stmt->execute(['id' => $row['salesid']]);
              $total = 0;
              foreach ($stmt as $details) {
                $subtotal = $details['price'] * $details['quantity'];
                $total += $subtotal;
              }
              echo "
                          <tr>
                            <td class='hidden'></td>
                            <td>" . date('M d, Y', strtotime($row['sales_date'])) . "</td>
                            <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
                            <td>" . $row['pay_id'] . "</td>
                            <td>&#36; " . number_format($total, 2) . "</td>
                            <td><button type='button' class='btn btn-info btn-sm btn-flat transact' data-id='" . $row['salesid'] . "'><i class='fa fa-search'></i> View</button></td>
                          </tr>
                        ";
            }
          } catch (PDOException $e) {
            echo $e->getMessage();
          }

          $pdo->close();
          ?>



          <tr>
            <th scope="row">1</th>
            <td>Sit</td>
            <td>Amet</td>
            <td>
              <button type="button" class="btn btn-link btn-sm px-3" data-ripple-color="dark">
                <i class="fas fa-times"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <main>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
        Launch demo modal
      </button>

      <!-- Modal -->
      <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
        <div class="modal-dialog modal-xl ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                Close
              </button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Container -->


      <?php include 'includes/footer.php'; ?>
      <?php include 'includes/scripts.php'; ?>
</body>

</html>




<!-- Date Picker -->
<script>
  $(function() {
    //Date picker
    $('#datepicker_add').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
    $('#datepicker_edit').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      format: 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

  });
</script>
<script>
  $(function() {
    $(document).on('click', '.transact', function(e) {
      e.preventDefault();
      $('#transaction').modal('show');
      var id = $(this).data('id');
      $.ajax({
        type: 'POST',
        url: 'transact.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('#date').html(response.date);
          $('#transid').html(response.transaction);
          $('#detail').prepend(response.list);
          $('#total').html(response.total);
        }
      });
    });

    $("#transaction").on("hidden.bs.modal", function() {
      $('.prepend_items').remove();
    });
  });
</script>
</body>

</html>