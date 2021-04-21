<?php
require_once('../../../classes/fetchclas.php');
require_once('../../../classes/conftaxDB.php');

$iduser = strip_tags($_POST['idcli']);
$lists = $clients->mesclient($iduser);
 ?>
 <table class="table table-bordered table-striped">
   <thead>
     <tr class="text-center">
       <td>ID</td>
       <td>Client code</td>
       <td>Nom</td>
       <td>Adresse</td>
       <td>Ville</td>
       <td>Téléphone</td>
     </tr>
   </thead>
   <tbody>
     <?php
     if ($lists) {
      if($lists->num_rows>0){
        foreach ($lists as $key): ?>
       <tr>
         <td><?=$key['CLIENT_ID'];?></td>
         <td><?=$key['CLIENT_COD'];?></td>
         <td><?=$key['NOM'];?></td>
         <td><?=$key['NOM'];?></td>
         <td><?=$key['NOM'];?></td>
         <td><?=$key['telephone'];?></td>
       </tr>
       <?php endforeach; ?>
     <?php }else {
      ?>
      <tr>
        <td colspan="6" class="text-center">Pas de sessions!</td>
      </tr>
      <?php
     }
   }else {
    ?>
    <tr>
      <td colspan="6" class="text-center">Merci de selectionner le client!</td>
    </tr>
    <?php
   }
     ?>

   </tbody>
 </table>
