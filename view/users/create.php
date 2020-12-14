<?php $title = "Nouvelle Utilisateur"; ?>

<?php ob_start(); ?>

<div class="user__create__container">

    <hr>
    <h1>Création d'un utilisateur</h1>
    <hr>
    <form class="user__create__form" action="/users/create" method="post">
        <label for="NSS">Numéro de sécurité social</label>
        <input class="user__create__nss" name="NSS" placeholder="NSS" type="text" inputmode="numeric" maxlength=13 pattern="[12]{1}\d{12}" autocomplete="off">
        <div class="user__create__name">
            <p>Information Personnels</p>
            <input class="user__create__input" type="text" name="prenom" placeholder="Prénom">
            <input class="user__create__input" type="text" name="nom" placeholder="Nom">
            <input class="user__create__input" type="email" name="mail" placeholder="Mail">
            <input class="user__create__input" type="text" name="tel" placeholder="Téléphone" inputmode="numeric" pattern="0[0-9]{9}">
        </div>
        <div class="user__create__adress">
            <p>Adresse :</p>
            <input class="user__create__input" type="text" name="adress_1" placeholder="Ligne 1">
            <input class="user__create__input" type="text" name="adress_2" placeholder="Ligne 2">
            <input class="user__create__input" type="text" name="postal" placeholder="Code Postal" pattern="[0-9]{5}">
            <input class="user__create__input" type="text" name="city" placeholder="Ville">
        </div>

        <input type="submit" value="Ajouter">

    </form>

</div>

<script>




</script>

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>