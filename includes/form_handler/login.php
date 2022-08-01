<?php
// function used to start a session  
 session_start();

// connection to database
 $sql = new mysqli("Localhost","root","","content_management_system") or die("Could not connect".mysqli_error($connect));
 
 //When everything is set and the buttton is clicked
if(isset($_POST['login_submit_button'])) {
  $cms_email = mysqli_real_escape_string($sql,$_POST['cms_email']);
  $cms_password = mysqli_real_escape_string($sql,$_POST['cms_password']);

  //Query to collect all the data from database.Table = auth_users and equate the email to the email gotten from the database email.
     $sqlQuery = "SELECT * FROM auth_users WHERE email='$cms_email'";
     $result =  mysqli_query($sql,$sqlQuery);
     $row = mysqli_fetch_assoc($result);
     $db_email = $row['email'];
     $db_password = $row['user_password'];
     $profile_pic = $row['user_profile_pic'];
     $cms_username = $row['username'];

     //The md5 function is used to hash any thing string,integers used as a password.
    $rehash_password = md5($cms_password);
  

  //  These script helps compares the gotten hashed password with the password from the user , and if there're similar the user is directed to the admin panel.
  if($cms_email === $db_email && $db_password === $rehash_password) {
     $_SESSION['user_logged_in'] = $cms_email;
     $_SESSION['profile_pic'] = $profile_pic;
     $_SESSION['username'] = $cms_username;
     header("Location: ../../admin");
        }
        //This occurs when the script or user password fails.
        else{
    $_SESSION['log_email'] = $cms_email;
    header("Location: ../../cms-admin.php?wrong_entries");
  }
}
