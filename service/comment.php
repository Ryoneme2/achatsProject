<?php
session_start();

if ($_GET['comment-add'] == 'add' && $_SESSION['isLogin'] && $_SESSION['role'] == 'user') {

  require_once "../config/dbcon.php";

  $comment = $_GET['comment'];
  $p_id = $_GET['p_id'];
  $username = $_SESSION['usr_username'];

  $sqlCommentCmd = "INSERT INTO comment (comment_username,comment_context,prod_id) VALUES ('$username','$comment',$p_id)";
  // echo $sqlCommentCmd;

  $resCommentCmd = mysqli_query($con, $sqlCommentCmd);

  header('refresh:0; url=../page/users/productDetail.php?id=' . $p_id);
}
