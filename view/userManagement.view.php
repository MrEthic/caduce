<?php $title = "Ambulanciers"; ?>

<?php ob_start(); ?>

  <dialog class="user__search__advanced__container" id="searchModal">
    <form class="user__search__advanced__form">
      <h1>Recherche avancé</h1>
      <hr>
      <div class="user__search__advanced__dates">
        <h3>Date d'inscription :</h3>
        <span>Du </span>
        <input type="date" />
        <span> au </span>
        <input type="date" />
        <span> inclue</span>
      </div>
      <hr>
      <div class="user__search__advanced__sex">
        <div>
          <label for="male">Homme</label>
          <input type="radio" id="male" name="sex" value="male">
        </div>
        <div>
          <input type="radio" id="female" name="sex" value="female">
          <label for="female">Femme</label>
        </div>
        <div>
          <input type="radio" id="neither" name="sex" value="neither">
          <label for="neither">Autre</label>
        </div>
      </div>
      <hr>
      <input type="text" placeholder="Critère">
      <hr>
      <button type="submit" id="advancedSearch" type="button">Search</button>
    </form>
  </dialog>
  <div class="user__container">
    <form class="user__search" id="userSearch" action="/" >
      <input type="hidden" name="action" value="users">
      <input class="user__search__bar" type="text" id="searchBar" name="filter" placeholder="Critère">
      <input class="user__search__button" id="search" type="submit" value="Search">
    </form>
<?php if ($users != false) { ?>
    <table class="user__table">
      <tr class="user__table__header">
        <th class="user__table__header__item">Nom</th>
        <th class="user__table__header__item">Prénom</th>
        <th class="user__table__header__item">Mail</th>
        <th class="user__table__header__item">Inscription</th>
        <th class="user__table__header__item"></th>
      </tr>
<?php foreach ($users as $user) { ?>
      <tr class="user__table__row">
        <th class="user__table__row__item"><?= $user["Prénom"] ?></th>
        <th class="user__table__row__item"><?= $user["Nom"] ?></th>
        <th class="user__table__row__item"><?= $user["Mail"] ?></th>
        <th class="user__table__row__item">18/11/2020</th>
        <th class="user__table__row__item"><button type="button">+</button></th>
      </tr>
<?php } ?>
      <tr class="user__table__footer">
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </table>
<?php
}
else {
?>
<h1>Aucun Résultat</h1>
<?php } ?>
  </div>

  <script>
    var modal = document.getElementById("searchModal");
    var btn = document.getElementById("search");
    var bar = document.getElementById("searchBar")
    btn.onclick = function () {
      if (bar.value == "") {
        console.log(bar.value)
        modal.style.display = "block";
      }
      //sinon rechercher
    }
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    var searchbar = document.getElementById("searchBar");
    document.getElementById("userSearch").addEventListener("submit", e => {
      if (searchbar.value == "") {
        e.preventDefault();
      }
    });
  </script>

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>