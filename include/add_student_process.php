<?php
//start session
session_start();

include_once('CheckUserDetails.php');
include_once('InsertUserDetails.php');

$user = new CheckUserDetails();
$insert_student = new InsertUserDetails();
 
if(isset($_POST['add_student'])){

	$id_number = $user->escape_string($_POST['id_number']);

    $check_id_number_student = $user->check_id_number_student($id_number);
 
	if($check_id_number_student){
		$_SESSION['message'] = 'ID Number Already Exists';
        header('location:../admin/student.php');
	}
	else{
		$add_student = $insert_student->add_student($id_number);
	}
}
else{
	$_SESSION['message'] = 'Error';
	header('location:../admin/student.php');
}