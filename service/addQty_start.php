<?php
session_start();

if ($_SESSION['isLogin'] && $_SESSION['role'] == 'user') {

  $p_id = $_GET['p_id'];
  $isUpdate = $_GET['isUpdate'];

  if ($isUpdate == 1) {
    $_SESSION['qty_start' . $p_id] = $_SESSION['qty_start' . $p_id] + 1;
  } else {
    if ($_SESSION['qty_start' . $p_id] != 1) {
      $_SESSION['qty_start' . $p_id] = $_SESSION['qty_start' . $p_id] - 1;
    }
  }

  header('refresh:0; url=../page/users/productDetailV2.php?id=' . $p_id);
}
