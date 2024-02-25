<!-- vues/users/U_permissionUser.php -->
<main>
    <h1>Liste des Utilisateurs</h1>
    <style>
        /* Styles CSS pour le tableau */
        .table-wrapper {
            max-height: 400px; /* ajustez la hauteur maximale selon vos besoins */
            overflow-y: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 2px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <div class="table-wrapper">
        <form action="permissionUser.php" method="post">
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Nom d'utilisateur</th>
                    <th>Accès Récapitulatif</th>
                    <th>Accès Journal des visites</th>
                    <th>Accès En temps réel</th>
                    <th>Accès Géolocalisation</th>
                    <th>Accès Provenances géographiques</th>
                    <th>Accès Périphérique</th>
                    <th>Accès Logiciel</th>
                    <th>Accès Horaires</th>
                    <th>Supprimer</th>
                </tr>
                <?php foreach ($userListe as $user) : ?>
                    <tr>
                        <td><?php echo $user['nom']; ?></td>
                        <td><?php echo $user['prenom']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><input type="checkbox" name="permissions[recapitulatif][<?php echo $user['id']; ?>]" value="1" <?php echo $user['recapitulatif'] ? 'checked' : ''; ?>></td>
                        <td><input type="checkbox" name="permissions[journalDesVisites][<?php echo $user['id']; ?>]" value="1" <?php echo $user['journalDesVisites'] ? 'checked' : ''; ?>></td>
                        <td><input type="checkbox" name="permissions[enTempsReel][<?php echo $user['id']; ?>]" value="1" <?php echo $user['enTempsReel'] ? 'checked' : ''; ?>></td>
                        <td><input type="checkbox" name="permissions[geolocalisation][<?php echo $user['id']; ?>]" value="1" <?php echo $user['geolocalisation'] ? 'checked' : ''; ?>></td>
                        <td><input type="checkbox" name="permissions[provenances][<?php echo $user['id']; ?>]" value="1" <?php echo $user['provenances'] ? 'checked' : ''; ?>></td>
                        <td><input type="checkbox" name="permissions[peripherique][<?php echo $user['id']; ?>]" value="1" <?php echo $user['peripherique'] ? 'checked' : ''; ?>></td>
                        <td><input type="checkbox" name="permissions[logiciel][<?php echo $user['id']; ?>]" value="1" <?php echo $user['logiciel'] ? 'checked' : ''; ?>></td>
                        <td><input type="checkbox" name="permissions[horaires][<?php echo $user['id']; ?>]" value="1" <?php echo $user['horaires'] ? 'checked' : ''; ?>></td>
                        <td>
                            <button type="button" onclick="confirmDelete(<?php echo $user['id']; ?>)">Supprimer</button>
                            <a href="permissionUser.php?action=delete&id=<?php echo $user['id']; ?>" id="delete_<?php echo $user['id']; ?>" style="display: none;"></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <button type="submit">Enregistrer</button>
        </form>
    </div>
    <script>
        // Fonction de confirmation pour la suppression d'un utilisateur
        function confirmDelete(userId) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?")) {
                // Récupérer l'élément ancre correspondant à la suppression de cet utilisateur
                var deleteAnchor = document.getElementById('delete_' + userId);
                // Si l'élément ancre existe
                if (deleteAnchor) {
                    // Suivre le lien pour supprimer l'utilisateur
                    window.location.href = deleteAnchor.href;
                }
            }
        }
    </script>
</main>