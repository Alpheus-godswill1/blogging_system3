<?php
 include "db.php";

function display_categories(){
    //declaring global connection to the database.
    global $connect;

    //query to delete the file gotten from the url
    $sql = "SELECT * FROM categories ORDER BY cat_id DESC LIMIT 2 ";

    //making sure the $connection is running properly
    $result = mysqli_query($connect,$sql);

    // Making sure nothing is wrong with the $result variable
    if (!$result) {    
  //ensuring if anything goes wrong with the $result variable the script should be killed.
        die("Could_not_connect_to_database_to_fetch_data_from_it.".mysqli_error($connect));
    }else{
    //using the while loop to get data from database.categories table 
        while ($row= mysqli_fetch_assoc($result)) {

    //echoing out the data in this style.
            $cat_id = $row['cat_id'];
            $cat_tit = $row['cat_title'];
            echo "<li class='nav-item dropdown'><a class='nav-link' href='category.php?cat_id=$cat_id'>{$cat_tit}</a></li>";
        }
    }

}




 ?>
