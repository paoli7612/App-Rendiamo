<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      Docenti
    </li>
  </ol>

  <?php $docenti = query("SELECT utenti.*, COUNT(lezioni.id) AS count
                          FROM utenti, lezioni
                          WHERE lezioni.idUtente=utenti.id
                          GROUP BY utenti.id") ?>

  <div class="container">
    <div class="form-group">
      <div class="form-label-group">
        <input name="password" type="text" class="form-control" placeholder="Filtra" onkeyup="filtraDocenti(this.value)">
        <script>
          var filtraDocenti = function(text){
            var docenti = document.getElementsByName('docente');
            for (var i=0; i<docenti.length; i++){
              var t = docenti[i].getAttribute('search');
              if (t.toUpperCase().indexOf(text.toUpperCase()) == -1){
                docenti[i].style['display'] = 'none';
              } else {
                docenti[i].style['display'] = '';
              }
            }
          }
        </script>
      </div>
    </div>
  </div>

  <div class="row">
    <?php foreach ($docenti as $docente): ?>
      <div class="col-xl-6 col-sm-6 mb-3" name="docente" search="<?php echo $docente['nome']. " " .$docente['cognome']?>">
        <button class="btn btn-block btn-danger h-100 p-3 mb-3" onclick="window.location='../lezioni/?docente=<?php echo $docente['id'] ?>'">
          <div class="float-right">
            <i class="fa-lg fas fa-user"></i>
          </div>
          <div class="float-left">
            <?php echo $docente['nome']. " " .$docente['cognome']?>
            (<?php echo $docente['count'] ?>)
          </div>
        </button>
  		</div>
    <?php endforeach; ?>
  </div>
</div>
