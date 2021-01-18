<?php

namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");

/**
 * Class Home
 * @package caducee\Controller
 * Handle / routes
 */
class Home extends Controller
{

    /**
     * Display home page
     */
    public function index() {
        $this->render("index", []);
    }

}