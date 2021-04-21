<?php
require_once("adheads.php");
?>
 <table id="uutable" class="table table-bordered table-responsive">
  <thead class="thead-light">
    <tr>
    <td>Code client</td>
    <td>Nom</td>
    <td>Prenom</td>
    <td>ID Fiscale</td>
    <td>Capital&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>Chaine d'interval</td>
    <td>Debut d'interval</td>
    <td>Max d'interval</td>
    <td>Mail</td>
    <td>ICE</td>
    <td>Adresse&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>Ville</td>
    <td>Telephone</td>
    <td>Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
  </thead>
   <?php foreach ($clients->listeUser() as $uuse): ?>
   <tr>
     <td><?=$uuse['CLIENT_COD'];?></td>
     <td><?=strtolower($uuse['NOM']);?></td>
     <td><?=strtolower($uuse['PRENOM']);?></td>
     <td><?=$uuse['ID_FISCALE'];?></td>
     <td class="text-right"><?=number_format($uuse['CAPITAL_SOC'], 2, ',', ' ');?></td>
     <td><?=$uuse['CLIENT_COD2'];?></td>
     <td><?=$uuse['debinterval'];?></td>
     <td><?=$uuse['fininterval'];?></td>
     <td><?=strtolower($uuse['mail']);?></td>
     <td><?=$uuse['ICE'];?></td>
     <td><?=strtolower($uuse['adresse']);?></td>
     <td><?=strtolower($uuse['ville']);?></td>
     <td><?=$uuse['telephone'];?></td>
     <td>
       <button class="btn btn-warning" id="modifier"  data-toggle="modal" data-target="#mod-<?=$uuse['CLIENT_COD'];?>"><span><i class="fas fa-edit"></i></span></button>
        <!--#######################################################################################################-->
          <div class="modal modmodus" tabindex="-1" role="dialog" id="mod-<?=$uuse['CLIENT_COD'];?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modifier Adresse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form" action="gestion/modification.php" method="post">
                  <div class="form-group col-md-6" hidden>
                    <input class="form-control form-control-sm" type="text" id="modcodecli" name="modcodecli" value="<?=$uuse['CLIENT_COD'];?>">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Nom</label>
                      <input class="form-control form-control-sm" type="text" id="nom" name="modnom" value="<?=$uuse['NOM'];?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Prenom</label>
                      <input class="form-control form-control-sm" type="text" id="prenom" name="modprenom" value="<?=$uuse['PRENOM'];?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Telephone</label>
                      <input class="form-control form-control-sm" type="text" id="telephone" maxlength="10" name="modtelephone" value="<?=$uuse['telephone'];?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Ville</label>
                      <input class="form-control form-control-sm" type="text" id="ville" name="modville" value="<?=$uuse['ville'];?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="">Adresse</label>
                      <input class="form-control form-control-sm" type="text" id="adresse" name="modadresse" value="<?=$uuse['adresse'];?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Contact</label>
                      <input class="form-control form-control-sm" type="mail" placeholder="contact@mail.com" id="contact" name="modcontact" value="<?=$uuse['mail'];?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">ICE</label>
                      <input class="form-control form-control-sm" type="text" id="ice" name="modice" value="<?=$uuse['ICE'];?>">
                    </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="">Chaine d'interval</label>
                        <input class="form-control form-control-sm" type="text" id="chaininter" name="modchaininter" value="<?=$uuse['CLIENT_COD2'];?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="">Interval debut</label>
                        <input class="form-control form-control-sm" type="text" id="debinter" name="moddebinter" value="<?=$uuse['debinterval'];?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="">Interval max</label>
                        <input class="form-control form-control-sm" type="text" id="fininter" name="modfininter" value="<?=$uuse['fininterval'];?>">
                      </div>
                  </div>
                  <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">ID fiscale</label>
                    <input class="form-control form-control-sm" type="text" id="idfiscle" name="modidfiscle" value="<?=$uuse['ID_FISCALE'];?>">
                  </div>
                    <div class="form-group col-md-6">
                      <label for="">Capital social</label>
                      <input class="form-control form-control-sm" type="text" id="capsoc" name="modcapsoc" value="<?=$uuse['CAPITAL_SOC'];?>">
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
          <button class="btn btn-danger" id="supprimer"  data-toggle="modal" data-target="#supmod-<?=$uuse['CLIENT_COD']; ?>"><span><i class="fas fa-trash"></i></span></button>

        <!--#######################################################################################################-->
          <div class="modal supmod" tabindex="-1" role="dialog" id="supmod-<?=$uuse['CLIENT_COD']; ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Supprimer Utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" action="gestion/supression.php" method="post">
                  <p>Voulez-vous vraiment supprimer ?</p>
                  <input type="hidden" name="idadre" value="<?=$uuse['CLIENT_COD']; ?>">
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
 <script type="text/javascript">

 $(document).ready(function(){
     $('#uutable').dataTable({
         "language": {
             "lengthMenu": "Affichage _MENU_ pages",
             "zeroRecords": "Pas d'elements",
             "info": "Affichage de _PAGE_ of _PAGES_",
             "infoEmpty": "Pas d'elements",
             "infoFiltered": "(filtered from _MAX_ total records)",
             "search":"Recherche",
             "paginate": {
                 "previous": "Précédent",
                 "next": "Suivant"
                 }
         }
     } );
 });
 </script>
