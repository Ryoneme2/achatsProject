<?php
session_start();

if ($_SESSION['isLogin'] && $_SESSION['role'] == 'user') {

  require_once "../config/dbcon.php";

  $p_id = $_GET['p_id'];

  $sqlCommentCmd = "DELETE FROM faverite_user WHERE prod_id = $p_id";
  // echo $sqlCommentCmd;

  $resCommentCmd = mysqli_query($con, $sqlCommentCmd);

  header('refresh:0; url=../page/users/productDetail.php?id=' . $p_id);
}
