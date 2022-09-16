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
<?php 
// Update or Modify Post
if (isset($_POST['update_post'])) {
	$editID= $_POST['editID'];
	$title = $_POST['title'];
	$category = $_POST['categ'];
	$content = $_POST['content'];
	$author = $_POST['author'];
	$tags = $_POST['taggs'];
	$status = $_POST['status'];
	$img = $_POST['image'];
	$post_image = $_FILES['post_image']['name'];
	$image = "";
	//Get post-category-id
	$sql_query = mysqli_query($connect, "SELECT cat_id FROM categories WHERE cat_title = '$category'");
	$row = mysqli_fetch_array($sql_query);
	$post_cat_id = $row['cat_id'];
	//Check if user is re-uploading a new image
	if (isset($_FILES['post_image']) && $post_image != "") {
		$location = "./images/";
		$file_name = $_FILES['post_image']['name'];
		$file_size = $_FILES['post_image']['size'];
		$file_tmp_name = $_FILES['post_image']['tmp_name'];
		$allowed_formats = ['png','jpg','jpeg','gif','pdf'];
		$file_extension = explode('.',$file_name);
		$file_actual_extension = strtolower(end($file_extension));

		//check if image extension is allowed
		if(!in_array($file_actual_extension, $allowed_formats)){
			echo "<script>alert('file type not allowed')</script>";
		}
		else if ($file_size >= 10000000) {
			echo "<script>alert('file is too large')</script>";
		}else {
			$new_image = uniqid('Alph',true) . "." . $file_actual_extension;
			$target =  $location . basename($new_image);
			if (move_uploaded_file($file_tmp_name, $target)) {
				$image = $target;
			}
		}
	}else {
		$image = $img;
	}
	$query = mysqli_query($connect, "UPDATE posts SET post_title='$title',post_author='$author',post_category='$category',post_category_id='$category_id',post_content='$content', post_status='$status', post_tags='$tags',post_image='$image' WHERE post_id='$editID'");

	if ($query) {
		header('Location: posts.php');
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
					case 'edit_post':
						include "./includes/edit_post.php";
						break;
					case 'view_post':
						include "./includes/view_post.php";
						break;
					default:
						include "./admin/index.php";
						break;
				}
			}else {
				include "./includes/view_post.php"; 
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
