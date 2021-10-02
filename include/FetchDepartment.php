<?php
include_once('DbConnection.php');
 
class FetchDepartment extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }

    //Student Users
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
}