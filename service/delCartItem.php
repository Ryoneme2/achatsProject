<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();

if ($_SESSION['isLogin'] && $_SESSION['role'] == 'user') {

  require_once "../config/dbcon.php";


  $p_id = $_GET['p_id'];
  $user_id = $_SESSION['usr_id'];

  $sqlCartQuery = "DELETE FROM carts WHERE usr_id = $user_id AND prod_id = $p_id";
  $resCartQuery = mysqli_query($con, $sqlCartQuery);

  $_SESSION['user_cart_num'] = $_SESSION['user_cart_num'] - 1;


  if ($resCartQuery) {
    header('refresh:0; url=../page/users/cart.php');
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
