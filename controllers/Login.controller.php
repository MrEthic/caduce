<?php

namespace caducee\Controller;
// 50163181163dd777
require_once(DIR . "/controllers/Controller.php");

/**
 * Class Login
 * @package caducee\Controller
 * Handle /login routes
 */
class Login extends Controller
{

    /**
     * Display login Page is user is not login, else redirect to /profil
     */
    public function index() : void
    {
        // L'utilisateur est déja connécté
        if (isset($_SESSION['NSS'])) {
            header("Location: /profil");
            exit();
        }
        //$this->try_auto_connect();
        $this->load_model("Auth");
        // Catch une post request de login
        if (isset($_POST['mailconnect'])) {
            $this->post_login();
        }
        $this->render("index", []);
    }

    /**
     * Post request on /login
     *
     * Validate user connection
     */
    private function post_login() : void {
        $mail = htmlspecialchars($_POST['mailconnect']);
        $password = htmlspecialchars($_POST['mdpconnect']);
        if ($mail != "" and $password != "") {
            $user = $this->Auth->authenticator($mail, $password);
            if ($this->check_user($user, $password)) {
                if (isset($_POST['rememberme'])) {
                    setcookie('auto_log_mail', $mail, time() + 365 * 24 * 3600, null, null, false, true);
                    setcookie('auto_log_password', $password, time() + 365 * 24 * 3600, null, null, false, true);
                }
                header("Location: /home");
                exit();
            }
        } else {
            // TODO : les champs doivent etre complété
        }
    }

    /**
     * Try auto connect with cookies values
     */
    private function try_auto_connect()
    {
        if (isset($_COOKIE['auto_log_mail'], $_COOKIE['auto_log_password'])
            and !empty($_COOKIE['auto_log_mail'])
            and !empty($_COOKIE['auto_log_password'])) {

            $this->load_model("Auth");
            $user = $this->Auth->authenticator($_COOKIE['auto_log_mail'], $_COOKIE['auto_log_password']);
            if($this->check_user($user, $_COOKIE['auto_log_password'])) {
                header("Location: /home");
                exit();
            }
        }
    }

    /**
     * Check if the user is valid
     * @param $user
     * @param string $password
     * @return bool
     */
    private function check_user($user, string $password): bool
    {
        if (!$user) { //Aucun user avec ce mail
            // TODO : Aucun user avec ce mail
            return false;
        } else if (password_verify($password, $user["hash_password"])) {
            if ($user["is_suspended"] == 1) {
                // TODO : compte suspendu
                exit();
            }
            $_SESSION['NSS'] = $user['NSS'];
            $_SESSION['nom'] = $user['Nom'];
            $_SESSION['prenom'] = $user['Prenom'];
            $_SESSION['mail'] = $user['Mail'];
            $_SESSION['ROLE'] = $user['role_id'];
            $_SESSION['hid'] = $user["id_hospital"];
            return true;
        } else {
            // TODO : mauvais mot de passe
            return false;
        }
    }


}