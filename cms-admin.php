<?php
// function used for incuding the file or script into another file or script.
  include 'includes/header.php';
  // query used to get data from database.Table(auth_users) 
  $sql = "SELECT * FROM auth_users";

  // used to check the connection and the query are working perfectly well.
   $result = mysqli_query($connect,$sql);
  //  Number of rows in the database.Table(auth_users).
   $rows = mysqli_num_rows($result);

  //  These is where the magic happens:
  // If $rows variable is empty the user would be shown a register UI so their data will be collected 
   if( $rows === 0) {
   include './create_admin.php';
   }else{
    // If $rows variable of the database.Table(auth_users) is not empty the user will login because the user has already created an account with us.
     include './login.php';
   }

   