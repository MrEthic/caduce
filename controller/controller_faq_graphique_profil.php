<?php

require_once("../modeles/fonctions.php");
//nom de la bdd = ticko voir dans modeles puis connexion
require_once("../modeles/connexion.php");

/* if(isset($_POST['modifier'])){
    

	 // NSS n'est pas une clé primaire, c'est le nom du champ/attribut donné dans PHPmyAdmin
	$reponse = $db->prepare("update user set Nom = '".$_POST["nom"]."', Prénom = '".$_POST["prenom"]."', Mail = '".$_POST["mail"]."', Tel = '".$_POST["tel"]."' where NSS='".$_POST["nss"]."'");
		$reponse->execute();
	 //Permet d'afficher les données dans le formulaire pour éviter de réecrire et de vite répondre aux clients son problème
	
	 
		
	
 } // fin if isset */
   
   
 //Modifier son profil ; utilisée pour la page Gérer_monprofil.php  
 if(isset($_POST["modifier"])) {
	    //Paramètres de la fonction updateProfil($db, $nom, $prenom,$mail,$tel,$nss)
		$reponse = updateProfil($db, $_POST["nom"],$_POST["prenom"], $_POST["mail"], $_POST["tel"], $_POST["nss"]);
		
}


//Ajouter des questions et réponses : utilisée pour la page ajoutfaq.php
 if(isset($_POST["create_faq"])) {
	    //Paramètres de la fonction addFAQ($db, $question, $reponse)
		$reponse = addFAQ($db, $_POST["question"],$_POST["answer"]);
		header("Location: Admin_gerer_FAQ.php");
}


	
	
?>	
	



	


