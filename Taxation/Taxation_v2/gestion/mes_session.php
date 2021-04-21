<?php
#Table des session du client LVE.
require_once "control_utilisateur.php";
  ?>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th class="text-center">Code d'agence</th>
        <th  class="text-center">Agence</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($client_lve->MesSessions() as $key): ?>
      <tr>
        <td><?=$key['AGENCE_COD'];?></td>
        <td><?=$key['AGENCE_LIB'];?></td>
        <td>
          <div class="text-center">
              <button style="width: 40px;height: 40px;border-radius:50%;" class="btn btn-outline-primary btn-sm" id="visuali"  data-toggle="modal" data-target="#modsession<?=$key['AGENCE_COD'];?>"><i class="fas fa-edit"></i></button>

            <!-- modal modification-->

            <!-- Modal -->
            <div class="modal modsession" id="modsession<?=$key['AGENCE_COD'];?>" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier la session: <?=$key['AGENCE_LIB'];?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true"style="background-color: red;
                                                                       color: #fff;
                                                                       border-radius: 50%;
                                                                       padding: 0px 10px 7px 10px;">&times;</span>
                    </button>
                  </div>
                  <form class="" action="Modification" method="post" autocomplete="off">
                    <input type="hidden" name="codesession" value="<?=$key['AGENCE_COD'];?>">
                    <div class="modal-body">
                      <div class="form-group col-12">
                        <label for="">La session:</label>
                        <input type="text" class="form-control" style="border-radius: 2.5rem;" name="mod_session_lib" value="<?=$key['AGENCE_LIB'];?>">
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
              <button style="width: 40px;height: 40px;border-radius:50%;" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#supsession<?=$key['AGENCE_LIB'];?>"><i class="fas fa-trash-alt"></i></button>
            <!-- modal suppression-->
            <div class="modal fade" id="supsession<?=$key['AGENCE_LIB'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Session: <?=$key['AGENCE_LIB'];?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="background-color: red;
                                                                       color: #fff;
                                                                       border-radius: 50%;
                                                                       padding: 0px 10px 7px 10px;">&times;</span>
                    </button>
                  </div>
                  <form class="" action="Suppression" method="post">
                  <div class="modal-body">
                    <input type="hidden" name="suppsession" value="<?=$key['AGENCE_COD'];?>">
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
