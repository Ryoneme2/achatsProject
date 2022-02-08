<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

require_once "../config/dbcon.php";

$name = $_POST['name'];
$sername = $_POST['sername'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$phone = $_POST['phone'];
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


$tmp_name = $_FILES["profile"]["tmp_name"];

$t = explode('.', $profile); // split name and type ( image.jpg => Array( [0]->image, [1]->jpg ))
$type = end($t); //stored late array of $t

// Create temp path
// $type = pathinfo($tmp_name, PATHINFO_EXTENSION);
$data = file_get_contents($tmp_name);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
// echo $base64;



// // Get all the submitted data from the form
$sql = "INSERT INTO achats (usr_name,usr_sername,usr_username,usr_email,usr_password,usr_address,usr_phone,usr_photo)
VALUES('$name','$sername','$username','$email','$password','$address','$phone','$base64')";

// Execute query
$result = mysqli_query($con, $sql);

if ($result) {

  echo "<script>
          console.log('test');
          $(document).ready(function() {
            Swal.fire({
              title: 'success',
              text: 'Signed up',
              icon: 'success',
              timer: 5000,
              showConfirmButton: false
            });
          })
        </script>";

  header('refresh:1; url=../page/users/signin.php');
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
  header('refresh:1; url=../page/users/signup.php');
}
