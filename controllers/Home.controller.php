<?php

namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");

class Home extends Controller
{

    public function index() {
        $this->render("index", []);
    }

}