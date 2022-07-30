<!-- function used to start a session  -->
<?php  session_start(); ?>
<!-- connection to the database and the server -->
<?php include "db.php"; ?>
<!-- The function file thats contain a function used in these project backend in the includes/ path -->
<?php include "function.php"; ?>
<!-- This is the folder or path that contains the comment.php class script for the whole functionality of the comment. -->
<?php include "./classes/comment.php"?>
<!-- This is how a class is instantiated or declared or called. -->
<?php  $New_comment_call = new authorityComments($connect); ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Blogging System &mdash; Minimal Blog Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
