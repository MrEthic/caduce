<?php

require_once("../modeles/connexion.php");
?>

<html>
<head>

<title> Gestion FAQ </title>
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
	width: auto;
	margin-left: auto;
	margin-right: auto;
	padding: 200px;
	
}

.faq {
	 margin-bottom: 10px;
}

.question{
	font-weight: bold;
	font-size: 20px;
	
}
.answer{
	margin-left: 20px;
}

</style>
</head>


<body>
<!---------------------Corps du site web -------------------------------->
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


<div class="fac_main">
<div align="center">
<h2> F.A.Q Caducée Admin</h2>
<p> <a href="Admin_gerer_FAQ.php"> Affichage FAQ  </a> | <a href="ajoutfaq.php">  Ajouter </a> | | <a href="editfaq.php"> Modifier </a>  </p>

<?php
 $result = $mysqli->query("SELECT * FROM faq_questions" ) ; 
if (mysqli_num_rows($result)>0 ) {
	while($row = mysqli_fetch_assoc($result)){
		$question = $row['question'];
		$answer = $row['answer'];
		echo'<div class="fac"><span class="question">'.$question.'</span><br><div class="answer">'.$answer.'</div></div>';
	}
	
}
else{
	echo"Questions et réponses vides";
}

?>
</div>
</div>
</body>
