<?php
$db_server = "Localhost";
$db_user = "root";
$db_pass = "";
$db_name = "content_management_system";

$connect = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
if(!$connect){
  die("couldnot connect to database due to some fatal_errors". mysqli_error($connect));
}
