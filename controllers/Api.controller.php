<?php

namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");

/**
 * Class Api
 * @package caducee\Controller
 * Manage /api routes
 */
class Api extends Controller
{

    /**
     * Wether or not the login user has to be notify
     * Response : {"success" : 0|1 , "msg": String, "notify" : 0|1}
     */
    public function notify() {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return;
        }
        if (!isset($_SESSION["NSS"])) {
            echo json_encode(["success" => 0, "msg" => "User must be logged-in", "notify" => 0]);
        }
        $this->load_model("Api");
        $this->Api->id = $_SESSION["NSS"];
        echo json_encode(["success" => 0, "msg" => "", "notify" => $this->Api->is_notif()]);
    }


}