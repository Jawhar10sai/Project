<?php
require_once('../../../classes/fetchclas.php');
require_once('../../../classes/conftaxDB.php');
 ?>
<div class="content-title m-x-auto">
  <h1>Clients:</h1>
</div>
<div class="card">
  <div class="card-header">
    <h4>Clients déjà connectés</h4>
  </div>
  <div class="card-body">
    <table class="ustable table table-bordered col-md-12">
      <tr class="text-center">
        <td>ID de client</td>
        <td>Nom</td>
        <td>Code client</td>
        <td>statut</td>
        <td>Deconnecter</td>
      </tr>
    <?php foreach ($clients->listeUser() as $utilisateur): ?>
      <tr>
        <td class="text-center"><?=$utilisateur['CLIENT_ID'];?></td>
        <td><?=$utilisateur['NOM'];?></td>
        <?php
        if ($utilisateur['IDENTITE_TYP']=="co") {
          $color = "#6FC600";
          $disabled ="";
          $statut= "Connecté";
        }else {
          $color = "#DCDCDC";
          $disabled ="disabled";
          $statut= "deconnecté";
        }
         ?>
        <td ><?=$utilisateur['CLIENT_COD'];?></td>
        <td style="background-color:<?=$color; ?>"><?=$statut;?></td>
         <td class="text-center">
           <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#decomod-<?=$utilisateur['CLIENT_COD']; ?>"  <?=$disabled; ?> name="button">Deconnecter</button>


         <!--#######################################################################################################-->
           <div class="modal decomod" tabindex="-1" role="dialog" id="decomod-<?=$utilisateur['CLIENT_COD']; ?>">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title">Supprimer Utilisateur</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                 <form class="" action="gestion/gestion_connexion.php" method="post">
                   <p>Voulez-vous vraiment forçer la déconnexion?</p>
                   <input type="hidden" name="idclient" value="<?=$utilisateur['CLIENT_ID']; ?>">
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                     <button type="submit" class="btn btn-primary" name="disconnect_client">Oui</button>
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
