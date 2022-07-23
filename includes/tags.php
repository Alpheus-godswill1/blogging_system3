<?php
//query used to get data from database.posts
$sql = "SELECT * FROM posts ORDER BY post_id LIMIT 5";

//making sure the query and the connection are working properly
$result = mysqli_query($connect, $sql);


// Making sure nothing is wrong with the $result variable
if (!$result) {
  //ensuring if anything goes wrong with the $result variable the script should be killed.
  die("Couldn't_connect_to_database.posts_to_pick_the_data_needed".mysqli_error($connect));
}else {
 ?>

<div class="sidebar-box">
  <h3 class="heading">Tags</h3>
  <ul class="tags">
    <?php
      while($row = mysqli_fetch_assoc($result)){
        $tags = explode('%',$row['post_tags']);
        ?>
         <!-- Using the foreach loop to change the variable $tags to $mini  -->
          <?php foreach($tags as $mini) {
             echo "<li><a href=''>$mini</a></li>";
              }
              ?> 
              <?php }
            }
     ?>

  </ul>
</div>
