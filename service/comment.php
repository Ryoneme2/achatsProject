<?php
session_start();

/* The user is logged in, and the user is a user.

The user has clicked the "Add Comment" button.

The comment is stored in the ['comment'] variable.

The product ID is stored in the ['p_id'] variable.

The username is stored in the ['usr_username'] variable.

The SQL command to add the comment is stored in the  variable.

The result of the SQL command is stored in the  variable.

The */
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
