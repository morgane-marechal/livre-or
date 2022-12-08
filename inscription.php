<?php
session_start();
?>
<?php include 'dbconnect.php';?>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css" />
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <title>Inscription</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>
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
    <div id="sessionlog">
        <?php if (isset($_SESSION['login'])){
                        echo "<p>Bonjour ".$_SESSION['login'].". Vous êtes connecté</p>";
                    }
        ?>
    </div>
    <main>
            <section id="connexion_form">
                <form action="" method="post">
                    <h3>Création de compte</h3>
                    <input type="text" name="login" id="login" placeholder="Login*" required minlength="5"> 
                    <input type="password" name="password" id="password" placeholder="Password*" required minlength="5">
                    <input type="password" name="conf_password" id="conf_password" placeholder="Confirmation du mot de passe*" required minlength="2">
                    </select>
                    <input class="submit" type="submit" value="Envoyer">
                    <i class="small">* Champs obligatoires avec 5 caractères minimum</i>

        
    <?php
     $login = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['login'])); //protection pour éviter injection SQL malveillante
     $password = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['password'])); 
     $checkpassword = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['conf_password'])); //protection pour éviter injection SQL malveillante
         

     $check_login = "SELECT count(*) FROM utilisateurs where login = '$login'";
     $exec_requete = mysqli_query($mysqli,$check_login);
     $reponse = mysqli_fetch_array($exec_requete);
     $count = $reponse['count(*)'];

    if ($count==1){
        $error_login="<p>Ce login est déjà pris, veuillez en choisir un autre!</p>";
        echo $error_login;
    }else{
        if (($password==$checkpassword) && (!empty($login)) && (!empty($password))){
        $password = password_hash($password, PASSWORD_DEFAULT); 
            $newuser = "INSERT INTO utilisateurs ( login, password)
            VALUES( '$login', '$password')";
        
            if ($mysqli->query($newuser) === TRUE) {
                //echo "Vous avez ajouté un utilisateur avec succés";
                header('Location: http://localhost/livre-or/connection.php'); // <- redirection vers la page connexion si l'inscription fonctionne
                exit();
                } else {
                echo "Erreur: " . $newuser . "
                " . $mysqli->error;
                }

        }elseif ((empty($name)) OR (empty($firstname)) OR (empty($password))){
            $error_empty="<p>L'un des champs du formulaire est vide<p>";
            echo $error_empty;
        }elseif ($password!=$checkpassword){
            $error_password="<p>Veuillez confirmer correctement votre mot de passe!</p>";
            echo $error_password;
        }
    }
    $mysqli->close();
    
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
