<?php
include_once('DbConnection.php');
 
class FetchRole extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }


    //Role
    public function getRole(){
 
        $sql = "SELECT * FROM tbl_role";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<option value="'.$row['id'].'">'.ucfirst($row['role_desc']).'</option>';
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