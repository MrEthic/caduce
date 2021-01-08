<?php


namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");

/**
 * Class Faq
 * @package caducee\Controller
 * Manage /faq routes
 */
class Faq extends Controller
{

    /**
     * Display FAQ
     */
    public function index() {
        $this->render("index");
    }

}