<?php
include_once('DbConnection.php');
 
class UpdateEventDetails extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }


    // //Approved Event
    // public function approved_event($approved_event_id){

    //     $date_start = isset($_GET['date_start']) ? $_GET['date_start'] : '';
    //     $date_end   = isset($_GET['date_end']) ? $_GET['date_end'] : '';
    //     $time_start = isset($_GET['time_start']) ? $_GET['time_start'] : '';
    //     $time_end   = isset($_GET['time_end']) ? $_GET['time_end'] : '';

    //     // check date and time exist
    //     $check_sql = "SELECT * FROM tbl_event WHERE date_start = '$date_start' AND time_start = '$time_start' AND event_id != '$approved_event_id'";

    //     if ($result = $this->connection->query($check_sql)) {
    //         echo 'blas';
    //         while ($row = $result->fetch_assoc()) {
    //             $_SESSION['message'] = 'Event schedule has duplicate '.$row['event_id'];
    //             header('location:../admin/pages/view-event.php?id='.$approved_event_id.'&date_start='.$date_start.'&time_start='.$time_start);
    //         }
    //     }
    //     else {
    //         echo 'bla';
    //         $sql = "UPDATE tbl_event SET status = 'approved' WHERE event_id = '$approved_event_id'";
    //         $query = $this->connection->query($sql);
    
    //         if ($query === TRUE) {
    //             $_SESSION['message'] = 'Event was approved';
    //             header('location:../admin/pages/view-event.php?id='.$approved_event_id);
    //         } else {
    //             return false;
    //         }
    //     }
        
    // }

    //Approved Event
    public function approved_event($approved_event_id){
        $sql = "UPDATE tbl_event SET status = 'approved' WHERE event_id = '$approved_event_id'";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $_SESSION['message'] = 'Event was approved';
            header('location:../admin/pages/view-event.php?id='.$approved_event_id);
        } else {
            return false;
        }
    }

    //Disapproved Event
    public function disapproved_event($disapproved_event_id){

        $sql = "UPDATE tbl_event SET status = 'disapproved' WHERE event_id = '$disapproved_event_id'";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $_SESSION['message'] = 'Event was disapproved';
            header('location:../admin/pages/view-event.php?id='.$disapproved_event_id);
        } else {
            return false;
        }
    }

    //Post Event
    public function post_event($post_event_id){
        
        $date_now = date("Y-m-d");
        $time_now = date("h:i:sa");

        $sql = "UPDATE tbl_event SET status = 'posted', date_posted = '$date_now', time_posted = '$time_now' WHERE event_id = '$post_event_id'";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $_SESSION['message'] = 'Event was Posted';
            header('location:../pages/view-event.php?id='.$post_event_id);
        } else {
            return false;
        }
    }

    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}