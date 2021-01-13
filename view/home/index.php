<?php $title = "Caducée"; ?>

<?php require_once(DIR . "/view/langs/lang.fr.php"); ?>

<?php
ob_start();
?>

<a href="#home-1"><img id="goToTop" src="/public/images/up.png"/></a>

<section id="home-1">

    <div class="ctn">
        <div class="left">
            <h1><?= $lg["home"]["sec-1"]["title"] ?></h1>
            <h2><?= $lg["home"]["sec-1"]["title2"] ?></h2>
            <p><?= $lg["home"]["sec-1"]["content"] ?></p>
            <div class="btn-line">
                <a href="#home-2">
                    <button class="lib-btn lib-blue-btn"><?= $lg["home"]["sec-1"]["btn-more"] ?></button>
                </a>
                <a href="#home-3">
                    <button class="lib-btn lib-green-btn"><?= $lg["home"]["sec-1"]["btn-contact"] ?></button>
                </a>
            </div>
        </div>

        <div class="right">
            <img src="/public/images/super-paramedic.png">
        </div>
    </div>


</section>



<section id="home-2">


    <div>

    <h1 class="title"><?= $lg["home"]["sec-2"]["title"] ?></h1>


        <div class="ctn">

            <div class="features">
                <div class="feature">

                    <div>
                        <h1><?= $lg["home"]["sec-2"]["card-1"]["title-a"] ?><br><?= $lg["home"]["sec-2"]["card-1"]["title-b"] ?></h1>
                    </div>

                    <div>
                        <p><?= $lg["home"]["sec-2"]["card-1"]["desc"] ?></p>
                        <ul>
                            <li><?= $lg["home"]["sec-2"]["card-1"]["li-1"] ?></li>
                            <li><?= $lg["home"]["sec-2"]["card-1"]["li-2"] ?></li>
                            <li><?= $lg["home"]["sec-2"]["card-1"]["li-3"] ?></li>
                            <li><?= $lg["home"]["sec-2"]["card-1"]["li-4"] ?></li>
                        </ul>
                    </div>

                </div>

                <div class="feature">

                    <div>
                        <h1><?= $lg["home"]["sec-2"]["card-2"]["title-a"] ?><br><?= $lg["home"]["sec-2"]["card-1"]["title-b"] ?></h1>
                    </div>

                    <div>
                        <p><?= $lg["home"]["sec-2"]["card-2"]["desc"] ?></p>
                        <ul>
                            <li><?= $lg["home"]["sec-2"]["card-2"]["li-1"] ?></li>
                            <li><?= $lg["home"]["sec-2"]["card-2"]["li-2"] ?></li>
                            <li><?= $lg["home"]["sec-2"]["card-2"]["li-3"] ?></li>
                            <li><?= $lg["home"]["sec-2"]["card-2"]["li-4"] ?></li>
                        </ul>
                    </div>

                </div>

                <div class="feature">

                    <div>
                        <h1><?= $lg["home"]["sec-2"]["card-3"]["title-a"] ?><br><?= $lg["home"]["sec-2"]["card-1"]["title-b"] ?></h1>
                    </div>

                    <div>
                        <p><?= $lg["home"]["sec-2"]["card-3"]["desc"] ?></p>
                        <ul>
                            <li><?= $lg["home"]["sec-2"]["card-3"]["li-1"] ?></li>
                            <li><?= $lg["home"]["sec-2"]["card-3"]["li-2"] ?></li>
                            <li><?= $lg["home"]["sec-2"]["card-3"]["li-3"] ?></li>
                            <li><?= $lg["home"]["sec-2"]["card-3"]["li-4"] ?></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </div>

</section>

<section id="home-3">
    &nbsp;
    <form>
        <h1><?= $lg["home"]["sec-3"]["title"] ?></h1>
        <h2><?= $lg["home"]["sec-3"]["title-2"] ?></h2>
        <label for="name"><?= $lg["home"]["sec-3"]["name"] ?></label>
        <label for="mail"><?= $lg["home"]["sec-3"]["mail"] ?></label>
        <input required id="name" type="text" value="John Smith" >
        <input required id="mail" type="mail" >
        <label for="objet"><?= $lg["home"]["sec-3"]["object"] ?></label>
        <input required id="objet" type="text" >
        <label for="msg"><?= $lg["home"]["sec-3"]["msg"] ?></label>
        <textarea required id="msg" rows="5" ></textarea>
        <input id="submitContact" type="submit" value='<?= $lg["home"]["sec-3"]["submit"] ?>'>
    </form>
    &nbsp;
</section>


<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/nonav.view.php'); ?>
