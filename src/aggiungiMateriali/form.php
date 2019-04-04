<div class="container">
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <div class="form-label-group">
        <button type="button" class="btn btn-secondary btn-block" onclick="document.getElementById('in_file').click()">Aggiungi materiale</button>
        <input id="in_file" type="file" style="display: none" onchange="inputFile()">
      </div>
    </div>
    <div id="files">

    </div>
    <div class="form-group">
      <div class="form-label-group">
        <button type="submit" class="btn btn-block btn-secondary" disabled id="submit">Carica</button>
      </div>
    </div>
  </form>
</div>

<div class="modal fade" id="modalTipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button class="btn btn-block" onclick="impostaTipo('Documento', 'bg-primary')">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-file-pdf"></i>
              </div>
              <div class="mr-5">Documento</div>
            </div>
          </div>
        </button>
        <button class="btn btn-block" onclick="impostaTipo('Video', 'bg-warning')">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-film"></i>
              </div>
              <div class="mr-5">Video</div>
            </div>
          </div>
        </button>
        <button class="btn btn-block" onclick="impostaTipo('Esercitazioni', 'bg-success')">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-dumbbell"></i>
              </div>
              <div class="mr-5">Esercitazione</div>
            </div>
          </div>
        </button>
        <button class="btn btn-block" onclick="impostaTipo('Presentazioni', 'bg-info')">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-project-diagram"></i>
              </div>
              <div class="mr-5">Presentazione</div>
            </div>
          </div>
        </button>
        <button class="btn btn-block" onclick="impostaTipo('Audio', 'bg-danger')">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-headphones-alt"></i>
              </div>
              <div class="mr-5">Audio</div>
            </div>
          </div>
        </button>
        <button class="btn btn-block" onclick="impostaTipo('Mappe concettuali', 'bg-purple')">
          <div class="card text-white bg-purple o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-map"></i>
              </div>
              <div class="mr-5">Mappe concettuale</div>
            </div>
          </div>
        </button>
        <button class="btn btn-block" onclick="impostaTipo('Altro', 'bg-dark')">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-fw fa-ellipsis-v"></i>
              </div>
              <div class="mr-5">Altro</div>
            </div>
          </div>
        </button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="script.js"></script>
