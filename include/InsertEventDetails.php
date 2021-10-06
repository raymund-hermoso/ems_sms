<?php
include_once('DbConnection.php');
 
class InsertEventDetails extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }


    //
    public function add_event($title, $description, $venue, $event_datetime){
        
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO tbl_event (title, event_desc, venue, date_time, user_id) VALUES ('$title', '$description', '$venue', '$event_datetime', '$user_id')";
        $query = $this->connection->query($sql);

        if ($query === TRUE) {
            $_SESSION['message'] = 'Event Created';
            header('location:../pages/home.php');
        } else {
            return false;
        }
    }

    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}