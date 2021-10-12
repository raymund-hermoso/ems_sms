<?php
	include '../include/session_user_auth.php';
	include '../include/header.php';
?>
	<div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        	<?php include '../include/nav.php'; ?>

                <!-- Main Content -->
                <div id="content">
					<!-- Begin Page Content -->
					<div class="container-fluid">

						<!-- 404 Error Text -->
						<div class="text-center">
							<div class="error mx-auto" data-text="404">404</div>
							<p class="lead text-gray-800 mb-5">Page Not Found</p>
							<p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
							<a href="home.php">&larr; Back to Hompage</a>
						</div>

					</div>
					<!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

            <?php include '../include/footer_user.php'; ?>
        </div>
        <!-- End of Content Wrapper -->
	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
	</a>
<?php 
	include '../include/footer.php';
?>
