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

	
<?php 
	include '../include/footer.php';
?>
