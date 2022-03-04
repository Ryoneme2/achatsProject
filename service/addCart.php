<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();

if ($_SESSION['isLogin'] && $_SESSION['role'] == 'user') {

  require_once "../config/dbcon.php";

  /* If the user has not added the product to the cart, add it to the cart. If the user has added the
  product to the cart, update the cart. */
  $p_id = $_GET['p_id'];
  $p_type = $_GET['color'];
  $p_size = $_GET['type'];
  $p_qty = $_SESSION['qty_start'];
  $user_id = $_SESSION['usr_id'];

  $sqlCartQuery = "SELECT * FROM carts WHERE usr_id = $user_id AND prod_id = $p_id";
  $resCartQuery = mysqli_query($con, $sqlCartQuery);
  $numCartRow = mysqli_num_rows($resCartQuery);
  $CartRow = mysqli_fetch_assoc($resCartQuery);

  if ($numCartRow == 0) {
    $sqlCartCmd = "INSERT INTO carts (usr_id,prod_id,cart_type,cart_size,cart_qty) VALUES ($user_id,$p_id,'$p_type','$p_size',$p_qty)";
    $resCartCmd = mysqli_query($con, $sqlCartCmd);
    $_SESSION['user_cart_num'] = $_SESSION['user_cart_num'] + 1;
  } else {
    $qty = $CartRow['cart_qty'] + 1;

    $sqlCartCmd = "UPDATE carts SET usr_id = $user_id , prod_id = $p_id , cart_qty = $qty WHERE usr_id = $user_id AND prod_id = $p_id";
    $resCartCmd = mysqli_query($con, $sqlCartCmd);
  }

  if ($resCartCmd) {

    echo "<script>
              console.log('test');
              $(document).ready(function() {
                Swal.fire({
                  title: 'success',
                  text: 'Added to cart',
                  icon: 'success',
                  timer: 5000,
                  showConfirmButton: false
                });
              })
            </script>";

    header('refresh:1; url=../page/users/productDetailV2.php?id=' . $p_id);
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
    header('refresh:1; url=../page/users/productDetailV2.php?id=' . $p_id);
  }
}
