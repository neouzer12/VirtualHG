<?php
    require_once('logic/config.php');
    require_once('logic/Authentication/auth.php');
    switch($user_permissions){
        case 0: //User is admin
            require('views/admin/dashboard.php');
            break;
        case 1: //User is a user
            require('views/user/dashboard.php');
            break;
    }

?>