<?php 
session_start();
include "includes/db.php";
$cms_email = $_SESSION['user_logged_in'];

if (isset($_POST['text'])) {
    $text = $_POST['text'];
    $password2bchecked = md5($text);
    $query = mysqli_query($connect, "SELECT user_password FROM auth_users WHERE email='$cms_email'");
    $data = mysqli_fetch_array($query);
    $password4rmDB = $data['user_password'];

    if( $password4rmDB === $password2bchecked ){
        echo "<span class='text-success'>Password you entered matches!</span>";
    }else {
        echo "<span class='text-danger'>Password you entered did not match!</span>";
    }
}


?>