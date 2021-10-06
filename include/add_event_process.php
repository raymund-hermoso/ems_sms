<?php
//start session
session_start();

include_once('InsertEventDetails.php');

$insert_event = new InsertEventDetails();
 
if(isset($_POST['add_event'])){

	$title = $insert_event->escape_string($_POST['title']);
	$description = $insert_event->escape_string($_POST['description']);
	$venue = $insert_event->escape_string($_POST['venue']);
	$event_datetime = $insert_event->escape_string($_POST['event_datetime']);
 
	$insert_event->add_event($title, $description, $venue, $event_datetime);
}
else{
	$_SESSION['message'] = 'Error';
}