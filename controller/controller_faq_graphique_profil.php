<?php

require_once("../modeles/fonctions.php");
 //nom de la bdd = ticko 
 $db =  new PDO('mysql:host=localhost;dbname=ticko;charset=utf8', 'root', '');

/* if(isset($_POST['modifier'])){
    

	 // NSS n'est pas une clé primaire, c'est le nom du champ/attribut donné dans PHPmyAdmin
	$reponse = $db->prepare("update user set Nom = '".$_POST["nom"]."', Prénom = '".$_POST["prenom"]."', Mail = '".$_POST["mail"]."', Tel = '".$_POST["tel"]."' where NSS='".$_POST["nss"]."'");
		$reponse->execute();
	 //Permet d'afficher les données dans le formulaire pour éviter de réecrire et de vite répondre aux clients son problème
	
	 
		
	
 } // fin if isset */
   
 if(isset($_POST["modifier"])) {
	    //Paramètres de la fonction updateProfil($db, $nom, $prenom,$mail,$tel,$nss)
		$reponse = updateProfil($db, $_POST["nom"],$_POST["prenom"], $_POST["mail"], $_POST["tel"], $_POST["nss"]);
		
}

if(isset($_GET["action"]) && ($_GET["action"]=="ajouter" || $_GET["action"]=="modifier")) {
	$nom = "";
	$prenom = "";
	$id = "";
	if($_GET["action"]=="modifier") {
	
		$reponse=selectUser($db,$_GET["id"]);

    while($user = $reponse->fetch()){
		$nom = $user["nom"];		
		$prenom = $user["prenom"];		
		$id = $user["id"];
	}
}
	include("view/edit.php");
	
	
	
?>	
	



	


