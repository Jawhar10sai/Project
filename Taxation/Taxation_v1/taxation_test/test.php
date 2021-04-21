<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
require_once('txheads.php');
$oldconnection = new mysqli('localhost','lve','adminlvedba','lvedbmobile');
if ( isset($_POST['filtrer'])) {
  $date1 = $_POST['date1'];
  $date2 = $_POST['date2'];
  $clientcode = $_POST['codeclient'];
}
else {
  $date1 = date('Y-m-'.(date('d')-1));
  $date2 = date('Y-m-d');
  $clientcode = $clients->CODUSER($_SESSION['user_id']);
}
if($clientcode ==15038 || $clientcode ==362){
	$disabed ='disabled';
}else{
$disabed ='';
}
$result = $oldconnection->query("SELECT *
FROM expedition_tracking_v
WHERE  code_expediteur='$clientcode'
AND  (datedesaisie BETWEEN '$date1'  AND '$date2')
order by  livraisondate  DESC");
$suivisenvois ='active';
 ?>
 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="UTF-8">
     <title>Suivis des envois</title>
     <style media="screen">
     #foot{
       background-color: #ffffff;
       border-radius: 5px;
       border: 1px solid;
     }
     </style>
   </head>
   <body onload="specifier()" style="  background-image: url('images/LOGOSANS150.jpg');
     background-size: 150px 104px;
     background-repeat: repeat;
 	/*zoom: 90%;*/">
     <!--###################################################################################-->
			<?php include_once("navbar.php"); ?>
	 <!--###################################################################################-->
  <div class="container-fluid" style="margin-top:80px;">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
          <h4><b>Suivis des envois</b></h4>

          </div>
          <div class="card-body">
            <h5>Compte Client: <?=$_SESSION['usernom'];?></h5>
				<div class="container">
				  <div class="row">
				  <div class="col-12">
						<form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
						<input type="hidden" class="form-control" name="codeclient" value="<?=$clients->CODUSER($_SESSION['user_id']);?>">
						  <div class="form-row">
							<div class="form-group col-md-4 col-xs-12">
							  <label for="">Du</label>
							  <input type="date" class="form-control" name="date1">
							</div>
							<div class="form-group col-md-4 col-xs-12">
							  <label for="">Au</label>
							  <input type="date" class="form-control" name="date2">
							</div>
							<div class="form-group col-md-4 col-xs-12">
								<button type="submit" class="btn btn-success btn-lg col-md-12 col-xs-12" name="filtrer" style="margin-top:25px;"> <span class="fa fa-filter"></span> Filtrer</button>
								<button type="button" onclick="exportTableToExcel()" class="btn btn-info btn-lg col-md-12 col-xs-12" disabled style="margin-top:10px;"> <i class="fas fa-file-excel"></i> Exporter vers Excel</button><label>En maintenance</label>
							</div>
						  </div>

						</form>
				    </div>
				  </div>
				</div>
				<div style="height:485px; overflow-y: scroll;">
			<table id="dvData" class="table table-bordered col-12 tracktable table-striped">
              <tr>
                <td class="text-center h6">Declaration</td>
                <td class="text-center h6">Date d'expedition</td>
                <td class="text-center h6">Date de livraison</td>
                <td class="text-center h6">Statut de livraison</td>
				<?php if ($clientcode==15038): ?>
				<td class="text-center h6">Code detaillant</td>
				<?php endif;?>
                <td class="text-center h6">Destinataire</td>
				<?php if ($clientcode==362): ?>
				<td class="text-center h6">colis</td>
				<td class="text-center h6">Poids</td>
				<?php endif;?>
                <td class="text-center h6">Adresse</td>
                <td class="text-center h6">Motifs</td>
				<?php if ($clientcode==9616): ?>
				<td class="text-center h6">Documents</td>
				<?php endif;?>

              </tr>
				<?php
					if($result->num_rows>0){
				?>
				              <?php  foreach ($result  as $value): ?>
                <tr>
                  <td><?=$value['numero'];?></td>
                  <td><?=date("d/m/Y", strtotime($value['datedesaisie']));?></td>
                  <td><?php
				  $etatini = $declarations->GetLibCodeLiv($value['livraisoncode']);
					if($etatini=="Livrée")
							echo date("d/m/Y", strtotime($value['livraisondate']));
						else
							echo "";
					?></td>
                  <td><?php
						echo $declarations->GetLibCodeLiv($value['livraisoncode']);
				  ?></td>
				  <?php
					if ($value['code_expediteur']==15038){
					$ndset = explode(' - ',$value['destinataire']);
					?>
					<td><?=$ndset[0];?></td>
					<?php $destinataire=$ndset[1];
					}else
						$destinataire= $value['destinataire'];
				  ?>
                  <td><?= $destinataire; ?></td>
				  <?php if ($value['code_expediteur']==362): ?>
				  <td><?=$value['colis'];?></td>
				  <td><?=$value['poids'];?></td>
				  <?php endif; ?>
                  <td><?=$value['adresse2'];?></td>
                  <td><?=$declarations->GetLibCodeMotif($value['motif']);?></td>
				  <?php if ($value['code_expediteur']==9616): ?>
                  <td class="text-center">
					<button class="btn btn-info btn-sm" id="idcontract"  data-toggle="modal" data-target="#contract-<?=$value['numero'];?>"><img src="http://46.18.132.236:8089/upload_mobile_BL/2019m1/<?=$value['courrierid'];?>/exp.jpg" alt="Expédition" class="img-thumber" width="50px;" height="50px;"></button>
					<!--#######################################################################################################-->
					  <div class="modal contract" tabindex="-1" role="dialog" id="contract-<?=$value['numero'];?>">
					  <div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							<img src="http://46.18.132.236:8089/upload_mobile_BL/2019m1/<?=$value['courrierid'];?>/exp.jpg" alt="Expédition" class="img-thumber" width="600px;" height="600px;">
							<div class="modal-footer">
								 <a target="_blank" type="button" class="btn btn-success" href="http://46.18.132.236:8089/upload_mobile_BL/2019m1/<?=$value['courrierid'];?>/contrat.jpg" download >T&eacute;l&eacute;charger</a>
							  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
							</div>
						  </div>
						</div>
					  </div>
					</div>

					<button class="btn btn-info btn-sm" id="idcin"  data-toggle="modal" data-target="#cin-<?=$value['numero'];?>"><img src="http://46.18.132.236:8089/upload_mobile_BL/2019m1/<?=$value['courrierid'];?>/cin.jpg" alt="CIN"  class="img-thumber" width="50px;" height="50px;"></button>
					<!--#######################################################################################################-->
					  <div class="modal cin" tabindex="-1" role="dialog" id="cin-<?=$value['numero'];?>">
					  <div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
					<img src="http://46.18.132.236:8089/upload_mobile_BL/2019m1/<?=$value['courrierid'];?>/cin.jpg" alt="CIN"  class="img-thumber" width="600px;" height="600px;">
							<div class="modal-footer">
							  <a target="_blank" download type="button" class="btn btn-success" href="http://46.18.132.236:8089/upload_mobile_BL/2019m1/<?=$value['courrierid'];?>/cin.jpg">T&eacute;l&eacute;charger</a>
							  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
							</div>
						  </div>
						</div>
					  </div>
					</div>

				  </td>
				  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
				<?php
				}else{
				?>
				<tr>
					<td class="text-center" colspan="9">Pas d'exp&eacute;ditions pour le moment</td>
				</tr>
				<?php
				}
				?>

            </table>
				</div>
          </div>
        </div>
      </div>
    </div>
  </div>
      <div class="container" id="foot">
      <div class="row">
         <div class="text-center col-lg-6 offset-lg-3">
            <p><span style="font-size: 8pt;">LA VOIE EXPRESS 2 S.A au Capital 23.077.000,00 Dhs - 19, Rue Abou Bkr Ibnou Koutia, A&icirc;n Seba&acirc; &ndash; Casablanca</span><br /><span style="font-size: 8pt;">RC 95457 &ndash; IF 01601949 &ndash; Patente 37951124 &ndash; CNSS 2640961 &ndash; ICE 001526339000073</span><br /><span style="font-size: 8pt;">T&eacute;l : 05 22 34 43 16 / Fax : 0522344264 </span><br /><span style="font-size: 8pt;">Site : <a href="http://www.lavoieexpress.com">www.lavoieexpress.com</a> &ndash; E-mail ; client@lavoieexpress.ma </span><br /><span style="font-size: 8pt;">La valeur d&eacute;clar&eacute;e est de cent (100 Dhs) en cas de non d&eacute;claration de valeur. Les Clauses et conditions g&eacute;n&eacute;rales de transport Marchandise et Messagerie sont consultables aupr&egrave;s de LA VOIE EXPRESS ou des ses Agences et sont accessibles sur son site Internet. </span></p>
         </div>
      </div>
    </div>
  <script>
  /*
  $(document).ready(function() {
    $('.tracktable').DataTable({
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
} );
function exportTableToExcel(tableID, filename = ''){
var downloadLink;
var dataType = 'application/vnd.ms-excel';
var tableSelect = document.getElementById('dvData');
var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

// Specify file name
filename = filename?filename+'.xls':'mes_declarations.xls';

// Create download link element
downloadLink = document.createElement("a");

document.body.appendChild(downloadLink);

if(navigator.msSaveOrOpenBlob){
    var blob = new Blob(['\ufeff', tableHTML], {
        type: dataType
    });
    navigator.msSaveOrOpenBlob( blob, filename);
}else{
    // Create a link to the file
    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

    // Setting the file name
    downloadLink.download = filename;

    //triggering the function
    downloadLink.click();
}
}*/
</script>
  </body>
</html>
