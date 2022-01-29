<?php

session_start();

$user_input = $_POST['username'];
$pass_input = $_POST['password'];

$sqlCmd = 'SELECT usr_id,usr_username, usr_password FROM achats WHERE usr_username =' . $user_input;

$allData = mysqli_query($con, $sqlCmd);

$row = mysqli_fetch_assoc($allData);

if ($row['usr_username'] == $user_input && $row['usr_password'] == $pass_input) {

  $_SESSION['usr_id'] = $row['usr_id'];
  $_SESSION['isLogin'] = true;
  $_SESSION['role'] = 'user';
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
}
