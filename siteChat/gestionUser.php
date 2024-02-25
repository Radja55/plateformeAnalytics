<?php
// P_users.php
include "./vues/layout/v_header.php";
include "./vues/layout/sidebar.php";

if ($_SESSION['user'] != 'radja') {
    header("Location: ../index.php");
    exit;
}

// Logique pour afficher et gérer les utilisateurs
include "./vues/users/U_gestionUser.php";

include "./vues/layout/v_footer.php";
?>