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

  $sql = "SELECT usr_photo FROM achats";

  $result = mysqli_query($con, $sql);

  $row = mysqli_fetch_assoc($result);

  ?>

  <img src="<?php echo $row['usr_photo'] ?>" alt="">
</body>

</html>