<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();

require_once "../config/dbcon.php";

$user_input = $_POST['username'];
$pass_input = $_POST['password'];

$sqlCmd = "SELECT * FROM achats WHERE usr_username = '$user_input'";

// echo $sqlCmd;

$allData = mysqli_query($con, $sqlCmd);

$row = mysqli_fetch_assoc($allData);

// echo $row['usr_username'];
// 

if ($row['usr_username'] == $user_input && $row['usr_password'] == $pass_input) {

  $_SESSION['usr_id'] = $row['usr_id'];
  $_SESSION['usr_name'] = $row['usr_name'];
  $_SESSION['usr_sername'] = $row['usr_sername'];
  $_SESSION['usr_photo'] = $row['usr_photo'];
  $_SESSION['usr_email'] = $row['usr_email'];
  $_SESSION['usr_username'] = $row['usr_username'];
  $_SESSION['usr_address'] = $row['usr_address'];
  $_SESSION['usr_shopname'] = $row['usr_shopname'];
  $_SESSION['usr_phone'] = $row['usr_phone'];
  $_SESSION['isLogin'] = true;
  $_SESSION['role'] = 'user';
  $_SESSION['product_compare'] = array();

  $sqlCartQuery = "SELECT * FROM carts WHERE usr_id = " . $_SESSION['usr_id'];
  $resCartQuery = mysqli_query($con, $sqlCartQuery);
  $CartRow = mysqli_fetch_assoc($resCartQuery);
  $numCartRow = mysqli_num_rows($resCartQuery);

  $_SESSION['user_cart_num'] = $numCartRow;


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

  header('refresh: 1; url=../page/users/userIndex.php');
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

  header('refresh: 1; url=../page/users/signin.php');


  session_destroy();
}
