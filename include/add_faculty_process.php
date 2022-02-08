<?php
//start session
session_start();

include_once('../class/CheckUserDetails.php');
include_once('../class/InsertUserDetails.php');

$user = new CheckUserDetails();
$insert_faculty = new InsertUserDetails();
 
if(isset($_POST['add_faculty'])){

	$id_number = $user->escape_string($_POST['id_number']);
	$dept_id = $user->escape_string($_POST['dept_id']);

    $check_id_number_faculty = $user->check_id_number_faculty($id_number);
 
	if($check_id_number_faculty){
		$_SESSION['message'] = 'ID Number Already Exists';
        header('location:../admin/pages/faculty.php');
	}
	else{
		$add_faculty = $insert_faculty->add_faculty($id_number, $dept_id);
	}
}
else{
	$_SESSION['message'] = 'Error';
	header('location:../admin/pages/faculty.php');
}