<?php
session_start();

if ($_SESSION['isLogin'] && $_SESSION['role'] == 'user') {

  require_once "../config/dbcon.php";

  $p_id = $_GET['p_id'];

  // echo $p_id;
  if (isset($_SESSION['compare_product'][0])) {
    for ($i = 0; $i < count($_SESSION['product_compare']); $i++) {
      if ($_SESSION['product_compare'][$i] == $p_id) {
        unset($_SESSION['product_compare'][$i]);
      }
    }
  } else {
    for ($i = 1; $i <= count($_SESSION['product_compare']); $i++) {
      if ($_SESSION['product_compare'][$i] == $p_id) {
        unset($_SESSION['product_compare'][$i]);
      }
    }
  }


  print_r($_SESSION['product_compare']);

  header('refresh:0; url=../page/users/compareProd.php');
}
