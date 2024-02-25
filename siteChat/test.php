<?php
// Inclusion du fichier contenant la définition de la classe UserModel
require_once "./model/UserModel.php";
require_once "./controleurs/c_usersController.php";

// U_UsersController.php



// Création d'une instance de UsersController
$usersController = new UsersController();

// Appel de la méthode listUsers() pour obtenir la liste des utilisateurs
$userListe = $usersController->listUsers();

// Affichage de la liste des utilisateurs (optionnel)
var_dump($userListe);
?>