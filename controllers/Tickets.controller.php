<?php

namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");

class tickets extends Controller
{

    public function index() {
        $this->admin();
        $this->render("index");
    }

}