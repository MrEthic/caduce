<nav>
    <div class="wrapper">
        <!-------------------Insertion du logo dans la barre de navigation--------------------------->
        <img id="sport" src="images/logo.png" style="float:right;width:50px;height:50px;">


        <!---------------input type radio pour ouvrir/fermer barre de navigation lorsqu'on rétrécit l'écran ----------------------------->
        <input type="radio" name="slider" id="menu-btn">
        <input type="radio" name="slider" id="close-btn">

        <!----- représente une liste d'éléments sans ordre particulier. Il est souvent représenté par une liste à puces------>
        <ul class="nav-links">
            <!----------------------fas fa times est une icône en forme de croix ------------------------------>
            <!---------------------classe nommée btn close-btn déclarée en haut-------------------------------->
            <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>

            <li><a href="home">Accueil</a></li>

            <!---L'élément HTML <li> est utilisé pour représenter un élément dans une liste.--->
            <!---Il doit être contenu dans un élément parent : une liste ordonnée (<ol>) ou bien une liste non ordonnée (<ul>) --->
            <?php if (!isset($_SESSION["ROLE"])) { ?>
                <li><a href="login">Connexion</a></li>
            <?php } else if ($_SESSION["ROLE"] == 7) { ?>
                <li><a href="users">Utilisateurs</a></li>
                <li><a href="tchat">Méssagerie</a></li>
                <li><a href="tickets">Tickets</a></li>
                <li>
                    <a href="connexion.html" class="desktop-item">Mon compte</a>
                    <input type="checkbox" id="showDrop">
                    <!----------------Supprimer la ligne du dessous fera disparaître la rubrique mon compte lorsqu'on rétrécit l'écran--------->
                    <label for="showDrop" class="mobile-item">Mon compte</label>
                    <ul class="drop-menu">
                        <li><a href="profil">Mon Profil</a></li>
                        <li><a href="logout">Deconnexion</a></li>
                    </ul>
                </li>
            <?php } ?>


            <li><a href="#">FAQ</a></li>

        </ul> <!---Fin de la classe nav-links qui représente tout le contenu de la barre de navigation--->


        <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
    </div> <!--Fin de la balise div class="wrapper"  ou du conteneur---->
</nav>
