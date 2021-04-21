<?php
require_once('../../../classes/fetchclas.php');
require_once('../../../classes/conftaxDB.php');

 ?>
 <div class="">
   <table class="table table-bordered col-md-12">
     <tr class="text-center">
       <td>Nom</td>
       <td>Prénom</td>
       <td>Téléphone</td>
       <td>Ville</td>
       <td>Adresse</td>
       <td>Contact</td>
       <td>Mise à jour</td>
     </tr>
     <?php
     if ($clients->listeUser()->num_rows>0) {
       foreach ($clients->listeUser() as $user ) {
         ?>
          <tr>
            <td><?=$user['NOM']; ?></td>
            <td><?=$user['PRENOM']; ?></td>
            <td><?=$user['telephone']; ?></td>
            <td><?=$user['ville']; ?></td>
            <td><?=$user['adresse']; ?></td>
            <td><?=$user['mail']; ?></td>
            <td>
              <button class="btn btn-warning" id="modifier"  data-toggle="modal" data-target="#mod-<?=$user['CLIENT_ID']; ?>"><span><i class="fas fa-edit"></i></span></button>
               <!--#######################################################################################################-->
                 <div class="modal modmod" tabindex="-1" role="dialog" id="mod-<?=$user['CLIENT_ID']; ?>">
                 <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title">Modifier les informations personnelles du <?=$user['NOM'];?></h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body">
                       <form class="" action="gestion/modification.php" method="post">
                         <input type="hidden" name="id_client" value="<?=$user['CLIENT_ID'];?>">
                         <div class="form-group col-sm">
                           <label for="">Nom du client</label>
                           <input type="text" name="modnom" class="form-control" value="<?=$user['NOM'];?>">
                         </div>
                         <div class="form-group col-sm">
                           <label for="">Prénom du client</label>
                           <input type="text" name="modprenom" class="form-control" value="<?=$user['PRENOM'];?>">
                         </div>
                         <div class="form-group col-sm">
                           <label for="">Contact</label>
                           <input type="text" name="modcontact" class="form-control" value="<?=$user['mail'];?>">
                         </div>
                         <div class="form-group col-sm">
                           <label for="">Adresse</label>
                           <input type="text" name="modadresse" class="form-control" value="<?=$user['adresse'];?>">
                         </div>
                         <div class="form-group col-sm">
                           <label for="">Ville</label>
                           <input type="text" name="modville" class="form-control" value="<?=$user['ville'];?>">
                         </div>
                         <div class="form-group col-sm">
                           <label for="">Téléphone</label>
                           <input type="text" name="modtelephone" class="form-control" value="<?=$user['telephone'];?>">
                         </div>
                         <div class="text-center">
                           <button type="submit" class="btn btn-lg btn-primary" name="modification_personnel_utilisateur">Modifier les données du client</button>
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
