<?php if ($_SESSION['user_row']['aiuti']): ?>
  <div class="col-xl-4 col-sm-12 mb-3">
    <div class="card">
      <div class="card-header">
        Aiuto
        <a href="#" class="float-right">
          <i class="fas fa-question-circle"></i>
        </a>
      </div>
      <div class="card-body">
        Questo è il tuo account.
        <ul>
          <li><b>Impostazioni</b>: effettua delle modifiche al tuo account. Da qualsiasi dispositivo farai l'accesso</li>
          <li><b>Docenti salvati</b>: visualizza tutti i docenti che hai salvato</li>
          <li><b>Lezioni salvate</b>: visualizza tutte le lezioni che hai salvato</li>
          <li><b>Disconnetti</b>: Effettua la disconnessione del account attualmente collegato</li>
        </ul>
      </div>
    </div>
  </div>
<?php endif; ?>
