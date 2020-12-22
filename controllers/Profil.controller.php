<?php


namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");


class Profil extends Controller
{

    public function index() {
        $this->render("index");
    }

}