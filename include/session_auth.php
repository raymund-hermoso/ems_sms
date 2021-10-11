<?php

    session_start();

    //return to login if not logged in
    if(!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')){
        header('location:../index.php');
    }

    
    

   

    