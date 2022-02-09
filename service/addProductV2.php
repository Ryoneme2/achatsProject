<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();

require_once "../config/dbcon.php";

$id = $_SESSION['seller_id'];
$data = json_decode(file_get_contents('php://input'));
$product_name = json_encode($data->prod_name);
$color = json_encode($data->prod_color);
$prod_type = json_encode($data->prod_type);
$size = json_encode($data->prod_size);
$warranty = json_encode($data->prod_warranty);
$price = json_encode($data->prod_price);
$detail = json_encode($data->prod_detail);
$photoBase64 = json_encode($data->prod_img);


$sqlCmd = "INSERT INTO product (prod_name,prod_photo,prod_type,prod_size,prod_color,prod_details,prod_warranty,prod_weight,prod_price,seller_id)
           VALUES ('$product_name','$photoBase64','$prod_type','$size','$color','$detail','$warranty',$price,$id)";

echo $sqlCmd;
// $sqlSellCmd = "SELECT seller_product_qty FROM seller_info WHERE seller_id = $id";

// // echo $sqlCmd;
// $result2 = mysqli_query($con, $sqlSellCmd);
// $row = mysqli_fetch_assoc($result2);
// $qty = $row['seller_product_qty'];
// $qty2 = $qty + 1;

// $sqlSellQtyCmd = "UPDATE seller_info SET seller_product_qty = $qty2 WHERE seller_id = $id";

// $result = mysqli_query($con, $sqlCmd);
// $result3 = mysqli_query($con, $sqlSellQtyCmd);

// if ($result && $result3) {

//   echo "<script>
//           console.log('test');
//           $(document).ready(function() {
//             Swal.fire({
//               title: 'success',
//               text: 'Added product',
//               icon: 'success',
//               timer: 5000,
//               showConfirmButton: false
//             });
//           })
//         </script>";

//   header('refresh:1; url=../page/seller/dashboard.php');
// } else {

//   echo "<script>
//         console.log('test');
//         $(document).ready(function() {
//           Swal.fire({
//             title: 'Oops!!',
//             text: 'Something went wrong! Please try again',
//             icon: 'error',
//             showConfirmButton: false
//         });
//         })
//       </script>";
//   header('refresh:1; url=../page/seller/addProduct.php');
// }
