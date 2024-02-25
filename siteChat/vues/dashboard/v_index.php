<!-- vues/dashboard/D_index.php -->
<main>
    <section style="position: relative;text-align: center;">
        <div style="position: absolute; top: 150%; left: 20%; width: 50%;">
            <canvas id="myChart"></canvas>
        </div>
        <h2 style="margin-top: 20px;">Graphique des dernières visites</h2>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Récupérer les données du contrôleur
    var chartData = <?php echo json_encode($chartData); ?>;

    // Créer le graphique
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: chartData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script> 