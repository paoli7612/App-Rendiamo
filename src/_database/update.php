<?php
  // UTENTE

  function editPasswordIdUtente($id, $nuovaPassword){
    $sql = "UPDATE utenti
    SET password=SHA('$nuovaPassword')
    WHERE id=$id;";
    return query($sql, 'vuoto');
  }

?>
