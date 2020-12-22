<?php

namespace caducee;

use caducee\Controller\Home;
use caducee\Exception\AlertException as AlertException;
use caducee\Exception\AccessException as AccessException;

define("DIR", getcwd());


require_once(DIR . "/config/config.php");
require_once(DIR . "/exceptions/AlertException.php");
require_once(DIR . "/exceptions/AccessException.php");

// Check si le user et ou non connecté et quel type de compte il
// utilise puis require le controller conrrespondant


session_start();
$params = explode('/', $_GET['p']);
try {
    if ($params[0] != "") {

        $controller = ucfirst($params[0]);
        $action = isset($params[1]) ? $params[1] : 'index';
        if (!file_exists(DIR . '/controllers/' . $controller . '.controller.php')) {
            header("Location: /");
            exit();
        }
        require_once(DIR . '/controllers/' . $controller . '.controller.php');
        $controller = "caducee\\Controller\\" . $controller;
            $controller = new $controller();

        if (method_exists($controller, $action)) {
            unset($params[0]);
            unset($params[1]);
            call_user_func_array([$controller, $action], $params);
        } else {
            http_response_code(404);
            echo "La page recherchée n'existe pas";
        }
    } else {
        require_once(DIR . "/controllers/Home.controller.php");
        $home = new Home();
        $home->index();
    }
}
catch (AlertException $e) {
    //require(DIR . "/view/alert.view.php");
    //pop_alert($e->getMessage(), $e->getType());
}
catch (AccessException $e) {
    // TODO : Qlq chose de propre quand on a pas les droits d'acces
    ignore_user_abort(true);
    echo "ho";
    header("Location: /home");
    echo "hey";
}
catch (\PDOException $e) {
    require_once(DIR . '/controllers/Error.php');
    $controller = new ErrorC();
    $controller->pdo($e);
}
catch (\Exception $e) {
    require_once(DIR . '/controllers/Error.php');
    $controller = new ErrorC();
    $controller->index($e);
}

