<?php
//start session
session_start();

include_once('../class/UpdateEventDetails.php');

$event = new UpdateEventDetails();
 
if(isset($_GET['approve_event_id'])){
	$approved_event_id = isset($_GET['approve_event_id']) ? $_GET['approve_event_id'] : '';
	$event->approved_event($approved_event_id);
}
else if(isset($_GET['disapprove_event_id'])){
	$disapproved_event_id = isset($_GET['disapprove_event_id']) ? $_GET['disapprove_event_id'] : '';
	$event->disapproved_event($disapproved_event_id);
}
else if(isset($_GET['post_event_id'])){
	$post_event_id = isset($_GET['post_event_id']) ? $_GET['post_event_id'] : '';
	$event->post_event($post_event_id);
}
else{
	echo 'Error';
}

