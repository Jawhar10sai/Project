<?php
#Exportation des déclarations de la page de consultation et la page de tracking
#fonction de conversion des code JSON vers les lettres html

require_once "control_utilisateur.php";
#$clientcode = $client_lve->CLIENT_COD;
#header('Content-Type: application/xls');
#header('Content-Disposition: attachment; filename=mes_declarations.xls');
$donnees  = array();
if (isset($_POST['export_tracking'])) {
  #Exportation du tableau du tracking
  $donnees = file_get_contents("excel_tracking.json");
  $donnees = json_decode($donnees, true);
?>
  <table border="1">
    <tr>
      <th><?= mb_convert_encoding("Déclaration", 'utf-16', 'utf-8'); ?></th>
      <th><?= mb_convert_encoding("Date d'éxpedition", 'utf-16', 'utf-8'); ?></th>
      <th>Date de livraison</th>
      <th>Statut de livraison</th>
      <th>Motifs</th>
      <?php if ($client_lve->CLIENT_COD == 15038) : ?>
        <th><?= mb_convert_encoding("Code détaillant", 'utf-16', 'utf-8'); ?></th>
      <?php endif; ?>
      <?php if ($client_lve->CLIENT_COD == 9588) : ?>
        <th>Retailer</th>
      <?php endif; ?>
      <th><?= mb_convert_encoding("Déstinataire", 'utf-16', 'utf-8'); ?></th>
      <?php if ($client_lve->CLIENT_COD == 362) : ?>
        <th>Colis</th>
        <th>Poids</th>
      <?php endif; ?>
      <?php if ($client_lve->CLIENT_COD == 15038) { ?>
        <th class="text-center h6">Ville</th>
      <?php } else { ?>
        <th class="text-center h6">Adresse</th>
      <?php } ?>
      <?php if ($client_lve->CLIENT_COD == 9588) : ?>
        <th>City</th>
        <th>ILOT</th>
      <?php endif; ?>
    </tr>
    <?php foreach ($donnees as $row) : ?>
      <tr>
        <td><?= $row["Numero"]; ?></td>
        <td><?= date("d/m/Y", strtotime($row["Date"])); ?></td>
        <?php
        if ($row['statut_suivis'] == 'En saisie' || $row['statut_suivis'] == 'En preparation' || $row['statut_suivis'] == 'Préparée' || $row['statut_suivis'] == 'Livrée' || $row['statut_suivis'] == 'Retournée')
          $statut = Utf8_ansi($row["statut_suivis"]);
        else
          $statut = 'En cours';
        /*
          if ($row['statut_suivis']!='Livrée' && $row['statut_suivis']!='Retournée')
            $statut = 'En cours';
          else 
            $statut = Utf8_ansi($row["statut_suivis"]);*/
        ?>
        <td><?= ($statut === "Livrée") ? date("d/m/Y H:i", strtotime($row["date_livraison"])) : ""; ?></td>
        <td><?= mb_convert_encoding($statut, 'utf-16', 'utf-8'); ?></td>
        <td><?= (utf8_encode($row['statut_suivis']) === "Livrée") ? "" : mb_convert_encoding(Utf8_ansi($row['Motif']), 'utf-16', 'utf-8'); ?></td>
        <?php
        if ($client_lve->CLIENT_COD == 15038 || $client_lve->CLIENT_COD == 9588) {
          $ndset = explode(' - ', $row["destinataire"]);
          if (!isset($ndset[1])) {
            $ndset[1] = $ndset[0];
            $ndset[0] = "";
          }
        ?>
          <td><?= $ndset[0]; ?></td>
        <?php
          $destinataire = $ndset[1];
        } else {
          $destinataire = $row["destinataire"];
        }
        ?>
        <td><?= mb_convert_encoding(Utf8_ansi($destinataire), 'utf-16', 'utf-8'); ?></td>
        <?php if ($clientcode == 362) : ?>
          <td><?= $row["Colis"]; ?></td>
          <td><?= $row["Poids"]; ?></td>
        <?php endif; ?>
        <?php if ($clientcode == 15038) { ?>
          <td><?= mb_convert_encoding(Utf8_ansi($row["Ville2"]), 'utf-16', 'utf-8'); ?></td>
        <?php } else { ?>
          <td><?= mb_convert_encoding(Utf8_ansi($row["adresse2"]), 'utf-16', 'utf-8'); ?></td>
        <?php } ?>
        <?php if ($client_lve->CLIENT_COD == 9588) : ?>
          <td><?= mb_convert_encoding(Utf8_ansi($row["Ville2"]), 'utf-16', 'utf-8'); ?></td>
          <td><?= $row["num"]; ?></td>
        <?php endif; ?>
      </tr>
    <?php endforeach; ?>
  </table>
<?php
}
if (isset($_POST['export_declaration'])) {
  #Exportation du tableau de Consultation
  $donnees = file_get_contents("excel_declaration.json");
  $donnees = json_decode($donnees, true);
  $client_lve->ExporterMesDeclarations($donnees);
}
?>