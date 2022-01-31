<?php
session_start();

if ($_GET['comment-add'] == 'add' && $_SESSION['isLogin'] && $_SESSION['role'] == 'user') {


  $comment = $_GET['comment'];
  $p_id = $_GET['p_id'];
  $username = $_SESSION['usr_username'];

  $sqlCommentCmd = "INSERT INTO comment (comment_username,comment_context,prod_id) VALUES ('$username','$comment',$p_id)";

  $resCommentCmd = mysqli_query($con, $sqlCommentCmd);

  header('refresh:1; url=./productDetail.php?id=' . $p_id);
}
