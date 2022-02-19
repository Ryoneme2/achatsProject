<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();

require_once "../config/dbcon.php";

$user_input = $_POST['username'];
$pass_input = $_POST['password'];

$sqlCmd = "SELECT * FROM admin_info WHERE admin_username = '$user_input'";

// echo $sqlCmd;

$allData = mysqli_query($con, $sqlCmd);

$row = mysqli_fetch_assoc($allData);

// echo $row['usr_username'];
// 

if ($row['admin_username'] == $user_input && $row['admin_password'] == $pass_input) {


  $_SESSION['admin_id'] = $row['admin_id'];
  $_SESSION['admin_name'] = $row['admin_name'];

  $_SESSION['isLogin'] = true;
  $_SESSION['role'] = 'admin';

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

  header('refresh: 1; url=../page/admin/dashboard.php');
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

  header('refresh: 1; url=../page/admin/signin.php');


  session_destroy();
}
