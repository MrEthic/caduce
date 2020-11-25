<?php

abstract class Controller {

    public function load_model($model) {
        require_once(DIR . "/model/" . $model . ".model.php");
        $this->$model = new $model();
    }

    public function render($fichier, $data = []) {
        extract($data);
        require_once(DIR . "/view/" . strtolower(get_class($this)) . "/" . $fichier . ".php");

    }

}




?>