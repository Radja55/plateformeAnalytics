<?php
// P_login.php
include "./vues/layout/v_header.php";
include "./controleurs/c_authentification.php";

$authController = new AuthController();
$authController->login();

include "./vues/layout/v_footer.php";
?>