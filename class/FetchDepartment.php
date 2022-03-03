<?php
include_once('DbConnection.php');

class FetchDepartment extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }


    //Fetch Department
    public function AddDepartment_main($dept_code, $dept_name){
 
        $sql = "INSERT INTO tbl_department (department_code, department_name) VALUES ('$dept_code', '$dept_name')";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $last_id = $conn->insert_id;
            $_SESSION['message'] = 'New Department was added';
            header('location:../admin/pages/department.php?department='.$last_id);
        } else {
            return false;
        }
    }

    //Fetch Department
    public function checkDepartment_main($dept_code, $dept_name){
 
        $sql = "SELECT * FROM tbl_department WHERE department_code = '$dept_code' OR department_name = '$dept_name'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_assoc();

            return $row['id'];
            // return $row['department_code'].' - '.$row['department_name'];
        }
        else{
            return false;
        }
    }

    //Fetch Department Dropdown
    public function getDepartment(){
 
        $sql = "SELECT * FROM tbl_department";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<option value="'.$row['id'].'">'.$row['department_name'].'</option>';
            }
        }
        else{
            return false;
        }
    }

    //Fetch Department Sidebar
    public function getDepartmentSidebar(){

        // $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
        $dept_id = isset($_GET['department']) ? $_GET['department'] : '';
 
        $sql = "SELECT * FROM tbl_department WHERE NOT department_code = 'All'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<a class="collapse-item'; if($dept_id == $row['id']){echo ' active';} echo '" href=department.php?department='.$row['id'].'>'.$row['department_code'].'</a> <!-- '.$row['department_name'].' -->';
            }
        }
        else{
            return false;
        }
    }

    //Fetch Department Heading
    public function getDepartmentHeading(){

        $dept_id = isset($_GET['department']) ? $_GET['department'] : '';
 
        $sql = "SELECT * FROM tbl_department WHERE id = '$dept_id'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            echo $row['department_name'];
        }
        else{
            return false;
        }
    }

    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}