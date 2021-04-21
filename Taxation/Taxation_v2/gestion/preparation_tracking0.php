<?php
#Page de preparation des déclaration pour la page Tracking.php et le fichier excel_tracking.json
include_once "classes/fetchclas.php";
if (!isset($_SESSION)) {
  session_start();
}
$oldconnection = new mysqli('localhost','lve','adminlvedba','lvedbmobile');
$client_lve->TrouverClient($_SESSION['user_id']);
$donnees = array();
if ( isset($_POST['filtrer'])) {
  $date1 = $_POST['date1'];
  $date2 = $_POST['date2'];
}
else {
  $date1 = date('Y-m-'.(date('d')-1));
  $date2 = date('Y-m-d');
}
/*echo ("SELECT *
FROM expedition_tracking_v
WHERE  code_expediteur='$clientcode'
AND  (datedesaisie BETWEEN '$date1'  AND '$date2')
order by  livraisondate  DESC");
exit;*/
if ($client_lve->CLIENT_COD!='9588') {
$result = $oldconnection->query("SELECT *
FROM expedition_tracking_v
WHERE  code_expediteur='$client_lve->CLIENT_COD'
AND  (datedesaisie BETWEEN '$date1'  AND '$date2')
order by  livraisondate  DESC");
}else{
$result = $oldconnection->query("SELECT *
FROM expedition_tracking_v_test
WHERE  code_expediteur='$client_lve->CLIENT_COD'
AND  (datedesaisie BETWEEN '$date1'  AND '$date2')
order by  livraisondate  DESC");
}

foreach ($result  as $trackdec) {
  if ($client_lve->CLIENT_COD=='9588')
    $bl = $trackdec['num_BL'];
    else
    $bl = $trackdec['bl'];    
    $donnees[] = array(             'id'=>$trackdec['id'],
                                    'courrierid'=>$trackdec['courrierid'],
                                    'numero'=>$trackdec['numero'],
                                    'datedesaisie'=>$trackdec['datedesaisie'],
                                    'colis'=>$trackdec['colis'],
                                    'poids'=>$trackdec['poids'],
                                    'palettes'=>$trackdec['palettes'],
                                    'valeur'=>$trackdec['valeur'],
                                    'expediteur'=>utf8_encode($trackdec['expediteur']),
                                    'destinataire'=>utf8_encode($trackdec['destinataire']),
                                    'code_expediteur'=>$trackdec['code_expediteur'],
                                    'code_destinataire'=>$trackdec['code_destinataire'],
                                    'ville1'=>utf8_encode($trackdec['ville1']),
                                    'ville2'=>utf8_encode($trackdec['ville2']),
                                    'adresse1'=>utf8_encode($trackdec['adresse1']),
                                    'adresse2'=>utf8_encode($trackdec['adresse2']),
                                    'port'=>$trackdec['port'],
                                    'payement'=>$trackdec['payement'],
                                    'ttc'=>$trackdec['ttc'],
                                    'espece'=>$trackdec['espece'],
                                    'cheque'=>$trackdec['cheque'],
                                    'traite'=>$trackdec['traite'],
                                    'bl'=>$bl,
                                    'ttcrecup'=>$trackdec['ttcrecup'],
                                    'especerecup'=>$trackdec['especerecup'],
                                    'chequerecup'=>$trackdec['chequerecup'],
                                    'traiterecup'=>$trackdec['traiterecup'],
                                    'blrecup'=>$trackdec['blrecup'],
                                    'bonconsignation'=>$trackdec['bonconsignation'],
                                    'Statut_Livraison'=>utf8_encode($trackdec['Statut_Livraison']),
                                    'livraisondate'=>$trackdec['livraisondate'],
                                    'motif'=>$trackdec['motif'],
                                    'numerocl'=>$trackdec['numerocl'],
                                    'lattitude'=>$trackdec['lattitude'],
                                    'longitude'=>$trackdec['longitude']
                                    );
  }
 
  $donnees = json_encode($donnees);
  file_put_contents("excel_tracking.json",$donnees);
 ?>
<h3>Suivis des envois</h3>
<table class="table table-bordered col-12 tracktable table-striped" id="tracktable">
  <thead>
    <tr>
      <th class="text-center h6"width="100">Déclaration</th>
      <th class="text-center h6">Date d'expedition</th>
      <th class="text-center h6">Date de livraison</th>
      <th class="text-center h6">Statut de livraison</th>
      <th class="text-center h6">Motifs</th>
       <?php if ($client_lve->CLIENT_COD==15038): ?>
         <th class="text-center h6">Code detaillant</th>
       <?php endif;?>
       <?php if ($client_lve->CLIENT_COD==9588): ?>
         <th class="text-center h6">Retailer</th>
       <?php endif;?>
      <th class="text-center h6">Destinataire</th>
       <?php if ($client_lve->CLIENT_COD==362): ?>
         <th class="text-center h6">colis</th>
         <th class="text-center h6">Poids</th>
       <?php endif;?>
       <?php if ($client_lve->CLIENT_COD==15038){ ?>
        <th class="text-center h6">Ville</th>
      <?php }else{ ?>
        <th class="text-center h6">Adresse</th>
      <?php } ?>
      <?php if ($client_lve->CLIENT_COD==9588): ?>
        <th class="text-center h6">City</th>
        <th class="text-center h6">ILOT</th>
      <?php endif; ?>
        <th class="text-center h6">Documents</th>
    </tr>
  </thead>
  <?php  if($result->num_rows>0){   ?>
    <?php  foreach ($result  as $value): ?>
      <tr>
        <td><?=$value['numero'];?></td>
        <td><?=date("d/m/Y", strtotime($value['datedesaisie']));?></td>
        <td><?=(utf8_encode($value['Statut_Livraison']) ==="Livrée") ? date("d/m/Y H:i", strtotime($value['livraisondate'])) :" " ;?></td>
        <td><?=utf8_encode($value['Statut_Livraison']);?></td>
        <td><?=(utf8_encode($value['Statut_Livraison']) ==="Livrée")? "": utf8_encode($declarations->GetLibCodeMotif($value['motif']));?>
          <?php
            if ($client_lve->CLIENT_COD==15038 || $client_lve->CLIENT_COD==9588){
              $ndset = explode(' - ',$value['destinataire']);
              if ( ! isset($ndset[1])) {
                $ndset[1] = $ndset[0];
                $ndset[0] = "";
              }
            ?>
            <td><?=$ndset[0];?></td>
            <?php $destinataire=$ndset[1];
          }else
          $destinataire= $value['destinataire'];
        ?>
        <td><?=utf8_encode($destinataire); ?></td>
        <?php if ($client_lve->CLIENT_COD==362): ?>
        <td><?=$value['colis'];?></td>
        <td><?=$value['poids'];?></td>
        <?php endif; ?>
        <?php if ($client_lve->CLIENT_COD==15038){ ?>
        <td><?=utf8_encode($value['ville2']);?></td>
        <?php }else{ ?>
        <td><?=utf8_encode($value['adresse2']);?></td>
        <?php } ?></td>
        <?php if ($client_lve->CLIENT_COD==9588): ?>          
         <td><?=utf8_encode($value["ville2"]);?></td>
         <?php
           if ($client_lve->CLIENT_COD=='9588')
          $bl = $value['num_BL'];
          else
          $bl = $value['bl'];    
         ?>
         <td><?=$bl;?></td>
        <?php endif; ?>
        <?php if (utf8_encode($value['Statut_Livraison']) ==="Livrée"){ ?>
        <td class="text-center">
        <button style="border-radius: 50%;" class="btn btn-info btn-sm" id="idcontract"  data-toggle="modal" data-target="#contract-<?=$value['numero'];?>"><img src="http://46.18.132.236:8089/upload_mobile_BL/<?=$value['courrierid'].'/'.$declarations->GetScanBL($value['courrierid']);?>" alt="Expédition" class="img-thumber" width="20px;" height="20px;" style="border-radius: 50%;"></button>
        <!--#######################################################################################################-->
         <div class="modal contract" tabindex="-1" role="dialog" id="contract-<?=$value['numero'];?>">
         <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
           <div class="modal-header">
           <h5 class="modal-title"></h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true" style="
                background-color: red;
                color: #fff;
                border-radius: 50%;
                padding: 0px 10px 7px 10px;
                ">&times;</span>
           </button>
           </div>
           <div class="modal-body">
           <img src="http://46.18.132.236:8089/upload_mobile_BL/<?=$value['courrierid'].'/'.$declarations->GetScanBL($value['courrierid']);?>" alt="Expédition" class="img-thumber" width="600px;" height="600px;">
           <div class="modal-footer">
            <?php /*
              <a target="_blank" type="button" class="btn btn-success btn-lve" href="http://46.18.132.236:8089/upload_mobile_BL/<?=$value['courrierid'].'/'.$declarations->GetScanBL($value['courrierid']);?>" download >Voir en taille réelle</a>
            */?>
             <button type="button" class="btn btn-danger btn-lve" data-dismiss="modal"><i class="fas fa-times"></i> Fermer</button>
           </div>
           </div>
         </div>
         </div>
        </div>
        </td>
        <?php }elseif (utf8_encode($value['Statut_Livraison']) !="Livrée") {
          echo "<td></td>";
        } ?>
      </tr>
    <?php endforeach; ?>
   <?php
   }else{
    switch ($client_lve->CLIENT_COD) {
      case '9588':
      case '15038':
           ?>
           <tr>
             <td class="text-center" colspan="11">Pas d'expéditions pour le moment</td>
           </tr>
         <?php      
        break;
      default:
         ?>
           <tr>
             <td class="text-center" colspan="10">Pas d'expéditions pour le moment</td>
           </tr>
         <?php
        break;
    }
   }
   ?>
</table>
   <script type="text/javascript">
   $(document).ready(function(){
       $('#tracktable').dataTable({
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