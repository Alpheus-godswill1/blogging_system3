<?php
   $sql = new mysqli("Localhost","root","","content_management_system") or die("Could not connect".mysqli_error($connect));
   $error = [];
   
   if(isset($_POST['create_submit_btn'])) {
     $cms_username = polish($_POST['cms_username']);
    $cms_email = polish($_POST['cms_email']);
   $cms_password = $_POST['cms_password'];

    if(empty($cms_username)) {
       array_push($error, "<p class='alert alert-danger'>Username is required</p>");
       header("Location: ../../cms-admin.php?error=Username_is_required");
      }elseif (!filter_var($cms_email, FILTER_VALIDATE_EMAIL)) {
        array_push($error, "<p class='alert alert-danger'>Email is invalid</p>");
        header("Location: ../../cms-admin.php?error=Email_is_invalid");
      }elseif (empty($cms_email)) {
        array_push($error, "<p class='alert alert-danger'>Email is required</p>");
        header("Location: ../../cms-admin.php?error=Email_is_required");
      }elseif (strlen($cms_password) <= 4) {
        array_push($error, "<p class='alert alert-danger'>Password is short</p>");
        header("Location: ../../cms-admin.php?error=password_is_short");
          }
    else{
      if(empty($error)){
        $uniqRand = rand(1,3);
        switch ($uniqRand) {
          case 1:
            $profile_pic = "./admin/users/profile_pics/defaults/head_1.png";
            break;
          case 2:
            $profile_pic = "./admin/users/profile_pics/defaults/head_2.png";
            break;
          case 3:
            $profile_pic = "./admin/users/profile_pics/defaults/head_3.png";
            break;
        }
        $hashed_Password = md5($cms_password);
        $sqlQuery = "INSERT INTO auth_users(username,email,user_password,user_profile_pic,user_active,post_id,title	
        ) VALUES('$cms_username','$cms_email','$hashed_Password','$profile_pic','yes','0','Admin')";
        $result = mysqli_query($sql,$sqlQuery);
        header("Location: ../../cms-admin.php?admin_created");
       }
      }
       }
  function polish($used_word) {
       global $sql;
       $used_word = htmlspecialchars($used_word);
       $used_word = mysqli_real_escape_string($sql, $used_word);
       $used_word = stripslashes($used_word);
       $used_word = strip_tags($used_word);
    return $used_word;
   }
