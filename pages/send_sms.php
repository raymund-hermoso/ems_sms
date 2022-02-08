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
							<h2 class="m-0 text-dark custom-heading-h2" data-aos="fade-down">Send a Message</h2>
					
							<div class="card shadow mb-4">
								<div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Select a Recipient (Max 100)</h6>
									
									<a href="?send_sms=all" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
										Send to All
									</a>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>Title</th>
													<th>ID Number</th>
													<th>Role</th>
													<th>Name</th>
													<th>Number</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Title</th>
													<th>ID Number</th>
													<th>Role</th>
													<th>Name</th>
													<th>Number</th>
													<th>Actions</th>
												</tr>
											</tfoot>
											<tbody>
											<?php 
												$event = new FetchEvent();
												$event->getEventRecipient();
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							
								
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
