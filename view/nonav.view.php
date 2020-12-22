<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>

    <link rel="stylesheet" type="text/css" href="<?php DIR?>/public/css/init.css" />
    <link rel="stylesheet" type="text/css" href="<?php DIR?>/public/css/clean.css" />
    <link rel="stylesheet" type="text/css" href="<?php DIR?>/public/css/fontawesome.css" />

    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <?php if(isset($_SESSION["NSS"])) { ?>
    <script src="<?php DIR?>/public/js/notify.js"></script>
    <?php } ?>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>

<body>

<div id="homeNav">
    <a href="/"><button id="homeHome">Acceuil</button></a>
    <a href="/login"><button id="loginHome">Connexion</button></a>
    <a href="/faq"><button id="faqHome">FAQ</button></a>
</div>

    <?= $content ?>

<?php require(DIR . "/view/footer.view.php"); ?>

    <?php include_once("alert.dialog.php"); ?>

    <?php if(isset($_SESSION["NSS"])) { ?>
        <audio id="notif">
            <source src="/public/audio/notif.mp3" type="audio/mpeg">
        </audio>
    <?php } ?>

</body>

</html>