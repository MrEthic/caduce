<?php $title = "Nouvelle Utilisateur"; ?>

<?php ob_start(); ?>

<div class="user__create__container">

    <hr>
    <h1>Création d'un utilisateur</h1>
    <hr>
    <form class="user__create__form" action="">
        <label for="NSS">Numéro de sécurité social</label>
        <input class="user__create__nss" name="NSS" type="text" inputmode="numeric" maxlength=13 pattern="[01]{1}\d{12}">
        <div class="user__create__name">
            <input type="text" name="prenom" placeholder="Prénom">
            <input type="text" name="nom" placeholder="Nom">
        </div>
        456

    </form>

</div>

<script>




</script>

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>