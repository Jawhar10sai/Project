<?php
require_once('../../../gestion/classes/fetchclas.php');
?>
 <table id="mtable" class="table table-bordered table-responsive table-sm">
<thead>
  <td>#</td>
  <td>Adresse</td>
  <td>Client</td>
  <td>Ajouté par</td>
  <td>Ville</td>
  <td>Action</td>
</thead>

 <tbody>
   <?php foreach ($adresses->listeAdresse() as $uuse): ?>
     <?php
        $adresses->TrouverAdresse($uuse['id_adresse']);
        $sous_client->TrouverClient($uuse['id_client']);
        $client_lve->TrouverClient($uuse['id_user']);
        $villes->TrouverVille($uuse['id_ville']);
      ?>
   <tr>
     <td><?=$adresses->id;?></td>
     <td><?=ucfirst(strtolower($adresses->adresse));?></td>
     <td><?=ucfirst(strtolower($sous_client->NOM));?></td>
     <td><?=ucfirst(strtolower($client_lve->NOM));?></td>
     <td><?=ucfirst(strtolower($villes->VILLE_LIB));?></td>
     <td>
       <div class="row">
         <button class="btn btn-warning btn-sm" id="modifier"  data-toggle="modal" data-target="#mod-<?=$adresses->id; ?>"><span><i class="fas fa-edit"></i></span></button>
          <!--#######################################################################################################-->
            <div class="modal modmod" tabindex="-1" role="dialog" id="mod-<?=$adresses->id; ?>">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modifier Adresse</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="" action="index.php?p=ADAdresses" method="post">
                    <input type="hidden" name="modidadd" value="<?=$adresses->id;?>">
                      <div class="form-group">
                        <label for="">Adresse</label>
                        <input class="form-control" type="text" name="modlib" value="<?=$adresses->adresse;?>">
                      </div>
                      <div class="form-group">
                        <label for="">Utilisateur</label>
                        <select class="form-control" name="modutil">
                          <option value="<?=$client_lve->CLIENT_ID;?>"><?=$client_lve->NOM;?></option>
                          <?php foreach ($client_lve->ListeClients() as $usr): ?>
                            <option value="<?=$usr['CLIENT_ID'];?>"><?=$usr['NOM'];?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Client</label>
                        <select class="form-control" name="modidcli">
                          <option value="<?=$sous_client->CLIENT_ID;?>"><?=$sous_client->NOM;?></option>
                          <?php foreach ($sous_client->ListeClients() as $clis): ?>
                            <option value="<?=$clis['CLIENT_ID'];?>"><?=$clis['NOM'];?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Ville</label>
                        <select class="form-control" name="modvill">
                          <option value="<?=$villes->VILLE_COD;?>"><?=$villes->VILLE_LIB;?></option>
                          <?php foreach ($villes->ListeVilles() as $vil): ?>
                            <option value="<?=$vil['VILLE_COD'];?>"><?=$vil['VILLE_LIB'];?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary" name="modifi">Modifier l'adresse</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
                <!--#######################################################################################################-->
          <button class="btn btn-danger btn-sm" id="supprimer"  data-toggle="modal" data-target="#supmod-<?=$adresses->id; ?>"><span><i class="fas fa-trash"></i></span></button>


          <div class="modal supmod" tabindex="-1" role="dialog" id="supmod-<?=$adresses->id; ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Supprimer Adresse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" action="supp.php" method="post">
                  <p>Voulez-vous vraiment supprimer ?</p>
                  <input type="hidden" name="idadre" value="<?=$adresses->id; ?>">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-primary" name="supppaddr">Oui</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
       </div>
     </td>
   </tr>
    <?php endforeach; ?>
 </tbody>
 </table>


<script type="text/javascript">
$(document).ready(function(){
  $('#supprimer').click(function(){
    $('.supmod').modal('show');
  });
});
$(document).ready(function(){
  $('#modifier').click(function(){
    $('.modmod').modal('show');
  });
});/*
$(document).ready(function() {
    $('#mtable').DataTable( {
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
} );*/
</script>
