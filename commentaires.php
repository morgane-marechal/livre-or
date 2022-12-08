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


            <?php  

                //pour avoir la date
                $mydate=getdate(date("U"));


                    //valeur de la date pour le type sql datetime YYYY-MM-DD
                    $sqldate="$mydate[year]/$mydate[mon]/$mydate[mday]";

                    /*Chaque commentaire doit être composé d’un texte “posté le
                            `jour/mois/année` par `utilisateur`”*/
                            $name=$_SESSION['login'];
                            $comment = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['comment']));
                            $comment_with_date="<p>Posté le $mydate[mday] $mydate[month] $mydate[year] par $name</p><br><p>$comment</p>";
                            //  echo $comment_with_date;
                            echo "<br>";

                    // ----------- faire la requête d'insertion sql -----------
                    
                    // requête pour retrouver l'id utilisateur
                    //SELECT utilisateurs.id from utilisateurs where login = $name
                    $request=$mysqli->query("SELECT utilisateurs.id from utilisateurs where login = '$name'");
                    $result=$request->fetch_all();
                    //echo var_dump($result);
                    $id_utilisateur=$result[0][0];
                    $int_utilisateur=(int)$id_utilisateur;
                    //echo $int_utilisateur;
                    $newcomment = "INSERT INTO commentaires ( commentaire, id_utilisateur, date)
                    VALUES( '$comment_with_date','$int_utilisateur', '$sqldate')";

                    if (!empty($comment)){
                        if ($mysqli->query($newcomment) === TRUE) {
                            echo "Vous avez ajouté un commentaire avec succés";
                            } else {
                            echo "Erreur: " . $newcomment . "
                            " . $mysqli->error;
                            }
                        }
                ?> 
            </form>
            
        </section>
    </main>
    <footer>
                <ul>
                    <li><a href="https://github.com/morgane-marechal/livre-or" target="_blank" ><img class="logo" src="github-noir.png" alt="github"></a></li>
                    <li class="lien"><a href="connection.php">Se connecter</a></li>
                    <li class="lien"><a href="inscription.php">S'inscrire</a></li>
                </ul>
    </footer>
</body>