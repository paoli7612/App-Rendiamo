<?php
  // LEZIONE

  function delLezioneId($idLezione){
    $sql = "DELETE FROM lezioni
      WHERE lezioni.id=$idLezione";
    return query($sql, 'vuoto');
  }

?>
