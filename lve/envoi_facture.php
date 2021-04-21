<?php
session_start();
$etap = '';
include("config/connect_m.php"); 
 
include("functions/reglages.php"); 
include("functions/function.php"); 
include("wmailer/class.mailer.php");

if(isset($_SESSION['id_acces']) and !empty($_SESSION['id_acces'])){
if(isset($_GET['commande'])){

/**
	Commande
**/
				$idcommande=intval($_GET['commande']);
				
				$idclient=$_SESSION['id_acces'];
				$req_commande = "SELECT e.id AS id_client,e.*,c.*,c.id AS idcommande,t.type_paiement,tc.* FROM commandes c,espace_securise e,type_paiement t,transport_catalogue tc where t.id = c.type_payement AND c.id_client = e.id AND c.type_livraison = tc.id AND c.id='$idcommande' and e.id='$idclient' order by c.date";
				$commande  = mysql_query($req_commande ,$connect_m);
				$row_commande  = mysql_fetch_assoc($commande); 
				$devise = $row_commande['devise'];
				$email=$row_commande["email"];
/**
	Facturation
**/
				$req_facturation = "SELECT * FROM adresses_client WHERE id_client = '".$row_commande['id_client']."' AND type = 'facturation'";
				$facturation  = mysql_query($req_facturation ,$connect_m);
				$row_facturation  = mysql_fetch_assoc($facturation);
				$num_facturation  = mysql_num_rows($facturation);
				$numid="";
				switch(strlen ($row_commande['id']))
				{
					case 1:
					$numid="0000".$row_commande['id'];
					break;
					case 2:
					$numid="000".$row_commande['id'];
					break;
					case 3:
					$numid="00".$row_commande['id'];
					break;
					case 4:
					$numid="0".$row_commande['id'];
					break;
					default:
					$numid=$row_commande['id'];
				}
				$ref_facture = strftime('%Y',strtotime($row_commande['date'])).$numid;					
$msg='<meta charset="UTF-8">
<table width="800" height="604" border="0" align="center" cellpadding="0" cellspacing="0" style="font:14px \'Century Gothic\',Century;color:#4e4e50">
	<tbody><tr>
		<td width="453" height="110"><img width="383" height="73" alt="" src="https://ci3.googleusercontent.com/proxy/MGO4K-Wak4z7rmcZTccXK_4GweVqiz4ewlT1q4U-PZj3Tw3JirkbSIIFwF47eEka7nO6pnAb6L43qMX-_VKDmpDi8A6oNj0UGRTYQt9cqgqNr7O_CqRfw4onxJnD=s0-d-e1-ft#http://marketstudies.oneoweb.com/uploads/site_69/images/Header/LOGO.png">
									<br>Date: '.strftime('%d/%m/%Y',strtotime($row_commande['date'])).'<br>
									N° Facture: '.$ref_facture.'<br>
		</td>
		
		<td width="347" align="right"><div style="text-align:left;"><span style="font-size:20px;color:#c20000">'.$row_commande['nom_prenom'].'</span><br>
										'.$row_facturation['adresse'].'<br>
										'.$row_facturation['code_postal'].' '.$row_facturation['ville'].'<br>
										'.$row_facturation['pays'].'<br>
</div></td>
	</tr>
	<tr>
		<td height="44" colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" valign="top">
		<!--Contenu details-->
			<table style="border-collapse: separate;border-spacing: 2px;border-color: gray;border: 1px solid #CCCCCC;padding: 2px; width:100%">
				<thead>
					<tr style="font-family: Century Gothic, Century;font-size: 11px;color: #595959;">
						<th colspan="2" style="background: none repeat scroll 0 0 #CCCCCC;font-weight: bold;text-transform: uppercase;width:40%">
							ARTICLE(S)
						</th>
						<th style="background: none repeat scroll 0 0 #CCCCCC;font-weight: bold;text-transform: uppercase;">
							RÉFÉRENCE
						</th>
						<th style="background: none repeat scroll 0 0 #CCCCCC;font-weight: bold;text-transform: uppercase;">
							QUANTITE
						</th>
						<th style="background: none repeat scroll 0 0 #CCCCCC;font-weight: bold;text-transform: uppercase;">
							PRIX UNITAIRE
						</th>
						<th style="background: none repeat scroll 0 0 #CCCCCC;font-weight: bold;text-transform: uppercase;">
							TAXE
						</th>
						<th style="background: none repeat scroll 0 0 #CCCCCC;font-weight: bold;text-transform: uppercase;">
							PRIX TTC
						</th>
						
						<th style="background: none repeat scroll 0 0 #CCCCCC;font-weight: bold;text-transform: uppercase;">
							PRIX TOTAL
						</th>
					</tr>	
				</thead>
				<tbody>';
				
									/**
										details commande
									**/
									$req_pr_commande = "SELECT * FROM commande_produit where id_commande='".$idcommande."'";
									$pr_commande  = mysql_query($req_pr_commande ,$connect_m);
									$row_pr_commande  = mysql_fetch_assoc($pr_commande);
									$totalht=0;
									$totalttc=0;
									do {
										
									$req_articles = "SELECT * FROM produit where id='".$row_pr_commande['id_produit']."'";
									$articles  = mysql_query($req_articles ,$connect_m);
									$row_articles  = mysql_fetch_assoc($articles);	
									$catalogue_slider = "SELECT * FROM images_produit where id_produit='".$row_pr_commande['id_produit']."' AND couverture = '1' LIMIT 1";
									$req_catalogue_slider = mysql_query($catalogue_slider ,$connect_m);
									$row_catalogue_slider = mysql_fetch_assoc($req_catalogue_slider);
									$num_catalogue_slider = mysql_num_rows($req_catalogue_slider);
										$taxe=0;
										if($row_articles['taxe']!=0){
										/**
											Recuperation de la tva
										**/
										$query_tva="Select * from taxes where id=".$row_articles['taxe']; 
										$resultat_tva=mysql_query($query_tva);
										$row_tva=mysql_fetch_assoc($resultat_tva);
										$taxe=$row_pr_commande['prix_ht']*($row_tva['valeur']/100);
										}
								
				$msg.='
					<tr>
						<td style="border: 1px solid #FFFFFF;font-family: Century Gothic, Century;font-size: 11px;color: #595959;">        
																		<img src="'.$row_catalogue_slider['image'].'" width="60">
						</td>
						  <td class="cart_description">'.$row_pr_commande['produit'].'</td>
						  <td align="center" class="cart_ref">'.$row_articles['ref'].'</td>
						  <td align="center" class="cart_quantity"><div class="cart_quantity_button"> '.$row_pr_commande['nbr_produit'].' </div></td>
						  <td align="center" class="cart_unit"><span id="product_price_0" class="price"> '.$row_pr_commande['prix_ht'].' '.$devise.' HT</span></td>
						  <td align="center" class="cart_unit"><span id="product_price_0" class="price"> '.$taxe.' '.$devise.' </span></td>
						  <td align="center" class="cart_unit"><span id="product_price_0" class="price"> '.$row_pr_commande['prix'].' '.$devise.' TTC</span></td>
						  
						  <td align="center" class="cart_total"><span id="total_product_price_0" class="price"> '.$row_pr_commande['nbr_produit']*$row_pr_commande['prix_ht'].'</span> '.$devise.' HT</td>
						  
						</tr>
						';
				
							$totalht+=($row_pr_commande['prix_ht']*$row_pr_commande['nbr_produit']);
							$totalttc+=($row_pr_commande['prix']*$row_pr_commande['nbr_produit']);
							}while($row_pr_commande  = mysql_fetch_assoc($pr_commande));
							 if($row_commande['taxe_transport'] > 0){$fraitT =  $row_commande['taxe_transport'].' '.$devise;}else{ $fraitT= 'Gratuit';} 
							$totalglobal=$totalht + $totalttc + $row_commande['taxe_transport']; // calcule montant global
				$msg.='
				</tbody>
				<tfoot>
					<tr style="font-family: Century Gothic, Century;font-size: 11px;color: #595959;">
					  <td colspan="7" style="font-size: 18px;text-align: right;border: medium none;padding: 20px 12px !important;background: none repeat scroll 0 0 #CCCCCC;font-weight: bold;text-transform: uppercase">MONTANT TOTAL :</td>
					  <td colspan="2" style="color: #d90d0d;border: medium none;padding: 20px 12px !important;background: none repeat scroll 0 0 #CCCCCC;font-weight: bold;text-transform: uppercase;"><span>'.$row_commande['total'].'</span> '.$devise.'</td>
					</tr>
				</tfoot>
			</table>
			<div style="float: left !important;width: 100% !important;">
				<div style="float: left;padding: 20px 0;width: 70% !important;">
					
				</div>
				<div style="float: right;width: 30% !important;">
					<h3 style="color: #D90D0D !important;"><strong>Montant total HT : '.$totalht.' '.$devise.'</strong></h3>
					<h3 style="color: #D90D0D !important;"><strong>Montant total T.V.A : '.$totalttc.' '.$devise.'</strong></h3>
					<h3 style="color: #D90D0D !important;">Total des frais de port : '.$fraitT.'</h3>
					<div style="float: left;font-size: 16px;padding-left: 30px !important;padding-right: 30px !important;text-transform: uppercase !important;width: auto !important;color: #FFFFFF !important;background: #d90d0d;">
						MONTANT FINAL TTC : '.$totalglobal.' '.$devise.'					</div>
				</div>
				<div>			

				</div>
			</div>		
		<!--Contenu details-->
        </td>
	</tr>
	<tr>
		<td height="20" colspan="2"></td>
	</tr>
	<tr>
		<td height="69" colspan="2" align="center"><div style="border-top:3px solid #c20000;width:100%;min-height:69px;float:left;padding:6px 0;font-size:10px">Market Studies<br>
GENESE Management & Consulting<br>
		  12,  Rue Sabri Boujemâa (Derrière Lydec), 20110 Casablanca.</div></td>
	</tr>
</tbody></table>'; 
			echo $msg;	
			/*$mailer = new Mailer();
			$mailer->set_priority('Highest');
			$mailer->set_from('facturation@marketstudies.ma');
			$mailer->set_address($email);
			$mailer->set_format('html');
			$mailer->set_subject("Facture N : ".$ref_facture);
			$mailer->set_message(utf8_decode($msg), array('TAG1' => ''));
			$mailer->send();*/

}
}

?>