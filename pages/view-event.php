<?php
	include '../include/session_user_auth.php';
	include '../include/header.php';
	include '../class/FetchEvent.php';
?>
	<div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        	<?php include '../include/nav.php'; ?>

                <!-- Main Content -->
                <div id="content">
					<section id="event" class="section">
						<div class="container">
							<h2 class="m-0 text-dark custom-heading-h2" data-aos="fade-down">Event</h2>
					
							<?php 
								$event = new FetchEvent();
								$event->getPreviewEventDetails();
							?>
								
						</div>
					</section>
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
