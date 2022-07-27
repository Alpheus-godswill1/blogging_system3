<?php
 session_start();
 $sql = new mysqli("Localhost","root","","content_management_system") or die("Could not connect".mysqli_error($connect));
 $error = [];
if(isset($_POST['login_submit_button'])) {
  $cms_email = mysqli_real_escape_string($sql,$_POST['cms_email']);
  $cms_password = mysqli_real_escape_string($sql,$_POST['cms_password']);

     $sqlQuery = "SELECT * FROM auth_users WHERE email='$cms_email'";
     $result =  mysqli_query($sql,$sqlQuery);
     $row = mysqli_fetch_assoc($result);
     $db_email = $row['email'];
     $db_password = $row['user_password'];
     $profile_pic = $row['user_profile_pic'];

    $rehash_password = md5($cms_password);

  if($cms_email === $db_email && $db_password === $rehash_password) {
     $_SESSION['user_logged_in'] = $cms_email;
     $_SESSION['profile_pic'] = $profile_pic;
     header("Location: ../../admin");
        }else{
    $_SESSION['log_email'] = $cms_email;
    header("Location: ../../cms-admin.php?wrong_entries");
  }
}
