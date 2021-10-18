<?php
include_once('DbConnection.php');
 
class FetchCourse extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }


    //Course
    public function getCourse(){

        $department = isset($_GET['department']) ? $_GET['department'] : '';
 
        $sql = "SELECT * FROM tbl_course WHERE dept_id = '$department'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<tr>
                        <td>'.$row['course'].'</td>
                        <td><a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a></td>
                    </tr>';
            }
        }
        else{
            return false;
        }
    }

    //Course Dropdown
    public function getCourseDropdown(){
 
        $sql = "SELECT * FROM tbl_course";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<option value="'.$row['id'].'">'.$row['course'].'</option>';
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