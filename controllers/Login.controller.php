<?php

require_once(DIR . "/controllers/Controller.php");

class Login extends Controller
{

    public function index()
    {
        $this->load_model("User");
        include_once ('cookieconnect.php');
        if (isset($_POST['formconnexion']))
        {
            $mail = htmlspecialchars($_POST['mailconnect']);
            $password = password_hash($_POST['mdpconnect']);
            if (!empty($mail) and !empty($password))
            {
                $login_response = $this->User->authenticator($mail, $password);
                if ($login_response == 1)
                {
                    if (isset($_POST['rememberme']))
                    {
                        setcookie('email', $mail, time()+365*24*3600, null, null, false, true);
                        setcookie('password', $password, time()+365*24*3600, null, null, false, true);
                    }
                }
                else
                {
                    $erreur = "Mauvais mail ou mot de passe !";
                    require(DIR . "/view/alert.view.php");
                    pop_alert($erreur, "BAD");
                }
            }
            else
            {
                $erreur = "Tous les champs doivent être complétés !";
                require(DIR . "/view/alert.view.php");
                pop_alert($erreur, "BAD");
            }
        }
        $this->render("connexion", []);
    }


}