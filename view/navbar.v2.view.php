<?php require_once(DIR . "/view/langs/lang.fr.php"); ?>

<style>
    #<?= $active_page ?? "r" ?> {
        border-right: var(--color-red) solid 5px;
    }
</style>

<nav id="sideBar">

    <div>
        <a>
            <img src="/favicon.ico">
            <h1>Caducée</h1>
        </a>
    </div>

    <div>
        <a id="nav-home" href="/home">
            <i class="fas fa-home"></i>
            <h2><?= $lg["nav"]["home"] ?></h2>
        </a>
    </div>
    <div>
        <a id="nav-profil" href="/profil">
            <i class="far fa-address-card"></i>
            <h2><?= $lg["nav"]["profil"] ?></h2>
        </a>
    </div>
    <div>
        <a id="nav-hospital" href="/h">
            <i class="fas fa-hospital-symbol"></i>
            <h2><?= $lg["nav"]["hospital"] ?></h2>
        </a>
    </div>
    <div>
        <a id="nav-user" href="/users">
            <i class="fas fa-users"></i>
            <h2><?= $lg["nav"]["users"] ?></h2>
        </a>
    </div>
    <div>
        <a id="nav-tchat" href="/tchat">
            <i class="far fa-comment-dots"></i>
            <h2><?= $lg["nav"]["msg"] ?></h2>
        </a>
    </div>
    <div>
        <a id="nav-tickets" href="/tickets">
            <i class="fas fa-headset"></i>
            <h2><?= $lg["nav"]["support"] ?></h2>
        </a>
    </div>

    <div>
        <a href="/logout">
            <i class="fas fa-sign-out-alt"></i>
            <h2><?= $lg["nav"]["logout"] ?></h2>
        </a>
    </div>

</nav>

<script>
    $("#sideBar div:nth-child(1)").click(function () {
       if ($("#sideBar").hasClass("side-expand")) {
           $("#sideBar").removeClass("side-expand")
           $("section").removeClass("side-expand")
       }
       else {
           $("#sideBar").addClass("side-expand")
           $("section").addClass("side-expand")
       }
    });
</script>
