<?php
    require_once('../config.php');
    if (!empty($_POST)){
        $id = $_POST['tip_id'];
        $title = addslashes($_POST['tip_title']);
        $cat_id = $_POST['tip_cat'];
        $content = addslashes($_POST['tip_content']);

        if ($id < 0){//Add new value
            $query = "INSERT INTO tips (tip_title, tip_content, category_id) VALUES ('$title', '$content', $cat_id)";
            $conn->query($query);
            
            if ($conn->error == ""){
                $response = ["status" => 0];
            }else{
                $response = ["status" => 1, "message" => $conn->error];
            }
            
        }else{//Update value
            $query = "UPDATE tips SET tip_title='$title', tip_content='$content', category_id=$cat_id WHERE tip_id=$id";
            $conn->query($query);

            if ($conn->error == ""){
                $response = ["status" => 0];
            }else{
                $response = ["status" => 1, "message" => $conn->error];
            }
        }

        echo json_encode($response);
    }







?>