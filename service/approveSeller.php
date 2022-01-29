<?php

require_once "../config/dbcon.php";

$idSeller = $_GET['id'];
$isAllow = filter_var($_GET['allow'], FILTER_VALIDATE_BOOLEAN);


if ($isAllow) {
  //insert to seller_info and del
  $sqlCmd = 'SELECT * FROM tmp_seller WHERE tmp_seller_id =' . $idSeller;

  $allData = mysqli_query($con, $sqlCmd);

  $row = mysqli_fetch_assoc($allData);

  $name = $row['tmp_seller_name'];
  $sername = $row['tmp_seller_sername'];
  $shopname = $row['tmp_seller_shopname'];
  $username = $row['tmp_seller_username'];
  $email = $row['tmp_seller_email'];
  $password = $row['tmp_seller_password'];
  $address = $row['tmp_seller_address'];
  $phone = $row['tmp_seller_phone'];
  $base64 = $row['tmp_seller_photo'];
  $citizenId = $row['tmp_seller_citizenid'];
  $base64_2 = $row['tmp_seller_withcitizen'];


  $sqlCmdInsert = "INSERT INTO seller_info (seller_name,seller_sername,seller_shopname,seller_username,seller_email,seller_password,seller_address,seller_phone,seller_photo,seller_citizenid,seller_withcitizen)
  VALUES('$name','$sername','$shopname','$username','$email','$password','$address','$phone','$base64','$citizenId','$base64_2')";

  $isDone = mysqli_query($con, $sqlCmdInsert);
  if ($isDone) {
    mysqli_query($con, 'DELETE FROM tmp_seller WHERE tmp_seller_id =' . $idSeller);

    echo "<script>
          console.log('test');
          $(document).ready(function() {
            Swal.fire({
              title: 'success',
              text: 'Appproved',
              icon: 'success',
              timer: 5000,
              showConfirmButton: false
            });
          })
        </script>";

    header('refresh:1; url=../page/admin/approving.php');
  } else {
    echo "fail";
  }
} else {

  //not insert to seller_info but delete
  echo 'else';
}
