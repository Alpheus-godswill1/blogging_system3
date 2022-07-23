<?php
  include "db.php";
  ?>
  <?php

function  add_category(){
  //global variable declaration
  global $connect;

  //button is being clicked
  if(isset($_POST['cat_in'])){
  
    //check if data field is empty.
    if (empty($_POST['cat_tit'])) {
      echo"<script>alert('This field cannot be empty')</script>";

      //redirecting to page if data field is empty and submitted
      header("Location: ../categories.php?Field_cannot_be_empty");
    }else{

      //getting data from field in form
      $cat_tit = $_POST['cat_tit'];

      // inserting data into database.table 
      $sql = "INSERT INTO `categories`(cat_title) VALUES('$cat_tit')";
      $result = mysqli_query($connect,$sql);

      //Validating the script is working properly
      if(!$result){

        //killing script if anything goes wrong
        die("something went wrong check code ".mysqli_error($connect));
      }else{
        //redirecting to the correct url if the whole process passes
        header("Location: ../categories.php?data_inserted_successfully_into_database.");
      }

    }
  }
}
//calling function
add_category();


function call_category(){
  //declaring a global variable
 global $connect;

 //SQL query for pulling data from database.tabel
 $sql = "SELECT * FROM categories";

 //making sure query is well written an connected properly
 $result = mysqli_query($connect,$sql);

 //using while loops to get data from database.table
  while ($row = mysqli_fetch_assoc($result)) {
    $cat_id = $row['cat_id'];
    $cat_tit = $row['cat_title'];

    echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_tit}</td>";
        echo "<td><a href='categories.php?delete_cat={$cat_id}'>Delete</a></td>";
    echo "</tr>";
  }
}



function delete_cats(){
  //declaring global variable
  global $connect;

  //getting data from url
  if(isset($_GET['delete_cat'])){
    
    //variable from the url
    $cat_id_del = $_GET['delete_cat'];

    //query to delete the file gotten from the url
    $sql = "DELETE FROM categories WHERE cat_id = '$cat_id_del' ";

    //making sure the $connection is running properly
    $result = mysqli_query($connect,$sql);

    //checking if anything has gone wrong when writing this code
    if (!$result) {
      die("Couldn't_delete_this_category_property_due_to_unwarranted_problems".mysqli_error($connect));
    }else{

      //if everything ran properly, then the page will be redirected to this url.
      header("Location: ../admin/categories.php?category_property_was_successfully_deleted");
    }
  }
}
delete_cats();

function insertPostData(){
  //declaring global connection to the database.
  global $connect;
  if (isset($_POST['push_post'])) {
    //getting other files from the form.
    $post_title = mysqli_real_escape_string($connect,$_POST['title']);
    $post_author =  mysqli_real_escape_string($connect,$_POST['author']);
    $post_category =  mysqli_real_escape_string($connect,$_POST['categ']);
    $post_category_id =  mysqli_real_escape_string($connect,$_POST['categ_id']);
    $post_content =  mysqli_real_escape_string($connect,$_POST['content']);
    $post_tags =  mysqli_real_escape_string($connect,$_POST['taggs']);
    $post_status =  mysqli_real_escape_string($connect,$_POST['status']);
    $post_date = date('l: d: F: Y');
    $post_views = 0;
    $post_comment_count = 0;

    //getting image files from form
    if (isset($_FILES['images'])) {
      $location = "../images/";
      $file = $location.basename($_FILES['images']['name']);

      //using javascript to check if files has been uploaded successfully.
      if (move_uploaded_file($_FILES['images']['tmp_name'],$file)) {
        echo "<script>alert('Image_Uploaded_Successfully')</script>";
      }else {
        echo "<script>alert('Image_Was_Not_Uploaded_Successfully')</script>";
      }
    }
    //Inserting data into database.posts table 
    $sql = "INSERT INTO `posts`(post_title,post_category,post_category_id,post_author,post_content,post_date,post_image,post_comment_count,post_views,post_tags,post_status) VALUES('$post_title','$post_category','$post_category_id','$post_author','$post_content','$post_date','$file','$post_comment_count','$post_views','$post_tags','$post_status')";
    $result = mysqli_query($connect,$sql);

    //checking if anything goes wrong,then the script should be killed immediately
    if (!$result) {
     die("Couldn't_send_data_to_database.posts_tabel".mysqli_error($connect));
    }else {
      header("Location: ../posts.php?rule=add_one_more");
    }

  }

}
insertPostData();


//READ POST : C R UD
function display_posts(){
  //declaring a global connection to database;
  global $connect;

    //query to pull data from  the database.posts table 
  $sql = "SELECT * FROM posts";
  $result = mysqli_query($connect,$sql);

  //checking if anything goes wrong,then the script should be killed immediately
  if (!$result) {
    die("Couldn't_send_data_to_database.posts_tabel".mysqli_error($connect));
  }else {
    //using the while loop to get data from database.posts table 
  while ($row = mysqli_fetch_assoc($result)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_category = $row['post_category'];
    $post_category_id = $row['post_category_id'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $date = $row['post_date'];
    $post_views = $row['post_views'];
    $post_comment_count = $row['post_comment_count'];

    //echoing out the data in this style.

    echo "<tr>";
    echo "<td>{$post_id}</td>";
    echo "<td>{$post_title}</td>";
    echo "<td>{$post_author}</td>";
    echo "<td>{$post_category}</td>";
    echo "<td>{$post_status}</td>";
    echo "<td><img src='images/{$post_image}' width='50px'></td>";
    echo "<td>{$post_content}</td>";
    echo "<td>{$date}</td>";
    echo "<td>{$post_tags}</td>";
    echo "<td>{$post_comment_count}</td>";
    echo "<td>{$post_views}</td>";
    echo "<td><a href='posts.php?approve_post=$post_id'>Approve</a></td>";
    echo "<td><a href='posts.php?unapprove_post=$post_id'>Unapprove</a></td>";
    echo "<td><a href='posts.php?edit_post=$post_id'>Edit</a></td>";
    echo "<td><a href='posts.php?delete_post=$post_id'>Delete</a></td>";
    echo "</tr>";
  }

  }
}
