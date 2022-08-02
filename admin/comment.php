
<?php include './includes/header.php'; 
//This is where the Delete_Comment_Post() and other functions where written.  
  include './includes/helperfunct.php'; 
  //These values are gotten from the classes/Comment.php   files 

  //Delete_Comment_Post() comment.
if (isset($_GET['delete_comment']) && $_GET['delete_comment'] !== '') {
  $delete_id = $_GET['delete_comment'];
  //These helps ensure the Delete_Comment_Post() function is working properly which was written in the helperfunct.php .
  if(Delete_Comment_Post('auth_comment' ,'comment_id', $delete_id)){
    //The directory where the page tends to after performing what it was written to do.
    header("Location: ./comment.php?successfully_ran!");
  }
}

    //This script is for the Approve scripts.

  //These values are gotten from the classes/Comment.php   files 

if (isset($_GET['approve_comment']) &&  $_GET['approve_comment'] !== '') {
   $Approve_comment = $_GET['approve_comment'];
   //These helps ensure the Approve_Unapprove_Data()function is working properly which was written in the helperfunct.php .
   if (Approve_Unapprove_Data($Approve_comment)) {
    //The directory where the page tends to after performin what it was written to do.
    header("Location: ./comment.php?successfully_changed_value_to_Approved_or_Unapproved_as_the_case_may_be!");
   }
}

//This script is for the Unapprove scripts

  //These values are gotten from the classes/Comment.php   files 

if (isset($_GET['unapprove_comment']) && $_GET['unapprove_comment'] !== '') {
  $Unapprove_comment = $_GET['unapprove_comment'];
   //These helps ensure the Approve_Unapprove_Data()function is working properly which was written in the helperfunct.php .
   if (Approve_Unapprove_Data($Unapprove_comment)) {
    //The directory where the page tends to after performin what it was written to do.
    header("Location: ./comment.php?successfully_changed_value_to_Approved_or_Unapproved_as_the_case_may_be!");
   }
}
?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include 'includes/navigation.php'; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                          <h1 class="page-header">
                            Welcome to the Administration Panel
                        </h1>
                        <div class="table-responsive">
                          <table class="table table-striped table-hover table-bordered">
                            <thead>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Body</th>
                              <th>Status</th>
                              <th>Post ID</th>
                              <!-- Script to check whether the title is an 'Admin' or not, if title is an 'Admin' script will display that else it wont. -->
                              <?php if($title === "Admin"){
                                echo '<th colspan="3" class="text-center">Action</th>';
                              } ?>

                            </thead>
                            <tbody>

                              <?php
                                // Bringing the classes/ folder to be used in this file.
                                 require '../classes/Comment.php';
                                //  Instantiating the classes in the comment.php file 
                                 $New_comment_call = new authorityComments($connect);
                                //  Instantiating or calling of this function in the Comment.php file in this path classes/Comment.php
                                 $New_comment_call->showCommentsCalls();
                              ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
