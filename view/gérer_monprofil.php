
<html>
    <!--------------------------BARRE de navigation PHP -------------------------------------------->
     <?php 
	//require tout court n'a pas marché quand il y a plusieurs dossiers.
    // modifier le chemin du dossier lorsqu'on va fusionner le projet	
	require_once("../view/bar_nav_admin.php");
	?>
  
  
  
  
  
  <!------------------------------------------Partie Gérer son profil (identifiant, mot de passe )----------------------------------------------------------------->
  
  
  <body>
  
  <!---- Création d'une balise form pour que required puisse fonctionner ---->
  <form action="" method="POST">
   <div class="pro">
   <h1> Mon profil </h1>
   <div class="champ">
   <!--------placeholder : ce qui est écrit dans la boîte de message, name pour faire la liaison avec PHP------------>
   <!---------required pour obliger l'utilisateur à insérer quelque chose ------------------------------------------->
   <!---- fal fa book provenant de font awesome pour les icônes --->
   <i class="fas fa-file-medical"></i>
   <!---------------------l'élément pattern correspond au regex en JS, on oblige aux utilisateurs d'insérer 15 caractères pour valider------------------------------------>
   <input type="text" pattern="[A-Za-z\d.]{15}" title="Votre nss doit comporter 15 chiffres"placeholder="numéro sécurité social" name="nss" value=""  required> 
   </div>
   
   
   <div class="champ">
   <!------ Required pour que l'utilisateur  insére la donnée correspondante ---->
   <i class="fas fa-user"></i>
   <input type="text" placeholder="Nom" name="nom" value=""  required>
   </div>
   
   <div class="champ">
   <!---- Font-awesome fas fa-user, placer la balise i avant le cadre --->
   <!---- pour que l'icône apparaît avant le cadre ---->
   <i class="fas fa-user"></i>
   <input type="text" placeholder="prenom" name="prenom" value=""  required>
   </div>
   
   <div class="champ">
   <i class="fas fa-envelope"></i>
   <!---input type email pour que l'utilisateur saississe une adresse conforme ---->
   <input type="email" placeholder="mail" name="mail" value=""  required>
   </div>
   
   <div class="champ">
   <!---- Icône issu de fonteawesome.com --->
   <i class="fas fa-phone-square-alt"></i>
   <!---- pattern 0-9+ signifie qu'on doit insérer des chiffres (10 chiffres ) uniquement pour valider le formulaire -->
   <input type="text" pattern="[0-9]{10}" title="Entrez uniquement les numéros" placeholder="telephone" name="tel" value=""  required>
   </div>
   
   <!----------- Bouton modifier pour valider la sauvegarde de la modification ------------------->
   <button type="submit" class="button button2"  name="modifier">Modifier </button>
  
   
 
  
   </form>
   
   </div> <!----- fin div profil ---->
    


   
</body>
</html> <!--------- Fin de la balise HTML -------->








<!--------------------------- CODE PHP -------------------------->
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

?>