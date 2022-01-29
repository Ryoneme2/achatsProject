<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require_once '../config/dbcon.php';

$id = $_GET['id'];

$sql = 'DELETE FROM product WHERE prod_id =' . $id;

$result = mysqli_query($con, $sql);

if ($result) {

  echo "<script>
          console.log('test');
          $(document).ready(function() {
            Swal.fire({
              title: 'success',
              text: 'Deleted Product',
              icon: 'success',
              timer: 5000,
              showConfirmButton: false
            });
          })
        </script>";

  header('refresh:1; url=../page/seller/dashboard.php');
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
  header('refresh:1; url=../page/seller/dashboard.php');
}
