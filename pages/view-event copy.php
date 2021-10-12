<?php
    include_once('../include/session_user_auth.php');
    include_once('../include/FetchEvent.php');
    include_once('include/header.php');
?>
<!-- Page Wrapper -->
<div id="wrapper">

    <?php include 'include/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php include 'include/nav.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Preview Event</h1>
                    <?php
                        if(isset($_SESSION['message'])){
                    ?>
                            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                                <?php echo $_SESSION['message']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    <?php

                            unset($_SESSION['message']);
                        }
                    ?>
                        
                </div>
                <p class="mb-4">Lorem Ipsum.</p>

                <?php 
                    $event = new FetchEvent();
                    $event->getPreviewEventDetails();
                ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php include 'include/footer_admin.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Update Event Modal-->
<div class="modal fade" id="UpdateEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Update?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Okay" below to update the Event.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-success" href="../include/event_process.php?id=<?php echo isset($_GET['id']) ? $_GET['id'] : "" ?>">Okay</a>
            </div>
        </div>
    </div>
</div>


<?php
    include 'include/footer.php';
?>