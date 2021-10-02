<?php
	include 'include/auth.php';
	include 'include/header.php';
?>
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
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
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="include/register_process.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            placeholder="ID Number" value="<?php if(isset($_GET['id_no']) ? $_GET['id_no'] : ''){echo $_GET['id_no'];} ?>" name="id_no" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            placeholder="Course" value="<?php if(isset($_GET['course']) ? $_GET['course'] : ''){echo $_GET['course'];} ?>" name="course">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        placeholder="Firstname" value="<?php if(isset($_GET['fname']) ? $_GET['fname'] : ''){echo $_GET['fname'];} ?>" name="fname" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        placeholder="Middlename" value="<?php if(isset($_GET['mname']) ? $_GET['mname'] : ''){echo $_GET['mname'];} ?>" name="mname" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        placeholder="Lastname" value="<?php if(isset($_GET['lname']) ? $_GET['lname'] : ''){echo $_GET['lname'];} ?>" name="lname" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control form-control-user"
                                            placeholder="Email Address" value="<?php if(isset($_GET['email']) ? $_GET['email'] : ''){echo $_GET['email'];} ?>" name="email" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            placeholder="Mobile Number" value="<?php if(isset($_GET['mobile_number']) ? $_GET['mobile_number'] : ''){echo $_GET['mobile_number'];} ?>" name="mobile_number" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        placeholder="Username" value="<?php if(isset($_GET['username']) ? $_GET['username'] : ''){echo $_GET['username'];} ?>" name="username" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="password_rpt"
                                            placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="index.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php 
	include 'include/footer.php';
?>