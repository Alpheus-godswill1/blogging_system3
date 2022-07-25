<div class="sidebar-box">
  <h3 class="heading">Recent Posts</h3>
  <div class="post-entry-sidebar">
    <ul>
<?php
//query to get the data gotten from the database.posts table, but with a limit which is 4.
$query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 4";

//making sure the connection is running properly
$result = mysqli_query($connect, $query);

//checking if anything goes wrong,then the script should be killed immediately
if (!$result) {
  die("Couldn't_call_data_from_database.posts_table".mysqli_error($connect));
}else {

     //using the while loop to get data from database.categories table
  while($row = mysqli_fetch_assoc($result)){
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

  ?>
  <!-- echoing out the data in this style. -->
      <li>
        <a href="./single.php?post_id=<?php echo $post_id; ?>&post_title=<?php echo $post_title;?>&post_content=<?php echo $post_content;?>">
          <img src="admin/images/<?php echo $post_image;?>" alt="Image placeholder" class="mr-4">
          <div class="text">
            <h4><?php echo $post_title;?></h4>
            <div class="post-meta">
              <span class="mr-2"><?php echo $date;?> </span>
            </div>
          </div>
        </a>
      </li>
<?php }
}
 ?>

 </ul>
 </div>
 </div>
