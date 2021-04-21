<?php
require_once('../../../classes/fetchclas.php');
require_once('../../../classes/conftaxDB.php');

 ?>
 <div class="">
   <table class="table table-bordered col-md-12">
     <tr class="text-center">
       <td>#</td>
       <td>Client</td>
       <td>Code</td>
       <td>ICE</td>
       <td>ID Fiscale</td>
       <td>Capital social</td>
       <td>Mise à jour</td>
     </tr>
     <?php
     if ($clients->listeUser()->num_rows>0) {
       foreach ($clients->listeUser() as $user ) {
         ?>
          <tr>
            <td class="text-center"><?=$user['CLIENT_ID']; ?></td>
            <td><?=$user['NOM']; ?></td>
            <td><?=$user['CLIENT_COD']; ?></td>
            <td><?=$user['ICE']; ?></td>
            <td><?=$user['ID_FISCALE']; ?></td>
            <td><?=$user['CAPITAL_SOC']; ?></td>
            <td>
              <button class="btn btn-warning" id="modifier"  data-toggle="modal" data-target="#mod-<?=$user['CLIENT_ID']; ?>"><span><i class="fas fa-edit"></i></span></button>
               <!--#######################################################################################################-->
                 <div class="modal modmod" tabindex="-1" role="dialog" id="mod-<?=$user['CLIENT_ID']; ?>">
                 <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title">Modifier les informations professionnelles du <?=strtoupper($user['NOM']);?></h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body">
                       <form class="" action="gestion/modification.php" method="post">
                         <input type="hidden" name="id_client" value="<?=$user['CLIENT_ID'];?>">
                         <div class="form-group col-sm">
                           <label for="">Nom du client</label>
                           <input type="text" name="modnom" class="form-control" disabled value="<?=$user['NOM'];?>">
                         </div>
                         <div class="form-group col-sm">
                           <label for="">Code client</label>
                           <input type="text" name="modcodecli" class="form-control" value="<?=$user['CLIENT_COD'];?>">
                         </div>
                         <div class="form-group col-sm">
                           <label for="">ICE</label>
                           <input type="text" name="modice" class="form-control" value="<?=$user['ICE'];?>">
                         </div>
                         <div class="form-group col-sm">
                           <label for="">ID Fiscale</label>
                           <input type="text" name="modidfiscle" class="form-control" value="<?=$user['ID_FISCALE'];?>">
                         </div>
                         <div class="form-group col-sm">
                           <label for="">Capital social</label>
                           <input type="text" name="modcapsoc" class="form-control" value="<?=$user['CAPITAL_SOC'];?>">
                         </div>
                         <div class="text-center">
                           <button type="submit" class="btn btn-lg btn-primary" name="modification_professionnel_utilisateur">Modifier les données du client</button>
                         </div>
                       </form>
                     </div>
                   </div>
                 </div>
               </div>
            </td>
          </tr>
         <?php
       }
     }else {

     }
      ?>
   </table>
 </div>
