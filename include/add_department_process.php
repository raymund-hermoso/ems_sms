<?php
session_start();

include_once('../class/FetchDepartment.php');
include_once('../class/InsertUserDetails.php');

$department = new FetchDepartment();
 
if(isset($_POST['add_dh_main'])){

	$dept_code = $department->escape_string($_POST['dept_code']);
	$dept_name = $department->escape_string($_POST['dept_name']);

    $check_department = $department->checkDepartment_main($dept_code, $dept_name);
 
	if($check_department) {

		$_SESSION['message'] = 'The Department is already exists';
		header('location:../admin/pages/department.php?department='.$check_department);
		
	}
	else{
		$add_dh = $department->AddDepartment_main($dept_code, $dept_name);
	}
}
else{
	$_SESSION['message'] = 'Error';
	// header('location:../admin/student.php');
}