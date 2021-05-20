<?php
require_once('../../../classes/fetchclas.php');
require_once('../../../classes/conftaxDB.php');
?>
 <table id="mtable" class="table table-bordered table-responsive table-sm table-responsive">
<thead>
  <td>#</td>
  <td>Ville</td>
  <td>Agence</td>
  <td>Type de la ville</td>
  <td>Delai</td>
  <td>Zone</td>
  <td>Disservies</td>
  <td>Nombre des agences LVE</td>
  <td>Nombre des points relais</td>
  <td>Nombre des clients</td>
  <td>Nombre des déclarations</td>
  <td>Ville départ</td>
  <td>Ville d'arrivée</td>
  <td>Action</td>
</thead>

 <tbody>
   <?php foreach ($villes->Listetotalville() as $uuse): ?>
   <tr>
     <td><?=$uuse['VILLE_COD'];?></td>
     <td><?=ucfirst(strtolower($uuse['VILLE_LIB']));?></td>
     <td><?=$uuse['AGENCE_COD'];?></td>
     <td><?=$uuse['VILLE_TYP'];?></td>
     <td><?=$uuse['DELAI'];?></td>
     <td><?=$uuse['ZONE_COD'];?></td>
     <td><?php
     if ($uuse['VILLE_TYP']==1)
       echo "Oui";
       else
        echo "Non";
      ?></td>
     <td><?=$villes->NombreAGville($uuse['VILLE_COD']);?></td>
     <td><?=$villes->NombrePRville($uuse['VILLE_COD']);?></td>
     <td><?=$villes->NombreCLville(strtolower($uuse['VILLE_LIB']));?></td>
      <td>
        <?php
          #$villes->NombreDECville($adresses->AdresseVille($uuse['VILLE_COD']));
          echo $villes->villeDep($uuse['VILLE_LIB'])+$villes->villeDest($uuse['VILLE_COD']);
        ?>
      </td>
     <td><?=$villes->villeDep($uuse['VILLE_LIB']);?></td>
     <td><?=$villes->villeDest($uuse['VILLE_COD']);?></td>
     <td>
       <button class="btn btn-warning" id="modifier"  data-toggle="modal" data-target="#mod-<?=$uuse['VILLE_COD']; ?>"><span><i class="fas fa-edit"></i></span></button>

     <!--#######################################################################################################-->
       <div class="modal modmod" tabindex="-1" role="dialog" id="mod-<?=$uuse['VILLE_COD']; ?>">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Modifier ville</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
               <form class="" action="gestion/modification.php" method="post">
                  <input type="hidden" name="modidvil" value="<?=$uuse['VILLE_COD']; ?>">
                   <div class="form-group col-md-6">
                     <label for="">Ville</label>
                     <input class="form-control" type="text" name="modvill" value="<?=$uuse['VILLE_LIB'];?>">
                 </div>
                 <div class="form-group col-md-6">
                   <label for="">Code d'agence</label>
                   <input class="form-control" type="text" name="modcodeag" value="<?=$uuse['AGENCE_COD'];?>">
               </div>
               <div class="form-group col-md-6">
                 <label for="">Type de la ville</label>
                 <input class="form-control" type="text" name="modtypvil" value="<?=$uuse['VILLE_TYP'];?>">
             </div>
             <div class="form-group col-md-6">
               <label for="">Delai</label>
               <input class="form-control" type="text" name="moddelvil" value="<?=$uuse['DELAI'];?>">
               </div>
               <div class="form-group col-md-6">
                 <label for="">Code de la zone</label>
                 <input class="form-control" type="text" name="codezone" value="<?=$uuse['ZONE_COD'];?>">
             </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                 <button type="submit" class="btn btn-primary" name="modification_ville">Modifier</button>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
        <!--*********************************************************************************-->

        <!--**********************************************************************************************************-->
        <button class="btn btn-danger" id="supprimer"  data-toggle="modal" data-target="#supmod-<?=$uuse['VILLE_COD']; ?>"><span><i class="fas fa-trash"></i></span></button>

      <!--#######################################################################################################-->
        <div class="modal supmod" tabindex="-1" role="dialog" id="supmod-<?=$uuse['VILLE_COD']; ?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Supprimer ville</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="gestion/supression.php" method="post">
                <p>Voulez-vous vraiment supprimer ?</p>
                <input type="hidden" name="id_ville" value="<?=$uuse['VILLE_COD']; ?>">
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                  <button type="submit" class="btn btn-primary" name="suppression_ville">Oui</button>
                </div>
              </form>
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
    $('#mtable').dataTable({
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
