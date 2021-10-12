<?php
    include_once('../../include/session_admin_auth.php');
    include_once('../include/header.php');
?>
<!-- Page Wrapper -->
<div id="wrapper">

    <?php include '../include/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php include '../include/nav.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

				<div id="wrapper">
					<!-- Content Wrapper -->
					<div id="content-wrapper" class="d-flex flex-column">

							<!-- Main Content -->
							<div id="content">
								<!-- Begin Page Content -->
								<div class="container-fluid">

									<!-- 404 Error Text -->
									<div class="text-center">
										<div class="error mx-auto" data-text="404">404</div>
										<p class="lead text-gray-800 mb-5">Page Not Found</p>
										<p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
										<a href="home.php">&larr; Back to Dashboard</a>
									</div>

								</div>
								<!-- /.container-fluid -->
							</div>
							<!-- End of Main Content -->

					</div>
					<!-- End of Content Wrapper -->
				</div>
				<!-- End of Page Wrapper -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php include '../include/footer_admin.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


<?php
    include '../include/footer.php';
?>