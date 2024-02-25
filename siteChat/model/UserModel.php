<?php

// UserModel.php
class UserModel {
    //methode creatUser
    public function createUser($nom,$prenom,$username, $password,$permissions) {
        // Connexion à la base de données (simulation)
        $conn = new mysqli('localhost', 'root', '', 'wordpressmatomo');

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prévenir les injections SQL
        $username = $conn->real_escape_string($username);
        $password_hash = hash('sha256', $conn->real_escape_string($password));
        $nom = $conn->real_escape_string($nom);
        $prenom = $conn->real_escape_string($prenom);

        // Valeurs par défaut pour les cases à cocher
        // $pagesVisites = $pagesVisites ? 1 : 0;
        // $comportement = $comportement ? 1 : 0;
        // $tableauBord = $tableauBord ? 1 : 0;

        // Créer un nouvel utilisateur dans la base de données
        $stmt = $conn->prepare("INSERT INTO usersiteanalyse (nom, prenom, username, password_hash, recapitulatif, journalDesVisites, enTempsReel, geolocalisation, provenances, peripherique, logiciel, horaires) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiiiiiiii", $nom, $prenom, $username, $password_hash, $permissions['recapitulatif'], $permissions['journalDesVisites'], $permissions['enTempsReel'], $permissions['geolocalisation'], $permissions['provenances'], $permissions['peripherique'], $permissions['logiciel'], $permissions['horaires']);
        if ($stmt->execute()) {
            echo '<span style="color: green; font-weight: bold;">Utilisateur créé avec succès.</span>';
        } else {
            echo "Erreur lors de la création de l'utilisateur: " . $conn->error;
        }

        $conn->close();
    }

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

    //methode getUsers pour afficher et modifier les utilisateur
    public function getUsers() {
        // Connexion à la base de données 
        $conn = new mysqli('localhost', 'root', '', 'wordpressmatomo');

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Récupérer la liste des utilisateurs et des pageAnalytics depuis la base de données
        $sql = "SELECT * FROM usersiteanalyse WHERE username != 'radja'";
        $result = $conn->query($sql);

        // Stocker les utilisateurs dans un tableau
        $users = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }

        // Fermer la connexion à la base de données
        $conn->close();

        return $users;
    }
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: 
    // Méthode pour mettre à jour les autorisations d'un utilisateur
    public function updatePermissions($userId, $permissions) {
        $conn = new mysqli('localhost', 'root', '', 'wordpressmatomo');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("UPDATE usersiteanalyse SET recapitulatif=?, journalDesVisites=?, enTempsReel=?, geolocalisation=?, provenances=?, peripherique=?, logiciel=?, horaires=? WHERE id=?");
        $stmt->bind_param("iiiiiiiii", $permissions['recapitulatif'], $permissions['journalDesVisites'], $permissions['enTempsReel'], $permissions['geolocalisation'], $permissions['provenances'], $permissions['peripherique'], $permissions['logiciel'], $permissions['horaires'], $userId);

        $successMessageDisplayed = false;
        if ($stmt->execute()) {
            if (!$successMessageDisplayed) {
                echo '<span style="color: green; font-weight: bold;">Autorisations mises à jour avec succès.</span>';
                $successMessageDisplayed = true;
            }
        } else {
            echo "Erreur lors de la mise à jour des autorisations: " . $conn->error;
        }
        $conn->close();
    }

    // Méthode pour supprimer un utilisateur
    public function deleteUser($userId) {
        $conn = new mysqli('localhost', 'root', '', 'wordpressmatomo');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("DELETE FROM usersiteanalyse WHERE id=?");
        $stmt->bind_param("i", $userId);

        if ($stmt->execute()) {
            echo '<span style="color: green; font-weight: bold;">Utilisateur supprimé avec succès.</span>';
        } else {
            echo "Erreur lors de la suppression de l'utilisateur: " . $conn->error;
        }

        $conn->close();
    }
}

?>