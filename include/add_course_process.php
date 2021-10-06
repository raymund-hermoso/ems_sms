<?php
//start session
session_start();

include_once('CheckCourseDetails.php');
include_once('InsertCourseDetails.php');

$course_details = new CheckCourseDetails();
$insert_course = new InsertCourseDetails();
 
if(isset($_POST['add_course'])){

	$course = $course_details->escape_string($_POST['course']);
	$dept_id = $course_details->escape_string($_POST['dept_id']);

    $check_course_name = $course_details->check_course_name($course);
 
	if($check_course_name){
		$_SESSION['message'] = 'Course Already Exists';
		if($dept_id == 1){
			header('location:../admin/cbm.php?department=1');
		}
		else if($dept_id == 2){
			header('location:../admin/cte.php?department=2');
		}
		else if($dept_id == 3){
			header('location:../admin/cit.php?department=3');
		}
		else if($dept_id == 4){
			header('location:../admin/cjc.php?department=4');
		}
		else if($dept_id == 5){
			header('location:../admin/caf.php?department=5');
		}
		else{
			echo 'error';
		}
        
	}
	else{
		$add_course = $insert_course->add_course($course, $dept_id);
	}
}
else{
	$_SESSION['message'] = 'Error';
}