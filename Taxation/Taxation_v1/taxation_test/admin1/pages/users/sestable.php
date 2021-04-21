<?php
require_once('../../../classes/fetchclas.php');
require_once('../../../classes/conftaxDB.php');

$iduser = strip_tags($_POST['idcli']);
$lists = $agences->mesAgences($iduser);
 ?>
 <table class="table table-bordered table-striped">
   <thead>
     <tr class="text-center">
       <td>Code d'agence</td>
       <td>Agence</td>
       <td>Statut</td>
       <td>Actions</td>
     </tr>
   </thead>
   <tbody>
     <?php
    if ($lists){
      if ($lists->num_rows>0){ ?>
       <?php foreach ($lists as $key){ ?>
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
          <td style="background-color:<?=$color; ?>"><?=$statut;?></td>
          <td>
            <button type="button" class="btn btn-danger btn-sm"  <?=$disabled; ?> name="deconnect_session">Deconnecter</button>
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
