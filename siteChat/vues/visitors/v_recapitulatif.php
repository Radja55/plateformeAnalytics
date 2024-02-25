<!-- vues/visitors/v_recapitulatif.php -->
<main>
    <h1>Récapitulatif des Visites</h1>
    <div class="summary-container">
        <div class="summary">
            <p>Nombre de visites : <?php echo $visitorSummary['visits']; ?></p>
            <p>Nombre de visiteurs uniques : <?php echo $visitorSummary['uniqueVisitors']; ?></p>
            <p>Durée moyenne d'une visite : <?php echo gmdate("H:i:s", $visitorSummary['avgVisitDuration']); ?></p>
            <p>Taux de rebond : <?php echo $visitorSummary['bounceRate']; ?>%</p>
            <p>Actions par visite : <?php echo $visitorSummary['actionsPerVisit']; ?></p>
            <p>Nombre maximum d'actions en une visite : <?php echo $visitorSummary['maxActions']; ?></p>
        </div>
    </div>
</main>