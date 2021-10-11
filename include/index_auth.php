<?php
session_start();
 
//redirect if logged in
if(isset($_SESSION['user_id'])){
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
        header('location: home.php');
    }
    else{
        header('location: ../pages/404.php');
    }
    
}