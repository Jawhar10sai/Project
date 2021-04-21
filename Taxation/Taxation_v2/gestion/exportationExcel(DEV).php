<?php
#Preparation d'un fichier json personalisé pour afficher, synchroniser et exporter les expédition.
function Utf8_ansi($valor='') {
    $utf8_ansi2 = array(
    "\u00c0" =>"À",
    "\u00c1" =>"Á",
    "\u00c2" =>"Â",
    "\u00c3" =>"Ã",
    "\u00c4" =>"Ä",
    "\u00c5" =>"Å",
    "\u00c6" =>"Æ",
    "\u00c7" =>"Ç",
    "\u00c8" =>"È",
    "\u00c9" =>"É",
    "\u00ca" =>"Ê",
    "\u00cb" =>"Ë",
    "\u00cc" =>"Ì",
    "\u00cd" =>"Í",
    "\u00ce" =>"Î",
    "\u00cf" =>"Ï",
    "\u00d1" =>"Ñ",
    "\u00d2" =>"Ò",
    "\u00d3" =>"Ó",
    "\u00d4" =>"Ô",
    "\u00d5" =>"Õ",
    "\u00d6" =>"Ö",
    "\u00d8" =>"Ø",
    "\u00d9" =>"Ù",
    "\u00da" =>"Ú",
    "\u00db" =>"Û",
    "\u00dc" =>"Ü",
    "\u00dd" =>"Ý",
    "\u00df" =>"ß",
    "\u00e0" =>"à",
    "\u00e1" =>"á",
    "\u00e2" =>"â",
    "\u00e3" =>"ã",
    "\u00e4" =>"ä",
    "\u00e5" =>"å",
    "\u00e6" =>"æ",
    "\u00e7" =>"ç",
    "\u00e8" =>"è",
    "\u00e9" =>"é",
    "\u00ea" =>"ê",
    "\u00eb" =>"ë",
    "\u00ec" =>"ì",
    "\u00ed" =>"í",
    "\u00ee" =>"î",
    "\u00ef" =>"ï",
    "\u00f0" =>"ð",
    "\u00f1" =>"ñ",
    "\u00f2" =>"ò",
    "\u00f3" =>"ó",
    "\u00f4" =>"ô",
    "\u00f5" =>"õ",
    "\u00f6" =>"ö",
    "\u00f8" =>"ø",
    "\u00f9" =>"ù",
    "\u00fa" =>"ú",
    "\u00fb" =>"û",
    "\u00fc" =>"ü",
    "\u00fd" =>"ý",
    "\u00ff" =>"ÿ");
    return strtr($valor, $utf8_ansi2);
}
require_once "control_utilisateur.php";
$clientcode = $client_lve->CLIENT_COD;
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename=mes_declarations.xls');
$donnees  = array();
if (isset($_POST['export_tracking'])) {
  #Exportation du tableau du tracking
  $donnees = file_get_contents("excel_tracking.json");
  $donnees = json_decode($donnees,true);
?>
<table border="1">
    <tr>
        <?php
          if ($client_lve->CLIENT_COD==15038) {
            #Tester si le client est INTRALOT pour personalisé toutes les colones.
            ?>
            <th>Expedition</th>
            <th>Expedition date</th>
            <th>delivery date</th>
            <th>delivery State</th>
            <th>Motifs</th>
            <th>ILOT</th>
            <th>Address</th>
            <th>City</th>
            <?php
              }else {
            ?>
            <th><?=mb_convert_encoding("Déclaration",'utf-16','utf-8');?></th>
            <th><?=mb_convert_encoding("Date d'éxpedition",'utf-16','utf-8');?></th>
            <th>Date de livraison</th>
            <th>Statut de livraison</th>
            <th>Motifs</th>
            <?php if ($client_lve->CLIENT_COD==15038): ?>
             <th><?=mb_convert_encoding("Code détaillant",'utf-16','utf-8');?></th>
            <?php endif; ?>
             <th><?=mb_convert_encoding("Déstinataire",'utf-16','utf-8');?></th>
            <?php if ($client_lve->CLIENT_COD==362): ?>
             <th>Colis</th>
             <th>Poids</th>
            <?php endif; ?>
            <?php if ($client_lve->CLIENT_COD==15038){ ?>
             <th class="text-center h6">Ville</th>
            <?php }else{ ?>
             <th class="text-center h6">Adresse</th>
            <?php
               }
              }
             ?>
    </tr>
   <?php foreach ($donnees as $row): ?>
     <tr>
       <?php
        if (condition) {
      ?>
        <td><?=$row["numero"];?></td>
        <td><?=date("Y-m-d", strtotime($row["datedesaisie"]));?></td>
        <?php  $statut = Utf8_ansi($row["Statut_Livraison"]);?>
        <td><?=($statut ==="Livrée") ? date("Y-m-d", strtotime($row["livraisondate"])) : "";?></td>
        <td>
          <?php
          switch ($statut) {
              case 'En préparation':
                  echo "Preparing - Warehouse";
                  break;
              case 'Préparée':
                  echo "Prepared - Warehouse";
                  break;
              case 'En attente':
                  echo "Delivering";
                  break;
              case 'Livrée':
                  echo "Delivered";
                  break;
          }
           ?>
        </td>
        <td><?=;?></td>
        <td><?=;?></td>
        <td><?=;?></td>
        <td><?=;?></td>
      <?php
        }else {
          ?>
          <td><?=$row["numero"];?></td>
          <td><?=date("d/m/Y", strtotime($row["datedesaisie"]));?></td>
          <?php  $statut = Utf8_ansi($row["Statut_Livraison"]);?>
          <td><?=($statut ==="Livrée") ? date("d/m/Y", strtotime($row["livraisondate"])) : "";?></td>
          <td><?=mb_convert_encoding($statut,'utf-16','utf-8');?></td>
          <td><?=($statut ==="Livrée") ? "" : Utf8_ansi($declarations->GetLibCodeMotif($value['motif']));?></td>
          <?php
            if ($client_lve->CLIENT_COD==15038){
               $ndset = explode(' - ',$row["destinataire"]);
            if ( ! isset($ndset[1])) {
               $ndset[1] = $ndset[0];
               $ndset[0] = "";
            }
             ?>
             <td><?=$ndset[0];?></td>
             <?php
                 $destinataire = $ndset[1];
               }else {
                 $destinataire = $row["destinataire"];
               }
           ?>
           <td><?=mb_convert_encoding(Utf8_ansi($destinataire),'utf-16','utf-8');?></td>
             <?php if ($clientcode==362): ?>
               <td><?=$row["colis"];?></td>
               <td><?=$row["poids"];?></td>
             <?php endif; ?>
         <?php if ($clientcode==15038){ ?>
              <td><?=mb_convert_encoding(Utf8_ansi($row["ville2"]),'utf-16','utf-8');?></td>
        <?php }else{ ?>
              <td><?=mb_convert_encoding(Utf8_ansi($row["adresse2"]),'utf-16','utf-8');?></td>
        <?php
          }
        }
        ?>
     </tr>
   <?php endforeach; ?>
</table>
<?php
}
if (isset($_POST['export_declaration'])) {
  #Exportation du tableau de Consultation
  $donnees = file_get_contents("excel_declaration.json");
  $donnees = json_decode($donnees,true);
  ?>
  <table border="1">
    <tr>
      <th>Numero</th>
      <th>Date</th>
      <th>Colis</th>
      <th>Destinataire</th>
      <th>Livraison</th>
      <th>Express</th>
      <th>Port</th>
      <th>Courrier</th>
      <th>Nature</th>
      <th>Num BL</th>
    </tr>
    <?php foreach ($donnees as $decs): ?>
      <tr>
        <td><?=$decs['numero']; ?></th>
        <td><?=$decs['date']; ?></th>
        <td><?=$decs['colis']; ?></th>
        <td><?=mb_convert_encoding(Utf8_ansi($decs['destinataire']),'utf-16','utf-8'); ?></td>
        <td><?=mb_convert_encoding(Utf8_ansi($decs['livraison']),'utf-16','utf-8'); ?></td>
        <td><?=mb_convert_encoding(Utf8_ansi($decs['typeliv']),'utf-16','utf-8'); ?></td>
        <td><?=mb_convert_encoding(Utf8_ansi($decs['port']),'utf-16','utf-8'); ?></td>
        <td><?=mb_convert_encoding(Utf8_ansi($decs['courrier_typ']),'utf-16','utf-8'); ?></td>
        <td><?=mb_convert_encoding(Utf8_ansi($decs['nature']),'utf-16','utf-8'); ?></td>
        <td><?=$decs['BL']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <?php
}
 ?>
