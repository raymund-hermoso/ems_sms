<?php
include_once('DbConnection.php');
 
class InsertCourseDetails extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }


    //
    public function add_course($course, $dept_id) {
        $sql = "INSERT INTO tbl_course (course, dept_id) VALUES ('$course', '$dept_id')";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            
            $_SESSION['message'] = 'New Course added';
            header('location:../admin/pages/department.php?department='.$dept_id);
        
        } else {
            return false;
        }
    }

    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}