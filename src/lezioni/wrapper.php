<div id="wrapper">

  <?php $title="lezioni" ?>
  <?php include '../wrapper_head.php' ?>
  <?php
    if (isset($_GET['utente'])) {
      $lezioni = query("SELECT * FROM lezioni WHERE idUtente=".$_GET['utente']);
    } else {
      $lezioni = query("SELECT * FROM lezioni");
    }
  ?>

  <div id="content-wrapper">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../lezioni/">Lezioni</a>
        </li>
      </ol>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Titolo</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($lezioni as $lezione): ?>
                <tr onclick="window.location='../lezione/?id=<?php echo $lezione['id'] ?>'">
                  <td>
                    <a href="#">
                      <?php echo $lezione['titolo'] ?></td>
                    </a>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <script type="text/javascript">
            $(document).ready(function() {
              $('#dataTable').DataTable();
            });
          </script>
        </div>
      </div>
    </div>
  </div>
</div>
