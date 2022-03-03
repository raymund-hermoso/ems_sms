<?php
include_once('DbConnection.php');
 
class InsertEventDetails extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }


    //Add Event
    public function add_event($title, $description, $venue, $date_start, $date_end, $time_start, $time_end){
        
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO tbl_event (title, event_desc, venue, date_start, date_end, time_start, time_end, status, user_id, invitee, event_type) VALUES ('$title', '$description', '$venue', '$date_start', '$date_end', '$time_start', '$time_end', 'posted', '$user_id', 5, 1)";
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

    //Add Event Request
    public function add_event_request($title, $description, $venue, $invited_department, $invitee, $date_start, $date_end, $time_start, $time_end, $status, $date_now, $time_now){
        
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO tbl_event (title, event_desc, venue, invited_department, invitee, date_start, date_end, time_start, time_end, status, user_id, event_type, date_posted, time_posted) VALUES ('$title', '$description', '$venue', '$invited_department', '$invitee', '$date_start', '$date_end', '$time_start', '$time_end', '$status', '$user_id', 2, '$date_now', '$time_now')";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            if($_SESSION['role'] == 1){
                $_SESSION['message'] = 'Event Created';
                header('location:../admin/pages/my-event.php');
            }
            else{
                $_SESSION['message'] = 'Event Created';
                header('location:../pages/event.php');
            }
            
        } else {
            echo $this->connection->error;
            return false;
        }
    }

    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}