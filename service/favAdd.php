<?php
session_start();

if ($_SESSION['isLogin'] && $_SESSION['role'] == 'user') {

  require_once "../config/dbcon.php";

  $p_id = $_GET['p_id'];
  $user_id = $_SESSION['usr_id'];

  $sqlCommentCmd = "INSERT INTO faverite_user (usr_id,prod_id) VALUES ($user_id,$p_id)";

  $resCommentCmd = mysqli_query($con, $sqlCommentCmd);

  header('refresh:0; url=../page/users/productDetail.php?id=' . $p_id);
}
