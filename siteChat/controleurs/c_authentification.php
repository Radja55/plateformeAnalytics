<?php
// c_authentification.php
class AuthController {
    public function login() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Vérifier si l'utilisateur est déjà connecté
        if (isset($_SESSION['user'])&& !isset($_POST['username'])) {
            header("Location: index.php?url=dashboard");
            exit;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Hacher le mot de passe 
            $hashPassword = hash('sha256', $password);
            
            // Connexion à la base de données
            $conn = new mysqli('localhost', 'root', '', 'wordpressmatomo');

            // Vérifier la connexion
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prévenir les injections SQL
            $stmt = $conn->prepare("SELECT * FROM usersiteanalyse WHERE username=? AND password_hash=?");
            $stmt->bind_param("ss", $username, $hashPassword);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                // Récupérer l'utilisateur depuis la base de données
                $userData = $result->fetch_assoc();
                // Récupérer les autorisations de l'utilisateur depuis la base de données
                $userPermissions = $this->PermissionsPages($userData['id']);

                if ($userPermissions && array_sum($userPermissions) > 0) {
                    // L'utilisateur a des autorisations sur au moins une page
                    $_SESSION['userPermissions'] = $userPermissions;
                    $_SESSION['user'] = $username;
                    header("Location: index.php?url=dashboard");
                    exit;
                } else {
                    // L'utilisateur n'a aucune autorisation pour accéder à l'application
                    echo '<p style="color: red;">Vous n\'avez aucune autorisation pour accéder à l\'application.</p>';
                }
            } else {
                echo '<p style="color: red;">Nom d\'utilisateur ou mot de passe incorrect.</p>';
            }
            $conn->close();
        }
    }
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
/////        Methode pour la permision des pages
    public function PermissionsPages($userId) {
        // Connexion à la base de données
        $conn = new mysqli('localhost', 'root', '', 'wordpressmatomo');
    
        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        // Prévenir les injections SQL
        $stmt = $conn->prepare("SELECT acces_tableaubord, acces_visiteurs, acces_comportement,recapitulatif, journalDesVisites, enTempsReel, geolocalisation, provenances, peripherique, logiciel, horaires FROM usersiteanalyse WHERE id=?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Récupérer les autorisations de l'utilisateur
        if ($result->num_rows == 1) {
            $permissions = $result->fetch_assoc();
            $conn->close(); // Fermer la connexion ici
            return $permissions;
        } else {
            $conn->close(); // Fermer la connexion ici
            return false;
        }
    }
}
?>