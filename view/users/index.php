<?php $title = "Ambulanciers"; ?>

<?php ob_start(); ?>

<dialog class="alert__container" id="searchModal">
    <form id="advancedSearch" class="page halfwidth darkBck vcenter round-border container" action="/users">
        <h1>Recherche avancée</h1>
        <hr>
        <div class="hflex">
            <h3>Mode de recherche :</h3>
            <div>
                <label for="or">OU</label>
                <input checked type="radio" id="or" name="type" value="OR">
            </div>
            <div>
                <label for="and">ET</label>
                <input type="radio" id="and" name="type" value="AND">
            </div>
        </div>
        <hr>
        <div>
            <h3>Date d'inscription :</h3>
            <div class="hflex">
                <span>Du </span>
                <input type="date" name="from_date"/>
                <span> au </span>
                <input type="date" name="to_date"/>
                <span> inclue</span>
            </div>
        </div>
        <hr>
        <div class="hflex">
            <h3>Genre :</h3>
            <div>
                <label for="male">Homme</label>
                <input checked type="radio" id="male" name="sex" value="0">
            </div>
            <div>
                <label for="female">Femme</label>
                <input type="radio" id="female" name="sex" value="1">
            </div>
        </div>
        <hr>
        <div class="hflex flex-wrap" id="advancedFields">
            <input type="text" placeholder="Nom" name="nom">
            <input type="text" placeholder="Pénom" name="prenom">
            <input type="text" placeholder="Mail" name="mail">
            <input type="text" placeholder="Téléphone" name="tel">
        </div>
        <hr>
        <button type="submit" id="advancedSearchSubmit" type="button">Search</button>
    </form>
</dialog>
<div class="page whitBck">
    <div class="title">
        <h1>Utilisateurs</h1>
    </div>
    <form class="container fullwidth hflex" id="userSearch" action="/users">
        <input type="text" id="searchBar" name="filter" placeholder="Critère">
        <input class="darkBck" id="searchSubmit" type="submit" value="Search">
        <a id="searchReset" href="/users"><img src="/public/images/reset.png" alt="reset" width="20"
                                               height="20"></a>
    </form>
    <?php if ($users != false) { ?>
            <?php if (isset($_GET["filter"])) { ?><p style="padding:5px;">Résulat pour
                : "<?= $_GET["filter"] ?>"</p><?php } ?>
            <?php if (isset($_GET["type"])) { ?>
                <p style="padding-left:10px;">Inscription entre le <?= $_GET["from_date"] ?> et
                    le <?= $_GET["to_date"] ?></p>
                <p style="padding-left:10px;">Genre
                    : <?= $_GET["sex"] == 0 ? "Homme" : ($_GET["sex"] == 1 ? "Femme" : "Autre") ?></p>
                <p style="padding-left:10px;">Nom : <?= $_GET["nom"] ?></p>
                <p style="padding-left:10px;">Prénom : <?= $_GET["prenom"] ?></p>
                <p style="padding-left:10px;">Mail : <?= $_GET["mail"] ?></p>
                <p style="padding-left:10px;">Tel : <?= $_GET["tel"] ?></p>
            <?php } ?>
    <table id="userTable">
        <tr class="darkBck table__head">
            <th onclick="sortTable(0)">Nom</th>
            <th onclick="sortTable(1)">Prénom</th>
            <th onclick="sortTable(2)">Mail</th>
            <th onclick="sortTable(3)">Inscription</th>
            <th class="table_more"></th>
        </tr>
        <tr id="newUser" class="table__row">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th class="inline_input"><input type="button" onclick="location.href='/users/create';" value="Nouveau"></th>
        </tr>
        <?php foreach ($users as $user) { ?>
            <tr id="<?= $user['NSS'] ?>" class="table__row"
                style="<?= $user["is_suspended"] == 1 ? 'color:red;' : '' ?>">
                <th ><?= $user["Prenom"] ?></th>
                <th ><?= $user["Nom"] ?></th>
                <th ><?= $user["Mail"] ?></th>
                <th ><?= $user["Creation_Date"] ?></th>
                <th ><a class="go_to_detail" href="/users/profil/<?= $user["NSS"] ?>">+</a></th>
            </tr>
        <?php } ?>
        <tr class="darkBck table__foot">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </table>
    <?php
    } else {
        ?>
        <h1>Aucun Résultat</h1>
    <?php } ?>
</div>

<script>
    const modal = document.getElementById("searchModal");
    const btn = document.getElementById("searchSubmit");
    const bar = document.getElementById("searchBar");
    btn.onclick = function () {
        if (bar.value == "") {
            modal.style.display = "block";
        }
        //sinon rechercher
    }
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    const searchbar = document.getElementById("searchBar");
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

        for (i = 0; i < headers.getElementsByTagName("TH").length - 1; i++) {
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
                if (rows[i].id == "newUser") {
                    continue;
                }
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
