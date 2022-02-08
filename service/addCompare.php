<?php
session_start();

if ($_SESSION['isLogin'] && $_SESSION['role'] == 'user') {

  require_once "../config/dbcon.php";

  $p_id = $_GET['p_id'];

  // echo $p_id;

  if (!in_array($p_id, $_SESSION['product_compare']) && count($_SESSION['product_compare']) < 3) {
    array_push($_SESSION['product_compare'], $p_id);
  }

  print_r($_SESSION['product_compare']);

  header('refresh:0; url=../page/users/productDetail.php?id=' . $p_id);
}
