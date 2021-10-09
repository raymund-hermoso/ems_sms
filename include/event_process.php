<?php
//start session
session_start();

include_once('UpdateEventDetails.php');

$approved_event = new UpdateEventDetails();
 
if(isset($_GET['id'])){
	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$approved_event->approved_event($id);
}
else{
	echo 'Error';
}