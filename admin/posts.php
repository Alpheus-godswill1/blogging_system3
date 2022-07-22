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




					<?php
		// 				if (isset($_GET['source'])) {
		// 						$source = $_GET['source'];

		// 				switch ($source) {
		// 					case 'add_new':
		// 						include "includes/add_post.php";
		// 						break;
		// 					default:
		// 						include "includes/view_post.php";
		// 						break;
		// 				}
		// }
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
