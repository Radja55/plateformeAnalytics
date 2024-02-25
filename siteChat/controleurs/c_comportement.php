<?php
// B_BehaviorController.php
class BehaviorController {
    public function index() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }

        // Si un utilisateur est connecté, afficher les informations sur le comportement des visiteurs
        include "./vues/behavior/B_index.php";
    }
}
?>