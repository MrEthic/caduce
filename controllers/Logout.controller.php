<?php

namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");

/**
 * Class Logout
 * @package caducee\Controller
 * Handle /logout routes
 */
class Logout extends Controller
{

    /**
     * Disconnect user
     */
    public function index() : void {
        if (isset($_SESSION["ROLE"])) {
            session_destroy();
            session_unset();
        }
        header("Location: /home");
    }

}