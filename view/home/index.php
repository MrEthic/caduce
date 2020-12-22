<?php $title = "Caducée"; ?>

<?php
ob_start();
?>

<a href="#home-1"><img id="goToTop" src="/public/images/up.png"/></a>

<section id="home-1">

    <div class="ctn">
        <div class="left">
            <h1>Caducée </h1>
            <h2>Le premier maillon de la chaîne de sauvetage</h2>
            <p>L'ambulancier est le premier maillon de la chaine de sauvetage, il doit en quelques secondes prendre des
                décisions importante pour la survie des bléssé. Rapide, clairevoyant et sûr de lui, il doit toujours
                être au meilleur de sa forme. Caducée est une solution fiable et à moindre coût permetant de s'assurer
                des capacité de votre personnel</p>
            <div class="btn-line">
                <a href="#home-2">
                    <button class="lib-btn lib-blue-btn">En savoir plus</button>
                </a>
                <a href="#home-3">
                    <button class="lib-btn lib-green-btn">Nous contacter</button>
                </a>
            </div>
        </div>

        <div class="right">
            <img src="/public/images/super-paramedic.png">
        </div>
    </div>


</section>



<section id="home-2">


    <div>

    <h1 class="title">Une solution complète</h1>


        <div class="ctn">

            <div class="features">
                <div class="feature">

                    <div>
                        <h1>Platformes <br> de test</h1>
                    </div>

                    <div>
                        <p>Des plateformes de tests pour mesurer :</p>
                        <ul>
                            <li>Les reflexes</li>
                            <li>La resistance au stress sonore</li>
                            <li>La mémoire instantané</li>
                            <li>La rapiditées d'éxécution</li>
                        </ul>
                    </div>

                </div>

                <div class="feature">

                    <div>
                        <h1>Portail <br> Web</h1>
                    </div>

                    <div>
                        <p>Un portail web sécurisé permettant :</p>
                        <ul>
                            <li>Consulter ses résultats</li>
                            <li>Lancer de nouveaux test</li>
                            <li>Suivre son évolution</li>
                            <li>Se comparer aux autres</li>
                        </ul>
                    </div>

                </div>

                <div class="feature">

                    <div>
                        <h1>Administration <br> facille</h1>
                    </div>

                    <div>
                        <p>Gérer facilement vos ambulancier :</p>
                        <ul>
                            <li>Analyse des performances</li>
                            <li>Méssagerie interne</li>
                            <li>Ajout de membres simple</li>
                            <li>Suspension de compte</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </div>

</section>

<section id="home-3">

    <form>
        <h1>Contactez nous</h1>
        <h2>Pour plus d'information à propos de Caducée ou toute autres demande</h2>
        <label for="name">Votre nom et prénom :</label>
        <label for="mail">Votre adresse mail :</label>
        <input required id="name" type="text" value="John Smith" placeholder="Nom et prénom">
        <input required id="mail" type="mail" placeholder="mail">
        <label for="objet">Objet du message :</label>
        <input required id="objet" type="text" value="Votre produit nous intérèsse" placeholder="Objet">
        <label for="msg">Votre message :</label>
        <textarea required id="msg" rows="5" placeholder="Message"></textarea>
        <input id="submitContact" type="submit" value="Envoyer">
    </form>

</section>


<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/nonav.view.php'); ?>
