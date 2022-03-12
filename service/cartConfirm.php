<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

require_once "../config/dbcon.php";

$p_id = $_POST['p_id'];
$type = $_POST['shipping_type'];
$address = $_POST['address'];

if ($type == 'delivery') {
  header('refresh:1; url=../page/users/cartConfirm.php?address=' . $address);
} else if ($type == 'pick_up') {
  header('refresh:1; url=../page/users/cartConfirmPick.php?address=' . $address);
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

  header('refresh:1; url=../page/users/cart.php');
}
