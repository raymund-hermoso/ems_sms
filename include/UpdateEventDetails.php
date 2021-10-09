<?php
include_once('DbConnection.php');
 
class UpdateEventDetails extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }


    //
    public function approved_event($id){
        $sql = "UPDATE tbl_event SET status = 'approved' WHERE event_id = '$id'";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $_SESSION['message'] = 'Event was Approved';
            header('location:../admin/view-event.php?id='.$id);
        } else {
            return false;
        }
    }

    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}