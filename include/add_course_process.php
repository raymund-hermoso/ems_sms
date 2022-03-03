<?php
//start session
session_start();

include_once('../class/CheckCourseDetails.php');
include_once('../class/InsertCourseDetails.php');

$course_details = new CheckCourseDetails();
$insert_course = new InsertCourseDetails();
 
if(isset($_POST['add_course'])) {

	$course = $course_details->escape_string($_POST['course']);
	$dept_id = $course_details->escape_string($_POST['dept_id']);

    $check_course_name = $course_details->check_course_name($course);
 
	if($check_course_name){

		$_SESSION['message'] = 'Course Already Exists';
		header('location:../admin/pages/department.php?department='.$dept_id);
		
	}
	else{
		$add_course = $insert_course->add_course($course, $dept_id);
	}
}
else{
	$_SESSION['message'] = 'Error';
}