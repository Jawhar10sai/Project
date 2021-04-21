<?php
#Page de preparation des déclaration pour la page consultation.php et le fichier excel_declaration.json
require_once "control_utilisateur.php";
$donnees = array();
if (isset($_POST['chercher'])) {
    if (!empty($_POST['vil']) || !empty($_POST['num']) || !empty($_POST['cod']) || !empty($_POST['dat']) || !empty($_POST['bl'])) {
    $munr =  $_POST['num'];
    $datt = $_POST['dat'];
    $ddat =  $_POST['datt'];
    $blll =  $_POST['bl'];
    $vil  = isset($_POST['vil']) ? $_POST['vil'] : "";
    $where = "WHERE `supprime_le` IS NULL ";
    if (!empty($munr))
      $where .= " and `numero` LIKE '%$munr%'";
    if (!empty($datt) )
      $where .= " and `date` between '$datt' and '$ddat'";
    if (!empty($_POST['cod'])) {
      $codd =  $_POST['cod'];
      $where .= " AND (`NOM` LIKE '$codd%' OR `CLIENT_COD` LIKE '$codd')";
    }
    if(!empty($blll))
      $where .= " and `BL` LIKE '%$blll%'";
    if (!empty($vil)  )
      $where .=" and `ville`='$vil'";
    $where .=" AND `client1_id`=".$client_lve->CLIENT_ID;
    $list_dec = $conn->query("SELECT DISTINCT * FROM `vdeclaration` $where ORDER BY `date`");
  }else
    $list_dec = $client_lve->MesDeclaration();
  }else
    $list_dec = $client_lve->MesDeclaration();
if ($list_dec){
if ($list_dec->num_rows>0) {
 if (!empty($list_dec)) {
  foreach ($list_dec as $row_list_dec) {
     $declarations->TrouverDeclaration($row_list_dec['numero']);
     $sous_client->TrouverClient($declarations->client2_id);
     $adresses->TrouverAdresse($declarations->id_adres);
    #
    $color = ($declarations->EtatDDP()=='En cours' ? 'table-warning' :($declarations->EtatDDP()=='Valide' ? 'table-success' : ''));
    #Tester si c'est express ou bien simple
    $expr = ($declarations->express=="X") ? "Oui" : "Non";
    #Tester le type de liraison
    $livr  = ($declarations->livraison == "D") ?  "À domicile" : ($declarations->livraison == "p" ? "Points relais" : "En gare");
    #Tester le type de courrier
    $typcr = ($declarations->courrier_typ == "M") ? "Messagerie" : ($declarations->courrier_typ == "25" ? "Affrêtement 25T" :($declarations->courrier_typ == "14" ? "Affrêtement 14T" :($declarations->courrier_typ == "5" ? "Affrêtement 5T" : "Affrêtement utilitaires")));
    #Tester le type de port
    $prt = ($declarations->port == "P") ? "Payé" : "Du";
    ?>
    <tr class="text-center <?=$color; ?>">
      <td>
        <button style="padding: 8;border-radius:50%;" class="btn btn-outline-info btn-sm" id="visuali"  data-toggle="modal" data-target="#supmod-<?= $row_list_dec['numero']; ?>"><i class="fas fa-info-circle"></i></button>
        <!--#######################################################################################################-->
        <div class="modal supmod" tabindex="-1" role="dialog" id="supmod-<?= $row_list_dec['numero']; ?>">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Consultation</h5>
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
              <table class="table table-bordered">
                <tr>
                  <th class="text-left">Numéro de déclaration:</th>
                  <td class="text-center"><?=$declarations->numero;?></td>
                </tr>
                <tr>
                  <th class="text-left">Date: </th>
                  <td class="text-center"><?=date('d/m/Y',strtotime($declarations->date));?></td>
                </tr>
                <tr>
                  <th class="text-left">Colis: </th>
                  <td class="text-center"><?=$declarations->colis;?></td>
                </tr>
                <tr>
                  <th class="text-left">Poids: </th>
                  <td class="text-center"><?=$declarations->poids;?></td>
                </tr>
                <tr>
                  <th class="text-left">Valeur: </th>
                  <td class="text-center"><?=number_format($declarations->valeur, 2, ',', ' ');?></td>
                </tr>
                <tr>
                  <th class="text-left">Destinataire: </th>
                  <td class="text-center"><?=strtoupper($sous_client->NOM);?></td>
                </tr>
                <tr>
                  <th class="text-left">Livraison: </th>
                  <td class="text-center"><?=$livr;?></td>
                </tr>
                <tr>
                  <th class="text-left">Express: </th>
                  <td class="text-center"><?=$expr;?></td>
                </tr>
                <tr>
                  <th class="text-left">Port: </th>
                  <td class="text-center"><?=$prt;?></td>
                </tr>
                <tr>
                  <th class="text-left">Courrier: </th>
                  <td class="text-center"><?=$typcr;?></td>
                </tr>
                <tr>
                  <th class="text-left">Nature: </th>
                  <td class="text-center"><?=$declarations->nature;?></td>
                </tr>
                <tr>
                  <th class="text-left">Espece: </th>
                  <td class="text-center"><?=number_format($declarations->Espece, 2, ',', ' ');?></td>
                </tr>
                <tr>
                  <th class="text-left">Cheque: </th>
                  <td class="text-center"><?=number_format($declarations->Cheque, 2, ',', ' ');?></td>
                </tr>
                <tr>
                  <th class="text-left">Traite: </th>
                  <td class="text-center"><?=number_format($declarations->Traite, 2, ',', ' ');?></td>
                </tr>
                <tr>
                  <th class="text-left">BL: </th>
                  <td class="text-center"><?=$declarations->BL;?></td>
                </tr>
                <tr>
                  <th class="text-left">Statut: </th>
                  <td class="text-center"><?=$declarations->statut;?></td>
                </tr>
                <tr>
                  <th class="text-left">Commentaire: </th>
                  <td class="text-center"><?=$declarations->commentaire;?></td>
                </tr>
                <tr>
                  <th class="text-left">Adresse: </th>
                  <td class="text-center"><?=ucfirst($adresses->adresse);?></td>
                </tr>
              </table>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-sm btn-lve" style="padding: 8px;"  name="button" onClick="javascript:window.open('etiquettes/<?= $row_list_dec['numero'];?>','_blank','status=yes,resizable=no,top=0,left=0,width=280,height=130');">
                  <i class="fa fa-print" aria-hidden="true"></i> Etiquettes
                </button>
                 <a class="btn btn-info btn-sm btn-lve" style="padding: 8px;"  href="Déclaration/<?= $row_list_dec['numero']; ?>" target="_blank">
                   <i class="fa fa-print" aria-hidden="true"></i> Déclarations
                 </a>
                <button style="padding: 8px;" type="button" class="btn btn-danger btn-sm btn-lve" data-dismiss="modal">
                  <i class="fas fa-times"></i> Fermer
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      </td>
      <td><?= $declarations->numero; ?></td>
      <td><?=date('d/m/Y',strtotime($declarations->date)); ?></td>
      <td class="text-center"><?= $declarations->colis; ?></td>
      <td class="text-right"><?= number_format($declarations->valeur, 2, ',', ' '); ?></td>
      <?php if($nom_d_utilisateur=='Sisal Maroc'):?>
        <td class="text-right"><?= $sous_client->CLIENT_COD; ?></td>
      <?php endif; ?>
      <td><?= strtoupper($sous_client->NOM); ?></td>
      <td><?= $livr; ?></td>
      <td><?= $expr;?></td>
      <td><?= $prt; ?></td>
      <td><?= $typcr; ?></td>
      <td><?= $declarations->nature; ?></td>
    </tr>
    <?php
    #header('content-type: application/json; charset=utf-8');
    $donnees[] = array('numero' => $declarations->numero,
                                 'date' => date('d/m/Y',strtotime($declarations->date)),
                                 'colis' => $declarations->colis,
                                 'destinataire' =>  strtoupper($sous_client->NOM),
                                 'livraison' => $livr,
                                 'typeliv' => $expr,
                                 'port' => $prt,
                                 'courrier_typ' => $typcr,
                                 'nature' => $declarations->nature,
                                 'BL' => $declarations->BL);
    }
    $donnees = json_encode($donnees);
    file_put_contents("excel_declaration.json",$donnees);
  }else {
      ?>
      <tr>
        <td colspan="12" class="text-center">Pas de resultat!</td>
      </tr>
      <?php
      }
}else {
    ?>
    <tr>
      <td colspan="12" class="text-center">Pas de resultat!</td>
    </tr>
    <?php
}
}else {
    ?>
    <tr>
      <td colspan="12" class="text-center">Pas de resultat!</td>
    </tr>
    <?php
}
 ?>
