<?php

    session_start();

    if(isset($_SESSION['role']) && $_SESSION['role'] == 1){
        header('location:../admin/pages/404.php');
        exit();
    }
    else{
        //return to login if not logged in
        if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')){
            header('location:../index.php');
        }
    }