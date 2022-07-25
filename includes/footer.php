<?php
//query to get the data gotten from the database.posts table, but with a limit which is 1.
$query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 1";
$result = mysqli_query($connect, $query);

//get the number of rows in the database.posts table
$span = mysqli_num_rows($result);

//checking if anything goes wrong,then the script should be killed immediately
if (!$result) {
  die("Couldn't_call_data_from_database.posts_table".mysqli_error($connect));
}else {
    //using the while loop to get data from database.posts table 
  while($row = mysqli_fetch_assoc($result)){
    $post_content = $row['post_content'];
    $post_image = $row['post_image'];
  ?>

    <!-- echoing out the data in this style. -->
<footer class="site-footer">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-4">
              <h3>About Us</h3>
              <p class="mb-4">
                <img src="./admin/images/<?php echo $post_image;?>" alt="Image placeholder" class="img-fluid">
              </p>

              <p><?php echo $post_content?><a href="#"></a></p>
            </div>
            <div class="col-md-6 ml-auto">
              <div class="row">
                <div class="col-md-7">
                  <h3>Latest Post</h3>
                  <div class="post-entry-sidebar">
                    <ul>
            <?php
  }
}      
            ?>
                    <?php
$query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 4";
$result = mysqli_query($connect, $query);
$span = mysqli_num_rows($result);
if (!$result) {
  die("Couldn't_call_data_from_database.posts_table".mysqli_error($connect));
}else {
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
                      <li>
                        <a href="../blogging_system3/single.php?post_id=<?php echo $post_id; ?>&post_title=<?php echo $post_title;?>&post_content=<?php echo $post_content;?>">
                          <img src="./admin/images/<?php echo $post_image;?>" alt="Image placeholder" class="mr-4">
                          <div class="text">
                            <h4><?php echo $post_title;?></h4>
                            <div class="post-meta">
                              <span class="mr-2"><?php echo $post_date;?></span> &bullet;
                              <span class="ml-2"><span class="fa fa-comments"></span><?php echo $span;?></span>
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
                <div class="col-md-1"></div>
                
                <div class="col-md-4">

                  <div class="mb-5">
                    <h3>Quick Links</h3>
                    <ul class="list-unstyled">
                      <li><a href="#">About Us</a></li>
                      <li><a href="#">Travel</a></li>
                      <li><a href="#">Adventure</a></li>
                      <li><a href="#">Courses</a></li>
                      <li><a href="#">Categories</a></li>
                    </ul>
                  </div>
                  
                  <div class="mb-5">
                    <h3>Social</h3>
                    <ul class="list-unstyled footer-social">
                      <li><a href="#"><span class="fa fa-twitter"></span> Twitter</a></li>
                      <li><a href="#"><span class="fa fa-facebook"></span> Facebook</a></li>
                      <li><a href="#"><span class="fa fa-instagram"></span> Instagram</a></li>
                      <li><a href="#"><span class="fa fa-vimeo"></span> Vimeo</a></li>
                      <li><a href="#"><span class="fa fa-youtube-play"></span> Youtube</a></li>
                      <li><a href="#"><span class="fa fa-snapchat"></span> Snapshot</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <p class="small">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved | This template is made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
        </div>
      </footer>
      <!-- END footer -->

    </div>
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    
    <script src="js/main.js"></script>