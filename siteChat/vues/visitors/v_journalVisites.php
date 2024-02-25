<!-- vues/visitors/v_journalVisites.php -->
<main>
    <div class="main-content">
    <h1>Journal des visites</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>IP</th>
                        <th>Pays</th>
                        <th>Profil</th>
                        <th>Navigateur</th>
                        <th>Système d'exploitation</th>
                        <th>Périphérique</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($visitorLogs as $log) {
                        echo "<tr>";
                        echo "<td>{$log['date']}</td>";
                        echo "<td>{$log['time']}</td>";
                        echo "<td>{$log['ip']}</td>";
                        echo "<td>{$log['country']}</td>";
                        echo "<td>{$log['profile']}</td>";
                        echo "<td>{$log['browser']}</td>";
                        echo "<td>{$log['os']}</td>";
                        echo "<td>{$log['device']}</td>";
                        echo "<td>";
                        foreach ($log['actions'] as $action) {
                            echo "{$action['action']} on {$action['page']}<br>";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>