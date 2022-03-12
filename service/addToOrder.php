<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();

if ($_SESSION['isLogin'] && $_SESSION['role'] == 'user') {

  require_once "../config/dbcon.php";

  $isError = false;

  $getCartSql = "SELECT * FROM carts WHERE usr_id = " . $_SESSION['usr_id'];
  $getCartQuery = mysqli_query($con, $getCartSql);

  // insert all rows getCartQuery into orders table
  while ($row = mysqli_fetch_assoc($getCartQuery) && !$isError) {
    $insertOrderSql = "INSERT INTO orders (prod_id, usr_id, order_type, order_size, order_qty, order_address) 
    VALUES (" . "'$row[prod_id]'" . "," . "'$row[usr_id]'" . "," . "'$row[cart_type]'" . "," . "'$row[cart_size]'" . "," . "'$row[cart_qty]'" . ",'" . $_SESSION['address'] . "')";
    echo $insertOrderSql . "<br><br>";
    $insertOrderQuery = mysqli_query($con, $insertOrderSql);

    /* This is a way to check if the query is successful or not. */
    if (!$insertOrderQuery) {
      $isError = true;
    }
  }
  if (!$isError) {
    /* This is deleting all rows in carts table where usr_id = ['usr_id'] */
    $deleteCartSql = "DELETE FROM carts WHERE usr_id = " . $_SESSION['usr_id'];
    $deleteCartQuery = mysqli_query($con, $deleteCartSql);
    if (!$deleteCartQuery) {
      $isError = true;
    }
  }



  if (!$isError) {

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
