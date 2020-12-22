<?php

namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");

class Api extends Controller
{

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