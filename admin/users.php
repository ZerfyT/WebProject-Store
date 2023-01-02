<?php include_once 'includes/session.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Store Admin</title>
    <?php include_once 'includes/header.php'; ?>
    <style>
    </style>
</head>

<body>
    <!-- Header - Navigation Bar -->
  <?php include_once "includes/navbar.php"; ?>

<!-- Container -->
<main style="margin-top: 58px">
  <div class="container pt-4">
    <h1>Customer Details</h1>

    <table class="table align-middle">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Full Name</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile Number</th>
          <th scope="col">Address</th>
        </tr>
      </thead>
      <tbody>

        <?php
        // $conn = $pdo->open();
        
        try {
          $stmt = $conn->prepare("SELECT * FROM `user` ORDER BY `user_id`");
          $stmt->execute();
          foreach ($stmt as $row) {
            echo
              '<tr>
              <td scope="row">' . $row['user_id'] . '</td>
              <td>' . $row['full_name'] . '</td>
              <td>' . $row['email'] . '</td>
              <td>' . $row['tp_number'] . '</td>
              <td>' . $row['address'] . '</td>
            </tr>';
          }
        } catch (PDOException $e) {
          echo $e->getMessage();
        }

        // $pdo->close();
        ?>

      </tbody>
    </table>
  </div>
</main>
<!-- Container -->

<?php include_once 'includes/scripts.php'; ?>

</body>

</html>