<?php

namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");
require_once(DIR . "/utils/validation.php");

/**
 * User Controller, handle all user routes
 *
 * Class Users
 */
class Users extends Controller
{

    /**
     *  Render all the users
     */
    public function index(): void
    {
        $this->gestionaire();
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            header("Location: /");
        }
        $this->load_model("Users");
        $users = $this->Users->get_hospital($_SESSION["hid"]);
        $this->render("index", ["users" => $users]);
    }

    /**
     * Fetch users
     *
     * @return string users in json format
     * @throws \caducee\Exception\AccessException
     */
    public function json() {
        $this->gestionaire();
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            header("Location: /");
        }
        $this->load_model("Users");
        if (isset($_GET["filter"])) {
            $filter = validate_input($_GET["filter"]);
            $users = $this->Users->global_filter($filter);
        } else if (isset($_GET["type"])) {
            $type = validate_input($_GET["type"]);
            $params = [
                "Genre" => validate_input($_GET["sex"], "bool"),
                "Nom" => validate_input($_GET["nom"], "string"),
                "Prenom" => validate_input($_GET["prenom"], "string"),
                "Mail" => validate_input($_GET["mail"], "string"),
                "Tel" => validate_input($_GET["tel"], null, "/^\d+$/"),
                "dateA" => validate_input($_GET["from_date"], "date"),
                "dateB" => validate_input($_GET["to_date"], "date")
            ];

            $filters = [];
            foreach ($params as $in_db => $val) {
                if ($val != "") {
                    $filters[$in_db] = $val;
                }
            }
            $users = $this->Users->complexe_filter($filters, $type);
        } else {
            $users = $this->Users->get_hospital($_SESSION["hid"]);
        }
        echo json_encode($users);
    }

    /**
     * Profil page of a specific user
     *
     * @param string $id Id of the user
     */
    public function profil(string $id): void
    {
        $this->gestionaire();
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            header("Location: /");
        }
        $this->load_model("Users");
        $id = validate_input($id, null, "/^[12]\d{12}$/");
        $this->Users->id = $id;
        $user = $this->Users->get_one();
        if ($user === false) {
            header("Location: /users");
        } else {
            $this->render("profil", ["user" => $user]);
        }
    }

    /**
     * Create user page
     */
    public function create(): void
    {
        $this->gestionaire();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /");
        }
        $this->load_model("Users", $_SESSION["hid"]);
        if (isset($_POST["NSS"])) {
            echo json_encode($this->post_create());
        }
    }

    /**
     *  Create a user
     */
    private function post_create()
    {
        $this->load_model("Users");
        $params = [
            "NSS" => validate_input($_POST["NSS"], null, "/^[12]\d{12}$/"),
            "prenom" => validate_input($_POST["prenom"], "string", "/.{3,}/"),
            "nom" => validate_input($_POST["nom"], "string", "/.{3,}/"),
            "mail" => validate_input($_POST["mail"], "mail", "/.{3,}/"),
            "tel" => validate_input($_POST["tel"], "tel"),
            "adress_1" => validate_input($_POST["adress_1"], "string", "/.{3,}/"),
            "adress_2" => validate_input($_POST["adress_2"], "string"),
            "postal" => validate_input($_POST["postal"], "string", "/^\d{5}$/"),
            "city" => validate_input($_POST["city"], "string", "/.{3,}/"),
            "hid" => $_SESSION["hid"]
        ];
        if ($params["NSS"] == ""
            or $params["prenom"] == ""
            or $params["nom"] == ""
            or $params["mail"] == ""
            or $params["tel"] == ""
            or $params["adress_1"] == ""
            or $params["postal"] == ""
            or $params["city"] == "") {
            return ["success" => false, "msg"=>"Vérifiez les informations saisies"];
        }
        if ($this->Users->create($params)) {
            return ["success" => true, "msg"=> $params["prenom"] . " " . $params["nom"] . " à bien était ajouté"];

        } else {
            return ["success" => false, "msg"=>"Mail ou numéro de sécurité social déjà existant"];
        }
    }

}
