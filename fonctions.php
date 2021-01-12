<?php  

//Page Gérer son profil en PHP: utilsiée dans la page gérer_monprofil.php
function updateProfil($db, $nom, $prenom,$mail,$tel,$nss){
	//$reponse = $db->prepare("update users set nom = '$nom', prenom = '$prenom' where id='$id'");
	$reponse = $db->prepare("update user set Nom = '$nom', Prénom = '$prenom', Mail = '$mail', Tel = '$tel' where NSS='$nss'");
	$reponse->execute();
	return $reponse;
}

/* function insertUsers($db, $nom , $prenom){
	$reponse = $db->prepare("insert into users (nom,prenom) values ('$nom', '$prenom')");
	$reponse->execute();
	return $reponse;
}

function selectUser($db,$id){
	$reponse = $db->prepare("select * from users where id=$id");
	$reponse->execute();
	return $reponse;
}
function selectAllUsers($db){
	$reponse = $db->prepare("select * from users ");
	$reponse->execute();
	return $reponse;
} */


//Admin_gerer_FAQ pour afficher les questions et réponses
function selectAllFAQ($db){
	$reponse = $db->prepare("select * from faq_questions");
	$reponse->execute();
	return $reponse;
}

//Ajouter des questions et des réponses
function addFAQ($db,$question,$answer){
	$reponse = $db->prepare("insert into faq_questions (question,answer) values ('$question', '$answer')");
	$reponse->execute();
	return $reponse;
}

//Modifier les questions et réponses de la FAQ : utilisée 
function updateFAQ($db, $question, $answer,$idfaq){
	//$reponse = $db->prepare("update users set nom = '$nom', prenom = '$prenom' where id='$id'");
	$reponse = $db->prepare("UPDATE faq_questions SET question='$question',answer = '$answer' WHERE `faq_questions`.`id_question` = '$idfaq'");
	$reponse->execute();
	return $reponse;
}

function deleteFAQ($db,$idfaq){
	//$reponse = $db->prepare("update users set nom = '$nom', prenom = '$prenom' where id='$id'");
	$reponse = $db->prepare("DELETE FROM faq_questions WHERE id_question='$idfaq'");
	$reponse->execute();
	return $reponse;
}

//Sélectionner les mesures capteurs 
function mesuresCapteurs($db){
	//$reponse = $db->prepare("update users set nom = '$nom', prenom = '$prenom' where id='$id'");
	$reponse = $db->prepare("select * from capteur");
	$reponse->execute();
	
	//Permet de regarder les données au format JSON
	//$results=$reponse->fetchAll(PDO::FETCH_ASSOC);
	//$json=json_encode($results);
	//echo $json;;
	return $reponse;
}


function pdf_user($db,$nss){
	//selectionne le nom du patient avec son numéro de sécurité social nss pour insérer les données 
	//requête SQL à compléter à l'avenir
	$reponse = $db->prepare("select * from user where NSS='$nss'");
	$reponse->execute();
	return $reponse;
}

function pdf_last_mesure($db,$nss){
	//sélectionne la dernière mesure de la table sql pour afficher dans le pdf 
	//manque les cardinalités avec les autres tables de la BDD pour sélectionner la dernière mesure 
	//en fonction de l'utilisateur qui veut faire le test
	//requête SQL à compléter à l'avenir
	$reponse = $db->prepare("SELECT tension,température,humidite from capteur ORDER BY id_capteur DESC LIMIT 1;'");
	$reponse->execute();
	return $reponse;
}

function info_hopital($db,$adresse_fk){
	//requête SQL à compléter à l'avenir
	//recupere l'adresse de l'hopital ou a été osculté le patient
	$reponse = $db->prepare("SELECT * FROM `hospital` WHERE (`hospital`.`id_adresse` =$adresse_fk)");
	$reponse->execute();
	return $reponse;
}

function info_adresse($db,$id_adresse){
	//requête SQL à compléter à l'avenir
	//recupere l'adresse de l'utilisateur dans la table adresse
	$reponse = $db->prepare("SELECT * FROM `adresse` WHERE (`adresse`.`id_adresse` ='$id_adresse')");
	$reponse->execute();
	return $reponse;
}

?>
