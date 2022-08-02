<?php
// Declaration of a session used to keep user logged in after living page, for some time.
(isset($_SESSION['user_logged_in'])) ? $user_logged_in = $_SESSION['user_logged_in'] : $user_log = 0;

  //global variable declaration
 global $user_logged_in;
//SQL query for pulling data from database.table and used for comparison with the data gotten from the session.
$sql =  "SELECT * FROM auth_users WHERE email='$user_logged_in'";

//making sure query is well written and connected properly
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
// Declaration of a class.
class authorityComments{
      private $connect;
      //method used for unique parameters and arguments.
      public function __construct($connect){
            $this->connect = $connect;
      }


      public function makingComments($post_id,$comment_name, $comment_email, $comment_body,$comment_status){
            if(!empty($comment_body)){

                  //This is used for the connection.
                  $connt = $this->connect;

                    //Query used to get the data from database.Table = auth_comment where the tables are compared with some given values.
                  $sql = "INSERT INTO `auth_comment`(comment_name,comment_email,body,comment_status,post_id) VALUES('$comment_name','$comment_email','$comment_body','Unapproved','$post_id')";

                  //making sure query is well written and connected properly
                  $result = mysqli_query($connt , $sql);
                  //checking if anything goes wrong,then the script should be killed immediately
                  if (!$result) {
                      die("failed".mysqli_error($connt));
                  }
            }else{
                  return false;
            }
      }


      public function callApprovedComments($post_id){

          //global variable declaration
            global $title;

          //This is used for the connection.
            $connt = $this->connect;

              //Query used to get the data from database.Table = auth_comment where the tables are compared with some given values.
            $sql = "SELECT * FROM `auth_comment` WHERE post_id = $post_id AND comment_status='approved'";

            //making sure query is well written and connected properly
            $result = mysqli_query($connt,$sql);

            //checking if anything has gone wrong when writing this code
            if (!$result) {
                  die("failed".mysqli_error($connt));
              }else{
                  while($row = mysqli_fetch_assoc($result)) {
                        $comment_id = $row['comment_id'];
                        $post_id = $row['post_id'];
                        $comment_name = $row['comment_name'];
                        $comment_body = $row['body'];
      
                        ?>
    
                   <!-- echoing out the data in this style. -->
                        <h3><?php echo $comment_name; ?></h3>
                        <p><?php echo $comment_body; ?></</p>
                        <p><a href="#" class="reply rounded">Reply</a></p>
            <?php
            }
              }
            }



            public function showCommentsCalls(){

                  //global variable declaration     
                  global $title;
                  //This is used for the connection.
                  $connt = $this->connect;
                  
                  //SQL query for pulling data from database.table and has a limit of 20 and uses descending other.
                  $sql = "SELECT * FROM `auth_comment` ORDER BY comment_id DESC LIMIT 20";
                  $result = mysqli_query($connt,$sql);
                  $span = mysqli_num_rows($result);
                  if($span > 0){
                        //This part of the script is used to get data from the database, if the query and connection are working properly.
                        while ($row = mysqli_fetch_assoc($result)) {
                             $comment_id = $row['comment_id'];
                             $comment_name = $row['comment_name'];
                             $comment_email = $row['comment_email'];
                             $comment_body = substr($row['body'],0,50);
                             $comment_status = $row['comment_status'];
                             $post_id = $row['post_id'];

        // These're the styles in which the data gotten are showed to the end users, only if the title is = 'Admin'
                     
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
          <!-- These're the styles in which the data gotten are showed to the end users. -->

            					<tr>
            					<td><?php echo $comment_id?></td>
            					<td><?php echo $comment_name?></td>
            					<td><?php echo $comment_email?></td>
            					<td><?php echo $comment_body?></td>
            					<td><?php echo $comment_status?></td>
            					<td><?php echo $post_id?></td>
            					<td><a href='./comment.php?approve_comment=<?php echo $comment_id?>' class='btn btn-primary'>Approve</a></td>
            					<td><a href='./comment.php?unapprove_comment=<?php echo $comment_id?>' class='btn btn-warning'>Unapprove</a></td>
            					<td><a href='./comment.php?delete_comment=<?php echo $comment_id?>' class='btn btn-danger'>Delete</a></td>
            				      </tr>
      <?php
      }

      }
       }
      }
      }
?> 