<?php $title = "Connexion"; ?>

<?php ob_start(); ?>


<!------------------------------------------Partie Login (identifiant, mot de passe )----------------------------------------------------------------->

<!---- Création d'une balise form pour que required puisse fonctionner ---->
<form method="post">
    <div class="login">
        <h1> Connexion </h1>
        <div class="textbox">
            <!--------placeholder : ce qui est écrit dans la boîte de message, name pour faire la liaison avec PHP------------>
            <!---------required pour obliger l'utilisateur à insérer quelque chose ------------------------------------------->
            <input type="text" placeholder="mail" name="mailconnect" required>
        </div>


        <div class="textbox">
            <!------ Required pour obliger l'utilisateur à insérer la donnée correspondante ---->
            <input type="password" placeholder="mot de passe" name="mdpconnect" required>
        </div>


        <!----------- Bouton se connecter ------------------->
        <button type="submit" class="btn" name="">Se connecter</button>


        <!----------------Mot de passe oublié ?---------------------------------->
        <a href="mdp_oublie.html">Mot de passe oublié ?</a>


    </div> <!----- fin div login ---->
</form>

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>


