<?php
include_once('DbConnection.php');
 
class InsertCourseDetails extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }


    //
    public function add_course($course, $dept_id){
        $sql = "INSERT INTO tbl_course (course, dept_id) VALUES ('$course', '$dept_id')";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $_SESSION['message'] = 'New Course added';
            if($dept_id == 1){
                header('location:../admin/pages/cbm.php?department=1');
            }
            else if($dept_id == 2){
                header('location:../admin/pages/cte.php?department=2');
            }
            else if($dept_id == 3){
                header('location:../admin/pages/cit.php?department=3');
            }
            else if($dept_id == 4){
                header('location:../admin/pages/cjc.php?department=4');
            }
            else if($dept_id == 5){
                header('location:../admin/pages/caf.php?department=5');
            }
            else{
                echo 'error';
            }
        } else {
            return false;
        }
    }

    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}