<?php  


function updateProfil($db, $nom, $prenom,$mail,$tel,$nss){
	//$reponse = $db->prepare("update users set nom = '$nom', prenom = '$prenom' where id='$id'");
	$reponse = $db->prepare("update user set Nom = '$nom', Prénom = '$prenom', Mail = '$mail', Tel = '$tel' where NSS='$nss'");
	$reponse->execute();
	return $reponse;
}

function insertUsers($db, $nom , $prenom){
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
}

?>