<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();

if ($_SESSION['isLogin'] && $_SESSION['role'] == 'user') {

  require_once "../config/dbcon.php";


  $p_id = $_GET['p_id'];
  $user_id = $_SESSION['usr_id'];
  $isUpdate = $_GET['isUpdate'];

  $sqlCartQuery = "SELECT * FROM carts WHERE usr_id = $user_id AND prod_id = $p_id";
  $resCartQuery = mysqli_query($con, $sqlCartQuery);
  $CartRow = mysqli_fetch_assoc($resCartQuery);

  if ($isUpdate == 0) { // decrease cart item
    $qty = $CartRow['cart_qty'] - 1;
  }
  if ($isUpdate == 1) { // increase cart item
    $qty = $CartRow['cart_qty'] + 1;
  }

  $sqlCartCmd = "UPDATE carts SET cart_qty = $qty WHERE usr_id = $user_id AND prod_id = $p_id";
  $resCartCmd = mysqli_query($con, $sqlCartCmd);


  if ($resCartCmd && $qty > 0) {
    header('refresh:0; url=../page/users/cart.php');
  } else if ($resCartCmd && $qty <= 0) {
    header('refresh:0; url=./delCartItem.php?p_id=' . $p_id);
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
}
