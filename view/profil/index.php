<?php $title = "Mon profil"; ?>

<?php ob_start(); ?>

<!---- Création d'une balise form pour que required puisse fonctionner ---->
<div class="pro-form">
<form  action="" method="POST">
    <div class="pro">
        <h1> Mon profil </h1>
        <div class="champ">
            <!------ Required pour que l'utilisateur  insére la donnée correspondante ---->
            <i class="fas fa-user"></i>
            <input value="<?= $_SESSION['nom'] ?>" type="text" placeholder="Nom" name="nom" value=""  required>
        </div>

        <div class="champ">
            <!---- Font-awesome fas fa-user, placer la balise i avant le cadre --->
            <!---- pour que l'icône apparaît avant le cadre ---->
            <i class="fas fa-user"></i>
            <input value="<?= $_SESSION['prenom'] ?>" type="text" placeholder="prenom" name="prenom" value=""  required>
        </div>

        <div class="champ">
            <i class="fas fa-envelope"></i>
            <!---input type email pour que l'utilisateur saississe une adresse conforme ---->
            <input value="<?= $_SESSION['mail'] ?>" type="email" placeholder="mail" name="mail" value=""  required>
        </div>

        <div class="champ">
            <!---- Icône issu de fonteawesome.com --->
            <i class="fas fa-phone-square-alt"></i>
            <!---- pattern 0-9+ signifie qu'on doit insérer des chiffres (10 chiffres ) uniquement pour valider le formulaire -->
            <input value="<?= $_SESSION['tel'] ?? '' ?>" type="text" pattern="[0-9]{10}" title="Entrez uniquement les numéros" placeholder="telephone" name="tel" value=""  required>
        </div>

        <!----------- Bouton modifier pour valider la sauvegarde de la modification ------------------->
        <button type="submit" class="button button2"  name="modifier">Modifier </button>




</form>

</div> <!----- fin div profil ---->

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>

