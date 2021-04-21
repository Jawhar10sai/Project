<?php
require_once("adheads.php");
?>
<div class="content-title m-x-auto">
<div class="row">
  <h1 class="col-11">Liste des clients:</h1>
  <button style="width: 40px;height: 40px;border-radius:50%;" class="btn btn-outline-primary btn-sm mt-3"  id="visuali"  data-toggle="modal" data-target="#aj-adresse"><i class="fas fa-user-plus"></i></button>
</div>
</div>
<?php require_once "aj-adresse.php"; ?>
<div style="background-color:#ffffff;border-radius:0.5rem; padding-top:10px;margin-top:15px;">
  <table id="adtable" class="table row-border">
   <thead class="thead-light">
     <tr>
       <td>#</td>
       <td>Client</td>
       <td>Sous client</td>
       <td>Adresse de sous client</td>
       <td>Ville</td>
       <td>Dernière modification</td>
       <td>Faite par</td>
       <td>Action</td>
     </tr>
   </thead>
    <?php foreach ($adresses->listeAdresse() as $adrs): ?>
      <?php
        $client_lve->TrouverClient($adrs['id_user']);
        $sous_client->TrouverClient($adrs['id_client']);
        $villes->TrouverVille($adrs['id_ville']);
       ?>
    <tr>
      <td><?=$adrs['id_adresse']; ?></td>
      <td><?=$client_lve->NOM; ?></td>
      <td><?=$sous_client->NOM; ?></td>
      <td><?=$adrs['lib_adresse'];  ?></td>
      <td><?=$villes->VILLE_LIB; ?></td>
      <td><?=$adrs['modifie_le']; ?></td>
      <td><?=$adrs['par']; ?></td>
      <td>
        <div class="row" style="flex-wrap:inherit;">
          <button class="btn btn-outline-warning" style="width: 40px;height: 40px;border-radius:50%;" id="modifier"  data-toggle="modal" data-target="#mod-<?=$adrs['id_adresse'];?>"><span><i class="fas fa-edit"></i></span></button>
          <button class="btn btn-outline-danger" style="width: 40px;height: 40px;border-radius:50%;" id="supprimer"  data-toggle="modal" data-target="#supmod-<?=$adrs['id_adresse']; ?>"><span><i class="fas fa-trash"></i></span></button>
        </div>
         <!--#######################################################################################################-->
           <div class="modal modmodus" tabindex="-1" role="dialog" id="mod-<?=$adrs['id_adresse'];?>">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title">Modifier Adresse</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true" style="background-color: red;
                                                                    color: #fff;
                                                                    border-radius: 50%;
                                                                    padding: 0px 10px 7px 10px;">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                 <?php  ?>
                 <form class="form" action="Modification" method="post">
                     <div class="form-group">
                       <label for="">Adresse:</label>
                       <textarea name="adresse" class="form-control"><?=$adrs['adresse_lib'];?></textarea>
                     </div>
                     <div class="form-group">
                       <label for="">Client:</label>
                       <select class="" name="utlid">
                         <option value="<?=$client_lve->CLIENT_ID; ?>"><?=$client_lve->NOM; ?>
                           <?php foreach ($client_lve->ListeClients() as $usr): ?>
                             <option value="<?=$usr['CLIENT_ID'];?>"><?=$usr['NOM'];?></option>
                           <?php endforeach; ?>
                       </select>
                     </div>
                     <div class="form-group">
                       <label for="">Sous client:</label>
                       <select class="form-control form-control-sm" name="idcli">
                         <option value="<?=$sous_client->CLIENT_ID; ?>"><?=$sous_client->NOM; ?></option>
                         <?php foreach ($sous_client->ListeClients() as $clis): ?>
                           <option value="<?=$clis['CLIENT_ID'];?>"><?=$clis['NOM'];?></option>
                         <?php endforeach; ?>
                       </select>
                     </div>
                     <div class="form-group">
                       <label for="">Ville</label>
                       <select class="form-control form-control-sm" name="vill">
                         <option value="<?=$villes->VILLE_COD; ?>"><?=$villes->VILLE_LIB; ?></option>
                         <?php foreach ($villes->ListeVilles() as $vil): ?>
                           <option value="<?=$vil['VILLE_COD'];?>"><?=$vil['VILLE_LIB'];?></option>
                         <?php endforeach; ?>
                       </select>
                     </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                     <button type="submit" class="btn btn-primary" name="modifier_adresse">Oui</button>
                   </div>
                 </form>
               </div>
             </div>
           </div>
         </div>

         <!--#######################################################################################################-->
           <div class="modal supmod" tabindex="-1" role="dialog" id="supmod-<?=$adrs['id_adresse'];?>">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title">Supprimer Utilisateur</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true" style="background-color: red;
                                                                    color: #fff;
                                                                    border-radius: 50%;
                                                                    padding: 0px 10px 7px 10px;">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                 <form class="" action="Suppression" method="post">
                   <p>Voulez-vous vraiment supprimer ?</p>
                   <input type="hidden" name="idadre" value="<?=$adrs['id_adresse'];?>">
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                     <button type="submit" class="btn btn-primary" name="supprimer_adresse">Oui</button>
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
 <script type="text/javascript">
 $(document).ready(function(){
     $('#adtable').dataTable({
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
