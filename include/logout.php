<?php
	session_start();
	
	date_default_timezone_set("Asia/Manila");

	include_once('../class/InsertUserDetails.php');
	$log = new InsertUserDetails(); 

	if(isset($_SESSION['role'])){
		if($_SESSION['role'] == 1){
			session_destroy();
			header('location:../admin/index.php');
		}
		else{
			session_destroy();
			header('location:../index.php');
		}
	}
	else{
		session_destroy();
		header('location:../index.php');
	}
?>