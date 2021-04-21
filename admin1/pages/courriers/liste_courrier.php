<?php
require_once("adheads.php");
?>
<div class="content-title m-x-auto">
<div class="row">
  <h1 class="col-11">Liste des courriers:</h1>
  <button style="width: 40px;height: 40px;border-radius:50%;" class="btn btn-outline-primary btn-sm mt-3"  id="visuali"  data-toggle="modal" data-target="#aj-adresse"><i class="fas fa-user-plus"></i></button>
</div>
</div>
<?php# require_once "aj-adresse.php"; ?>
<div style="background-color:#ffffff;border-radius:0.5rem; padding-top:10px;margin-top:15px;">
  <table id="crtable" class="table row-border">
   <thead class="thead-light">
     <tr>
       <td>#</td>
       <td>Exprediteur</td>
       <td>destinataire</td>
       <td>Adresse dest.</td>
       <td>Ville</td>
     </tr>
   </thead>
    <?php foreach (Courrier::ListeCourrier() as $cours): ?>
    <tr>
      <td><?=$cours->courrier_id; ?></td>
      <td><?=$cours->Expediteur; ?></td>
      <td><?=$cours->destinataire; ?></td>
      <td><?=$cours->adresse2;  ?></td>
      <td><?=$cours->Ville2; ?></td>
    </tr>
   <?php endforeach; ?>
  </table>
</div>
 <script type="text/javascript">
 $(document).ready(function(){
     $('#crtable').dataTable({
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
