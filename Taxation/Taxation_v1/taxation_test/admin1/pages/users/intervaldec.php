<?php
require_once('../../../classes/fetchclas.php');
require_once('../../../classes/conftaxDB.php');
?>
    <div class="content-title m-x-auto">
      <h1>Clients:</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Interval des déclarations</h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <tr class="text-center">
                <td class="text-center">Client</td>
                <td class="text-center">Chaine interval</td>
                <td class="text-center">Interval deb</td>
                <td class="text-center">Interval fin</td>
                <td class="text-center">Mise à jour</td>
              </tr>
              <?php foreach ($clients->listeUser() as $user): ?>
              <tr>
                <td><?=$user['NOM']; ?></td>
                <td><?=$user['CLIENT_COD2']; ?></td>
                <td><?=$user['debinterval']; ?></td>
                <td><?=$user['fininterval']; ?></td>
                <td>
                  <button class="btn btn-warning" id="modifier"  data-toggle="modal" data-target="#mod-<?=$user['CLIENT_ID']; ?>"><span><i class="fas fa-edit"></i></span></button>
                   <!--#######################################################################################################-->
                     <div class="modal modmod" tabindex="-1" role="dialog" id="mod-<?=$user['CLIENT_ID']; ?>">
                     <div class="modal-dialog" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title">Modifier Adresse</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div class="modal-body">
                           <form class="" action="gestion/modification.php" method="post">
                             <input type="hidden" name="id_client" value="<?=$user['CLIENT_ID'];?>">
                             <div class="form-group col-sm">
                               <label for="">Nom du client</label>
                               <input type="text" name="modnom" class="form-control"  disabled value="<?=$user['NOM'];?>">
                             </div>
                             <div class="form-group col-sm">
                               <label for="">Chiane d'interval</label>
                               <input type="text" name="modchaininter" class="form-control" value="<?=$user['CLIENT_COD2']; ?>">
                             </div>
                             <div class="form-group col-sm">
                               <label for="">Début d'interval</label>
                               <input type="text" name="moddebinter" class="form-control" value="<?=$user['debinterval']; ?>">
                             </div>
                             <div class="form-group col-sm">
                               <label for="">Fin d'interval</label>
                               <input type="text" name="modfininter" class="form-control" value="<?=$user['fininterval']; ?>">
                             </div>
                             <div class="text-center">
                               <button type="submit" class="btn btn-lg btn-primary" name="modification_interval_utilisateur">Modifier les données du client</button>
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
      </div>
    </div>
