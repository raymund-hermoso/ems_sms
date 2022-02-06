<?php
    $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

    include_once '../class/FetchRole.php';
    include_once '../class/FetchCourse.php';
?>
<!-- Topbar -->
<nav id="navbar_top" class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Container -->
    <div class="container">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <a href="home.php" class="navbar-brand">
            <img src="../img/assets/logo.png" style="width: 50%; margin-right: 10px;" alt="Logo" class="brand-image img-circle elevation-3 aos-init aos-animate" style="opacity: .8" data-aos="zoom-in">
            
            <div id="cust-brand-text">
                <span class="brand-text font-weight-light" style="margin-top: 12px; display: block;">EMS</span>
            </div>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a href="<?php if($page == 'home.php'){ echo '#home-sec'; }else{ echo 'home.php'; } ?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="<?php if($page == 'home.php'){ echo '#event-sec'; }else{ echo 'home.php'; } ?>" class="nav-link">Event</a>
            </li>
            <li class="nav-item">
                <a href="<?php if($page == 'home.php'){ echo '#about-sec'; }else{ echo 'home.php'; } ?>" class="nav-link">About</a>
            </li>
        </ul>
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>


            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        <?php echo $row['firstname'].' '.$row['lastname']; ?>
                    </span>
                    <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        <?php echo ucwords(strtolower($row['role_desc'])); ?>
                    </a>
                    <?php 
                        if($row['role'] == 3){
                    ?>
                        <a href="event.php" class="dropdown-item">
                            <i class="fas fa-calendar fa-sm fa-fw mr-2 text-gray-400"></i>
                            All Event
                        </a>
                    <?php
                        }
                    ?>
                    
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>
    </div>
    <!-- End of Container -->
</nav>
<!-- End of Topbar -->

<!-- Add Event Modal-->
<div class="modal fade" id="AddEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                        <input type="text" class="form-control form-control-user" name="venue" required>
                    </div>

                    <hr>
                    
                    <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Date Start</label>
                            <input type="date" class="form-control form-control-user no-pad-h" id="date_start" name="date_start" required>
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Time Start</label>
                            <input type="time" class="form-control form-control-user no-pad-h" id="time_start" name="time_start" required>
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Date End</label>
                            <input type="date" class="form-control form-control-user no-pad-h" id="date_end" name="date_end" required>
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Time End</label>
                            <input type="time" class="form-control form-control-user no-pad-h" id="time_end" name="time_end" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_event" class="btn btn-primary btn-user btn-block">Request</button>
                    <button class="btn btn-secondary btn-user btn-block" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Request Event Modal-->
<div class="modal fade" id="AddEventModal-Request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form class="user" method="POST" action="../include/add_event_process.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Request Event</h5>
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
                        <input type="text" class="form-control form-control-user" name="venue" required>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Department</label>
                            <select class="form-control" name="invited_department">
                                <?php 
                                    $course = new FetchCourse();
                                    $course->getDepartmentDropdown_DH();
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Who to invite?</label>
                            <select class="form-control" name="invitee">
                                <?php 
                                    $role = new FetchRole();
                                    $role->getRole();
                                ?>
                            </select>
                        </div>
                    </div>

                    <hr>
                    
                    <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Date Start</label>
                            <input type="date" class="form-control form-control-user no-pad-h" id="date_start" name="date_start" required>
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Time Start</label>
                            <input type="time" class="form-control form-control-user no-pad-h" id="time_start" name="time_start" required>
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Date End</label>
                            <input type="date" class="form-control form-control-user no-pad-h" id="date_end" name="date_end" required>
                        </div>
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Time End</label>
                            <input type="time" class="form-control form-control-user no-pad-h" id="time_end" name="time_end" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_event_request" class="btn btn-primary btn-user btn-block">Request</button>
                    <button class="btn btn-secondary btn-user btn-block" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Post Event Modal-->
<div class="modal fade" id="PostEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
					<a class="btn btn-success" href="../include/event_process.php?post_event_id=<?php echo isset($_GET['id']) ? $_GET['id'] : "" ?>">Okay</a>
				</div>
			</div>
		</div>
	</div>