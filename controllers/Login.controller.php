<?php

require_once(DIR . "/controllers/Controller.php");
require_once(DIR . "/exceptions/AlertException.php");

class Login extends Controller
{

    public function index()
    {
        if (isset($_SESSION['NSS'])) {
            header("Location: /profil");
            exit();
        }
        //$this->try_auto_connect();
        $this->load_model("User");
        if (isset($_POST['mailconnect'])) {
            $this->post_login();
        }
        $this->render("index", []);
    }

    private function post_login() {
        $mail = htmlspecialchars($_POST['mailconnect']);
        $password = htmlspecialchars($_POST['mdpconnect']);
        if ($mail != "" and $password != "") {
            $user = $this->User->authenticator($mail, $password);
            if ($this->check_user($user, $password)) {
                if (isset($_POST['rememberme'])) {
                    setcookie('auto_log_mail', $mail, time() + 365 * 24 * 3600, null, null, false, true);
                    setcookie('auto_log_password', $password, time() + 365 * 24 * 3600, null, null, false, true);
                }
                header("Location: /home");
                exit();
            }
        } else {
            throw new AlertException("Tout les champs doivent etre complété !", "BAD");
        }
    }

    private function try_auto_connect()
    {
        if (isset($_COOKIE['auto_log_mail'], $_COOKIE['auto_log_password'])
            and !empty($_COOKIE['auto_log_mail'])
            and !empty($_COOKIE['auto_log_password'])) {

            $this->load_model("User");
            $user = $this->User->authenticator($_COOKIE['auto_log_mail'], $_COOKIE['auto_log_password']);
            if($this->check_user($user, $_COOKIE['auto_log_password'])) {
                header("Location: /home");
                exit();
            }
        }
    }

    private function check_user($user, string $password): bool
    {
        if (!$user) { //Aucun user avec ce mail
            throw new AlertException("Mauvaise adresse mail");
            return false;
        } else if (password_verify($password, $user["hash_password"])) {
            $_SESSION['NSS'] = $user['NSS'];
            $_SESSION['nom'] = $user['Nom'];
            $_SESSION['prenom'] = $user['Prenom'];
            $_SESSION['mail'] = $user['Mail'];
            $_SESSION['ROLE'] = $user['role_id'];
            return true;
        } else {
            throw new AlertException("Mauvais mot de passe");
            return false;
        }
    }


}