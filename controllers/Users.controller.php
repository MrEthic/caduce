<?php

require_once(DIR . "/controllers/Controller.php");

class Users extends Controller {

    public function index() {
        $this->load_model("User");
        if(isset($_GET["filter"])) {
            $users = $this->User->global_filter($_GET["filter"]);
        }
        else if(isset($_GET["type"])) {
            $params = ["Genre" => $_GET["sex"],
            "Nom" => $_GET["nom"],
            "Prenom" => $_GET["prenom"],
            "Mail" => $_GET["mail"],
            "Tel" => $_GET["tel"],
            "dateA" => $_GET["from_date"],
            "dateB" => $_GET["to_date"]];

            $filters = [];
            foreach($params as $in_db => $val) {
                if ($val != "") {
                    $filters[$in_db] = $val;
                }
            }
            $users = $this->User->complexe_filter($filters, $_GET["type"]);
        }
        else {
            $users = $this->User->get_all();
        }
        $this -> render("index", ["users" => $users]);
    }

    public function profil($id) {
        $this->load_model("User");
        $this->User->id = $id;
        $user = $this->User->get_one();
        $this -> render("profil", ["user" => $user]);
    }

    public function create() {
        $this->load_model("User");
        $this -> render("create", []);
    }

}

?>