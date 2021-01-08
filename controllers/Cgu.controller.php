<?php


namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");

/**
 * Class Cgu
 * @package caducee\Controller
 * Manage /cgu routes
 */
class Cgu extends Controller
{

    /**
     * Display CGU
     */
    public function index()
    {
        $this->render("index");
    }

}