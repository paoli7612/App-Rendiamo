<?php

  function delLezioneId($id){
    return query("DELETE FROM lezioni WHERE id=$id;","vuoto");
  }

?>
