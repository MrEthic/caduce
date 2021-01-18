<?php $title = "Tickets"; ?>

<?php ob_start(); ?>



<div class="user__container" style="width: 80%">
    <table class="user__table">
        <tr class="user__table__header">
            <th class="user__table__header__item">ID Tiquet</th>
            <th class="user__table__header__item">Date de creation</th>
            <th class="user__table__header__item">Statut</th>
            <th class="user__table__header__item">Hopital</th>
            <th class="user__table__header__item">Dernier Message</th>
            <th class="user__table__header__item"></th>
        </tr>
        <tr class="user__table__row ticket__en__attente">
            <th class="user__table__row__item">001</th>
            <th class="user__table__row__item">22/09/2020</th>
            <th class="user__table__row__item">En attente</th>
            <th class="user__table__row__item">Fransciquaine</th>
            <th class="user__table__row__item">2020-11-22 : 13h22</tr>
        <tr class="user__table__row">
            <th class="user__table__row__item">048</th>
            <th class="user__table__row__item">08/08/2020</th>
            <th class="user__table__row__item">Géré</th>
            <th class="user__table__row__item">Necker</th>
            <th class="user__table__row__item">2020-10-28 : 16h19</tr>
        <tr class="user__table__row ticket__clot">
            <th class="user__table__row__item">124</th>
            <th class="user__table__row__item">17/10/2020</th>
            <th class="user__table__row__item">Clos</th>
            <th class="user__table__row__item">Pitié-Salpétrière</th>
            <th class="user__table__row__item">2020-11-05 : 11h40</tr>
        <tr class="user__table__row ticket__en__attente">
            <th class="user__table__row__item">240</th>
            <th class="user__table__row__item">17/10/2020</th>
            <th class="user__table__row__item">En attente</th>
            <th class="user__table__row__item">Pitié-Salpétrière</th>
            <th class="user__table__row__item">2020-11-05 : 11h40</tr>
        <tr class="user__table__row ticket__clot">
            <th class="user__table__row__item">369</th>
            <th class="user__table__row__item">17/10/2020</th>
            <th class="user__table__row__item">Clos</th>
            <th class="user__table__row__item">Pitié-Salpétrière</th>
            <th class="user__table__row__item">2020-11-05 : 11h40</tr>
        <tr class="user__table__row ticket__clot">
            <th class="user__table__row__item">76</th>
            <th class="user__table__row__item">17/10/2020</th>
            <th class="user__table__row__item">Clos</th>
            <th class="user__table__row__item">Pitié-Salpétrière</th>
            <th class="user__table__row__item">2020-11-05 : 11h40</tr>
        <tr class="user__table__footer">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>




