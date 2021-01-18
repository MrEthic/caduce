<?php $title = $conv["Prenom"] . $conv["Nom"]; ?>
<?php $active_page = "nav-user"; ?>

<?php ob_start(); ?>


<section class="panel" id="tchat_conv">

    <div class="content-card" id="userInfos">
        <h1><?= $conv["Prenom"] . " " . $conv["Nom"] ?></h1>
        <div>
            <i class="far fa-envelope-open"></i>
            <hr>
            <h3><?= $conv["Mail"] ?></h3>
        </div>
        <div>
            <i class="fas fa-fingerprint"></i>
            <hr>
            <h3><?= $conv["NSS"] ?></h3>
        </div>
        <div>
            <i class="fas fa-mobile-alt"></i>
            <hr>
            <h3><?= $conv["Tel"] ?></h3>
        </div>
        <div>
            <i class="fas fa-map-marker-alt"></i>
            <hr>
            <h3><?= $user["Adresse"] ?></h3>
        </div>
        <table class="lib-table" id="userTable">
            <tr>
                <th onclick="sortTable(0)">Date</th>
                <th onclick="sortTable(1)">Heure</th>
                <th onclick="sortTable(2)">Status</th>
                <th class="table_more"></th>
            </tr>
            <tr>
                <td>2020-01-12</td>
                <td>13h41</td>
                <td>Terminée</td>
                <td><a href=""><i class="fas fa-angle-double-right"></i></a></td>
            </tr>
            <tr>
                <td>2020-01-12</td>
                <td>13h41</td>
                <td>Terminée</td>
                <td><a href=""><i class="fas fa-angle-double-right"></i></a></td>
            </tr>
            <tr>
                <td>2020-01-12</td>
                <td>13h41</td>
                <td>Terminée</td>
                <td><a href=""><i class="fas fa-angle-double-right"></i></a></td>
            </tr>
            <tr>
                <td>2020-01-12</td>
                <td>13h41</td>
                <td>Terminée</td>
                <td><a href=""><i class="fas fa-angle-double-right"></i></a></td>
            </tr>
            <tr>
                <td>2020-01-12</td>
                <td>13h41</td>
                <td>Terminée</td>
                <td><a href=""><i class="fas fa-angle-double-right"></i></a></td>
            </tr>
            <tr>
                <td>2020-01-12</td>
                <td>13h41</td>
                <td>Terminée</td>
                <td><a href=""><i class="fas fa-angle-double-right"></i></a></td>
            </tr>
            <tr>
                <td>2020-01-12</td>
                <td>13h41</td>
                <td>Terminée</td>
                <td><a href=""><i class="fas fa-angle-double-right"></i></a></td>
            </tr>
            <tr>
                <td>2020-01-12</td>
                <td>13h41</td>
                <td>Terminée</td>
                <td><a href=""><i class="fas fa-angle-double-right"></i></a></td>
            </tr>
            <tr>
                <td>2020-01-12</td>
                <td>13h41</td>
                <td>Terminée</td>
                <td><a href=""><i class="fas fa-angle-double-right"></i></a></td>
            </tr>
            <tr>
                <td>2020-01-12</td>
                <td>13h41</td>
                <td>Terminée</td>
                <td><a href=""><i class="fas fa-angle-double-right"></i></a></td>
            </tr>
            <tr>
                <td>2020-01-12</td>
                <td>13h41</td>
                <td>Terminée</td>
                <td><a href=""><i class="fas fa-angle-double-right"></i></a></td>
            </tr>
        </table>
    </div>

    <div class="content-card" id="userTchat">
        <div id="tchatHeader">
            <h1>Méssagerie</h1>
        </div>

        <div id="update">
            <div id="msgContainer">
                <?php
                foreach ($msgs as $key => $msg) {?>
                    <div class='<?= (($msg["is_answer"] == 1 and $_SESSION["ROLE"] == 7) or ($msg["is_answer"] == 0 and $_SESSION["ROLE"] == 6)) ? "msg_right" : "msg_left" ?>'>
                        <p><?= $msg["content"] ?></p></div>
                    <?php
                } ?>
            </div>
        </div>

        <div id="msgInputs">
            <textarea id="msgContent" rows="2" placeholder="Message" required></textarea>
            <i id="sendMsg" class="fas fa-arrow-alt-circle-right"></i>
        </div>
    </div>


</section>

<script src="<?php DIR?>/public/js/msgScroller.js"></script>

<script>

    $("#sendMsg").click(function () {
        msg = $("#msgContent").val();
        $.post("", {msg_content: msg}, function () {
            $("#msgContent").val("");
            $('#update').load(location.href + " #msgContainer", function() {
                register_scroller();
            });
        });
    })

</script>

<?php $content = ob_get_clean(); ?>

<?php require(DIR . '/view/template.view.php'); ?>



