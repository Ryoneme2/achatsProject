<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php

  require_once '../config/dbcon.php';

  $sql = "SELECT photo FROM test_table";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);

  $arr_photo = explode('-', $row['photo']);

  foreach ($arr_photo as $photo) {
  ?>
    <img src="<?php echo $photo ?>" alt="" width="200" height="200">
  <?php
  }

  ?>
</body>

</html>