<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

require_once "../config/dbcon.php";

$idSeller = $_GET['id'];
$isAllow = filter_var($_GET['allow'], FILTER_VALIDATE_BOOLEAN);


if ($isAllow) {

  $sqlCmd = "UPDATE seller_info SET isApprove = 1 WHERE seller_id = '" . $idSeller . "'";

  // echo $sqlCmdInsert;

  $isDone = mysqli_query($con, $sqlCmd);
  if ($isDone) {

    echo "<script>
          console.log('test');
          $(document).ready(function() {
            Swal.fire({
              title: 'success',
              text: 'Appproved',
              icon: 'success',
              timer: 5000,
              showConfirmButton: false
            });
          })
        </script>";

    header('refresh:1; url=../page/admin/waitingList.php');
  } else {
    echo "<script>
        console.log('test');
        $(document).ready(function() {
          Swal.fire({
            title: 'Oops!!',
            text: 'Something went wrong! Please try again',
            icon: 'error',
            showConfirmButton: false
        });
        })
      </script>";

    header('refresh:1; url=../page/admin/waitingList.php');
  }
} else {

  //not insert to seller_info but delete
  echo 'else';
}
