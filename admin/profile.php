<?php include 'includes/header.php'; ?>
<?php
global $connect;
$cms_email =  $_SESSION['user_logged_in'];
$sqli_query = mysqli_query($connect, "SELECT * FROM auth_users WHERE email ='$cms_email'");
if($data = mysqli_fetch_assoc($sqli_query));

?>

<div id="wrapper">

	<!-- Navigation -->
	<?php include 'includes/navigation.php'; ?>


	<div id="page-wrapper">

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">

					<h3 class="page-header">
						Welcome to your profile Page Username
					</h3>
                    <br>
                    <p class="alert alert-info col-md-6">To update your profile picture and password go to the <a href="settings.php"><b>settings</b></a> page</p>
				<div class="col-md-8">
                    <img src="<?php echo $data['user_profile_pic']?>" alt="" style="width: 150px; height: 150px ;border-radius: 100px">
				<form action="" method="post" id="form">
				<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="username" placeholder="Username" class="form-control" value="<?php echo $data['username']?>">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo $data['email']?>" >
					</div>
					<div class="form-group">
						<label for="">Role</label>
                        <input type="text" name="role" class="form-control" value="<?php echo $data['title']?>" disabled>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" id="submit" value="Update your profile " class="btn btn-success btn-block" style="width:50%">
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
