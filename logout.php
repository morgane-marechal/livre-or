<?php
session_start();
session_destroy();
echo 'Vous avez été déconnecté de votre session. <a href="index.php">Accueil</a>';
?>