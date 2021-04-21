<?php
#Table des session du client LVE.
require_once "control_utilisateur.php";
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th class="text-center">Code d'agence</th>
      <th class="text-center">Agence</th>
      <th class="text-center"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($client_lve->MesSessions() as $session) : ?>
      <tr>
        <td class="text-center"><?= $session->AGENCE_COD; ?></td>
        <td class="text-center"><?= $session->AGENCE_LIB; ?></td>
        <td>
          <div class="text-center">
            <div class="dropleft">
              <button type="button" class="btn btn-details" id="drop<?= $session->AGENCE_COD; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="drop<?= $session->AGENCE_COD; ?>">
                <a style="color: #0099ff;" class="dropdown-item" id="visuali" data-toggle="modal" data-target="#modsession<?= $session->AGENCE_COD; ?>">
                  <span><i class="fas fa-edit"></i></span> Modifier la session
                </a>
                <a style="color: #c60101;" class="dropdown-item" id="supprimer" data-toggle="modal" data-target="#supsession<?= $session->AGENCE_LIB; ?>">
                  <span><i class="fas fa-trash"></i></span> Supprimer la session
                </a>
              </div>
            </div>
            <!-- modal modification-->

            <!-- Modal -->
            <div class="modal modsession" id="modsession<?= $session->AGENCE_COD; ?>" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier la session: <?= $session->AGENCE_LIB; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="background-color: red;
                                                                       color: #fff;
                                                                       border-radius: 50%;
                                                                       padding: 0px 10px 7px 10px;">&times;</span>
                    </button>
                  </div>
                  <form class="" action="Modification" method="post" autocomplete="off">
                    <input type="hidden" name="codesession" value="<?= $session->AGENCE_COD; ?>">
                    <div class="modal-body">
                      <div class="form-group col-12">
                        <label for="">La session:</label>
                        <input type="text" class="form-control" style="border-radius: 2.5rem;" name="mod_session_lib" value="<?= $session->AGENCE_LIB; ?>">
                      </div>
                      <div class="form-group col-12">
                        <label for="">Nouveau mot de passe:</label>
                        <input type="text" class="form-control" style="border-radius: 2.5rem;" name="mod_session_pass" value="">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger btn-lve" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                      <button type="submit" class="btn btn-primary btn-lve"><i class="fa fa-save"></i> Valider la modification</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- fin modal modification-->
            <!-- modal suppression-->
            <div class="modal fade" id="supsession<?= $session->AGENCE_LIB; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Session: <?= $session->AGENCE_LIB; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="background-color: red;
                                                                       color: #fff;
                                                                       border-radius: 50%;
                                                                       padding: 0px 10px 7px 10px;">&times;</span>
                    </button>
                  </div>
                  <form class="" action="Suppression" method="post">
                    <div class="modal-body">
                      <input type="hidden" name="suppsession" value="<?= $session->AGENCE_COD; ?>">
                      Voulez vous vraiment supprimer cette session?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger btn-lve" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
                      <button type="submit" name="supprimer_session" class="btn btn-primary btn-lve"><i class="fa fa-save"></i> Confirmer</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- fin modal suppression-->
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>