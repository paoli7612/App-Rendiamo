<?php
    include '../_database/connection.php';

    $materia = $_GET['materia'];
    $lezioni = getLezioniSearch($materia);
    echo json_encode($lezioni);
?>
