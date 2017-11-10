<?php
    session_start();
    if(!isset($_SESSION['usr']) && !isset($_SESSION['user_id'])){
        $isLoggedIn = false;
        return;
    }
    $username = $_SESSION['usr'];
    $user_id = $_SESSION['user_id'];
    $user_permissions = $_SESSION['user_permissions'];
    $isLoggedIn = true;
