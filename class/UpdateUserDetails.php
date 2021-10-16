<?php
include_once('DbConnection.php');
 
class UpdateUserDetails extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }

    public function update_role_student($school_id_number, $role){
        $sql = "UPDATE tbl_users SET role = '$role' WHERE id_number = '$school_id_number'";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $_SESSION['message'] = 'Account successfully created';
            header('location:../index.php');
        } else {
            return false;
        }
    }

    public function update_role_department_head($school_id_number, $role){
        $sql = "UPDATE tbl_users SET role = '$role' WHERE id_number = '$school_id_number'";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $_SESSION['message'] = 'Account successfully created';
            header('location:../index.php');
        } else {
            return false;
        }
    }
}