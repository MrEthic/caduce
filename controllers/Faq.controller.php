<?php


namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");

class Faq extends Controller
{

    public function index() {
        $this->render("index");
    }

}