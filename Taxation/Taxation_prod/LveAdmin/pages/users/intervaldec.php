<?php
require_once '../../../gestion/classes/fetchclas.php';
?>
<div class="content-title m-x-auto">
  <h1>Clients:</h1>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Interval des déclarations</h4>
      </div>
      <div class="card-body">
        <table class="table table-striped" id="inttable">
          <thead>
            <tr class="text-center">
              <th class="text-center">Client</th>
              <th class="text-center">Chaine interval</th>
              <th class="text-center">Interval deb</th>
              <th class="text-center">Interval fin</th>
              <th class="text-center">Interval deb (sessions)</th>
              <th class="text-center">Interval fin (sessions)</th>
              <th class="text-center">Mise à jour</th>
            </tr>
          </thead>
          <?php foreach (ClientLve::ListeClients() as $user) : ?>
            <tr>
              <td><?= $user->NOM; ?></td>
              <td class="text-center"><?= $user->CLIENT_COD2; ?></td>
              <td class="text-center"><?= $user->debinterval; ?></td>
              <td class="text-center"><?= $user->fininterval; ?></td>
              <td class="text-center"><?= $user->intervalag_deb; ?></td>
              <td class="text-center"><?= $user->intervalag_fin; ?></td>
              <td class="text-center">
                <button style="width: 40px;height: 40px;border-radius:50%;" class="btn btn-outline-warning" id="modifier" data-toggle="modal" data-target="#mod-<?= $user->CLIENT_ID; ?>"><span><i class="fas fa-edit"></i></span></button>
                <div class="modal modmod" tabindex="-1" role="dialog" id="mod-<?= $user->CLIENT_ID; ?>">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Modifier Adresse</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="" action="Modification" method="post">
                          <input type="hidden" name="id_client" value="<?= $user->CLIENT_ID; ?>">
                          <div class="form-group col-sm">
                            <label for="">Nom du client</label>
                            <input type="text" name="modnom" class="form-control" disabled value="<?= $user->NOM; ?>">
                          </div>
                          <div class="form-group col-sm">
                            <label for="">Chiane d'interval</label>
                            <input type="text" name="modchaininter" class="form-control" value="<?= $user->CLIENT_COD2; ?>">
                          </div>
                          <div class="form-group col-sm">
                            <label for="">Début d'interval</label>
                            <input type="text" name="moddebinter" class="form-control" value="<?= $user->debinterval; ?>">
                          </div>
                          <div class="form-group col-sm">
                            <label for="">Fin d'interval</label>
                            <input type="text" name="modfininter" class="form-control" value="<?= $user->fininterval; ?>">
                          </div>
                          <div class="form-group col-sm">
                            <label for="">Début d'interval (sessions)</label>
                            <input type="text" name="moddebinterag" class="form-control" value="<?= $user->intervalag_deb; ?>">
                          </div>
                          <div class="form-group col-sm">
                            <label for="">Fin d'interval (sessions)</label>
                            <input type="text" name="modfininterag" class="form-control" value="<?= $user->intervalag_fin; ?>">
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary" name="modification_interval_utilisateur">Modifier les données du client</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <!--#######################################################################################################-->

          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  $(table).dataTable({
    "language": {
      "lengthMenu": "Affichage _MENU_ pages",
      "zeroRecords": "Pas d'elements",
      "info": "Affichage de _PAGE_ of _PAGES_",
      "infoEmpty": "Pas d'elements",
      "infoFiltered": "(filtered from _MAX_ total records)",
      "search": "Recherche",
      "paginate": {
        "previous": "Précédent",
        "next": "Suivant"
      }
    }
  });
</script>