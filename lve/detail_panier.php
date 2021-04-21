<?php
session_start();
$etap = '';
include("config/connect.php"); 
include("config/connect_m.php"); 
 
include("functions/reglages.php"); 
include("functions/function.php"); 
include("wmailer/class.mailer.php");
$idsite = $_GET['idsite'];
//Update adresse
//nouvelle inscription
if(isset($_GET['action']) && $_GET['action'] == 'adresseFacturation'){

	
	$iduser = strip_tags($_GET['iduser']);
	
	
	
    $page_profil = "SELECT * FROM adresses_client where id_client = '".$iduser."' AND type = 'livraison'";
	$req_page_profil  = mysql_query($page_profil ,$connect_m);
	$row_page_profil = mysql_fetch_array($req_page_profil);
	
	
	
	 $query = "UPDATE adresses_client SET alias = '".$row_page_profil['alias']."',adresse = '".$row_page_profil['adresse']."',code_postal = '".$row_page_profil['code_postal']."',ville = '".$row_page_profil['ville']."',pays = '".$row_page_profil['pays ']."',tel_portable = '".$row_page_profil['tel_portable']."' WHERE id_client  = '".$iduser."' AND type = 'facturation'";
	mysql_query($query,$connect_m);
	
	echo 1;
	exit();
	
}


//nouvelle inscription
if(isset($_GET['action']) && $_GET['action'] == 'updateAdresse'){

	
	$idsite = strip_tags($_GET['idsite']);
	$id = strip_tags($_GET['id']);
	
	$nom = strip_tags($_GET['nom']);
	$mobile = strip_tags($_GET['mobile']);
	
	$adresse = strip_tags($_GET['adresse']);
	
	$code_postale = strip_tags($_GET['code_postale']);
	$ville = strip_tags($_GET['ville']);
	$pays = strip_tags($_GET['pays']);
	
	$query = "UPDATE adresses_client SET alias = '".$nom."',adresse = '".$adresse."',code_postal = '".$code_postale."',ville = '".$ville."',pays = '".$pays."',tel_portable = '".$mobile."' WHERE id  = '".$id."'";
	mysql_query($query,$connect_m);
	
	echo 1;
	exit();
	
}


//nouvelle inscription
if(isset($_GET['action']) && $_GET['action'] == 'newUser'){

	
	$idsite = strip_tags($_GET['idsite']);
	$email = strip_tags($_GET['email']);
	$civilite = strip_tags($_GET['civilite']);
	$prenom = strip_tags($_GET['prenom']);
	$nom = strip_tags($_GET['nom']);
	$mobile = strip_tags($_GET['mobile']);
	$mot_passe = strip_tags($_GET['mot_passe']);
	$jours_naissance = strip_tags($_GET['jours_naissance']);
	$mois_naissance = strip_tags($_GET['mois_naissance']);
	$annee_naissance = strip_tags($_GET['annee_naissance']);
	$adresse = strip_tags($_GET['adresse']);
	$adresse2 = strip_tags($_GET['adresse2']);
	$code_postale = strip_tags($_GET['code_postale']);
	$ville = strip_tags($_GET['ville']);
	$pays = strip_tags($_GET['pays']);
	$fixe = strip_tags($_GET['fixe']);
	$mode_contact = strip_tags($_GET['mode_contact']);
	
	$date_naissance = $jours_naissance.'/'.$mois_naissance.'/'.$annee_naissance;
	
	//espace securise
	
	//formulaire inscription
	
	//adresse client
	
	
$query_form = "INSERT INTO formulaire_inscription (id,id_site,civilite,nom,prenom,code_postale,ville,domicile,mobile,email,mode_contact,mot_passe,etat,nombre_point)
				VALUES(
				'',
				'".$idsite."',
				'".$civilite."',
				'".$nom."',
				'".$prenom."',
				'".$code_postale."',
				'".$ville."',
				'".$fixe."',
				'".$mobile."',
				'".$email."',
				'".$mode_contact."',
				'".$mot_passe."',
				'0',
				'50')";
			mysql_query($query_form,$connect_m);

$id_form = mysql_insert_id();




$query = "INSERT INTO espace_securise (id_point,id_site,nom_prenom,email,mot_passe,tel,date_naissance,etat)
		VALUES ('".$id_form."','".$idsite."','".$prenom." ".$nom."','".$email."','".$mot_passe."','".$mobile."','".$date_naissance."','1')";
mysql_query($query,$connect_m);
$id=mysql_insert_id();



$query_ad1 = "INSERT INTO adresses_client (id_client,type,adresse,code_postal,ville,pays,tel_domicile,tel_portable,alias)
		VALUES ('".$id."','livraison','".$adresse."','".$code_postale."','".$ville."','".$pays."','".$fixe."','".$mobile."','".$adresse2."')";
mysql_query($query_ad1,$connect_m);

$query_ad2 = "INSERT INTO adresses_client (id_client,type,adresse,code_postal,ville,pays,tel_domicile,tel_portable,alias)
		VALUES ('".$id."','facturation','".$adresse."','".$code_postale."','".$ville."','".$pays."','".$fixe."','".$mobile."',,'".$adresse2."')";
mysql_query($query_ad2,$connect_m);

if(!isset($_GET['mode'])){
if($civilite != 'M.'){

 echo "<p>Chere ".$civilite." ".$prenom." ".$nom."</p>
                    <p>Nous  vous remercions pour votre inscription. Nous vous confirmerons - par mail, votre  adhésion à notre panel, une fois la validation établie par notre comité.  </p> <h3>Parrainez et gagnez des points</h3>
                    <table width='100%' border='0'>
		  <tbody><tr>
			<td align='center'><a onclick='window.open(\"http://localhost/plateforme_0108/modules/partage/examples/hello_world/google.php?idsite=".$idsite."&id=".$id."\",\"Gmail\",\"menubar=no, status=no, scrollbars=yes, menubar=no, width=400, height=400\");' href='javascript:void(0)'><img class='idpico' id='parainnage_google' src='http://127.0.0.1/plateforme_0108/modules/partage/examples/widget_authentication/widget/images/icons/google.png' title='google'></a></td>
			<td align='center'></td>
			<td align='center'></td>
			<td align='center'></td>  
		  </tr>
		</tbody></table> ";
					
}else{
	
	

 echo "<p>Cher ".$civilite." ".$prenom." ".$nom."</p>
                    <p>Nous  vous remercions pour votre inscription. Nous vous confirmerons - par mail, votre  adhésion à notre panel, une fois la validation établie par notre comité.  </p><h3>Parrainez et gagnez des points</h3>
                    <table width='100%' border='0'>
		  <tbody><tr>
			<td align='center'><a onclick='window.open(\"http://localhost/plateforme_0108/modules/partage/examples/hello_world/google.php?idsite=".$idsite."&id=".$id."\",\"Gmail\",\"menubar=no, status=no, scrollbars=yes, menubar=no, width=400, height=400\");' href='javascript:void(0)'><img class='idpico' id='parainnage_google' src='http://127.0.0.1/plateforme_0108/modules/partage/examples/widget_authentication/widget/images/icons/google.png' title='google'></a></td>
			<td align='center'></td>
			<td align='center'></td>
			<td align='center'></td>  
		  </tr>
		</tbody></table>";
	}

}

			$to = $email;
			
			$subject = "Votre inscription sur notre site!";


$message = '<table width="800" height="604" border="0" align="center" cellpadding="0" cellspacing="0" id="Tableau_01" style="font:14px \'Century Gothic\', Century; color:#4e4e50;">
	<tr>
		<td height="110"><img width="383" height="73" alt="" src="http://marketstudies.oneoweb.com/uploads/site_69/images/Header/LOGO.png"></td>
	</tr>
	<tr>
		<td height="44">&nbsp;</td>
	</tr>
	<tr>
		<td height="39"><span style="font-size:20px; color:#c20000;">Bonjour '.$prenom.' '.$nom.'!</span><br>
Merci pour votre inscription sur marketstudies.ma!</td>
	</tr>
	<tr>
		<td height="22"></td>
	</tr>
	<tr>
		<td height="71">Vous pouvez maintenant vous connecter :<br>
        <p style="margin: 8px 0px;"><span style="color: rgb(194, 0, 0); padding-left: 20px; background: url(\'http://marketstudies.oneoweb.com/uploads/site_69/images/HomePage/footer/access_newsletter.png\') no-repeat scroll left 3px transparent; margin-left: 6px;">Login : </span> '.$email.'</p>
       <p style="margin: 8px 0px;"> <span style="color: rgb(194, 0, 0); padding-left: 20px; background: url(\'http://marketstudies.oneoweb.com/uploads/site_69/images/HomePage/footer/access_newsletter.png\') no-repeat scroll left -19px transparent; margin-left: 6px;">Mot de passe : </span> '.$mot_passe.'</p>

        </td>
	</tr>
	<tr>
		<td height="20"></td>
	</tr>
	<tr>
		<td height="120"><p>Nous vous sugg&eacute;rons de conserver cet email, au cas ou vous oublieriez votre pseudo ou votre mot de passe.</p>
		  <p>Afin d\'activer compl&egrave;tement votre compte, vous devez confirmer votre adresse email.<br>
		    Veuillez cliquer sur le lien ci-dessous :<br>
            <a href="http://www.marketstudies.ma/valide_inscription.php?site='.$idsite.'&id='.$id.'" style="font-size:12px;float:left; margin-top:6px;padding:4px; background:#c20000; color:#FFF; border-radius:5px;">Activation de mon compte</a>
        </p></td>
	</tr>
	<tr>
		<td height="109"><p>Merci!</p>
	    <p>Veuillez ne pas r&eacute;pondre &agrave; cette email. Pour toutes questions ou commentaires, veuillez remplir le formulaire de contact &agrave; cette adresse : <a href="http://www.marketstudies.ma/contact" target="_blank" style="color:#4e4e50">http://www.marketstudies.ma/contact</a></p></td>
	</tr>
	<tr>
		<td height="69" align="center"><div  style="border-top:3px solid #c20000; width:100%; height:69px; float:left; padding:6px 0; font-size:10px">Vous pouvez vous d&eacute;sabonner de ces emails &agrave; tout moment<br>
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

		
    $page_profil = "SELECT c.id_page FROM pages p,contenu c where p.id_site = '".$idsite."' AND c.id_page = p.id AND c.type = 'Profil_user' LIMIT 1";
	$req_page_profil  = mysql_query($page_profil ,$connect);
	$row_page_profil = mysql_fetch_assoc($req_page_profil);
	$num_page_profil = mysql_num_rows($req_page_profil);
		
		?>
        
        <?php if($num_page_profil > 0){ ?>
        <a class="userProfil" href="<?php echo get_name_page($idsite,$row_page_profil['id_page']); ?>">
        
        BIENVENUE <strong><?php echo $prenom." ".$nom ; ?></strong>
        </a>
        
        <?php }else{?>
        BIENVENUE <strong><?php echo $prenom." ".$nom ; ?></strong>
		<?php	} 

$_SESSION['nom_acces'] = $prenom." ".$nom ; 
$_SESSION['id_acces'] = $id; 

	
	
	exit();
	}

//connexion panier
if(isset($_GET['action']) && $_GET['action'] == 'loginPanier'){
	$email = strip_tags($_GET['email']);
	$mp = strip_tags($_GET['mp']);
	
	$query="SELECT * FROM espace_securise WHERE id_site = '".$idsite."' AND email = '".$email."' AND mot_passe = '".$mp."'";
	$req_query = mysql_query($query ,$connect_m);
	$tab_query = mysql_fetch_assoc($req_query);
	$num_query = mysql_num_rows($req_query);
	if($num_query > 0 && $tab_query['etat'] == 1){
		$_SESSION['nom_acces'] = $tab_query['nom_prenom']; 
		$_SESSION['id_acces'] = $tab_query['id']; 
		
		 $page_profil = "SELECT c.id_page FROM pages p,contenu c where p.id_site = '".$idsite."' AND c.id_page = p.id AND c.type = 'Profil_user' LIMIT 1";
	$req_page_profil  = mysql_query($page_profil ,$connect);
	$row_page_profil = mysql_fetch_assoc($req_page_profil);
	$num_page_profil = mysql_num_rows($req_page_profil);
		
		?>
        
        <?php if($num_page_profil > 0){ ?>
        <a class="userProfil" href="<?php echo get_name_page($idsite,$row_page_profil['id_page']); ?>">
        
        BIENVENUE <strong><?php echo $_SESSION['nom_acces'] ; ?></strong>
        </a>
        
        <?php }else{?>
        BIENVENUE <strong><?php echo $_SESSION['nom_acces'] ; ?></strong>
		<?php	} 
		
		}else if($num_query > 0 && $tab_query['etat'] == 0){
			$_SESSION['nom_acces'] = '';
			echo '0';
		}else{
			$_SESSION['nom_acces'] = '';
			echo '1';
		}
	
	
	
	exit();
	}
//Test email panier
if(isset($_GET['action']) && $_GET['action'] == 'testEmailAccountPanier'){
	$email = strip_tags($_GET['email']);
	
	$query="SELECT * FROM espace_securise WHERE id_site = '".$idsite."' AND email = '".$email."'";
	$req_query = mysql_query($query ,$connect_m);
	$tab_query = mysql_fetch_assoc($req_query);
	$num_query = mysql_num_rows($req_query);
	if($num_query > 0 ){
		
		
		
		echo 1;
		
		}else{
			echo '0';
		}
	
	
	
	exit();
	}



$_SESSION["devise_".$idsite];

$req_devise = "SELECT devise FROM site where id_site='".$idsite."'";
	$param_devise  = mysql_query($req_devise ,$connect);
	$row_param_devise  = mysql_fetch_assoc($param_devise);
	$_SESSION["devise_".$idsite] = $Devise = $row_param_devise['devise'];
	
 
if(isset($_POST['action']) && $_POST['action'] == 'add_nbr'){
	$product_id = $_POST['produit_id'];
	$_SESSION["quantity_".$_POST['idsite']][$product_id] = $_POST['quantity'];
	$_SESSION["total_".$_POST['idsite']] = $_POST['total'];
	exit();
	}
	




$quantity = $_SESSION["quantity_".$idsite];
$products = $_SESSION["products_".$idsite];
$prices = $_SESSION["prices_".$idsite];
$productsName = $_SESSION["productsName_".$idsite];
$total = $_SESSION["total_".$idsite];



$erreur = '';


if (!isset($total)) {
    $nbrP = 0;
    $total = 0;
}


if (isset($_GET['transport']) && $_GET['transport'] != '') {
    $_SESSION["transport_".$idsite] = $_GET['transport'];
}
if (isset($_GET['paiement']) && $_GET['paiement'] != '') {
    $_SESSION["paiement_".$idsite] = $_GET['paiement'];
}

if(count($products)==1 && $products[0]==''){
    $products=NULL;
}
$nbrP = count($products);

 if(!isset($_GET['step']) || $_GET['step'] == '' || $_GET['step'] == 0){ ?>
<ul class="step_panier">
  <li>1. Panier</li>
  <li class="inactif">2. Adresse</li>
  <li class="inactif">3. Livraison</li>
  <li class="inactif">4. Paiement</li>
  <li class="inactif">5. Confirmation</li>
</ul>
<h3>PANIER</h3>
<?php 
if (isset($products) && count($products) > 0) {  ?>
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="std" id="cart_summary">
  <thead>
    <tr class="header_table">
      <th colspan="2" class="cart_product first_item">ARTICLE(S)</th>
      <th class="cart_ref">Référence</th>
      <th class="cart_unit">Prix unitaire</th>
      <th class="cart_quantity">QUANTITE</th>
      <th class="cart_total">PRIX Total</th>
      <th class="cart_delete last_item">&nbsp;</th>
    </tr>
  </thead>
  <tfoot>
    <tr class="cart_total_price">
      <td colspan="5" class="total_panier">MONTANT TOTAL :</td>
      <td colspan="2" align="left" class="price" id="total_product" ><span><?php if (!isset($total) || $total == 'NaN'){echo '0';}else {echo $total;} ?></span> <?php echo $_SESSION["devise_".$idsite]; ?></td>
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
      <td align="center" width="66" class="cart_product"><?php //echo $req_articles; ?>
        <a href="#">
        <?php 
			$catalogue_slider = "SELECT * FROM images_produit where id_produit='".$id_product."' AND couverture = '1' LIMIT 1";
			$req_catalogue_slider = mysql_query($catalogue_slider ,$connect);
			$row_catalogue_slider = mysql_fetch_assoc($req_catalogue_slider);
			$num_catalogue_slider = mysql_num_rows($req_catalogue_slider);
			  
			  
			  if($num_catalogue_slider > 0){ ?>
        <img src="<?php echo SITEPATH."uploads/site_".$_GET['idsite']."/catalogue/min/".end(explode("/", $row_catalogue_slider['image'])); ?>" width="60" />
        <?php }else{ ?>
        <img src="<?php echo SITEPATH; ?>images/no_image.png" width="60" />
        <?php } ?>
        </a></td>
      <td class="cart_description"><p class="s_title_block"><?php echo $productsName[$i]; ?></p></td>
      <td align="center" class="cart_ref"><?php echo $row_articles['ref']; ?></td>
      <td align="center" class="cart_unit"><span id="product_price_<?php echo $i; ?>" class="price"><?php echo $prices[$i]; ?> <?php echo $_SESSION["devise_".$idsite]; ?></span></td>
      <td align="center" class="cart_quantity"><div class="cart_quantity_button"> <a title="Ajouter" href="#" data-idsite="<?php echo $idsite; ?>" id="<?php echo $i; ?>" class="cart_quantity_up" rel="nofollow">+</a><br>
          <a title="Enlever" href="#" id="<?php echo $i; ?>" data-idsite="<?php echo $idsite; ?>" class="cart_quantity_down" rel="nofollow"> - </a> </div>
        <input type="hidden" id="quantity_<?php echo $i; ?>_hidden" name="quantity_<?php echo $i; ?>_hidden" value="<?php echo $quantity[$i]; ?>">
        <input type="text" id="quantity_<?php echo $i; ?>" name="quantity_<?php echo $i; ?>" value="<?php echo $quantity[$i]; ?>" class="cart_quantity_input" autocomplete="off" size="2" disabled="disabled"></td>
      <td align="center" class="cart_total"><span id="total_product_price_<?php echo $i; ?>" class="price"> <?php echo $prices[$i]*$quantity[$i]; ?></span> <?php echo $_SESSION["devise_".$idsite]; ?></td>
      <td align="center" class="cart_delete"><div> <a href="#" data-product="<?php echo $_SESSION["products_".$idsite][$i]; ?>" data-idsite="<?php echo $idsite; ?>" id="<?php echo $i; ?>" class="cart_quantity_delete" rel="nofollow"> X </a> </div></td>
    </tr>
    <?php      $i++;
                }
            }
            ?>
  </tbody>
</table>
<br />
<a title="Valider" class="next_step change_step" data-step="1" data-idsite="<?php echo $_GET['idsite']; ?>" href="#">Valider <img src="images/arrow_next.png" /></a>
<?php }else{ ?>
<p>Panier vide </p>
<?php } ?>
<?php }else if(isset($_GET['step']) && $_GET['step'] == 1){ ?>
<ul class="step_panier">
<li class="change_step" data-idsite="<?php echo $_GET['idsite']; ?>" data-step="0">1. Panier</li>
  <li>2. Adresse</li>
  <li class="inactif">3. Livraison</li>
  <li class="inactif">4. Paiement</li>
  <li class="inactif">5. Confirmation</li>
</ul>
<?php if(!isset($_SESSION['nom_acces']) || $_SESSION['nom_acces'] == ''){ ?>
<link rel="Stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/espace_securise.css"/>
<div class=" grid_5" id="center_column">
  <h3>je me connecte</h3>
  <p>Pour commander et accéder à nos services, il est nécessaire de s'identifier ou de créer un compte utilisateur.</p><br />
<br />

  <?php if($erreur != ""){ ?>
  <div class="error"><?php echo $erreur; ?></div>
  <?php } ?>
  <style>

#SubmitCreate,#SubmitLogin,#SubmitPassword {
    background:  <?php echo $row_param_lien["couleur_lien"]; ?> !important ;
	border:0;
	color:#FFF;
	padding:5px 10px;
	margin-top:10px;
}
.lost_password a{color:<?php echo $row_param_lien["couleur_lien"]; ?> !important ; text-decoration:none;}
.password_forgotten{ display:none;}
</style>
  <form class="std" id="create-account_form" method="post" action="">
    <fieldset>
      <h3>Je crée mon compte</h3>
      <div class="form_content clearfix Espace_Securise">
        <p class="title_block">Saisissez votre adresse e-mail pour créer votre compte.</p>
        <p class="text">
          <label for="email_create">Adresse e-mail <span>*</span></label>
          <span>
          <input type="text" class="account_input input" value="" name="email_create" id="email_create">
          </span> </p>
        <p class="submit">
          <input type="hidden" value="inscription" name="action" class="hidden">
          <input type="submit" value="Je crée mon compte &#8250;" class="send" name="SubmitCreate" id="SubmitCreate" data-idsite="<?php echo $_GET['idsite']; ?>">
        </p>
        <p class="msg_error" style="display: none;"></p>
      </div>
    </fieldset>
  </form>
  <form class="std" id="formPoll" method="post" action="">
    <fieldset class="registred">
      <h3>J'ai déjà un compte</h3>
      <div class="form_content clearfix">
        <p class="text">
          <label for="email">Adresse e-mail <span>*</span></label>
          <span>
          <input type="text" class="account_input input" value="" name="email" id="email">
          </span> </p>
        <p class="text">
          <label for="passwd">Mot de passe <span>*</span></label>
          <span>
          <input type="password" class="account_input input" value="" name="passwd" id="passwd">
          </span> </p>
        <p class="submit">
          <input type="hidden" value="login" name="action" class="hidden">
          <input type="submit" value="Login &#8250;" class="send" name="SubmitLogin" id="SubmitLogin" data-idsite="<?php echo $_GET['idsite']; ?>">
        </p>
        <p class="lost_password"><br><a href="#" id="lost_password">Mot de passe oublié ?</a></p>
        <p class="msg_error" style="padding:0 !important;"></p>
      </div>
    </fieldset>
     <fieldset class="password_forgotten">
      <h3>Mot de passe oublié ?</h3>
      <div class="form_content clearfix">
        <p class="text">
          <label for="email">Adresse e-mail <span>*</span></label>
          <span>
          <input type="text" class="account_input input" value="" name="email" id="email">
          </span> </p>
        <p class="submit">
          <input type="submit" value="Envoyer &#8250;" class="send" name="SubmitPassword" id="SubmitPassword" data-idsite="<?php echo $_GET['idsite']; ?>">
        </p>
        <p class="recup_password"><br><a href="#" id="recup_password">Retour</a></p>
        <p class="msg_error"></p>
      </div>
    </fieldset>
  </form>
  <p class="infos">* Champs obligatoires</p>
</div>
<?php }else{ ?>
<div class="clearfix">
  <h3>Vos adresses</h3>
  <?php 
$adresse_livraison = "SELECT * FROM adresses_client where id_client='".$_SESSION['id_acces']."' AND type = 'livraison' LIMIT 1";
$req_adresse_livraison = mysql_query($adresse_livraison ,$connect_m);
$row_adresse_livraison = mysql_fetch_assoc($req_adresse_livraison);
$num_adresse_livraison = mysql_num_rows($req_adresse_livraison);
?>
  <ul id="address_delivery" class="address">
    <li class="address_title">Votre adresse de livraison</li>
    <li class="address_firstname lastname"><?php echo $_SESSION['nom_acces']; ?></li>
    <li class="address_address1"><?php echo $row_adresse_livraison['adresse']; ?></li>
    <li class="address_postcode city"><?php echo $row_adresse_livraison['code_postal']; ?> <?php echo $row_adresse_livraison['ville']; ?></li>
    <li class="address_Country"><?php echo $row_adresse_livraison['pays']; ?></li>
    <li class="address_phone"><?php echo $row_adresse_livraison['tel_portable']; ?></li>
    <li class="address_update"><a title="Modifier" href="#" data-idAdresse="<?php echo $row_adresse_livraison['id']; ?>" data-idsite="<?php echo $_GET['idsite']; ?>" class="updateAdresse"><span><img src="<?php echo SITEPATH; ?>images/maj_step.png" alt="Modifier" title="Modifier" /></span> Modifier</a></li>
    
  </ul>
  <?php 
$adresse_facturation = "SELECT * FROM adresses_client where id_client='".$_SESSION['id_acces']."' AND type = 'facturation' LIMIT 1";
$req_adresse_facturation = mysql_query($adresse_facturation ,$connect_m);
$row_adresse_facturation = mysql_fetch_assoc($req_adresse_facturation);
$num_adresse_facturation = mysql_num_rows($req_adresse_facturation);
?>
  <ul id="address_invoice" class="address alternate_item ">
    <li class="address_title">Votre adresse de facturation</li>
    <li class="lastname"><input name="adresse_fac" id="adresse_fac" type="checkbox" checked="checked" value="1" data-iduser="<?php echo $_SESSION['id_acces']; ?>" />Adresse de facturation identique</li>
    <li class="address_firstname lastname"><?php echo $_SESSION['nom_acces']; ?></li>
    <li class="address_address1"><?php echo $row_adresse_facturation['adresse']; ?></li>
    <li class="address_postcode city"><?php echo $row_adresse_facturation['code_postal']; ?> <?php echo $row_adresse_facturation['ville']; ?></li>
    <li class="address_Country"><?php echo $row_adresse_facturation['pays']; ?></li>
    <li class="address_phone"><?php echo $row_adresse_facturation['tel_portable']; ?></li>
    <li class="address_update"><a title="Modifier" href="#" data-idAdresse="<?php echo $row_adresse_facturation['id']; ?>" data-idsite="<?php echo $_GET['idsite']; ?>" class="updateAdresse"><span><img src="<?php echo SITEPATH; ?>images/maj_step.png" alt="Modifier" title="Modifier" /></span> Modifier</a></li>
  
  </ul>
</div> <a title="Livraison" class="next_step change_step" data-step="2" data-idsite="<?php echo $_GET['idsite']; ?>" href="#">Livraison <img src="images/arrow_next.png" /></a>
<?php }
}else if(isset($_GET['step']) && $_GET['step'] == 7){ 
?>
<ul class="step_panier">
<li class="change_step" data-idsite="<?php echo $_GET['idsite']; ?>" data-step="0">1. Panier</li>
  <li>2. Adresse</li>
  <li class="inactif">3. Livraison</li>
  <li class="inactif">4. Paiement</li>
  <li class="inactif">5. Confirmation</li>
</ul>
<link rel="Stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/espace_securise.css"/>
<h3>Je m'inscris</h3>
<form id="formID" class="formular" method="post" action="" >
<div class="form-panel" id="panel1">
<fieldset class="ui-corner-all">
<div id="panel1_1">
  <h2 class="titreh2">INFORMATIONS PERSONNELLES</h2>
  <div>
    <div class="titre_input"> Civilté <span>*</span></div>
    <div class="input_input">
      <div>
        <input type="radio" value="M." checked="" id="civilite" name="civilite">
        M </div>
      <div>
        <input type="radio" value="Mme" id="civilite" name="civilite">
        Mme </div>
      <div>
        <input type="radio" value="Mlle" id="civilite" name="civilite">
        Mlle </div>
    </div>
  </div>
  <div>
    <div class="titre_label">Prénom <span>*</span></div>
    <div class="input_label">
      <input type="text" id="prenom" name="prenom" class="validate[required,custom[onlyLetter],length[0,100]] text-input">
    </div>
  </div>
  <div>
    <div class="titre_label">Nom <span>*</span></div>
    <div class="input_label">
      <input type="text" id="nom" name="nom" class="validate[required,custom[onlyLetter],length[0,100]] text-input">
    </div>
  </div>
  <div>
    <div class="titre_label">Téléphone <span>*</span></div>
    <div class="input_label">
      <input type="text" id="mobile" name="mobile" class="validate[required,custom[telephone]] text-input">
    </div>
  </div>
  <div>
    <div class="titre_label">E-mail <span>*</span></div>
    <div class="input_label">
      <input type="text" id="email_inscri" name="email_inscri" class="validate[required,custom[email]] text-input" value="<?php echo $_GET['email']; ?>">
    </div>
    <div id="response_email" style="color: red; font-size: 10px; margin: 31px 0px 0px 12px; width: auto ! important;"></div>
  </div>
  <div>
    <div class="titre_label">Mot de passe <span>*</span></div>
    <div class="input_label">
      <input type="password" id="mot_passe" name="mot_passe" class="validate[required,length[6,11]] text-input">
    </div>
  </div>
  <div>
    <div class="titre_label">Date naissance <span>*</span></div>
    <div class="input_label">
      <select type="select" name="jours_naissance" id="jours_naissance" class="validate[required]">
        <option>JJ</option>
        <option ="1"="">1</option>
        <option ="2"="">2</option>
        <option ="3"="">3</option>
        <option ="4"="">4</option>
        <option ="5"="">5</option>
        <option ="6"="">6</option>
        <option ="7"="">7</option>
        <option ="8"="">8</option>
        <option ="9"="">9</option>
        <option ="10"="">10</option>
        <option ="11"="">11</option>
        <option ="12"="">12</option>
        <option ="13"="">13</option>
        <option ="14"="">14</option>
        <option ="15"="">15</option>
        <option ="16"="">16</option>
        <option ="17"="">17</option>
        <option ="18"="">18</option>
        <option ="19"="">19</option>
        <option ="20"="">20</option>
        <option ="21"="">21</option>
        <option ="22"="">22</option>
        <option ="23"="">23</option>
        <option ="24"="">24</option>
        <option ="25"="">25</option>
        <option ="26"="">26</option>
        <option ="27"="">27</option>
        <option ="28"="">28</option>
        <option ="29"="">29</option>
        <option ="30"="">30</option>
        <option ="31"="">31</option>
      </select>
      <select type="select" name="mois_naissance" id="mois_naissance" class="validate[required]">
        <option>MM</option>
        <option ="1"="">1</option>
        <option ="2"="">2</option>
        <option ="3"="">3</option>
        <option ="4"="">4</option>
        <option ="5"="">5</option>
        <option ="6"="">6</option>
        <option ="7"="">7</option>
        <option ="8"="">8</option>
        <option ="9"="">9</option>
        <option ="10"="">10</option>
        <option ="11"="">11</option>
        <option ="12"="">12</option>
      </select>
      <select type="select" name="annee_naissance" id="annee_naissance" class="validate[required]">
        <option>AA</option>
        <option value="1920">1920</option>
        <option value="1921">1921</option>
        <option value="1922">1922</option>
        <option value="1923">1923</option>
        <option value="1924">1924</option>
        <option value="1925">1925</option>
        <option value="1926">1926</option>
        <option value="1927">1927</option>
        <option value="1928">1928</option>
        <option value="1929">1929</option>
        <option value="1930">1930</option>
        <option value="1931">1931</option>
        <option value="1932">1932</option>
        <option value="1933">1933</option>
        <option value="1934">1934</option>
        <option value="1935">1935</option>
        <option value="1936">1936</option>
        <option value="1937">1937</option>
        <option value="1938">1938</option>
        <option value="1939">1939</option>
        <option value="1940">1940</option>
        <option value="1941">1941</option>
        <option value="1942">1942</option>
        <option value="1943">1943</option>
        <option value="1944">1944</option>
        <option value="1945">1945</option>
        <option value="1946">1946</option>
        <option value="1947">1947</option>
        <option value="1948">1948</option>
        <option value="1949">1949</option>
        <option value="1950">1950</option>
        <option value="1951">1951</option>
        <option value="1952">1952</option>
        <option value="1953">1953</option>
        <option value="1954">1954</option>
        <option value="1955">1955</option>
        <option value="1956">1956</option>
        <option value="1957">1957</option>
        <option value="1958">1958</option>
        <option value="1959">1959</option>
        <option value="1960">1960</option>
        <option value="1961">1961</option>
        <option value="1962">1962</option>
        <option value="1963">1963</option>
        <option value="1964">1964</option>
        <option value="1965">1965</option>
        <option value="1966">1966</option>
        <option value="1967">1967</option>
        <option value="1968">1968</option>
        <option value="1969">1969</option>
        <option value="1970">1970</option>
        <option value="1971">1971</option>
        <option value="1972">1972</option>
        <option value="1973">1973</option>
        <option value="1974">1974</option>
        <option value="1975">1975</option>
        <option value="1976">1976</option>
        <option value="1977">1977</option>
        <option value="1978">1978</option>
        <option value="1979">1979</option>
        <option value="1980">1980</option>
        <option value="1981">1981</option>
        <option value="1982">1982</option>
        <option value="1983">1983</option>
        <option value="1984">1984</option>
        <option value="1985">1985</option>
        <option value="1986">1986</option>
        <option value="1987">1987</option>
        <option value="1988">1988</option>
        <option value="1989">1989</option>
        <option value="1990">1990</option>
        <option value="1991">1991</option>
        <option value="1992">1992</option>
        <option value="1993">1993</option>
        <option value="1994">1994</option>
        <option value="1995">1995</option>
        <option value="1996">1996</option>
        <option value="1997">1997</option>
        <option value="1998">1998</option>
        <option value="1999">1999</option>
        <option value="2000">2000</option>
      </select>
    </div>
  </div>
  <input type="submit" data-idsite="<?php echo $_GET['idsite']; ?>" id="SubmitInscription" name="SubmitInscription" class="next_step send" value="Adresses &#8250;">
</div>
<div id="panel1_2">
  <h2 class="titreh2">VOTRE ADRESSE</h2>
  <div style="height:35px"> </div>
  <div>
    <div class="titre_label">Nom de l'adresse <span>*</span></div>
    <div class="input_label">
      <input type="text" id="adresse2" name="adresse2" class="validate[required,length[0,500]] text-input">
    </div>
  </div>
  <div>
    <div class="titre_label">Adresse <span>*</span></div>
    <div class="input_label">
      <input type="text" id="adresse" name="adresse" class="validate[required,length[0,500]] text-input">
    </div>
  </div>
  <div>
    <div class="titre_label">Code postale <span>*</span></div>
    <div class="input_label">
      <input type="text" id="code_postale" name="code_postale" class="validate[required,custom[onlyNumber]] text-input">
    </div>
  </div>
  <div>
    <div class="titre_label">Ville <span>*</span></div>
    <div class="input_label">
      <input type="text" id="ville" name="ville" class="validate[required,custom[onlyLetter],length[0,100]] text-input">
    </div>
  </div>
  <div>
    <div class="titre_label">Pays <span>*</span></div>
    <div class="input_label">
      <input type="text" id="pays" name="pays" class="validate[required,custom[onlyLetter],length[0,50]] text-input">
    </div>
  </div>
  <div>
    <div class="titre_label">Fixe <span>*</span></div>
    <div class="input_label">
      <input type="text" id="fixe" name="fixe" class="validate[required,custom[telephone]] text-input">
    </div>
  </div>
</div>
<div id="panel1_3">

  <div style="height:396px"> </div>
  <div>
    <div class="titre_label">Mode de contact préféré <span>*</span></div>
    <div class="input_label">
      <select class="validate[required]" id="mode_contact" name="mode_contact" type="select">
        <option value="">Sélectionner</option>
        <option value="Téléphone">Téléphone</option>
        <option value="E-mail">E-mail</option>
        <option value="Fax">Fax</option>
        <option value="Courrier postal">Courrier postal</option>
      </select>
    </div>
  </div>
</div>
<fieldset>
<p><br />* Champs obligatoires</p>
</div>
</form> 
<script>
	
$(document).ready(function() {
	// intialisation objet validation
	$("[class^=validate]").validationEngine({
		success :  false,
		failure : function() {}
	});
		});
</script>
<?php }else if(isset($_GET['step']) && $_GET['step'] == 8){ 

	$req_adresse = "SELECT * FROM adresses_client where id='".$_GET['id']."'";
	$adresse  = mysql_query($req_adresse ,$connect_m);
	$raw_adresse  = mysql_fetch_array($adresse);
?>
<ul class="step_panier">
<li class="change_step" data-idsite="<?php echo $_GET['idsite']; ?>" data-step="0">1. Panier</li>
  <li class="change_step" data-idsite="<?php echo $_GET['idsite']; ?>" data-step="1">2. Adresse</li>
  <li class="inactif">3. Livraison</li>
  <li class="inactif">4. Paiement</li>
  <li class="inactif">5. Confirmation</li>
</ul>
<link rel="Stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/espace_securise.css"/>
<h3>Modifier mon adresse</h3>
<div class="form-panel" id="panel1">
<fieldset class="ui-corner-all">
<div id="panel1_2">
  <div>
    <div class="titre_label">Nom de l'adresse :</div>
    <div class="input_label">
      <input type="text" id="nom" name="nom" class="validate[required,length[0,500]] text-input" value="<?php echo $raw_adresse['alias']; ?>">
    </div>
  </div>
  <div>
    <div class="titre_label">Adresse :</div>
    <div class="input_label">
      <input type="text" id="adresse" name="adresse" class="validate[required,length[0,500]] text-input" value="<?php echo $raw_adresse['adresse']; ?>">
    </div>
  </div>
  <div>
    <div class="titre_label">Code postale :</div>
    <div class="input_label">
      <input type="text" id="code_postale" name="code_postale" class="validate[required,custom[onlyNumber]] text-input" value="<?php echo $raw_adresse['code_postal']; ?>">
    </div>
  </div>
  <div>
    <div class="titre_label">Ville :</div>
    <div class="input_label">
      <input type="text" id="ville" name="ville" class="validate[required,custom[onlyLetter],length[0,100]] text-input" value="<?php echo $raw_adresse['ville']; ?>">
    </div>
  </div>
  <div>
    <div class="titre_label">Pays :</div>
    <div class="input_label">
      <input type="text" id="pays" name="pays" class="validate[required,custom[onlyLetter],length[0,50]] text-input" value="<?php echo $raw_adresse['pays']; ?>">
    </div>
  </div>
  <div>
    <div class="titre_label">Téléphone :</div>
    <div class="input_label">
      <input type="text" id="mobile" name="mobile" class="validate[required,custom[onlyLetter],length[0,50]] text-input" value="<?php echo $raw_adresse['tel_portable']; ?>">
    </div>
  </div>
  <input type="submit" data-idsite="<?php echo $_GET['idsite']; ?>" data-idAdresse="<?php echo $_GET['id']; ?>" id="updateAdresse" name="updateAdresse" class="next_step send" value="Valider &#8250;">
  
</div>

<fieldset>
</div>
<?php }else if(isset($_GET['step']) && $_GET['step'] == 2){ ?>
<?php $req_transport = "SELECT * FROM transport_catalogue where id_site='".$_GET['idsite']."' AND etat = '1'";
	$transport  = mysql_query($req_transport ,$connect);
	
	 ?>
<ul class="step_panier">
  <li class="change_step" data-idsite="<?php echo $_GET['idsite']; ?>" data-step="0">1. Panier</li>
  <li class="change_step" data-idsite="<?php echo $_GET['idsite']; ?>" data-step="1">2. Adresse</li>
  <li>3. Livraison</li>
  <li class="inactif">4. Paiement</li>
  <li class="inactif">5. Confirmation</li>
</ul>
<h3>LIVRAISON</h3>
<?php 
if(mysql_num_rows($transport)>0){?>
<table width="100%" cellspacing="0" cellpadding="0" border="1" id="cart_summary">
<thead>
  <tr class="header_table">
    <th align="center">Mode de livraison</td>
    <th align="center">Prix</td>
    <th align="center">Delai de livraison</td>
    <th align="center">Mon choix</td>
  </tr>
  </thead>
  <?php
while($row_transport  = mysql_fetch_assoc($transport)){
		?>
  <tr>
    <td height="50"><?php if($row_transport['logo'] != ''){ ?>
      <img src="<?php echo utf8_encode($row_transport['logo']); ?>" align="absmiddle" style="max-width:60px" />
      <?php } ?><?php echo $row_transport['transporteur']; ?> </td>
    <td align="center" class="price">
      <?php if($row_transport['taxe_transport'] != 0){ echo $row_transport['taxe_transport'].' '.$_SESSION["devise_".$idsite];}else{echo 'Gratuit';} ?>
    </td>
     <td align="center"> <?php echo $row_transport['delai_livraison']; ?></td>
    <td align="center">
    
      <input name="transport" class="transport" type="radio" value="<?php echo $row_transport['id']; ?>"  <?php if($_SESSION["transport_".$idsite] == $row_transport['id']) echo 'checked="checked"'; ?> />
    </td>
  </tr>
   <?php 
} ?>
</table>
 
<br />
  <br />
<a title="Paiment" class="next_step change_step" data-idsite="<?php echo $_GET['idsite']; ?>" data-step="3" href="#">Paiment <img src="images/arrow_next.png" /></a>
</form>
<?php
}
 }else if(isset($_GET['step']) && $_GET['step'] == 3){ ?>
 
<?php	$req_paiement = "SELECT p.*,t.*,p.id AS id_paiement FROM paiement_catalogue p,type_paiement t where p.type = t.id AND p.id_site='".$_GET['idsite']."' AND etat = '1' GROUP BY p.type";
	$paiement  = mysql_query($req_paiement ,$connect);
	
	
	$taxe_transport = "SELECT transporteur,taxe_transport FROM transport_catalogue where id = '".$_SESSION["transport_".$_GET['idsite']]."' AND etat = '1'";
	$query_taxe_transport  = mysql_query($taxe_transport ,$connect);
	$array_taxe_transport  = mysql_fetch_array($query_taxe_transport);
	  
	
	 ?>
<ul class="step_panier">
  <li class="change_step" data-idsite="<?php echo $_GET['idsite']; ?>" data-step="0">1. Panier</li>
  <li class="change_step" data-idsite="<?php echo $_GET['idsite']; ?>" data-step="1">2. Adresse</li>
  <li class="change_step" data-idsite="<?php echo $_GET['idsite']; ?>" data-step="2">3. Livraison</li>
  <li>4. Paiement</li>
  <li class="inactif">5. Confirmation</li>
</ul>
<h3>Mon paiement</h3>
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="std" id="cart_summary">
  <thead>
    <tr class="header_table">
      <th colspan="2" class="cart_product first_item">ARTICLE(S)</th>
      <th class="cart_ref">Référence</th>
      <th class="cart_unit">Prix unitaire</th>
      <th class="cart_quantity">QUANTITé</th>
      <th class="cart_total">Prix Total</th>
      <th class="cart_delete last_item">&nbsp;</th>
    </tr>
  </thead>
  <tfoot>
   
    <tr class="cart_total_price">
      <td colspan="5" class="total_panier">MONTANT TOTAL :</td>
      <td colspan="2" align="left" class="price" id="total_product" ><span><?php echo $total; ?></span> <?php echo $_SESSION["devise_".$idsite]; ?></td>
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
      <td class="cart_product" align="left" width="66">
        <a href="#">
        <?php 
			$catalogue_slider = "SELECT * FROM images_produit where id_produit='".$id_product."' AND couverture = '1' LIMIT 1";
			$req_catalogue_slider = mysql_query($catalogue_slider ,$connect);
			$row_catalogue_slider = mysql_fetch_assoc($req_catalogue_slider);
			$num_catalogue_slider = mysql_num_rows($req_catalogue_slider);
			  
			  
			  if($num_catalogue_slider > 0){ ?>
        <img src="<?php echo SITEPATH."uploads/site_".$_GET['idsite']."/catalogue/min/".end(explode("/", $row_catalogue_slider['image'])); ?>" width="60" />
        <?php }else{ ?>
        <img src="<?php echo SITEPATH; ?>images/no_image.png" width="60" />
        <?php } ?>
        </a></td>
      <td class="cart_description"><p class="s_title_block"><?php echo $productsName[$i]; ?></p></td>
      <td align="center" class="cart_ref"><?php echo $row_articles['ref']; ?></td>
      <td align="center" class="cart_unit"><span id="product_price_<?php echo $i; ?>" class="price"><?php echo $prices[$i]; ?> <?php echo $_SESSION["devise_".$idsite]; ?></span></td>
      <td align="center" class="cart_quantity"><div class="cart_quantity_button"> <a title="Ajouter" href="#" id="<?php echo $i; ?>" data-idsite="<?php echo $idsite; ?>" class="cart_quantity_up" rel="nofollow">+</a><br>
          <a title="Enlever" href="#" id="<?php echo $i; ?>" data-idsite="<?php echo $idsite; ?>" class="cart_quantity_down" rel="nofollow"> - </a> </div>
        <input type="hidden" id="quantity_<?php echo $i; ?>_hidden" name="quantity_<?php echo $i; ?>_hidden" value="<?php echo $quantity[$i]; ?>">
        <input type="text" id="quantity_<?php echo $i; ?>" name="quantity_<?php echo $i; ?>" value="<?php echo $quantity[$i]; ?>" class="cart_quantity_input" autocomplete="off" size="2" disabled="disabled"></td>
      <td align="center" class="cart_total"><span id="total_product_price_<?php echo $i; ?>" class="price"> <?php echo $prices[$i]*$quantity[$i]; ?></span> <?php echo $_SESSION["devise_".$idsite]; ?></td>
      <td align="center" class="cart_delete"><div> <a href="#" data-product="<?php echo $_SESSION["products_".$idsite]; ?>" data-idsite="<?php echo $idsite; ?>" id="<?php echo $i; ?>" class="cart_quantity_delete" rel="nofollow"> X </a> </div></td>
    </tr>
    <?php      $i++;
                }
            }
            ?>
  </tbody>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="std">
 <tr class="cart_total_price_last">
      <td colspan="3" class="total_panier_last">&nbsp;</td>
      <td width="27%" colspan="4" align="center" class="total_panier_last">
        <strong>Total de mes articles : <span class="total_ttc"><?php echo $_SESSION["total_".$idsite].'</span> <span>'.$_SESSION["devise_".$idsite]; ?></span><br />
        Total des frais de port : <span>
        <?php if($array_taxe_transport['taxe_transport'] > 0){
		  
		  echo '<span class="total_transport">'.$array_taxe_transport['taxe_transport'].'</span> <span>'.$_SESSION["devise_".$idsite];
		  $total = $total + $array_taxe_transport['taxe_transport'];
	  }else{
		  
		  echo '<span class="total_transport">Gratuit</span>';
		  } ?>
        </span><br />
       <div> MONTANT TTC : <span class="total_ttc_transport"><?php echo $total.'</span> <span>'.$_SESSION["devise_".$idsite]; ?></span></div>
      </strong></td>
    </tr>
</table>
<br /> <?php //if($idsite == 1){//if($idsite == 69){ ?>
<p><input id="Condition_general" name="Condition_general" type="checkbox" value="1" /> Je déclare avoir lu et accepté sans réserve les <a href="javascript:ouvre_popup('conditions_utilisation.html')">Conditions générales de Vente</a></p>
<br /><br /><br />
<?php // } ?>
<p align="center"><strong>CLIQUEZ SUR LE LOGO DU MODE DE PAIEMENT POUR PAYER VOTRE COMMANDE</strong></p>
<br />
<?php 
if(mysql_num_rows($paiement)>0){?>
  <?php
while($row_paiement  = mysql_fetch_assoc($paiement)){
		?>

     
<a href="#" data-idPaiement="<?php echo $row_paiement['id_paiement']; ?>" data-idsite="<?php echo $_GET['idsite']; ?>" class="mode_payement"><?php //echo $row_paiement['type_paiement']; ?>
<img src="<?php echo SITEPATH; ?>images/paiement/<?php echo $row_paiement['id_paiement']; ?>.png" />
</a> 
  <?php 
} ?>
  <br />
  <br />
 <!--<a title="Précédent" class="prev_step change_step" data-idsite="<?php echo $_GET['idsite']; ?>" data-step="2" href="#"><span><img src="<?php echo SITEPATH; ?>images/prev_step.png" alt="Précédent" title="Précédent" /></span> Précédent</a> 
 
<a title="Suivant" class="next_step" href="javascript:void(0);" onclick="form_paiement.submit()">Suivant <span><img src="<?php echo SITEPATH; ?>images/next_step.png" alt="Suivant" title="Suivant" /></span></a>-->
  
<?php
}


}else if(isset($_GET['step']) && $_GET['step'] == 4){  ?>
<?php 
	  
	$paiement = "SELECT p.*,t.*,p.id AS id_paiement FROM paiement_catalogue p,type_paiement t where p.type = t.id AND p.id='".$_SESSION["paiement_".$idsite]."' AND etat = '1'";
	$query_paiement  = mysql_query($paiement ,$connect);
	$array_paiement  = mysql_fetch_array($query_paiement);
	   ?>
       <ul class="step_panier">
  <li class="change_step" data-idsite="<?php echo $_GET['idsite']; ?>" data-step="0">1. Panier</li>
  <li class="change_step" data-idsite="<?php echo $_GET['idsite']; ?>" data-step="1">2. Adresse</li>
  <li class="change_step" data-idsite="<?php echo $_GET['idsite']; ?>" data-step="2">3. Livraison</li>
  <li>4. Paiement</li>
  <li class="inactif">5. Confirmation</li>
</ul>
<div id="print_to">
<h3> Méthode de paiement</h3>
<?php
$idsite = $_GET['idsite'];

  $taxe_transport = "SELECT * FROM transport_catalogue where id = '".$_SESSION["transport_".$idsite]."' AND etat = '1'";
	$query_taxe_transport  = mysql_query($taxe_transport ,$connect);
	$array_taxe_transport  = mysql_fetch_array($query_taxe_transport);
	
	$total = $_SESSION["total_".$idsite]+$array_taxe_transport['taxe_transport'];
	

 if($array_paiement['type'] == 2){
?>
<p><strong>Bonjour <?php echo $_SESSION['nom_acces'] ; ?>.</strong></p><br />

<p>Vous avez sélectionné le mode de paiement par chèque. Celui-ci est à adresser :  </p>
<ul>
  <li> D'un montant total de <?php echo $total.' '.$_SESSION["devise_".$idsite]; ?>. T.T.C.</li>
<li>A l'ordre de <?php echo $array_paiement['ordre_de']; ?></li>
<li>A l'adresse : <?php echo $array_paiement['adresse']; ?></li>

</ul>
<?php echo $array_paiement['details']; ?><br />

<p>Sans oublier de mentionner votre nom &amp; prénom ou raison  sociale, suivi de votre numéro de commande inscrit ci-dessus.</p>
<p>Vous pouvez accéder au suivi de votre commande dans «&nbsp;<strong>Historique des commandes&nbsp;</strong>» de  votre compte.</p>



<?php	}else if($array_paiement['type'] == 3){ ?>
<p><strong>Bonjour <?php echo $_SESSION['nom_acces'] ; ?>.</strong></p><br />

<p>Vous avez sélectionné le mode de paiement par virement bancaire. Celui-ci est à adresser :  </p>
<ul>
  <li>En faveur de <strong><?php echo $array_paiement['titulaire']; ?></strong></li>
  <li>Montant total est de votre commande <strong><?php echo $total.' '.$_SESSION["devise_".$idsite]; ?>.  T.T.C.</strong></li>
</ul>
<p>- <?php echo $array_paiement['adresse_banque']; ?></p>
<?php echo $array_paiement['details']; ?><br />

<p>Sans oublier de mentionner votre nom &amp; prénom ou raison  sociale, suivi de votre numéro de commande inscrit ci-dessus.</p>
<p>Vous pouvez accéder au suivi de votre commande dans «&nbsp;<strong>Historique des commandes&nbsp;</strong>» de  votre compte.</p>

<?php }else if($array_paiement['type'] == 1){ ?>
	
    
<p><strong>Bonjour <?php echo $_SESSION['nom_acces'] ; ?>.</strong></p><br />

<p>Vous avez sélectionné le mode de paiement Comptant à la livraison. </p>

<p>Vous pouvez accéder au suivi de votre commande dans «&nbsp;<strong>Historique des commandes&nbsp;</strong>» de  votre compte.</p>
    
    <?php 
	}
	?>
    </div>
   
<p>Nous vous conseillons d'imprimer cette page afin de conserver les différentes références de votre commande et faciliter le dialogue avec notre Service Client. <a href="#" id="print"><img src="images/print.png" width="22" height="22" align="absmiddle" /></a></p>
<br />
<!--<a title="Précédent" class="prev_step" href="detail_panier.php?step=4&idsite=<?php echo $_GET['idsite']; ?>"><span><img src="<?php echo SITEPATH; ?>images/prev_step.png" alt="Précédent" title="Précédent" /></span> Précédent</a>--> 
<a title="Valider" class="next_step change_step" data-step="5" data-idsite="<?php echo $_GET['idsite']; ?>" href="#">Valider <img src="images/arrow_next.png" /></a>

<?php }else if(isset($_GET['step']) && $_GET['step'] == 5){ 

$date = date("Y-m-d H:i:s");

  $taxe_transport = "SELECT * FROM transport_catalogue where id = '".$_SESSION["transport_".$idsite]."' AND etat = '1'";
	$query_taxe_transport  = mysql_query($taxe_transport ,$connect);
	$array_taxe_transport  = mysql_fetch_array($query_taxe_transport);
	
  $client = "SELECT * FROM espace_securise where id = '".$_SESSION['id_acces']."'";
	$query_client  = mysql_query($client ,$connect_m);
	$array_client  = mysql_fetch_array($query_client);
	
	$total = $_SESSION["total_".$idsite]+$array_taxe_transport['taxe_transport'];
	
	$facture = 'MS'.substr(number_format(time() * rand(),0,'',''),0,6);


$query_commandes = "INSERT INTO commandes (id_site,id_client,ref,etat,date,type_payement,reduction,type_livraison,infos,total,devise)
				VALUES(
				'".$_GET['idsite']."',
				'".$_SESSION['id_acces']."',
				'".$facture."',
				'1',
				'".$date."',
				'".$_SESSION["paiement_".$idsite]."',
				'',
				'".$_SESSION["transport_".$idsite]."',
				'',
				'".$total."',
				'".$_SESSION["devise_".$idsite]."')";
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
			


?>
      <ul class="step_panier">
  <li>1. Panier</li>
  <li>2. Adresse</li>
  <li>3. Livraison</li>
  <li>4. Paiement</li>
  <li>5. Confirmation</li>
</ul>

<div id="print_to">
<h3>Confirmation</h3>
<h4>Ma confirmation de commande n° <?php echo $facture; ?> </h4>
<p>Bonjour <?php echo $_SESSION['nom_acces']; ?></p><br />

<p>Votre commande <strong>n° <?php echo $facture; ?>  du <?php echo date("d/m/Y H:i", strtotime($date));?></strong> a bien été enregistrée sur notre site et nous vous remercions de votre confiance.</p>
<br />

<?php

	$paiement = "SELECT p.*,t.*,p.id AS id_paiement FROM paiement_catalogue p,type_paiement t where p.type = t.id AND p.id='".$_SESSION["paiement_".$idsite]."' AND etat = '1'";
	$query_paiement  = mysql_query($paiement ,$connect);
	$array_paiement  = mysql_fetch_array($query_paiement);
$text_payement = "";

if($_SESSION["paiement_".$idsite] == 2){
?>
<?php $text_payement = '<p>Vous avez sélectionné le mode de paiement par chèque. Celui-ci est à adresser :  </p>
<ul>
  <li> D\'un montant total de '.$total.' '.$_SESSION["devise_".$idsite].'. T.T.C.</li>
<li>A l\'ordre de '.$array_paiement['ordre_de'].'</li>
<li>A l\'adresse : '.$array_paiement['adresse'].'</li>

</ul>'.$array_paiement['details'].'
<p>Sans oublier de mentionner votre nom &amp; prénom ou raison  sociale, suivi de votre numéro de commande inscrit ci-dessus.</p>
<p>Vous pouvez accéder au suivi de votre commande dans «&nbsp;<strong>Historique des commandes&nbsp;</strong>» de  votre compte.</p>';


	}else if($_SESSION["paiement_".$idsite] == 3){ 
$text_payement = '<p>Vous avez sélectionné le mode de paiement par  virement bancaire. Celui-ci est à adresser :  </p>
<ul>
  <li>En faveur de <strong>'.$array_paiement['titulaire'].'</strong></li>
  <li>Montant total est de votre commande <strong>'.$total.' '.$_SESSION["devise_".$idsite].'.  T.T.C.</strong></li>
</ul>
<p>- '.$array_paiement['adresse_banque'].'</p>'.$array_paiement['details'].'
<p>Sans oublier de mentionner votre nom &amp; prénom ou raison  sociale, suivi de votre numéro de commande inscrit ci-dessus.</p>
<p>Vous pouvez accéder au suivi de votre commande dans «&nbsp;<strong>Historique des commandes&nbsp;</strong>» de  votre compte.</p>';

 }else if($_SESSION["paiement_".$idsite] == 1){ 
	
    
$text_payement = '<p>Vous avez sélectionné le mode de paiement Comptant à la livraison. </p>

<p>Vous pouvez accéder au suivi de votre commande dans «&nbsp;<strong>Historique des commandes&nbsp;</strong>» de  votre compte.</p>';
    
	}
	
	echo $text_payement;
	?>


<p>Nous vous conseillons d'imprimer cette page afin de conserver les différentes références de votre commande et faciliter le dialogue avec notre Service Client. <a href="#" id="print"><img src="images/print.png" width="22" height="22" align="absmiddle" /></a></p>


<div class=""></div>
 <?php 
$adresse_livraison = "SELECT * FROM adresses_client where id_client='".$_SESSION['id_acces']."' AND type = 'livraison' LIMIT 1";
$req_adresse_livraison = mysql_query($adresse_livraison ,$connect_m);
$row_adresse_livraison = mysql_fetch_assoc($req_adresse_livraison);
$num_adresse_livraison = mysql_num_rows($req_adresse_livraison);
?>
  <ul id="address_delivery" class="addressPanier">
    <li class="address_title">Votre adresse de livraison</li>
    <li class="address_firstname lastname"><?php echo $_SESSION['nom_acces']; ?></li>
    <li class="address_address1"><?php echo $row_adresse_livraison['adresse']; ?></li>
    <li class="address_postcode city"><?php echo $row_adresse_livraison['code_postal']; ?> <?php echo $row_adresse_livraison['ville']; ?></li>
    <li class="address_Country"><?php echo $row_adresse_livraison['pays']; ?></li>
    <li class="address_phone"><?php echo $row_adresse_livraison['tel_portable']; ?></li>
    
  </ul>
  <?php 
$adresse_facturation = "SELECT * FROM adresses_client where id_client='".$_SESSION['id_acces']."' AND type = 'facturation' LIMIT 1";
$req_adresse_facturation = mysql_query($adresse_facturation ,$connect_m);
$row_adresse_facturation = mysql_fetch_assoc($req_adresse_facturation);
$num_adresse_facturation = mysql_num_rows($req_adresse_facturation);
?>
  <ul id="address_invoice" class="addressPanier alternate_item ">
    <li class="address_title">Votre adresse de facturation</li>
    <li class="address_firstname lastname"><?php echo $_SESSION['nom_acces']; ?></li>
    <li class="address_address1"><?php echo $row_adresse_facturation['adresse']; ?></li>
    <li class="address_postcode city"><?php echo $row_adresse_facturation['code_postal']; ?> <?php echo $row_adresse_facturation['ville']; ?></li>
    <li class="address_Country"><?php echo $row_adresse_facturation['pays']; ?></li>
    <li class="address_phone"><?php echo $row_adresse_facturation['tel_portable']; ?></li>
   
  
  </ul>
  
  
<div id="livraisonPanier">La livraison de votre commande expédiée par : <br />
<span><?php echo $array_taxe_transport['transporteur']; ?></span></div>  
<div id="livraisonPanier2">Les courriels de votre suivi de commande seront envoyés à l'adresse email de votre compte client : <br />
<span><?php echo $array_client['email']; ?></span></div> 
<?php	$req_paiement = "SELECT p.*,t.*,p.id AS id_paiement FROM paiement_catalogue p,type_paiement t where p.type = t.id AND p.id_site='".$_GET['idsite']."' AND etat = '1'";
	$paiement  = mysql_query($req_paiement ,$connect);
	
	
	$taxe_transport = "SELECT transporteur,taxe_transport FROM transport_catalogue where id = '".$_SESSION["transport_".$idsite]."' AND etat = '1'";
	$query_taxe_transport  = mysql_query($taxe_transport ,$connect);
	$array_taxe_transport  = mysql_fetch_array($query_taxe_transport);
	  
	
	 ?><table width="100%" border="1" cellpadding="0" cellspacing="0" class="std" id="cart_summary">
  <thead>
    <tr class="header_table">
      <th colspan="2" class="cart_product first_item">ARTICLE(S)</th>
      <th class="cart_ref">Référence</th>
      <th class="cart_unit">Prix unitaire</th>
      <th class="cart_quantity">QUANTITé</th>
      <th class="cart_total">Prix Total</th>
    </tr>
  </thead>
  <tfoot>
   
    <tr class="cart_total_price">
      <td colspan="5" class="total_panier">MONTANT TOTAL :</td>
      <td colspan="1" align="left" class="price" id="total_product"><span><?php echo $total; ?></span> <?php echo $_SESSION["devise_".$idsite]; ?></td>
    </tr>
    <tr class="cart_total_price_last">
      <td colspan="4" class="total_panier_last"><h3>MON SUIVI DE COMMANDE</h3>
        Pour toutes questions concernant votre commande, n'hésitez pas à consulter votre suivi de<br />
      commande en ligne dans votre Espace Client. </td>
      <td colspan="2" align="center" valign="middle" class="total_panier_last">
       <br /> <strong>Total de mes articles : <span><?php echo $_SESSION["total_".$idsite].' '.$_SESSION["devise_".$idsite]; ?></span><br />
        Total des frais de port : <span>
        <?php if($array_taxe_transport['taxe_transport'] > 0){
		  
		  echo $array_taxe_transport['taxe_transport'].' '.$_SESSION["devise_".$idsite];
		  $total = $total + $array_taxe_transport['taxe_transport'];
	  }else{
		  
		  echo 'Gratuit';
		  } ?>
        </span><br />
       <div> MONTANT TTC : <span class="total_ttc"><?php echo $total.'</span> <span>'.$_SESSION["devise_".$idsite]; ?></span></div>
      </strong></td>
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
      <td align="center" class="cart_product"><?php //echo $req_articles; ?>
        <a href="#">
        <?php 
			$catalogue_slider = "SELECT * FROM images_produit where id_produit='".$id_product."' AND couverture = '1' LIMIT 1";
			$req_catalogue_slider = mysql_query($catalogue_slider ,$connect);
			$row_catalogue_slider = mysql_fetch_assoc($req_catalogue_slider);
			$num_catalogue_slider = mysql_num_rows($req_catalogue_slider);
			  
			  
			  if($num_catalogue_slider > 0){ ?>
        <img src="<?php echo SITEPATH."uploads/site_".$_GET['idsite']."/catalogue/min/".end(explode("/", $row_catalogue_slider['image'])); ?>" width="60" />
        <?php }else{ ?>
        <img src="<?php echo SITEPATH; ?>images/no_image.png" width="60" />
        <?php } ?>
        </a></td>
      <td class="cart_description"><p class="s_title_block"><?php echo $productsName[$i]; ?></p></td>
      <td align="center" class="cart_ref"><?php echo $row_articles['ref']; ?></td>
      <td align="center" class="cart_unit"><span id="product_price_<?php echo $i; ?>" class="price"><?php echo $prices[$i]; ?> <?php echo $_SESSION["devise_".$idsite]; ?></span></td>
      <td align="center" class="cart_quantity">
        <input type="hidden" id="quantity_<?php echo $i; ?>_hidden" name="quantity_<?php echo $i; ?>_hidden" value="<?php echo $quantity[$i]; ?>">
        <input type="text" id="quantity_<?php echo $i; ?>" name="quantity_<?php echo $i; ?>" value="<?php echo $quantity[$i]; ?>" class="cart_quantity_input" autocomplete="off" size="2" disabled="disabled"></td>
      <td align="center" class="cart_total"><span id="total_product_price_<?php echo $i; ?>" class="price"> <?php echo $prices[$i]*$quantity[$i]; ?></span> <?php echo $_SESSION["devise_".$idsite]; ?></td>
    </tr>
    <?php      $i++;
                }
            }
            ?>
  </tbody>
</table>
</div>
<br /><br /><br />
<p align="right">Votre commande est bien enregistrée.<br /><br />
<?php
    $id_back = "SELECT id FROM pages WHERE id_site = '".$idsite."' AND defaut = '1'";
	$req_id_back  = mysql_query($id_back ,$connect);
	$row_id_back  = mysql_fetch_assoc($req_id_back);
	$id_id_back = $row_id_back["id"];
	
	?>

<a title="Retour au site" class="next_step" href="<?php echo get_name_page($idsite,$id_id_back); ?>" style="float:right;">Retour au site <img src="images/arrow_next.png" /></a> </p>
<?php 
//envoi facture
$facture_client = "<table width='100%' border='0'>
  <tr>
    <td colspan='4'><h4>Ma confirmation de commande n° ".$facture." </h4>
<p>Bonjour ".$_SESSION['nom_acces']."</p>
<p>Votre commande <strong>n° ".$facture."  du ".date("d/m/Y H:i", strtotime($date))."</strong> a bien été enregistrée sur notre site et nous vous remercions de votre confiance.</p>

".$text_payement."</td>
  </tr>
  <tr>
    <td width='25%' rowspan='2' valign='top'><ul style='margin-right: 8px;padding-bottom: 10px;margin-top:0;border: 1px solid #CCCCCC;   float: left;   height: 144px;   list-style-type: none;   margin-top: 20px !important;    padding: 0;    position: relative;    width: 100% !important;'>
    <li style=' color: #FFFFFF;  font-weight: normal;  padding: 5px 0;margin:0;   text-align: center;  text-transform: uppercase;  width: 100%; background: none repeat scroll 0 0 #D90D0D;'>Votre adresse de livraison</li>
   <li style='margin:0; padding:0'>".$_SESSION['nom_acces']."</li>
    <li style='margin:0; padding:0'>".$row_adresse_livraison['adresse']."</li>
    <li style='margin:0; padding:0'>".$row_adresse_livraison['code_postal']." ".$row_adresse_livraison['ville']."</li>
    <li style='margin:0; padding:0'>".$row_adresse_livraison['pays']."</li>
    <li style='margin:0; padding:0'>".$row_adresse_livraison['tel_portable']."</li>
    
  </ul></td>
    <td width='25%' rowspan='2' valign='top'> <ul style='margin-right: 8px;padding-bottom: 10px;margin-top:0;border: 1px solid #CCCCCC;   float: left;   height: 144px;   list-style-type: none;   margin-top: 20px !important;    padding: 0;    position: relative;    width: 100% !important;'>
    <li style=' color: #FFFFFF;  font-weight: normal;  padding: 5px 0;margin:0;   text-align: center;  text-transform: uppercase;  width: 100%; background: none repeat scroll 0 0 #D90D0D;'>Votre adresse de facturation</li>
   <li style='margin:0; padding:0'>".$_SESSION['nom_acces']."</li>
    <li style='margin:0; padding:0'>".$row_adresse_facturation['adresse']."</li>
    <li style='margin:0; padding:0'>".$row_adresse_facturation['code_postal']." ".$row_adresse_facturation['ville']."</li>
    <li style='margin:0; padding:0'>".$row_adresse_facturation['pays']."</li>
    <li style='margin:0; padding:0'>".$row_adresse_facturation['tel_portable']."</li>
   
  
  </ul></td>
    <td colspan='2' valign='top'><div style='border: 1px solid #CCCCCC;  float: right;   font-weight: bold;    list-style-type: none;  margin-top: 20px;    padding: 20px 3%;    position: relative;    width: 93% !important;'>La livraison de votre commande expédiées par : <br>
<span>".$array_taxe_transport['transporteur']."</span></div> </td>
  </tr>
  <tr>
    <td colspan='2' valign='top'><div style='border: 1px solid #CCCCCC;  float: right;   font-weight: bold;    list-style-type: none;    padding: 20px 3%;    position: relative;    width: 93% !important;'>Les courriels de votre suivi de commande seront envoyés à l'adresse email de votre compte client : <br>
<span>".$array_client['email']."</span></div> </td>
  </tr>
  <tr>
    <td colspan='4'><table width='100%' border='0' cellpadding='0' cellspacing='0' class='std' id='cart_summary'>
  <thead>
    <tr class='header_table'>
      <th colspan='2' class='cart_product first_item'>ARTICLE(S)</th>
      <th class='cart_ref'>Référence</th>
      <th class='cart_unit'>Prix unitaire</th>
      <th class='cart_quantity'>QUANTITé</th>
      <th class='cart_total'>Prix Total</th>
    </tr>
  </thead>
  <tfoot>
   
    <tr class='cart_total_price'>
      <td colspan='5' align='right'>MONTANT TOTAL :</td>
      <td colspan='1' align='left' class='price' id='total_product'><span>".$total."</span>".$_SESSION['devise_'.$idsite]."</td>
    </tr> <tr class='cart_total_price_last'>
      <td colspan='4' class='total_panier_last'><h3>MON SUIVI DE COMMANDE</h3>
        Pour toutes question concernant votre commande, n'hésitez pas à consulter votre suivi de<br />
      commande en ligne dans votre Espace Client. </td>
      <td colspan='2' align='right' class='total_panier_last'>
        <strong>Total de mes articles : <span>".$_SESSION["total_".$idsite]." ".$_SESSION["devise_".$idsite]."</span><br />
        Total des frais de port : <span>"; ?>
	
	
   
        <?php if($array_taxe_transport['taxe_transport'] > 0){
		  
		  $facture_client .= $array_taxe_transport['taxe_transport'].' '.$_SESSION["devise_".$idsite];
		  $total = $total + $array_taxe_transport['taxe_transport'];
	  }else{
		  
		  $facture_client .= 'Gratuit';
		  } 
        $facture_client .= "</span><br />
       <div> MONTANT TTC : <span class='total_ttc'>".$total."</span> <span>".$_SESSION["devise_".$idsite]."</span></div>
      </strong></td>
    </tr>
  </tfoot>
  <tbody>";

            $i = 0;
            if (isset($products)) {
                foreach ($products as $product) {
					
					$id_product = end(explode("_", $products[$i]));
					
			$req_articles = "SELECT * FROM produit where id='".$id_product."'";
			$articles  = mysql_query($req_articles ,$connect);
			$row_articles  = mysql_fetch_assoc($articles);
					
					
					 
   $facture_client .=  "<tr>
      <td align='center'>";
 
			$catalogue_slider = "SELECT * FROM images_produit where id_produit='".$id_product."' AND couverture = '1' LIMIT 1";
			$req_catalogue_slider = mysql_query($catalogue_slider ,$connect);
			$row_catalogue_slider = mysql_fetch_assoc($req_catalogue_slider);
			$num_catalogue_slider = mysql_num_rows($req_catalogue_slider);
			  
			  
			  if($num_catalogue_slider > 0){ 
       $facture_client .=  " <img src='".SITEPATH."uploads/site_".$_GET['idsite']."/catalogue/min/".end(explode("/", $row_catalogue_slider['image']))."' width='60' />";
       }else{ 
         $facture_client .=  "<img src='".SITEPATH."images/no_image.png' width='60' />";
        } 
        $facture_client .=  "</td>
      <td><p >".$productsName[$i]."</p></td>
      <td align='center'>".$row_articles['ref']."</td>
      <td align='center'><span>".$prices[$i]." ".$_SESSION["devise_".$idsite]."</span></td>
      <td align='center'>".$quantity[$i]."</td>
      <td align='center'><span> ".$prices[$i]*$quantity[$i]."</span> ".$_SESSION["devise_".$idsite]."</td>
    </tr>";     
	$i++;
                }
            }
 $facture_client .=   "</tbody></table>";
	
	
	
	
	
	$facture_client .= "</td>
  </tr>
  <tr>
    <td colspan='4'>&nbsp;</td>
  </tr>
</table>
";


			$to = $array_client['email'];
			$subject = "Votre facture";


		
			$mailer = new Mailer();
			$mailer->set_priority('Highest');
			$mailer->set_from('info@marketstudies.ma');
			$mailer->set_address($to);
			$mailer->set_format('html');
			$mailer->set_subject($subject);
			$mailer->set_message(utf8_decode($facture_client), array('TAG1' => ''));
			$mailer->send();



$_SESSION["quantity_".$idsite] = '';
$_SESSION["products_".$idsite] = '';
$_SESSION["prices_".$idsite] = '';
$_SESSION["productsName_".$idsite] = '';
$_SESSION["total_".$idsite] = 0;
$_SESSION["transport_".$idsite]  = '';
$_SESSION["paiement_".$idsite]  = '';

} ?>
