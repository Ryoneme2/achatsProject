<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

require_once "../config/dbcon.php";

$id = $_GET['id'];
$type = $_GET['type'];
$type2 = $_GET['type2'];

if ($type2 == 'block') {
  if ($type == 'user') {
    $sqlCmd = "UPDATE achats SET isApprove = 0 WHERE usr_id = $id";
  } else {
    $sqlCmd = "UPDATE seller_info SET isApprove = 0 WHERE seller_id = $id";
  }
} else {
  if ($type == 'user') {
    $sqlCmd = "UPDATE achats SET isApprove = 1 WHERE usr_id = $id";
  } else {
    $sqlCmd = "UPDATE seller_info SET isApprove = 1 WHERE seller_id = $id";
  }
}
// echo $sqlCmdInsert;
$isDone = mysqli_query($con, $sqlCmd);
if ($isDone) {

  echo "<script>
          console.log('test');
          $(document).ready(function() {
            Swal.fire({
              title: 'success',
              text: 'Success',
              icon: 'success',
              timer: 5000,
              showConfirmButton: false
            });
          })
        </script>";

  if ($type == 'user') {
    header('refresh:1; url=../page/admin/userData.php');
  } else {
    header('refresh:1; url=../page/admin/sellerData.php');
  }
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

  if ($type == 'user') {
    header('refresh:1; url=../page/admin/userData.php');
  } else {
    header('refresh:1; url=../page/admin/sellerData.php');
  }
}
