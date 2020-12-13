<?php

require_once(DIR . "/controllers/Controller.php");

/**
 * Error Controller, handle all errors
 *
 * Class ErrorC
 */
class ErrorC extends Controller
{

    /**
     * Handle PDO exceptions
     *
     * @param Exception $e The PDO Exception
     */
    public function pdo(Exception  $e) : void
    {
        $this->render("pdo", ["code" => $e->getCode(), "msg" => $e->getMessage()]);
    }

    /**
     * Handle all other exceptions
     *
     * @param Exception $e The Exception
     */
    public function index(Exception $e)
    {
        // TODO
        echo "hello error";
    }

}


