<!-- vues/layout/sidebar.php -->
<aside>
    <h2>Menu</h2>
    <ul>
        <?php 
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Vérifier si l'utilisateur est connecté
        if (isset($_SESSION["user"])) {
            // Récupérer les autorisations de l'utilisateur depuis la session
            $userPermissions = $_SESSION['userPermissions'];
            ?>
            <li><a href="index.php?url=dashboard">Tableau de bord</a></li>
            <?php if ($userPermissions['acces_visiteurs'] == 1) : ?>
                <li class="has-submenu">
                    <a href="#" class="submenu-link">Visiteurs</a>
                    <ul class="sub-menu-hidden" style="display: none;">
                        <?php if ($userPermissions['recapitulatif'] == 1) : ?>
                            <li><a href="index.php?url=visitors/visitorSummary" class="item">Récapitulatif</a></li>
                        <?php endif; ?>
                        <?php if ($userPermissions['journalDesVisites'] == 1) : ?>
                            <li><a href="index.php?url=visitors/visitorLog" class="item">Journal des visites</a></li>
                        <?php endif; ?>
                        <?php if ($userPermissions['enTempsReel'] == 1) : ?>
                            <li><a href="index.php?url=visitors/realtimeMap" class="item">En temps réel</a></li>
                        <?php endif; ?>
                        <?php if ($userPermissions['geolocalisation'] == 1) : ?>
                            <li><a href="index.php?url=visitors/geographicalProvenance" class="item">Carte en temps réel</a></li>
                        <?php endif; ?>
                        <?php if ($userPermissions['peripherique'] == 1) : ?>
                            <li><a href="index.php?url=visitors/devices" class="item">Périphériques</a></li>
                        <?php endif; ?>
                        <?php if ($userPermissions['logiciel'] == 1) : ?>
                            <li><a href="index.php?url=visitors/software" class="item">Logiciel</a></li>
                        <?php endif; ?>
                        <?php if ($userPermissions['horaires'] == 1) : ?>
                            <li><a href="index.php?url=visitors/visitTimes" class="item">Horaires</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($userPermissions['acces_comportement'] == 1) : ?>
                <li><a href="index.php?url=behavior">Comportement</a></li>
            <?php endif; ?>
            <?php if ($_SESSION["user"] === "radja") : ?>
                <li><a href="gestionUser.php">Utilisateurs</a></li>
            <?php endif; ?>
            <li><a href="./controleurs/c_deconnexion.php">Déconnexion</a></li>
        <?php 
        } else {
            // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
            header("Location: index.php");
            exit;
        } ?>
    </ul>
    <script src="./js/sidebar.js"></script>
</aside>
