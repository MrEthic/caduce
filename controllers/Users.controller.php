<?php

require_once(DIR . "/controllers/Controller.php");

/**
 * User Controller, handle all user routes
 *
 * Class Users
 */
class Users extends Controller {

    /**
     *  Render all the users
     */
    public function index() : void {
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
        if(isset($_POST["NSS"])) {
            $this->catch_create_user();
        }
    }

    /**
     *  Create a user
     */
    private function catch_create_user() : void {
        try {
            foreach ($_POST as $key => $field) {
                if ($field === "") {
                    throw new Exception("Impossible de créer un utilisateur avec un champs vide");
                }
            }
        } catch (Exception $e) {
            require(DIR . "/view/alert.view.php");
            pop_alert($e->getMessage(), "BAD");
            return;
        }
        $this->load_model("User");
        $this->User->create($_POST);
    }

    /**
     * Profil page of a specific user
     *
     * @param string $id Id of the user
     */
    public function profil(string $id) : void {
        $this->load_model("User");
        $this->User->id = $id;
        $user = $this->User->get_one();
        $this -> render("profil", ["user" => $user]);
    }

    /**
     * Create user page
     */
    public function create() : void {
        $this->load_model("User");
        $this -> render("create", []);
    }

}
