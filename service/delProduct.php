<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once '../config/dbcon.php';

$id = $_GET['id'];
$idSeller = $_SESSION['seller_id'];

$sqlSellCmd = "SELECT seller_product_qty FROM seller_info WHERE seller_id = $idSeller";

// echo $sqlCmd;
$result2 = mysqli_query($con, $sqlSellCmd);
$row = mysqli_fetch_assoc($result2);
$qty = $row['seller_product_qty'];
$qty2 = $qty - 1;

$sqlSellQtyCmd = "UPDATE seller_info SET seller_product_qty = $qty2 WHERE seller_id = $idSeller";


$sql = 'DELETE FROM product WHERE prod_id =' . $id;

$result = mysqli_query($con, $sql);
$result3 = mysqli_query($con, $sqlSellQtyCmd);

if ($result && $result3) {

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
