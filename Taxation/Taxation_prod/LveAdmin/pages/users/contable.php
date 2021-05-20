<?php
require_once('../../gestion/classes/fetchclas.php');
require_once('../../gestion/classes/conftaxDB.php');

$iduser = strip_tags($_POST['idcli']);
$client_lve->TrouverClient($iduser);
 ?>
 <h6>Nombre total des connexions: <?=$client_lve->MesConnexions()->num_rows; ?></h6>
 <table class="table table-striped">
   <thead>
     <tr>
       <th>ID</th>
       <th>Client</th>
       <th>Date de connexion</th>
       <th>Date de deconnexion</th>
     </tr>
   </thead>
   <tbody>
     <?php
    if ($client_lve->MesConnexions()){
      if ($client_lve->MesConnexions()->num_rows>0){ ?>
       <?php foreach ($client_lve->MesConnexions() as $key){ ?>
       <tr>
         <td><?=$key['id'];?></td>
         <td><?=$client_lve->NOM;?></td>
         <td><?=$key['date_connexion'];?></td>
         <td><?=$key['date_deconnexion'];?></td>
       </tr>
     <?php
        }
      }else {
      ?>
      <tr>
        <td colspan="4" class="text-center">Pas de connexions!</td>
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
