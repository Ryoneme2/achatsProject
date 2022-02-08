<?php

session_start();

/* If the user is logged in and is a user, redirect to the user index page. Otherwise, redirect to the
sign in page. */

if ($_SESSION['isLogin'] && $_SESSION['role'] == 'user') {
  header('Location: ./userIndex.php');
} else {
  header('Location: ./signin.php');
}
