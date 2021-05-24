<?php
require_once '../../../gestion/classes/fetchclas.php';
#ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
?>
<div class="content-title m-x-auto">
  <h1>Clients:</h1>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Clients Archivés</h4>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tr class="text-center">
            <td class="text-center">Client</td>
            <td class="text-center">Code du client</td>
            <td class="text-center">Adresse</td>
            <td class="text-center">Contact</td>
            <td class="text-center">Actions</td>
          </tr>
          <?php foreach (ClientLve::ArchivesClients() as $user) : ?>
            <tr>
              <td><?= $user->NOM; ?></td>
              <td><?= $user->CLIENT_COD; ?></td>
              <td><?= $user->telephone; ?></td>
              <td><?= $user->PRENOM; ?></td>
              <td class="text-center">
                <button style="width: 40px;height: 40px;border-radius:50%;" class="btn btn-outline-info" type="button" name="button" data-toggle="modal" data-target="#renmod-<?= $user['CLIENT_COD']; ?>"><i class="fas fa-undo"></i></button>
                <button style="width: 40px;height: 40px;border-radius:50%;" class="btn btn-outline-danger" type="button" name="button" data-toggle="modal" data-target="#delomod-<?= $user['CLIENT_COD']; ?>"><i class="fas fa-trash"></i></button>
                <div class="modal decomod" tabindex="-1" role="dialog" id="renmod-<?= $user->CLIENT_COD; ?>">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Réinitialiser Utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" style="background-color: red;
                                                                           color: #fff;
                                                                           border-radius: 50%;
                                                                           padding: 0px 10px 7px 10px;">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="" action="Modification" method="post">
                          <p>Voulez-vous vraiment Réinitialiser?</p>
                          <input type="hidden" name="idclient" value="<?= $user->CLIENT_ID; ?>">
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                            <button type="submit" class="btn btn-primary" name="reinitialiser_utilisateur">Oui</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</div>