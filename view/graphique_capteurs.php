<?php
	require_once("../modeles/fonctions.php");
    require_once("../modeles/connexion.php");

	$data1 = '';
	$data2 = '';
	$data3 = '';
	//Fonction selectAllFAQ qui se trouve dans le fichier fonctions.php
// Mettre dans le contrôleur
$reponse=mesuresCapteurs($db);

//View, prendre les valeurs des champs de la table capteur depuis PHPmyAdmin
while($capteurs = $reponse->fetch()) {
	    $data1 = $data1 . '"'. $capteurs['tension'].'",';
		$data2 = $data2 . '"'. $capteurs['température'] .'",';
		$data3 = $data3 . '"'. $capteurs['humidite'] .'",';
}
?>
	
<html>
<head> 
	<!--- Importation d'une librairie JavaScript pour faire les transitions de la barre + Graphique capteurs avec chart--->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	
	
	
	
	
	<!----------------- Bouton télécharger en PDF ---------------------------------------------->
	<script>
	
	/* permet de faire une capture d'écran à partir de la ou on a définit l'id invoice */
	window.onload = function () {
    document.getElementById("download")
	/* addEventListener pour les cliques de la souris */
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
			
			/*règlage de du dimensionnement et nommage du fichier php, voir les explications sur npm HTML2JS.com */
            var opt = {
                
				/* nom du fichier + temps écoulé depuis 1970 format unix fonction Date.now()*/
                filename: Date.now()+'mesures_capteurs.pdf',
                image: { type: 'jpeg', quality: 0.98 },
				/* échelle du graphique appelé canvas */
                html2canvas: {scale:2  },
				/* unité in, cm,px accepté, format a4 ou ledger (plus grand, moins flou ), orientation : portrait ou paysage (landscape) */
                jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
            };
			/*Création du PDF */
            html2pdf().from(invoice).set(opt).save();
        })
}
	</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
	<title>Mesures des capteurs</title>
			

			
			
			
			
			
			
			
	<!----------------------------------Code JavaScript Compte à rebours-------------------------------> 
 <script type="text/javascript">
	//déclaration + définitions des variables globales
	var time = 0;
	//var running est une variable booléenne (1 pour vrai et 0 pour faux )
	var running = 0;
	
	
function startPause(){
 if(running == 0){
  running = 1;
  //fonction d'incrémentation du temps définie plus bas
 increment();
 //récupération des id définies sur HTML, lorsqu'on appuie sur démarrer
 //le bouton change de couleur (couleur rouge )et le texte passe de démarrer à Pause
 document.getElementById("start").innerHTML = "Pause";
 document.getElementById("startPause").style.backgroundColor = "red"; 
 document.getElementById("startPause").style.borderColor = "red";
 }
 else{
  running = 0;
  //récupération des id définies sur HTML, lorsqu'on appuie sur démarrer
  //le bouton change de couleur (couleur rouge )et le texte passe de démarrer à Pause
 document.getElementById("start").innerHTML = "Reprendre"; 
 document.getElementById("startPause").style.backgroundColor = "green"; 
 document.getElementById("startPause").style.borderColor = "green";
 }
 
 
}
function reset(){
 running = 0;
 time = 0;
 document.getElementById("start").innerHTML = "Démarrer";
 //on remet le temps à zéro en modifiant le texte d'ou l'emploi du .innerHTML
 document.getElementById("output").innerHTML = "0:00:00:00";
 //le bouton démarrer redevient vert
 document.getElementById("startPause").style.backgroundColor = "green"; 
 document.getElementById("startPause").style.borderColor = "green";
}


function increment(){
 if(running == 1){
  setTimeout(function(){
   time++;
   //La fonction Math.floor(x) renvoie le plus grand entier qui est inférieur ou égal à un nombre x.
   var mins = Math.floor(time/10/60);
   var secs = Math.floor(time/10 % 60);
   var hours = Math.floor(time/10/60/60); 
   var tenths = time % 10;
   if(mins < 10){
    mins = "0" + mins;
   } 
   if(secs < 10){
    secs = "0" + secs;
   }
   //concaténation des variables définies (heure/minute/seconde)
   document.getElementById("output").innerHTML = hours + ":" + mins + ":" + secs + ":" + tenths + "0";
   increment();
  },100)  //fin de la fonction setTimeout
 }
}  //fin de la fonction increment
  


 </script> <!---------Fin du code JavaScript---------------------->
</head>







 <!--------------------------BARRE de navigation PHP -------------------------------------------->
     <?php 
	//require tout court n'a pas marché quand il y a plusieurs dossiers.
    // modifier le chemin du dossier lorsqu'on va fusionner le projet	
	require_once("../view/bar_nav_user.php");
	?>

  
  

  
  
  
  
  
  
  
  
 <!-------------------------COMPTE A REBOURS JAVASCRIPT ------------------------------------------->
   <!----------Création d'un conteneur------------->
   <div id="invoice">
	<div class="container2">
	<!---h1 pour écrire en gros, balise p pour paragraphe et balise b pour bold ------>
	<h1><p id="output"><b> 0:00:00:00</b></p></h1>
	
	   <!-------------- Appel des fonctions JavaScript lorsqu'on clique sur les boutons --->	
	   <div id="controls">	
		<button id="startPause" onclick="startPause()"><b id="start"> Démarrer </b> </button>
	    <button id="reset" onclick="reset()"><b id="reset"> MAZ </b> </button>
		
	   </div>
	</div> <!---Fin du div container--->
 
  


	
    	
		


		
		

		
		
		
<!--------------------------------PARTIE MESURES DES CAPTEURS AVEC LA BALISE CANVAS------------------------------------->
	   
	    <div class="container3">	
	    <h1>Vos mesures </h1> 
			<!---------Balise Canvas pour définir une zone graphique (un dessin par exemple)---------------->
			<!-------- Le code CSS est dedans pour que les propriétés css de la balise body et container s'appliquent avec --->
			<!-------- Le canvas est de couleur noir en code héxa est placé vers le milieu un peu près ---->
			<canvas id="chart" style="width: 100%; height: 65vh; background: #FFF; border: 1px solid #555652; margin-top: 10px;"></canvas>

			<!---Mettre le script dans le div container3 pour faire fonctionner le graphique  ---->
			
			<script>
			    //variable ctx qui contient le canvas id="chart" défini dans le code HTML
				// création d'un objet 2d avec la fonction getContext
				var ctx = document.getElementById("chart").getContext('2d');
    			var graphe = new Chart(ctx, {
        		type: 'line',
		        data: {
					//rajouter des valeurs en plus si nécessaire en abscisse
					// valeurs de l'axe X, rajouter trop de valeur élargira le graphe
		            labels: [1,2,3,4,5,6,7,8,9],
					
					//paramètre de nos données avec datasets
		            datasets: 
		            [{
		                label: 'Tension (cmHg)',
		                data: [<?php echo $data1; ?>],
						//apporte un effet lumineux blanc sur les traits
		                backgroundColor: 'transparent',
						//couleur rouge
		                borderColor:'rgba(51,204,51)',
						//largeur des traits 
		                borderWidth: 3
		            },

		            {
		            	label: 'Température (°C)',
		                data: [<?php echo $data2; ?>],
		                backgroundColor: 'transparent',
						//couleur bleu 
		                borderColor:'rgba(0,102,255)',				
		                borderWidth: 3	
		            },
					
					 {
		            	label: 'Humidité (g/m3)',
		                data: [<?php echo $data3; ?>],
		                backgroundColor: 'transparent',
						//couleur magenta 
		                borderColor:'rgba(255,99,71)',				
		                borderWidth: 3	
		            }]
					
		        }, // Fin du contenu de data
		     
		        options: {
					// beginAtZero: inclure le zéro dans le graphique s'il est présent
					// autoskip : calcul le nombre de labels à afficher et à cacher ( cliquer sur les labels pour désactiver le graphique 
					// maxTicketsLimit : 25 valeurs maximum affichés pour le site sinon il ne sera plus responsive 

		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit:25}]}},
		            tooltips:{mode: 'index'},
					// fontcolor : noir pour les légendes qui sont en bas avec bottom, taille de la police 16 
		            legend:{display: true, position: 'bottom', labels: {fontColor: 'black', fontSize: 16}}
		        }
		    });
			
			
			</script>
	    </div> <!------------------ FIN du div conteneur3 ---->
	    
	
  </div>  <!--------------- FIN du div invoice qui permet de faire une capture d'écran de la page pour convertir en PDF ----------->
  
  
  
  
  
 
  <!------------------------------------ Bouton PDF en HTML ------------------------------------------------------------>  
  <div class="container3">
  <h1><button  id="download"> Télécharger pdf</button> </h1>
  </div>
</body>
</html>