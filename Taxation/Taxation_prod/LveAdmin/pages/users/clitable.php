<?php
require_once('../../gestion/classes/fetchclas.php');
require_once('../../gestion/classes/conftaxDB.php');

$iduser = strip_tags($_POST['idcli']);
$client_lve->TrouverClient($iduser);
 ?>
 <table class="table table-bordered table-striped" id="clitable">
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
     if ($client_lve->MesClient()) {
      if($client_lve->MesClient()->num_rows>0){
        foreach ($client_lve->MesClient() as $key): ?>
        <?php

         $sous_client->TrouverClient($key['CLIENT_ID']);
           if ($sous_client->DerniereAdresse()) {
             $adresse = $sous_client->DerniereAdresse()->adresse;
             $ville =($villes->TrouverVille($sous_client->DerniereAdresse()->id_ville) != false)? $villes->VILLE_LIB : "" ;
         }else {
           $adresse ="";
           $ville ="";
         }
         ?>
       <tr>
         <td><?=$sous_client->CLIENT_ID;?></td>
         <td><?=$sous_client->CLIENT_COD;?></td>
         <td><?=$sous_client->NOM;?></td>
         <td><?=$adresse;?></td>
         <td><?=$ville;?></td>
         <td><?=$sous_client->telephone;?></td>
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
<script type="text/javascript">
$(document).ready(function(){
    $('#clitable').dataTable({
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
