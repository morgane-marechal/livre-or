<?php
session_start();
?>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css" />
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <title>Profil</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    </head>
<?php include 'dbconnect.php';?>
<body>
    <header>
        <nav>
            <ul>
                <li><a href=index.php>Home</a></li>
                <?php if (isset($_SESSION['login'])){?>
                <li><a href=livre-or.php>Le livre d'or</a></li>
                <li><a href=commentaires.php><span class="material-symbols-outlined">add_comment</span></a></li>
                <li><a href=profil.php><span class="material-symbols-outlined">manage_accounts</span></a></li>
                <?php } ?>
                <li><a href=inscription.php><span class="material-symbols-outlined">how_to_reg</span></a></li>
                <li><a href=connection.php><span class="material-symbols-outlined">login</span></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="sessionlog">
            <?php if (isset($_SESSION['login'])){
                            echo "<p>Bonjour ".$_SESSION['login'].". Vous êtes connecté</p>";
                        }
            ?>
        </div>
    
        <section id="connexion_form">
                <form action="" method="post">
                    <h3>Laisser un commentaire</h3>
                    <input class= "comment" type="text" name="comment" id="comment" placeholder="Ajouter un commentaire*" required minlength="20">
                    </select>
                    <input class="submit" type="submit" value="Envoyer">
                    <i class="small">* Champs obligatoires avec 20 caractères minimum</i>
                </form>
        </section>
    </main>