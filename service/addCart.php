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
  $p_size = $_GET['size'];
  $p_qty = $_SESSION['qty_start' . $p_id];
  $user_id = $_SESSION['usr_id'];

  $sqlCartQuery = "SELECT * FROM carts WHERE usr_id = $user_id AND prod_id = $p_id";
  $resCartQuery = mysqli_query($con, $sqlCartQuery);
  $numCartRow = mysqli_num_rows($resCartQuery);
  $CartRow = mysqli_fetch_assoc($resCartQuery);

  // in case add first time
  if ($numCartRow == 0) {
    $sqlCartCmd = "INSERT INTO carts (usr_id,prod_id,cart_type,cart_size,cart_qty) VALUES ($user_id,$p_id,'$p_type','$p_size',$p_qty)";
    $resCartCmd = mysqli_query($con, $sqlCartCmd);
    $_SESSION['user_cart_num'] = $_SESSION['user_cart_num'] + 1;
    // echo "1 " . $sqlCartCmd;
  } else if ($p_qty > 1) { // in case add more than 1 and exist in cart
    $qty = $CartRow['cart_qty'] + $p_qty;

    $sqlCartCmd = "UPDATE carts SET usr_id = $user_id , prod_id = $p_id , cart_qty = $qty WHERE usr_id = $user_id AND prod_id = $p_id";
    $resCartCmd = mysqli_query($con, $sqlCartCmd);
    // echo "2 " . $sqlCartCmd;
  } else { // in case add more 1 and exist in cart
    $qty = $CartRow['cart_qty'] + 1;

    $sqlCartCmd = "UPDATE carts SET usr_id = $user_id , prod_id = $p_id , cart_qty = $qty WHERE usr_id = $user_id AND prod_id = $p_id";
    $resCartCmd = mysqli_query($con, $sqlCartCmd);
    // echo "3 " . $sqlCartCmd;
  }


  if ($resCartCmd) {

    $_SESSION['qty_start' . $p_id] = 1;

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

    if ($_GET['addResult'] == 'buy now') {
      header('refresh:1; url=../page/users/cart.php');
    } else {
      header('refresh:1; url=../page/users/productDetailV2.php?id=' . $p_id);
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
    header('refresh:1; url=../page/users/productDetailV2.php?id=' . $p_id);
  }
}
