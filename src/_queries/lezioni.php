<?php
    include '../_database/connection.php';

    $search = $_GET['search'];
    $materia = $_GET['materia'];
    $materie = getLezioniSearchMateria($search,$materia);
    echo json_encode($materie);
?>
