<?php
    include '../_database/connection.php';

    $search = $_GET['search'];
    $lezioni = getLezioniSearchMateria($search,$_GET['materia']);
    echo json_encode($lezioni);
    $lezioni = getLezioniSearchEtichetta($search, $_GET['etichetta']);
    echo json_encode($lezioni);
?>
