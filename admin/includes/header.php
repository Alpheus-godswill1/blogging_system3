<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "db.php"; ?>
<?php include "functions.php"; ?>
<?php (isset($_SESSION['user_logged_in'])) ? $user_logged_in = $_SESSION['user_logged_in'] : header("Location: ../../blogging_system3/cms-admin.php?login_to_access_panel");
global $user_logged_in;
$sql =  "SELECT * FROM auth_users WHERE email='$user_logged_in'";
 $result = mysqli_query($connect, $sql);
 $pal = 0;
if ($pal === 0) {
   while ($row = mysqli_fetch_array($result)) {
    $cms_username = $row['username'];
    $user_profile_pic = $row['user_profile_pic'];
    $title = $row['title'];
   }
}

 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administration Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

<body>
