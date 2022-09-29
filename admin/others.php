<?php 
include "includes/db.php";

function getNumPosts(){
    global $connect;
    $query = mysqli_query($connect, "SELECT * FROM posts");
    $rows = mysqli_num_rows($query);
    if($rows > 0){
        return $rows;
    }
    return false;
}

function getNumComments(){
    global $connect;
    $query = mysqli_query($connect, "SELECT * FROM auth_comment");
    $rows = mysqli_num_rows($query);
    if($rows > 0){
        return $rows;
    }
    return false;
}

function getNumUsers(){
    global $connect;
    $query = mysqli_query($connect, "SELECT * FROM auth_users");
    $rows = mysqli_num_rows($query);
    if($rows > 0){
        return $rows;
    }
    return false;
}

function getNumCategories(){
    global $connect;
    $query = mysqli_query($connect, "SELECT * FROM categories");
    $rows = mysqli_num_rows($query);
    if($rows > 0){
        return $rows+1;
    }
    return false;
}