<?php
require_once('../../gestion/classes/fetchclas.php');
require_once('../../gestion/classes/conftaxDB.php');

$iduser = strip_tags($_POST['idcli']);
$client_lve->TrouverClient($iduser);
 ?>
 <table class="table table-bordered table-striped" id="dectable">
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
      if ($client_lve->MesDeclarations()) {
        if ($client_lve->MesDeclarations()->num_rows>0){
          foreach ($client_lve->MesDeclarations() as $key){
            $sous_client->TrouverClient($key['client2_id']);
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
           <td>
           <?php
           $newDate = date("d/m/Y", strtotime($key['date']));
           echo $newDate; ?>
         </td>
           <td><?= strtoupper($sous_client->NOM); ?></td>
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
   <script type="text/javascript">
   $(document).ready(function(){
       $('#dectable').dataTable({
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
