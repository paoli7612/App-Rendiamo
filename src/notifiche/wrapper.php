<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../account/">Account</a>
    </li>
    <li class="breadcrumb-item active">Notifiche</li>
  </ol>

  <?php $notifiche = query("SELECT *
                            FROM notifiche
                            WHERE idUtente=".$_SESSION['user_row']['id']." ORDER BY data DESC");?>

  <div class="container">
    <div class="row">
      <?php foreach ($notifiche as $notifica): ?>
        <div class="col-12 mb-3" id="<?php echo $notifica['id'] ?>">
          <div class="card">
            <div class="card-header">
              <?php
                  $phpdate = strtotime( $notifica['data'] );
                  $notifica['data'] = date('d/m H:i', $phpdate );
              ?>
              <?php echo $notifica['data'] ?>
            </div>
            <div class="card-body">
              <?php echo $notifica['testo'] ?>
            </div>
            <div class="card-footer">
              <button class="btn btn-secondary" onclick="ignora(<?php echo $notifica['id'] ?>)">Ignora</button>
              <?php if ($notifica['link']): ?>
                <button class="btn btn-primary" onclick="window.location='<?php echo $notifica['link'] ?>'">Visualizza</button>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="col-12" <?php if ($notifiche): ?> style="display: none" <?php endif; ?> id="noNotifiche">
        <div class="card">
          <div class="card-body">
            Nessuna nuova notifica
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
