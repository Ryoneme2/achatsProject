<?php

session_start();

// TODO : save all liked prod and carts
/* If the user is a user, redirect them to the user sign in page. If the user is a seller, redirect
them to the seller sign in page. If the user is an admin, redirect them to the admin sign in page. */

if ($_SESSION['role'] == 'user') {
  header('refresh: 1; url=../page/users/signin.php');
}
if ($_SESSION['role'] == 'seller') {
  header('refresh: 1; url=../page/seller/signin.php');
}
if ($_SESSION['role'] == 'admin') {
  header('refresh: 1; url=../page/admin/signin.php');
}

session_destroy();
