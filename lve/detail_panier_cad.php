<?php 



if(isset($_POST['action']) && $_POST['action'] == 'add_nbr'){
	session_start();
	
	$product_id = $_POST['produit_id'];
	$_SESSION["quantity_".$_POST['idsite']][$product_id] = $_POST['quantity'];
	$_SESSION["total_".$_POST['idsite']] = $_POST['total'];
	exit();
	}
	
	
	
	?>


<div id="GlobalPanierResult">
<?php if(!isset($_SESSION['nom_acces']) || $_SESSION['nom_acces'] == ''){ ?>

  <h3>je me connecte</h3>
  <p>Pour commander et accéder à nos services, il est nécessaire de s'identifier ou de créer un compte utilisateur.</p>



<?php }else{
	
			include("wmailer/class.mailer.php");
$etap = '';

$_SESSION["cat_devise_".$idsite] = 'points';



if(isset($_POST['action']) && $_POST['action'] == 'add_nbr'){
	$product_id = $_POST['produit_id'];
	$_SESSION["cat_quantity_".$idsite][$product_id] = $_POST['quantity'];
	exit();
	}
$quantity = $_SESSION["cat_quantity_".$idsite];
$products = $_SESSION["cat_products_".$idsite];
$prices = $_SESSION["cat_prices_".$idsite];
$productsName = $_SESSION["cat_productsName_".$idsite];
$total = $_SESSION["cat_total_".$idsite];
$id_client = $_SESSION['id_acces'];


$erreur = '';


if (!isset($total)) {
    $nbrP = 0;
    $total = 0;
}



if(count($products)==1 && $products[0]==''){
    $products=NULL;
}
$nbrP = count($products);



$user="SELECT nombre_point,email,nom,prenom FROM formulaire_inscription WHERE id_site = '".$idsite."' AND id = '".$id_client."' ";
$req_user = mysql_query($user ,$connect_m);
$tab_user = mysql_fetch_assoc($req_user);


?>

<script language="javascript">
$(document).ready(function(){
$('.cart_quantity_up').click(function(){
	$id = $(this).attr('id');
	$('#quantity_'+$id).val(parseInt($('#quantity_'+$id).val())+1);
	$('#total_product_price_'+$id).html((parseInt($('#product_price_'+$id).html())*parseInt($('#quantity_'+$id).val())));
	
	$('#total_product span').html(parseInt($('#total_product span').html())+parseInt($('#product_price_'+$id).html()));
	
	
	var order = 'action=add_nbr&quantity='+$('#quantity_'+$id).val()+'&produit_id='+$id;
	$.post("detail_panier_cad.php", order, function(theResponse){
	});
	
	
	});
$('.cart_quantity_down').click(function(){
	
	$id = $(this).attr('id');
	if($('#quantity_'+$id).val() > 1){
	$('#quantity_'+$id).val(parseInt($('#quantity_'+$id).val())-1);
	
	$('#total_product_price_'+$id).html((parseInt($('#product_price_'+$id).html())*parseInt($('#quantity_'+$id).val())));
	
	$('#total_product span').html(parseInt($('#total_product span').html())-parseInt($('#product_price_'+$id).html()));
	
	var order = 'action=add_nbr&quantity='+$('#quantity_'+$id).val()+'&produit_id='+$id;
	$.post("detail_panier_cad.php", order, function(theResponse){
	});
	}
	});

});
</script>
<?php if(!isset($_GET['step']) || $_GET['step'] == ''){ ?>

<h3>Détail des récompenses</h3>
<?php 
if (isset($products) && count($products) > 0) {  ?>
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="std" id="cart_summary">
  <thead>
    <tr class="header_table">
      <th colspan="2" class="cart_product first_item">ARTICLE(S)</th>
      <th width="16%" class="cart_unit">Prix unitaire</th>
      <th width="16%" class="cart_quantity">QUANTITE</th>
      <th width="15%" class="cart_total">PRIX Total</th>
      <th width="12%" class="cart_delete last_item">&nbsp;</th>
    </tr>
  </thead>
  <tfoot>
    <tr class="cart_total_price">
      <td style="padding: 5px 12px;" colspan="4" class="total_panier">TOTAL :</td>
      <td colspan="2" align="center" class="price" id="total_product" style="padding: 5px 12px;"><span><?php echo $total; ?></span> <?php echo $_SESSION["cat_devise_".$idsite]; ?></td>
    </tr>
  </tfoot>
  <tbody>
    <?php
            $i = 0;
            if (isset($products)) {
                foreach ($products as $product) {
					
					$id_product = end(explode("_", $products[$i]));
					
			$req_articles = "SELECT * FROM produit where id='".$id_product."'";
			$articles  = mysql_query($req_articles ,$connect);
			$row_articles  = mysql_fetch_assoc($articles);
					
					
					 ?>
    <tr class="last_item  cart_item address_<?php echo $i; ?> odd" id="product_<?php echo $i; ?>">
      <td width="4%" align="center" class="cart_product"><?php //echo $req_articles; ?>
        <a href="#">
        <?php 
			$catalogue_slider = "SELECT * FROM images_produit where id_produit='".$id_product."' AND couverture = '1' LIMIT 1";
			$req_catalogue_slider = mysql_query($catalogue_slider ,$connect);
			$row_catalogue_slider = mysql_fetch_assoc($req_catalogue_slider);
			$num_catalogue_slider = mysql_num_rows($req_catalogue_slider);
			  
			  
			  if($num_catalogue_slider > 0){ ?>
        <img src="<?php echo SITEPATH."uploads/site_".$idsite."/catalogue/min/".end(explode("/", $row_catalogue_slider['image'])); ?>" width="60" />
        <?php }else{ ?>
        <img src="<?php echo SITEPATH; ?>images/no_image.png" width="60" />
        <?php } ?>
        </a></td>
      <td width="37%" class="cart_description"><p class="s_title_block"><?php echo stripslashes($productsName[$i]); ?></p></td>
      <td align="center" class="cart_unit"><span id="product_price_<?php echo $i; ?>" class="price"><?php echo $prices[$i]; ?> <?php echo $_SESSION["cat_devise_".$idsite]; ?></span></td>
      <td align="center" class="cart_quantity"><div class="cart_quantity_button"> <a title="Ajouter" href="#" id="<?php echo $i; ?>" class="cad_quantity_up" rel="nofollow">+</a><br>
          <a title="Enlever" href="#" id="<?php echo $i; ?>" class="cad_quantity_down" rel="nofollow"> - </a> </div>
        <input type="hidden" id="quantity_<?php echo $i; ?>_hidden" name="quantity_<?php echo $i; ?>_hidden" value="<?php echo $quantity[$i]; ?>">
        <input type="text" id="quantity_<?php echo $i; ?>" name="quantity_<?php echo $i; ?>" value="<?php echo $quantity[$i]; ?>" class="cart_quantity_input" autocomplete="off" size="2" disabled="disabled"></td>
      <td align="center" class="cart_total"><span id="total_product_price_<?php echo $i; ?>" class="price"> <?php echo $prices[$i]*$quantity[$i]; ?></span> <?php echo $_SESSION["cat_devise_".$idsite]; ?></td>
      <td align="center" class="cart_delete"><div> <a href="#" id="<?php echo $i; ?>" class="cart_quantity_delete" rel="nofollow">
      X
      </a> </div></td>
    </tr>
    <?php      $i++;
                }
            }
            ?>
  </tbody>
</table>
<br />
<a title="Suivant" class="next_step" href="<?php echo $_SERVER['REQUEST_URI']; ?>&step=1">Suivant <span><img src="<?php echo SITEPATH; ?>images/arrow_next.png" alt="Suivant" title="Suivant" /></span></a>
<?php }else{ ?>
<p>Panier vide </p>

<?php } ?>
<?php }else if(isset($_GET['step']) && $_GET['step'] == 1){  ?>

<h3>Validation</h3>
<p>Vous êtes sur le point de valider l'achat avec votre solde de points de la commande suivante :</p><br />
<?php 
if (isset($products) && count($products) > 0) {  ?>
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="std" id="cart_summary">
  <thead>
    <tr class="header_table">
      <th colspan="2" class="cart_product first_item">ARTICLE(S)</th>
      <th width="16%" class="cart_unit">Prix unitaire</th>
      <th width="16%" class="cart_quantity">QUANTITE</th>
      <th width="15%" class="cart_total">PRIX Total</th>
      <th width="12%" class="cart_delete last_item">&nbsp;</th>
    </tr>
  </thead>
  <tfoot>
    <tr class="cart_total_price">
      <td style="padding: 5px 12px;" colspan="4" class="total_panier">TOTAL :</td>
      <td colspan="2" align="center" class="price" id="total_product" style="padding: 5px 12px;"><span><?php echo $total; ?></span> <?php echo $_SESSION["cat_devise_".$idsite]; ?></td>
    </tr>
  </tfoot>
  <tbody>
    <?php
            $i = 0;
            if (isset($products)) {
                foreach ($products as $product) {
					
					$id_product = end(explode("_", $products[$i]));
					
			$req_articles = "SELECT * FROM produit where id='".$id_product."'";
			$articles  = mysql_query($req_articles ,$connect);
			$row_articles  = mysql_fetch_assoc($articles);
					
					
					 ?>
    <tr class="last_item  cart_item address_<?php echo $i; ?> odd" id="product_<?php echo $i; ?>">
      <td width="4%" align="center" class="cart_product"><?php //echo $req_articles; ?>
        <a href="#">
        <?php 
			$catalogue_slider = "SELECT * FROM images_produit where id_produit='".$id_product."' AND couverture = '1' LIMIT 1";
			$req_catalogue_slider = mysql_query($catalogue_slider ,$connect);
			$row_catalogue_slider = mysql_fetch_assoc($req_catalogue_slider);
			$num_catalogue_slider = mysql_num_rows($req_catalogue_slider);
			  
			  
			  if($num_catalogue_slider > 0){ ?>
        <img src="<?php echo SITEPATH."uploads/site_".$idsite."/catalogue/min/".end(explode("/", $row_catalogue_slider['image'])); ?>" width="60" />
        <?php }else{ ?>
        <img src="<?php echo SITEPATH; ?>images/no_image.png" width="60" />
        <?php } ?>
        </a></td>
      <td width="37%" class="cart_description"><p class="s_title_block"><?php echo stripslashes($productsName[$i]); ?></p></td>
      <td align="center" class="cart_unit"><span id="product_price_<?php echo $i; ?>" class="price"><?php echo $prices[$i]; ?> <?php echo $_SESSION["cat_devise_".$idsite]; ?></span></td>
      <td align="center" class="cart_quantity"><div class="cart_quantity_button"> <a title="Ajouter" href="#" id="<?php echo $i; ?>" class="cad_quantity_up" rel="nofollow">+</a><br>
          <a title="Enlever" href="#" id="<?php echo $i; ?>" class="cad_quantity_down" rel="nofollow"> - </a> </div>
        <input type="hidden" id="quantity_<?php echo $i; ?>_hidden" name="quantity_<?php echo $i; ?>_hidden" value="<?php echo $quantity[$i]; ?>">
        <input type="text" id="quantity_<?php echo $i; ?>" name="quantity_<?php echo $i; ?>" value="<?php echo $quantity[$i]; ?>" class="cart_quantity_input" autocomplete="off" size="2" disabled="disabled"></td>
      <td align="center" class="cart_total"><span id="total_product_price_<?php echo $i; ?>" class="price"> <?php echo $prices[$i]*$quantity[$i]; ?></span> <?php echo $_SESSION["cat_devise_".$idsite]; ?></td>
      <td align="center" class="cart_delete"><div> <a href="#" id="<?php echo $i; ?>" class="cart_quantity_delete" rel="nofollow">
      X
      </a> </div></td>
    </tr>
    <?php      $i++;
                }
            }
            ?>
  </tbody>
</table>
<br />
<?php }else{ ?>
<p>Panier vide </p>

<?php } ?>
<p>Une fois que vous aurez validé cette commande vous reçeverez un email de confirmation et vous serez débité de<strong> <?php echo $total; ?> <?php echo $_SESSION["cat_devise_".$idsite]; ?></strong>.</p>
<p>Vous pourrez consulter votre solde ainsi que le récapitulatif de la commande dans votre espace client.</p><br />
<br />
<a title="Précédent" class="next_step" href="<?php echo $_SERVER['REQUEST_URI']; ?>"><span><img src="<?php echo SITEPATH; ?>images/arrow_prev.png" alt="Précédent" title="Précédent" /></span> Précédent</a>  <a title="Suivant" class="next_step" href="<?php echo $_SERVER['REQUEST_URI']; ?>&step=2">Valider <span><img src="<?php echo SITEPATH; ?>images/arrow_next.png" alt="Suivant" title="Suivant" /></span></a>


<?php }else if(isset($_GET['step']) && $_GET['step'] == 2){ 

$date = date("Y-m-d H:i:s");

	$total = $_SESSION["cat_total_".$idsite];
	
	$facture = 'MSC'.substr(number_format(time() * rand(),0,'',''),0,6);
	
	$req_total = "SELECT f.*,e.* FROM formulaire_inscription f,espace_securise e  WHERE f.id = e.id_point AND e.id = '".$_SESSION['id_acces']."' ";
	$query_total  = mysql_query($req_total ,$connect_m);
	$total_point  = mysql_fetch_array($query_total);
	
	
	
	if($total_point['nombre_point'] >  $total){
		


$query_commandes = "INSERT INTO commandes
(id_site,id_client,ref,etat,date,total,devise,type)
				VALUES(
				'".$idsite."',
				'".$_SESSION['id_acces']."',
				'".$facture."',
				'2',
				'".$date."',
				'".$total."',
				'Points',
				'2')";
mysql_query($query_commandes,$connect_m);
$id_commandes = mysql_insert_id();

			$i = 0;
            if (isset($products)) {
                foreach ($products as $product) {
					
				$id_product = end(explode("_", $products[$i]));
				$id_prices = $prices[$i];
				$id_quantity = $quantity[$i];
				$id_productsName = $productsName[$i];
				
				$query_product = "INSERT INTO commande_produit (id_commande,produit,id_produit,nbr_produit,prix)
				VALUES(
				'".$id_commandes."',
				'".$id_productsName."',
				'".$id_product."',
				'".$id_quantity."',
				'".$id_prices."')";
				mysql_query($query_product,$connect_m);
				
				 $i++;	
				 
				}
			}
			

	$nbr_final = $tab_user['nombre_point']-$total;
	
	$query_update = "UPDATE formulaire_inscription SET nombre_point = '".$nbr_final."' WHERE id = '".$id_client."'";
mysql_query($query_update,$connect_m) or die('Error, insert query failed');


$recompense = "";

?>
<h3>Félicitations !</h3>

<p>
Vous venez de convertir vos points en « chèques cadeaux ». Vous pouvez – dès à présent, les dépenser en vous procurant le(s) produit(s) ou service(s) qui vous intéressent, auprès des magasins et enseignes affiliés au réseau de nos partenaires.
</p>
<?php

   $page_profil = "SELECT c.id_page FROM pages p,contenu c where p.id_site = '".$idsite."' AND c.id_page = p.id AND c.type = 'Profil_user' LIMIT 1";
	$req_page_profil  = mysql_query($page_profil ,$connect);
	$row_page_profil = mysql_fetch_assoc($req_page_profil);
	$num_page_profil = mysql_num_rows($req_page_profil);
	
	
if($num_page_profil > 0){ ?>
       <br />
 <a class="userProfil" href="<?php echo get_name_page($idsite,$row_page_profil['id_page']); ?>">
Accédez à mon espace client
</a>
<?php } ?>



<?php $recompense .= '<table width="100%" border="1" cellpadding="0" cellspacing="0" class="std" id="cart_summary">
  <thead>
    <tr class="header_table">
      <th class="cart_product first_item" colspan="2">ARTICLE(S)</th>
      <th width="16%" class="cart_unit">Prix unitaire</th>
      <th width="16%" class="cart_quantity">QUANTITE</th>
      <th width="15%" class="cart_total">PRIX Total</th>
    </tr>
  </thead>
  <tfoot>
    <tr class="cart_total_price">
      <td style="padding: 5px 12px;" colspan="3" class="total_panier">TOTAL :</td>
      <td colspan="2" align="center" class="price" id="total_product" style="padding: 5px 12px;"><span>'.$total.'</span> '.$_SESSION["cat_devise_".$idsite].'</td>
    </tr>
  </tfoot>
  <tbody>';
            $i = 0;
            if (isset($products)) {
                foreach ($products as $product) {
					
					$id_product = end(explode("_", $products[$i]));
					
			$req_articles = "SELECT * FROM produit where id='".$id_product."'";
			$articles  = mysql_query($req_articles ,$connect);
			$row_articles  = mysql_fetch_assoc($articles);
					
					
				
   $recompense .= '<tr><td width="4%" align="center" class="cart_product"><a href="#">';
			$catalogue_slider = "SELECT * FROM images_produit where id_produit='".$id_product."' AND couverture = '1' LIMIT 1";
			$req_catalogue_slider = mysql_query($catalogue_slider ,$connect);
			$row_catalogue_slider = mysql_fetch_assoc($req_catalogue_slider);
			$num_catalogue_slider = mysql_num_rows($req_catalogue_slider);
			  
			  
			  if($num_catalogue_slider > 0){ 
        $recompense .= '<img src="'.SITEPATH."uploads/site_".$idsite."/catalogue/min/".end(explode("/", $row_catalogue_slider['image'])).'" width="60" />';
       }else{ 
      $recompense .=  '<img src="'.SITEPATH.'images/no_image.png" width="60" />';
         } 
        $recompense .= '</a></td>
      <td width="37%" class="cart_description"><p class="s_title_block">'.stripslashes($productsName[$i]).'</p></td>
      <td align="center" class="cart_unit"><span id="product_price_'.$i.'" class="price">'.$prices[$i].' '.$_SESSION["cat_devise_".$idsite].'</span></td>
      <td align="center" class="cart_quantity">'.$quantity[$i].'</td>
      <td align="center" class="cart_total"><span id="total_product_price_'.$i.'" class="price"> '.$prices[$i]*$quantity[$i].'</span> '.$_SESSION["cat_devise_".$idsite].'</td>
      
    </tr>';  $i++;
                }
            }
            
  $recompense .= '</tbody></table>';



$to = $tab_user["email"];
$subject = "Mes cadeaux";


$message = '<table width="800" height="484" border="0" align="center" cellpadding="0" cellspacing="0" id="Tableau_01" style="font:14px \'Century Gothic\', Century; color:#4e4e50;">
	<tr>
		<td height="110"><img width="383" height="73" alt="" src="http://marketstudies.oneoweb.com/uploads/site_69/images/Header/LOGO.png"></td>
	</tr>
	<tr>
		<td height="44">&nbsp;</td>
	</tr>
	<tr>
		<td height="39"><span style="font-size:20px; color:#c20000;">Félicitations '.$tab_user["prenom"].' '.$tab_user["nom"].'!</span><br>

Vous venez de convertir vos points en « chèques cadeaux ». Vous pouvez – dès à présent, les dépenser en vous procurant le(s) produit(s) ou service(s) qui vous intéressent, auprès des magasins et enseignes affiliés au réseau de nos partenaires.</td>
	</tr>
	<tr>
		<td height="22"></td>
	</tr>
	<tr>
		<td height="71">Vous avez gagnez :<br><br>
        '.$recompense.'
        </td>
	</tr>
	<tr>
		<td height="71"><p>Les bons d\'achat peuvent être retirés à l\'adresse suivante :</p>

<p>GENESE Management & Consulting C/O ANEXIS Conseil<br />
12, Rue Sabri Boujemâa – Derrière le Siège de la LYDEC (Agence Diouri) - 1er étage.<br />
Casablanca 20110.</p>
        </td>
	</tr>
	<tr>
		<td height="20"></td>
	</tr>
	<tr>
		<td height="109"><p>Merci!</p>
	    <p>Veuillez ne pas r&eacute;pondre &agrave; cette email. Pour toutes questions ou commentaires, veuillez remplir le formulaire de contact &agrave; cette adresse : <a href="http://www.marketstudies.ma/contact" target="_blank" style="color:#4e4e50">http://www.marketstudies.ma/contact</a></p></td>
	</tr>
	<tr>
		<td height="69" align="center"><div  style="border-top:3px solid #c20000; width:100%; height:69px; padding:6px 0; font-size:10px">Vous pouvez vous d&eacute;sabonner de ces emails &agrave; tout moment<br>
	  ou trouver des r&eacute;ponses &agrave; vos questions sur l\'Assistance Market studies.</div></td>
	</tr>
</table>';


		
			$mailer = new Mailer();
			$mailer->set_priority('Highest');
			$mailer->set_from('info@marketstudies.ma');
			$mailer->set_address($to);
			$mailer->set_format('html');
			$mailer->set_subject($subject);
			$mailer->set_message(utf8_decode($message), array('TAG1' => ''));
			$mailer->send();


$_SESSION["cat_quantity_".$idsite] = '';
$_SESSION["cat_products_".$idsite] = '';
$_SESSION["cat_prices_".$idsite] = '';
$_SESSION["cat_productsName_".$idsite] = '';
$_SESSION["cat_total_".$idsite] = 0;
$_SESSION["cat_transport_".$idsite]  = '';
$_SESSION["cat_paiement_".$idsite]  = '';

}else{
	?>
<h3>Oupss !</h3>

<p>
Points insuffisants
</p>
<?php
	
	}
} 
}
?>
</div>
