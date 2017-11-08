<?php
    function getCurrentUri(){
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        $uri = '/' . trim($uri, '/');
        return $uri;
    }

    $base_url = getCurrentUri();
    $routes = array();
    $links = explode('/', $base_url);
    foreach($links as $link){
        if(trim($link) != '')
            array_push($routes, $link);
    }

    switch($routes[0]){
        case "config":
            require 'logic/config.php';
            break;
        case "home":
            require 'views/home.php';
            break;
        case "Auth":
            $redirectTo = "logic/Authentication/";
            switch($routes[1]){
                case "login":
                    require $redirectTo . "login.php";
                    break;
                case "logout":
                    require $redirectTo . "logout.php";
                    break;
            }
            break;
        default:
            echo "404 page not found!";
            break;
    }

?>