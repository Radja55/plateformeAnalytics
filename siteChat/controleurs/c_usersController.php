<?php
// U_UsersController.php
require_once "./model/UserModel.php";

class UsersController {
    public function createUser() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $permissions = $_POST["permissions"];

            // Créer un nouvel utilisateur dans la base de données
            $userModel = new UserModel();
            $userModel->createUser($nom, $prenom, $username, $password, $permissions);
        }
    }

    public function listUsers() {
        $userModel = new UserModel();
        $userListe = $userModel->getUsers();
        include "./vues/users/U_permissionUser.php";
    }

    public function updatePermissions() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $userModel = new UserModel();
            foreach ($_POST['permissions'] as $permissionType => $permissionData) {
                foreach ($permissionData as $userId => $permissionValue) {
                    $permissions = [
                        'recapitulatif' => isset($_POST['permissions']['recapitulatif'][$userId]) ? 1 : 0,
                        'journalDesVisites' => isset($_POST['permissions']['journalDesVisites'][$userId]) ? 1 : 0,
                        'enTempsReel' => isset($_POST['permissions']['enTempsReel'][$userId]) ? 1 : 0,
                        'geolocalisation' => isset($_POST['permissions']['geolocalisation'][$userId]) ? 1 : 0,
                        'provenances' => isset($_POST['permissions']['provenances'][$userId]) ? 1 : 0,
                        'peripherique' => isset($_POST['permissions']['peripherique'][$userId]) ? 1 : 0,
                        'logiciel' => isset($_POST['permissions']['logiciel'][$userId]) ? 1 : 0,
                        'horaires' => isset($_POST['permissions']['horaires'][$userId]) ? 1 : 0,
                    ];
                    // Utilisez var_dump() pour afficher les valeurs des permissions
                    
                    // Mettre à jour les autorisations dans la base de données
                    $userModel->updatePermissions($userId, $permissions);
                }
            }
        }
    }

    public function deleteUser($userId) {
        $userModel = new UserModel();
        $userModel->deleteUser($userId);
    }
}
?>