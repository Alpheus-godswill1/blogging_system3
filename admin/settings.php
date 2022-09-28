<?php include 'includes/header.php'; ?>
<?php
global $connect;
$cms_email =  $_SESSION['user_logged_in'];
if(isset($_POST['submit_settings'])){
    $password = $_POST['confirmation_password'];
    $SQLquery = mysqli_query($connect,"SELECT user_password FROM auth_users WHERE email = '$cms_email'");
    $record = mysqli_fetch_array($SQLquery);
    $hashedPassword = md5($password);
    $password4rmDB = $record['user_password'];
    if($hashedPassword === $password4rmDB){
        
	if (isset($_FILES['Update_image']) && $_FILES['Update_image']['name'] != "") {
		$location = "./users/profile_pics/";
		$file_name = $_FILES['Update_image']['name'];
		$file_tmp_name = $_FILES['Update_image']['tmp_name'];
		$file_extension = explode('.',$file_name);
		$file_actual_extension = strtolower(end($file_extension));
    
			$new_image = uniqid('Alph',true) . "." . $file_actual_extension;
			$target =  $location . basename($new_image);
			if (move_uploaded_file($file_tmp_name, $target)) {
                $queryStart = mysqli_query($connect, "UPDATE auth_users SET `user_profile_pic` = '$target' WHERE email = '$cms_email'");
                if ($queryStart) {
                    header('Location: profile.php?Profile_image_was_successfully_updated!');
                }else{
                    die("Location: Oops! query did not process image" . mysqli_error($connect));
                }
            }
		}
	}else{
        die("Password does not match". mysqli_error($connect));
    }
}



//Update Password
if (isset($_POST['submit_updated_password'])) {
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['Update_password'];
    
    $query_str = mysqli_query($connect, "SELECT user_password FROM auth_users WHERE email='$cms_email'");
    $row = mysqli_fetch_array($query_str);
    $pwd4rmDB = $row['user_password'];
    $Hashed_oldPassword = md5($oldPassword);
    if ($pwd4rmDB == $Hashed_oldPassword) {
        $Hashed_newPassword = md5($newPassword);
        $query_written_str = mysqli_query($connect, "UPDATE auth_users SET user_password = '$Hashed_newPassword' WHERE email ='$cms_email'");
        if ($query_written_str) {
            header('Location: profile.php?Password_was_successfully_updated :)');
        }
    }else {
        die("Sorry string was killed because password did not match!");
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
						<input type="password" name="old_password" placeholder="Old Password" class="form-control" id="oldPassword">
                        <p id="check" style="font-size:11px"></p>
					</div>
					<div class="form-group">
						<label for="">New Password</label>
						<input type="password" name="Update_password" placeholder="New Password"  class="form-control" id="newPassword">
					</div>
					<div class="form-group">
						<input type="submit" name="submit_updated_password" id="submit" value="Update your profile" class="btn btn-success btn-block" style="width:50%">
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

<!-- Our Ajax Call -->
<script>
$(document).ready(function(){
$("#oldPassword").keyup(function(){
let text = document.getElementById('oldPassword').value;
$("#check").load('check.php',{
    text:text

});
});
});
</script>
</body>

</html>
