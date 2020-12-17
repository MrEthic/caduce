<html>
<head>
	<!----Caractères classiques pour les sites web (en UTF-8 )--->
    <meta charset="UTF-8">	
	 

  	<!-----------------Adapater  Affichage sur différents écrans (téléphone, tablettes, pc)-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--- Nom du fichier CSS (à mettre dans le même dossier le fichier html et css) -->
    <link rel="stylesheet" href="style_faq2.css">
	<!--- Importation d'une librairie JavaScript pour faire les transitions de la barre --->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<!-----librairie javascript pour utiliser la fonction toggleAction -------------->
	<script type="text/javascrip" src="https://code.jquery.com/jquery-3.4.1.js"></script>
	
	
	
</head>




	<!---------------------Corps du site web -------------------------------->
<body>




    <!--------------------------------Barre de navigation ----------------------------------------------------------------------------->
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
		
        <li><a href="#">Accueil</a></li>
    
		<!---L'élément HTML <li> est utilisé pour représenter un élément dans une liste.--->
		<!---Il doit être contenu dans un élément parent : une liste ordonnée (<ol>) ou bien une liste non ordonnée (<ul>) --->
        <li>
          <a href="connexion.html" class="desktop-item">Mon compte</a>
          <input type="checkbox" id="showDrop">
		  <!----------------Supprimer la ligne du dessous fera disparaître la rubrique mon compte lorsqu'on rétrécit l'écran--------->
          <label for="showDrop" class="mobile-item">Mon compte</label>
          <ul class="drop-menu">
            <li><a href="gérer_monprofil.php">Mon Profil</a></li>
            <li><a href="#">Clients</a></li>
            <li><a href="#">Gestionnaire profils</a></li>
            <li><a href="graphique_capteurs.php">Gestionnaire capteurs</a></li>
			<li><a href="#">Messagerie</a></li>
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
   <!------------------------------Fin de la partie Barre de navigation -------------------------------->

     
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 <!-------------------------------------------------PARTIE FAQ -------------------------------->
	 <?php 
	//require tout court n'a pas marché quand il y a plusieurs dossiers.
    // modifier le chemin du dossier lorsqu'on va fusionner le projet	
	require_once("../view/listquestion_reponse.php");
	?>
 
	
	
	
	
	
	

	
	
	

</body>
    
</html> <!--------- Fin de la balise HTML -------->
