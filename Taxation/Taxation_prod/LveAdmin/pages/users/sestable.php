<?php
require_once('../../gestion/classes/fetchclas.php');
require_once('../../gestion/classes/conftaxDB.php');

$iduser = strip_tags($_POST['idcli']);
$client_lve->TrouverClient($iduser);
 ?>
 <table class="table table-striped">
   <thead>
     <tr>
       <th>Code d'agence</th>
       <th>Agence</th>
       <th class="text-center">Statut</th>
     </tr>
   </thead>
   <tbody>
     <?php
    if ($client_lve->MesSessions()){
      if ($client_lve->MesSessions()->num_rows>0){ ?>
       <?php foreach ($client_lve->MesSessions() as $key){ ?>
       <tr>
         <td><?=$key['AGENCE_COD'];?></td>
         <td><?=$key['AGENCE_LIB'];?></td>
         <?php
         if ($key['IDENTITE_TYP']=="co") {
           $color = "#6FC600";
           $disabled ="";
           $statut= "Connecté";
         }else {
           $color = "";
           $disabled ="disabled";
           $statut= "deconnecté";
         }
          ?>
          <td class="text-center">
            <?php
              $color = ($key['IDENTITE_TYP']=="de")? "#FA0808" : "#00EE43" ;
              $disabled = ($key['IDENTITE_TYP']=="de")? "disabled" : "";
              ?>
              <button style="border:0px;background:transparent;" type="button" name="button" data-toggle="modal" data-target="#decomod-<?=$key['AGENCE_COD']; ?>"  <?=$disabled; ?>><i class="fa fa-circle fa-2x" aria-hidden="true"  style="color:<?=$color;?>;"></i></button>

              <div class="modal decomod" tabindex="-1" role="dialog" id="decomod-<?=$key['AGENCE_COD']; ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Deconnecter session</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" style="background-color: red;
                                                                       color: #fff;
                                                                       border-radius: 50%;
                                                                       padding: 0px 10px 7px 10px;">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="" action="Modification" method="post">
                      <p>Voulez-vous vraiment forçer la déconnexion?</p>
                      <input type="hidden" name="idclient" value="<?=$key['AGENCE_COD']; ?>">
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                        <button type="submit" class="btn btn-primary" name="deconnecter_session">Oui</button>
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
      ?>
      <tr>
        <td colspan="4" class="text-center">Pas de sessions!</td>
      </tr>
      <?php
     }
   }else {
    ?>
    <tr>
      <td colspan="4" class="text-center">Merci de selectionner le client!</td>
    </tr>
    <?php
   } ?>

   </tbody>
 </table>
