<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php

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

header("refresh:2; url=./admin/approving.php");
?>