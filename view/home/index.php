<?php $title = "Ambulanciers"; ?>

<?php
ob_start();
?>


<div>
    Hello World !
    <?= $_SESSION["ROLE"] ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>
