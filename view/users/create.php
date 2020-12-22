<?php $title = "Nouvelle Utilisateur"; ?>

<?php ob_start(); ?>

<div class="page whitBck">

    <form class="container text-center" action="/users/create" method="post">
        <hr>
        <h1>Création d'un utilisateur</h1>
        <hr>
        <p>Numéro de sécurité social</p>
        <input required class="NSS" name="NSS" placeholder="NSS" type="text" inputmode="numeric" maxlength=13 pattern="[12]{1}\d{12}" autocomplete="off" value="<?= $_POST['NSS'] ?? '' ?>">
        <hr>
        <div>
            <p>Information Personnels</p>
            <input required type="text" name="prenom" placeholder="Prénom" value="<?= $_POST['prenom'] ?? '' ?>">
            <input required type="text" name="nom" placeholder="Nom" value="<?= $_POST['nom'] ?? '' ?>">
            <input required type="email" name="mail" placeholder="Mail" value="<?= $_POST['mail'] ?? '' ?>">
            <input required type="text" name="tel" placeholder="Téléphone" inputmode="numeric" pattern="0[0-9]{9}" value="<?= $_POST['tel'] ?? '' ?>">
        </div>
        <hr>
        <div>
            <p>Adresse :</p>
            <input required type="text" name="adress_1" placeholder="Ligne 1" value="<?= $_POST['adress_1'] ?? '' ?>">
            <input type="text" name="adress_2" placeholder="Ligne 2" value="<?= $_POST['adress_2'] ?? '' ?>">
            <input required type="text" name="postal" placeholder="Code Postal" pattern="[0-9]{5}" value="<?= $_POST['postal'] ?? '' ?>">
            <input required type="text" name="city" placeholder="Ville" value="<?= $_POST['city'] ?? '' ?>">
        </div>
        <hr>
        <input id="createSubmit" class="fullwidth" type="submit" value="Ajouter">

    </form>

</div>

<script>




</script>

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>