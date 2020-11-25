<?php

define("DIR", getcwd());
require_once(DIR . "/config/config.php");

// Check si le user et ou non connecté et quel type de compte il
// utilise puis require le controller conrrespondant

$params = explode('/', $_GET['p']);

if($params[0] != ""){
   
    $controller = ucfirst($params[0]);
    $action = isset($params[1]) ? $params[1] : 'index';
    require_once(DIR.'/controllers/'.$controller.'.controller.php');
    $controller = new $controller();

    if(method_exists($controller, $action)){
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller, $action], $params);    
    }else{
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }
}else{
    //Si pas de page on rend la page d'acceuil
    require_once(ROOT.'controllers/Main.php');
    $controller = new Main();
    $controller->index();
}

//require_once(DIR . "/controller/global.control.php");


?>