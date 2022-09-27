<?php include 'includes/header.php'; ?>
<?php 
function show_users(){
    global $user_logged_in;
    global $connect;
    $SQLquery = "SELECT * from auth_users WHERE email='$user_logged_in'";
    $resultQuery = mysqli_query($connect, $SQLquery);
   //Just using the varible to be able to make the script work.
    $pal = 0;
    if ($pal === 0) {
    // using the while loop to ensure the data are gotten from the database.table(auth_users).
    if($row = mysqli_fetch_array($resultQuery)) 
     $title = $row['title'];
     $SecondQuery = mysqli_query($connect, "SELECT * FROM auth_users ORDER BY `user_id` DESC");
     while ($data = mysqli_fetch_assoc($SecondQuery)) {
        $user_id = $data['user_id'];
        $username = $data['username'];
        $email = $data['email'];
        $user_profile_pic = $data['user_profile_pic'];
        $user_active = $data['user_active'];
        $Title = $data['title'];
        if ($Title == "Admin") {
           echo "<tr>
                <td>$username</td>
                <td>$email</td>
                <td>$user_active</td>
                <td>$Title</td>
                <td><img src='$user_profile_pic' style='width:50px; height:50px; border-radius:100px'></td>
                <td><a href='?view_user_id=$user_id' style='width:70%' class='btn btn-danger btn-block'>Delete</a></td>
                </tr>";
        }
        else {
            echo "<tr>
            <td>$username</td>
            <td>$email</td>
            <td>$user_active</td>
            <td>$Title</td>
            <td><img src='../admin/users/$user_profile_pic'></td>
            </tr>";
        }
     }
    }
 }



if(isset($_GET['view_user_id'])){ 
    global $connect;
    $delete_view_user_id = $_GET['view_user_id'];
    $sqli_query = "DELETE FROM auth_users WHERE user_id='$delete_view_user_id'";
    $result_query = mysqli_query($connect, $sqli_query);

    if($sqli_query){
        header('Location: view_users.php');
    }else {
        die("Scripts failed " . mysqli_error($connect));
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
				<div class="container">
				
				<h2>View Users</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped table-success">
                        <thead>
                            <th>Username</th>
                            <th>Email</th>
                            <th>User_Active</th>
                            <th>Role</th>
                            <th>User_Profile_Pic</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php show_users(); ?>
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
