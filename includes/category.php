<?php include "db.php"?>
<?php
//query to get the data gotten from the database.categories table, but with a limit which is 4.
$sql = "SELECT * FROM categories ORDER BY cat_id DESC LIMIT 4";

//making sure the connection is running properly
$result = mysqli_query($connect,$sql);


//checking if anything goes wrong,then the script should be killed immediately
if (!$result) {
  die("Couldn't_call_data_from_database.categories table".mysqli_error($connect));
}
?>
<div class="sidebar-box">
  <h3 class="heading">Categories</h3>
  <ul class="categories">
    <?php
     //using the while loop to get data from database.categories table
    while ($row = mysqli_fetch_assoc($result)) {
      $cat_id = $row['cat_id'];
      $cat_tit = $row['cat_title'];
      $sql = mysqli_query($connect, "SELECT * FROM posts WHERE post_category_id=$cat_id");
      $span = mysqli_num_rows($sql);

      //  echoing out the data in this style. 
      echo "<li><a href='category.php?cat_id=$cat_id'>$cat_tit<span>($span)</span></a></li>";
    }
    ?>
  </ul>
</div>
