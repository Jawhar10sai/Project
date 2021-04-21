<?php
#Page de preparation des déclaration pour la page Tracking.php et le fichier excel_tracking.json
include_once "classes/fetchclas.php";
if (!isset($_SESSION)) {
  session_start();
}
$oldconnection = new mysqli('localhost','root','','lvedbexp');
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
if ($client_lve->CLIENT_COD='9588') {
  $result = $oldconnection->query("SELECT *
FROM declarations_intralot
WHERE (Date BETWEEN '$date1'  AND '$date2')
order by  date_livraison  DESC");
}else{
  $result = $oldconnection->query("SELECT *
FROM etat_expedition
WHERE  Code1='$client_lve->CLIENT_COD'
AND  (Date BETWEEN '$date1'  AND '$date2')
order by  date_livraison  DESC");
}
foreach ($result  as $trackdec) {
    $donnees[] = array(
                                  'Agence'=>$trackdec['Agence'],
                                  'courrier_id'=>$trackdec['courrier_id'],
                                  'Numero'=>$trackdec['Numero'],
                                  'Date'=>$trackdec['Date'],
                                  'Code1'=>$trackdec['Code1'],
                                  'Expediteur'=>utf8_encode($trackdec['Expediteur']),
                                  'Code2'=>$trackdec['Code2'],
                                  'destinataire'=>utf8_encode($trackdec['destinataire']),
                                  'adresse1'=>utf8_encode($trackdec['adresse1']),
                                  'adresse2'=>utf8_encode($trackdec['adresse2']),
                                  'Ville1'=>utf8_encode($trackdec['Ville1']),
                                  'Ville2'=>utf8_encode($trackdec['Ville2']),
                                  'Port'=>$trackdec['Port'],
                                  'Colis'=>$trackdec['Colis'],
                                  'Poids'=>$trackdec['Poids'],
                                  'type'=>$trackdec['type'],
                                  'Montant_ttc'=>$trackdec['Montant_ttc'],
                                  'Espece'=>$trackdec['Espece'],
                                  'Cheque'=>$trackdec['Cheque'],
                                  'Traite'=>$trackdec['Traite'],
                                  'bl'=>$trackdec['bl'],
                                  'Recu'=>$trackdec['Recu'],
                                  'date_recu'=>$trackdec['date_recu'],
                                  'num'=>$trackdec['num'],
                                  'date_bordereau'=>$trackdec['date_bordereau'],
                                  'date_livraison'=>$trackdec['date_livraison'],
                                  'Delais_Cible'=>$trackdec['Delais_Cible'],
                                  'Ecart'=>$trackdec['Ecart'],
                                  'Depassement'=>$trackdec['Depassement'],
                                  'Ecart2'=>$trackdec['Ecart2'],
                                  'service'=>$trackdec['service'],
                                  'BORDEREAU_NUM'=>$trackdec['BORDEREAU_NUM'],
                                  'livraison'=>$trackdec['livraison'],
                                  'ramasseur'=>$trackdec['ramasseur'],
                                  'FC_date1'=>$trackdec['FC_date1'],
                                  'FC_date2'=>$trackdec['FC_date2'],
                                  'date_caisse'=>$trackdec['date_caisse'],
                                  'statut'=>utf8_encode($trackdec['statut']),
                                  'FC_date_arrive'=>$trackdec['FC_date_arrive'],
                                  'Motif'=>utf8_encode($trackdec['Motif']),
                                  'Taxateur'=>$trackdec['Taxateur']
                                  );
  }
  $donnees = json_encode($donnees);
  file_put_contents("excel_tracking.json",$donnees);
 ?>
<h4 class="mb-2 text-center">Nombre des déclarations: <?=$result->num_rows;?></h4>
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
    </tr>
  </thead>

  <?php
  $donnees = file_get_contents("excel_tracking0.json");
  $result = json_decode($donnees,true);
  //$result = file_get_contents()
    if($result->num_rows>0){   ?>
    <?php  foreach ($result  as $value): ?>
      <tr>
        <td><?=$value['Numero'];?></td>
        <td><?=date("d/m/Y", strtotime($value['Date']));?></td>
        <td><?=(utf8_encode($value['statut']) ==="Livrée") ? date("d/m/Y H:i", strtotime($value['date_livraison'])) :" " ;?></td>
        <td><?=utf8_encode($value['statut']);?></td>
        <td><?=(utf8_encode($value['statut']) ==="Livrée")? "": utf8_encode($value['Motif']);?>
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
        <td><?=$value['Colis'];?></td>
        <td><?=$value['Poids'];?></td>
        <?php endif; ?>
        <?php if ($client_lve->CLIENT_COD==15038){ ?>
        <td><?=utf8_encode($value['Ville2']);?></td>
        <?php }else{ ?>
        <td><?=utf8_encode($value['adresse2']);?></td>
        <?php } ?></td>
        <?php if ($client_lve->CLIENT_COD==9588): ?>
         <td><?=utf8_encode($value["Ville2"]);?></td>
         <td><?=$value['num'];?></td>
        <?php endif; ?>
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
