<?php

namespace caducee\Controller;

require_once(DIR . "/exceptions/AccessException.php");

/**
 * Class Controller
 *
 * Abstract class for all Controller class
 */
abstract class Controller {

    /**
     * @var
     */
    protected $name;

    /**
     * Load a Model class and append params
     *
     * @param string $model The name of the desired model
     * @param mixed ...$params Parameters to send to the model
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

    /**
     * Throw an error if user is not login
     *
     * @throws \caducee\Exception\AccessException
     */
    protected function isLoged() {
        if (!isset($_SESSION['NSS'], $_SESSION['ROLE'])) {
            throw new \caducee\Exception\AccessException();
        }
    }

    /**
     * Throw an error if user is not an admin
     *
     * @param bool $can_pass /TOBE DELETED
     * @throws \caducee\Exception\AccessException
     */
    protected function admin(bool $can_pass = false) {
        $this->isLoged();
        if ($_SESSION['ROLE'] != 1) {
            throw new \caducee\Exception\AccessException();
        }
    }

    /**
     * Throw an error if user is not a gestionaire
     *
     * @param bool $can_pass
     * @throws \caducee\Exception\AccessException
     */
    protected function gestionaire(bool $can_pass = false) {
        $this->isLoged();
        if ($_SESSION['ROLE'] != 7) {
            throw new \caducee\Exception\AccessException();
        }
    }

    /**
     * Throw an error if user is not a User
     *
     * @param bool $can_pass
     * @throws \caducee\Exception\AccessException
     */
    protected function user(bool $can_pass = false) {
        $this->isLoged();
        if ($_SESSION['ROLE'] != 6) {
            throw new \caducee\Exception\AccessException();
        }
    }

}
