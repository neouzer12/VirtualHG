<?php
    if(!isset($_SESSION['usr']) && !isset($_SESSION['user_id'])){
        $isLoggedIn = false;
        return;
    }
    session_start();
    $username = $_SESSION['usr'];
    $user_id = $_SESSION['user_id'];
    $user_permissions = $_SESSION['user_permissions'];
    $isLoggedIn = true;

?>