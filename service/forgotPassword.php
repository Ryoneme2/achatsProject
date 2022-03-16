<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();

require_once "../config/dbcon.php";

$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM achats WHERE usr_username = '$username' AND usr_name = '$name' AND usr_email = '$email'";

$res = mysqli_query($con, $sql);

$numRow = mysqli_num_rows($res);

if ($numRow > 0) {
  $sqlUpdatePassword = "UPDATE achats SET usr_password = '$password' WHERE usr_username = '$username' AND usr_name = '$name' AND usr_email = '$email'";
  $resUpdatePassword = mysqli_query($con, $sqlUpdatePassword);
  if ($resUpdatePassword) {
    echo "<script>
    console.log('test');
    $(document).ready(function() {
      Swal.fire({
        title: 'success',
        text: 'Password has been changed',
        icon: 'success',
        timer: 5000,
        showConfirmButton: false
      });
    })
  </script>";
    header('refresh:1; url=../page/users/signin.php');
  } else {
    echo "<script>
        console.log('test');
        $(document).ready(function() {
          Swal.fire({
            title: 'Oops!!',
            text: 'Something went wrong! Password Please try again',
            icon: 'error',
            showConfirmButton: false
        });
        })
      </script>";
    header('refresh:1; url=../page/users/signin.php');
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

  header('refresh:1; url=../page/users/signin.php');
}
