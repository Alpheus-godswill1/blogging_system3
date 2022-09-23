<?php include 'includes/header.php'; ?>

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
				<div class="container">
				<div class="row">
				<h2>Add Users</h2>
				<div class="col-sm-12 col-lg-7">
					<form action="Validator/validate.php" method="post" id="form">
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="username" placeholder="Username" class="form-control" id="username">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" name="email" placeholder="Email" class="form-control" id="email">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="text" name="password" placeholder="Password" class="form-control" id="password">
					</div>
					<div class="form-group">
						<label for="">Role</label>
					<select  id="role" name="role" class="form-control">
						<option value="Admin">Admin</option>
						<option value="Editor">Editor</option>
					</select>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" id="submit"  class="btn btn-success btn-block" style="width:100%">
					</div>
					<p id="msg">-</p>
					</form>
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

<!----- Our ajax call --->
<script>
$(document).ready(function(){
	$("#form").submit(function(e){
		let name = document.querySelector("#username").value,
		  	email = document.querySelector("#email").value,
		 	password = document.querySelector("#password").value,
		 	role = document.querySelector("#role").value,
		 	submit = document.querySelector("#submit").value;
		$("#msg").load('./Validator/validate.php',{
			username: name,
			email:email,
			password:password,
			role:role,
			submit:submit
		});
		e.preventDefault();
	})
});
</script>
</body>

</html>
