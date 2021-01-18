<?php


namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");


/**
 * Class Profil
 * @package caducee\Controller
 * Handle /profil routes
 */
class Profil extends Controller
{

    /**
     * Display user info
     */
    public function index() {
        $this->render("index");
    }

}