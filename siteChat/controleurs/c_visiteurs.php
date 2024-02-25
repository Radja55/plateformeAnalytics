<?php
// c_visiteur.php
require_once './model/AnalyticsModel.php';

class VisitorsController {
    public function index() {
        // Vérifier si l'utilisateur est connecté
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION["user_id"])) {
            // Rediriger vers la page de connexion
            header("Location: index.php");
            exit;
        }

        // Afficher la vue des visiteurs
        include "./vues/visitors/V_index.php";
    }

    public function visitorSummary() {
        $analyticsModel = new AnalyticsModel();
        $visitorSummary = $analyticsModel->fetchVisitorSummary();
        // Charger la vue correspondante
        include "./vues/visitors/v_recapitulatif.php";
    }
    
    public function visitorLog() {
        $analyticsModel = new AnalyticsModel();
        $visitorLogs = $analyticsModel->fetchVisitorLog();
        // Charger la vue correspondante
        include "./vues/visitors/v_journalVisites.php";
    }

    public function realtimeMap() {
        $analyticsModel = new AnalyticsModel();
        $visits = $analyticsModel->fetchRealtimeVisits();
        // Charger la vue correspondante
        include "./vues/visitors/v_visiteEnTempsReel.php";
    }

    public function geographicalProvenance() {
        $analyticsModel = new AnalyticsModel();
        $geographicalProvenanceData = $analyticsModel->fetchGeographicalProvenance();
        // Charger la vue correspondante
    }

    public function devices() {
        $analyticsModel = new AnalyticsModel();
        $devicesData = $analyticsModel->fetchDevices();
        // Charger la vue correspondante
    }

    public function software() {
        $analyticsModel = new AnalyticsModel();
        $softwareData = $analyticsModel->fetchSoftware();
        // Charger la vue correspondante
    }

    public function visitTimes() {
        $analyticsModel = new AnalyticsModel();
        $visitTimesData = $analyticsModel->fetchVisitTimes();
        // Charger la vue correspondante
    }
}
?> 