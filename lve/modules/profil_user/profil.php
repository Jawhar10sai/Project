<?php
	
	if(isset($_SESSION['nom_acces']) and !empty($_SESSION['nom_acces'])){
			if(isset($_GET['Informations']) && $_GET['Informations'] == ''){
				
				/**
					Mise a jour les informations client
				**/
				if(isset($_POST['id_formulaire'])){
				
					/**
						conversion date naissance
					**/
					$naissance=$_POST['annees'].'-'.$_POST['mois'].'-'.$_POST['jours'];
					$query="update `formulaire_inscription` set
					civilite='".$_POST['civilite']."',
					naissance='".$naissance."',	
					prenom='".$_POST['prenom']."',
					adresse='".$_POST['adresse']."',
					nom='".$_POST['nom']."',
					code_postale='".$_POST['postal']."',
					fixe='".$_POST['telephone']."',
					ville='".$_POST['ville']."',
					email='".$_POST['email']."',
					pays='".$_POST['pays']."',
					mobile='".$_POST['mobile']."'
					where
					id=".intval($_POST['id_formulaire']);
					mysql_query($query,$connect_m);
				}
				
				$id_client = $_SESSION['id_acces'];
	
	$client = "SELECT * FROM espace_securise WHERE id = '".$id_client."'";
	$query_client = mysql_query($client,$connect_m);
	$row_client = mysql_fetch_array($query_client);
	/**
		Ajouter par yassine
		Requet selection formulaire_inscription
	**/
	$query_form="Select * from `formulaire_inscription`  where id_site=".$row_client['id_site']." AND id=".$row_client['id_point'];
	$query_form_exec=mysql_query($query_form,$connect_m);
	$row_form = mysql_fetch_assoc($query_form_exec);
	
	 ?>
 <div id="container">
    <div id="monCompte">
        <?php include('menu_espace.php'); ?>
        <div class="blocRight">
			
			<div class="bgRed whiteColor bar_infos">
				Mes informations
			</div>
			<?php
			/**
				conversion date
			**/
			$jour=substr($row_form['naissance'],8,2);
			$mois=substr($row_form['naissance'],5,2);
			$annees=substr($row_form['naissance'],0,4);
			?>
			<form method="post">
			<table class="formulaire_adresse" id="formID"width="90%">
				<tr>
				<td width="50%"> <h2>INFORMATIONS PERSONNELLES</h2> </td>
				<td width="50%"><h2>VOTRE ADRESSE</h2></td>
				</tr>
				<tr>
				<td>Civilité : <input type="radio" name="civilite" value="M" <?php if($row_form['civilite'] == "M"){?> checked="checked" <?php } ?>/> M<input type="radio" name="civilite" value="Mme" <?php if($row_form['civilite'] == "Mme"){?> checked="checked" <?php } ?> /> Mme<input type="radio" name="civilite" value="Mlle" <?php if($row_form['civilite'] == "Mlle"){?> checked="checked" <?php } ?> /> Mlle</td>
				<td>Nom de l'adresse : <strong class="RedColor">*</strong></td>
				</tr>
				<tr>
				  <td>Prénom <strong class="RedColor">*</strong></td>
				  <td><input type="text" name="nom_adresse" id="nom_adresse" class="validate[required]" value="<?php echo $row_form['nom_adresse']?>"/></td>
		      </tr>
				<tr>
				<td><input type="text" name="prenom" id="prenom" class="validate[required]" value="<?php echo $row_form['prenom']?>"/></td>
				<td>Adresse <strong class="RedColor">*</strong></td>
				</tr>
				<tr>
				<td>Nom <strong class="RedColor">*</strong></td>
				<td><input type="text" name="adresse2" id="adresse2" class="validate[required]" value="<?php echo $row_form['adresse']?>"/></td>
				</tr>
				
				<tr>
				<td><input type="text" name="nom" id="nom" class="validate[required]" value="<?php echo $row_form['nom']?>"/></td>
				<td>Code postale <strong class="RedColor">*</strong></td>
				</tr>
				<tr>
				<td>Telephone <strong class="RedColor">*</strong></td>
				<td><input type="text" name="postal" id="postal" class="validate[required]" value="<?php echo $row_form['code_postale']?>"/></td>
				</tr>
				
				<tr>
				<td><input type="text" name="telephone"  id="telephone" class="validate[required]" value="<?php echo $row_form['fixe']?>"/></td>
				<td>Ville <strong class="RedColor">*</strong></td>
				</tr>
				<tr>
				<td>E-mail <strong class="RedColor">*</strong></td>
				<td><input type="text" name="ville2" id="ville2" class="validate[required]" value="<?php echo $row_form['ville']?>"/></td>
				</tr>
				
				<tr>
				<td><input type="text" name="email2" id="email2" class="validate[required]" value="<?php echo $row_form['email']?>"/></td>
				<td>Pays <strong class="RedColor">*</strong></td>
				</tr>
				<tr>
				<td>Mot de passe <strong class="RedColor">*</strong></td>
				<td><input type="text" name="pays2" id="pays2" class="validate[required]" value="<?php echo $row_form['pays']?>"/></td>
				</tr>
				
				<tr>
				<td><input type="password" class="validate[required]" name="password2" id="password2"/></td>
				<td>Telephone domicile <strong class="RedColor">*</strong></td>
				</tr>
				<tr>
				<td>Date de naissance <strong class="RedColor">*</strong></td>
				<td><input type="text" class="validate[required]" name="domicile" id="domicile" value="<?php echo $row_form['domicile']?>"/></td>
				</tr>
				
				<tr>
				<td><select name="jours" id="jours" class="validate[required]" type="select">
				  <option value="0">JJ</option>
				  <?php for($i=1;$i<=31;$i++) { ?>
				  <option value="<?php if($i<10){$i = '0'.$i; echo $i;}else{echo $i;}?>" <?php if($i==intval($jour)) echo 'selected'; ?>><?php echo $i; ?></option>
				  <?php }?>
				  </select>
                  <select name="mois" id="mois" class="validate[required]" type="select">
                    <option value="0">MM</option>
                    <?php for($i=1;$i<=12;$i++) { ?>
                    <option value="<?php if($i<10){$i = '0'.$i; echo $i;}else{echo $i;}?>" <?php if($i==intval($mois)) echo 'selected'; ?>><?php echo $i; ?></option>
                    <?php }?>
                  </select>
                  <select name="annees" id="annees" class="validate[required]" type="select">
                    <option value="0">AA</option>
                    <?php for($i=1930;$i<=2014;$i++) { ?>
                    <option value="<?=$i?>" <?php if($i==intval($annees)) echo 'selected'; ?>>
                      <?=$i?>
                    </option>
                    <?php }?>
                  </select></td>
				<td>Telephone portable <strong class="RedColor">*</strong></td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td><input type="text" name="mobile" id="mobile" class="validate[required]" value="<?php echo $row_form['mobile']?>"/></td>
				</tr>
				<tr><td></td><td>&nbsp;</td></tr>
				<tr><td height="30" colspan="2">* Champs obligatoires</td></tr>
				<tr><td colspan="2">
				<input type="hidden" name="id_formulaire" value="<?php echo $row_form['id']?>"/>
				<input type="submit" value="Valider >" class="bgRed whiteColor send" />
				</td></tr>
			</table>
			</form>
        </div>

        </div>
    </div>
</div>
			
			
			
	<?php	}else if(isset($_GET['Cadeaux']) && $_GET['Cadeaux'] > 0 ){
		
		$idcommande = $_GET['Cadeaux'];
	
	$req_commande = "SELECT e.id AS id_client,e.*,c.*,c.id AS idcommande,t.type_paiement,tc.* FROM commandes c,espace_securise e,type_paiement t,transport_catalogue tc where t.id = c.type_payement AND c.id_client = e.id AND c.type_livraison = tc.id AND c.id='$idcommande' order by c.date";
	$commande  = mysql_query($req_commande ,$connect_m);
	$row_commande  = mysql_fetch_assoc($commande);
		if($row_commande==false){
			$req_commande = "SELECT e.id AS id_client,e.*,c.*,c.id AS idcommande FROM commandes c,espace_securise e where c.id_client = e.id AND c.id='$idcommande' order by c.date";
			$commande  = mysql_query($req_commande ,$connect_m);
			$row_commande  = mysql_fetch_assoc($commande);
		}	
	$id_client = $_SESSION['id_acces'];
	$queryclient='Select * from espace_securise where id='.$id_client;
	$execClient=mysql_query($queryclient,$connect_m);
	$resuClient=mysql_fetch_assoc($execClient);
	$devise = "Points";
	?>
		
		<div id="container">
    <div id="monCompte">
        <div class="staticHeader">
            <h1 class="redRegular">Bonjour <?php echo $_SESSION['nom_acces']; ?></h1>
            <div class="deconnexion_compte">
                <input type="submit" class="bgRed whiteColor" onclick="javascript:document.location.href='logout_acces.php'" value="Déconnexion" />
            </div>
            <div class="espace_client">
                <input type="submit" class="bgRed whiteColor" onclick="javascript:document.location.href='Profil'" value="Espace Client" />
            </div>
        </div>
		<?php
			if($row_commande['type']==1){
			/**
				Mode de paiement
			**/
				$paiement = "SELECT p.*,t.*,p.id AS id_paiement FROM paiement_catalogue p,type_paiement t where p.type = t.id AND p.id='".$row_commande['type_payement']."' AND etat = '1'";
				$query_paiement  = mysql_query($paiement ,$connect);
				$array_paiement  = mysql_fetch_array($query_paiement);
			$text_payement = "";

			if($row_commande['type_payement'] == 2){
			?>
			<?php $text_payement = '<p>Vous avez sélectionné le mode de paiement par chèque. Celui-ci est à adresser :  </p>
			<ul>
			<li>A l\'ordre de '.$array_paiement['ordre_de'].'</li>
			<li>A l\'adresse : '.$array_paiement['adresse'].'</li>

			</ul>'.$array_paiement['details'].'
			<p>Sans oublier de mentionner votre nom &amp; prénom ou raison  sociale, suivi de votre numéro de commande inscrit ci-dessus.</p>
			<p>Vous pouvez accéder au suivi de votre commande dans «&nbsp;<strong>Historique des commandes&nbsp;</strong>» de  votre compte.</p>';


				}else if($row_commande['type_payement'] == 3){ 
			$text_payement = '<p>Vous avez sélectionné le mode de paiement par  virement bancaire. Celui-ci est à adresser :  </p>
			<ul>
			  <li>En faveur de <strong>'.$array_paiement['titulaire'].'</strong></li>
			 
			</ul>
			<p>- '.$array_paiement['adresse_banque'].'</p>'.$array_paiement['details'].'
			<p>Sans oublier de mentionner votre nom &amp; prénom ou raison  sociale, suivi de votre numéro de commande inscrit ci-dessus.</p>
			<p>Vous pouvez accéder au suivi de votre commande dans «&nbsp;<strong>Historique des commandes&nbsp;</strong>» de  votre compte.</p>';

			 }else if($row_commande['type_payement'] == 1){ 
				
				
			$text_payement = '<p>Vous avez sélectionné le mode de paiement Comptant à la livraison. </p>

			<p>Vous pouvez accéder au suivi de votre commande dans «&nbsp;<strong>Historique des commandes&nbsp;</strong>» de  votre compte.</p>';
				
				}
				
				
				/**
					Mode de paiement
				**/
				}
				?>		
        <div id="corps" class="infoContent">
		<?php 
			echo $text_payement;
		?>
			<div class="bgRed whiteColor bar_infos">
					details de mon cadeau passée le <?php echo strftime('%d/%m/%Y',strtotime($row_commande['date'])); ?>
			</div>
			<div class="detais_cmd">
				<div class="div1">
					<div class="bgRed whiteColor bar_infos">
					Informations client
					</div>
					
					Nom Complet :<?php echo $resuClient['nom_prenom']; ?><br/>
					Email :<?php echo $resuClient['email']; ?><br/>
					Tél. :<?php echo $resuClient['tel']; ?><br/>
					
				</div>	
			</div>
			<?php
			
				$req_livraison = "SELECT * FROM adresses_client WHERE id_client = '".$row_commande['id_client']."' AND type = 'livraison'";
				$livraison  = mysql_query($req_livraison ,$connect_m);
				$row_livraison  = mysql_fetch_assoc($livraison);
				$num_livraison  = mysql_num_rows($livraison);


				$req_facturation = "SELECT * FROM adresses_client WHERE id_client = '".$row_commande['id_client']."' AND type = 'facturation'";
				$facturation  = mysql_query($req_facturation ,$connect_m);
				$row_facturation  = mysql_fetch_assoc($facturation);
				$num_facturation  = mysql_num_rows($facturation);
			if($row_commande['type']==1){
			 ?>
			<div class="detais_cmd">
				<div class="div1">
					<div class="bgRed whiteColor bar_infos">
					votre adresse de livraison
					</div><br>
					<?php echo $_SESSION['nom_acces']; ?><br />
					<?php echo $row_livraison['adresse']; ?><br />
					<?php echo $row_livraison['code_postal']; ?> <strong><?php echo $row_livraison['ville']; ?></strong><br />
					<strong><?php echo $row_livraison['pays']; ?></strong><br />
					<?php echo $row_livraison['tel_domicile']; ?><br />
					<strong><?php echo $row_livraison['tel_portable']; ?></strong><br />
					<?php echo $row_livraison['infos_sup']; ?>
				</div>
				<div class="div1">
					<div class="bgRed whiteColor bar_infos">
					votre adresse de facturation
					</div><br>
					<?php echo $_SESSION['nom_acces']; ?><br />
					<?php echo $row_facturation['adresse']; ?><br />
					<?php echo $row_facturation['code_postal']; ?> <strong><?php echo $row_facturation['ville']; ?></strong><br />
					<strong><?php echo $row_facturation['pays']; ?></strong><br />
					<?php echo $row_facturation['tel_domicile']; ?><br />
					<strong><?php echo $row_facturation['tel_portable']; ?></strong><br />
					<?php echo $row_facturation['infos_sup']; ?>
				</div>
				 <?php 
	  
				$taxe_transport = "SELECT transporteur,taxe_transport FROM transport_catalogue where id = '".$_SESSION["transport_".$idsite]."' AND etat = '1'";
				$query_taxe_transport  = mysql_query($taxe_transport ,$connect);
				$array_taxe_transport  = mysql_fetch_array($query_taxe_transport);
				   ?>
				<div>
					<div class="div2">
					La livraison de votre commande expédiés par : 

					<?php echo $row_commande['transporteur']; ?>
					</div>
					<div class="div2">
					Les courriels de votre suivi de commande seront envoyés à l'adresse email de votre compte client :

					<?php echo $row_commande['email'];?> 
					</div>
				</div>
				
			</div>
			<?php } ?>
			<div class="tbl-details" id="GlobalPanierResult">
				<table width="100%" border="1" cellpadding="0" cellspacing="0" class="std" id="cart_summary">
				  <thead>
					<tr class="header_table">
					  <th colspan="2" class="cart_product first_item">ARTICLE(S)</th>
					  <th class="cart_unit">Prix unitaire</th>
					  <th class="cart_quantity">QUANTITE</th>
					  <th class="cart_total">PRIX Total</th>
					</tr>
				  </thead>
				  <tbody>
						<?php
						$total_commande=0;
						$req_pr_commande = "SELECT * FROM commande_produit where id_commande='".$idcommande."'";
								$pr_commande  = mysql_query($req_pr_commande ,$connect_m);
								$row_pr_commande  = mysql_fetch_assoc($pr_commande);
								$i = 0;
									do {
										
										
								$req_articles = "SELECT * FROM produit where id='".$row_pr_commande['id_produit']."'";
								$articles  = mysql_query($req_articles ,$connect);
								$row_articles  = mysql_fetch_assoc($articles);
										
									$catalogue_slider = "SELECT * FROM images_produit where id_produit='".$row_pr_commande['id_produit']."' AND couverture = '1' LIMIT 1";
									$req_catalogue_slider = mysql_query($catalogue_slider ,$connect);
									$row_catalogue_slider = mysql_fetch_assoc($req_catalogue_slider);
									$num_catalogue_slider = mysql_num_rows($req_catalogue_slider);	
								?>
						
						<tr class="last_item  cart_item" id="product_0">
						  <td align="center" width="66" class="cart_product">        
									<?php if($num_catalogue_slider > 0){ ?>
									<img src="<?php echo $row_catalogue_slider['image']; ?>" width="60" />
									<?php }else{ ?>
									<img src="<?php echo SITEPATH; ?>images/no_image.png" width="60" />
									<?php } ?>
									</td>
						  <td class="cart_description"><p class="s_title_block"><?php echo $row_pr_commande['produit']; ?></p></td>
						  <td align="center" class="cart_unit"><span id="product_price_0" class="price"><?php echo $row_pr_commande['prix']; ?> <?php echo $devise; ?></span></td>
						  <td align="center" class="cart_quantity"><div class="cart_quantity_button"><span id="total_product_price_0" class="price">  <?php echo $row_pr_commande['nbr_produit']; ?></span></td>
						  <td align="center" class="cart_total"><span id="total_product_price_0" class="price"> <?php echo $row_pr_commande['nbr_produit']*$row_pr_commande['prix']; ?> <?php echo $devise; ?></span></td>
						  
						</tr>
						<?php     
						$i++;
							$total_commande=$total_commande+$row_pr_commande['prix'];
							}while($row_pr_commande  = mysql_fetch_assoc($pr_commande));
					   
						?>
					  </tbody>
					   <tfoot>
							<tr class="cart_total_price">
							  <td colspan="4" class="total_panier">MONTANT TOTAL :</td>
							  <td colspan="2" align="left" class="price" id="total_product"><span><?php echo $total_commande; ?></span> <?php echo $devise; ?></td>
							</tr>
						</tfoot>
				</table>
				
			</div>
			<div id="pied_details_cmd">
				<div id="pied1">
					
				</div>
				<?php if($row_commande['type']==1){ ?>
				<div id="pied2">
					<h3 class="redRegular"><strong>Total de mes articles : <?php echo $row_commande['total'].' '.$devise; ?></strong></h3>
					
					<h3 class="redRegular">Total des frais de port : <?php if($row_commande['taxe_transport'] > 0){echo $row_commande['taxe_transport'].' '.$devise;}else{ echo 'Gratuit';} ?></h3>
					
					<div class="bgRed whiteColor barre_montant">
						MONTANT TTC : <?php echo $row_commande['total'].' '.$devise; ?>
					</div>
				</div>
				<?php } ?>
			<div>			

        </div>
    </div>
</div>
</div>
</div>		
	<?php }else if(isset($_GET['Commandes']) && $_GET['Commandes'] == '' && $is_catalogue == 1){
		$id_client = $_SESSION['id_acces'];
	 
$req_commande = "SELECT e.nom_prenom,c.*,c.id AS idcommande,t.type_paiement FROM commandes c,espace_securise e,type_paiement t where t.id = c.type_payement AND c.id_client = e.id AND c.id_client='$id_client' AND c.etat=1 order by c.date DESC";
	$commande  = mysql_query($req_commande ,$connect_m);
	/**
		Les commandes
	**/
?>
<div id="container">
    <div id="monCompte">
        <?php include('menu_espace.php'); ?>
        <div class="blocRight">
			
			<div class="bgRed whiteColor bar_infos">
				Mes commandes
			</div>
			<?php if(mysql_num_rows($commande)>0){while($row_commande  = mysql_fetch_assoc($commande)){?>
			<div class="mes_commandes">
				<div class="nom_cmd">
					<strong>Commande passée le :</strong><br>
					<?php echo strftime('%d/%m/%Y',strtotime($row_commande['date'])); ?><br>
					<strong>Commande n°</strong> <?php echo $row_commande['ref']; ?><br>
					<strong>Destinataire : </strong><br>
					<?php echo $_SESSION['nom_acces']; ?><br>
					<span class="redColor"><?php echo $row_commande['type_paiement']; ?></span>
				</div>
				
				<div class="action_cmd">
				<div>
					<div class="price"><?php echo $row_commande['total']; ?> <?php echo $Devise; ?></div>
				</div>
				<div>
				<input type="button" class="bgRed whiteColor" onclick="document.location.href='<?php echo get_name_page($idsite,$id_page); ?><?php echo $lien_plus; ?>&Commandes=<?php echo $row_commande['idcommande']; ?>'"value="Visaliser ma commande" />
				</div>
				<div>
				<input type="button" class="bggrid whiteColor EnvoieFacture" id="<?php echo $row_commande['id'] ?>" value="Recevoir ma facture" />
				</div>
				</div>
			</div>
			<div class="ligne_adresse"></div>
			<?php } } ?>
			
        </div>

        </div>
    </div>
</div>
		
		
	<?php }
	else if(isset($_GET['Cadeaux']) && $_GET['Cadeaux'] == ''){
		$id_client = $_SESSION['id_acces'];
	$req_commande = "SELECT e.nom_prenom,c.*,c.id AS idcommande FROM commandes c,espace_securise e where  c.id_client = e.id AND c.id_client='$id_client' and c.etat=2 and c.type=2 order by c.date DESC";
	$commande  = mysql_query($req_commande ,$connect_m);
	$req_commandetot = "SELECT sum(c.total) FROM commandes c,espace_securise e where  c.id_client = e.id AND c.id_client='$id_client' and c.etat=2 and c.type=2";
	$commandetot  = mysql_query($req_commandetot ,$connect_m);
	$rowtot=mysql_fetch_array($commandetot);
	$req_total = "SELECT f.*,e.* FROM formulaire_inscription f,espace_securise e  WHERE f.id = e.id_point AND e.id = '".$id_client."' ";
	$query_total  = mysql_query($req_total ,$connect_m);
	$total  = mysql_fetch_array($query_total);
		/**
	/**
		Les cadeaux
	**/
?>
<div id="container">
    <div id="monCompte">
        <?php include('menu_espace.php'); ?>
        <div class="blocRight">
			
			<div class="bgRed whiteColor bar_infos">
				Mes cadeaux
				
			</div>
			<div class="recompenses">
				<span class="redColor total">TOTAL CADEAUX</span>
				<span class="redColor total_point"><?php echo $rowtot[0]; ?> Points</span>
			</div>
			<?php if(mysql_num_rows($commande)>0){while($row_commande  = mysql_fetch_assoc($commande)){?>
			<div class="mes_commandes">
				<div class="nom_cmd">
					<strong>Cadeau passée le :</strong><br>
					<?php echo strftime('%d/%m/%Y',strtotime($row_commande['date'])); ?><br>
					<strong>Cadeau n°</strong> <?php echo $row_commande['ref']; ?><br>
					
					
				</div>
				<div class="des_cmd">
				<strong></strong><br>
				<?php 
				/**
					Selection name product
				**/
				$queryRow="SELECT p.Nom FROM produit p join commande_produit cp on p.id=cp.id_produit join commandes c on cp.id_commande=c.id where c.id=".$row_commande['idcommande'];
				//echo $queryRow;
				$resulataRow=mysql_query($queryRow,$connect_m);
				$RowR=mysql_fetch_assoc($resulataRow);
				echo stripslashes($RowR["Nom"]);
				?>
				</div>
				<div class="action_cmd">
				<div>
					<div class="price"><?php if($row_commande['total']==false) echo "0";else echo $row_commande['total']; ?> Points</div> 
				</div>
				
				<div>
				<input type="button" class="bgRed whiteColor" onclick="document.location.href='<?php echo get_name_page($idsite,$id_page); ?><?php echo $lien_plus; ?>&Cadeaux=<?php echo $row_commande['idcommande']; ?>'"value="Visaliser Mon cadeau" />
				</div>
				</div>
			</div>
			<div class="ligne_adresse"></div>
			<?php } }else
			{
			?>
			<div class="mes_commandes">
				Vous n'avez aucun cadeau 
			</div>			
			<?php
			}
			?>
			
        </div>

        </div>
    </div>
</div>
		
		
	<?php }
	else if(isset($_GET['Historiques']) && $_GET['Historiques'] == ''  && $is_catalogue == 1){
		$id_client = $_SESSION['id_acces'];
		
$req_commande = "SELECT e.nom_prenom,c.*,c.id AS idcommande,t.type_paiement FROM commandes c,espace_securise e,type_paiement t where t.id = c.type_payement AND c.id_client = e.id AND c.id_client='$id_client' and c.etat=2 order by c.date DESC";
	$commande  = mysql_query($req_commande ,$connect_m);
	/**
		Les commandes
	**/
?>
<div id="container">
    <div id="monCompte">
        <?php include('menu_espace.php'); ?>
        <div class="blocRight">
			
			<div class="bgRed whiteColor bar_infos">
				Mes Cadeaux
			</div>
			<?php if(mysql_num_rows($commande)>0){while($row_commande  = mysql_fetch_assoc($commande)){?>
			<div class="mes_commandes">
				<div class="nom_cmd">
					<strong>Commande passée le :</strong><br>
					<?php echo strftime('%d/%m/%Y',strtotime($row_commande['date'])); ?><br>
					<strong>Commande n°</strong> <?php echo $row_commande['ref']; ?><br>
					<strong>Destinataire : </strong><br>
					<?php echo $_SESSION['nom_acces']; ?><br>
					<span class="redColor"><?php echo $row_commande['type_paiement']; ?></span>
				</div>
				
				<div class="action_cmd">
				<div>
					<div class="price"><?php echo $row_commande['total']; ?> <?php echo $Devise; ?></div>
				</div>
				
				<div>
				<input type="button" class="bggrid whiteColor" value="Recevoir ma facture" />
				</div>
				</div>
			</div>
			<div class="ligne_adresse"></div>
			<?php } } ?>
			
        </div>

        </div>
    </div>
</div>
		
		
	<?php }
	else if(isset($_GET['Recompenses']) && $_GET['Recompenses'] == ''){
		
		$id_client = $_SESSION['id_acces'];
	
	
	
	$req_sondage = "SELECT r.date AS date_sondage,q.question AS question ,q.nbr_pts AS nbr_pts_enquette FROM question_sondage q,rep_user_ques r WHERE q.nbr_pts != 0 AND q.id = r.id_question AND r.id_user = '".$id_client."'";
	$sondage  = mysql_query($req_sondage ,$connect_m);
	$total_sondage  = mysql_num_rows($sondage);
	

	$req_enquete = "SELECT uv.*,q.*,q.id AS idQuest,r.*,r.date AS date_sondage,e.*,s.*,p.*,p.type AS type,p.nbr_pts AS nbr_pts_enquette FROM question_sondage q,rep_user_ques r,espace_securise e,reponse_sondage s,parametres_sondage p,user_valide_sondage uv WHERE e.id = r.id_user AND  r.id_question = q.id  AND q.id_sondage = p.id AND p.type = '2' AND r.id_reponse = s.id AND uv.id_user = e.id AND uv.id_sondage = q.id_sondage AND  e.id = '".$id_client."' GROUP BY p.id";
	$enquete  = mysql_query($req_enquete ,$connect_m);
	$total_enquete  = mysql_num_rows($enquete);
	/*$req_recompense = "SELECT e.id AS id_client,e.*,c.*,c.id AS idcommande,cp.* FROM commandes c,espace_securise e,commande_produit cp where c.id_client = e.id AND cp.id_commande = c.id AND c.id_client = '".$id_client."' AND c.type = '2'";
	$recompense  = mysql_query($req_recompense ,$connect);*/
	 
	$req_total = "SELECT f.*,e.* FROM formulaire_inscription f,espace_securise e  WHERE f.id = e.id_point AND e.id = '".$id_client."' ";
	$query_total  = mysql_query($req_total ,$connect_m);
	$total  = mysql_fetch_array($query_total);
		/**
			total recompenses
		**/
	$req_recompensetot = "Select sum(resultat.nbr_pts) as total from (select `qs`.`id_sondage` AS `id_sondage`,`ps`.`nbr_pts` AS `nbr_pts` from ((((((`parametres_sondage` `ps` join `question_sondage` `qs` on((`ps`.`id` = `qs`.`id_sondage`))) join `rep_user_ques` `rus` on((`qs`.`id` = `rus`.`id_question`))) join `reponse_sondage` `rs` on((`rs`.`id` = `rus`.`id_reponse`))) join `user_valide_sondage` `uvs` on((`uvs`.`id_sondage` = `qs`.`id_sondage`))) join `espace_securise` `es` on((`es`.`id` = `uvs`.`id_user`))) join `formulaire_inscription` `ins` on((`ins`.`id` = `es`.`id_point`))) where (`ps`.`type` = 2 and es.id='$id_client') group by id_sondage) resultat";
	$recompensetot = mysql_query($req_recompensetot ,$connect_m);	
	$rowtot=mysql_fetch_array($recompensetot);
	

	
	$req_commandetot1 = "SELECT sum(q.nbr_pts) as total1 FROM question_sondage q,rep_user_ques r where q.nbr_pts != 0 AND q.id = r.id_question AND r.id_user = '".$id_client."'";
	$commandetot1  = mysql_query($req_commandetot1 ,$connect_m);
	$rowtots1 = mysql_fetch_array($commandetot1);
?>
<div id="container">
    <div id="monCompte">
        <?php include('menu_espace.php'); ?>
        <div class="blocRight">
			
			<div class="bgRed whiteColor bar_infos">
				Mes recompenses <span class="pointsgeneral"></span>
			</div>
			<div class="recompenses">
				<span class="redColor total">TOTAL RECOMPENSES</span>
				<span class="redColor total_point"><?php echo $total['nombre_point']; ?> Points</span>
			</div>
			<div class="recompensesspan">
				<span class="redColor total soustot">UTILISATION</span>
				<span class="redColor total_point soustot"><strong><?php echo $rowtot['total']+$rowtots1['total1']+50; ?></strong> Points</span>
			</div>
			<div class="recompensesspan">
				<span class="redColor total soustot">RELIQUAT</span>
				<span class="redColor total_point soustot"><strong><?php echo $total['nombre_point']-($rowtot['total']+$rowtots1['total1']+50); ?></strong> Points</span><br />
<br />
			</div>
			<div class="mes_commandes">
				<div class="nom_cmd">
					<strong>Validé le :</strong><br>
					<?php echo strftime('%d/%m/%Y',strtotime($total['date_inscription'])); ?><br>
				</div>
				<div class="des_cmd">
				<strong></strong><br>
				Inscription
				</div>
				<div class="action_cmd">
					<div class="bgRed whiteColor points">50 Points</div>	
				</div>
			</div>
			<div class="ligne_adresse"></div>
			<?php $test=false; ?>
			<?php 
			if($total_enquete > 0){
			while($row_recompense  = mysql_fetch_assoc($enquete)){
			$test=true; ?>
			<div class="mes_commandes">
				<div class="nom_cmd">
					<strong>Validé le :</strong><br>
					<?php echo strftime('%d/%m/%Y',strtotime($row_recompense['date_sondage'])); ?><br>
				</div>
				<div class="des_cmd" title="<?php echo $row_recompense['theme']; ?>">
				<strong></strong><br>
				<?php echo $row_recompense['theme']; ?>
				</div>
				<div class="action_cmd">
					<div class="bgRed whiteColor points"><?php echo $row_recompense['nbr_pts_enquette']; ?> Points</div>	
				</div>
			</div>
			<div class="ligne_adresse"></div>
			<?php } 
			}
			
			if($total_sondage > 0){
			while($row_sondage  = mysql_fetch_assoc($sondage)){
			$test=true; ?>
			<div class="mes_commandes">
				<div class="nom_cmd">
					<strong>Validé le :</strong><br>
					<?php echo strftime('%d/%m/%Y',strtotime($row_sondage['date_sondage'])); ?><br>
				</div>
				<div class="des_cmd" title="<?php echo $row_sondage['question']; ?>">
				<strong></strong><br />
				<?php echo cleanCut($row_sondage['question'],45); ?>
				</div>
				<div class="action_cmd">
					<div class="bgRed whiteColor points"><?php echo $row_sondage['nbr_pts_enquette']; ?> Points</div>	
				</div>
			</div>
			<div class="ligne_adresse"></div>
			<?php }
			}
			
			?>
			<?php if($test==true) {?>
			<!--<div class="pagination">
			<ul>
				<li>Page</li>
				<li>1/2</li>
				<li><a href="">></a></li>
			</ul>
			</div>-->
			<?php } ?>
        </div>

        </div>
    </div>
</div>

	<?php }else if(isset($_GET['adresse'])){ 
	
	
	
	
if(isset($_POST['action']) && $_POST['action'] == 'add'){

$adresses_client = "INSERT INTO adresses_client (id_client,type,adresse,adresse2,code_postal,ville,pays,infos_sup,tel_domicile,tel_portable,alias)
				VALUES(
				'".$_POST['id_client']."',
				'".$_POST['type']."',
				'".$_POST['adresse']."',
				'".$_POST['adresse2']."',
				'".$_POST['code_postal']."',
				'".$_POST['ville']."',
				'".$_POST['pays']."',
				'".$_POST['other']."',
				'".$_POST['tel_domicile']."',
				'".$_POST['phone_mobile']."',
				'".$_POST['alias']."')";
mysql_query($adresses_client,$connect_m);
?>
<script language="javascript">

document.location.href="<?php echo get_name_page($idsite,$id_page); ?><?php echo $lien_plus; ?>&Adresses";

</script>

<?php

}

if(isset($_POST['action']) && $_POST['action'] == 'edit'){
	
$query_update = "UPDATE adresses_client SET adresse = '".$_POST['adresse']."',code_postal = '".$_POST['code_postal']."',ville = '".$_POST['ville']."',pays = '".$_POST['pays']."',infos_sup = '".$_POST['infos_sup']."',tel_domicile = '".$_POST['tel_domicile']."',tel_portable = '".$_POST['tel_portable']."',alias = '".$_POST['alias']."' WHERE id = '".$_POST['id_address']."'";
mysql_query($query_update,$connect_m) or die('Error, insert query failed');


?>
<script language="javascript">

document.location.href="<?php echo get_name_page($idsite,$id_page); ?><?php echo $lien_plus; ?>&Adresses";

</script>

<?php
}
	
	if(isset($_GET['adresse']) && $_GET['adresse'] != ''){
		
		$id_client = $_SESSION['id_acces'];

$adresse = "SELECT * FROM adresses_client where id_client='".$id_client."' AND id = '".intval($_GET['adresse'])."' LIMIT 1";
$req_adresse = mysql_query($adresse ,$connect_m);
$row_adresse = mysql_fetch_assoc($req_adresse);
$num_adresse = mysql_num_rows($req_adresse);	
		
}
	?>

	<div id="container">
    <div id="monCompte">
        <?php include('menu_espace.php');?>
        <div class="blocRight">
			
			<div class="bgRed whiteColor bar_infos">
				Je modifie mon adresse
			</div>
			<form method="post" id="edit_adresse">
			<table class="formulaire_adresse">
				<tr><td>Nom de l'adresse<strong class="RedColor">*</strong></td></tr>
				<tr><td><input type="text" name="alias" value="<?php echo $row_adresse['alias']; ?>" /></td></tr>
				<tr><td>L'adresse<strong class="RedColor">*</strong></td></tr>
				<tr><td><input type="text" name="adresse" value="<?php echo $row_adresse['adresse']; ?>" /></td></tr>
				<tr><td>Code postale<strong class="RedColor">*</strong></td></tr>
				<tr><td><input type="text" name="code_postal" value="<?php echo $row_adresse['code_postal']; ?>" /></td></tr>
				<tr><td>Ville<strong class="RedColor">*</strong></td></tr>
				<tr><td><input type="text" name="ville" value="<?php echo $row_adresse['ville']; ?>" /></td></tr>
				<tr><td>Pays<strong class="RedColor">*</strong></td></tr>
				<tr><td><input type="text" name="pays" value="<?php echo $row_adresse['pays']; ?>" /></td></tr>
				<tr><td>Informations supplémentaires<strong class="RedColor">*</strong></td></tr>
				<tr><td><textarea name="infos_sup"><?php echo $row_adresse['infos_sup']; ?></textarea></td></tr>
				<tr><td>Téléphone domicile<strong class="RedColor">*</strong></td></tr>
				<tr><td><input type="text" name="tel_domicile" value="<?php echo $row_adresse['tel_domicile']; ?>"/></td></tr>
				<tr><td>Téléphone portable<strong class="RedColor">*</strong></td></tr>
				<tr><td><input type="text" name="tel_portable" value="<?php echo $row_adresse['tel_portable']; ?>"/></td></tr>
				<tr><td><input type="submit" class="bgRed whiteColor send" value="Valider >" /></td></tr>
			</table>
			<p class="submit2">
			<input type="hidden" value="<?php echo $_GET['adresse']; ?>" name="id_address">
			<input type="hidden" value="<?php echo $id_client; ?>" name="id_client">
			<input type="hidden" value="<?php echo $_GET['adresse']; ?>" name="type">
			<?php if(isset($_GET['adresse']) && $_GET['adresse'] > 0){ ?>
			<input type="hidden" value="edit" name="action">
			<?php }else{ ?>
			<input type="hidden" value="add" name="action">
			<?php } ?>
		  </p>
			</form>
			<script>
			$(document).ready(function() {
			$("#edit_adresse").validate();
			});
			</script>
        </div>

        </div>
    </div>
</div>
		
		<?php }
		else if(isset($_GET['Adresses'])){
		/**
			Ajouter par yassine
			requet sql pour chercher les adresses livrason et facturation 
		**/
		$id_client = $_SESSION['id_acces'];
		$query="Select * FROM `adresses_client` where id_client=".$id_client;
		$resultat=mysql_query($query,$connect_m);
		?>
			<div id="container">
    <div id="monCompte">
        <?php include('menu_espace.php');?>
        <div class="blocRight">
			
			<div class="bgRed whiteColor bar_infos">
				Mes adresses
			</div>
			<?php while($row=mysql_fetch_array($resultat)) {?>
			<div class="mes_adresses">
				<div class="nom_adresse">
					<?php echo $row['alias']; ?> (<?php echo $row['type']; ?>) : 
				</div>
				<div class="adresse_adresse">
				<strong><?php echo $_SESSION['nom_acces']; ?></strong><br />

				<?php echo $row['adresse']; ?>
				<?php echo $row['tel_domicile']; ?>
				

				</div>
				<div class="editer_adresse">
				<a href="Profil&adresse=<?php echo $row['id'];?>">
				<img src="modules/profil_user/img/editer-market.jpg" alt="Modifier" />
				</a>
				</div>
			</div>
			<div class="ligne_adresse"></div>
			<?php } ?>
			
        </div>

        </div>
    </div>
</div>
		<?php
		
		}else{ ?>
            
            
      <div id="Espace_Securise">
	  
      
          
<div id="container">
    <div id="monCompte">
        <div class="staticHeader">
            <h1 class="redRegular">Bonjour <?php echo $_SESSION['nom_acces']; ?></h1>
            <div class="deconnexion_compte">
                <input type="submit" onclick="javascript:document.location.href='logout_acces.php'" class="bgRed whiteColor" value="Déconnexion" />
            </div>
        </div>
        <div id="corps" class="monCompteContent">
            <ul>
                <li>
                    <div class="profilIcon"> <img src="modules/profil_user/img/profilPic.png" />
                        <h2 class="redBold">Mon Profil</h2>
                    </div>
                    <hr />
                    <ul class="textMonCompte">
                        <li><a href="<?php echo get_name_page($idsite,$id_page); ?><?php echo $lien_plus; ?>&Informations">Mes informations</a></li>
                        <li><a href="<?php echo get_name_page($idsite,$id_page); ?><?php echo $lien_plus; ?>&Adresses">Mes adresses</a></li>
                    </ul>
                </li>
                <?php if($is_catalogue == 1){ ?>
                <li>
                    <div class="cartIcon"> <img src="modules/profil_user/img/CartPic.png" />
                        <h2 class="redBold">Mes commandes</h2>
                    </div>
                    <hr />
                      <ul class="textMonCompte">
                        <li><a href="<?php echo get_name_page($idsite,$id_page); ?><?php echo $lien_plus; ?>&Commandes">Suivi commandes</a></li>
                        <li><a href="#">Historiques</a></li>
                    </ul>
                </li>
                <?php } ?>
                <li>
                    <div class="avantIcon"> <img src="modules/profil_user/img/avantagePic.png" />
                        <h2 class="redBold">Mes avantages</h2>
                    </div>
                    <hr />
                       <ul class="textMonCompte">
                        <li><a href="<?php echo get_name_page($idsite,$id_page); ?><?php echo $lien_plus; ?>&Recompenses">Mes récompenses</a></li>
                        <li><a href="<?php echo get_name_page($idsite,$id_page); ?><?php echo $lien_plus; ?>&Cadeaux">Mes cadeaux</a></li>
                    </ul>
                    </li></ul>
                </li>
            </ul>
        </div>
    </div>
</div>
       
      </div>
      
        <?php } ?>
	<LINK rel="stylesheet" type="text/css" href="modules/profil_user/css/style.css">	
	  <?php if($is_catalogue == 0){
?>
<style>
.monCompteContent ul li{
	width:38% !important;
}
ul.textMonCompte li{
	width:100% !important;
}
</style>
<?php } ?>
	<?php 
		}
		else
		{
		?>
			 <?php  ?>
        <form method="post" action="" id="form_membre">
          <div class="signup_block">
            <input type="text" name="nom_prenom" class="input" id="nom_prenom" value="<?php echo NAME_PRENAME; ?>" />
          </div>
          <input type="text" name="email"  class="input required email log" id="email" value="<?php echo EMAIL; ?>"/>
          <input type="password" name="password" class="input required password" value="<?php echo PASSWORD; ?>" id="password"/>
          <div class="login_block">
            <input type="submit" value=" <?php echo IDENTIF; ?> " class="button send"/>
          </div>
          <div class="signup_block">
            <input type="text" name="tel" class="input" id="tel" value="<?php echo TEL; ?>" />
            <input type="text" name="date_naissance" class="input" id="date_naissance" value="<?php echo DATE_NAISSANCE; ?>" />
            <input type="submit" value=" <?php echo INSCRI_NEWSLETTER; ?> " class="button send"/>
          </div>
          <div id="msg_error"></div>
          <input type="hidden" name="option_acces" id="option_acces" value="login" />
          <input type="hidden" name="id_site" id="id_site" value="<?php echo $idsite; ?>" />
          <input type="radio" name="choose" id="loginn" checked="checked" class="radio"/>
          <?php echo HAVE_COUNT; ?> <br />
          <input type="radio" name="choose" id="signupp" class="radio"/>
          <?php echo HAVE_NOT_COUNT; ?><br />
        </form>
        <?php  ?>
		<?php		
		}
	?>