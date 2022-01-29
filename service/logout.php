<?php

session_destroy();

echo "<script>
          console.log('test');
          $(document).ready(function() {
            Swal.fire({
              title: 'success',
              text: 'Logout Succestfully',
              icon: 'success',
              timer: 5000,
              showConfirmButton: false
            });
          })
        </script>";

header('refresh: 2; url=../page/seller/signin.php');
