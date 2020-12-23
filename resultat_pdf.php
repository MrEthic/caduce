<?php

require_once("../modeles/fonctions.php");
require_once("../modeles/connexion.php");


// session_start();

//exemple de nss qui est dans la BDD
//fait manuellement, on remplacera par une vraie requête
//avec les sessions
$secusocial='123456789999999';

//---------------------appel de la fonction affichage information patient depuis le modele -----------------------------
$reponse= pdf_user($db,$secusocial);
$info = $reponse->fetch();


//mettre ceci dans les variables :
//ce qui est entre crochet sont les champs/attributs issus de PHPmyADMIN
//Attributs table user , strtoupper pour mettre en majuscule
$nom =strtoupper($info['Nom']);
$prenom =strtoupper($info['Prénom']);
$email = $info['Mail']; 


//---------------------appel de la fonction affichage adresse hopital depuis le modele -----------------------------
//enlever cette variable et modifier par la suite pour afficher les données en fonction de l'user qui se connectera à la session
$adr = 1;
$reponse2 = info_hopital($db,$adr);
$info2 = $reponse2->fetch();

//nom de du champ de la table hospital
$hopital_name = $info2['name'];


//---------------------appel de la fonction affichage ville, zip, country   depuis le modele -----------------------------

$reponse3 =  info_adresse($db,$adr);
$info3 = $reponse3->fetch();

//attribut de la table adresse 
//$line_a =$info3['line_a'];
//$line_b = $info3['line_b'];
$city = $info3['city'];
$zip = $info3['zip'] ;
$country = $info3['country'];


//---------------------appel de la fonction affichage humidite, temperature, pression  depuis le modele -----------------------------
//attribut de la table capteur
$reponse4 = pdf_last_mesure($db,$nss);
$info4 = $reponse4->fetch();

$tension = $info4['tension'];
$temperature = $info4['température'];
$humidite = $info4['humidite'];








require_once('../modeles/fpdf/fpdf.php');

//Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
// ob_get clean pour nettoyer et mettre à vide
$pdf = ob_get_clean(); 
//paramètre de pfdf, format A5 
// P = format portrait
// 'mm' pour les unités (pt,cm,in) marchent aussi
$pdf = new FPDF('P', 'mm', 'A4','UTF-8');

//Ajouter une nouvelle page
$pdf->AddPage();

// entete image
//$pdf->Image('en-tete.png', 10, 5, 130, 20);







//-----------Modifier la police générale pour tous les données du dessous------------------------
$pdf->SetFont('Arial', '', 12);
$h = 7;
$espace = "      ";





//----------------------FORMATde Cell(width , height , text , border , end line , [align] )----------------------------

$pdf->Cell(130	,5,'Hopital '.$hopital_name.' ',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'France',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'75 006 Paris',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5,''. date('d/m/Y'),0,1);//end of line

$pdf->Cell(130	,5,'0134456789',0,0);
$pdf->Cell(25	,5,'Siren ',0,0);
$pdf->Cell(34	,5,'278 254 652',0,1);//end of line

$pdf->Cell(130	,5,'ParisNord@hotmail.fr',0,0);
$pdf->Cell(25	,5,'ID : ',0,0);
$pdf->Cell(34	,5,'98742541',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//permet de souligner et mettre en gras le nss et le nom
//$pdf->SetFont('Times','BIU');
//$pdf->Write($h, $espace . "Numero de securite social : \n");
//$pdf->Write($h, $espace . "Nom  : \n");

$pdf->Cell(100	,5,'',0,1);//end of line

//créer à chaque fois des cell vide Cell(10,5,'',0,0) pour indenter chaque ligne
$pdf->SetFont('Arial', 'BIU', 12);
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'Numero de securite social : '.$secusocial.'',0,1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'Nom : '.$nom.'',0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'Prenom : '.$prenom.'',0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'Email : '.$email.'',0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'Pays : '.$country.'',0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,'Ville :  '.$city.'  ('.$zip.')',0,1);

//saut de ligne
$pdf->Ln(10);


// Police Arial gras 16
$pdf->SetFont('Arial', 'B', 18);

// Titre
// 0 décalage, 10 pour la hauteur 
$pdf->Cell(0,10, 'Resultat de Mesures', 'TB', 1, 'C');

// Saut de ligne
$pdf->Ln(5);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Capteurs utilises',1,0);
$pdf->Cell(25	,5,'Incertitude',1,0);
$pdf->Cell(34	,5,'Valeurs',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130	,5,'Tension cardiaque (cmHg)',1,0);
$pdf->Cell(25	,5,'2%',1,0);
$pdf->Cell(34	,5,''.$tension.'',1,1,'R');//end of line

$pdf->Cell(130	,5,'Temperature (C)',1,0);
$pdf->Cell(25	,5,'5%',1,0);
$pdf->Cell(34	,5,''.$temperature.'',1,1,'R');//end of line

$pdf->Cell(130	,5,'Humidite (g/m3)',1,0);
$pdf->Cell(25	,5,'6%',1,0);
$pdf->Cell(34	,5,''.$humidite.'',1,1,'R');//end of line




//saut de ligne
$pdf->Ln(10);

$pdf->Cell(90	,5,'Les valeurs de reference indiquees tiennent compte de l\'age et du sexe du patient. La pression',0,1);
$pdf->Cell(90	,5,'(ou tension) arterielle correspond a la pression exercee par le sang pompe par le coeur, ',0,1);
$pdf->Cell(90	,5,'La pression arterielle est dite normale lorsqu\'elle est inferieure a 14,5/9 ou 145/90 mmHg et superieure a',0,1);
$pdf->Cell(90	,5,'10/7 ou 100mmHg /7mmHg. ',0,1);
$pdf->Cell(90	,5,'La temperature ideale du corps humain est comprise entre 36,1 et 37,8 degre celsius ',0,1);










//saut de ligne
$pdf->Ln(40);
// -----------'C' pour center, mettre au centre-------------
// 200 pour décaler vers la droite, on met bien au centre 
$pdf->Cell(200, 5,'Fait le :' . date('d/m/Y'), 0, 1, 'C');
 

// Décalage de 20 mm à droite
$pdf->Cell(60);
$pdf->Cell(80, 8, 'Clinique  '.$hopital_name.'', 1, 1, 'C');

// Décalage de 20 mm à droite
$pdf->Cell(60);
$pdf->Cell(80, 5, "M.Boyard, directeur de l'institut ", 'LR', 1, 'C');
$pdf->Cell(60);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C'); // LR Left-Right  C: Center
$pdf->Cell(60);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(60);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(60);
$pdf->Cell(80, 5, ' ', 'LRB', 1, 'C'); // LRB : Left-Right-Bottom (Bas) 

//saut de ligne
$pdf->Ln(15);
$pdf->Write($h, $espace . $espace . $espace . $espace . "Hopital  : ".$hopital_name."  06 Rue Dame des champs, Paris 75006 Cedex    \n");

//Afficher le pdf et le télécharger
$pdf->Output('', '', true);
?>