<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

session_start();

require_once "../config/dbcon.php";

$name = $_POST['name'];
$sername = $_POST['sername'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$bank = $_POST['bank_acc'];

$profile = $_FILES['profile']['name'];
// echo "<br>" . $name . "<br>";
// echo "<br>" . $sername . "<br>";
// echo "<br>" . $username . "<br>";
// echo "<br>" . $email . "<br>";
// echo "<br>" . $password . "<br>";
// echo "<br>" . $address . "<br>";
// echo "<br>" . $phone . "<br>";

// echo $profile;
// TODO: check dupicated username


if (isset($profile)) {
  $sql = "UPDATE achats SET usr_name='$name',usr_sername='$sername',usr_email='$email',usr_address='$address',usr_phone='$phone',usr_bank_acc='$bank' WHERE usr_id=" . $_SESSION['usr_id'];
  // echo $sql;
} else {
  $tmp_name = $_FILES["profile"]["tmp_name"];

  $t = explode('.', $profile); // split name and type ( image.jpg => Array( [0]->image, [1]->jpg ))
  $type = end($t); //stored late array of $t

  // Create temp path
  // $type = pathinfo($tmp_name, PATHINFO_EXTENSION);
  $data = file_get_contents($tmp_name);
  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  // echo $base64;
  $sql = "UPDATE achats SET usr_name='$name',usr_sername='$sername',usr_email='$email',usr_address='$address',usr_phone='$phone',usr_bank_acc='$bank',usr_photo='$base64' WHERE usr_id=" . $_SESSION['usr_id'];
  // echo $sql;
}

// // Get all the submitted data from the form


// Execute query
$result = mysqli_query($con, $sql);

if ($result) {

  echo "<script>
          console.log('test');
          $(document).ready(function() {
            Swal.fire({
              title: 'success',
              text: 'Updated data',
              icon: 'success',
              timer: 5000,
              showConfirmButton: false
            });
          })
        </script>";

  header('refresh:1; url=../page/users/manageAccount.php');
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
  header('refresh:1; url=../page/users/manageAccount.php');
}
