<?php $title = "Ambulanciers"; ?>

<?php ob_start(); ?>

<dialog class="user__search__advanced__container" id="searchModal">
  <form class="user__search__advanced__form" action="/users">
    <h1>Recherche avancée</h1>
    <hr>
    <div class="user__search__advanced__type">
      <h3>Mode de recherche :</h3>
      <div>
        <label for="or">OU</label>
        <input checked type="radio" id="or" name="type" value="OR">
      </div>
      <div>
        <input type="radio" id="and" name="type" value="AND">
        <label for="and">ET</label>
      </div>
    </div>
    <hr>
    <div class="user__search__advanced__dates">
      <h3>Date d'inscription :</h3>
      <span>Du </span>
      <input type="date" name="from_date"/>
      <span> au </span>
      <input type="date" name="to_date"/>
      <span> inclue</span>
    </div>
    <hr>
    <div class="user__search__advanced__sex">
      <div>
        <label for="male">Homme</label>
        <input type="radio" id="male" name="sex" value="0">
      </div>
      <div>
        <input type="radio" id="female" name="sex" value="1">
        <label for="female">Femme</label>
      </div>
      <div>
        <input checked type="radio" id="neither" name="sex" value="3">
        <label for="neither">Autre</label>
      </div>
    </div>
    <hr>
    <div class="user__search__advanced__fields">
      <input type="text" placeholder="Nom" name="nom">
      <input type="text" placeholder="Pénom" name="prenom">
      <input type="text" placeholder="Mail" name="mail">
      <input type="text" placeholder="Téléphone" name="tel">
    </div>
    <hr>
    <button type="submit" id="advancedSearch" type="button">Search</button>
  </form>
</dialog>
<div class="user__container">
  <form class="user__search" id="userSearch" action="/users">
    <input class="user__search__bar" type="text" id="searchBar" name="filter" placeholder="Critère">
    <input class="user__search__button" id="search" type="submit" value="Search">
    <a class="user__search__reset" href="/users"><img src="/public/images/reset.png" alt="reset" width="20" height="20"></a>
  </form>
  <?php if ($users != false) { ?>
  <?php if (isset($_GET["filter"])) { ?><p style="padding-left:10px;">Filtre : <?= $_GET["filter"] ?></p><?php } ?>
  <?php if (isset($_GET["type"])) { ?>
    <p style="padding-left:10px;">Inscription entre le <?= $_GET["from_date"] ?> et le <?= $_GET["to_date"] ?></p>
    <p style="padding-left:10px;">Genre : <?= $_GET["sex"]==0 ? "Homme" : ($_GET["sex"]==1 ? "Femme" : "Autre") ?></p>
    <p style="padding-left:10px;">Nom : <?= $_GET["nom"] ?></p>
    <p style="padding-left:10px;">Prénom : <?= $_GET["prenom"]  ?></p>
    <p style="padding-left:10px;">Mail : <?= $_GET["mail"]  ?></p>
    <p style="padding-left:10px;">Tel : <?= $_GET["tel"]  ?></p>
    <?php } ?>
  <table class="user__table" id="userTable">
    <tr class="user__table__header">
      <th class="user__table__header__item" onclick="sortTable(0)">Nom</th>
      <th class="user__table__header__item" onclick="sortTable(1)">Prénom</th>
      <th class="user__table__header__item" onclick="sortTable(2)">Mail</th>
      <th class="user__table__header__item" onclick="sortTable(3)">Inscription</th>
      <th class="user__table__header__item table_more"></th>
    </tr>
    <tr class="user__table__row__create">
      <th class="user__table__row__item"></th>
      <th class="user__table__row__item"></th>
      <th class="user__table__row__item"></th>
      <th class="user__table__row__item"></th>
      <th class="user__table__row__item user__new"><input type="button" onclick="location.href='/users/create';" value="Nouveau"></th>
    </tr>
    <?php foreach ($users as $user) { ?>
    <tr id="<?= $user['NSS'] ?>" class="user__table__row" style="<?= $user["is_suspended"]==1 ? 'color:red;' : ''  ?>">
      <th class="user__table__row__item"><?= $user["Prenom"] ?></th>
      <th class="user__table__row__item"><?= $user["Nom"] ?></th>
      <th class="user__table__row__item"><?= $user["Mail"] ?></th>
      <th class="user__table__row__item"><?= $user["Creation_Date"] ?></th>
      <th class="user__table__row__item"><a href="/users/profil/<?= $user["NSS"] ?>"><div>+</div></a></th>
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

  function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("userTable");

    headers = table.rows[0];
    current = headers.getElementsByTagName("TH")[n];

    for (i=0 ; i < headers.getElementsByTagName("TH").length - 1 ; i++) {
      //headers.getElementsByTagName("TH")[i].innerHTML = header_names[i];
      headers.getElementsByTagName("TH")[i].classList.remove("sort__asc");
      headers.getElementsByTagName("TH")[i].classList.remove("sort__desc");
    }

    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
      // Start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /* Loop through all table rows (except the
      first, which contains table headers): */
      for (i = 1; i < (rows.length - 2); i++) {
        // Start by saying there should be no switching:
        shouldSwitch = false;
        /* Get the two elements you want to compare,
        one from current row and one from the next: */
        x = rows[i].getElementsByTagName("TH")[n];
        y = rows[i + 1].getElementsByTagName("TH")[n];
        /* Check if the two rows should switch place,
        based on the direction, asc or desc: */
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /* If a switch has been marked, make the switch
        and mark that a switch has been done: */
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        // Each time a switch is done, increase this count by 1:
        switchcount++;
      } else {
        /* If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again. */
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
    cl = "sort__" + dir;
    current.classList.add(cl);
  }
</script>

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>