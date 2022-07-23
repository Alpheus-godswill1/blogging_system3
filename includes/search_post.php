<?php
if(isset($_POST['search_submit'])){
  $search_word = mysqli_real_escape_string($connect,$_POST['search_submit']);


    //query to pull data from  the database.posts, which will be used to cross-check the word search from the front page
  $search_result = "SELECT * FROM posts WHERE post_content LIKE '%$search_word%' OR post_date LIKE '%$search_word%' OR post_title LIKE '%$search_word%' OR post_tags LIKE '%$search_word%' OR post_author LIKE '%$search_word%' ";

    //making sure the $connection is running properly
  $result = mysqli_query($connect , $search_result);
  $resultRow = mysqli_num_rows($result);

  //checking if anything goes wrong,then the script should be killed immediately
  if (!$result) {
  //ensuring if anything goes wrong with the $result variable the script should be killed.
  die("Couldn't_connect_to_database.posts_to_pick_the_data_needed".mysqli_error($connect));
  }else {
    if ($resultRow > 0) {
      
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
        $date = $row['post_date'];
        $post_views = $row['post_views'];
        $post_comment_count = $row['post_comment_count'];

        ?>
   
   <!-- echoing out the data in this style. -->
      <div class="col-md-6">
        <a href="./single.php?post_id=<?php echo $post_id?>&post_title=<?php echo $post_title; ?>&post_content=<?php echo $post_content;?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
          <img src="admin/images/<?php echo $post_image;?>" alt="Image placeholder">
          <div class="blog-content-body">
            <div class="post-meta">
              <span class="author mr-2"><?php echo $post_author;?></span>&bullet;
              <span class="mr-2"><?php echo $date;?> </span> &bullet;
              <span class="ml-2"><span class="fa fa-comments"></span> <?php echo $post_comment_count;?></span>
            </div>
            <h2><?php echo $post_title;?></h2>
          </div>
        </a>
      </div>

<?php
      }
    }else{
      //echo these if there're no result equivalent to the search result
    echo "<div class='alert alert-danger'>No search result found</div>";
    }
}
}
?>

