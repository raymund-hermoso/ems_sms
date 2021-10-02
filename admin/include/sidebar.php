<?php 
    $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">EMS | Admin </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <?php 
    if($page == 'home.php'){
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
        <a class="nav-link" href="home.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        General
    </div>

    <!-- Nav Item - Event -->
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
            <span>Event</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Extra
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php 
    if($page == 'student.php' || $page == 'department_head.php'){
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
                <h6 class="collapse-header">Users Data:</h6>

                <?php 
                if($page == 'student.php'){
                ?>
                    <a class="collapse-item active" href="student.php">Students</a>
                    <a class="collapse-item" href="department_head.php">Department Head</a>
                    <a class="collapse-item" href="faculty.php">Faculty</a>
                <?php
                }
                else if($page == 'department_head.php'){
                ?>
                    <a class="collapse-item" href="student.php">Students</a>
                    <a class="collapse-item active" href="department_head.php">Department Head</a>
                    <a class="collapse-item" href="faculty.php">Faculty</a>
                <?php
                }
                else if($page == 'faculty.php'){
                ?>
                    <a class="collapse-item" href="student.php">Students</a>
                    <a class="collapse-item" href="department_head.php">Department Head</a>
                    <a class="collapse-item active" href="faculty.php">Faculty</a>
                <?php
                }
                else{
                ?>
                    <a class="collapse-item" href="student.php">Students</a>
                    <a class="collapse-item" href="department_head.php">Department Head</a>
                    <a class="collapse-item" href="faculty.php">Faculty</a>
                <?php
                }
                ?>

                
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Others:</h6>
                <a class="collapse-item" href="#">Page 1</a>
                <a class="collapse-item" href="#">Page 2</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->