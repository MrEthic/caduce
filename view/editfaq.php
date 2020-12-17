<?php

require_once("../modeles/fonctions.php");
require_once("../modeles/connexion.php");

//modifier une question ou une réponse
if(isset($_POST["edit_faq"])) {
		$idfaq= $_GET['edit'];	
	    //Paramètres de la fonction addFAQ($db, $question, $reponse)
		$reponse = updateFAQ($db, $_POST["question"],$_POST["answer"],$idfaq);
		$reponse->bindParam(':id_question',$idfaq,PDO::PARAM_INT);
}


//supprimer une question ou une réponse
if(isset($_POST['delete_faq'])) {
$idfaq= strip_tags(mysqli_real_escape_string($mysqli,$_GET['faq']));	
$mysqli->query("DELETE FROM faq_questions WHERE id_question='$idfaq'") or die($mysqli->error);
header("Location: editfaq.php");
}

 /* function update()
    {
        $sql = "UPDATE " . $this->table_name . " SET firstname = :firstname, lastname = :lastname, age  = :age, mail = :mail, num = :num  WHERE id = :id";
        // prepare query
        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(':firstname', $this->firstname);
        $prep_state->bindParam(':lastname', $this->lastname);
        $prep_state->bindParam(':age', $this->age);
        $prep_state->bindParam(':mail', $this->mail);
        $prep_state->bindParam(':num', $this->num);
        $prep_state->bindParam(':id', $this->id);
	} */
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


 <!--------------------------- BARRE de Navigation ----------------------------------------------------------------------------------->
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
          <a href="#" class="desktop-item">Mon compte</a>
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

  
  
  
  
  
  
  
  


<div class="fac_main">	  
<div align="center">
<h2> F.A.Q Edition Caducée Admin</h2>
<p> <a href="Admin_gerer_FAQ.php"> Affichage FAQ  </a> | <a href="ajoutfaq.php">  Ajouter </a> | | <a href="editfaq.php"> Modifier </a>  </p>

<?php
//importer la fonction selectAllFAQ
require_once("../modeles/fonctions.php");
$db =  new PDO('mysql:host=localhost;dbname=ticko;charset=utf8', 'root', '');

//Fonction selectAllFAQ qui se trouve dans le fichier fonctions.php
// Mettre dans le contrôleur
$reponse= selectAllFAQ($db);

//View 
while($faq = $reponse->fetch()) {
	    $id = $faq['id_question'];
	    $question = $faq["question"];		
		$answer = $faq["answer"];		
		echo'<div class="fac"><form action="editfaq.php?edit='.$id.'" method="POST">
		<span>Question: <input type="text" name="question" size="60" value="'.$question.'"/></span><br>
		<div> Réponse: <input type="text" name="answer" size="60" value="'.$answer.'"/></div>
		<input type="submit" name="delete_faq" value="Supprimer"/> <input type="submit" name="edit_faq" value="Modifier" />
		
		</form></div>';
}
?>

</div>
</div>
</body>
