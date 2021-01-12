<?php
require_once("../modeles/connexion.php");
if(isset($_POST['create_faq'])) {
$question = $_POST['question'];
$answer = $_POST['answer'];
$mysqli-> query("INSERT INTO faq_questions (question,answer) VALUES('$question','$answer')") or die($mysqli->error);
header("Location: Admin_gerer_FAQ.php");
}
?>
<html>
<head>
<title> Ajouter des questions </title>
<!----Caractères classiques pour les sites web (en UTF-8 )--->
    <meta charset="UTF-8">	
	 
	
   
   
	 <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">  -->

	<!-----------------Adapater  Affichage sur différents écrans (téléphone, tablettes, pc)-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--- Nom du fichier CSS (à mettre dans le même dossier le fichier html et css) -->
    <link rel="stylesheet" href="style_connexion1.css">
	<!--- Importation d'une librairie JavaScript pour faire les transitions de la barre --->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	
	<style type="text/css">
.fac_main{
	text-align : left;
	width: 550px;
	margin-left: auto;
	margin-right: auto;
	padding: 4px;
	padding: 100px;
	
}

.faq {
	 margin-bottom: 10px;
}



</style>
</head>

<!---------------------Corps du site web -------------------------------->
<body>

  <nav>
    <div class="wrapper">
	    <!-------------------Insertion du logo dans la barre de navigation--------------------------->
           <img id="sport" src="images/meas.png" style="float:right;width:50px;height:50px;">

	  
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
        
		   <li>
          <a href="#" class="desktop-item">FAQ</a>
          <input type="checkbox" id="showDrop2">
		  <!----------------Supprimer la ligne du dessous fera disparaître la rubrique mon compte lorsqu'on rétrécit l'écran--------->
          <label for="showDrop2" class="mobile-item">FAQ</label>
          <ul class="drop-menu">
            <li><a href="lire_faq.php">Voir </a></li>
            <li><a href="Admin_gerer_FAQ.php">Gérer </a></li>
          </ul>
        </li>
		
		
      </ul> <!---Fin de la classe nav-links qui représente tout le contenu de la barre de navigation--->
	  
	  
      <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div> <!--Fin de la balise div class="wrapper"  ou du conteneur---->
  </nav>
  
  
  
  
  
  
  
  
  
 <!--------------------------------------- Gérer la FAQ par l'ADMIN ---------------------> 
  
<div class="fac_main">  
<div align="center">
<h2> Ajout F.A.Q Caducée  </h2>
<p> <a href="Admin_gerer_FAQ.php"> Affichage F.A.Q </a> | <a href="ajoutfaq.php">  Ajouter </a> | | <a href="editfaq.php"> Modifier </a>  </p>


<h3> Ajouter </h3>
<form action="ajoutfaq.php" method="POST">
Question : <input type="text" name="question" size="60" /> <br> <br>
Réponse  : <input type="text" name="answer" size="60" /> <br> <br>
<input type="submit" name="create_faq" value="Valider"/>

</form>
</div>
</div>
</body>

</html>