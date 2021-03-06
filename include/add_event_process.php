<?php
//start session
session_start();

include_once('../class/InsertEventDetails.php');

$insert_event = new InsertEventDetails();

$title = $insert_event->escape_string($_POST['title']);
$description = $insert_event->escape_string($_POST['description']);
$venue = $insert_event->escape_string($_POST['venue']);

$invited_department = $insert_event->escape_string(isset($_POST['invited_department']) ? $_POST['invited_department'] : '');
$invitee = $insert_event->escape_string(isset($_POST['invitee']) ? $_POST['invitee'] : '');

$date_start = $insert_event->escape_string($_POST['date_start']);
$date_end = $insert_event->escape_string($_POST['date_end']);
$time_start = $insert_event->escape_string($_POST['time_start']);
$time_end = $insert_event->escape_string($_POST['time_end']);
 
if(isset($_POST['add_event'])){
	$insert_event->add_event($title, $description, $venue, $date_start, $date_end, $time_start, $time_end);
}
else if(isset($_POST['add_event_request'])) {

	if($_SESSION['role'] == 1) {
		$date_now = date("Y-m-d");
		$time_now = date("h:i:sa");
		$status = 'posted';
	}
	else {
		$date_now = '';
    	$time_now = '';
		$status = 'request';
	}
	
	$insert_event->add_event_request($title, $description, $venue, $invited_department, $invitee, $date_start, $date_end, $time_start, $time_end, $status, $date_now, $time_now);

}
else{
	$_SESSION['message'] = 'Error';
}