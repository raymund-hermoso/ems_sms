<?php
include_once('DbConnection.php');
 
class UpdateUserDetails extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }

    public function update_role_student($school_id_number_student, $role){
        $sql = "UPDATE tbl_users SET role = '$role' WHERE id_number = '$school_id_number_student'";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $_SESSION['message'] = 'Account successfully created';
            header('location:../index.php');
        } else {
            return false;
        }
    }

    public function update_role_department_head($school_id_number_dh, $role){
        $sql = "UPDATE tbl_users SET role = '$role' WHERE id_number = '$school_id_number_dh'";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $_SESSION['message'] = 'Account successfully created2';
            header('location:../index.php');
        } else {
            return false;
        }
    }
    public function update_role_faculty($school_id_number_faculty, $role){
        $sql = "UPDATE tbl_users SET role = '$role' WHERE id_number = '$school_id_number_faculty'";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $_SESSION['message'] = 'Account successfully created';
            header('location:../index.php');
        } else {
            return false;
        }
    }

    public function update_user_details($firstname, $middlename, $lastname, $email, $mobile_number, $id_number){
        $sql = "UPDATE tbl_users SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', email = '$email', mobile_number = '$mobile_number' WHERE id_number = '$id_number'";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            return $id_number;
        } else {
            return false;
        }
    }

    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}