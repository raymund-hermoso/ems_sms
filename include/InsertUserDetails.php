<?php
include_once('DbConnection.php');
 
class InsertUserDetails extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }
 
    //
    public function add_user($id_number, $firstname, $middlename, $lastname, $email, $mobile_number, $username, $password){

        $hash_pwd = password_hash($password, PASSWORD_DEFAULT);
 
        $sql = "INSERT INTO tbl_users (id_number, firstname, middlename, lastname, email, mobile_number, username, password) VALUES ('$id_number', '$firstname', '$middlename', '$lastname', '$email', '$mobile_number', '$username', '$hash_pwd')";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    //
    public function add_student($id_number, $course){
        $sql = "INSERT INTO tbl_student (school_id_number, course_id) VALUES ('$id_number', '$course')";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $_SESSION['message'] = 'New Student added';
            header('location:../admin/student.php');
        } else {
            return false;
        }
    }

    //
    public function add_faculty($id_number){
        $sql = "INSERT INTO tbl_faculty (school_id_number) VALUES ('$id_number')";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $_SESSION['message'] = 'New Faculty added';
            header('location:../admin/faculty.php');
        } else {
            return false;
        }
    }

    //
    public function add_dh($id_number, $department){
        $sql = "INSERT INTO tbl_department_head (school_id_number, department_id) VALUES ('$id_number', '$department')";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $_SESSION['message'] = 'New Department Head added';
            header('location:../admin/department_head.php');
        } else {
            return false;
        }
    }

    //Create Login Logs
    public function login_log($auth){
 
        $sql = "INSERT INTO tbl_log (user_id, log_type) VALUES ('$auth', 'login')";
        $query = $this->connection->query($sql);
 
        if ($query === TRUE) {
            $_SESSION['user_id'] = $auth;
            if($_SESSION['role'] == 'admin'){
                header('location: ../admin/home.php');
            }
            else{
                header('location: ../pages/home.php');
            }
        } else {
            return false;
        }
    }

    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}