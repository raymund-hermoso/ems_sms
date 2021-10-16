<?php
include_once('DbConnection.php');
 
class FetchDepartment extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }

    //Fetch Department
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

        $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
 
        $sql = "SELECT * FROM tbl_department";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<a class="collapse-item'; if($page == strtolower($row['department_code']).'.php'){echo ' active';} echo '" href='.strtolower($row['department_code']).'.php?department='.$row['id'].'>'.$row['department_code'].'</a> <!-- '.$row['department_name'].' -->';
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
}