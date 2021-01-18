<?php

namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");

/**
 * Class tickets
 * @package caducee\Controller
 * Handle /tickets routes
 */
class tickets extends Controller
{

    /**
     * Display all tickets
     * @throws \caducee\Exception\AccessException
     */
    public function index() {
        $this->admin();
        $this->render("index");
    }

}