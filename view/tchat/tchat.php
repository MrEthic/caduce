<?php $title = $conv["Prenom"] . $conv["Nom"]; ?>

<?php ob_start(); ?>


<div class="gestionnaire__msg__container">

    <div class="gestionnaire__msg__header">
        <a href="/users/profil/<?= $conv['NSS'] ?>"><?= $conv["Prenom"] . " " . $conv["Nom"] ?></a>
    </div>

    <div id="update">
    <div id="msgContainer" class="gestionnaire__msg__content">
        <?php
        foreach ($msgs as $key => $msg) {?>
            <div class='<?= (($msg["is_answer"] == 1 and $_SESSION["ROLE"] == 7) or ($msg["is_answer"] == 0 and $_SESSION["ROLE"] == 6)) ? "msg_right" : "msg_left" ?>'>
                <p><?= $msg["content"] ?></p></div>
            <?php
        } ?>
    </div>
    </div>

    <div id="test"></div>

    <div class="gestionnaire__msg__input">
        <form id="sendMsg" class="gestionnaire__msg__input__form" method="post">
            <textarea id="msgContent" form="sendMsg" name="msg_content" placeholder="Message" required></textarea>
            <input type="submit">
        </form>
    </div>


</div>

<script src="<?php DIR?>/public/js/msgScroller.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>



