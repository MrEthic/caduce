<?php $title = $user["Prenom"] . " " . $user["Nom"]; ?>

<?php ob_start(); ?>

<div class="page container">
        <div class="hflex fullwidth">
            <div id="userProfil">
                <div id="userProfilImg">
                    <h1><?= $user["Prenom"] ?></h1>
                    <h1><?= $user["Nom"] ?></h1>
                    <hr>
                    <small><?= $user["Creation_Date"] ?></small>
                    <hr>
                </div>
            </div>

            <div style='color:<?= $user["is_suspended"]==1 ? "red" : "" ?>;' id="userProfilInfos">
                <div>
                    <img src="https://cdn4.iconfinder.com/data/icons/miu-black-social-2/60/mail-512.png" alt="mail">
                    <p><?= $user["Mail"] ?></p>
                </div>
                <div>
                    <img src="https://simpleicon.com/wp-content/uploads/phone-symbol-1.png" alt="tel">
                    <p><?= $user["Tel"] ?></p>
                </div>
                <div>
                    <img src="https://img.icons8.com/ios-glyphs/452/touch-id.png" alt="nss">
                    <p><?= $user["NSS"] ?></p>
                </div>
                <div>
                    <img src="https://i.pinimg.com/originals/f9/64/61/f964612dd42ba5ccd93367f01912c9a3.png" alt="nss">
                    <p><?= $user["Adresse"] ?></p>
                </div>
            </div>

            <div id="userPorfilAction">
                <button style="background-color: var(--color-dark);">Méssagerie</button>
                <button style="background-color: var(--color-light-blue);">Nouveau Test</button>
                <button style="background-color: var(--color-red);"><?= $user["is_suspended"]==1 ? "Réabiliter" : "Suspendre" ?></button>
            </div>
        </div>


            <table>
                <tr class="darkBck table__head">
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Status</th>
                    <th class="table_more"></th>
                </tr>
                <tr class="table__row">
                    <th>2020-11-14</th>
                    <th>14h04</th>
                    <th>Passed</th>
                    <th class="go_to_detail"><a><div>+</div></a></th>
                </tr>
                <tr class="table__row fail">
                    <th>2020-11-14</th>
                    <th>14h04</th>
                    <th>Failed</th>
                    <th class="go_to_detail"><a>+</a></th>
                </tr>
                <tr class="table__row">
                    <th>2020-11-14</th>
                    <th>14h04</th>
                    <th>Passed</th>
                    <th class="go_to_detail"><a>+</a></th>
                </tr>
                <tr class="table__row">
                    <th>2020-11-14</th>
                    <th>14h04</th>
                    <th>Passed</th>
                    <th class="go_to_detail"><a>+</a></th>
                </tr>
                <tr class="darkBck table__foot">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </table>


    </div>

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>