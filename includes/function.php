<?php
 include "db.php";

function display_categories(){
    global $connect;
    $sql = "SELECT * FROM categories ORDER BY cat_id DESC LIMIT 2 ";
    $result = mysqli_query($connect,$sql);
    if (!$result) {
        die("Could_not_connect_to_database_to_fetch_data_from_it.".mysqli_error($connect));
    }else{
        while ($row= mysqli_fetch_assoc($result)) {
            $cat_id = $row['cat_id'];
            $cat_tit = $row['cat_title'];
            echo "<li class='nav-item dropdown'><a class='nav-link' href='category.php?cat_id=$cat_id'>{$cat_tit}</a></li>";
        }
    }

}




 ?>
