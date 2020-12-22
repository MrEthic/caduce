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
        <a href="/home">
            <i class="fas fa-home"></i>
            <h2>Acceuil</h2>
        </a>
    </div>
    <div>
        <a href="/profil">
            <i class="far fa-address-card"></i>
            <h2>Mon compte</h2>
        </a>
    </div>
    <div>
        <a href="/profil">
            <i class="fas fa-hospital-symbol"></i>
            <h2>Mon hospital</h2>
        </a>
    </div>
    <div>
        <a id="nav-user" href="/users">
            <i class="fas fa-users"></i>
            <h2>Utilisateurs</h2>
        </a>
    </div>
    <div>
        <a href="/tchat">
            <i class="far fa-comment-dots"></i>
            <h2>Méssagerie</h2>
        </a>
    </div>
    <div>
        <a href="/tickets">
            <i class="fas fa-headset"></i>
            <h2>Support</h2>
        </a>
    </div>

    <div>
        <a href="/logout">
            <i class="fas fa-sign-out-alt"></i>
            <h2>Déconnexion</h2>
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
