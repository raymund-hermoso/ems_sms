<?php
//start session
session_start();

include_once('../class/CheckUserDetails.php');
include_once('../class/InsertUserDetails.php');

$user = new CheckUserDetails();
$insert_dh = new InsertUserDetails();
 
if(isset($_POST['add_dh'])){

	$id_number = $user->escape_string($_POST['id_number']);
	$department = $user->escape_string($_POST['department']);

    $check_id_number_dh = $user->check_id_number_dh($id_number);
	$check_id_number_users = $user->check_id_number($id_number);
 
	if($check_id_number_dh || $check_id_number_users){
		$_SESSION['message'] = 'ID Number Already Exists';
        header('location:../admin/pages/department_head.php');
	}
	else{
		$add_dh = $insert_dh->add_dh($id_number, $department);
	}
}
else{
	$_SESSION['message'] = 'Error';
	header('location:../admin/student.php');
}