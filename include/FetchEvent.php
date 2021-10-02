<?php
include_once('DbConnection.php');
 
class FetchEvent extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }


    //Events
    public function getEvents(){
 
        $sql = "SELECT * FROM tbl_event";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                echo '<tr>
                        <td>'.$row['title'].'</td>
                        <td>'.$row['description'].'</td>
                        <td>'.$row['start_time_date'].'</td>
                        <td>'.$row['end_time_date'].'</td>
                        <td>'.$row['venue'].'</td>
                        <td>'.$row['status'].'</td>
                        <td><a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a></td>
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
 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}