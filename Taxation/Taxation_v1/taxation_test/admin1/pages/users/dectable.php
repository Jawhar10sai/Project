<?php
require_once('../../../classes/fetchclas.php');
require_once('../../../classes/conftaxDB.php');

$iduser = strip_tags($_POST['idcli']);
$lists = $declarations->mesDeclars($iduser);
 ?>
 <table class="table table-bordered table-striped">
   <thead>
     <tr class="text-center">
       <td>Numero</td>
       <td>Date</td>
       <td>Destinataire</td>
       <td>Nmbre colis</td>
       <td>Poids</td>
       <td>Livraison</td>
       <td>Service</td>
       <td>BL</td>
     </tr>
   </thead>
   <tbody>
     <?php
      if ($lists) {
        if ($lists->num_rows>0){
          foreach ($lists as $key){
           if ($key['livraison'] == "D") {
             $livr = "À domicile";
             }elseif ($key['livraison'] == "p") {
               $livr = "Points relais";
             }else {
               $livr = "En gare";
             }

             if ($key['courrier_typ'] == "M") {
               $typcr = "Messagerie";
             }elseif ($key['courrier_typ'] == "25") {
               // code...
               $typcr = "Affrêtement 25T";
             }elseif ($key['courrier_typ'] == "14") {
                 $typcr = "Affrêtement 14T";
             }elseif ($key['courrier_typ'] == "5") {
                 $typcr = "Affrêtement 5T";
             }elseif ($key['courrier_typ'] == "U") {
                 $typcr = "Affrêtement utilitaires";
             }
           ?>

         <tr>
           <td><?=$key['numero'];?></td>
           <td><?php /*echo $clients->NOMUSER($key['client1_id']);
           strtotime(date('d/m/Y',$key['date']));*/?>
           <?php
           $newDate = date("d/m/Y", strtotime($key['date']));
           echo $newDate; ?>
         </td>
           <td><?= strtoupper($clients->clientID($key['client2_id'])); ?></td>
           <td><?=$key['colis'];?></td>
           <td><?=$key['poids'];?></td>
           <td><?=$livr;?></td>
           <td><?=$typcr;?></td>
           <td><?=$key['BL'];?></td>
         </tr>
     <?php
    }
    }else {
      ?>
      <tr>
        <td colspan="8" class="text-center">Pas de déclarations!</td>
      </tr>
      <?php
     }
   }else {
      ?>
      <tr>
        <td colspan="8" class="text-center">Merci de selectionner le client!</td>
      </tr>
      <?php
     }
       ?>

     </tbody>
   </table>
