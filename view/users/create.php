<?php $title = "Nouvelle Utilisateur"; ?>

<?php ob_start(); ?>

<div class="page whitBck">

    <form class="container text-center" action="/users/create" method="post">
        <hr>
        <h1>Création d'un utilisateur</h1>
        <hr>
        <p>Numéro de sécurité social</p>
        <input class="NSS" name="NSS" placeholder="NSS" type="text" inputmode="numeric" maxlength=13 pattern="[12]{1}\d{12}" autocomplete="off">
        <hr>
        <div>
            <p>Information Personnels</p>
            <input type="text" name="prenom" placeholder="Prénom">
            <input type="text" name="nom" placeholder="Nom">
            <input type="email" name="mail" placeholder="Mail">
            <input type="text" name="tel" placeholder="Téléphone" inputmode="numeric" pattern="0[0-9]{9}">
        </div>
        <hr>
        <div>
            <p>Adresse :</p>
            <input type="text" name="adress_1" placeholder="Ligne 1">
            <input type="text" name="adress_2" placeholder="Ligne 2">
            <input type="text" name="postal" placeholder="Code Postal" pattern="[0-9]{5}">
            <input type="text" name="city" placeholder="Ville">
        </div>
        <hr>
        <input id="createSubmit" class="fullwidth" type="submit" value="Ajouter">

    </form>

</div>

<script>




</script>

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>