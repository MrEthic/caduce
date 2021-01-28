<?php
/* importer le fichier Database.php avec "require" */
require "DataBase.php";
$db = new DataBase();
/* vérifier si l'identifiant et le mot de passe sont définies*/
if (isset($_POST['Nom']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
		/* nom et mot de passe pour se connecter, champs des tables */
        if ($db->logIn("user", $_POST['Nom'], $_POST['password'])) {
			// si vous modifiez echo login success, modifiez aussi dans la classe Login.Java
			//de android studio pour que ça puisse marcher  if(result.equals("Login Success")){
			//ligne 83	
            echo "Login Success";
        } else echo "Identifiant ou Mot de passe incorrect";
    } else echo "Erreur connexion à la base de donnees";
} else echo "Champs incomplets";
?>
