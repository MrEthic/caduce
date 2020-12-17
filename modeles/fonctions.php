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
	$reponse = $db->prepare("update faq_question set question = '$question', answer = '$answer' where id_question='$idfaq'");
	$reponse->execute();
	return $reponse;
}

//Sélectionner les mesures capteurs 
function mesuresCapteurs($db){
	//$reponse = $db->prepare("update users set nom = '$nom', prenom = '$prenom' where id='$id'");
	$reponse = $db->prepare("select * from capteur");
	$reponse->execute();
	return $reponse;
}

?>
