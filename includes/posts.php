<?php
//query to get the data gotten from the database.posts table
$sql= "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_id DESC";

//making sure the connection is running properly
$result = mysqli_query($connect, $sql);

//get the number of rows in the database.posts table
$span = mysqli_num_rows($result);


//checking if anything goes wrong,then the script should be killed immediately
if (!$result) {
  die("Couldn't_call_data_from_database.posts_table".mysqli_error($connect));
}
else {
  //using the while loop to get data from database.posts table 
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
  $post_date = $row['post_date'];
  $post_views = $row['post_views'];
  $post_comment_count = $row['post_comment_count'];

  ?>
     <!-- echoing out the data in this style. -->
  <div class="col-md-6">
    <a href="single.php?post_id=<?php echo $post_id; ?>&post_title=<?php echo $post_title;?>&post_content=<?php echo $post_content;?>&post_author=<?php echo $post_author;?>
    " class="blog-entry element-animate" data-animate-effect="fadeIn">
      <img src="admin<?php echo $post_image;?>" alt="Image Posts">
      <div class="blog-content-body">
        <div class="post-meta">
          <span class="author mr-2"><?php echo $post_author;?></span>&bullet;
          <span class="mr-2"><?php echo $post_date;?> </span> &bullet;
          <span class="ml-2"><span class="fa fa-comments"></span> <?php echo $post_comment_count;?></span>
        </div>
        <h2><?php echo $post_title;?></h2>
      </div>
    </a>
  </div>

<?php
}
}
 ?>
