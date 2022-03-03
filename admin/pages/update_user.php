<?php
    include_once('../../include/session_admin_auth.php');
    include_once('../../class/FetchUser.php');
    include_once('../../class/FetchDepartment.php');
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

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Update User</h1>
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

                <?php

                $user = new FetchUser();

                $sin = isset($_GET['sin']) ? $_GET['sin'] : '';
                
                $row = $user->user_details($sin);

                ?>

                <form method="post" action="../../include/update_user_process.php">
                    <input type="hidden" name="sin" value="<?php echo $sin ?>">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update Data of <?php echo $row['lastname'].', '.$row['firstname'].' '.$row['middlename']; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col col-sm-4">
                                    <div class="form-group">
                                        <label>Firstname</label>
                                        <input type="text" class="form-control form-control-user" placeholder="Enter Username" name="firstname" value="<?php echo $row['firstname'] ?>">
                                    </div>
                                </div>
                                <div class="col col-sm-4">
                                    <div class="form-group">
                                        <label>Middlename</label>
                                        <input type="text" class="form-control form-control-user" placeholder="Enter Middlename" name="middlename" value="<?php echo $row['middlename'] ?>">
                                    </div>
                                </div>
                                <div class="col col-sm-4">
                                    <div class="form-group">
                                        <label>Lastname</label>
                                        <input type="text" class="form-control form-control-user" placeholder="Enter Lastname" name="lastname" value="<?php echo $row['lastname'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control form-control-user" placeholder="Enter Email" name="email" value="<?php echo $row['email'] ?>">
                                    </div>
                                </div>
                                <div class="col col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control form-control-user" placeholder="Enter Mobile Number" name="mobile_number" value="<?php echo $row['mobile_number'] ?>">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" name="update">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php include '../include/footer_admin.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Add Department Head Modal-->
<div class="modal fade" id="AddDeptHeadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="user" method="POST" action="../../include/add_department_head_process.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Department Head</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Enter ID Number" name="id_number" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Select Department</label>
                        <select name="department" class="form-control form-control-user" id="department" style="height: 70px">
                            <?php 
                                $department = new FetchDepartment();
                                $department->getDepartment();
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_dh" class="btn btn-primary btn-user btn-block">Add</button>
                    <button class="btn btn-secondary btn-user btn-block" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    include '../include/footer.php';
?>