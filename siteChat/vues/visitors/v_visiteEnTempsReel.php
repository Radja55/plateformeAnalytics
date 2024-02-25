<!-- vues/visitors/v_visiteEnTempsReel.php -->
<main>
    <h1>Visites en temps-réel</h1>
    <div class="table-container">
        <?php
        $espace= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        $espace2= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        foreach ($visits as $visit) {
            echo "<div class='visit'>";
            echo "<p>Date et heure de la visite: ". $espace.$espace2.$espace2.           $visit['datetime'] . "</p>";
            echo "<p>Pays du visiteur: " . $espace. $espace.$espace2.$espace2.                   $visit['country'] . "</p>";
            echo "<p>Type de visiteur: " . $espace.$espace2.$espace2.$espace2.                     $visit['visitor_type'] . " (" . $visit['visit_count'] . " visites)</p>";
            echo "<p>Navigateur: " .$espace. $espace. $espace.                          $visit['browser'] . "</p>";
            echo "<p>Système d'exploitation: " .$espace. $espace.$espace2.                $visit['os'] . "</p>";
            echo "<p>Type de périphérique: " .$espace.$espace.$espace2.                $visit['device_type'] . "</p>";
            echo "<p>Actions effectuées: " . $espace.$espace.$espace2.$espace2.                   $visit['actions'] . "</p>";
            echo "<p>Action URL: <a href='" .$espace.$espace.                 $visit['action_url'] . "' target='_blank'>" . $visit['action_url'] . "</a></p></br>";
            echo "</div>";
        }
        ?>
    </div>
</main>