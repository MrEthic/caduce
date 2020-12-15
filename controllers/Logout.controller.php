<?php

require_once(DIR . "/controllers/Controller.php");

class Logout extends Controller
{

    public function index() : void {
        if (isset($_SESSION["ROLE"])) {
            session_destroy();
            session_unset();
        }
        header("Location: /home");
    }

}