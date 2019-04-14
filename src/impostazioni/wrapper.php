<div id="wrapper">

  <?php $title="impostazioni" ?>
  <?php include '../wrapper_head.php' ?>

  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../account/">Account</a>
        </li>
        <li class="breadcrumb-item active">Impostazioni</li>
      </ol>
      <div class="row">
        <div class="col-xl-4 col-md-6 col-sm-12 mb-3">
          <div class="card">
            <div class="card-header">
              Aiuti
              <a class="float-right">
                <i class="fas fa-question-circle"></i>
              </a>
            </div>
            <div class="card-body">
                Gli <b>aiuti</b> sono delle piccole finestre che appaiono tra le pagine del sito e ti aiutano ad utilizzare al meglio le funzionalità presenti
            </div>
            <div class="card-footer">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="aiuti" checked="checked">
                <label class="custom-control-label" for="aiuti" >Mostra aiuti</label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 col-sm-12 mb-3">
          <div class="card">
            <div class="card-header">
              Notifiche
              <a class="float-right">
                <i class="fas fa-bell"></i>
              </a>
            </div>
            <div class="card-body">
                Le <b>Notifiche</b> ti informano di alcuni eventi che avvengono.
            </div>
            <div class="card-footer">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="notifiche" checked="checked">
                <label class="custom-control-label" for="notifiche" >Mostra aiuti</label>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
