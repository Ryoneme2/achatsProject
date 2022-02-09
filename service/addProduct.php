<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();

require_once "../config/dbcon.php";

$product_name = $_POST['productname'];
$photo = $_POST['prod_photo']['name'];
$prod_type = $_POST['prod_type'];
$size = $_POST['size'];
$color = $_POST['color'];
$detail = $_POST['details'];
$warranty = $_POST['warranty'];
$price = $_POST['price'];

$id = $_SESSION['seller_id'];

$tmp_name = $_FILES["prod_photo"]["tmp_name"];
$t = explode('.', $photo); // split name and type ( image.jpg => Array( [0]->image, [1]->jpg ))
$type = end($t); //stored late array of $t
$data = file_get_contents($tmp_name);
$photoBase64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
// echo $base64;

$sqlCmd = "INSERT INTO product (prod_name,prod_photo,prod_type,prod_size,prod_color,prod_details,prod_warranty,prod_price,seller_id)
           VALUES ('$product_name','$photoBase64','$prod_type','$size','$color','$detail','$warranty',$price,$id)";

$sqlSellCmd = "SELECT seller_product_qty FROM seller_info WHERE seller_id = $id";

// echo $sqlCmd;
$result2 = mysqli_query($con, $sqlSellCmd);
$row = mysqli_fetch_assoc($result2);
$qty = $row['seller_product_qty'];
$qty2 = $qty + 1;

$sqlSellQtyCmd = "UPDATE seller_info SET seller_product_qty = $qty2 WHERE seller_id = $id";

$result = mysqli_query($con, $sqlCmd);
$result3 = mysqli_query($con, $sqlSellQtyCmd);

if ($result && $result3) {

  echo "<script>
          console.log('test');
          $(document).ready(function() {
            Swal.fire({
              title: 'success',
              text: 'Added product',
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
  header('refresh:1; url=../page/seller/addProduct.php');
}
