





<div class="content-title m-x-auto">
  <div class="row">
    <h1 class="col-11">Liste des clients:</h1>
    <button style="width: 40px;height: 40px;border-radius:50%;" class="btn btn-outline-primary btn-sm mt-3" id="visuali" data-toggle="modal" data-target="#aj-client"><i class="fas fa-user-plus"></i></button>
  </div>
</div>
<?php require_once "aj-client.php"; ?>
<div style="background-color:#ffffff;border-radius:0.5rem; padding-top:10px;margin-top:15px;">
  <table id="uutable" class="table row-border">
    <thead class="thead-light">
      <tr>
        <td class="text-center">Code client</td>
        <td class="text-center">Nom</td>
        <td class="text-center">ICE</td>
        <td class="text-center">Mail</td>
        <td class="text-center">Adresse</td>
        <td class="text-center">Telephone</td>
        <td class="text-center">Statuts</td>
        <td class="text-center">Action</td>
      </tr>
    </thead>
    <?php foreach (ClientLve::ListeClients() as $uuse) : ?>
      <tr>
        <td class="text-center"><?= $uuse->CLIENT_COD; ?></td>
        <td><?= strtolower($uuse->NOM); ?></td>
        <td class="text-center"><?= $uuse->ICE; ?></td>
        <td class="text-center"><?= strtolower($uuse->mail); ?></td>
        <td class="text-center"><?= utf8_encode($uuse->adresse); ?></td>
        <td><?= $uuse->telephone; ?></td>
        <td class="text-center"><?php
                                $color = ($uuse->IDENTITE_TYP == "de") ? "#FA0808" : "#00EE43";
                                $disabled = ($uuse->IDENTITE_TYP == "de") ? "disabled" : "";
                                ?>
          <button style="border:0px;background:transparent;" type="button" name="button" data-toggle="modal" data-target="#decomod-<?= $uuse->CLIENT_COD; ?>" <?= $disabled; ?>><i class="fa fa-circle fa-2x" aria-hidden="true" style="color:<?= $color; ?>;"></i></button>

          <div class="modal decomod" tabindex="-1" role="dialog" id="decomod-<?= $uuse->CLIENT_COD; ?>">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">déconnecter Utilisateur</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="background-color: red;
                                                                 color: #fff;
                                                                 border-radius: 50%;
                                                                 padding: 0px 10px 7px 10px;">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="" action="gestion/modification.php" method="post">
                    <p>Voulez-vous vraiment forçer la déconnexion?</p>
                    <input type="hidden" name="idclient" value="<?= $uuse->CLIENT_ID; ?>">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                      <button type="submit" class="btn btn-primary" name="deconnecter_utilisateur">Oui</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </td>
        <td>
          <div class="dropleft">
            <button type="button" class="btn btn-details" id="drop<?= $uuse->CLIENT_COD; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-h"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="drop<?= $uuse->CLIENT_COD; ?>">
              <a style="color: #0099ff;" class="dropdown-item" id="modifier" data-toggle="modal" data-target="#mod-<?= $uuse->CLIENT_COD; ?>">
                <span><i class="fas fa-edit"></i></span> Modifier le client
              </a>
              <a style="color: #c60101;" class="dropdown-item" id="supprimer" data-toggle="modal" data-target="#supmod-<?= $uuse->CLIENT_COD; ?>">
                <span><i class="fas fa-trash"></i></span> Supprimer le client
              </a>
            </div>
          </div>
          <!--#######################################################################################################-->
          <div class="modal modmodus" tabindex="-1" role="dialog" id="mod-<?= $uuse->CLIENT_COD; ?>">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modifier Adresse</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="background-color: red;
                                                                    color: #fff;
                                                                    border-radius: 50%;
                                                                    padding: 0px 10px 7px 10px;">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="form" action="gestion/modification.php" method="post">
                    <div class="form-group col-md-6" hidden>
                      <input class="form-control form-control-sm" type="text" id="modcodecli" name="modcodecli" value="<?= $uuse->CLIENT_COD; ?>">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="">Nom</label>
                        <input class="form-control form-control-sm" type="text" id="nom" name="modnom" value="<?= $uuse->NOM; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">Prenom</label>
                        <input class="form-control form-control-sm" type="text" id="prenom" name="modprenom" value="<?= $uuse->PRENOM; ?>">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="">Telephone</label>
                        <input class="form-control form-control-sm" type="text" id="telephone" maxlength="10" name="modtelephone" value="<?= $uuse->telephone; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">Ville</label>
                        <input class="form-control form-control-sm" type="text" id="ville" name="modville" value="<?= $uuse->ville; ?>">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="">Adresse</label>
                        <input class="form-control form-control-sm" type="text" id="adresse" name="modadresse" value="<?= $uuse->adresse; ?>">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="">Contact</label>
                        <input class="form-control form-control-sm" type="mail" placeholder="contact@mail.com" id="contact" name="modcontact" value="<?= $uuse->mail; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">ICE</label>
                        <input class="form-control form-control-sm" type="text" id="ice" name="modice" value="<?= $uuse->ICE; ?>">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="">ID fiscale</label>
                        <input class="form-control form-control-sm" type="text" id="idfiscle" name="modidfiscle" value="<?= $uuse->ID_FISCALE; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="">Capital social</label>
                        <input class="form-control form-control-sm" type="text" id="capsoc" name="modcapsoc" value="<?= $uuse->CAPITAL_SOC; ?>">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary" name="modification_complete_utilisateur">Modifier le client</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!--#######################################################################################################-->
          <div class="modal supmod" tabindex="-1" role="dialog" id="supmod-<?= $uuse->CLIENT_COD; ?>">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Supprimer Utilisateur</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="background-color: red;
                                                                    color: #fff;
                                                                    border-radius: 50%;
                                                                    padding: 0px 10px 7px 10px;">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="" action="gestion/supression.php" method="post">
                    <p>Voulez-vous vraiment supprimer ?</p>
                    <input type="hidden" name="idadre" value="<?= $uuse->CLIENT_COD; ?>">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                      <button type="submit" class="btn btn-primary" name="suppression_utilisateur">Oui</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </tr>
      <!--################################################################################################################################-->
    <?php endforeach; ?>
  </table>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#uutable').dataTable({
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
  });
</script>