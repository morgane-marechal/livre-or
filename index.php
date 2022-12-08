<?php
session_start();
?>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css" />
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <title>Home</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>
<body>
    <header>
        <nav>
            <ul>
                <li><?php if (isset($_SESSION['login'])){echo "<p>Bonjour ".$_SESSION['login']."! Vous êtes connecté !</p>";}?></li>
                <li><a href=index.php>Home</a></li>
                <?php if (isset($_SESSION['login'])&& !empty($_SESSION['login'])){?>
                <li><a href=livre-or.php>Le livre d'or</a></li>
                <li><a href=commentaires.php><span class="material-symbols-outlined">add_comment</span></a></li>
                <li><a href=profil.php><span class="material-symbols-outlined">settings</span></a></li>
                <li><a href=logout.php><span class="material-symbols-outlined">logout</span></a></li>
                <?php } ?>
                <?php if (empty($_SESSION['login'])){?>
                <li><a href=connection.php><span class="material-symbols-outlined">how_to_reg</span></a></li>
                <li><a href=inscription.php><span class="material-symbols-outlined">person_add</span></a></li>
                <?php } ?>

            </ul>
        </nav>
    </header>
    <div id="sessionlog">
        <?php if (isset($_SESSION['login'])){
                        echo "<p>Bonjour ".$_SESSION['login'].". Vous êtes connecté</p>";
                    }
        ?>
    </div>
    <main>
        <div id="welcome">
            <h1>Bienvenue sur notre livre d'or</h1>
        </div>

    </main>

    <footer>
                <ul>
                    <li><a href="https://github.com/morgane-marechal/livre-or" target="_blank" ><img class="logo" src="github-noir.png" alt="github"></a></li>
                    <?php if (empty($_SESSION['login'])){?>
                    <li class="lien"><a href="connection.php">Se connecter</a></li>
                    <li class="lien"><a href="inscription.php">S'inscrire</a></li>
                    <?php } ?>
                </ul>
    </footer>
</body>