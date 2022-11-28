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

  <script src="js/dashboard-controller.js" defer></script>

  <style>
    #form-container {
      border: 1px solid var(--bs-gray-200);
      box-shadow: 0px 0px 4px rgba(63, 63, 63, 0.678);
      visibility: hidden;
    }

    #form-container>form {
      display: none;
    }

    .card:hover {
      background-color: var(--bs-gray-200);
      border-color: var(--bs-gray-600);
      box-shadow: 1px 1px 8px rgba(63, 63, 63, 0.678);
      transition: 0.3s;
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
      <div class="row m-4">

        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Insert New Data</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <button id="bt-insert" class="btn btn-success px-3">INSERT</button>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">View All Data</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <button id="bt-select" class="btn btn-info px-3">SELECT</button>
            </div>
          </div>
        </div>


        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Delete An Item</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <button id="bt-delete" class="btn btn-danger px-3">DELETE</button>
            </div>
          </div>
        </div>

      </div>

      <div class="row m-4">

        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">View All Data</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <a href="#" class="btn btn-info px-3">SELECT</a>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">View All Data</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <a href="#" class="btn btn-info px-3">SELECT</a>
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">View All Data</h5>
              <!-- <p class="card-text">New Items, ...</p> -->
              <a href="#" class="btn btn-info px-3">SELECT</a>
            </div>
          </div>
        </div>

      </div>


      <!-- Form Container -->
      <div id="form-container" class="container p-4 m-5 m-auto">

        <!-- Form Insert -->
        <form id="form-insert" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

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

        <!-- Form Insert -->
        <form id="form-select">

          <!-- Title -->
          <div class="row mb-3">
            <label for="item-title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="item-title">
            </div>
          </div>

          <!-- Description -->
          <div class="row mb-3">
            <label for="item-desc" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="item-desc">
            </div>
          </div>

          <!-- Unit Price -->
          <div class="row mb-3">
            <label for="item-unit-price" class="col-sm-2 col-form-label">Unit Price</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="item-unit-price">
            </div>
          </div>

          <!-- Unit -->
          <div class="row mb-3">
            <label for="item-unit" class="col-sm-2 col-form-label">Unit</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="item-unit">
            </div>
          </div>

          <!-- Unit Price -->
          <div class="row mb-3">
            <label for="item-desc" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="item-desc">
            </div>
          </div>

          <!-- Available Stock -->
          <div class="row mb-3">
            <label for="item-stock" class="col-sm-2 col-form-label">Available Stock</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="item-stock">
            </div>
          </div>

          <button type="submit" class="btn btn-primary d-block m-auto">Add Item</button>
        </form>
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


  if (isset($_POST['bt-insert'])) {

    if (checkEmpty(1)) {
      die("ERROR: Please fill all fields.");
    }
    $item_title = $_POST[$fields_insert[0]];
    $item_desc = $_POST[$fields_insert[1]];
    $item_unit_price = $_POST[$fields_insert[2]];
    $item_unit = $_POST[$fields_insert[3]];
    $item_stock = $_POST[$fields_insert[4]];
    // $item_pics = $_POST[$fields_insert[5]];

    // FILE UPLOADING
    $uploads_dir = "uploads";
    $file_paths = uploadFile($uploads_dir);
    $item_pics = arrayToString($file_paths);


    // $check = getimagesize($_FILES['item-pics']['tmp_name']);
    // if ($check !== false) {
    //   echo "File is an image - " . $check["mime"] . ".";
    //   $uploadOk = 1;
    // } else {
    //   echo "File is not an image.";
    //   $uploadOk = 0;
    // }

    // Check if $uploadOk is set to 0 by an error
    // if ($uploadOk == 0) {
    //   echo "Sorry, your file was not uploaded.";
    //   // if everything is ok, try to upload file
    // } else {
    //   if (move_uploaded_file($_FILES["item-pics"]["tmp_name"], $target_file)) {
    //     echo "The file " . htmlspecialchars(basename($_FILES["item-pics"]["name"])) . " has been uploaded.";
    //   } else {
    //     echo "Sorry, there was an error uploading your file.";
    //   }
    // }


    // Insert New Data
    $sql = "INSERT INTO `item` (`title`, `description`, `unit_price`, `unit`, `avail_stock`, `pictures`) 
    VALUES ('$item_title','$item_desc','$item_unit_price','$item_unit','$item_stock','$item_pics');";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

function checkEmpty($option)
{
  global $fields_insert;

  if ($option == 1) {
    for ($i = 0; $i < sizeof($fields_insert); $i++) {
      if (empty($_POST[$fields_insert[$i]])) {
        return true;
      }
    }
  }
}
// @* @param string uploads_dir Directory to save uploaded image files
function uploadFile($uploads_dir)
{
  // FILE UPLOADING

  // $target_file = $target_dir . basename($_FILES["item-pics"]["name"]);
  // $uploadOk = 1;
  // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  // echo "$target_file <br>";
  // echo "$imageFileType <br>";

  $i = 0;
  $file_paths = array();
  foreach ($_FILES["item-pics"]["error"] as $key => $error) {
    // global $i;
    // global $file_paths;
    if ($error == UPLOAD_ERR_OK) {
      $tmp_name = $_FILES["item-pics"]["tmp_name"][$key];
      $tmp = explode(".", $_FILES["item-pics"]["name"][$key]);
      $newFileName = round(microtime(true)) . '.' . end($tmp);
      // $name = basename($_FILES["item-pics"]["name"][$key]);
      move_uploaded_file($tmp_name, "../$uploads_dir/$newFileName");
      // move_uploaded_file($tmp_name, "../$uploads_dir/$name");

      echo "Error $key : $error <br>";
      echo "$tmp <br>";
      echo "New File Name : $newFileName <br>";
      $file_paths[$i] = $newFileName;
      $i++;
    }
  }
  return $file_paths;
}
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