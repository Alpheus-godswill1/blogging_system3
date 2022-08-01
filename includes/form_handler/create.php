<?php
// connection to database
   $sql = new mysqli("Localhost","root","","content_management_system") or die("Could not connect".mysqli_error($connect));

   //Array used for purpose of the array_push() function.
   $error = [];

 //When everything is set and the buttton is clicked
   if(isset($_POST['create_submit_btn'])) {
     $cms_username = polish($_POST['cms_username']);
    $cms_email = polish($_POST['cms_email']);
   $cms_password = $_POST['cms_password'];

   //This part check whether any field is empty, and if any field is found empty is returns the array_push() funtion.
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
      // This is used for the  profile picture of the user. Using the rand() function.
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

     //The md5 function is used to hash any thing string,integers used as a password.
        $hashed_Password = md5($cms_password);

        // This query is used to send data to the database.Table = auth_users().
        $sqlQuery = "INSERT INTO auth_users(username,email,user_password,user_profile_pic,user_active,post_id,title	
        ) VALUES('$cms_username','$cms_email','$hashed_Password','$profile_pic','yes','0','Admin')";

        // Used to check when the connection  and query is working properly.
        $result = mysqli_query($sql,$sqlQuery);
        header("Location: ../../cms-admin.php?admin_created");
       }
      }
       }

      // This function is used for the purpose of making the strings and gotten data more stronger, and hard to brutefore or manipulate by attackers. 
  function polish($used_word) {
       global $sql;
       $used_word = htmlspecialchars($used_word);
       $used_word = mysqli_real_escape_string($sql, $used_word);
       $used_word = stripslashes($used_word);
       $used_word = strip_tags($used_word);
    return $used_word;
   }
