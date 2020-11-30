<?php $title = $user["Prenom"] . " " . $user["Nom"]; ?>

<?php ob_start(); ?>

<div class="user__profile__container">
        <div class="user__profile__head">
            <div class="user__profile__picture">
                <div class="user__profile__picture_content">
                    <h1><?= $user["Prenom"] ?></h1>
                    <h1><?= $user["Nom"] ?></h1>
                    <hr>
                    <small><?= $user["Creation_Date"] ?></small>
                </div>
            </div>

            <div style='color:<?= $user["is_suspended"]==1 ? "red" : "" ?>;'' class="user__profile__infos">
                <div class="user__profile__infos_mail">
                    <img src="https://cdn4.iconfinder.com/data/icons/miu-black-social-2/60/mail-512.png" alt="mail">
                    <p><?= $user["Mail"] ?></p>
                </div>
                <div class="user__profile__infos_tel">
                    <img src="https://simpleicon.com/wp-content/uploads/phone-symbol-1.png" alt="tel">
                    <p><?= $user["Tel"] ?></p>
                </div>
                <div class="user__profile__info__nss">
                    <img src="https://img.icons8.com/ios-glyphs/452/touch-id.png" alt="nss">
                    <p><?= $user["NSS"] ?></p>
                </div>
                <div class="user__profile__info__adress">
                    <img src="https://i.pinimg.com/originals/f9/64/61/f964612dd42ba5ccd93367f01912c9a3.png" alt="nss">
                    <p><?= $user["Adresse"] ?></p>
                </div>
            </div>

            <div class="user__profile__action">
                <button class="user__profile__action__msg">Méssagerie</button>
                <button class="user__profile__action__newtest">Nouveau Test</button>
                <button class="user__profile__action__ban"><?= $user["is_suspended"]==1 ? "Réabiliter" : "Suspendre" ?></button>
            </div>
        </div>

        <div class="user__table">
            <table class="user__table user__profile__tests">
                <tr class="user__table__header">
                    <th class="user__table__header__item">Date</th>
                    <th class="user__table__header__item">Heure</th>
                    <th class="user__table__header__item">Status</th>
                    <th class="user__table__header__item table_more"></th>
                </tr>
                <tr class="user__table__row">
                    <th class="user__table__row__item">2020-11-14</th>
                    <th class="user__table__row__item">14h04</th>
                    <th class="user__table__row__item">Passed</th>
                    <th class="user__table__row__item"><a><div>+</div></a></th>
                </tr>
                <tr class="user__table__row user__profile_test_fail">
                    <th class="user__table__row__item">2020-11-14</th>
                    <th class="user__table__row__item">14h04</th>
                    <th class="user__table__row__item">Failed</th>
                    <th class="user__table__row__item"><a>+</a></th>
                </tr>
                <tr class="user__table__row">
                    <th class="user__table__row__item">2020-11-14</th>
                    <th class="user__table__row__item">14h04</th>
                    <th class="user__table__row__item">Passed</th>
                    <th class="user__table__row__item"><a>+</a></th>
                </tr>
                <tr class="user__table__row">
                    <th class="user__table__row__item">2020-11-14</th>
                    <th class="user__table__row__item">14h04</th>
                    <th class="user__table__row__item">Passed</th>
                    <th class="user__table__row__item"><a>+</a></th>
                </tr>
                <tr class="user__table__footer">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </table>
        </div>

    </div>

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>