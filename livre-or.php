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
                <li><?php if (isset($_SESSION['login'])){echo "<p>Bonjour ".$_SESSION['login']."! Vous êtes connecté !</p>";}?></li>
                <li><a href=index.php>Home</a></li>
                <?php if (isset($_SESSION['login'])){?>
                <li><a href=livre-or.php>Le livre d'or</a></li>
                <li><a href=commentaires.php><span class="material-symbols-outlined">add_comment</span></a></li>
                <li><a href=profil.php><span class="material-symbols-outlined">settings</span></a></li>
                <?php } ?>
                <li><a href=inscription.php><span class="material-symbols-outlined">how_to_reg</span></a></li>
                <li><a href=connection.php><span class="material-symbols-outlined">login</span></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="sessionlog">
            <?php if (isset($_SESSION['login'])){
                            echo "<p>Bonjour ".$_SESSION['login']."! Vous êtes connecté !</p>";
                        }
            ?>
        </div>

        <div id="displayBook">
            <?php
                $mysqli = new mysqli('localhost','root','','livreor');
                if(!$mysqli){
                die('Erreur : ' .mysqli_connect_error());
                    }
                $request=$mysqli->query("SELECT commentaire FROM commentaires ORDER BY id Desc");
                $result_fetch_all = $request->fetch_all();
                //var_dump($result_fetch_all);

                foreach($result_fetch_all as $ligne){
                    foreach($ligne as $valeur){
                        echo '<div id="comment">';
                        echo $valeur."<br>";
                        echo '</div>';
                        }
                }
            ?>
        </div>
    </main>
    <footer>
                <ul>
                    <li><a href="https://github.com/morgane-marechal/livre-or" target="_blank" ><img class="logo" src="github-noir.png" alt="github"></a></li>
                    <li class="lien"><a href="connection.php">Se connecter</a></li>
                    <li class="lien"><a href="inscription.php">S'inscrire</a></li>
                </ul>
    </footer>
    </body>



