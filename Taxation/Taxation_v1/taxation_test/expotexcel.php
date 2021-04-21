<?php
  session_start();
  include_once ("classes/conftaxDB.php");
  include_once ("classes/fetchclas.php");
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=mes_declarations.xls');
  if (isset($_SESSION['query_export'])) {
        if ($_SESSION['query_export']!="") {
			$clientcode = $clients->CODUSER($_SESSION['user_id']);
          $oldconnection = new mysqli('localhost','lve','adminlvedba','lvedbmobile');
          $resss = $oldconnection->query($_SESSION['query_export']);
    }
	}
	?>
   <table border="1">
   <tr>
       <th><?=mb_convert_encoding("Déclaration",'utf-16','utf-8');?></th>
       <th>Date d'expedition</th>
       <th>Date de livraison</th>
       <th>Statut de livraison</th>
       <?php if ($clientcode==15038): ?>
        <th>Code detaillant</th>
       <?php endif; ?>
        <th>Destinataire</th>
        <?php if ($clientcode==362): ?>
          <th>colis</th>
          <th>Poids</th>
        <?php endif; ?>
        <th>Adresse</th>
        <th>Motifs</th>
    </tr>
    <?php foreach ($resss as $row): ?>
      <tr>
        <td><?=$row["numero"];?></td>
        <td><?=date("d/m/Y", strtotime($row["datedesaisie"]));?></td>
        <?php
        $statut = utf8_encode($row["Statut_Livraison"]);
            if ($statut ==="Livrée") {
              $dateliv = date("d/m/Y", strtotime($row["livraisondate"]));
            }else {
              $dateliv ="";
            }
        ?>
        <td><?=$dateliv;?></td>
        <td><?=mb_convert_encoding($statut,'utf-16','utf-8');?></td>
        <?php
         if ($clientcode==15038){
           $ndset = explode(' - ',$row["destinataire"]);
           if ($ndset ==="") {
             $ndset[0] = "";
             $ndset[1] = "";
           }
           ?>
           <td><?=$ndset[0];?></td>
           <?php
               $destinataire = $ndset[1];
             }else {
               $destinataire = $row["destinataire"];
             }
         ?>
         <td><?=mb_convert_encoding($destinataire,'utf-16','utf-8');?></td>
           <?php if ($clientcode==362): ?>
             <td><?=mb_convert_encoding($row["colis"],'utf-16','utf-8');?></td>
             <td><?=mb_convert_encoding($row["poids"],'utf-16','utf-8');?></td>
           <?php endif; ?>
            <td><?=mb_convert_encoding(utf8_encode($row["adresse2"]),'utf-16','utf-8');?></td>
            <td><?=mb_convert_encoding($declarations->GetLibCodeMotif($row["motif"]),'utf-16','utf-8');?></td>
          </tr>
    <?php endforeach; ?>
</table>
