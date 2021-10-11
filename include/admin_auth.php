<?php
session_start();

if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
	include '../include/session_auth.php';
}
else{
	include '../include/index_auth.php';
}
	
