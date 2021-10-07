<?php
//start session
session_start();

include_once('InsertEventDetails.php');

$insert_event = new InsertEventDetails();
 
if(isset($_POST['add_event'])){

	$title = $insert_event->escape_string($_POST['title']);
	$description = $insert_event->escape_string($_POST['description']);
	$venue = $insert_event->escape_string($_POST['venue']);
	$date_start = $insert_event->escape_string($_POST['date_start']);
	$date_end = $insert_event->escape_string($_POST['date_end']);
	$time_start = $insert_event->escape_string($_POST['time_start']);
	$time_end = $insert_event->escape_string($_POST['time_end']);
 
	$insert_event->add_event($title, $description, $venue, $date_start, $date_end, $time_start, $time_end);
}
else{
	$_SESSION['message'] = 'Error';
}