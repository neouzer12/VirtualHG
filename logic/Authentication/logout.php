<?php
    session_start();
    session_unset();
    session_destroy();
    $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1));
    header("Location: $basepath/home" );
?>