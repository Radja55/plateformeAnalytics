<?php
// c_tableauBord.php
require_once "./model/AnalyticsModel.php";
class tableauBordController {
    public function index() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }

        $visitsModel = new AnalyticsModel();
        $chartData = $visitsModel->getChartData();
        // Si un utilisateur est connecté, afficher le tableau de bord
        include "./vues/dashboard/v_index.php";
    }
}
?>