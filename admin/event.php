<?php
    include_once('../include/session_auth.php');
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
                    <h1 class="h3 mb-0 text-gray-800">Event</h1>
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
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#AddEventModal">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Add Event</a>
                        
                </div>
                <p class="mb-4">Lorem Ipsum.</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Venue</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>Title</th>
                                        <th>Description</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Venue</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php 
                                    $event = new FetchEvent();
                                    $event->getEvents();
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php include 'include/footer_admin.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Add Event Modal-->
<div class="modal fade" id="AddEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form class="user" method="POST" action="../include/add_event_process.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Event Title</label>
                        <input type="text" class="form-control form-control-user" name="title" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Venue</label>
                        <input type="text" class="form-control form-control-user" name="venue" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Schedule Date/Time</label>
                        <input type="text" id="event_datetime" class="form-control form-control-user" name="event_datetime">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_event" class="btn btn-primary btn-user btn-block">Add</button>
                    <button class="btn btn-secondary btn-user btn-block" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    include 'include/footer.php';
?>