<?php
//start session
session_start();
 
include_once('CheckUserDetails.php');
include_once('InsertUserDetails.php');
include_once('UpdateUserDetails.php');

$user = new CheckUserDetails();
$insert_user = new InsertUserDetails();
$update_user = new UpdateUserDetails();
 
if(isset($_POST['register'])){
	$id_number = $user->escape_string($_POST['id_no']);
	$firstname = $user->escape_string($_POST['fname']);
	$middlename = $user->escape_string($_POST['mname']);
	$lastname = $user->escape_string($_POST['lname']);
	$email = $user->escape_string($_POST['email']);
	$mobile_number = $user->escape_string($_POST['mobile_number']);
	$username = $user->escape_string($_POST['username']);
	$password = $user->escape_string($_POST['password']);
	$password_rpt = $user->escape_string($_POST['password_rpt']);

	$check_id_number = $user->check_id_number($id_number);
	$validate_email = $user->invalidEmail($email);
	$check_email = $user->check_email($email);
	$validate_username = $user->invalidUsername($username);
	$check_username = $user->check_username($username);
	$validate_password = $user->pwdMatch($password, $password_rpt);

	$school_id_number_student = $user->check_id_number_student($id_number);
	$school_id_number_dh = $user->check_id_number_dh($id_number);

	// $check_password = $user->check_password($password);

	if($check_id_number){
		$_SESSION['message'] = 'ID Number already exists';
    	header('location:../register.php?id_no='.$id_number.'&fname='.$firstname.'&mname='.$middlename.'&lname='.$lastname.'&email='.$email.'&course='.$course.'&mobile_number='.$mobile_number.'&username='.$username);
	}
	else if($validate_email !== false){
		$_SESSION['message'] = 'Invalid Email';
    	header('location:../register.php?id_no='.$id_number.'&fname='.$firstname.'&mname='.$middlename.'&lname='.$lastname.'&email='.$email.'&course='.$course.'&mobile_number='.$mobile_number.'&username='.$username);
	}
	else if($check_email){
		$_SESSION['message'] = 'Email already exists';
    	header('location:../register.php?id_no='.$id_number.'&fname='.$firstname.'&mname='.$middlename.'&lname='.$lastname.'&email='.$email.'&course='.$course.'&mobile_number='.$mobile_number.'&username='.$username);
	}
	else if($validate_username !== false){
		$_SESSION['message'] = 'Invalid username (hint: a-z, A-Z, 0-9)';
    	header('location:../register.php?id_no='.$id_number.'&fname='.$firstname.'&mname='.$middlename.'&lname='.$lastname.'&email='.$email.'&course='.$course.'&mobile_number='.$mobile_number.'&username='.$username);
	}
	else if($check_username){
		$_SESSION['message'] = 'Username already exists';
    	header('location:../register.php?id_no='.$id_number.'&fname='.$firstname.'&mname='.$middlename.'&lname='.$lastname.'&email='.$email.'&course='.$course.'&mobile_number='.$mobile_number.'&username='.$username);
	}
	else if($validate_password !== false){
		$_SESSION['message'] = 'Password does not match';
    	header('location:../register.php?id_no='.$id_number.'&fname='.$firstname.'&mname='.$middlename.'&lname='.$lastname.'&email='.$email.'&course='.$course.'&mobile_number='.$mobile_number.'&username='.$username);
	}
	else if($school_id_number_student !== false){
		if($insert_user->add_user($id_number, $firstname, $middlename, $lastname, $email, $mobile_number, $username, $password)){
			$update_user->update_role_student($school_id_number_student);
		}
		else{
			echo 'error2';
		}
	}
	else if($school_id_number_dh !== false){
		if($insert_user->add_user($id_number, $firstname, $middlename, $lastname, $email, $mobile_number, $username, $password)){
			$update_user->update_role_department_head($school_id_number_dh);
		}
		else{
			echo 'error3';
		}
	}
	// else if($check_password){
	// 	$_SESSION['message'] = 'Password already exists';
    // 	header('location:../register.php?id_no='.$id_number.'&fname='.$firstname.'&mname='.$middlename.'&lname='.$lastname.'&email='.$email.'&course='.$course.'&mobile_number='.$mobile_number.'&username='.$username);
	// }
	else{
		$_SESSION['message'] = 'Not Registered ID Number';
    	header('location:../register.php?id_no='.$id_number.'&fname='.$firstname.'&mname='.$middlename.'&lname='.$lastname.'&email='.$email.'&course='.$course.'&mobile_number='.$mobile_number.'&username='.$username);
	}

}
else{
	header('location:../index.php');
}


