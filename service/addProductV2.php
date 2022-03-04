<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<?php

session_start();

require_once "../config/dbcon.php";

$id = $_SESSION['seller_id'];
$data = json_decode(file_get_contents('php://input'));
$product_name = json_encode($data->prod_name);
$color = json_encode($data->prod_color);
$prod_type = json_encode($data->prod_type);
$size = json_encode($data->prod_size);
$warranty = json_encode($data->prod_warrenty);
$weight = json_encode($data->prod_weight);
$price = json_encode($data->prod_price);
$detail = json_encode($data->prod_detail);
$photoBase64 = json_encode($data->prod_img);

// echo str_split($weight);

$weightStr = '';

for ($i = 1; $i < count(str_split($weight)) - 1; $i++) {
  $weightStr .= str_split($weight)[$i];
}
$weightDouble = (float) $weightStr;

// echo $weightDouble;

$sqlCmd = "INSERT INTO product (prod_name,prod_photo,prod_type,prod_size,prod_color,prod_details,prod_warranty,prod_weight,prod_price,seller_id)
           VALUES ($product_name,$photoBase64,$prod_type,$size,'$color',$detail,$warranty,$weightDouble,$price,$id)";

echo $sqlCmd;
/* Just printing the query to the console. */
$sqlSellCmd = "SELECT seller_product_qty FROM seller_info WHERE seller_id = $id";

// echo $sqlCmd;
$result2 = mysqli_query($con, $sqlSellCmd);
$row = mysqli_fetch_assoc($result2);
$qty = $row['seller_product_qty'];
$qty2 = $qty + 1;

$sqlSellQtyCmd = "UPDATE seller_info SET seller_product_qty = $qty2 WHERE seller_id = $id";

// echo $sqlSellQtyCmd;

$result = mysqli_query($con, $sqlCmd);
$result3 = mysqli_query($con, $sqlSellQtyCmd);

if ($result && $result3) {
  echo 'done';
} else {
  echo 'fail';
}
