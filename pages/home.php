<?php
	include '../include/session_auth.php';
	include '../include/header.php';
	// include '../include/nav.php';
?>
	<div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        	<?php include '../include/nav.php'; ?>

                <!-- Main Content -->
                <div id="content">

					<?php 
						include '../include/section_1.php';
						include '../include/section_2.php';
						include '../include/section_3.php';
					?>


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

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="../include/logout.php">Logout</a>
				</div>
			</div>
		</div>
	</div>
<?php 
	include '../include/footer.php';
?>
