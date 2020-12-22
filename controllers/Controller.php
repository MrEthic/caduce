<?php

namespace caducee\Controller;

require_once(DIR . "/exceptions/AccessException.php");

/**
 * Class Controller
 *
 * Abstract class for all Controller class
 */
abstract class Controller {

    protected $name;

    /**
     * Load a Model class
     *
     * @param string $model The name of the desired model
     * @param mixed ...$params
     */
    public function load_model(string $model, ...$params) : void {
        require_once(DIR . "/model/" . $model . ".model.php");
        $fmodel = "caducee\\Model\\" . $model;
        $this->$model = new $fmodel(...$params);
    }

    /**
     * Render a View
     *
     * @param string $fichier File to render
     * @param array $data Data to be passed for the view to work
     */
    public function render(string $fichier, Array $data = []) : void {
        extract($data);
        $name = explode("\\", strtolower(get_class($this)));
        require_once(DIR . "/view/" . end($name) . "/" . $fichier . ".php");
    }

    protected function isLoged() {
        if (!isset($_SESSION['NSS'], $_SESSION['ROLE'])) {
            throw new \caducee\Exception\AccessException();
        }
    }

    protected function admin(bool $can_pass = false) {
        $this->isLoged();
        if ($_SESSION['ROLE'] != 1) {
            throw new \caducee\Exception\AccessException();
        }
    }

    protected function gestionaire(bool $can_pass = false) {
        $this->isLoged();
        if ($_SESSION['ROLE'] != 7) {
            throw new \caducee\Exception\AccessException();
        }
    }

    protected function user(bool $can_pass = false) {
        $this->isLoged();
        if ($_SESSION['ROLE'] != 6) {
            throw new \caducee\Exception\AccessException();
        }
    }

}
