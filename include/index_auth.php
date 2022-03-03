<?php
session_start();
 
//redirect if logged in
if(isset($_SESSION['user_id'])) {

    header('location: pages/home.php');
}
else {
    // $_SESSION["message"] = 'Session was timeout';
}
