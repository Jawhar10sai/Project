<?php
session_start();
$etap = '';
include("config/connect.php"); 
include("config/connect_m.php"); 
 
include("functions/reglages.php"); 
include("functions/function.php"); 
include("wmailer/class.mailer.php");

$idsite = $_GET['idsite'];
	
$param_page = "SELECT * FROM parametres_page where id_site = '".$idsite."'";
$req_param_page  = mysql_query($param_page ,$connect);
$row_param_page = mysql_fetch_assoc($req_param_page);
	
$param_lien = "SELECT * FROM parametres_liens where id_site = '".$idsite."'";
$req_param_lien  = mysql_query($param_lien ,$connect);
$row_param_lien = mysql_fetch_assoc($req_param_lien);


if(isset($_SESSION['nom_acces']) && $_SESSION['nom_acces'] != ''){
	

if(isset($_GET['id_client']) && $_GET['id_client'] != '' && isset($_GET['id_adresse']) && $_GET['id_adresse'] != '0'){

$adresse = "SELECT * FROM adresses_client where id_client='".$_GET['id_client']."' AND id = '".$_GET['id_adresse']."' LIMIT 1";
$req_adresse = mysql_query($adresse ,$connect_m);
$row_adresse = mysql_fetch_assoc($req_adresse);
$num_adresse = mysql_num_rows($req_adresse);	
		
}


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
<script language="javascript">document.location.href='detail_panier.php?step=1&idsite=<?php echo $_GET['idsite']; ?>';</script>	
<?php
}

if(isset($_POST['action']) && $_POST['action'] == 'edit'){
	
$query_update = "UPDATE adresses_client SET adresse = '".$_POST['adresse']."',adresse = '".$_POST['adresse2']."',code_postal = '".$_POST['code_postal']."',ville = '".$_POST['ville']."',pays = '".$_POST['pays']."',infos_sup = '".$_POST['other']."',tel_domicile = '".$_POST['tel_domicile']."',tel_portable = '".$_POST['phone_mobile']."',alias = '".$_POST['alias']."' WHERE id = '".$_POST['id_address']."'";
mysql_query($query_update,$connect_m) or die('Error, insert query failed');



?>
<script language="javascript">document.location.href='detail_panier.php?step=1&idsite=<?php echo $_GET['idsite']; ?>';</script>	
<?php
}
?>
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery-1.7.2.js"></script>
<link rel="Stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/styles.css"/>
<link rel="Stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/tables.css"/>
<script language="javascript">
$(document).ready(function() {
$('#submitAddress').click(function(){
if($('#confirm_phone_mobile').val() != $('#phone_mobile').val()){
alert('Veuillez vérifiez votre téléphone portable et sa confirmation.');
return false;
}else{
return true;
}
});
$('textarea#other').each(function() {
$(this).data('default', this.value);
}).focusin(function() {
if ( this.value == $(this).data('default') ) {
this.value = '';
}
}).focusout(function() {
if ( this.value == '' ) {
this.value = $(this).data('default');
}
});
}); 
</script>
<style type="text/css">
body, table, th, td {
 font-family: <?php $police = "SELECT texte FROM police WHERE id = '".$row_param_page["police"]."'";
 $req_police = mysql_query($police, $connect);
 $row_police = mysql_fetch_assoc($req_police);
 echo $row_police["texte"];
?>;
 font-size:<?php echo $row_param_page["taille"];
?>px;
 color:<?php echo $row_param_page["couleur"];
?>;
}
h3 {
 color: <?php echo $row_param_lien['couleur_lien'];
?>;
	margin-bottom:10px;
	margin-top:0;
	text-transform:uppercase;
}
fieldset{border:none;}
label{ width:100%; float:left;}
label sup{ color:red;}
input,textarea{ color:#808080;}
#open_panier {
    background:url("images/bg_commande.png") no-repeat scroll 8% center   <?php echo $row_param_lien["couleur_lien"]; ?> !important ;
	padding-left:30px;
	border:0;
	color:#FFF;
	padding:5px 10px 5px 30px;
}
</style>
<form id="add_adress" class="std" method="post" action="">
  <fieldset>
    <h3>Votre adresse</h3>
   
    <p class="required text">
      <label for="firstname">Nom <sup>*</sup></label>
      <input type="text" value="<?php echo $_SESSION['nom_acces']; ?>" id="nom" name="nom">
    </p>
    <p class="required text">
      <label for="address1">Adresse <sup>*</sup></label>
      <input type="text" value="<?php echo $row_adresse['adresse']; ?>" name="adresse" id="adresse">
    </p>
    <p class="required text">
      <label for="address1">Adresse 2<sup>*</sup></label>
      <input type="text" value="<?php echo $row_adresse['adresse2']; ?>" name="adresse2" id="adresse2">
    </p>
    <p class="required postcode text">
      <label for="postcode">Code postal <sup>*</sup></label>
      <input type="text" onkeyup="$('#postcode').val($('#postcode').val().toUpperCase());" value="<?php echo $row_adresse['code_postal']; ?>" name="code_postal" id="code_postal">
    </p>
    <p class="required id_state text">
      <label for="id_state">Ville <sup>*</sup></label>
      
      <input type="text" value="<?php echo $row_adresse['ville']; ?>" name="ville" id="ville">
    </p>
    <p class="required id_state text">
      <label for="id_state">Pays <sup>*</sup></label>
      
      <input type="text" value="<?php echo $row_adresse['pays']; ?>" name="pays" id="pays">
    </p>
    <p class="textarea">
      <label for="other">Informations supplémentaires</label>
      <textarea rows="3" cols="26" name="other" id="other"><?php if($row_adresse['infos_sup'] != ''){ echo $row_adresse['infos_sup']; }else{ ?>Inscrire ici par exemple un complément d'information sur l'adresse qui faciliterai la livraison (à coté d'un endroit connu).<?php } ?></textarea>
    </p>
    <p class="text">
      <label for="phone">Téléphone domicile</label>
      <input type="text" value="<?php echo $row_adresse['tel_domicile']; ?>" name="tel_domicile" id="tel_domicile">
    </p>
    <p class="required text">
      <label for="phone_mobile">Téléphone portable <sup>*</sup></label>
      <input type="text" value="<?php echo $row_adresse['tel_portable']; ?>" name="phone_mobile" id="phone_mobile">
    </p>
    <p class="required text">
      <label for="phone_mobile">Confirmer votre numéro de téléphone portable <sup>*</sup></label>
      <input type="text" value="<?php echo $row_adresse['tel_portable']; ?>" name="confirm_phone_mobile" id="confirm_phone_mobile">
    </p>
    <p id="adress_alias" class="required text">
      <label for="alias">Donnez un titre à cette adresse pour la retrouver plus facilement <sup>*</sup></label>
      <input type="text" value="<?php if($row_adresse['alias'] != ''){ echo $row_adresse['alias']; }else{ ?>Mon adresse<?php } ?>" name="alias" id="alias">
    </p>
    <p class="inline-infos required">Attention il est important d'inscrire un numéro de téléphone valide ou nous pouvons vous joindre, cela nous permettra de vous tenir informé sur votre livraison. </p>
    <div class="required_submit2">
      <p class="required"><sup>*</sup> Champ requis</p>
      <p class="submit2">
        <input type="hidden" value="<?php echo $_GET['id_adresse']; ?>" name="id_address">
        <input type="hidden" value="<?php echo $_GET['id_client']; ?>" name="id_client">
        <input type="hidden" value="<?php echo $_GET['type']; ?>" name="type">
        <input type="submit" class="button" value="Valider" id="open_panier" name="submitAddress">
        <?php if(isset($_GET['id_adresse']) && $_GET['id_adresse'] != '0'){ ?>
        <input type="hidden" value="edit" name="action">
        <?php }else{ ?>
        <input type="hidden" value="add" name="action">
        <?php } ?>
      </p>
    </div>
  </fieldset>
</form>
<?php }else{ ?>
<script language="javascript">
history.back();
</script>
<?php } ?>
