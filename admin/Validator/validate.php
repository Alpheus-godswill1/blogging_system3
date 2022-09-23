<?php
include "../includes/db.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $image = "./users/profile_pics/defaults/head_". rand(1,3).".png";
    $password = $_POST['password'];
    $message = "";
    $class = "alert alert";


    if (empty($username)) {
        $message = "<b>Username is required</b>";
        echo "<div class='$class-danger'>$message</div>";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "<b>Email is invalid</b>";
        echo "<div class='$class-danger'>$message</div>";
    }
    else if (empty($password) || strlen($password) <= 5) {
        $message = "<b>Password  is either too short or is required</b>";
        echo "<div class='$class-danger'>$message</div>";
    }
    else {
        $Hashedpassword = md5($password);
        $query = mysqli_query($connect, "INSERT INTO auth_users(username,email,user_password,user_profile_pic, user_active,title) VALUES('$username','$email','$Hashedpassword', '$image', 'Yes', '$role')");
    }
     global $query;
    if ($query) {
        $message = "<b>User Added</b>";
        echo "<div class='$class-success btn-block'>$message</div>";
    }
}





?>