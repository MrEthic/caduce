<?php $title = "Connexion"; ?>

<?php ob_start(); ?>


<!------------------------------------------Partie Login (identifiant, mot de passe )----------------------------------------------------------------->

<!---- Création d'une balise form pour que required puisse fonctionner ---->
<div class="page">
    <form id="loginForm" method="post" class="page halfwidth whitBck container vflex">
        <h1>Connexion</h1>
        <input type="text" placeholder="mail" name="mailconnect" required
               value="<?= isset($_COOKIE["auto_log_mail"]) ? $_COOKIE["auto_log_mail"] : '' ?>">

        <input type="password" placeholder="mot de passe" name="mdpconnect" required
               value="<?= isset($_COOKIE["auto_log_password"]) ? $_COOKIE["auto_log_password"] : '' ?>">

        <input id="loginSubmit" type="submit" name="" value="Se connecter">
        <label class="label">
            <div class="toggle">
                <input class="toggle-state" type="checkbox" name="rememberme" value="check" />
                <div class="indicator"></div>
            </div>
            <div class="label-text">Se souvenir de moi</div>
        </label>
        <a href="mdp_oublie.html">Mot de passe oublié ?</a>



    </form>
</div>


<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>


