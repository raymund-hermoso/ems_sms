<?php
include_once('DbConnection.php');
 
class CheckCourseDetails extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }
 
    //Check Course
    public function check_course_name($course){
 
        $sql = "SELECT * FROM tbl_course WHERE course = '$course'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }
    }
 
    public function details($sql){
 
        $query = $this->connection->query($sql);
 
        $row = $query->fetch_array();
 
        return $row;       
    }
 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}