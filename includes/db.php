<?php
// These're the names of the login details to the database.
// First, is the host.
$db_host = "Localhost";
// Second, is the username
$db_user = "root";
//Third, is the password using XAMPP control panel it is usually empty but on a live server it must be gotten
$db_pass = "";
//Name of the database being used.
$db_name = "content_management_system";

//Script checking if there connection is working properly.
$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Script written incase there is something wrong with the connection, then the script should be killed.
if (!$connect) {
  die("Could'nt connect to the database " . mysqli_error($connection));
}
