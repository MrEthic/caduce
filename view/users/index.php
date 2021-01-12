<?php require_once(DIR . "/view/langs/lang.fr.php"); ?>


<?php
$title = "Ambulanciers";
$active_page = "nav-user";
?>

<?php ob_start(); ?>

<a href="#"><img id="goToTop" src="/public/images/up.png"/></a>

<section id="users" class="panel">
    <h1>Utilisateurs</h1>
    <div id="userStat" class="content-card">
        <div>
            <h2>Utilisateurs</h2>
            <h2>Actifs</h2>
            <hr>
            <p>45</p>
        </div>

        <div>
            <h2>Tests</h2>
            <h2>Réalisés</h2>
            <hr>
            <p>45</p>
        </div>

        <div>
            <h2>Tests</h2>
            <h2>Réalisés</h2>
            <hr>
            <p>45</p>
        </div>

        <div>
            <h2>Utilisateurs</h2>
            <h2>Suspendu</h2>
            <hr>
            <p>45</p>
        </div>
    </div>

    <div id="userNav" class="content-card">

        <button onclick="$('#userCreate').addClass('active');" class="lib-btn lib-green-btn">Ajouter un utilisateurs</button>
        <button onclick="window.location.href='/profil'" class="lib-btn lib-pink-btn">Paramêtre des utilisateurs</button>
        <button onclick="window.location.href='/tchat';" class="lib-btn lib-blue-btn">Méssagerie</button>

    </div>

    <div id="userCreate" class="content-card">
        <i id="closeCreateUser" class="fas fa-times"></i>

        <form id="createForm">
            <h3>Création d'un utilisateur</h3>
            <div id="createContent">

                <div>
                    <p>Numéro de sécurité social</p>
                    <input required class="NSS" name="NSS" placeholder="NSS" type="text" inputmode="numeric" maxlength=13 pattern="[12]{1}\d{12}" autocomplete="off" value="<?= $_POST['NSS'] ?? '' ?>">
                </div>

                <div>
                    <p>Information Personnels</p>
                    <input required type="text" name="prenom" placeholder="Prénom" value="<?= $_POST['prenom'] ?? '' ?>">
                    <input required type="text" name="nom" placeholder="Nom" value="<?= $_POST['nom'] ?? '' ?>">
                    <input required type="email" name="mail" placeholder="Mail" value="<?= $_POST['mail'] ?? '' ?>">
                    <input required type="text" name="tel" placeholder="Téléphone" inputmode="numeric" pattern="0[0-9]{9}" value="<?= $_POST['tel'] ?? '' ?>">
                </div>
                <div>
                    <p>Adresse :</p>
                    <input required type="text" name="adress_1" placeholder="Ligne 1" value="<?= $_POST['adress_1'] ?? '' ?>">
                    <input type="text" name="adress_2" placeholder="Ligne 2" value="<?= $_POST['adress_2'] ?? '' ?>">
                    <input required type="text" name="postal" placeholder="Code Postal" pattern="[0-9]{5}" value="<?= $_POST['postal'] ?? '' ?>">
                    <input required type="text" name="city" placeholder="Ville" value="<?= $_POST['city'] ?? '' ?>">
                </div>
            </div>
            <input id="createSubmit" type="button" value="Ajouter">
        </form>

    </div>

    <div id="userSearchModal" class="content-card">
        <i id="closeSearchModal" class="fas fa-times"></i>
        <form id="advancedSearch">
            <!--<h2>Recherche avancée</h2>-->
            <div>
                <h3>Mode de recherche</h3>
                <div>
                    <label for="or">OU</label>
                    <input checked type="radio" id="or" name="type" value="OR">
                </div>
                <div>
                    <label for="and">ET</label>
                    <input type="radio" id="and" name="type" value="AND">
                </div>
            </div>
            <div>
                <h3>Date d'inscription</h3>
                <div>
                    <span>Du </span>
                    <input type="date" name="from_date"/>
                </div>
                <div>
                    <span> au </span>
                    <input type="date" name="to_date"/>
                </div>
            </div>
            <div>
                <h3>Genre</h3>
                <div>
                    <label for="male">Homme</label>
                    <input checked type="radio" id="male" name="sex" value="0">
                </div>
                <div>
                    <label for="female">Femme</label>
                    <input type="radio" id="female" name="sex" value="1">
                </div>
            </div>
            <div id="userSearchFields">
                <h3>Filtres</h3>
                <div>
                    <input type="text" placeholder="Nom" name="nom">
                    <input type="text" placeholder="Pénom" name="prenom">
                    <input type="text" placeholder="Mail" name="mail">
                    <input type="text" placeholder="Téléphone" name="tel">
                </div>
            </div>
            <button type="button" id="advancedSearchSubmit" type="button"><span>Search</span></button>
        </form>
    </div>

    <div id="userList" class="content-card">
        <form id="userSearch">
            <input type="text" id="searchBar" name="filter" placeholder="Critère">
            <input id="searchSubmit" type="button" value="Search">
            <a id="searchReset"><i class="fas fa-redo-alt"></i></a>
        </form>
        <div id="usersLoading">
            <div id="loader"></div>
        </div>
        <?php if ($users != false) { ?>
            <table class="lib-table" id="userTable">
                <tr>
                    <th onclick="sortTable(0)">Prénom</th>
                    <th onclick="sortTable(1)">Nom</th>
                    <th onclick="sortTable(2)">Mail</th>
                    <th onclick="sortTable(3)">Inscription</th>
                    <th class="table_more"></th>
                </tr>
                <?php foreach ($users as $user) { ?>
                    <tr id="<?= $user['NSS'] ?>" class="UsersTableRow"
                        style="<?= $user["is_suspended"] == 1 ? 'color:red;' : '' ?>">
                        <td ><?= $user["Prenom"] ?></td>
                        <td ><?= $user["Nom"] ?></td>
                        <td ><?= $user["Mail"] ?></td>
                        <td ><?= $user["Creation_Date"] ?></td>
                        <td ><a class="" href="/users/profil/<?= $user["NSS"] ?>"><i class="fas fa-angle-double-right"></i></a></td>
                    </tr>
                <?php } ?>
            </table>
            <?php
        } else {
            ?>
        <table class="lib-table" id="userTable">
            <tr>
                <th onclick="sortTable(0)">Prénom</th>
                <th onclick="sortTable(1)">Nom</th>
                <th onclick="sortTable(2)">Mail</th>
                <th onclick="sortTable(3)">Inscription</th>
                <th class="table_more"></th>
            </tr>
        </table>
        <?php } ?>
    </div>
</section>

<script>

    function register_popup_closer() {
        $('.popup').click(function (e) {
            e.target.remove();
        })
    }

    /*
    Handle basic search
    */
    const bar = document.getElementById("searchBar");
    $('#searchSubmit').click(function () {
        if (bar.value == "") {
            // Display the complex search modal
            $('#userSearchModal').addClass("active");
            return;
        }
        // update table with filter
        $.get("/users/json", {filter: bar.value}, function(res) {
            const users = JSON.parse(res);
            update_table(users);
            bar.value = "";
        })
    });

    /*
    Handle closing advance search
    */
    $('#closeSearchModal').click(function () {
        $('#userSearchModal').removeClass("active");
    });

    /*
    Handle closing create user
    */
    $('#closeCreateUser').click(function () {
        $('#userCreate').removeClass("active");
    });

    /*
    Handle advanced search
     */
    $('#advancedSearchSubmit').click(function () {
        const dataArr = $("#advancedSearch").serializeArray();
        let data = {};
        for (let el of dataArr) {
            data[el["name"]] = el["value"];
        }
        // update table
        $.get("/users/json", data, function(res) {
            const users = JSON.parse(res);
            console.log(res);
            update_table(users);
        })
    });

    /*
    Handle search reset
     */
    $("#searchReset").click(function () {
        $.get("/users/json", function(res) {
            const users = JSON.parse(res);
            update_table(users);
        })
    });

    $("#createSubmit").click(function () {
        const dataArr = $("#createForm").serializeArray();
        let data = {};
        for (let el of dataArr) {
            data[el["name"]] = el["value"];
        }
        $("#usersLoading").addClass("active");
        $.post("/users/create", data, function (res) {
            res = JSON.parse(res);
            if (res["success"] == true) {
                $.get("/users/json", function(res) {
                    const users = JSON.parse(res);
                    update_table(users);
                })
                $("html").append(`<div class="popup green">
                    <p>${res['msg']}</p>
                    </div>`)
            }
            else {
                $("html").append(`<div class="popup red">
                    <p>${res['msg']}</p>
                    </div>`)
            }
            register_popup_closer();
            $("#usersLoading").removeClass("active");
        });
    });

    /*
    Function to update a table
     */
    function update_table(users) {
        $(".UsersTableRow").remove();
        for (let user of users) {
            let nrow = `<tr id="${user['NSS']}" class="UsersTableRow"
                        style="${user['is_suspended']==1 ? 'color:red;' : ''}">
                        <td >${user['Prenom']}</td>
                        <td >${user['Nom']}</td>
                        <td >${user['Mail']}</td>
                        <td >${user["Creation_Date"]}</td>
                        <td ><a class="" href="/users/profil/${user['NSS']}"><i class="fas fa-angle-double-right"></i></a></td>
                    </tr>`;
            $("#userTable > tbody").append(nrow);
        }
    }


</script>

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>
