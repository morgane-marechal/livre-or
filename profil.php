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
    <div id="sessionlog">
        <?php if (isset($_SESSION['login'])){
                        echo "<p>Bonjour ".$_SESSION['login'].". Vous êtes connecté</p>";
                    }
        ?>
    </div>
    <main>
         <div id="bloc-form">
            <h2>Voulez-vous faire des mofifications de vos données de profil ?</h2>
            <section id="compte_form">
                <form id="profil-form" action="" method="post" autocomplete="off">
                    <h3>Modification du compte</h3>
                    <input type="text" name="newlogin" id="login" placeholder= "<?php echo $result[0][1]; ?>" minlength="3" autocomplete="off">
                    <input type="text" name="newpassword" id="password" placeholder= "*****" minlength="5">
                    <input type="text" name="newconf_password" id="conf_password" placeholder="*****" minlength="5">
                    <?php if(($_POST['newpassword']) && ($_POST['newconf_password']) && (($_POST['newpassword']) == ($_POST['newconf_password']))) 
                    {echo "<p>Vous avez bien changé votre mot de passe en ".$_POST['newpassword']."</p>"; }?>
                    </select>
                    <input class="submit" type="submit" value="Modifier">
                    <i class="small">* Mofidier le champs que vous voulez changer, un seul champs à la fois.</i>
                </form>
            </section>
        </div>
    </div>


    <?php
     if ($_POST['newlogin']){
        echo "Changement de login";
        $changelogin=$_POST['newlogin'];
        $sqllogin = "update utilisateurs set login = '$changelogin' where login = '$newlogin'";
        $rs = mysqli_query($mysqli,$sqllogin);
    }elseif (($_POST['newpassword']) && ($_POST['newconf_password']) && (($_POST['newpassword']) == ($_POST['newconf_password'])) ){
        echo "Changement de MP";
        $newpassword=$_POST['newpassword'];
        $newsecurepassword = password_hash($newpassword, PASSWORD_DEFAULT);
        $sqlpassword = "update utilisateurs set password = '$newsecurepassword' where login = '$newlogin'";
        $rs = mysqli_query($mysqli,$sqlpassword); 
    }
    ?> 
    
    
                <?php 
                    echo "<h2>Hello ".$_SESSION['login']." !</h2>";
                    echo "<br>";
                    //echo var_dump($_SESSION);
                    echo "<br>";

                    // ----$_session pour afficher diff données-----
                    $newlogin=$_SESSION['login'];
                    $request=$mysqli->query("SELECT * FROM utilisateurs where login = '$newlogin'");
                    $result=$request->fetch_all();
                    
                    echo "<br>".var_dump($result);
                    
                    //pour voir ce qu'il y a dans le tableau
                    echo "Login: ".$result[0][1]."<br>";
                    echo "Mot de passe crypté: ".$result[0][2]."<br>";
                    echo "Mot de passe en clair : ".$_SESSION['password'];
                    echo"<br>";

                    //pour avoir version nom cripté du mot de passe
                    password_verify($password_post, $password_hash);

                    ?>

        

    </main>
</body>