<?php 
    include_once '../../class/FetchDepartment.php';
    $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="event.php">
        <div class="sidebar-brand-icon" style="width: 25%">
            <img src="../../img/assets/logo.png" alt="logo" style="width: 80%">
        </div>
        <div class="sidebar-brand-text mx-3">EMS | Admin </div>
    </a>

   

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        General
    </div>

    <!-- Nav Item - All Event -->
    <?php 
    if($page == 'event.php'){
    ?>
    <li class="nav-item active">
    <?php
    }
    else{
    ?>
    <li class="nav-item">
    <?php
    }
    ?>
        <a class="nav-link" href="event.php">
            <i class="fas fa-fw fa-table"></i>
            <span>All Event</span></a>
    </li>

    <!-- Nav Item - My Event -->
    <?php 
    if($page == 'my-event.php'){
    ?>
    <li class="nav-item active">
    <?php
    }
    else{
    ?>
    <li class="nav-item">
    <?php
    }
    ?>
        <a class="nav-link" href="my-event.php">
            <i class="fas fa-fw fa-table"></i>
            <span>My Event</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Extra
    </div>

    <!-- Nav Item - Pages Collapse Menu - Users -->
    <?php 
    if($page == 'student.php' || $page == 'department_head.php' || $page == 'faculty.php' || $page == 'update_user.php'){
    ?>
    <li class="nav-item active">
    <?php
    }
    else{
    ?>
    <li class="nav-item">
    <?php
    }
    ?>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Users</span>
        </a>
    <?php 
    if($page == 'student.php' || $page == 'department_head.php' || $page == 'faculty.php' || $page == 'jo.php' ){
    ?>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <?php
    }
    else{
    ?>
        <div id="collapsePages" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <?php
    }
    ?>
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data:</h6>
                <a class="collapse-item <?php if($page == 'student.php'){ echo 'active'; }else{ echo ''; } ?>" href="student.php">Students</a>
                <a class="collapse-item <?php if($page == 'department_head.php'){ echo 'active'; }else{ echo ''; } ?>" href="department_head.php">Department Head</a>
                <a class="collapse-item <?php if($page == 'faculty.php'){ echo 'active'; }else{ echo ''; } ?> " href="faculty.php">Faculty</a>
                <a class="collapse-item <?php if($page == 'jo.php'){ echo 'active'; }else{ echo ''; } ?> " href="jo.php">Job Order</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Course -->
    <?php 
    if($page == 'department.php') {
    ?>
    <li class="nav-item active">
    <?php 
    }
    else{
    ?>
    <li class="nav-item">
    <?php
    }
    ?>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesCourse" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-graduation-cap"></i>
            <span>Department</span>
        </a>

        <?php 
        if($page == 'department.php') {
        ?>
        <div id="collapsePagesCourse" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <?php 
        }
        else{
        ?>
        <div id="collapsePagesCourse" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <?php
        }
        ?>
            <div class="bg-white py-2 collapse-inner rounded">
                
                <a href="#" class="collapse-item" data-toggle="modal" data-target="#AddDepartment">
                    <i class="fa fa-plus"></i> Add Department
                </a>
                <hr class="sidebar-divider d-md-block" style="border-top: 1px solid #eaecf4;">

                <h6 class="collapse-header">Data:</h6>
                <?php 
                    $department = new FetchDepartment();
                    $department->getDepartmentSidebar();
                ?>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Add Department Modal-->
<div class="modal fade" id="AddDepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="user" method="POST" action="../../include/add_department_process.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Enter Department Code" name="dept_code" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Enter Department Name" name="dept_name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_dh_main" class="btn btn-primary btn-user btn-block">Add</button>
                    <button class="btn btn-secondary btn-user btn-block" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>