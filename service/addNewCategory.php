<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();

if ($_SESSION['isLogin'] && $_SESSION['role'] == 'admin') {

  require_once "../config/dbcon.php";

  $cat_name = $_POST['new_cata'];
  $cat_photo = $_FILES['cat_photo']['name'];

  $tmp_name = $_FILES["cat_photo"]["tmp_name"];

  $t = explode('.', $cat_photo); // split name and type ( image.jpg => Array( [0]->image, [1]->jpg ))
  $type = end($t); //stored late array of $t
  $data = file_get_contents($tmp_name);
  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  // echo $base64;

  $sql = "INSERT INTO catagory (cata_name,cata_photo) VALUES ('$cat_name','$base64')";
  // echo $sql;



  // Execute query
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo "<script>
            $(document).ready(function() {
              Swal.fire({
                title: 'success',
                text: 'Category added',
                icon: 'success',
                timer: 5000,
                showConfirmButton: false
              });
            })
          </script>";
    header('refresh: 1; url=../page/admin/category.php');
  } else {
    echo "<script>
            $(document).ready(function() {
              Swal.fire({
                title: 'error',
                text: 'Category added error',
                icon: 'error',
                timer: 5000,
                showConfirmButton: false
              });
            })
          </script>";
    header('refresh: 1; url=../page/admin/category.php');
  }
} else {
  echo "no session";
}
