<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
   <!-- <link rel="stylesheet" type="text/css" href="/public/css/style_user_management.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/style_connexion.css" />-->
    <link rel="stylesheet" type="text/css" href="<?php DIR?>/public/css/init.css" />
<!--    <link rel="stylesheet" type="text/css" href="<?php /*DIR*/?>/public/css/global.css" />
-->    <!--<link rel="stylesheet" type="text/css" href="<?php /*DIR*/?>/public/css/style_navbar.css" />-->
<!--    <link rel="stylesheet" type="text/css" href="<?php /*DIR*/?>/public/css/style_user_management.css" />
--><!--    <link rel="stylesheet" href="<?php /*DIR*/?>/public/css/style_faq.css">
-->
    <link rel="stylesheet" type="text/css" href="<?php DIR?>/public/css/clean.css" />

    <link rel="stylesheet" type="text/css" href="<?php DIR?>/public/css/fontawesome.css" />

    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <?php if(isset($_SESSION["NSS"])) { ?>
    <script src="<?php DIR?>/public/js/notify.js"></script>
    <?php } ?>

    <script src="<?php DIR?>/public/js/function.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!--<link rel="preconnect" href="http://fonts.gstatic.com">
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">-->
</head>

<body>

    <?php include_once("navbar.v2.view.php"); ?>

    <?= $content ?>

    <?php include_once("alert.dialog.php"); ?>

    <?php if(isset($_SESSION["NSS"])) { ?>
        <audio id="notif">
            <source src="/public/audio/notif.mp3" type="audio/mpeg">
        </audio>
    <?php } ?>

</body>

</html>