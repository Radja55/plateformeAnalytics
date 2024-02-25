<?php
// P_visitors.php
include "./vues/layout/v_header.php";
include "./vues/layout/sidebar.php";
include "./controleurs/c_visiteurs.php";

$visitorsController = new VisitorsController();
$visitorsController->index();

include "./vues/layout/v_footer.php";
?>