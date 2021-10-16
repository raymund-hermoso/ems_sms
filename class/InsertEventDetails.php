<?php
include_once('DbConnection.php');
 
class InsertEventDetails extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }


    //
    public function add_event($title, $description, $venue, $date_start, $date_end, $time_start, $time_end){
        
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO tbl_event (title, event_desc, venue, date_start, date_end, time_start, time_end, status, user_id) VALUES ('$title', '$description', '$venue', '$date_start', '$date_end', '$time_start', '$time_end', 'request', '$user_id')";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            if($_SESSION['role'] == 1){
                $_SESSION['message'] = 'Event Created';
                header('location:../admin/pages/event.php');
            }
            else{
                $_SESSION['message'] = 'Event Created';
                header('location:../pages/event.php');
            }
            
        } else {
            return false;
        }
    }

    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}