<?php
require_once("adheads.php");
$reslts = $conn->query("SELECT * FROM `points_relais`");
 ?>
 <table id="prtable" class="table table-bordered table-responsive table-sm table-responsive">
<thead>
  <td>#</td>
  <td>Nom point relais</td>
  <td>Villes</td>
  <td>Localisation : vertical</td>
  <td>Localisation : horizontal</td>
  <td>Action</td>
</thead>

 <tbody>
   <?php foreach ($reslts as $uuse): ?>
   <tr>
     <td><?=$uuse['id_pr'];?></td>
     <td><?=ucfirst(strtolower($uuse['lib_pr']));?></td>
     <td><?=$villes->IDVille($uuse['id_ville']);?></td>
     <td><?=$uuse['loc_ver'];?></td>
     <td><?=$uuse['loc_hor'];?></td>
     <td>
       <div class="row">
       <button class="btn btn-warning" id="modifier"  data-toggle="modal" data-target="#mod-<?=$uuse['id_pr']; ?>"><span><i class="fas fa-edit"></i></span></button>

     <!--#######################################################################################################-->
       <div class="modal modmod" tabindex="-1" role="dialog" id="mod-<?=$uuse['id_pr']; ?>">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Modifier point relai</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
               <form class="" action="ADpr.php" method="post">
             <div class="form-group col-md-6">
               <input class="form-control" hidden type="text" name="modidpr" value="<?=$uuse['id_pr'];?>">
               </div>

               <div class="form-group">
                 <label for="">Nom de points relais</label>
                 <input class="form-control form-control-sm" type="text" name="modnmpr" value="<?=$uuse['lib_pr'];?>">
             </div>
             <div class="form-group">
               <label for="">Ville de points relais</label>
               <select class="form-control" name="modvill">
                 <option value="<?=$uuse['id_ville'];?>"><?=$villes->IDVille($uuse['id_ville']);?></option>
                 <?php foreach ($villes->listeVille() as $key): ?>
                   <option value="<?=$key['VILLE_COD'];?>"><?=$key['VILLE_LIB'];?></option>
                 <?php endforeach; ?>
               </select>
           </div>
           <div class="form-group">
             <label for="">localisation: Vertical</label>
             <input class="form-control form-control-sm" type="text" name="modverti" value="<?=$uuse['loc_ver'];?>">
         </div>
         <div class="form-group">
           <label for="">localisation: Horizontal</label>
           <input class="form-control form-control-sm" type="text" name="modhori" value="<?=$uuse['loc_hor'];?>">
           </div>

               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                 <button type="submit" class="btn btn-primary" name="modifi">Modifier</button>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
        <!--*********************************************************************************-->

        <!--**********************************************************************************************************-->
        <button class="btn btn-danger" id="supprimer"  data-toggle="modal" data-target="#supmod-<?=$uuse['id_pr']; ?>"><span><i class="fas fa-trash"></i></span></button>

      <!--#######################################################################################################-->
        <div class="modal supmod" tabindex="-1" role="dialog" id="supmod-<?=$uuse['id_pr']; ?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Supprimer point relai</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="supp.php" method="post">
                <p>Voulez-vous vraiment supprimer ?</p>
                <input type="hidden" name="idadre" value="<?=$uuse['id_pr']; ?>">
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                  <button type="submit" class="btn btn-primary" name="suppppr">Oui</button>
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
    $('#prtable').dataTable({
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
