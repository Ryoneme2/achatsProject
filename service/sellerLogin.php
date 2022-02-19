<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();

require_once '../config/dbcon.php';

$user_input = $_POST['username'];
$pass_input = $_POST['password'];


$sqlCmd = "SELECT * FROM seller_info WHERE seller_username = '" . $user_input . "'";

$allData = mysqli_query($con, $sqlCmd);

// echo $sqlCmd;

$row = mysqli_fetch_assoc($allData);

// echo $row['seller_username'];
// echo $row['seller_password'];

if ($row['seller_username'] == $user_input && $row['seller_password'] == $pass_input && $row['isApprove'] == 1) {

  $_SESSION['seller_id'] = $row['seller_id'];
  $_SESSION['seller_name'] = $row['seller_name'];
  $_SESSION['seller_sername'] = $row['seller_sername'];
  $_SESSION['seller_photo'] = $row['seller_photo'];
  $_SESSION['seller_email'] = $row['seller_email'];
  $_SESSION['seller_username'] = $row['seller_username'];
  $_SESSION['seller_address'] = $row['seller_address'];
  $_SESSION['seller_shopname'] = $row['seller_shopname'];
  $_SESSION['seller_phone'] = $row['seller_phone'];
  $_SESSION['seller_follower'] = $row['seller_follower'];
  $_SESSION['seller_product_qty'] = $row['seller_product_qty'];
  $_SESSION['seller_rating'] = $row['seller_rating'];
  $_SESSION['isLogin'] = true;
  $_SESSION['role'] = 'seller';

  echo "<script>
          console.log('test');
          $(document).ready(function() {
            Swal.fire({
              title: 'success',
              text: 'Logged in',
              icon: 'success',
              timer: 5000,
              showConfirmButton: false
            });
          })
        </script>";

  header('refresh: 1; url=../page/seller/dashboard.php');
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
  session_destroy();

  header('refresh: 1; url=../page/seller/signin.php');
}
