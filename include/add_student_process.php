<?php
//start session
session_start();

include_once('../class/CheckUserDetails.php');
include_once('../class/InsertUserDetails.php');

$user = new CheckUserDetails();
$insert_student = new InsertUserDetails();
 
if(isset($_POST['add_student'])){

	$id_number = $user->escape_string($_POST['id_number']);
	$course = $user->escape_string($_POST['course']);

    $check_id_number_student = $user->check_id_number_student($id_number);
 
	if($check_id_number_student){
		$_SESSION['message'] = 'ID Number Already Exists';
        header('location:../admin/pages/student.php');
	}
	else{
		$add_student = $insert_student->add_student($id_number, $course);
	}
}
else{
	$_SESSION['message'] = 'Error';
	header('location:../admin/pages/student.php');
}