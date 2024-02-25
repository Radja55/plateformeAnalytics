<?php
// logout.php
session_start();
session_destroy(); // Détruit toutes les données de session
header('Location:../index.php'); // Redirige vers la page d'accueil ou une autre page après la déconnexion
exit();
?>