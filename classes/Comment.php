<?php (isset($_SESSION['user_logged_in'])) ? $user_logged_in = $_SESSION['user_logged_in'] : $user_log = 0;
 global $user_logged_in;
$sql =  "SELECT * FROM auth_users WHERE email='$user_logged_in'";
 $result = mysqli_query($connect, $sql);
 $pal = 0;
 if ($pal === 0) {
    while ($row = mysqli_fetch_array($result)) {
     $cms_username = $row['username'];
     $user_profile_pic = $row['user_profile_pic'];
     $title = $row['title'];
    }
 }

?>


<?php

class authorityComments{
      private $connect;
      public function __construct($connect){
            $this->connect = $connect;
      }


      public function makingComments($post_id,$comment_name, $comment_email, $comment_body,$comment_status){
            if(!empty($comment_body)){
                  $connt = $this->connect;
                  $sql = "INSERT INTO `auth_comment`(comment_name,comment_email,body,comment_status,post_id) VALUES('$comment_name','$comment_email','$comment_body','Unapproved','$post_id')";
                  $result = mysqli_query($connt , $sql);
                  if (!$result) {
                      die("failed".mysqli_error($connt));
                  }
            }else{
                  return false;
            }
      }


      public function callApprovedComments($post_id){
            global $title;
            $connt = $this->connect;
            $sql = "SELECT * FROM `auth_comment` WHERE post_id = $post_id AND comment_status='approved'";
            $result = mysqli_query($connt,$sql);
            if (!$result) {
                  die("failed".mysqli_error($connt));
              }else{
                  while($row = mysqli_fetch_assoc($result)) {
                        $comment_id = $row['comment_id'];
                        $post_id = $row['post_id'];
                        $comment_name = $row['comment_name'];
                        $comment_body = $row['body'];
      
                        ?>
                        <h3><?php echo $comment_name; ?></h3>
                        <p><?php echo $comment_body; ?></</p>
                        <p><a href="#" class="reply rounded">Reply</a></p>
            <?php
            }
              }
            }



            public function showCommentsCalls(){
                  global $title;
                  $connt = $this->connect;
                  $sql = "SELECT * FROM `auth_comment` ORDER BY comment_id DESC LIMIT 20";
                  $result = mysqli_query($connt,$sql);
                  $span = mysqli_num_rows($result);
                  if($span > 0){
                        while ($row = mysqli_fetch_assoc($result)) {
                             $comment_id = $row['comment_id'];
                             $comment_name = $row['comment_name'];
                             $comment_email = $row['comment_email'];
                             $comment_body = $row['body'];
                             $comment_status = $row['comment_status'];
                             $post_id = $row['post_id'];

                             if($title !== 'Admin'){ 
                  ?>
                                           <tr>
                              		<td><?php echo $comment_id?></td>
                              		<td><?php echo $comment_name?></td>
                              		<td><?php echo $comment_email?></td>
                              		<td><?php echo $comment_body?></td>
                              		<td><?php echo $comment_status?></td>
                              		<td><?php echo $post_id?></td>
                              		</tr>
                  <?php
            }
      else { ?>
            					<tr>
            					<td><?php echo $comment_id?></td>
            					<td><?php echo $comment_name?></td>
            					<td><?php echo $comment_email?></td>
            					<td><?php echo $comment_body?></td>
            					<td><?php echo $comment_status?></td>
            					<td><?php echo $post_id?></td>
            					<td><a href='#' class='btn btn-primary'>Approve</a></td>
            					<td><a href='#' class='btn btn-warning'>Unapprove</a></td>
            					<td><a href='#' class='btn btn-danger'>Delete</a></td>
            				      </tr>
      <?php
      }

      }
       }
      }
      }
?> 