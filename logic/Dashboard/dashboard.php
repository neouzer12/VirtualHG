<?php
    require_once('logic/config.php');
    require_once('logic/Authentication/auth.php');

    switch($user_permissions){
        case 0: //User is admin

            //Gets categories
            $query = "SELECT * FROM categories";
            $results = $conn->query($query);
            $categories = array();
            while($r = $results->fetch_assoc()){
                array_push($categories, [
                    "id" => $r['category_id'],
                    "category" => $r['category_name']
                ]);
            }

            //Get tips and suggestions
            $query = "SELECT tip_id as id, tip_title as title, tip_content as content, category_name as category, tip_time as tip_time FROM tips INNER JOIN categories ON categories.category_id=tips.category_id";
            $results = $conn->query($query);
            $tips = array();
            while($r = $results->fetch_assoc()){
                array_push($tips, [
                    "id" => $r['id'],
                    "title" => $r['title'],
                    "content" => $r['content'],
                    "category" => $r['category'],
                    "time" => $r['tip_time'],
                ]);
            }

            require('views/admin/dashboard.php');
            break;
        case 1: //User is a user
            require('views/user/dashboard.php');
            break;
    }

?>