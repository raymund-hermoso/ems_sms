<?php
	include '../include/session_auth.php';
	include '../include/header.php';
	include '../include/FetchEvent.php';
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

	<!-- Post Event Modal-->
	<div class="modal fade" id="dPostEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Post?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Okay" below to post the Event.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-success" href="../include/event_process.php?id=<?php echo isset($_GET['id']) ? $_GET['id'] : "" ?>">Okay</a>
				</div>
			</div>
		</div>
	</div>
<?php 
	include '../include/footer.php';
?>
