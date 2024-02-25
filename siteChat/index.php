<?php
// index.php (routeur centralisé)
include "./vues/layout/v_header.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user'])) {
    include "./vues/layout/sidebar.php";
}
// Analyse de l'URL demandée
$url = isset($_GET['url']) ? $_GET['url'] : 'login';
$route = explode('/', $url);

// Choix du contrôleur en fonction de la route spécifiée
switch ($route[0]) {
    case 'dashboard':
        include 'controleurs/c_tableauBord.php';
        $controller = new tableauBordController();
        $controller->index();
        break;
    case 'visitors':
        include 'controleurs/c_visiteurs.php';
        $controller = new VisitorsController();
        // Choix  de la route pour les pages visiteurs.
        switch ($route[1]) {
            case 'visitorSummary':
                $controller->visitorSummary();
                break;
            case 'visitorLog':
                $controller->visitorLog();
                break;
            case 'realtimeMap':
                $controller->realtimeMap();
                break;
            case 'geographicalProvenance':
                $controller->geographicalProvenance();
                break;
            case 'devices':
                $controller->devices();
                break;
            case 'software':
                $controller->software();
                break;
            case 'visitTimes':
                $controller->visitTimes();
                break;
            default:
                $controller->index();
                break;
        }
        break;
        //Fin des Choix  de la route pour les pages visiteurs.
        //---------------------------------------------------------
    case 'behavior':
        include 'controleurs/c_comportement.php';
        $controller = new BehaviorController();
        $controller->index();
        break;
    case 'users':
        include 'controleurs/c_usersController.php';
        $controller = new UsersController();
        $controller->createUser();
        break;
    case 'login':
    default:
        include 'vues/auth/A_login.php';
        include 'controleurs/c_authentification.php';
        $controller = new AuthController();
        $controller->login();
        break;
}

include "./vues/layout/v_footer.php";
?>
