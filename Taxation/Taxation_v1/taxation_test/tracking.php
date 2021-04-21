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
/*echo ("SELECT *
FROM expedition_tracking_v
WHERE  code_expediteur='$clientcode'
AND  (datedesaisie BETWEEN '$date1'  AND '$date2')
order by  livraisondate  DESC");
exit;*/
$result = $oldconnection->query("SELECT *
FROM expedition_tracking_v
WHERE  code_expediteur='$clientcode'
AND  (datedesaisie BETWEEN '$date1'  AND '$date2')
order by  livraisondate  DESC");
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
 	/*zoom: 90%;*//*zoom: 90%;*/">
  <nav class="navbar navbar-expand-lg navbar-inverse fixed-top navbar-dark" style="background-color:#a8a8a8;">
         <a class="navbar-brand" href="consultation.php"> <img src="images/voielvej.png" height="37.453" width="114" alt=""> </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                 <a class="nav-link" href="consultation.php" style="font-size:18px;">Consultaion</a>
              </li>
               <li class="nav-item">
                  <a class="nav-link" href="declaration.php" style="font-size:18px;">D&eacute;claration <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link " href="track.php" style="font-size:18px;">Suivi colis</a>
               </li>
               <?php if ($_SESSION['typuser']=="clientlve"): ?>
                 <li class="nav-item">
                    <a class="nav-link " href="agences.php" style="font-size:18px;">Mes sessions</a>
                 </li>
               <?php endif; ?>
               <!--<li class="nav-item">
                  <a class="nav-link" href="" style="font-size:18px;">Facturation</a>
               </li>-->
			     <li class="nav-item active">
                    <a class="nav-link " href="#" style="font-size:18px;">Suivis des envois</a>
                 </li>
               <li class="nav-item">
                  <a class="nav-link" href="Reclamation/" style="font-size:18px;">R&eacute;clamations</a>
               </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style=" padding: 5px;border-radius:15px;background-color: #CCCCCC;">
              <li class="nav-item">
                <a href="panierramass.php" style="color:red;"><img src="images/cart.png" width="25" height="25" alt=""><span style="padding-left: 15px;color:#545454;font-size:25px;"><?=$_SESSION['countcart'];?></span></a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right col-1">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?=$_SESSION['usernom'];?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="profile.php"><span><i class="fas fa-user"></i></span>Profile</a>
                  <a class="dropdown-item" href="deco.php"><span><i class="fa fa-sign-out-alt" aria-hidden="true"></i></span>Deconnecter</a>
                </div>
              </li>
            </ul>
         </div>
      </nav>
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
								<button type="submit" class="btn btn-success btn-lg col-md-4 col-xs-12" name="filtrer" style="margin-top:25px;"> <span class="fa fa-filter"></span> Filtrer</button>
							</div>
						  </div>

						</form>
				    </div>
				  </div>
				</div>
				<div style="height:485px; overflow-y: scroll;">
			<table class="table table-bordered col-12 tracktable table-striped">
              <tr>
                <td class="text-center h6">D&eacute;claration</td>
                <td class="text-center h6">Date d'exp&eacute;dition</td>
                <td class="text-center h6">Date de livraison</td>
                <td class="text-center h6">Statut de livraison</td>
				<?php if ($clientcode==15038): ?>
				<td class="text-center h6">Code d&eacute;taillant</td>
				<?php endif;?>
                <td class="text-center h6">D&eacute;stinataire</td>
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
                  <td><?=$value['datedesaisie'];?></td>
                  <td><?=date("d/m/Y", strtotime($value['livraisondate']));?></td>
                  <td><?php
					$etatini = $declarations->GetLibCodeLiv($value['livraisoncode']);
					if($etatini=="Livr�e"){
						$etat = "Livr&eacute;e";
					}elseif($etatini=="Annul�e"){
					$etat = "Annul&eacute;e";
					}else
						$etat = $etatini;
					echo $etat;
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
                  <td><?=$value['adresse2'];?></td>
                  <td><?=$declarations->GetLibCodeMotif($value['motif']);?></td>
				  <?php if ($value['code_expediteur']==9616): ?>
                  <td class="text-center">
					<button class="btn btn-info btn-sm" id="idcontract"  data-toggle="modal" data-target="#contract-<?=$value['numero'];?>"><img src="http://46.18.132.236:8089/upload_mobile_BL/2019m1/<?=$value['courrierid'];?>/exp.jpg" alt="Exp�dition" class="img-thumber" width="50px;" height="50px;"></button>
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
							<img src="http://46.18.132.236:8089/upload_mobile_BL/2019m1/<?=$value['courrierid'];?>/exp.jpg" alt="Exp�dition" class="img-thumber" width="600px;" height="600px;">
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
  <script>
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
                "previous": "Pr�c�dent",
                "next": "Suivant"
                }
        }
    } );
} );
</script>
  </body>
</html>
