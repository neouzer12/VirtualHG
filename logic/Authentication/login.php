<?php
    if(!isset($_POST)){
        exit;
    }
    require_once('logic/config.php');
    $username = $_POST['usr'];
    $password = hash('sha256', $_POST['pwd']);

    $query = "SELECT user_id, usr, permission FROM users WHERE usr='$username' AND pwd='$password' LIMIT 1";

    $result = $conn->query($query);

    if ($result->num_rows == 1){
        session_start();
        $userdata = $result->fetch_assoc();
        $_SESSION['usr'] = $username;
        $_SESSION['user_id'] = $userdata['user_id'];
        $_SESSION['user_permissions'] = $userdata['permission'];
        $response = ["status" => 0];
    }else{
        $response = ["status" => 1];
    }

    echo json_encode($response);
?>