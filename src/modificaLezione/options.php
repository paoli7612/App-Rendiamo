<div class="w3-panel">
  <div class="w3-panel w3-half">
    <table class="w3-table w3-table-all w3-card-4">
      <tr class="w3-hover-blue" onclick="window.location='statistiche.php?id=4'">
        <td class="w3-center"><i class="fas fa-file-upload"></i></td>
        <td>Aggiungi materiali</td>
      </tr>
      <tr class="w3-hover-blue">
        <td class="w3-center"><i class="fas fa-edit"></i></td>
        <td>Modifica etichette</td>
      </tr>
      <tr class="w3-hover-blue" onclick="window.location='../eliminaLezione/?id=<?php echo $lezione->id ?>&conferma=0'">
        <td class="w3-center"><i class="fas fa-trash"></i></td>
        <td>Elimina lezione</td>
      </tr>
    </table>
  </div>
</div>
