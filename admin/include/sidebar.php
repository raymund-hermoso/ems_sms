<?php 
    include_once '../../class/FetchDepartment.php';
    $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="event.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">EMS | Admin </div>
    </a>

   

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        General
    </div>

    <!-- Nav Item - Event -->
    <?php 
    if($page == 'event.php' || $page == 'view-event.php' ){
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
            <span>Event</span></a>
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
    if($page == 'student.php' || $page == 'department_head.php' || $page == 'faculty.php'){
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
            </div>
        </div>
    </li>

    <!-- Nav Item - Course -->
    <?php 
    if($page == 'cbm.php' || $page == 'cte.php' || $page == 'cit.php' || $page == 'cjc.php' || $page == 'caf.php'){
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
        if($page == 'cbm.php' || $page == 'cte.php' || $page == 'cit.php' || $page == 'cjc.php' || $page == 'caf.php'){
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