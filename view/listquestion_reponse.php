 <div class="container">
	 
	<!---------- Balise h2 pour écrire en grand le titre ---->
	<h2> Les questions fréquemment posées </h2>
	
	<!--------class nommée accordion, si vous changez de nom, il faut changer aussi dans le CSS----------->
	<div class="accordion">
	
	<!-------------------Chaque quesiton a la même classe accordion-item pour appliquer les mêmes propriétés CSS--------------------->
	<!---Question 1 -->
	<div class="accordion-item">
	 <h4> Comment obtenir mes résultats de mesure ?</h4>
	 <div class="content">
	   <p> Nous vous inviter à vous connecter puis dans la rubrique <a href="connexion.html"> mon compte</a>, vous aurez accès à "Mes résultats"</p>
	</div>
	 </div>
	
	<!---Question 2 -->
	<div class="accordion-item">
	 <h4> Quels sont les délais d'attente pour obtenir mes résultats de mesure ? </h4>
	 <div class="content">
     <p> Les résultats sont disponibles après avoir relevé les mesures. En cas de problème, veuillez contacter l'administrateur à l'adresse suivante :  <u> 4DGTadmin@gmail.com </u> </p>
	
	</div>
	 </div>
	 
	  <!---Question 3 --->
	 <div class="accordion-item">
	 <h4> Par quels moyens pouvez-vous déduire les mesures  ? </h4>
	 <div class="content">
	   <p> Les mesures prises font appel à des formules scientifiques. Par conséquent, l'aléatoire est exclu sauf à défaut du matériel utilisé. </p>
	</div>
	 </div>
	 
	 <!---Question 4 --->
	 <div class="accordion-item">
	 <h4> Je n'arrive plus à me connecter, est-ce normal ? </h4>
	 <div class="content">
	   <p> Nous vous invitons à cliquer sur "mot de passe oublié" lors de la connexion. Si le problème persiste, veuillez contacter l'administrateur à l'adresse suivante :  <u> 4DGTadmin@gmail.com </u>
	    pour obtenir un nouveau identifiant </p>
	</div>
	 </div>
	 
	  <!---Question 5 --->
	 <div class="accordion-item">
	 <h4> Mes informations enregistrées seront utilisées à des fins personnelles ? </h4>
	 <div class="content">
	   <p> En vigueur du règlement n°2016/679 dit règlement général sur la protection des données (RGPD), vos informations recueillies auprès de 4DGT.com sont uniquement utilisées pour réaliser des statistiques
		   . Pour plus d'informations, veuillez consulter les conditions générales d'utilisation et les mentions légales (voir ci-dessous de la FAQ)  </p>
	</div>
	 </div>
	 
	 
	   <!---Question 6 --->
	 <div class="accordion-item">
	 <h4> Quelles sont les conditions nécessaires pour qu'on puisse prendre mes mesures ?  </h4>
	 <div class="content">
	   <p>Il n'y a pas de conditions particulières. Vous êtes toujours le bienvenu et l'équipe s'engage de progresser au mieux pour vous accompagner.  </p>
	</div>
	 </div>
	 
	
	 </div>
	</div> <!--- Fin container --->

		
	<!----------------------------------- PARTIE FOOTER ------------------------------------>
   <footer>
		<div class="contenu-footer">
			
		<div class="bloc footer-services">
		<h3> Règlement </h3>
		
		<!---liste d'objets  1 balise ul--------->
		<ul class="liste-services">
		<!---- liste internes balise <li> -->
		<li> <a href="cgu.html"> Conditions générales d'utilisation</a></li>
		
		
		<!----------Insertions de la partie MENTIONS LEGALES dans la liste d'objet interne balise <li> ---------->
		<li> <div class="popup" id="popup-1">
		    <!---------div class =Overlay pour afficher le PopUp et avoir un arrière plus foncé-------------->
			<div class="overlay">    </div>
			<div class="content">
			<!----------Lorsqu'on clique sur la croix blanche pour fermer PopUp, fait appeler la fonction togglePopup() définie plus bas------------>
			<div class="close-btn" onclick="togglePopup()">&times;</div>
			<h1>Informations :</h1>
			<!---------------Contenu des mentions légales----------------------------------------->
			<p>Conformément aux dispositions des <u> Articles 6-III et 19 de la Loi n°2004-575 </u> du 21 juin 2004 pour la finance dans l'économie numérique,
			dite, L.C.E.N, il est porté à la connaissance des utilisateurs et visiteurs du site Caducée.com les présentes mentions légales.<br></p>
		    <p>Le site est hebergé par la société DC2SCALE dont le siège se situe à Vélizy Siret : <u> 88264411500017 </u>. L'accès et l'utilisation sont soumis aux présentes 
			"Mentions légales" détaillées ci-après ainsi qu'aux lois applicables.
		    Le site Caducée.com est édité par : 4DGT domicilié à l'adresse suivante : 18 Rue dames des Champs.</p> Téléphone: <u>01 39 08 08 15</u>
			<br> Adresse e-mail : <u>4DGTsarl@hotmail.com </u><br> 
			Numéros de déclaration à la CNIL:<br>
			<p>Traitements relatifs aux données personnelles des utilisateurs de l'application:déclaration simplifée NS48 "fichiers clients et prospects" enregistrée sous le numéro 2019587<br>
			Traitements relatifs aux données anonymisées à des fins de statistiques: déclaration normale enregistrée sous le n°2019579 .</p>
			</div> <!-- Fin du div content ---->
		</div>

		<!---------- Lorsqu'on appuie sur mentions légales, fait appeler la fonction togglePopup() définie plus bas--->
		<button onclick="togglePopup()">Mentions légales</button></li>
		
	    </ul> <!----- Fin de la balise ul -------->
		</div> <!--- Fin du bloc de div numéro 1--->
		
		
		
		
		<div class="bloc footer-services">
		<!---liste d'objets  2, pas besoin des balises ul ici car pas de hyperlien <a href="#">--------->
		<!---- liste internes balise <li> -->
		<h3> Nous contacter </h3>
		<p> Service d'appel : 01 39 39 39 41</p> 
		<p> <address>support4DGT@contact.com </p>
		<p> 08 rue de notre Dame des Champs, Paris VI, 75006 </p>
		</div>  <!--- Fin du bloc de div numéro 2--->
 	
	
		<div class="bloc footer-services">
		<h3> Horaires  </h3>
		<!---liste d'objets  3 balise ul--------->
		<ul class="liste-horaires">
		<!---- liste internes balise <li> -->
		<!-------------Icone emoji pris sur emojipedia validé pour V et X pour non disponible--------------------->
		<li>✔️  Lun  8h-19h</li>
		<li>✔️  Mar  8h-19h</li>
		<li>✔️  Mer  8h-19h</li>
		<li>✔️  Jeu  8h-19h</li>
		<li>✔️  Ven  8h-19h</li>
		<li>❎   Sam  fermé </li>
		<li>❎   Dim  fermé </li>
		</div> <!--- Fin du bloc de div numéro 3--->
		
	
	
					
		
		
		</div> <!----- Fin du div contenu foot --->
  </footer> 
  
  
  
  <!---------------Fonction permettant de cacher/afficher les réponses de la FAQ--------------------------->
  <script type="text/javascript">
    /*  NodeList statique représentant une liste des éléments du document qui correspondent au groupe de sélecteurs spécifiés. */
	const items = document.querySelectorAll(".accordion h4");

	/* permet d'ajouter la classe .container active définie dans le fichier CSS puis de l'appeler pour */
	/* afficher/ disparaître les réponses de la FAQ */
function toggleAccordion(){
	this.classList.toggle('active');
	this.nextElementSibling.classList.toggle('active');
	
}
/* addEventListener = évènement provoqué dans notre cas par un clique de la souris d'ou 'click' en paramètre */
items.forEach(item => item.addEventListener('click',toggleAccordion));
	
	
  /* Fonction définie pour faire apparaître un popup contenant les mentions légales */	
	 function togglePopup(){
  document.getElementById("popup-1").classList.toggle("active");
}
	</script>