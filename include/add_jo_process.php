<?php
//start session
session_start();

include_once('../class/CheckUserDetails.php');
include_once('../class/InsertUserDetails.php');

$user = new CheckUserDetails();
$insert_faculty = new InsertUserDetails();
 
if(isset($_POST['add_faculty'])){

	$id_number = $user->escape_string($_POST['id_number']);

    $check_id_number_faculty = $user->check_id_number_jo($id_number);
	$check_id_number_users = $user->check_id_number($id_number);
 
	if($check_id_number_faculty || $check_id_number_users){
		$_SESSION['message'] = 'ID Number Already Exists';
        header('location:../admin/pages/jo.php');
	}
	else{
		$add_faculty = $insert_faculty->add_jo($id_number);
	}
}
else{
	$_SESSION['message'] = 'Error';
	header('location:../admin/pages/jo.php');
}