<?php $title = "Erreur !"; ?>

<?php ob_start(); ?>

    <div style="margin: 0 auto; padding: 15px; width: 80%; background-color: #3A3B3C; color: white; text-align: center;">
        <h1>Une erreur est survenue lors de la connexion à la base de données</h1>
        <p>Merci de reyesser dans quelques instants</p>
        <br>
        <p>Si le problème persiste, contactez un administrateur</p>
        <div style="margin: 0 auto; padding: 15px; width: 90%; background-color: #1d1d1f; color: white; border-radius: 10px;">
            <h2>Traceback : (à envoyer à l'administrateur)</h2>
            <p><?= $msg ?></p><br>
            <p><?= $code ?></p><br>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>


