<?php include 'includes/header.php'; ?>

<!-- This is where all the comment.php function is written to help the call back of the delete, approve and unapprove data. -->
<?php include 'includes/helperfunct.php'; ?>
<!-- These values are gotten from the classes/Comment.php   files  -->

  <!-- Delete_Comment_Post() comment. -->
  <?php if(isset($_GET['delete_post']) && $_GET['delete_post'] !== '' ){
       $delete_id = $_GET['delete_post'];
     //These helps ensure the Delete_Comment_Post() function is working properly which was written in the helperfunct.php .
       if (Delete_Comment_Post('posts' ,'post_id', $delete_id)) {
          //The directory where the page tends to after performing what it was written to do.
          //This function is written in the helperfunct.php file
          redirect("posts.php?rule=view_post");
       }
} 


//change_status to published or draft values.
//This is for the posts change_status=(published or draft) script which changes the post_status values.

//These values are gotten from the admin/includes/functions.php   files .

if (isset($_GET['change_status'])  && $_GET['change_status'] !== '') {
	$Approve_published  = $_GET['change_status'];
   //These helps ensure the ModifyPosts_Status() function is working properly which was written in the admin/includes/functions.php .
	if (ModifyPosts_Status($Approve_published)) {
		//The directory where the page tends to after performin what it was written to do.
		//This function is written in the helperfunct.php file
		redirect("posts.php?rule=view_post");
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

					<h1 class="page-header">
						Welcome to the Administration Panel
					</h1>

			<?php 
			if(isset($_GET['rule'])){
				//declaring the global connection to the database
				 global $connect;
				$source_get = $_GET['rule'];
				
				//using the switch statements to check the right part to go if the code works
				switch ($source_get) {
					case 'add_one_more':
						include "./includes/add_post.php";
						break;
					case 'view_post':
						include "./includes/view_post.php";
						break;
					default:
						include "./admin/index.php";
						break;
				}
			}
			
			
			



			?>

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
