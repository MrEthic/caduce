
<html>
<head>
	<!----Caractères classiques pour les sites web (en UTF-8 )--->
    <meta charset="UTF-8">	
	 
	
   
   
	 <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">  -->

	<!-----------------Adapater  Affichage sur différents écrans (téléphone, tablettes, pc)-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--- Nom du fichier CSS (à mettre dans le même dossier le fichier html et css) -->
    <link rel="stylesheet" href="style_connexion.css">
	<!--- Importation d'une librairie JavaScript pour faire les transitions de la barre --->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>







	<!---------------------Corps du site web -------------------------------->
<body class="body2">
  <nav>
    <div class="wrapper">
	    <!-------------------Insertion du logo dans la barre de navigation--------------------------->
           <img id="sport" src="images/logo.png" style="float:right;width:50px;height:50px;">

	  
	  <!---------------input type radio pour ouvrir/fermer barre de navigation lorsqu'on rétrécit l'écran ----------------------------->
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
	  
	 <!----- représente une liste d'éléments sans ordre particulier. Il est souvent représenté par une liste à puces------>	
      <ul class="nav-links">
	    <!----------------------fas fa times est une icône en forme de croix ------------------------------>
		<!---------------------classe nommée btn close-btn déclarée en haut-------------------------------->
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
		
        <li><a href="accueil.html">Accueil</a></li>
    
		<!---L'élément HTML <li> est utilisé pour représenter un élément dans une liste.--->
		<!---Il doit être contenu dans un élément parent : une liste ordonnée (<ol>) ou bien une liste non ordonnée (<ul>) --->
        <li>
          <a href="#" class="desktop-item">Mon compte</a>
          <input type="checkbox" id="showDrop">
		  <!----------------Supprimer la ligne du dessous fera disparaître la rubrique mon compte lorsqu'on rétrécit l'écran--------->
          <label for="showDrop" class="mobile-item">Mon compte</label>
          <ul class="drop-menu">
            <li><a href="#">Mon Profil</a></li>
            <li><a href="#">Clients</a></li>
            <li><a href="htt.html">Gestionnaire profils</a></li>
            <li><a href="#">Gestionnaire capteurs</a></li>
			<li><a href="sdsdsd.html">Messagerie</a></li>
          </ul>
        </li>
        
        <li><a href="FAQ.html">FAQ</a></li>
		
      </ul> <!---Fin de la classe nav-links qui représente tout le contenu de la barre de navigation--->
	  
	  
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div> <!--Fin de la balise div class="wrapper"  ou du conteneur---->
  </nav>

  
  
  
  
  
  <!------------------------------------------Partie Gérer son profil (identifiant, mot de passe )----------------------------------------------------------------->
  
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
 //nom de la bdd = ticko 
 $db =  new PDO('mysql:host=localhost;dbname=ticko;charset=utf8', 'root', '');

if(isset($_POST['modifier'])){
    

	 // NSS n'est pas une clé primaire, c'est le nom du champ/attribut donné dans PHPmyAdmin
	$reponse = $db->prepare("update user set Nom = '".$_POST["nom"]."', Prénom = '".$_POST["prenom"]."', Mail = '".$_POST["mail"]."', Tel = '".$_POST["tel"]."' where NSS='".$_POST["nss"]."'");
		$reponse->execute();
	 //Permet d'afficher les données dans le formulaire pour éviter de réecrire et de vite répondre aux clients son problème
	
	 
		
	
 } // fin if isset

?>