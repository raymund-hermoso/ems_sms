<?php
//start session
session_start();
 
include_once('CheckUserDetails.php');

$user = new CheckUserDetails();
 
if(isset($_POST['login'])){
	$username = $user->escape_string($_POST['username']);
	$password = $user->escape_string($_POST['password']);
 
	$auth = $user->check_login($username, $password);

	//fetch user data
	$sql = "SELECT * FROM tbl_users WHERE user_id = '$auth'";
	$row = $user->details($sql);

	if(!$auth){
		$_SESSION['message'] = 'Invalid username or password';
        header('location:../admin/index.php?username='.$username);
	}
	else{
		if($row['role'] == ''){
			$_SESSION['message'] = 'Invalid username or password';
			header('location:../admin/index.php?username='.$username);
		}
		else{
			$_SESSION['user_id'] = $auth;
			$_SESSION['role'] = $row['role'];
			header('location: ../admin/home.php');
		}
	}
}
else{
	$_SESSION['message'] = 'You need to login first.';
	header('location:../index.php');
}

