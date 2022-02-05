<?php
session_start();

include_once('../class/UpdateUserDetails.php');

$user = new UpdateUserDetails();
 
if(isset($_POST['update'])){

	$id_number = $user->escape_string($_POST['sin']);

	$firstname = $user->escape_string($_POST['firstname']);
	$middlename = $user->escape_string($_POST['middlename']);
	$lastname = $user->escape_string($_POST['lastname']);
	$email = $user->escape_string($_POST['email']);
	$mobile_number = $user->escape_string($_POST['mobile_number']);

    $user_updated = $user->update_user_details($firstname, $middlename, $lastname, $email, $mobile_number, $id_number);
	
	if($user_updated) {
		$_SESSION['message'] = 'User details updated';
        header('location:../admin/pages/update_user.php?sin='.$id_number);
	}
	else {
		$_SESSION['message'] = 'Error Updating';
	}
}
else{
	$_SESSION['message'] = 'Error';
}