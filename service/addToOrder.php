<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();

if ($_SESSION['isLogin'] && $_SESSION['role'] == 'user') {

  require_once "../config/dbcon.php";

  $isError = false;

  $getCartSql = "SELECT * FROM carts WHERE usr_id = " . $_SESSION['usr_id'];
  echo $getCartSql;

  $getCartQuery = mysqli_query($con, $getCartSql);

  // insert all rows getCartQuery into orders table
  while ($row = mysqli_fetch_assoc($getCartQuery)) {
    $insertOrderSql = "INSERT INTO orders (prod_id, usr_id, order_type, order_size, order_qty, order_address) 
    VALUES (" . "'$row[prod_id]'" . "," . "'$row[usr_id]'" . "," . "'$row[cart_type]'" . "," . "'$row[cart_size]'" . "," . "'$row[cart_qty]'" . ",'" . $_SESSION['address'] . "')";
    echo $insertOrderSql . "<br><br>";
    $insertOrderQuery = mysqli_query($con, $insertOrderSql);
    // check if insertOrderQuery is successful
    if (!$insertOrderQuery) {
      $isError = true;
      break;
    }
  }

  if (!$isError) {
    /* This is deleting all rows in carts table where usr_id = ['usr_id'] */
    $deleteCartSql = "DELETE FROM carts WHERE usr_id = " . $_SESSION['usr_id'];
    $deleteCartQuery = mysqli_query($con, $deleteCartSql);

    $_SESSION['user_cart_num'] = 0;
  }

  if ($deleteCartQuery) {

    echo "<script>
              console.log('test');
              $(document).ready(function() {
                Swal.fire({
                  title: 'success',
                  text: 'Order placed',
                  icon: 'success',
                  timer: 5000,
                  showConfirmButton: false
                });
              })
            </script>";

    header('refresh:1; url=../page/users/userIndex.php');
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
