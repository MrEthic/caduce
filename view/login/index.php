<?php $title = "Connexion"; ?>

<?php ob_start(); ?>


<section id="login" class="page">
    <form id="loginForm" method="post" class="content-card">
        <h1>Connexion</h1>
        <input type="text" placeholder="mail" name="mailconnect" required
               value="<?= isset($_COOKIE["auto_log_mail"]) ? $_COOKIE["auto_log_mail"] : '' ?>">

        <input type="password" placeholder="mot de passe" name="mdpconnect" required
               value="<?= isset($_COOKIE["auto_log_password"]) ? $_COOKIE["auto_log_password"] : '' ?>">

        <div>
            <input id="loginSubmit" type="submit" name="" value="Se connecter">
            <label for="check">Se souvenir de moi</label>
            <input type="checkbox" value="None" id="rememberme" name="check" checked />
        </div>

        <a href="mdp_oublie.html">Mot de passe oublié ?</a>

    </form>
</section>



<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/nonav.view.php'); ?>


