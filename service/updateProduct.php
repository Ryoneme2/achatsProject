<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require_once '../config/dbcon.php';

$id = $_GET['id'];
// prod_photo_tmp
$product_name = $_POST['productname'];

$prod_type = $_POST['prod_type'];
$detail = $_POST['details'];
$warranty = $_POST['warranty'];
$price = $_POST['price'];

if (isset($_POST['disable'])) {
  $sql = "UPDATE product SET prod_name = '$product_name', prod_type = '$prod_type', prod_details = '$detail', prod_warranty = '$warranty' , prod_price = '$price', isDisable = 1 WHERE prod_id = $id";
  // Checkbox is selected
} else {
  $sql = "UPDATE product SET prod_name = '$product_name', prod_type = '$prod_type', prod_details = '$detail', prod_warranty = '$warranty' , prod_price = '$price', isDisable = 0  WHERE prod_id = $id";
  // Alternate code
}



// echo $sql;

$result = mysqli_query($con, $sql);

if ($result) {

  echo "<script>
          console.log('test');
          $(document).ready(function() {
            Swal.fire({
              title: 'success',
              text: 'Updated Product',
              icon: 'success',
              timer: 5000,
              showConfirmButton: false
            });
          })
        </script>";

  header('refresh:1; url=../page/seller/dashboard.php');
} else {

  echo "<script>
        console.log('test');
        $(document).ready(function() {
          Swal.fire({
            title: 'Oops!!',
            text: 'Something went wrong! Please try again',
            icon: 'error',
            showConfirmButton: false
        });
        })
      </script>";
  header('refresh:1; url=../page/seller/dashboard.php');
}
