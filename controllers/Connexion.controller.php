<?php

require_once(DIR . "/controllers/Controller.php");

class Connexion extends Controller {
<<<<<<< Updated upstream
    $this->load_model("Login");
=======
>>>>>>> Stashed changes
    include_once('cookieconnect.php');
    if(isset($_POST['formconnexion'])){
       $mailconnect = htmlspecialchars($_POST['mailconnect']);
       $mdpconnect = sha1($_POST['mdpconnect']);
       if(!empty($mailconnect) AND !empty($mdpconnect))
       {
          $userexist = $this->Login->authenticator($mailconnect,$mdpconnect);
          if($userexist == 1)
          {
             if(isset($_POST['rememberme'])) {
                setcookie('email',$mailconnect,time()+365*24*3600,null,null,false,true);
                setcookie('password',$mdpconnect,time()+365*24*3600,null,null,false,true);
             }
          }
          else
          {
             $erreur = "Mauvais mail ou mot de passe !";
          }
       }
       else
       {
          $erreur = "Tous les champs doivent être complétés !";
       }
    }
<<<<<<< Updated upstream
    $this -> render("connexion", ["erreur" => $erreur]);
=======


>>>>>>> Stashed changes
}