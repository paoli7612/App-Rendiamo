<div class="container-fluid">

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../home/">Home</a>
    </li>
    <li class="breadcrumb-item">
      Ricerca per materia
    </li>
  </ol>

  <?php $materie = query("SELECT materie.*, count(materieDiLezioni.id) AS count
                          FROM materie, materieDiLezioni
                          WHERE materie.id=materieDiLezioni.idMateria
                          GROUP BY materie.id
                          ORDER BY materie.titolo");?>

  <div class="container">
    <div class="form-group">
      <div class="form-label-group">
        <input name="password" type="text" class="form-control" placeholder="Filtra" onkeyup="filtraMaterie(this.value)">
        <script>
          var filtraMaterie = function(text){
            var docenti = document.getElementsByName('materia');
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
    <?php foreach ($materie as $materia): ?>
      <div class="col-xl-4 col-md-6 col-sm-12 mb-3" name="materia" search="<?php echo $materia['titolo'] ?>">
        <button class="btn btn-block btn-primary h-100 p-3 mb-3" onclick="window.location='../lezioni/?materia=<?php echo $materia['id'] ?>'">
          <div class="float-right">
            <i class="fa-lg fas fa-swatchbook"></i>
          </div>
          <div class="float-left">
            <?php echo $materia['titolo']?>
            <span class="badge badge-light">
              <?php echo $materia['count']?>
            </span>
          </div>
        </button>
      </div>
    <?php endforeach; ?>
  </div>
</div>
