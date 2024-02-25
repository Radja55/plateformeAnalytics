<?php
// permissionUsers.php
include "./vues/layout/v_header.php";
include "./vues/layout/sidebar.php";
require_once "./model/UserModel.php";
require_once "./controleurs/c_usersController.php";
if ($_SESSION['user'] != 'radja') {
    header("Location: ../index.php");
    exit;
}

// Création d'une instance de UsersController
$usersController = new UsersController();

// Appel de la méthode listUsers() pour obtenir la liste des utilisateurs
$userListe = $usersController->listUsers();
// Logique pour afficher et gérer les utilisateurs

// Appel de la méthode updatePermissions() pour mettre à jour les autorisations des utilisateurs
$usersController->updatePermissions();

// Appel de la méthode deleUser() pour un utilisateurs
// Traitement de la suppression des utilisateurs
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $userId = $_GET['id'];
    $usersController->deleteUser($userId);
    // Rediriger ou afficher un message de confirmation après la suppression
}
include "./vues/layout/v_footer.php";
?>

