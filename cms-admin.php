<?php
  include 'includes/header.php';
  $sql = "SELECT * FROM auth_users";
   $result = mysqli_query($connect,$sql);
   $rows = mysqli_num_rows($result);
   if( $rows === 0) {
   include './create_admin.php';
   }else{
     include './login.php';
   }

   