<?php
// Session Start
session_start();

// Is Admin Logged?
if (empty($_SESSION['admin-name']) && empty($_SESSION['admin-is-logged'])) {
  echo "Please Login..";
  header("Location: login.php");
  exit;
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="../bootstrap-5.2.3-dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="js/dashboard-controller.js"></script>

  <style>
    #controller-cards button {
      transition: 0.2s;
    }

    #controller-cards button:hover {
      opacity: 0.8;
      letter-spacing: 0.1em;
    }

    #controller-cards button.active #controller-cards .card {
      border-color: tomato;
    }

    #controller-cards .card {
      transition: 0.3s;
    }

    #controller-cards .card:hover {
      background-color: var(--bs-gray-200);
      border-color: var(--bs-gray-600);
      box-shadow: 1px 1px 8px rgba(63, 63, 63, 0.678);
    }

    #form-container {
      border: 1px solid var(--bs-gray-200);
      box-shadow: 0px 0px 4px rgba(63, 63, 63, 0.678);
      visibility: hidden;
    }

    #form-container>.form {
      display: none;
    }
  </style>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>

    <div class="container p-5 m-5">

      <!-- Print the SESSION -->
      <?php
      print_r($_SESSION);
      ?>

      <!-- Controllers -->
      <div id="controller-cards" class="row m-4">

        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Insert New Data</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <button id="bt-insert" class="btn btn-success px-3" onclick="controlFormVisibility(event, 'form-insert');">INSERT</button>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">View All Items</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <button id="bt-select-items" class="btn btn-info px-3" onclick="controlFormVisibility(event, 'form-select-items');">SELECT</button>
            </div>
          </div>
        </div>


        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Delete An Item</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <button id="bt-delete" class="btn btn-danger px-3" onclick="controlFormVisibility(event, 'form-delete');">DELETE</button>
            </div>
          </div>
        </div>

      </div>

      <div class="row m-4">
      </div>


      <!-- Form Container -->
      <div id="form-container" class="container p-4 m-5 m-auto">

        <!-- Form Insert -->
        <form class="form" id="form-insert" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

          <!-- Title -->
          <div class="row mb-3">
            <label for="item-title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="item-title" name="item-title">
            </div>
          </div>

          <!-- Description -->
          <div class="row mb-3">
            <label for="item-desc" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="item-desc" name="item-desc">
            </div>
          </div>

          <!-- Unit Price -->
          <div class="row mb-3">
            <label for="item-unit-price" class="col-sm-2 col-form-label">Unit Price</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="item-unit-price" name="item-unit-price">
            </div>
          </div>

          <!-- Unit -->
          <div class="row mb-3">
            <label for="item-unit" class="col-sm-2 col-form-label">Unit</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="item-unit" name="item-unit">
            </div>
          </div>


          <!-- Available Stock -->
          <div class="row mb-3">
            <label for="item-stock" class="col-sm-2 col-form-label">Available Stock</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="item-stock" name="item-stock">
            </div>
          </div>

          <!-- Pictures -->
          <div class="row mb-3">
            <label for="item-pics" class="col-sm-2 col-form-label">Pictures</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="item-pics" name="item-pics[]" multiple>
            </div>
          </div>

          <button type="submit" class="btn btn-primary d-block m-auto" name="bt-insert">Add Item</button>
        </form>

        <!-- Form Select Items -->
        <form class="form" id="form-select-items" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

          <!-- Title Search -->
          <div class="row mb-3">
            <label for="select-title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="select-title" name="select-title">
            </div>
          </div>

          <button type="submit" class="btn btn-primary d-block m-auto" name="bt-select-items">Search Items</button>
        </form>
      </div>

      <div class="card-container">

      </div>

    </div>

  </main>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="../bootstrap-5.2.3-dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    // <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>




<!-- PHP Dashboard  ------------------------------------------------------------------------------------ -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  require '../php/connection.php';

  define('OPTION_INSERT', 1);
  $fields_insert = array('item-title', 'item-desc', 'item-unit-price', 'item-unit', 'item-stock');
  $fields_search_key = "select-title";

  // Insert New Item -------------------------------------------------------------------------------------
  if (isset($_POST['bt-insert'])) {
    if (checkEmpty(1, $fields_insert)) {
      die("ERROR: Please fill all fields.");
    }
    $item_title = $_POST[$fields_insert[0]];
    $item_desc = $_POST[$fields_insert[1]];
    $item_unit_price = $_POST[$fields_insert[2]];
    $item_unit = $_POST[$fields_insert[3]];
    $item_stock = $_POST[$fields_insert[4]];

    // FILE UPLOADING
    $uploads_dir = "uploads";
    $file_paths = uploadFile($uploads_dir);
    $item_pics = arrayToString($file_paths);

    // Insert New Data
    $sql = "INSERT INTO `item` (`title`, `description`, `unit_price`, `unit`, `avail_stock`, `pictures`) 
    VALUES ('$item_title','$item_desc','$item_unit_price','$item_unit','$item_stock','$item_pics');";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  // Search Item -------------------------------------------------------------------------------------
  elseif (isset($_POST['bt-select-items'])) {
    $sql = "SELECT * FROM `item`";
    if (!checkEmpty(2, $fields_search_key)) {
      $search_key = $_POST[$fields_search_key];
      $sql = "SELECT * FROM `item` WHERE `title` LIKE '%$search_key%'";
    }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "title: " . $row["title"] . "<br>";
        echo "Description: " . $row["description"] . "<br>";
        echo "Unit Price: " . $row["unit_price"] . "<br>";
        echo "Unit: " . $row["unit"] . "<br>";
        echo "Available Stock: " . $row["avail_stock"] . "<br>";
        echo "Pictures: " . $row["pictures"] . "<br>";

        
      }
    } else {
      echo "0 results";
    }
  }
}

/**
 * Check the input fields is not empty.
 * @param int $option Option = 1, Data insert mode. Option = 2, Data select mode.
 * @return boolean Return true when at least one field is empty.Otherwise false.
 */
function checkEmpty($option, $data)
{
  if ($option == 1) {
    for ($i = 0; $i < sizeof($data); $i++) {
      if (empty($_POST[$data[$i]])) {
        return true;
      }
    }
  } elseif ($option == 2) {
    if (empty($_POST[$data])) {
      return true;
    }
  }
}
/**
 * Upload image files to web server. Multiple file uploading supported.
 * @param string $uploads_dir Directory to save uploaded image files
 * @return array $file_paths Return an array of uploaded file names.
 */
function uploadFile($uploads_dir)
{
  $i = 0;
  $file_paths = array();
  foreach ($_FILES["item-pics"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
      $tmp_name = $_FILES["item-pics"]["tmp_name"][$key];
      $tmp = explode(".", $_FILES["item-pics"]["name"][$key]);
      $newFileName = round(microtime(true)) . '.' . end($tmp);
      move_uploaded_file($tmp_name, "../$uploads_dir/$newFileName");

      echo "Error $key : $error <br>";
      echo "$tmp <br>";
      echo "New File Name : $newFileName <br>";
      $file_paths[$i] = $newFileName;
      $i++;
    }
  }
  return $file_paths;
}
/**
 * Convert an array to string seperated by comma.
 * @param array $array Array to convert.
 * @return string $item_pics Converted string.
 */
function arrayToString($array)
{
  $item_pics = "";
  for ($j = 0; $j < sizeof($array); $j++) {
    $tmp = $array[$j];
    if ($j < sizeof($array) - 1) {
      $tmp = $tmp . ",";
    }
    $item_pics = $item_pics . $tmp;
  }
  return $item_pics;
}
?>