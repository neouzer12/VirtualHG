<?php
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "virtualhg";

    $conn = new mysqli($server, $db_username, $db_password, $database);
    if(!$conn){
        echo "Failed to connect.";
        return;
    }
?>