<?php

require_once(DIR . "/exceptions/AccessException.php");

/**
 * Class Controller
 *
 * Abstract class for all Controller class
 */
abstract class Controller {

    /**
     * Load a Model class
     *
     * @param string $model The name of the desired model
     */
    public function load_model(string $model) : void {
        require_once(DIR . "/model/" . $model . ".model.php");
        $this->$model = new $model();
    }

    /**
     * Render a View
     *
     * @param string $fichier File to render
     * @param array $data Data to be passed for the view to work
     */
    public function render(string $fichier, Array $data = []) : void {
        extract($data);
        require_once(DIR . "/view/" . strtolower(get_class($this)) . "/" . $fichier . ".php");
    }

    protected function isLoged() {
        if (!isset($_SESSION['NSS'], $_SESSION['ROLE'])) {
            throw new AccessException();
        }
    }

    protected function admin(bool $can_pass = false) {
        $this->isLoged();
        if ($_SESSION['ROLE'] != 1) {
            throw new AccessException();
        }
    }

    protected function gestionaire(bool $can_pass = false) {
        $this->isLoged();
        if ($_SESSION['ROLE'] != 7) {
            throw new AccessException();
        }
    }

    protected function user(bool $can_pass = false) {
        $this->isLoged();
        if ($_SESSION['ROLE'] != 6) {
            throw new AccessException();
        }
    }

}
