<?php
// AnalyticsModel.php
class AnalyticsModel {
    
    public function fetchVisitorSummary() {
        // Méthode pour récupérer le récapitulatif des visiteurs
        // Simulation de la récupération des données de récapitulatif des visiteurs depuis une API
        // Dans cet exemple, nous allons simplement générer des données aléatoires pour simuler les résultats
        
        // Génération de données aléatoires
        $visits = rand(100, 1000);
        $uniqueVisitors = rand(50, 500);
        $avgVisitDuration = rand(120, 600); // En secondes
        $bounceRate = round(rand(0, 100), 2); // En pourcentage
        $actionsPerVisit = rand(1, 5);
        $maxActions = rand(1, 10);
        
        // Retour des données simulées
        return [
            'visits' => $visits,
            'uniqueVisitors' => $uniqueVisitors,
            'avgVisitDuration' => $avgVisitDuration,
            'bounceRate' => $bounceRate,
            'actionsPerVisit' => $actionsPerVisit,
            'maxActions' => $maxActions
        ];
    }

    public function fetchVisitorLog() {
        // Simulation de la récupération des données des visiteurs via une API (remplacé par de fausses données ici)
        $visitorLogs = [
            [
                'date' => '2024-02-06',
                'time' => '07:11:02',
                'ip' => '127.0.0.1',
                'country' => 'France',
                'profile' => 'Returning Visitor (7 visits)',
                'browser' => 'Chrome 121.0',
                'os' => 'Windows 11',
                'device' => 'Desktop',
                'actions' => [
                    ['page' => '/', 'action' => 'Page View'],
                    ['page' => '/product', 'action' => 'Product View'],
                    // Autres actions
                ]
            ],
            [
                'date' => '2024-02-05',
                'time' => '06:35:55',
                'ip' => '192.168.0.1',
                'country' => 'United States',
                'profile' => 'New Visitor',
                'browser' => 'Firefox 122.0',
                'os' => 'Windows 10',
                'device' => 'Mobile',
                'actions' => [
                    ['page' => '/', 'action' => 'Page View'],
                    // Autres actions
                ]
            ],
            // Autres entrées de journal des visites
        ];

        return $visitorLogs;
    }


    public function fetchRealtimeVisits() {
        // Simuler la récupération des visites en temps réel depuis une API (données fictives)
        $visits = array(
            array(
                "datetime" => "Mercredi 21 février - 06:42:40",
                "country" => "France",
                "visitor_type" => "Visiteur de retour",
                "visit_count" => "2",
                "browser" => "Chrome 121.0",
                "os" => "Windows 11",
                "device_type" => "Bureau",
                "actions" => "1",
                "action_url" => "http://localhost/wordpressMatomo/"
            ),
            array(
                "datetime" => "Mercredi 21 février - 06:42:12",
                "country" => "France",
                "visitor_type" => "Visiteur de retour",
                "visit_count" => "9",
                "browser" => "Chrome 121.0",
                "os" => "Windows 11",
                "device_type" => "Bureau",
                "actions" => "1",
                "action_url" => "http://127.0.0.1/wordpressMatomo/wp-admin/wp-json/matomo/v1/api/processed_report?period=yesterday&amp;date=day&amp;filter_limit=10&amp;apiModule=Actions&amp;apiAction=getPageUrls"
            )
        );

        return $visits;
    }
    public function fetchRealtimeMap() {
        // Méthode pour récupérer la carte en temps réel
    }

    public function fetchGeographicalProvenance() {
        // Méthode pour récupérer les provenances géographiques
    }

    public function fetchDevices() {
        // Méthode pour récupérer les périphériques utilisés
    }

    public function fetchSoftware() {
        // Méthode pour récupérer les logiciels utilisés
    }

    public function fetchVisitTimes() {
        // Méthode pour récupérer les horaires de visite
    }

    
    public function getChartData()
    {
        // Données en dur pour le graphique
        $chartData = [
            'labels' => ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
            'datasets' => [
                [
                    'label' => 'Nombre de visites',
                    'data' => [120, 155, 180, 150, 200, 220,50],
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1
                    
                ]
            ]
        ];

        return $chartData;
    }
}
?>