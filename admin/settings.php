<?php include 'includes/header.php'; ?>
<?php
global $connect;
$cms_email =  $_SESSION['user_logged_in'];
if(isset($_SESSION['submit_settings'])){
    $password = $_POST['confirmation_password'];
    $SQLquery = mysqli_query($connect,"SELECT user_password FROM auth_users WHERE email = '$cms_email'");
    $record = mysqli_fetch_array($SQLquery);
    $hashedPassword = md5($password);
    $password4rmDB = $record['user_password'];
    if($hashedPassword === $password4rmDB){
        if (isset($_POST['confirmation_password'])) {
            $password_ = $_POST['username'];
            $email_user = $_POST['email_name'];
        
            if(!empty($username_) && !empty($email_user)) {
                $query = mysqli_query($connect, "UPDATE `auth_users` SET username='$username_',email='$email_user' WHERE email='$cms_email'");
                if ($query) {
                    $_SESSION['user'] = $email_user;
                   header('Location: profile.php?message=Updated the data in the database->auth_users table');
                }
            }
        }
    }else{
        die("Password does not match". mysqli_error($connect));
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

					<h3 class="page-header">
						Update Your Profile
					</h3>
                    <br>
                    <p class="alert alert-info col-md-6">To update your username and email go to the <a href="profile.php"><b>profile</b></a> page</p>
				<div class="col-md-12">
				<form action="" method="post" id="form" enctype="multipart/form-data">
				<div class="col-md-6">
				<div class="form-group">
						<label for="">Picture to be uploaded</label>
						<input type="file" name="Update_image" class="form-control" >
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" name="confirmation_password" placeholder="password"  class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="submit_settings" id="submit" value="Update your profile" class="btn btn-success btn-block" style="width:50%">
					</div>
                </div>
                <div class="col-md-6">
				<div class="form-group">
						<label for="">Old password</label>
						<input type="password" name="old_password" placeholder="Old Password" class="form-control" >
					</div>
					<div class="form-group">
						<label for="">New Password</label>
						<input type="password" name="Update_password" placeholder="New Password"  class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="submit_profile" id="submit" value="Update your profile" class="btn btn-success btn-block" style="width:50%">
					</div>
                </div>
					</form>
				</div>
				</div>
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
