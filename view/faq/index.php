<?php $title = "Ambulanciers"; ?>

<?php
ob_start();
?>

<a href="#faq"><img id="goToTop" src="/public/images/up.png"/></a>

<section id="faq">

    <div class="ctn">
        <div class="left">
            <h1> Les questions fréquemment posées </h1>
            <h2>Sommaire</h2>
            <ul>
                <a href="#q1"><li>Comment obtenir mes résultats de mesure ?</li></a>
                <a href="#q2"><li>Quels sont les délais d'attente pour obtenir mes résultats de mesure ?</li></a>
                <a href="#q3"><li>Par quels moyens pouvez-vous déduire les mesures  ?</li></a>
                <a href="#q4"><li>Je n'arrive plus à me connecter, est-ce normal ?</li></a>
                <a href="#q5"><li>Mes informations enregistrées seront utilisées à des fins personnelles ?</li></a>
                <a href="#q6"><li>Quelles sont les conditions nécessaires pour qu'on puisse prendre mes mesures ?</li></a>
            </ul>

        </div>

        <div class="right">
            <img src="/public/images/faq.png">
        </div>
    </div>

</section>

<div id="faq-q">
    <div class="accordion">

        <div id="q1" class="accordion-item">
            <h4> Comment obtenir mes résultats de mesure ?</h4>
            <div class="content">
                <p> Nous vous inviter à vous connecter puis dans la rubrique <a href="connexion.html"> mon compte</a>, vous aurez accès à "Mes résultats"</p>
            </div>
        </div>

        <!---Question 2 -->
        <div id="q2" class="accordion-item">
            <h4> Quels sont les délais d'attente pour obtenir mes résultats de mesure ? </h4>
            <div class="content">
                <p> Les résultats sont disponibles après avoir relevé les mesures. En cas de problème, veuillez contacter l'administrateur à l'adresse suivante :  <u> 4DGTadmin@gmail.com </u> </p>

            </div>
        </div>

        <!---Question 3 --->
        <div id="q3" class="accordion-item">
            <h4> Par quels moyens pouvez-vous déduire les mesures  ? </h4>
            <div class="content">
                <p> Les mesures prises font appel à des formules scientifiques. Par conséquent, l'aléatoire est exclu sauf à défaut du matériel utilisé. </p>
            </div>
        </div>

        <!---Question 4 --->
        <div id="q4" class="accordion-item">
            <h4> Je n'arrive plus à me connecter, est-ce normal ? </h4>
            <div class="content">
                <p> Nous vous invitons à cliquer sur "mot de passe oublié" lors de la connexion. Si le problème persiste, veuillez contacter l'administrateur à l'adresse suivante :  <u> 4DGTadmin@gmail.com </u>
                    pour obtenir un nouveau identifiant </p>
            </div>
        </div>

        <!---Question 5 --->
        <div id="q5" class="accordion-item">
            <h4> Mes informations enregistrées seront utilisées à des fins personnelles ? </h4>
            <div class="content">
                <p> En vigueur du règlement n°2016/679 dit règlement général sur la protection des données (RGPD), vos informations recueillies auprès de 4DGT.com sont uniquement utilisées pour réaliser des statistiques
                    . Pour plus d'informations, veuillez consulter les conditions générales d'utilisation et les mentions légales (voir ci-dessous de la FAQ)  </p>
            </div>
        </div>


        <!---Question 6 --->
        <div id="q6" class="accordion-item">
            <h4> Quelles sont les conditions nécessaires pour qu'on puisse prendre mes mesures ?  </h4>
            <div class="content">
                <p>Il n'y a pas de conditions particulières. Vous êtes toujours le bienvenu et l'équipe s'engage de progresser au mieux pour vous accompagner.  </p>
            </div>
        </div>


    </div>
</div>

<script type="text/javascript">
    const items = document.querySelectorAll(".accordion h4");
    function toggleAccordion(){
        this.classList.toggle('active');
        this.nextElementSibling.classList.toggle('active');

    }
    items.forEach(item => item.addEventListener('click',toggleAccordion));

</script>



<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/nonav.view.php'); ?>
