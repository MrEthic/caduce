<?php

require_once(DIR . "/controllers/Controller.php");

class ErrorC extends Controller
{

    public function pdo($e)
    {
        $this->render("pdo", ["code" => $e->getCode(), "msg" => $e->getMessage()]);
    }

    public function index($e)
    {
        // TODO
    }

}


