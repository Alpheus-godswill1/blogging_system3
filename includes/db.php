<?php

$db_host = "Localhost";
$db_user = "root";
$db_pass = "";
$db_name = "content_management_system";

$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$connect) {
  die("Could'nt connect to the database " . mysqli_error($connection));
}
