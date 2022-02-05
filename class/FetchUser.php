<?php
include_once('DbConnection.php');
 
class FetchUser extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }


    //Student Users
    public function getUsersStudent(){
 
        $sql = "SELECT a.*, b.*, c.* FROM tbl_student AS a LEFT JOIN tbl_users AS b ON a.school_id_number = b.id_number LEFT JOIN tbl_course AS c ON a.course_id = c.id";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<tr>
                        <td>'.$row['school_id_number'].'</td>
                        <td>'.$row['firstname'].' '.$row['lastname'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['course'].'</td>
                        <td>'.$row['mobile_number'].'</td>
                        <td>';
                        if($row['id_number'] == ''){
                            echo '<span class="badge badge-warning">Not Registered</span>';
                        }
                        else{
                            echo '<span class="badge badge-success">Registered</span>';
                        }
                echo    '</td>
                        <td>';
                            if($row['id_number'] != '') { echo '<a href="update_user.php?sin='.$row['school_id_number'].'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>'; }
                echo    '</td>
                    </tr>';
            }
        }
        else{
            return false;
        }
    }

    //Department Head Users
    public function getUsersDepartmentHead(){
 
        $sql = "SELECT a.*, b.*, c.* FROM tbl_department_head AS a LEFT JOIN tbl_users AS b ON a.school_id_number = b.id_number LEFT JOIN tbl_department AS c ON a.department_id = c.id";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<tr>
                        <td>'.$row['school_id_number'].'</td>
                        <td>'.$row['firstname'].' '.$row['lastname'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['department_name'].'</td>
                        <td>'.$row['mobile_number'].'</td>
                        <td>';
                        if($row['id_number'] == ''){
                            echo '<span class="badge badge-warning">Not Registered</span>';
                        }
                        else{
                            echo '<span class="badge badge-success">Registered</span>';
                        }
                echo    '</td>
                        <td>';
                            if($row['id_number'] != '') { echo '<a href="update_user.php?sin='.$row['school_id_number'].'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>'; }
                echo    '</td>
                    </tr>';
            }
        }
        else{
            return false;
        }
    }


    //Department Head Users
    public function getUsersFaculty(){
 
        $sql = "SELECT a.*, b.* FROM tbl_faculty AS a LEFT JOIN tbl_users AS b ON a.school_id_number = b.id_number";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<tr>
                        <td>'.$row['school_id_number'].'</td>
                        <td>'.$row['firstname'].' '.$row['lastname'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['mobile_number'].'</td>
                        <td>';
                        if($row['id_number'] == ''){
                            echo '<span class="badge badge-warning">Not Registered</span>';
                        }
                        else{
                            echo '<span class="badge badge-success">Registered</span>';
                        }
                echo    '</td>
                        <td>';
                            if($row['id_number'] != '') { echo '<a href="update_user.php?sin='.$row['school_id_number'].'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>'; }
                echo    '</td>
                    </tr>';
            }
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

    public function user_details($sin){

        $sql = "SELECT * FROM tbl_users WHERE id_number = '$sin'";
        $query = $this->connection->query($sql);
 
        $row = $query->fetch_assoc();
 
        return $row;       
    }
 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}