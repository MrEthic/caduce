<?php
require_once(DIR . "/model/Model.php");
class Login extends Model
{
    public function authenticator($mailconnect, $mdpconnect)
    {
        $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
        $requser->execute(array($mailconnect, $mdpconnect));
        $userexist = $requser->rowCount();  
        return $userexist;
    }

}