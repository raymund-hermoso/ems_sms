<?php
include_once('DbConnection.php');
 
class FetchRole extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }


    //Role
    public function getRole(){
 
        if(isset($_SESSION['role']) == 1) {
            $sql = "SELECT * FROM tbl_role WHERE role_desc NOT IN ('admin') ORDER BY role_desc ASC";
        }
        else {
            $sql = "SELECT * FROM tbl_role WHERE role_desc NOT IN ('department head', 'admin') ORDER BY role_desc ASC";
        }
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<option value="'.$row['id'].'">'.ucwords($row['role_desc']).'</option>';
            }
        }
        else{
            return false;
        }
    }
 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}