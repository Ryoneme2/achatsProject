<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require_once '../config/dbcon.php';

$id = $_GET['id'];
// prod_photo_tmp
$product_name = $_POST['productname'];
$isPhoto = is_null($_FILES['prod_photo']['name']);

// echo $isPhoto;
// echo $_FILES['prod_photo']['name'];

if ($isPhoto) {
  $photoBase64 = $_POST['prod_photo_tmp'];
} else {
  $photo = $_FILES['prod_photo']['name'];

  $tmp_name = $_FILES["prod_photo"]["tmp_name"];
  $t = explode('.', $photo); // split name and type ( image.jpg => Array( [0]->image, [1]->jpg ))
  $type = end($t); //stored late array of $t
  $data = file_get_contents($tmp_name);
  $photoBase64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  // echo $photoBase64;
}

// echo $photoBase64;


$prod_type = $_POST['prod_type'];
$size = $_POST['size'];
$color = $_POST['color'];
$detail = $_POST['details'];
$warranty = $_POST['warranty'];
$price = $_POST['price'];


$sql = "UPDATE product SET prod_name = '$product_name', prod_photo = '$photoBase64' , prod_type = '$prod_type', prod_size = '$size', prod_color = '$color', prod_details = '$detail', prod_warranty = '$warranty' , prod_price = '$price' WHERE prod_id = $id";

// echo $sql;

$result = mysqli_query($con, $sql);

if ($result) {

  echo "<script>
          console.log('test');
          $(document).ready(function() {
            Swal.fire({
              title: 'success',
              text: 'Deleted Product',
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
