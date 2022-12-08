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
            <h2>Paramètres du profil</h2>
            <section id="compte_form">
                <form action="" method="post" autocomplete="off">
                    <h3>Modification du compte</h3>
                    <input type="text" name="newlogin" id="login" placeholder= "<?php echo $_SESSION['login']; ?>" minlength="3" autocomplete="off">
                    <?php if ($_POST['newlogin']) 
                    {echo "<p>Vous avez bien changé votre login en ".$_POST['newlogin']."</p>"; }?>
                    <input type="text" name="newpassword" id="password" placeholder= "<?php echo $_SESSION['password']; ?>" minlength="5">
                    <input type="text" name="newconf_password" id="conf_password" placeholder="<?php echo $_SESSION['password']; ?>" minlength="5">
                    <?php if(($_POST['newpassword']) && ($_POST['newconf_password']) && (($_POST['newpassword']) == ($_POST['newconf_password']))) 
                    {echo "<p>Vous avez bien changé votre mot de passe en ".$_POST['newpassword']."</p>"; }?>
                    </select>
                    <input class="submit" type="submit" value="Modifier">
                    <i class="small">* Mofidier le champs que vous voulez changer, un seul champs à la fois.</i>
                </form>
            </section>
    


    <?php
     $login=$_SESSION['login'];
     if ($_POST['newlogin']){
        $changelogin=$_POST['newlogin'];
        echo "<p>Changement de login $login en $changelogin. Veuillez rafraichir la page</p>";
        $sqllogin = "update utilisateurs set login = '$changelogin' where login = '$login'";
        $rs = mysqli_query($mysqli,$sqllogin);
        $_SESSION['login']=$changelogin;
    }elseif (($_POST['newpassword']) && ($_POST['newconf_password']) && (($_POST['newpassword']) == ($_POST['newconf_password'])) ){
        echo "Changement de MP";
        $newpassword=$_POST['newpassword'];
        $newsecurepassword = password_hash($newpassword, PASSWORD_DEFAULT);
        $sqlpassword = "update utilisateurs set password = '$newsecurepassword' where login = '$login'";
        $rs = mysqli_query($mysqli,$sqlpassword); 
    }
    ?> 
    
    
                <?php 
                    echo "<h2>Hello ".$_SESSION['login']." !</h2>";
                    echo "<br>";
                    /*
                    //echo var_dump($_SESSION);
                    echo "<br>";

                    // ----$_session pour afficher diff données-----
                    $newlogin=$_SESSION['login'];
                    $request=$mysqli->query("SELECT * FROM utilisateurs where login = '$newlogin'");
                    $result=$request->fetch_all();
                    
                   // echo "<br> Ici c'est ".var_dump($result);
                    
                    //pour voir ce qu'il y a dans le tableau
                    echo "Login: ".$result[0][1]."<br>";
                    echo "Mot de passe crypté: ".$result[0][2]."<br>";
                    echo "Mot de passe en clair : ".$_SESSION['password'];
                    echo"<br>";

                    //pour avoir version nom cripté du mot de passe
                    password_verify($password_post, $password_hash);*/
                    
                    

                    ?>

        

    </main>
    <footer>
                <ul>
                    <li><a href="https://github.com/morgane-marechal/livre-or" target="_blank" ><img class="logo" src="github-noir.png" alt="github"></a></li>
                    <li class="lien"><a href="connection.php">Se connecter</a></li>
                    <li class="lien"><a href="inscription.php">S'inscrire</a></li>
                </ul>
    </footer>
</body>