<?php





if(isset($_GET['lang']) && $_GET['lang'] != ''){



	$lang = $_GET['lang'];

	$_SESSION['lang'] = $lang;



}else if(isset($_SESSION['lang']) && $_SESSION['lang'] != ''){



	$lang = $_SESSION['lang'];



}else{



	$lang = 'fr';

	$_SESSION['lang'] = $lang;



}

if($_SESSION['lang'] == 'fr'){

	$lang_table = '';

	}else{

	$lang_table = '_'.$lang;

}



include("functions/lang/".$lang.".php");







if(isset($_GET["id_page"])){

	$idpage = "SELECT id,corp FROM pages WHERE id_site = '".$idsite."' AND titre = '".str_replace("_", " ",$_GET["id_page"])."'";

	$req_idpage  = mysql_query($idpage ,$connect);

	$row_idpage  = mysql_fetch_assoc($req_idpage);

	$id_page = $row_idpage["id"];

	$show_corp = $row_idpage["corp"];

}else{

	$idpage = "SELECT id,corp FROM pages WHERE id_site = '".$idsite."' AND defaut = '1'";

	$req_idpage  = mysql_query($idpage ,$connect);

	$row_idpage  = mysql_fetch_assoc($req_idpage);

	$id_page = $row_idpage["id"];

	$show_corp = $row_idpage["corp"];

}







	$parametres_langue = "SELECT * FROM langue where id_site = '".$idsite."'";

	$req_parametres_langue  = mysql_query($parametres_langue ,$connect);

	$row_parametres_langue  = mysql_fetch_array($req_parametres_langue);





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php if($_SESSION['lang']== 'ar'){ ?>

<html dir="rtl" lang="ar"  xml:lang="ar">

<?php }else{ ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php } ?>

<head>

<?php include("modules/head/head.php"); ?>

</head><body>
 <?php if($row_parametres_langue['show_lang'] == '1'){ ?>
<div id="lang">

  <?php if($row_parametres_langue['fr'] == '1'){ ?>

  <a href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."&lang=fr"; ?>"><img class="lang <?php if($lang == 'fr'){echo 'current';} ?>" src="<?php echo SITEPATH; ?>images/lang/fr.jpg" width="16" height="11" title="fr" /></a>

  <?php } ?>

  <?php if($row_parametres_langue['en'] == '1'){ ?>

  <a href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."&lang=en"; ?>"><img class="lang <?php if($lang == 'en'){echo 'current';} ?>" src="<?php echo SITEPATH; ?>images/lang/en.jpg" width="16" height="11" title="en" /></a>

  <?php } ?>

  <?php if($row_parametres_langue['es'] == '1'){ ?>

  <a href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."&lang=es"; ?>"><img class="lang <?php if($lang == 'es'){echo 'current';} ?>" src="<?php echo SITEPATH; ?>images/lang/es.jpg" width="16" height="11" title="es" /></a>

  <?php } ?>

  <?php if($row_parametres_langue['it'] == '1'){ ?>

  <a href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."&lang=it"; ?>"><img class="lang <?php if($lang == 'it'){echo 'current';} ?>" src="<?php echo SITEPATH; ?>images/lang/it.jpg" width="16" height="11" title="it" /></a>

  <?php } ?>

  <?php if($row_parametres_langue['de'] == '1'){ ?>

  <a href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."&lang=de"; ?>"><img class="lang <?php if($lang == 'de'){echo 'current';} ?>" src="<?php echo SITEPATH; ?>images/lang/de.jpg" width="16" height="11" title="de" /></a>

  <?php } ?>

  <?php if($row_parametres_langue['ar'] == '1'){ ?>

  <a href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."&lang=ar"; ?>"><img class="lang <?php if($lang == 'ar'){echo 'current';} ?>" src="<?php echo SITEPATH; ?>images/lang/ar.jpg" width="16" height="11" title="ar" /></a>

  <?php } ?>

</div>

  <?php } ?>
<div id="bg1"></div>

<div id="contenu">

<?php

$commandes = "SELECT c.id_page FROM pages p,contenu c where p.id_site = '".$idsite."' AND c.id_page = p.id AND c.type = 'Catalogue' LIMIT 1";

	$req_commandes  = mysql_query($commandes ,$connect);

	$num_commandes = mysql_num_rows($req_commandes);



if($num_commandes > 0 && $is_catalogue == 1){echo '<div id="globalPanier">';include 'panier.php'; echo '</div>';} ?>

  <div id="s_contenu">

    <?php

  	$espace_securise = "SELECT etat_secure FROM pages WHERE id_site = '".$idsite."' AND (etat_secure = '2' OR etat_secure = '3')";

 	$req_espace_securise = mysql_query($espace_securise, $connect);

  	$exist_espace_securise = mysql_num_rows($req_espace_securise);

  if($exist_espace_securise > 0 && $idsite != 69 ){

   ?>

    <div class="fixed_container">

      <script language="javascript">

	$(document).ready(function(){

	$("#login").dialog({

		autoOpen: false,

		height: 200,

		width: 300,

		modal: true,

		draggable:true,

        resizable: false,

		buttons: {

			Annuler: function() {

				$(this).dialog('close');

			},"<?php echo IDENTIF; ?>"	: function() {

				$("#form_membre2 label.error").remove();

				$("#form_membre2").submit();

			}

		},

		open: function(event, ui){},

		close: function() {

				$("#form_membre2 label.error").remove();

		}

	});



	$("#signup").dialog({

		autoOpen: false,

		height: 350,

		width: 300,

		modal: true,

		draggable:true,

        resizable: false,

		buttons: {

			Annuler: function() {

				$(this).dialog('close');

			},"<?php echo INSCRI_NEWSLETTER; ?>"	: function() {

				$("#form_membre_signup label.error").remove();

				$("#form_membre_signup").submit();

			}

		},

		open: function(event, ui){},

		close: function() {

				$("#form_membre_signup label.error").remove();

		}

	});



	$('#login_membre').click(function(){

		$("#login").dialog('open');

	});



	$('#singup_membre').click(function(){

		$("#signup").dialog('open');

	});







$.validator.addMethod("email", function(value, element)

{

return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);

}, "Please enter a valid email address.");







// Validate signup form

$("#form_membre2").validate({

id:"#form_membre2",

id_bloc:"#login",

url_site:"<?php echo SITEPATH; ?>",

rules: {

email: "required email",



},

});

// Validate signup form

$("#form_membre_signup").validate({

id:"#form_membre_signup",

id_bloc:"#signup",

rules: {

email: "required email",



},

});



$("#Informations").dialog({

		autoOpen: false,

		height: 400,

		width: 300,

		modal: true,

		draggable:false,

        resizable: false,

		buttons: {

			Annuler: function() {

				$(this).dialog('close');

			$('#Informations').html('');

			},"Mettre à jours"	: function() {

				$nom_prenom = $("#Informations #nom_prenom").val();

				$email = $("#Informations #email").val();

				$tel = $("#Informations #tel").val();

				$date_naissance = $("#Informations #date_naissance").val();



				$password = $("#Informations #password").val();

				$password2 = $("#Informations #password2").val();

				$id_client = $("#Informations #id_client").val();



				if($password != $password2){

					alert('Les mots de passes ne sont pas identiques');

					}else{



			var order = 'action=edit_client&id_client='+$id_client+'&nom_prenom='+$nom_prenom+'&email='+$email+'&tel='+$tel+'&date_naissance='+$date_naissance+'&password='+$password;



			$.post("<?php echo SITEPATH; ?>infos_perso.php", order, function(theResponse){

				});







						}



			}

		},

		open: function(event, ui){





			},

		close: function() {

			$('#Informations').html('');

		}

	});



	$('a.info_client').click(function(){

		var order = 'id_client='+$(this).attr('data-id');

			$.post("<?php echo SITEPATH; ?>infos_perso.php", order, function(theResponse){



			$('#Informations').html(theResponse);

		$("#Informations").dialog('open');

			});





		});



$("#Adresses").dialog({

		autoOpen: false,

		height: 270,

		width: 600,

		modal: true,

		draggable:false,

        resizable: false,

		buttons: {

			Annuler: function() {

				$(this).dialog('close');

			},"Mettre à jours"	: function() {

				//$("#form_membre_signup").submit();

			}

		},

		open: function(event, ui){},

		close: function() {

		}

	});



	$('a.adresse_client').click(function(){



		var order = 'id_client='+$(this).attr('data-id');

			$.post("<?php echo SITEPATH; ?>adresses_perso.php", order, function(theResponse){



			$('#Adresses').html(theResponse);

		$("#Adresses").dialog('open');

			});

		});





$("#Commandes").dialog({

		autoOpen: false,

		height: 350,

		width: 600,

		modal: true,

		draggable:false,

        resizable: false,

		buttons: {

			Annuler: function() {

				$(this).dialog('close');

			},"Mettre à jours"	: function() {

				//$("#form_membre_signup").submit();

			}

		},

		open: function(event, ui){},

		close: function() {

		}

	});



	$('a.historique_client').click(function(){





		var order = 'id_client='+$(this).attr('data-id');

			$.post("<?php echo SITEPATH; ?>commandes_client.php", order, function(theResponse){



			$('#Commandes').html(theResponse);

		$("#Commandes").dialog('open');

			});

		});

});

</script>



      <div class="menuGauche">

        <?php if(isset($_SESSION['nom_acces']) && $_SESSION['nom_acces'] != ''){ ?>

       Bonjour <strong><?php echo $_SESSION['nom_acces']; ?></strong>

        <div id="account_client">

          <ul class="myaccount_lnk_list">

            <li><a title="Informations" href="javascript:void(0)" data-id="<?php echo $_SESSION['id_acces']; ?>" class="info_client">Mes informations personnels</a></li>

            <li><a title="Adresses" href="javascript:void(0)" data-id="<?php echo $_SESSION['id_acces']; ?>" class="adresse_client"> Mes adresses</a></li>

            <li><a title="Commandes" href="javascript:void(0)" data-id="<?php echo $_SESSION['id_acces']; ?>" class="historique_client"> Historique et détails de mes commandes</a></li>

            <li><a title="<?php echo LOGOUT; ?> " href="<?php echo SITEPATH; ?>logout_acces.php"><?php echo LOGOUT; ?> </a></li>

          </ul>

        </div>

        <div id="Informations" class="info_client Espace_Securise" title="Mes informations personnels" style="display:none;"></div>

        <div id="Adresses" class="adresse_client Espace_Securise" title="Mes adresses" style="display:none;"></div>

        <div id="Commandes" class="historique_client Espace_Securise" title="Historique et détails de mes commandes" style="display:none;">Historique et détails de mes commandes</div>





        <?php }else{ ?>

        Veuillez vous <a href="javascript:void(0)" id="login_membre">connecter</a> ou vous <a href="javascript:void(0)" id="singup_membre">inscrire</a>



         <div id="signup" class="Espace_Securise" title="<?php echo INSCRI_NEWSLETTER; ?>" style="display:none;">

        <form method="post" action="" id="form_membre_signup">

          <label><?php echo NAME_PRENAME; ?>*</label>

          <input type="text" name="nom_prenom" class="input required" id="nom_prenom" tabindex="1" />

          <label><?php echo EMAIL; ?>*</label>

          <input type="text" name="email"  class="input required email" id="email" tabindex="2"/>

          <label><?php echo PASSWORD; ?>* </label>

          <input type="password" name="password" class="input required" id="password" tabindex="3"/>

          <label><?php echo TEL; ?>*</label>

          <input type="text" name="tel" class="input required number" id="tel"  tabindex="4"/>

          <label><?php echo DATE_NAISSANCE; ?>*</label>

          <input type="text" name="date_naissance" class="input required date" id="date_naissance"  tabindex="5"/>

          <div id="msg_error"></div>

          <input type="hidden" name="option_acces" id="option_acces" value="signup" />

          <input type="hidden" name="id_site" id="id_site" value="<?php echo $idsite; ?>" />

        </form>

      </div>

      <div id="login" class="Espace_Securise" title="<?php echo IDENTIF; ?>" style="display:none;">

        <form method="post" action="" id="form_membre2">

          <label><?php echo EMAIL; ?></label>

          <input type="text" name="email"  class="input required email" id="email" tabindex="1"/>

          <label><?php echo PASSWORD; ?> </label>

          <input type="password" name="password" class="input required" id="password" tabindex="2"/>

          <div id="msg_error"></div>

          <input type="hidden" name="option_acces" id="option_acces" value="login" />

          <input type="hidden" name="id_site" id="id_site" value="<?php echo $idsite; ?>" />

        </form>

      </div>







        <?php } ?>

      </div>

    </div>

    <?php } ?>

    <?php if($show_corp == 1){ ?>

    <div id="tout">

      <?php include("modules/parametres/parametres_block.php"); ?>

       <?php if($idsite == 50 && $id_page != 351){ ?>

       <script language="javascript">

	 $(document).ready(function () {


function timeout_trigger() {
  if($("#tout").height() > $(window).height()){

	   $("#background_megamall").height($("#tout").height()-233);

	  }else{

  $("#background_megamall").height($(window).height()-233);

		  }
clearTimeout(timeout);
console.log($("#tout").height());
}

timeout = setTimeout('timeout_trigger()', 5000);
timeout_trigger();


});

$(window).resize(function() {



	if($("#tout").height() > $(window).height()){

	   $("#background_megamall").height($("#tout").height()-233);

	  }else{

  $("#background_megamall").height($(window).height()-233);

		  }


});

</script>

      <div id="background_megamall">



      </div>

      <?php } ?>

      <?php

    $param = "SELECT parametre FROM  pages  WHERE id_site = '".$idsite."' AND id = '".$id_page."'";

	$req_param  = mysql_query($param ,$connect);

	$row_param = mysql_fetch_assoc($req_param);

	$param = $row_param["parametre"];

	$teste = explode("_", $param);



foreach($teste as $variable_au_pif => $valeur)

{

	$teste2 = explode("=", $valeur);





	echo '<div class="column column2" id="'.$teste2[0].'">';



	$teste3 = explode(",", $teste2[1]);

	foreach($teste3 as $variable_au_pif2 => $valeur2)

	{



	$id_parent = '';



	$donnees = "SELECT * FROM contenu WHERE id_page = '".$id_page."' AND id_block = '".$valeur2."'";

	$req_donnees  = mysql_query($donnees ,$connect);

	$row_donnees = mysql_fetch_assoc($req_donnees);



	$titre_final = $row_donnees['titre'];





	if($row_donnees['type'] == "Contenu"){



	$donnees = "SELECT * FROM contenu WHERE id = '".str_replace("Contenu_#","",$row_donnees['contenu'])."'";

	$req_donnees  = mysql_query($donnees ,$connect);

	$row_donnees = mysql_fetch_assoc($req_donnees);



	$id_parent = $row_donnees['id_block'];

	$id_page_parent = $row_donnees['id_page'];



	$block_r = "SELECT * FROM reglages_block WHERE id_reglages = '".$row_donnees['id_reglages']."'";

	$req_block_r  = mysql_query($block_r ,$connect);

	$row_block_r  = mysql_fetch_assoc($req_block_r);

	$num_block_r  = mysql_num_rows($req_block_r);





	if($num_block_r > 0){



	$id_reglage = $row_donnees['id_reglages'];

	?>

      <style type="text/css">



	#tout div.column div.dragbox_<?php echo $row_block_r["id_reglages"]; ?> div.dragbox-content

           {

		float : left;

			  <?php if($row_block_r['largeur'] != "0" && $row_block_r["unite_l"] == "px"){ ?>

			  width:<?php echo ($row_block_r["largeur"]-($row_block_r["padding_left"]+$row_block_r["padding_right"])).$row_block_r["unite_l"]; ?>;<?php }else if($row_block_r['largeur'] != "0" && $row_block_r["unite_l"] != "px") {?>

			  width:<?php echo $row_block_r["largeur"].$row_block_r["unite_l"]; ?>;

			  <?php } ?>



			  <?php if($row_block_r['hauteur'] != "0" && $row_block_r["unite_h"] == "px"){ ?>

			  height:<?php echo ($row_block_r["hauteur"]-($row_block_r["padding_top"]+$row_block_r["padding_bottom"])).$row_block_r["unite_h"]; ?>;

			  <?php }else if($row_block_r['hauteur'] != "0" && $row_block_r["unite_h"] != "px") {?>

			  height:<?php echo $row_block_r["hauteur"].$row_block_r["unite_h"]; ?>;

			  <?php } ?>



			 <?php if($row_block_r['marge_top'] != 0){ ?>   margin-top:<?php echo $row_block_r["marge_top"]; ?>px;<?php } ?>

			  <?php if($row_block_r['marge_bottom'] != 0){ ?>  margin-bottom:<?php echo $row_block_r["marge_bottom"]; ?>px;<?php } ?>

			  <?php if($row_block_r['marge_left'] != 0){ ?>  margin-left:<?php echo $row_block_r["marge_left"]; ?>px;<?php }else{ ?>margin-left:auto;

float : none;

<?php }?>

			  <?php if($row_block_r['marge_right'] != 0){ ?>  margin-right:<?php echo $row_block_r["marge_right"]; ?>px;<?php }else{ ?>margin-right:auto;

float : none;

<?php }?>



				<?php if($row_block_r['padding_top'] != 0){ ?>   padding-top:<?php echo $row_block_r["padding_top"]; ?>px;<?php } ?>

			  <?php if($row_block_r['padding_bottom'] != 0){ ?>  padding-bottom:<?php echo $row_block_r["padding_bottom"]; ?>px;<?php } ?>

			  <?php if($row_block_r['padding_left'] != 0){ ?>  padding-left:<?php echo $row_block_r["padding_left"]; ?>px;<?php }?>

			  <?php if($row_block_r['padding_right'] != 0){ ?>  padding-right:<?php echo $row_block_r["padding_right"]; ?>px;<?php }?>





			  border-radius: <?php echo $row_block_r["arrondi1"]; ?>px <?php echo $row_block_r["arrondi2"]; ?>px <?php echo $row_block_r["arrondi3"]; ?>px <?php echo $row_block_r["arrondi4"]; ?>px ;





			  <?php if($row_block_r['bordure'] != 0){ ?>  border:<?php echo $row_block_r["bordure"].'px '.$row_block_r["format_bordure"].' '.$row_block_r["couleur_b"]; ?>;<?php } ?>

			   <?php if($row_block_r["param"] == 1) { ?>

				background:<?php echo $row_block_r["couleur"]; ?>;

 <?php }else if($row_block_r["param"] == 2) {

 $keywords3 = preg_split("/[\s,]+/", $row_block_r["degrade"]);?>

background-image: -webkit-linear-<?php echo $row_block_r["degrade"];?>;

background-image:    -moz-linear-<?php echo $row_block_r["degrade"];?>;

background-image:     -ms-linear-<?php echo $row_block_r["degrade"];?>;

background-image:      -o-linear-<?php echo $row_block_r["degrade"];?>;

background-image:         linear-<?php echo $row_block_r["degrade"];?>;



filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=<?php echo $keywords3[2]; ?>,endColorstr=<?php echo $keywords23[4]; ?>);

zoom: 1;

 <?php }else if($row_block_r["param"] == 3) { ?>

 <?php if($row_block_r["repeat_x"] == 0 && $row_block_r["repeat_y"] == 0){ ?>

 background:url(<?php echo $row_block_r['image']; ?>) no-repeat scroll left top transparent;

 <?php }else if($row_block_r["repeat_x"] == 1 && $row_block_r["repeat_y"] == 0){ ?>

 background:url(<?php echo $row_block_r['image']; ?>) repeat-x scroll left top transparent;

 <?php }else if($row_block_r["repeat_x"] == 0 && $row_block_r["repeat_y"] == 1){ ?>

 background:url(<?php echo $row_block_r['image']; ?>) repeat-y scroll left top transparent;

 <?php }else{ ?>

 background:url(<?php echo $row_block_r['image']; ?>) repeat scroll left top transparent;

 <?php } ?>



 <?php }else if($row_block_r["param"] == 4) { ?>

 				background:Transparent;

 <?php } ?>

 <?php if($row_block_r['ombre'] == 1){ ?>

    -webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;

    -moz-box-shadow: 0px 1px 5px 0px #4a4a4a;

    box-shadow: 0px 1px 5px 0px #4a4a4a;



<?php } ?>

opacity:<?php echo $row_block_r["opacite"]/10; ?>;

color:<?php echo $row_block_r["couleur_texte"]; ?> !important;



		   }

		#tout div.column div.dragbox_<?php echo $row_block_r["id_reglages"]; ?> div.dragbox-content div,#tout div.column div.dragbox_<?php echo $row_block_r["id_reglages"]; ?> div.dragbox-content div embed

           {

		/*float : left;*/

			  <?php if($row_block_r['largeur'] != "0" && $row_block_r["unite_l"] == "px"){ ?>

			  width:<?php echo ($row_block_r["largeur"]-($row_block_r["padding_left"]+$row_block_r["padding_right"])).$row_block_r["unite_l"]; ?>;<?php }else if($row_block_r['largeur'] != "0" && $row_block_r["unite_l"] != "px") {?>

			  width:<?php echo $row_block_r["largeur"].$row_block_r["unite_l"]; ?>;

			  <?php } ?>



			  <?php if($row_block_r['hauteur'] != "0" && $row_block_r["unite_h"] == "px"){ ?>

			  height:<?php echo ($row_block_r["hauteur"]-($row_block_r["padding_top"]+$row_block_r["padding_bottom"])).$row_block_r["unite_h"]; ?>;

			  <?php }else if($row_block_r['hauteur'] != "0" && $row_block_r["unite_h"] != "px") {?>

			  height:<?php echo $row_block_r["hauteur"].$row_block_r["unite_h"]; ?>;

			  <?php } ?>

		   }











    </style>

      <?php

	}



	}



	$type = $row_donnees['type'];







	if($type == 'Menu'){

	$contenu_menu =  '';

	$num_menu =  1;

	$bloc_menu = "SELECT t.*,m.* FROM type_menu t,menu m where t.id_type  = '".str_replace("Menu_#","",$row_donnees['contenu'])."' AND t.id_type = m.id_type AND m.s_menu = '0' GROUP BY m.id ORDER BY m.disposition ASC";

	$req_menu  = mysql_query($bloc_menu ,$connect);

	$row_menu  = mysql_fetch_assoc($req_menu);

	$num_bloc_menu  = mysql_num_rows($req_menu);





	$param_bloc_menu = "SELECT * FROM parametres_menu_bloc where id_type  = '".str_replace("Menu_#","",$row_donnees['contenu'])."'";

	$req_param_bloc_menu  = mysql_query($param_bloc_menu ,$connect);

	$row_param_bloc_menu  = mysql_fetch_assoc($req_param_bloc_menu);

	$num_param_bloc_menu  = mysql_num_rows($req_param_bloc_menu);



	$style_bloc_menu = "SELECT * FROM style_menu_bloc where id_type  = '".str_replace("Menu_#","",$row_donnees['contenu'])."'";

	$req_style_bloc_menu  = mysql_query($style_bloc_menu ,$connect);

	$row_style_bloc_menu  = mysql_fetch_assoc($req_style_bloc_menu);

	$num_style_bloc_menu  = mysql_num_rows($req_style_bloc_menu);













	if(isset($_GET["mode"]) && $_GET["mode"] == "show"){

	$lien_plus = '&mode=show';

	}else{

	$lien_plus = '';

	}





				 ?>

      <?php


	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content '.$type.'">';?>

      <?php include ('modules/style_menu/menu0/index.php'); ?>

      <?php

			echo '</div>

		</div>';



}else if($type == 'Galerie'){



	$galerie_1 = "SELECT g.*,p.* FROM galerie g,photo p where g.id = '".str_replace("Galerie_#","",$row_donnees['contenu'])."' AND g.id = p.galerie ORDER BY p.Ordre";

	$req_galerie_1  = mysql_query($galerie_1 ,$connect);

	$row_galerie_1  = mysql_fetch_array($req_galerie_1);



	if($row_galerie_1['type'] == 3){

	$galerie = "SELECT g.*,p.* FROM galerie g,photo p where g.id = '".str_replace("Galerie_#","",$row_donnees['contenu'])."' AND g.id = p.galerie AND p.Couverture != '1' ORDER BY p.Ordre";

	}else{

	$galerie = "SELECT g.*,p.* FROM galerie g,photo p where g.id = '".str_replace("Galerie_#","",$row_donnees['contenu'])."' AND g.id = p.galerie ORDER BY p.Ordre";

	}

	$req_galerie  = mysql_query($galerie ,$connect);

	$req_galerie2  = mysql_query($galerie ,$connect);

	$row_galerie  = mysql_fetch_array($req_galerie);

	$row_galerie2  = mysql_fetch_array($req_galerie2);

	$num_galerie  = mysql_num_rows($req_galerie);





	if($row_galerie['Largeur'] > 0){



	$nbr_colom = (100-(2*$row_galerie['Largeur']))/$row_galerie['Largeur'];

	}else{

		$nbr_colom = 1;

		}

		?>

      <script language="javascript">

	$(document).ready(function(){

	$('#gallery_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?>').css({'margin' : '0', 'padding' : '0', 'width' : '100%', 'float' : 'left'});





	$('#gallery_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?> .simplePagerNav').css({'height' : '0', 'width' : '100%', 'float' : 'left'});





	$('#gallery_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?> .simplePagerNav li').css('width','auto');



	$('#gallery_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?> .simplePagerNav li.currentPage').css('font-weight','bold');





	$('#gallery_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?> ul').css({'list-style' : 'none', 'padding' : '0', 'margin' : '0'});

	<?php if($row_galerie['slice_c'] != 1 || $row_galerie['type'] != 2){ ?>

	$('#gallery_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?> ul li').css({'float' : 'left', 'width' : '<?php echo $nbr_colom; ?>%', 'display' : 'inline', 'marginLeft' : '7px', 'marginRight' : '7px'});

	<?php } ?>

	$('#gallery_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?> ul img').css({<?php if($row_galerie['slice_c'] != 1){ ?>'width' : '100%',<?php } ?> 'height' : 'auto', 'border' : '1px solid #FFF'});



	$('#gallery_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?> ul a').hover(function(){

		$(this).find('img').css('border','1px solid #999');

		},function(){

		$(this).find('img').css('border','1px solid #FFF');

		})



	});

	</script>

      <?php if($row_galerie['type'] == 2){ ?>

      <script type="text/javascript">

   $(document).ready(function() {



	   <?php if($row_galerie['action_click'] == 1){ ?>

        $('#gallery_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?> a').lightBox();

 <?php } ?>



	$("ul.pagination_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?>").quickPagination({pagerLocation:"bottom",pageSize:"<?php echo ($row_galerie['Largeur']*$row_galerie['Hauteur']); ?>"});







});

</script>

      <?php }else if($row_galerie['type'] == 1){ ?>

      <script language="javascript">

$(document).ready(function(){

$('.jcarousel-skin-tango .jcarousel-item').css({'width':'<?php echo $row_galerie['Largeur']; ?>px'} );

});

</script>

      <?php if($row_galerie['action_click'] == 1){ ?>

      <script type="text/javascript">

   $(document).ready(function() {

        $('#gallery_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?> a').lightBox();

 	});

</script>

      <?php } ?>

      <script type="text/javascript">



function mycarousel_initCallback(carousel)

{

    // Disable autoscrolling if the user clicks the prev or next button.

    carousel.buttonNext.bind('click', function() {

        carousel.startAuto(1);

    });



    carousel.buttonPrev.bind('click', function() {

        carousel.startAuto(1);

    });



    // Pause autoscrolling if the user moves with the cursor over the clip.

    carousel.clip.hover(function() {

        carousel.stopAuto();

    }, function() {

        carousel.startAuto();

    });

};



jQuery(document).ready(function() {

    jQuery('#mycarousel_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?>').jcarousel({

        auto: <?php echo $row_galerie['auto_start']; ?>,

        wrap: 'last',

		<?php if($row_galerie['show_arrow'] != 1){ ?>

		buttonNextHTML:'',

		buttonPrevHTML:'',

		<?php } ?>

        initCallback: mycarousel_initCallback

    });

	<?php if($row_galerie['show_arrow'] == 1){ ?>

	$('.jcarousel-skin-tango .jcarousel-container-horizontal').css({'paddingLeft':'40px','paddingRight':'40px','width':($('.jcarousel-skin-tango .jcarousel-container-horizontal').width()-80)});

	$('.jcarousel-skin-tango .jcarousel-clip-horizontal').parent().css({'width':($('.jcarousel-skin-tango .jcarousel-container-horizontal').parent().width()-80)});

	$('.jcarousel-skin-tango .jcarousel-clip-horizontal').css({'width':($('.jcarousel-skin-tango .jcarousel-clip-horizontal').width()-80)});

		<?php } ?>

});



</script>

      <?php }else if($row_galerie['type'] == 3){



 $couverture = "SELECT g.*,p.* FROM galerie g,photo p where g.id = '".str_replace("Galerie_#","",$row_donnees['contenu'])."' AND g.id = p.galerie AND p.Couverture = 1 ORDER BY p.Ordre";

	$req_couverture  = mysql_query($couverture ,$connect);

	$row_couverture  = mysql_fetch_array($req_couverture);

	$num_couverture  = mysql_num_rows($req_couverture);

 ?>

      <script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery.theatre.min.js"></script>



      <!-- This is how you initialize theatre -->

      <script type="text/javascript">

	  $(window).load(function() {

	  $('#myExample_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?>').theatre({

		  'effect': '3d',

		  'selector': 'img, embed, video',

		  'paging': '.paging',

		  'speed': 1000,

		  'still': 1000

	  });



	  $('#myExample_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?>').hover(function(){

		  $('#myExample_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?>').theatre("stop");

		},function(){

		  $('#myExample_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?>').theatre("play");

		}

		);

	  $('#myExample_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?> a').hover(function(){

		 var index= $('#myExample_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?> a').index(this);

		  $('#myExample_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?>').theatre('jump',index+1 , 800);

	  });

	  $('.theatre').css({'display':'block','overflow':'hidden','position':'relative','list-style':'none','padding':'0'});

	  $('.theatre-3d .theatre-actor').css({'position':'absolute'});

	  });

	</script>

      <?php if($num_couverture > 0){ ?>

      <script language="javascript">

	$(document).ready(function(){

	$('#myExample_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?>').css({'width':'100%','height':'300px','visibility':'hidden','z-index':'10','background':'url("<?php echo $row_couverture['Image']; ?>") no-repeat scroll center 30% transparent','marginLeft':'auto','marginRight':'auto'});



	});

	</script>

      <?php } ?>

      <?php }?>

      <?php





	if($row_galerie['type'] == 2){



	$contenu_final_galerie = '<div id="gallery_'.str_replace("Galerie_#","",$row_donnees['contenu']).'">



<ul class="pagination_'.str_replace("Galerie_#","",$row_donnees['contenu']).'">';

	if($num_galerie > 0){



		do{



		if($row_galerie['action_click'] == 0){

				$contenu_final_galerie = $contenu_final_galerie.' <li>';

            if($row_galerie['Image'] != ''){

              $contenu_final_galerie = $contenu_final_galerie. ' <img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie['Image'])).'" width="'.$row_galerie['Largeur'].'" alt="'.$row_galerie2['Description'].'" />';

			}else{

              $contenu_final_galerie = $contenu_final_galerie. ' <img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie['Largeur'].'" alt="'.$row_galerie2['Description'].'" />';

				}

        $contenu_final_galerie = $contenu_final_galerie.' </li>';

				}else if($row_galerie['action_click'] == 1){



			$contenu_final_galerie = $contenu_final_galerie.' <li>';

			if($row_galerie['Image'] != ''){

           $contenu_final_galerie = $contenu_final_galerie.' <a href="'.$row_galerie['Image'].'" title="'.$row_galerie['Description'].'"><img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie['Image'])).'" width="72" height="72" alt="" />';

			}else{

                $contenu_final_galerie = $contenu_final_galerie.' <a href="'.SITEPATH.'images/no_image.png" title="'.$row_galerie['Description'].'"><img src="'.SITEPATH.'images/no_image.png" width="72" height="72" alt="" />';

				}

          $contenu_final_galerie = $contenu_final_galerie. ' </a>

        </li>';



				}else if($row_galerie['action_click'] == 2){

				$contenu_final_galerie = $contenu_final_galerie.'<li>';





            if($row_galerie['type_lien'] == 1){$contenu_final_galerie = $contenu_final_galerie.'<a href="'.get_name_page($idsite,$row_galerie['Lien']).'">';}else if($row_galerie['type_lien'] == 2){$contenu_final_galerie = $contenu_final_galerie.'<a href="'.$row_galerie['Lien'].'" target="_blank">';}else{$contenu_final_galerie = $contenu_final_galerie.'';}



			if($row_galerie['Image'] != ''){

              $contenu_final_galerie = $contenu_final_galerie.'<img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie['Image'])).'" width="'.$row_galerie['Largeur'].'" alt="" />';

			  }else{

              $contenu_final_galerie = $contenu_final_galerie.'<img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie['Largeur'].'" alt="" />';

			  }

			   if($row_galerie['type_lien'] != 0){$contenu_final_galerie = $contenu_final_galerie.'</a>';}



    $contenu_final_galerie = $contenu_final_galerie.'</li>';

				}









			 }while($row_galerie  = mysql_fetch_assoc($req_galerie));





		}else{

			$contenu_final_galerie = GALERIE_EMPTY;

			}





	  $contenu_final_galerie = $contenu_final_galerie.'</ul></div>&nbsp;';



	}else if($row_galerie['type'] == 1){



		if($row_galerie['slice_c'] == 1){



	  $contenu_final_galerie = $contenu_final_galerie.'<div id="gallery_'.str_replace("Galerie_#","",$row_donnees['contenu']).'"><ul id="webticker_'.str_replace("Galerie_#","",$row_donnees['contenu']).'" >';

	if($num_galerie > 0){



		do{



			if($row_galerie['action_click'] == 0){

				$contenu_final_galerie = $contenu_final_galerie.' <li>';

            if($row_galerie2['Image'] != ''){

                $contenu_final_galerie = $contenu_final_galerie.'<img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie2['Image'])).'" width="'.$row_galerie['Largeur'].'" alt="'.$row_galerie2['Description'].'" />';

			}else{

                $contenu_final_galerie = $contenu_final_galerie.'<img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie['Largeur'].'" alt="'.$row_galerie2['Description'].'" />';

			}



       $contenu_final_galerie = $contenu_final_galerie.' </li>';

				}else if($row_galerie['action_click'] == 1){

				$contenu_final_galerie = $contenu_final_galerie.' <li>';

			if($row_galerie2['Image'] != ''){

           $contenu_final_galerie = $contenu_final_galerie.' <a href="'.$row_galerie2['Image'].'" title="'.$row_galerie2['Description'].'"> <img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie2['Image'])).'" width="'.$row_galerie['Largeur'].'" alt="" />';

			}else{

               $contenu_final_galerie = $contenu_final_galerie.' <a href="'.SITEPATH.'images/no_image.png" title="'.$row_galerie2['Description'].'"><img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie['Largeur'].'" alt="" />';

			}

           $contenu_final_galerie = $contenu_final_galerie.' </a>

        </li>';



				}else if($row_galerie['action_click'] == 2){

				$contenu_final_galerie = $contenu_final_galerie.' <li>';



		if($row_galerie2['type_lien'] == 1){

			   $contenu_final_galerie = $contenu_final_galerie.'<a href="'.get_name_page($idsite,$row_galerie2['Lien']).'">';

		}else if($row_galerie2['type_lien'] == 2){

			$contenu_final_galerie = $contenu_final_galerie.'<a href="'.$row_galerie2['Lien'].'" target="_blank">';

		}else{

			$contenu_final_galerie = $contenu_final_galerie.'';}

		  if($row_galerie2['Image'] != ''){

              $contenu_final_galerie = $contenu_final_galerie.'<img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie2['Image'])).'" width="'.$row_galerie['Largeur'].'" alt="" />';

		  }else{

              $contenu_final_galerie = $contenu_final_galerie.'<img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie['Largeur'].'" alt="" />';

			  }

			   if($row_galerie2['type_lien'] != 0){$contenu_final_galerie = $contenu_final_galerie.'</a>';}



    $contenu_final_galerie = $contenu_final_galerie.'</li>';

				}





			 }while($row_galerie2  = mysql_fetch_array($req_galerie2));





		}else{

			$contenu_final_galerie = GALERIE_EMPTY;

			}





	  $contenu_final_galerie = $contenu_final_galerie.'</ul></div>';









		}else{



	  $contenu_final_galerie = $contenu_final_galerie.'<div id="gallery_'.str_replace("Galerie_#","",$row_donnees['contenu']).'"><ul id="mycarousel_'.str_replace("Galerie_#","",$row_donnees['contenu']).'" class="jcarousel-skin-tango">';

	if($num_galerie > 0){



		do{



			if($row_galerie['action_click'] == 0){

				$contenu_final_galerie = $contenu_final_galerie.' <li>';

            if($row_galerie2['Image'] != ''){

                $contenu_final_galerie = $contenu_final_galerie.'<img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie2['Image'])).'" width="'.$row_galerie['Largeur'].'" alt="'.$row_galerie2['Description'].'" />';

			}else{

                $contenu_final_galerie = $contenu_final_galerie.'<img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie['Largeur'].'" alt="'.$row_galerie2['Description'].'" />';

			}



       $contenu_final_galerie = $contenu_final_galerie.' </li>';

				}else if($row_galerie['action_click'] == 1){

				$contenu_final_galerie = $contenu_final_galerie.' <li>';



			if($row_galerie2['Image'] != ''){

            $contenu_final_galerie = $contenu_final_galerie.'<a href="'.$row_galerie2['Image'].'" title="'.$row_galerie2['Description'].'"> <img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie2['Image'])).'" width="'.$row_galerie['Largeur'].'" alt="" />';

			}else{

               $contenu_final_galerie = $contenu_final_galerie.'<a href="'.SITEPATH.'images/no_image.png'.$row_galerie2['Image'].'" title="'.$row_galerie2['Description'].'">  <img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie['Largeur'].'" alt="" />';

			}

           $contenu_final_galerie = $contenu_final_galerie.' </a>

        </li>';



				}else if($row_galerie['action_click'] == 2){

				$contenu_final_galerie = $contenu_final_galerie.' <li>';



		if($row_galerie2['type_lien'] == 1){

			   $contenu_final_galerie = $contenu_final_galerie.'<a href="'.get_name_page($idsite,$row_galerie2['Lien']).'">';

		}else if($row_galerie2['type_lien'] == 2){

			$contenu_final_galerie = $contenu_final_galerie.'<a href="'.$row_galerie2['Lien'].'" target="_blank">';

		}else{

			$contenu_final_galerie = $contenu_final_galerie.'';}

		  if($row_galerie2['Image'] != ''){

              $contenu_final_galerie = $contenu_final_galerie.'<img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie2['Image'])).'" width="'.$row_galerie['Largeur'].'" alt="" />';

		  }else{

              $contenu_final_galerie = $contenu_final_galerie.'<img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie['Largeur'].'" alt="" />';

		  }

			   if($row_galerie2['type_lien'] != 0){$contenu_final_galerie = $contenu_final_galerie.'</a>';}



    $contenu_final_galerie = $contenu_final_galerie.'</li>';

				}





			 }while($row_galerie2  = mysql_fetch_array($req_galerie2));





		}else{

			$contenu_final_galerie = GALERIE_EMPTY;

			}





	  $contenu_final_galerie = $contenu_final_galerie.'</ul></div>&nbsp;';

	}

	}else if($row_galerie['type'] == 3){

	  $contenu_final_galerie = $contenu_final_galerie.'<div id="myExample_'.str_replace("Galerie_#","",$row_donnees['contenu']).'"> ';

	if($num_galerie > 0){



		do{



			if($row_galerie['action_click'] == 0){

				$contenu_final_galerie = $contenu_final_galerie.' <a href="javascript:void(0);">';

            if($row_galerie2['Image'] != ''){

               $contenu_final_galerie = $contenu_final_galerie.' <img src="'.$row_galerie2['Image'].'" alt="'.$row_galerie2['Description'].'" />';

			}else{

               $contenu_final_galerie = $contenu_final_galerie.' <img src="'.SITEPATH.'images/no_image.png" alt="'.$row_galerie2['Description'].'" />';

			}



        $contenu_final_galerie = $contenu_final_galerie.'</a>';

				}else if($row_galerie['action_click'] == 1){

					if($row_galerie2['Image'] != ''){

				$contenu_final_galerie = $contenu_final_galerie.'

            <a href="'.$row_galerie2['Image'].'" title="'.$row_galerie2['Description'].'">

                <img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie2['Image'])).'"  alt="'.$row_galerie2['Description'].'" />

            </a>';

					}else{

				$contenu_final_galerie = $contenu_final_galerie.'

            <a href="'.SITEPATH.'images/no_image.png" title="'.$row_galerie2['Description'].'">

                <img src="'.SITEPATH.'images/no_image.png"  alt="'.$row_galerie2['Description'].'" />

            </a> ';

					}



				}else if($row_galerie['action_click'] == 2){

				$contenu_final_galerie = $contenu_final_galerie;



		if($row_galerie2['type_lien'] == 1){

			   $contenu_final_galerie = $contenu_final_galerie.'<a href="'.get_name_page($idsite,$row_galerie2['Lien']).'">';

		}else if($row_galerie2['type_lien'] == 2){

			$contenu_final_galerie = $contenu_final_galerie.'<a href="'.$row_galerie2['Lien'].'" target="_blank">';

		}else{

			$contenu_final_galerie = $contenu_final_galerie.'<a href="javascript:void(0);">';

		}

		  if($row_galerie2['Image'] != ''){

              $contenu_final_galerie = $contenu_final_galerie.'<img src="'.$row_galerie2['Image'].'" alt="" />';

		  }else{

              $contenu_final_galerie = $contenu_final_galerie.'<img src="'.SITEPATH.'images/no_image.png" alt="" />';

		  }

			   $contenu_final_galerie = $contenu_final_galerie.'</a>';



    $contenu_final_galerie = $contenu_final_galerie;

				}





			 }while($row_galerie2  = mysql_fetch_array($req_galerie2));





		}else{

			$contenu_final_galerie = GALERIE_EMPTY;

			}





	  $contenu_final_galerie = $contenu_final_galerie.'</div>&nbsp;';



	}



	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content '.$type.'">';

			if($row_galerie['type'] == 4){ ?>

      <style>



            .content{font:12px/1.4 ;width:100%;margin:20px auto;}

            .cred{margin-top:20px;font-size:11px;}

            #galleria_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?>{height:600px; width:100% !important; }



        </style>

      <div id="galleria_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?>">

        <?php



 if($num_galerie > 0){



		do{



                $contenu_final_galerie = $contenu_final_galerie.'<img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie2['Image'])).'" width="'.$row_galerie['Largeur'].'" alt="'.$row_galerie2['Description'].'" />';





			echo '	 <a href="'.$row_galerie2['Image'].'">

                <img

                    src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie2['Image'])).'",

                    data-big="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie2['Image'])).'"

                    data-title="'.$row_galerie2['Titre'].'"

                    data-description="'.$row_galerie2['Description'].'"

                >

            </a>';







			 }while($row_galerie2  = mysql_fetch_array($req_galerie2));





		}else{

			$contenu_final_galerie = GALERIE_EMPTY;

			}





 ?>

      </div>

      <script>



    // Load the classic theme

    Galleria.loadTheme('<?php echo SITEPATH; ?>js/themes/classic/galleria.classic.min.js');



    // Initialize Galleria

    Galleria.run('#galleria_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?>');



    </script>

      <?php }else{

			if($_SESSION['lang']== 'ar'){

			echo stripslashes($contenu_final_galerie);

			}else{

			echo utf8_encode(utf8_decode(stripslashes($contenu_final_galerie)));

			}

			}

			echo '

			</div>

		</div>';









		 if($row_galerie['slice_c'] == 1){ ?>

      <script language="javascript">



$(document).ready(function () {

	$('#gallery_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?> .tickercontainer').css({'margin':'0','padding':'0','overflow':'hidden'});

	$('#gallery_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?> .tickercontainer .mask').css({'position':'relative','overflow':'hidden'});

	$('#gallery_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?> ul.newsticker').css({'position':'relative','marginLeft':'20px','list-style-type':'none','margin':'0','padding':'0'});

});

		 </script>

      <script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery.webticker.js"></script>

      <script>

	$("#webticker_<?php echo str_replace("Galerie_#","",$row_donnees['contenu']); ?>").webTicker();

</script>

      <?php }



	  $contenu_final_galerie = '';



	}else if($type == 'Flux'){



	$flux = "SELECT * FROM flux where id = '".str_replace("Flux_#","",$row_donnees['contenu'])."'";

	$req_flux  = mysql_query($flux ,$connect);

	$row_flux  = mysql_fetch_assoc($req_flux);





	if($row_flux['type'] == 'rss'){

	?>

      <script type="text/javascript">

$(document).ready(function () {

	$('#ticker<?php echo $valeur2; ?>').rssfeed('<?php echo $row_flux['lien'.$lang_table]; ?>',{}, function(e) {

		$(e).find('div.rssBody').vTicker({

		showItems: <?php echo $row_flux['nombre']; ?>

		});

	$('#ticker<?php echo $valeur2; ?> li').css('list-style','none');

	$('#ticker<?php echo $valeur2; ?> .rssFeed, #ticker<?php echo $valeur2; ?> .rssBody ul').css('width','100%');

	<?php if($row_flux['only_title'] != 1){ ?>

	$('#ticker<?php echo $valeur2; ?> .rssRow h4').css({'width':'100%','float':'left'});



	<?php } ?>

	$('#ticker<?php echo $valeur2; ?> .rssRow h4 a').css({'color':'<?php echo $row_flux['couleur_titre_article']; ?>','font-size':'<?php echo $row_flux['taille_titre_article']; ?>px','text-decoration':'none'});



	$('#ticker<?php echo $valeur2; ?> .rssRow h4 a').hover(function(){

		$(this).css({'color':'<?php echo $row_flux['couleur_titre_article']; ?>','font-size':'<?php echo $row_flux['taille_titre_article']; ?>px','text-decoration':'none'});



		},function(){

		$(this).css({'color':'<?php echo $row_flux['couleur_titre_article']; ?>','font-size':'<?php echo $row_flux['taille_titre_article']; ?>px','text-decoration':'none'});



		})





	$('#ticker<?php echo $valeur2; ?> .rssRow div.dat').css({'width':'100%','float':'left','color':'<?php echo $row_flux['couleur_date']; ?>','font-size':'<?php echo $row_flux['taille_date']; ?>px'<?php if($row_flux['only_title'] == 1 || $row_flux['show_date'] == 0){ ?>,'display':'none'<?php } ?>});



	$('#ticker<?php echo $valeur2; ?> .rssRow p').css({'text-align':'justify','color':'<?php echo $row_flux['couleur_texte']; ?>','font-size':'<?php echo $row_flux['taille_texte']; ?>px'<?php if($row_flux['only_title'] == 1 || $row_flux['show_date'] == 0){ ?>,'display':'none'<?php } ?>});





	$('#ticker<?php echo $valeur2; ?> .rssHeader').css({'paddingLeft':'0','paddingRight':'0','paddingTop':'0','paddingBottom':'0'});

	$('#ticker<?php echo $valeur2; ?> li').css({'paddingLeft':'0','paddingRight':'0','paddingTop':'4px','paddingBottom':'4px'});



	<?php if($row_flux['only_title'] == 1 || $row_flux['show_img'] != 1){ ?>

	$('#ticker<?php echo $valeur2; ?> .rssMedia').css('display','none');

	<?php } ?>



	$('#ticker<?php echo $valeur2; ?> .rssMedia img').css('width','98%');



	$('#ticker<?php echo $valeur2; ?> .rssRow h4,#ticker<?php echo $valeur2; ?> .rssRow p,#ticker<?php echo $valeur2; ?> .rssRow div').css({'marginLeft':'0','marginright':'0','marginTop':'0','marginBottom':'0','paddingBottom':'6px','paddingTop':'6px','paddingLeft':'6px','paddingRight':'6px'});



	$('#ticker<?php echo $valeur2; ?> .rssRow div').css({'paddingBottom':'0','paddingTop':'0','paddingLeft':'6px','paddingRight':'6px'});



	$('#ticker<?php echo $valeur2; ?> .odd').css('background-color','<?php echo $row_flux['couleur1']; ?>');



	$('#ticker<?php echo $valeur2; ?> .even').css('background-color','<?php echo $row_flux['couleur2']; ?>');



	$('.dragbox-content h3.title_rss').css({'paddingBottom':'6px','paddingTop':'6px','paddingLeft':'6px','paddingRight':'6px','marginBottom':'0','marginTop':'0','marginLeft':'0','marginRight':'0','color':'<?php echo $row_flux['couleur_titre']; ?>','font-size':'<?php echo $row_flux['taille_titre']; ?>px'});







	});



});

</script>

      <?php } ?>

      <?php

	if($row_donnees['id_reglages'] != 0){

			$reglage = 'dragbox_'.$row_donnees['id_reglages'];

		}else{

			$reglage = '';

			}
?>

      <!--<input type="hidden" name="nbr_it" id="nbr_it" value="<?php //echo $row_flux['nombre']; ?>" />-->

      <?php echo '<div class="dragbox '.$reglage.'" id="'.$row_donnees['id'].'" >

			<div class="dragbox-content '.$type.'">'; ?>

      <?php if($row_flux['show_title'] == 1){ ?>

      <h3 class="title_rss"><?php echo $row_flux['titre'.$lang_table]; ?></h3>

      <?php } ?>

      <?php if($row_flux['type'] == 'rss'){ ?>

      <div id="ticker<?php echo $valeur2; ?>"> </div>

      <?php }else{

		?>

      <iframe src="<?php echo SITEPATH; ?>modules/flux_actu/index.php?site=<?php echo $idsite; ?>&id_flux=<?php echo str_replace("Flux_#","",$row_donnees['contenu']); ?>&id_bloc=<?php echo $valeur2; ?>&lang=<?php echo $lang; ?>" frameborder="0" width="<?php if($row_flux['largeur'] > 0){echo $row_flux['largeur'];}else{ echo '690';} ?>" height="<?php if($row_flux['hauteur'] > 0){echo $row_flux['hauteur'];}else{ echo '150';} ?>" scrolling="no"> </iframe>

      <?php	} ?>

      <?php echo '</div></div>'; ?>

      <?php

	}else if($type == 'Agenda'){?>

      <link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>modules/agenda/css/frontierCalendar/jquery-frontier-cal-1.3.2.css" />

      <script type="text/javascript" src="<?php echo SITEPATH; ?>modules/agenda/js/jquery-qtip-1.0.0-rc3140944/jquery.qtip-1.0.js"></script>

      <script type="text/javascript" src="<?php echo SITEPATH; ?>modules/agenda/js/lib/jshashtable-2.1.js"></script>

      <script type="text/javascript" src="<?php echo SITEPATH; ?>modules/agenda/js/frontierCalendar/jquery-frontier-cal-1.3.2.js"></script>

      <?php $id_cal = str_replace("Agenda_#","",$row_donnees['contenu']); ?>

      <script type="text/javascript">

$(document).ready(function(){



	var clickDate = "";

	var clickAgendaItem = "";

	var jfcalplugin = $("#mycal_<?php echo $id_cal; ?>").jFrontierCal({

		date: new Date(),

		dayClickCallback: myDayClickHandler,

		agendaClickCallback: myAgendaClickHandler,

		agendaDropCallback: myAgendaDropHandler,

		agendaMouseoverCallback: myAgendaMouseoverHandler,

		applyAgendaTooltipCallback: myApplyTooltip,

		agendaDragStartCallback : myAgendaDragStart,

		agendaDragStopCallback : myAgendaDragStop,

		dragAndDropEnabled: false

	}).data("plugin");













	<?php

	$events = "SELECT * FROM events where id_site = '".$idsite."' OR id_calendrier = '".$id_cal."'";

	$req_events  = mysql_query($events ,$connect);

	$row_events  = mysql_fetch_assoc($req_events);

	$num_events  = mysql_num_rows($req_events);

	if($num_events > 0){

	do{

	?>

	// Dates use integers







					var startDateObj<?php echo $row_events['ID']; ?> = new Date(parseInt("<?php echo substr($row_events['Date'],0,4); ?>"),parseInt("<?php echo substr($row_events['Date'],5,2); ?>")-1,parseInt("<?php echo substr($row_events['Date'],8,2); ?>"),<?php echo substr($row_events['Date'],11,2); ?>,<?php echo substr($row_events['Date'],14,2); ?>,0,0);

					var endDateObj<?php echo $row_events['ID']; ?> =  new Date(parseInt("<?php echo substr($row_events['Date_fin'],0,4); ?>"),parseInt("<?php echo substr($row_events['Date_fin'],5,2); ?>")-1,parseInt("<?php echo substr($row_events['Date_fin'],8,2); ?>"),<?php echo substr($row_events['Date_fin'],11,2); ?>,<?php echo substr($row_events['Date_fin'],14,2); ?>,0,0);



	 jfcalplugin.addAgendaItem(

                "#mycal_<?php echo $id_cal; ?>",

                        "<?php  echo cleanCut(strip_tags($row_events['Description']),300); ?>",

                        startDateObj<?php echo $row_events['ID']; ?>,

                        endDateObj<?php echo $row_events['ID']; ?>,

                        false,

                        {

                                myNum: <?php echo $row_events['ID']; ?>

                        },

                        {

                                backgroundColor: "<?php echo $row_events['Color1']; ?>",

                                foregroundColor: "<?php echo $row_events['Color2']; ?>"

                        }

        );





					<?php

	}while($row_events  = mysql_fetch_assoc($req_events));

					}



					 ?>



	/**

	 * Do something when dragging starts on agenda div

	 */

	function myAgendaDragStart(eventObj,divElm,agendaItem){

		// destroy our qtip tooltip

		if(divElm.data("qtip")){

			divElm.qtip("destroy");

		}

	};



	/**

	 * Do something when dragging stops on agenda div

	 */

	function myAgendaDragStop(eventObj,divElm,agendaItem){

		//alert("drag stop");

	};



	function myApplyTooltip(divElm,agendaItem){



		// Destroy currrent tooltip if present

		if(divElm.data("qtip")){

			divElm.qtip("destroy");

		}



		var displayData = "";



		var title = agendaItem.title;

		var startDate = agendaItem.startDate;

		var endDate = agendaItem.endDate;

		var allDay = agendaItem.allDay;

		var data = agendaItem.data;





var today = startDate;

var dd = today.getDate();

var mm = today.getMonth()+1;//January is 0!

var yyyy = today.getFullYear();

var hh = today.getHours();

var mi = today.getMinutes();

if(dd<10){dd='0'+dd}

if(mm<10){mm='0'+mm}

if(hh<10){hh='0'+hh}

if(mi<10){mi='0'+mi}

startDate = dd+'/'+mm+'/'+yyyy+' '+hh+':'+mi;

var today1 = endDate;

var dd1 = today1.getDate();

var mm1 = today1.getMonth()+1;//January is 0!

var yyyy1 = today1.getFullYear();

var hh1 = today1.getHours();

var mi1 = today1.getMinutes();

if(dd1<10){dd1='0'+dd1}

if(mm1<10){mm1='0'+mm1}

if(hh1<10){hh1='0'+hh1}

if(mi1<10){mi1='0'+mi1}

endDate = dd1+'/'+mm1+'/'+yyyy1+' '+hh1+':'+mi1;







		displayData += "<b>" + title+ "</b><br><br>";

		if(allDay){

			displayData += "(Toutes les évènements de la journée)<br><br>";

		}else{

			displayData += "<b>Date Début :</b> " + startDate + "<br>" + "<b>Date Fin :</b> " + endDate + "<br><br>";

		}

		for (var propertyName in data) {

			//displayData += "<b>" + propertyName + ":</b> " + data[propertyName] + "<br>"

		}

		// use the user specified colors from the agenda item.

		var backgroundColor = agendaItem.displayProp.backgroundColor;

		var foregroundColor = agendaItem.displayProp.foregroundColor;

		var myStyle = {

			border: {

				width: 1,

				radius: 3

			},

			padding: 10,

			textAlign: "left",

			tip: true,

			name: "dark" // other style properties are inherited from dark theme

		};

		if(backgroundColor != null && backgroundColor != ""){

			myStyle["backgroundColor"] = backgroundColor;

		}

		if(foregroundColor != null && foregroundColor != ""){

			myStyle["color"] = foregroundColor;

		}

		// apply tooltip

		divElm.qtip({

			content: displayData,

			position: {

				corner: {

					tooltip: "bottomMiddle",

					target: "topMiddle"

				},

				adjust: {

					mouse: true,

					x: 0,

					y: -5

				},

				target: "mouse"

			},

			show: {

				when: {

					event: 'mouseover'

				}

			},

			style: myStyle

		});



	};



	/**

	 * Make the day cells roughly 3/4th as tall as they are wide. this makes our calendar wider than it is tall.

	 */

	jfcalplugin.setAspectRatio("#mycal_<?php echo $id_cal; ?>",0.75);



	/**

	 * Called when user clicks day cell

	 * use reference to plugin object to add agenda item

	 */

	function myDayClickHandler(eventObj){

		$("#display-event-form").dialog('open');

	};



	/**

	 * Called when user clicks and agenda item

	 * use reference to plugin object to edit agenda item

	 */

	function myAgendaClickHandler(eventObj){

		// Get ID of the agenda item from the event object

		var agendaId = eventObj.data.agendaId;

		// pull agenda item from calendar

		var agendaItem = jfcalplugin.getAgendaItemById("#mycal_<?php echo $id_cal; ?>",agendaId);

		clickAgendaItem = agendaItem;

		$("#display-event-form").dialog('open');

	};





	/**

	 * Called when user drops an agenda item into a day cell.

	 */

	function myAgendaDropHandler(eventObj){

		// Get ID of the agenda item from the event object

		var agendaId = eventObj.data.agendaId;

		// date agenda item was dropped onto

		var date = eventObj.data.calDayDate;

		var date_end = eventObj.data.endDayDate;



		// Pull agenda item from calendar

		var agendaItem = jfcalplugin.getAgendaItemById("#mycal_<?php echo $id_cal; ?>",agendaId);







	};



	/**

	 * Called when a user mouses over an agenda item

	 */

	function myAgendaMouseoverHandler(eventObj){

		var agendaId = eventObj.data.agendaId;

		var agendaItem = jfcalplugin.getAgendaItemById("#mycal_<?php echo $id_cal; ?>",agendaId);

		//alert("You moused over agenda item " + agendaItem.title + " at location (X=" + eventObj.pageX + ", Y=" + eventObj.pageY + ")");

	};



	var calDate = new Date();

	var cmonth = calDate.getMonth();

	var cyear = calDate.getFullYear();

		if(cmonth == 0){

			$("#current_mounth").html('Janvier '+cyear);

			}else if(cmonth == 1){

			$("#current_mounth").html('Février '+cyear);

			}else if(cmonth == 2){

			$("#current_mounth").html('Mars '+cyear);

			}else if(cmonth == 3){

			$("#current_mounth").html('Avril '+cyear);

			}else if(cmonth == 4){

			$("#current_mounth").html('Mai '+cyear);

			}else if(cmonth == 5){

			$("#current_mounth").html('Juin '+cyear);

			}else if(cmonth == 6){

			$("#current_mounth").html('Juillet '+cyear);

			}else if(cmonth == 7){

			$("#current_mounth").html('Août '+cyear);

			}else if(cmonth == 8){

			$("#current_mounth").html('Septembre '+cyear);

			}else if(cmonth == 9){

			$("#current_mounth").html('Octobre '+cyear);

			}else if(cmonth == 10){

			$("#current_mounth").html('Novembre '+cyear);

			}else if(cmonth == 11){

			$("#current_mounth").html('Decembre '+cyear);

			}

	/**

	 * Use reference to plugin object to a specific year/month

	 */

	$("#dateSelect").bind('change', function() {

		var selectedDate = $("#dateSelect").val();

		var dtArray = selectedDate.split("-");

		var year = dtArray[0];

		// jquery datepicker months start at 1 (1=January)

		var month = dtArray[1];

		// strip any preceeding 0's

		month = month.replace(/^[0]+/g,"")

		var day = dtArray[2];

		// plugin uses 0-based months so we subtrac 1

		jfcalplugin.showMonth("#mycal_<?php echo $id_cal; ?>",year,parseInt(month-1).toString());

	});

	/**

	 * Initialize previous month button

	 */

	$("#BtnPreviousMonth").button();

	$("#BtnPreviousMonth").click(function() {

		jfcalplugin.showPreviousMonth("#mycal_<?php echo $id_cal; ?>");

		// update the jqeury datepicker value

		var calDate = jfcalplugin.getCurrentDate("#mycal_<?php echo $id_cal; ?>"); // returns Date object

		var cyear = calDate.getFullYear();

		// Date month 0-based (0=January)

		var cmonth = calDate.getMonth();



		if(cmonth == 0){

			$("#current_mounth").html('Janvier '+cyear);

			}else if(cmonth == 1){

			$("#current_mounth").html('Février '+cyear);

			}else if(cmonth == 2){

			$("#current_mounth").html('Mars '+cyear);

			}else if(cmonth == 3){

			$("#current_mounth").html('Avril '+cyear);

			}else if(cmonth == 4){

			$("#current_mounth").html('Mai '+cyear);

			}else if(cmonth == 5){

			$("#current_mounth").html('Juin '+cyear);

			}else if(cmonth == 6){

			$("#current_mounth").html('Juillet '+cyear);

			}else if(cmonth == 7){

			$("#current_mounth").html('Août '+cyear);

			}else if(cmonth == 8){

			$("#current_mounth").html('Septembre '+cyear);

			}else if(cmonth == 9){

			$("#current_mounth").html('Octobre '+cyear);

			}else if(cmonth == 10){

			$("#current_mounth").html('Novembre '+cyear);

			}else if(cmonth == 11){

			$("#current_mounth").html('Decembre '+cyear);

			}

		var cday = calDate.getDate();

		// jquery datepicker month starts at 1 (1=January) so we add 1

		$("#dateSelect").datepicker("setDate",cyear+"-"+(cmonth+1)+"-"+cday);

		return false;

	});

	/**

	 * Initialize next month button

	 */

	$("#BtnNextMonth").button();

	$("#BtnNextMonth").click(function() {

		jfcalplugin.showNextMonth("#mycal_<?php echo $id_cal; ?>");

		// update the jqeury datepicker value

		var calDate = jfcalplugin.getCurrentDate("#mycal_<?php echo $id_cal; ?>"); // returns Date object

		var cyear = calDate.getFullYear();

		// Date month 0-based (0=January)

		var cmonth = calDate.getMonth();

		var cday = calDate.getDate();

		if(cmonth == 0){

			$("#current_mounth").html('Janvier '+cyear);

			}else if(cmonth == 1){

			$("#current_mounth").html('Février '+cyear);

			}else if(cmonth == 2){

			$("#current_mounth").html('Mars '+cyear);

			}else if(cmonth == 3){

			$("#current_mounth").html('Avril '+cyear);

			}else if(cmonth == 4){

			$("#current_mounth").html('Mai '+cyear);

			}else if(cmonth == 5){

			$("#current_mounth").html('Juin '+cyear);

			}else if(cmonth == 6){

			$("#current_mounth").html('Juillet '+cyear);

			}else if(cmonth == 7){

			$("#current_mounth").html('Août '+cyear);

			}else if(cmonth == 8){

			$("#current_mounth").html('Septembre '+cyear);

			}else if(cmonth == 9){

			$("#current_mounth").html('Octobre '+cyear);

			}else if(cmonth == 10){

			$("#current_mounth").html('Novembre '+cyear);

			}else if(cmonth == 11){

			$("#current_mounth").html('Decembre '+cyear);

			}

		// jquery datepicker month starts at 1 (1=January) so we add 1

		$("#dateSelect").datepicker("setDate",cyear+"-"+(cmonth+1)+"-"+cday);

		return false;

	});



	/**

	 * Initialize delete all agenda items button

	 */

	$("#BtnDeleteAll").button();

	$("#BtnDeleteAll").click(function() {

		jfcalplugin.deleteAllAgendaItems("#mycal_<?php echo $id_cal; ?>");

		return false;

	});



	/**

	 * Initialize display event form.

	 */

	$("#display-event-form").dialog({

		autoOpen: false,

		height: 653,

		width: 800,

		modal: true,

		draggable:true,

		buttons: {

			Fermer: function() {

				$(this).dialog('close');

			}

		},

		open: function(event, ui){},

		close: function() {

			// clear agenda data

			//$("#display-event-form").html("");

		}

	});











});

</script>

      <?php

	$param_agenda = "SELECT * FROM parametres_agenda where id_cal = '".$id_cal."'";

	$req_param_agenda  = mysql_query($param_agenda ,$connect);

	$row_param_agenda  = mysql_fetch_assoc($req_param_agenda);

	$num_param_agenda  = mysql_num_rows($req_param_agenda);

	if($num_param_agenda > 0){

	?>

      <script language="javascript">

	$(document).ready(function(){

	$('.day_content_today').css({'background-color':'<?php echo $row_param_agenda['couleur_today']; ?>','border':'1px solid <?php echo $row_param_agenda['couleur_today']; ?>'});

	$('.day_content_with_event').css({'background-color':'<?php echo $row_param_agenda['couleur_event']; ?>','border':'1px solid <?php echo $row_param_agenda['couleur_event']; ?>'});

	$('.day_content_with_event_mouseover').css({'background-color':'<?php echo $row_param_agenda['couleur_event']; ?>','border':'1px solid <?php echo $row_param_agenda['couleur_t']; ?>'});

	$('.day_content_with_event_mouseover').css('color','<?php echo $row_param_agenda['couleur_t']; ?>');

	$('.day_content').css('border','1px solid <?php echo $row_param_agenda['couleur_t']; ?>');

	$('.smoothcalendar .dayNames').css('color','<?php echo $row_param_agenda['couleur_t']; ?>');

	$('.current_date').css('color','<?php echo $row_param_agenda['couleur_today']; ?>');

	$('.smoothcalendar').css('color','<?php echo $row_param_agenda['couleur_t']; ?>');

	$('.smoothcalendar .fullDateText').css('color','<?php echo $row_param_agenda['couleur_today']; ?>');

	$('.smoothcalendar #fullDateText, .smoothcalendar .event-time').css('color','<?php echo $row_param_agenda['couleur_event']; ?>');

	$('.smoothcalendar #smoothcalendargoBackLink, .smoothcalendar .close-button').css('color','<?php echo $row_param_agenda['couleur_t']; ?>');

	$('.smoothcalendar a,.smoothcalendar .close-button,.smoothcalendar #smoothcalendargoBackLink').hover(function(){

		$(this).css('color','<?php echo $row_param_agenda['couleur_event']; ?>');

		});



	});

	</script>

      <?php

	}

		if($valeur2 != ''){

	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content '.$type.'" style="float:none !important;">'; ?>

      <div id="example_<?php echo $id_cal; ?>" style="margin: 0 auto; width:100%;">

        <div id="toolbar_<?php echo $id_cal; ?>" class="ui-widget-header ui-corner-all" style="padding:3px; vertical-align: middle; white-space:nowrap; overflow: hidden;">

          <button id="BtnPreviousMonth" style="float:left">&laquo;</button>

          <div id="current_mounth"></div>

          <button id="BtnNextMonth" style="float:right; margin-top:-24px">&raquo;</button>

        </div>

        <div id="mycal_<?php echo $id_cal; ?>"></div>

      </div>

      <div id="display-event-form" title="Voir Calendrier">

        <iframe width="780" height="555" scrolling="no" frameborder="0" src="<?php echo SITEPATH; ?>modules/agenda/calendar_show.php?id_cal=<?php echo $id_cal; ?>&id_site=<?php echo $idsite; ?>"></iframe>

      </div>

      <?php echo '</div></div>';
}



		}else if($type == 'Inscription'){

			echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content '.$type.'" style="float:none !important;">';



			include('modules/inscription/inscription_etap.php');



			 echo '</div></div>';

		 }else if($type == 'Form'){



	$envoi = false;

	require_once('functions/functions.php');



       $query = "select * from formulaire WHERE id = '".str_replace("Form_#","",$row_donnees['contenu'])."'";

		$query_formulaire = mysql_query($query,$connect);

		$formulaire = mysql_fetch_assoc($query_formulaire);



		$to = $formulaire['email'.$lang_table];

		$subject=$formulaire['Sujet'.$lang_table];



		if(isset($_POST['send'])){

			/*$nom_site = "select u.Email,s.Nom from site s,utilisateurs u WHERE s.id_user = u.id_user AND s.id_site = '".$idsite."'";
			$query_nom_site = mysql_query($nom_site,$connect);
			$raw_nom_site = mysql_fetch_array($query_nom_site);*/

			$from = $to;//$raw_nom_site['Email'];

			include("wmailer/class.mailer.php");



			$query = "select * from champs WHERE id_frm = '".$formulaire['id']."' order by id asc";

			$query_champs = mysql_query($query,$connect);

			$mailer = new Mailer();

			$mailer->set_priority('Highest');

			$mailer->set_from($from);

			$mailer->set_address($to);

			$mailer->set_format('html');



		if($_SESSION['lang']== 'ar'){

			$mailer->set_subject($subject);

		}else{

			$mailer->set_subject(utf8_decode($subject));

		}

			$message = $subject.'<br><br>';





		if($formulaire['id'] == '22'){





	require('functions/badges/function.php');



		$message = "<html>\r\n";

		$message .= "<body style=\"font-family:Geneva, sans-serif; font-size:14px; color:#09113a;\">\r\n";

		$message .= "Bonjour, une demande de participation au Salon Logismed a été envoyée par<br>\r\n";



		$chaine = random(10);



				$query_client = "INSERT INTO Visiteurs (id_visiteur,bare_code)

				VALUES(

				'',

				'".$chaine."')";

				mysql_query($query_client);

				$id_visiteur = mysql_insert_id();





			while($row_champs = mysql_fetch_assoc($query_champs)){

					if($row_champs['id'] == '50'){

					$label_champ = 'title';

					}else if($row_champs['id'] == '51'){

					$label_champ = 'Prenom';

					$Prenom = $_POST['field_'.$row_champs['id']];

					}else if($row_champs['id'] == '52'){

					$label_champ = 'Nom';

					$Nom = $_POST['field_'.$row_champs['id']];

					}else if($row_champs['id'] == '54'){

					$label_champ = 'typefonction';

					}else if($row_champs['id'] == '55'){

					$label_champ = 'Societe';

					}else if($row_champs['id'] == '56'){

					$label_champ = 'Secteur';

					}else if($row_champs['id'] == '57'){

					$label_champ = 'fonction';

					}else if($row_champs['id'] == '58'){

					$label_champ = 'Ville';

					}else if($row_champs['id'] == '59'){

					$label_champ = 'Pays';

					}else if($row_champs['id'] == '60'){

					$label_champ = 'adresse';

					}else if($row_champs['id'] == '61'){

					$label_champ = 'Email';

					$to2 = $_POST['field_'.$row_champs['id']];

					}else if($row_champs['id'] == '62'){

					$label_champ = 'Tel';

					}else if($row_champs['id'] == '63'){

					$label_champ = 'fax';

					}else if($row_champs['id'] == '64'){

					$label_champ = 'website';

					}else if($row_champs['id'] == '65'){

					$label_champ = 'news_inscription';

					}else if($row_champs['id'] == '66'){

					$label_champ = 'get_contacted';

					}





				$query_update = "UPDATE Visiteurs SET ".$label_champ." = '".$_POST['field_'.$row_champs['id']]."' WHERE id_visiteur = '".$id_visiteur."'";

				mysql_query($query_update) or die('Error, insert query failed');



				$message .= $_POST['field_lib_'.$row_champs['id']]." : ".$_POST['field_'.$row_champs['id']]."<br>" ;

			}



			$message .= "Code bare N : ".$chaine.".<br>\r\n\r\n";

			$message .= "L'équipe Logismed.<br>\r\n\r\n";

		$message .= "</body>\r\n";

		$message .= "</html>\r\n";



		//envoi du bare code





$default_value = array();

$default_value['output'] = 1;

$default_value['thickness'] = 30;

$output = $default_value['output'];

$thickness = $default_value['thickness'];



		$text2display = $chaine;







		$message2 = "--$mime_boundary\r\n";



$message2 .= '

 <div id="printable" style="width:520px; margin:0 auto;font-family:Arial, Helvetica, sans-serif; 		font-size: 18px;    font-weight: bold;">

 <center>

  <img src="http://www.logismed.ma/images/entete.jpg">



     </center>

      <p style="font-size:12px">Bonjour '.$Prenom.',<br />

	  Nous serons heureux de vous accueillir au salon Logismed, le 07, 08 et 09 Mai 2013 au Centre International de Conf&eacute;rence et d\'Expositions de l\'Office des Changes, Route El Jadida - Casablanca.</p>

      <p style="font-size:12px">Pour faciliter votre acc&egrave;s au salon, vous trouverez ci-dessous votre badge provisoire &aacute; imprimer.</p>



        <p style="font-size:12px">A l\'entr&eacute;e du salon, il vous suffira de vous pr&eacute;senter directement &aacute; l\'accueil visiteurs &laquo; sp&eacute;cial pr&eacute;enregistr&eacute;s &raquo;. Votre badge personnel sera imprim&eacute; sans attente !</p>

        <p style="font-size:12px">Attention : un seul badge sera imprim&eacute; par code.</p>





	 <table width="508" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td colspan="3"><img src="http://www.logismed.ma/images/badge/Badge_01.jpg" width="508" height="101" /></td>

  </tr>

  <tr>

    <td rowspan="3" width="144"><img src="http://www.logismed.ma/images/badge/Badge_02.jpg" width="113" height="136" /></td>

    <td width="230" height="47" align="center" bgcolor="#FFFFFF">'.$Prenom.' '.$Nom.'</td>

    <td width="134" rowspan="3" align="right"><img src="http://www.logismed.ma/images/badge/Badge_04.jpg" width="134" height="136" /></td>

  </tr>

  <tr>

    <td height="38">&nbsp;</td>

    </tr>

  <tr>

    <td height="38" align="center" valign="middle"><img src="http://www.logismed.ma/badges/image.php?code=code128&amp;o=' . $output . '&amp;dpi=' . $dpi . '&amp;t=' . $thickness . '&amp;r=' . $res . '&amp;rot=' . $rotation . '&amp;text=' . urlencode($text2display) . '&amp;f1=' . $font_family . '&amp;f2=' . $font_size . '&amp;a1=' . $a1 . '&amp;a2=' . $a2 . '&amp;a3=' . $a3 . '" alt="Barcode Image" /></td>

    </tr>

  <tr>

    <td colspan="3"><img src="http://www.logismed.ma/images/badge/Badge_05.jpg" width="508" height="82" /></td>

  </tr>

  </table>

<br />

  <p style="font-size:12px">Cordialement,</p>

<p style="font-size:12px">L\'&eacute;quipe LOGISMED</p>  </div>

';





			$subject2="Demande de participation au Salon international du transport et de la logistique";



			$mailer2 = new Mailer();

			$mailer2->set_priority('Highest');

			$mailer2->set_from('info@logismed.ma');

			$mailer2->set_address($to2);

			$mailer2->set_format('html');

			$mailer2->set_subject($subject2);

			$mailer2->set_message(utf8_decode($message2), array('TAG1' => ''));

			$mailer2->send();







		}else{
			$replace1 = array(":", "*");
			$replace2   = array("", "");


			while($row_champs = mysql_fetch_assoc($query_champs)){

			$message .= str_replace($replace1, $replace2,$_POST['field_lib_'.$row_champs['id']])." : ".$_POST['field_'.$row_champs['id']]."<br>" ;

			}

		}





			$htmlmessage = $message."<br><br>L'équipe ".$raw_nom_site['Nom'];

			$mailer->set_message(utf8_decode($htmlmessage), array('TAG1' => ''));

				if($mailer->send()){

					$envoi = true;

				}

		}

        $query = "select * from champs WHERE id_frm = '".$formulaire['id']."' order by id asc";

		$query_champs = mysql_query($query,$connect);


		if($valeur2 != ''){

	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content '.$type.'">'; ?>

      <div class="formulaire">

        <h3>

          <?php

		if($_SESSION['lang']== 'ar'){

		echo $formulaire['nom'.$lang_table];

		}else{

		echo utf8_encode($formulaire['nom'.$lang_table]);

		}?>

        </h3>

        <?php if($envoi == true){ ?>

        <p class='send1'><?php echo EMAIL_SEND; ?></p>

        <?php } ?>

        <p class="error"></p>

        <form action="" method="post" id="frm" class="formulaire">

          <?php $keep="";	while($row_champs = mysql_fetch_assoc($query_champs)){ ?>

          <p class="field existant" id="<?php echo $row_champs['id']; ?>">

            <?php

				  if($_SESSION['lang']== 'ar'){

				  echo get_field_type_ar($row_champs['id'] , $row_champs['type'],stripslashes($row_champs['Label'.$lang_table]),$row_champs['options'],$row_champs['required'],"show",$formulaire['type']);

				  }else{

				  echo get_field_type($row_champs['id'] , $row_champs['type'],utf8_decode(stripslashes($row_champs['Label'.$lang_table])),$row_champs['options'],$row_champs['required'],"show",$formulaire['type']);

				  }

				   ?>

          </p>

          <?php $keep.=$row_champs['id'].",";	}?>

          <p>

            <input type="submit" class="send" value="<?php echo SEND; ?>" />

            <input type="hidden" name="send" />

          </p>

        </form>

      </div>

      <?php echo '  </div>

		</div>';


	}











	}else if($type == 'RH'){







       $query = "select * from formulaire  WHERE id = '".str_replace("RH_#","",$row_donnees['contenu'])."'";

		$query_formulaire = mysql_query($query,$connect);

		$formulaire = mysql_fetch_assoc($query_formulaire);



		$to=$formulaire['email'];

		$subject=$formulaire['Sujet'];



       $query2 = "select * from type_poste WHERE id_form = '".$formulaire['id']."' ORDER BY id ASC";

		$query_champs = mysql_query($query2,$connect);

		$row_champs = mysql_fetch_assoc($query_champs);





	if($valeur2 != ''){

	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content '.$type.'">'; ?>

      <?php include("modules/postule/postuler.php"); ?>

      <?php echo '  </div>

		</div>';


	}

	}else if($type == 'Search'){ ?>

      <script language="javascript">

	$(document).ready(function(){

		$("#search_result").dialog({

		autoOpen: false,

		height: 420,

		width: 500,

		modal: true,

        resizable: false,

		draggable:true

	});



		$(document).on("click", "#MoreInfo", function(){

		 var order3 = 'action=1';

		$.get("<?php echo SITEPATH; ?>MoreInfo.php", order3, function(theResponse3){

				 $('#search_result').html(theResponse3);

				$("#search_result").dialog('open');

			});

		});



$(document).on("click", ".element", function(){

	var order3 = 'action=get_id_page&idsite=<?php echo $idsite; ?>&id_page='+$(this).find('.page').html();



			$.post("functions/get_idsite.php", order3, function(theResponse3){



	document.location.href = theResponse3;



			});

		});







	});

	</script>

      <div id="search_result" title="Résultat de votre recherche" style="display:none"> </div>

      <?php



		if($valeur2 != ''){


	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content Search">'; ?>

      <form onsubmit="return false;" action="">

        <p>

          <input type="text" style="width: 99%; border-width:0.5%;" value="" id="CityAjax" class="ac_input"/>

          <?php $_SESSION['idsite']=$idsite; ?>

        </p>

      </form>

      <?php echo '  </div>

		</div>';


		}

		 }else if($type == 'Search'){ ?>

      <script language="javascript">

	$(document).ready(function(){

		$("#search_result").dialog({

		autoOpen: false,

		height: 420,

		width: 500,

		modal: true,

        resizable: false,

		draggable:true

	});



		$(document).on("click", "#MoreInfo", function(){

		 var order3 = 'action=1';

		$.get("<?php echo SITEPATH; ?>MoreInfo.php", order3, function(theResponse3){

				 $('#search_result').html(theResponse3);

				$("#search_result").dialog('open');

			});

		});



$(document).on("click", ".element", function(){

	var order3 = 'action=get_id_page&idsite='+$(document).find('#id_site').val()+'&id_page='+$(this).find('.page').html();

			$.post("<?php echo SITEPATH; ?>functions/get_idsite.php", order3, function(theResponse3){

	document.location.href = theResponse3;



			});

		});







	});

	</script>

      <div id="search_result" title="Résultat de votre recherche" style="display:none"> </div>

      <?php



		if($valeur2 != ''){

	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content Search">'; ?>

      <form onsubmit="return false;" action="">

        <p>

          <input type="text" style="width: 99%; border-width:0.5%;" value="" id="CityAjax" class="ac_input"/>

          <input type="hidden" id="id_site" value="<?php echo $idsite; ?>" />

        </p>

      </form>

      <?php echo '  </div>

		</div>';


		}

		 }else if($type == 'Espace_Securise'){  ?>

      <script type="text/javascript">

$(document).ready(function(){

$('#signupp').click(function()

{

$('#option_acces').val('signup');

$('#password').value='';

$('.login_block').hide();

$('.signup_block').show();

$('#email').removeClass("log");

$('#password').removeClass("password");

$('#nom_prenom').addClass("required");

$('#tel').addClass("number required");

$('#date_naissance').addClass("date required");

});

$('#loginn').click(function(){

$('#option_acces').val('login');

$('#password').value='';

$('.signup_block').hide();

$('.login_block').show();

$('#email').addClass("log");

$('#password').addClass("password");

$('#nom_prenom').removeClass("required");

$('#tel').removeClass("number required");

$('#date_naissance').removeClass("date required");

});

$.validator.addMethod("email", function(value, element)

{

return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);

}, "Please enter a valid email address.");







// Validate signup form

$("#form_membre").validate({

id:"#form_membre",

url_site:"<?php echo SITEPATH; ?>",

rules: {

email: "required email",



},

});





    $('#form_membre input.input').focus(function() {

        if($(this).val() == $(this).data('default_val') || !$(this).data('default_val')) {

            $(this).data('default_val', $(this).val());

            $(this).val('');

        }

    });



    $('#form_membre input.input').blur(function() {

        if ($(this).val() == '') $(this).val($(this).data('default_val'));

    });



});

</script>

      <?php	if($valeur2 != ''){

	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content Espace_Securise">';



			include('modules/profil_user/espace_securise.php');



			  echo '  </div>

		</div>';


	}

	}else if($type == 'Profil_user'){  ?>

      <script type="text/javascript">

$(document).ready(function(){

$('#signupp').click(function()

{

$('#option_acces').val('signup');

$('#password').value='';

$('.login_block').hide();

$('.signup_block').show();

$('#email').removeClass("log");

$('#password').removeClass("password");

$('#nom_prenom').addClass("required");

$('#tel').addClass("number required");

$('#date_naissance').addClass("date required");

});

$('#loginn').click(function(){

$('#option_acces').val('login');

$('#password').value='';

$('.signup_block').hide();

$('.login_block').show();

$('#email').addClass("log");

$('#password').addClass("password");

$('#nom_prenom').removeClass("required");

$('#tel').removeClass("number required");

$('#date_naissance').removeClass("date required");

});

$.validator.addMethod("email", function(value, element)

{

return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);

}, "Please enter a valid email address.");







// Validate signup form

$("#form_membre").validate({

id:"#form_membre",

url_site:"<?php echo SITEPATH; ?>",

rules: {

email: "required email",



},

});





    $('#form_membre input.input').focus(function() {

        if($(this).val() == $(this).data('default_val') || !$(this).data('default_val')) {

            $(this).data('default_val', $(this).val());

            $(this).val('');

        }

    });



    $('#form_membre input.input').blur(function() {

        if ($(this).val() == '') $(this).val($(this).data('default_val'));

    });



});

</script>

      <?php	if($valeur2 != ''){

	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content Espace_Securise">';

			include('modules/profil_user/profil.php');

			 echo '  </div>

		</div>';


	}

	}else if($type == 'CarteMenu'){



	$carte = "SELECT * FROM carte where id='".str_replace("CarteMenu_#","",$row_donnees['contenu'])."'";

	$query_carte  = mysql_query($carte ,$connect);

	$tab_carte = mysql_fetch_assoc($query_carte);

	$nbr_carte = mysql_num_rows($query_carte);



	$menu_carte = "SELECT * FROM menu_carte where id_carte ='".str_replace("CarteMenu_#","",$row_donnees['contenu'])."'";

	$query_menu_carte  = mysql_query($menu_carte ,$connect);

	$row_menu_carte  = mysql_fetch_assoc($query_menu_carte);

	$nbr_menu_carte = mysql_num_rows($query_menu_carte);



	?>

      <script type="text/javascript">

$(document).ready(function() {

$('a.showMenu').lightBox();

});

</script>

      <?php

	echo '<div class="dragbox ';



	if($row_donnees['partge'] == 1){echo 'bloc_share';}

	echo ' dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >';



	if($row_donnees['partge'] == 1){echo '<div class="shareCarte"><img src="'.SITEPATH.'images/social/facebook_16.png" width="16" height="16" title="facebook" /><img src="'.SITEPATH.'images/social/twitter_16.png" width="16" height="16" title="twitter" /><img src="'.SITEPATH.'images/social/google_16.png" width="16" height="16" title="google" /><img src="'.SITEPATH.'images/social/plus.png" width="16" height="16" title="plus" data-bloc="'.$valeur2.'" data-type="'.$type.'" /></div>';

	}

	echo '<div class="dragbox-content '.$type.'">';

		?>

      <?php if($tab_carte['titre'] != ''){ ?>

      <h3 style="float:left;"><?php echo $tab_carte['titre']; ?></h3>

      <?php } ?>

      <?php if($tab_carte['show_img'] == 1){ ?>

      <img src="<?php echo $tab_carte['image']; ?>" width="100%" />

      <?php } ?>

      <?php if($tab_carte['description'] != ''){ ?>

      <p><?php echo $tab_carte['description']; ?></p>

      <?php } ?>

      <?php if($nbr_menu_carte > 0){ ?>

      <br />

      <br />

      <table width="100%" border="0">

        <?php do{ ?>

          <?php if($row_menu_carte['show_img'] == 1 && $row_menu_carte['image'] != ''){ ?>

          <tr>

            <td width="30%" rowspan="2" align="left" valign="top"><a class="showMenu" href="<?php echo $row_menu_carte['image']; ?>"><img src="<?php echo $row_menu_carte['image']; ?>" width="96%" /></a></td>

            <td width="55%" valign="top"><strong><?php echo $row_menu_carte['titre']; ?></strong></td>

            <td align="right" valign="top"><strong><?php echo $row_menu_carte['prix']; ?> <?php echo $tab_carte['devise']; ?></strong></td>

          </tr>

          <tr>

            <td colspan="2" valign="top"><?php echo $row_menu_carte['description']; ?></td>

          </tr>

          <tr>

            <td colspan="3"><hr width="100%" /></td>

          </tr>

          <?php }else{ ?>

          <tr>

            <td width="80%" colspan="2"><strong><?php echo $row_menu_carte['titre']; ?></strong></td>

            <td align="right"><strong><?php echo $row_menu_carte['prix']; ?> <?php echo $tab_carte['devise']; ?></strong></td>

          </tr>

          <tr>

            <td colspan="3"><?php echo $row_menu_carte['description']; ?>

              <hr width="100%" /></td>

          </tr>

          <?php } ?>

          <?php }while($row_menu_carte  = mysql_fetch_assoc($query_menu_carte)); ?>

      </table>

      <?php } ?>

      <?php echo '</div></div>';



		}else if($type == 'Document'){







			$req_articles = "SELECT * FROM document where id_param='".str_replace("Document_#","",$row_donnees['contenu'])."' AND status=1 order by ordre";

	$articles  = mysql_query($req_articles ,$connect);

	$nbr_articles =mysql_num_rows($articles);



	$req_param = "SELECT * FROM param_fichier where id_page='".$id_page."' AND id_block = '".$valeur2."'";

	$param_blog  = mysql_query($req_param ,$connect);

	$row_param_blog  = mysql_fetch_assoc($param_blog);

	if($row_param_blog['Nbr_fichier'] < 1){

		$nbr_articles_page = 2 ;

		}else{

	$nbr_articles_page = $row_param_blog['Nbr_fichier'];

		}



?>

      <script type="text/javascript">

$(document).ready(function() {

	$("ul.pagination").quickPagination({pagerLocation:"bottom",pageSize:"<?php echo $nbr_articles_page; ?>"});

});

</script>

      <?php

	echo '<div class="dragbox ';



	if($row_donnees['partge'] == 1){echo 'bloc_share';}

	echo ' dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >';



if($row_donnees['partge'] == 1){echo '<div class="shareDocument"><img src="'.SITEPATH.'images/social/facebook_16.png" width="16" height="16" title="facebook" /><img src="'.SITEPATH.'images/social/twitter_16.png" width="16" height="16" title="twitter" /><img src="'.SITEPATH.'images/social/google_16.png" width="16" height="16" title="google" /><img src="'.SITEPATH.'images/social/plus.png" width="16" height="16" title="plus" data-bloc="'.$valeur2.'" data-type="'.$type.'" /></div>';

}



			echo '<div class="dragbox-content '.$type.'">';

		?>

      <div id="block">

        <ul class="pagination">

          <?php if($nbr_articles>0){



	while($row_articles  = mysql_fetch_assoc($articles)){?>

          <li class="document-item">

            <table width="100%">



                <td><?php

	if($_SESSION['lang']== 'ar'){

	echo utf8_encode(stripslashes(str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',$row_articles['Texte'.$lang_table])));

	}else{

	echo stripslashes(str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',$row_articles['Texte'.$lang_table]));

	}?></td>

                <td align="center" width="50"><a href="<?php echo $row_articles['document']?>" target="_blank"><img src="<?php echo SITEPATH; ?>images/document/<?php echo $row_articles['Image']?>.png" width="25" /></a></td>

              </tr>

            </table>

          </li>

          <?php }



}?>

        </ul>

      </div>

      <?php echo '</div></div>';



	}else if($type == 'Articles'){



		if(isset($_GET['detail']) && !empty($_GET['detail'])){

		$article=mysql_escape_string(($_GET['detail']));

			$articles = "SELECT * FROM article where id='$article' AND id_param='".str_replace("Articles_#","",$row_donnees['contenu'])."' AND status=1";

			$req_articles = mysql_query($articles ,$connect);

			$row_articles = mysql_fetch_assoc($req_articles);

			if($_SESSION['lang']== 'ar'){

			$Signature= $row_articles['signature'];

			}else{

			$Signature= utf8_encode($row_articles['signature']);

			}

			$src=$row_articles['Image'];

			$src_thumb=$row_articles['Image_thumb'];

			$show_sign=$row_articles['show_signature'];

			$show_date=$row_articles['show_date'];

			$show_facebook=$row_articles['show_facebook'];

			$affiche_article = "no_groupe";





			$req_param = "SELECT * FROM param_blog where id_page='".$id_page."' AND id_block = '".$valeur2."'";

	$param_blog  = mysql_query($req_param ,$connect);

	$row_param_blog  = mysql_fetch_assoc($param_blog);

	$style_blog = $row_param_blog['style'];







		}else{



		$categorie= '';

     if(isset($_POST['categorie']) && $_POST['categorie'] != "" && $_POST['categorie'] != "0"){



	$categorie="AND id_cat = '".$_POST['categorie']."'";



	}



			$req_articles = "SELECT * FROM article where id_param='".str_replace("Articles_#","",$row_donnees['contenu'])."' AND status=1 ".$categorie." order by ordre";

	$articles  = mysql_query($req_articles ,$connect);

	$nbr_articles=mysql_num_rows($articles);







	$categories = "SELECT c.*,a.id_cat FROM cat_article c,article a where c.id_param='".str_replace("Articles_#","",$row_donnees['contenu'])."' AND c.id=a.id_cat  GROUP by c.id";

	$param_categories  = mysql_query($categories ,$connect);

	$row_categories  = mysql_fetch_assoc($param_categories);

	$num_categories  = mysql_num_rows($param_categories);



	$req_param = "SELECT * FROM param_blog where id_page='".$id_page."' AND id_block = '".$valeur2."'";

	$param_blog  = mysql_query($req_param ,$connect);

	$row_param_blog  = mysql_fetch_assoc($param_blog);

	if($row_param_blog['Nbr_articles'] < 1){

		$nbr_articles_page = 2 ;

		}else{

	$nbr_articles_page = $row_param_blog['Nbr_articles'];

		}

	$affiche_article = "groupe";

			}











	?>

      <script type="text/javascript">

$(document).ready(function() {

	$("ul.pagination").quickPagination({pagerLocation:"bottom",pageSize:"<?php echo $nbr_articles_page; ?>"});





	$('a.thumb_article').lightBox();

	$('#carousel_<?php echo $_GET['detail']; ?> a').click(function(){

		$this = this;

		$('img#view_article').attr('src',$($this).attr('title'));

		$('a#thumb_article_principale').attr('href',$($this).attr('title'));





	});

});

</script>

      <?php

	echo '<div class="dragbox ';

	if($affiche_article != 'groupe' && $row_donnees['partge'] == 1){echo 'bloc_share';}

	echo ' dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >';



	if($row_donnees['partge'] == 1){echo '<div class="shareArticle"><img src="'.SITEPATH.'images/social/facebook_16.png" width="16" height="16" title="facebook" /><img src="'.SITEPATH.'images/social/twitter_16.png" width="16" height="16" title="twitter" /><img src="'.SITEPATH.'images/social/google_16.png" width="16" height="16" title="google" /><img src="'.SITEPATH.'images/social/plus.png" width="16" height="16" title="plus" data-bloc="'.$valeur2.'" data-type="'.$type.'" /></div>';

	}

			echo '<div class="dragbox-content '.$type.'">';

		?>

      <?php if($affiche_article == 'groupe'){ ?>

      <div id="block">

        <?php if($num_categories > 0){ ?>

        <form id="frm2" method="post">

          <?php echo 'Catégorie'; ?> :

          <select id="categorie" name="categorie" onchange="frm2.submit();">

            <option value="0">Sélectionnez une catégorie</option>

            <?php do{ ?>

            <option value="<?php echo $row_categories['id']; ?>" <?php if($_POST['categorie']==$row_categories['id']) {echo ' selected="selected"';} ?>><?php echo $row_categories['categorie']; ?></option>

            <?php }while($row_categories  = mysql_fetch_assoc($param_categories)); ?>

          </select>

        </form>

        <br />

        <?php } ?>

        <ul class="pagination">

          <?php if($nbr_articles>0){



	while($row_articles  = mysql_fetch_assoc($articles)){



		 $articles_couverture = "SELECT * FROM slider_article where id_article='".$row_articles['id']."' AND Couverture ='1'";

			$req_articles_couverture = mysql_query($articles_couverture ,$connect);

			$row_articles_couverture = mysql_fetch_assoc($req_articles_couverture);

			$num_articles_couverture = mysql_num_rows($req_articles_couverture);





		?>

          <li class="blog-item">

            <?php if($num_articles_couverture > 0 && $row_articles_couverture['images'] != ''){?>

            <div class="blog-preview"> <a href="<?php echo get_name_page($idsite,$id_page); ?>&detail=<?php echo $row_articles['id']?><?php echo $lien_plus; ?>"> <img src="<?php echo SITEPATH."uploads/site_".$idsite."/blog/min/".end(explode("/", $row_articles_couverture['images'])); ?>" /> </a> </div>

            <?php } ?>

            <div class="blog_content" <?php if($num_articles_couverture == 0 || $row_articles_couverture['images'] == ''){?> style="width:100%" <?php } ?>>

              <div class="blog-title">

                <h3> <a href="<?php echo get_name_page($idsite,$id_page); ?>&detail=<?php echo $row_articles['id']?><?php echo $lien_plus; ?>">

                  <?php

				echo stripslashes($row_articles['Titre'.$lang_table]);?>

                  </a></h3>

              </div>

              <?php if($row_articles['show_signature'] || $row_articles['show_date'] ){?>

              <div class="blog-info">

                <?php if($row_articles['show_date']){?>

                Le <?php echo $row_articles['Date_creation']?>,

                <?php }?>

                <?php if($row_articles['show_signature']){?>

                Par: <span class="signature">

                <?php

				echo $row_articles['signature'];?>

                </span>

                <?php }?>

              </div>

              <?php }?>

              <div class="blog-text">

                <?php

		echo cleanCut(stripslashes(str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',strip_tags($row_articles['Texte'.$lang_table]))),200);

		?>

              </div>

              <a class="read-more" href="<?php echo get_name_page($idsite,$id_page); ?>&detail=<?php echo $row_articles['id']?><?php echo $lien_plus; ?>"> <?php echo SEEMORE; ?> »</a>

              <?php if($row_articles['show_facebook']){?>

              <div class="fb-like" data-href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" data-send="true"  style="width:100% !important;" data-show-faces="false"></div>

              <?php }?>

            </div>

          </li>

          <?php }



}?>

        </ul>

      </div>

      <?php }else{ ?>

      <?php if($style_blog == 2){ ?>

      <div id="block">

        <table width="100%" border="0">

          <tr>

            <td colspan="2"><div class="blog-title">

                <h3><a href="javascript:void(0)">

                  <?php  echo stripslashes($row_articles['Titre'.$lang_table]); ?>

                  </a></h3>

              </div></td>

          </tr>

          <tr>

            <td><?php $articles_couverture = "SELECT * FROM slider_article where id_article='".$_GET['detail']."' AND Couverture ='1'";

			$req_articles_couverture = mysql_query($articles_couverture ,$connect);

			$row_articles_couverture = mysql_fetch_assoc($req_articles_couverture);

			$num_articles_couverture = mysql_num_rows($req_articles_couverture);





			$articles_slider = "SELECT * FROM slider_article where id_article='".$_GET['detail']."' ORDER BY id  ASC";

			$req_articles_slider = mysql_query($articles_slider ,$connect);

			$row_articles_slider = mysql_fetch_assoc($req_articles_slider);



			$req_articles_slider2 = mysql_query($articles_slider ,$connect);

			$row_articles_slider2 = mysql_fetch_assoc($req_articles_slider2);



			$num_articles_slider = mysql_num_rows($req_articles_slider);

			?>

              <?php if($num_articles_couverture > 0 && $row_articles_couverture['images'] != ''){?>

              <a class="thumb_article" id="thumb_article_principale" href="<?php echo SITEPATH."uploads/site_".$idsite."/blog/min/".end(explode("/", $row_articles_couverture['images'])); ?>"> <img src="<?php echo SITEPATH."uploads/site_".$idsite."/blog/min/".end(explode("/", $row_articles_couverture['images'])); ?>" style="width:100%;" id="view_article"  /> </a>

              <?php do{ ?>

                <a class="thumb_article" href="<?php echo SITEPATH."uploads/site_".$idsite."/blog/min/".end(explode("/", $row_articles_slider2['images'])); ?>"> </a>

                <?php }while($row_articles_slider2 = mysql_fetch_assoc($req_articles_slider2)); ?>

              <?php } ?>

              <?php

			 if($num_articles_slider > 0){  ?>

              <?php echo '<ul id="carousel_'.$_GET['detail'].'" class="elastislide-list">';

			  do{  ?>

              <li> <a href="javascript:void(0)" id="<?php echo SITEPATH."uploads/site_".$idsite."/blog/min/".end(explode("/", $row_articles_slider['images'])); ?>" title="<?php echo SITEPATH."uploads/site_".$idsite."/blog/min/".end(explode("/", $row_articles_slider['images'])); ?>"> <img src="<?php echo SITEPATH."uploads/site_".$idsite."/blog/min/".end(explode("/", $row_articles_slider['images'])); ?>" style="width:100%;"  /></a></li>

              <?php }while($row_articles_slider = mysql_fetch_assoc($req_articles_slider));



			  echo '</ul>';

			   } ?>

              <script type="text/javascript">



			$( '#carousel_<?php echo $_GET['detail']; ?>' ).elastislide( {

				minItems : 4

			} );



		</script></td>

          </tr>

          <tr>

            <td valign="top" style="padding-left:5px;"><?php if($row_articles['show_signature'] || $row_articles['show_date'] ){?>

              <div class="blog-info">

                <?php if($row_articles['show_date']){?>

                Le <?php echo $row_articles['Date_creation']?>,

                <?php }?>

                <?php if($row_articles['show_signature']){?>

                Par: <span class="signature">

                <?php

				if($_SESSION['lang']== 'ar'){

				echo $row_articles['signature'];

				}else{

				echo utf8_encode($row_articles['signature']);

				}?>

                </span>

                <?php }?>

              </div>

              <?php }?>

              <div class="blog-text">

                <?php

					  echo stripslashes(str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',$row_articles['Texte'.$lang_table]));?>

                <br>

                <br>

                <a href="<?php echo get_name_page($idsite,$id_page); ?>"><< <?php echo BACK; ?></a>

                <?php if($row_articles['show_postule']){?>

                <?php if($row_articles['type_lien'] == 'lien_out'){?>

                <a style="float:right;" href="<?php echo $row_articles['Lien']; ?>" target="<?php echo $row_articles['cible']; ?>">

                <?php }else{ ?>

                <a style="float:right;" href="<?php echo get_name_page($idsite,$row_articles['Lien']); ?>" target="<?php echo $row_articles['cible']; ?>">

                <?php } ?>

                <img src="<?php echo $row_articles['bouton']; ?>" onmouseover="$(this).attr('src','<?php echo $row_articles['bouton_hover']; ?>')" onmouseout="$(this).attr('src','<?php echo $row_articles['bouton']; ?>')" /> </a>

                <?php }?>

                <br>

                <br>

              </div></td>

          </tr>

          <tr>

            <td colspan="2"><?php if($row_articles['show_facebook']){?>

              <div class="fb-like" data-href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" data-send="true"  style="width:100% !important;" data-show-faces="false"></div>

              <div class="fb-comments" data-href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" data-num-posts="4"  style="width:100% !important;"></div>

              <?php }?></td>

          </tr>

        </table>

      </div>

      <?php }else{ ?>

      <div id="block">

        <table width="100%" border="0">

          <tr>

            <td colspan="2"><div class="blog-title">

                <h3><a href="javascript:void(0)">

                  <?php  echo stripslashes($row_articles['Titre'.$lang_table]); ?>

                  </a></h3>

              </div></td>

          </tr>

          <tr>

            <?php $articles_couverture = "SELECT * FROM slider_article where id_article='".$_GET['detail']."' AND Couverture ='1'";

			$req_articles_couverture = mysql_query($articles_couverture ,$connect);

			$row_articles_couverture = mysql_fetch_assoc($req_articles_couverture);

			$num_articles_couverture = mysql_num_rows($req_articles_couverture);





			$articles_slider = "SELECT * FROM slider_article where id_article='".$_GET['detail']."' ORDER BY id  ASC";

			$req_articles_slider = mysql_query($articles_slider ,$connect);

			$row_articles_slider = mysql_fetch_assoc($req_articles_slider);





			$req_articles_slider2 = mysql_query($articles_slider ,$connect);

			$row_articles_slider2 = mysql_fetch_assoc($req_articles_slider2);



			$num_articles_slider = mysql_num_rows($req_articles_slider);





			?>

            <td width="<?php if($num_articles_couverture > 0 && $row_articles_couverture['images'] != ''){ echo '30%'; }else{echo '0%';}?>" valign="top" ><?php if($num_articles_couverture > 0 && $row_articles_couverture['images'] != ''){?>

              <a class="thumb_article" id="thumb_article_principale" href="<?php echo SITEPATH."uploads/site_".$idsite."/blog/min/".end(explode("/", $row_articles_couverture['images'])); ?>"> <img src="<?php echo SITEPATH."uploads/site_".$idsite."/blog/min/".end(explode("/", $row_articles_couverture['images'])); ?>" style="width:100%;" id="view_article"  /> </a>

              <?php do{ ?>

                <a class="thumb_article" href="<?php echo SITEPATH."uploads/site_".$idsite."/blog/min/".end(explode("/", $row_articles_slider2['images'])); ?>"> </a>

                <?php }while($row_articles_slider2 = mysql_fetch_assoc($req_articles_slider2)); ?>

              <?php } ?>

              <?php

			 if($num_articles_slider > 0){  ?>

              <?php echo '<ul id="carousel_'.$_GET['detail'].'" class="elastislide-list">';

			  do{  ?>

              <li> <a href="javascript:void(0)" id="<?php echo SITEPATH."uploads/site_".$idsite."/blog/min/".end(explode("/", $row_articles_slider['images'])); ?>" title="<?php echo SITEPATH."uploads/site_".$idsite."/blog/min/".end(explode("/", $row_articles_slider['images'])); ?>"> <img src="<?php echo SITEPATH."uploads/site_".$idsite."/blog/min/".end(explode("/", $row_articles_slider['images'])); ?>" style="width:100%;"  /></a></li>

              <?php }while($row_articles_slider = mysql_fetch_assoc($req_articles_slider));



			  echo '</ul>';

			   } ?>

              <script type="text/javascript">



			$( '#carousel_<?php echo $_GET['detail']; ?>' ).elastislide( {

				minItems : 4

			} );



		</script></td>

            <td valign="top" style="padding-left:5px;"><?php if($row_articles['show_signature'] || $row_articles['show_date'] ){?>

              <div class="blog-info">

                <?php if($row_articles['show_date']){?>

                Le <?php echo $row_articles['Date_creation']?>,

                <?php }?>

                <?php if($row_articles['show_signature']){?>

                Par: <span class="signature">

                <?php

				if($_SESSION['lang']== 'ar'){

				echo $row_articles['signature'];

				}else{

				echo utf8_encode($row_articles['signature']);

				}?>

                </span>

                <?php }?>

              </div>

              <?php }?>

              <div class="blog-text">

                <?php

					  echo stripslashes(str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',$row_articles['Texte'.$lang_table]));?>

                <br>

                <br>

                <a href="<?php echo get_name_page($idsite,$id_page); ?>"><< <?php echo BACK; ?></a>

                <?php if($row_articles['show_postule']){?>

                <?php if($row_articles['type_lien'] == 'lien_out'){?>

                <a style="float:right;" href="<?php echo $row_articles['Lien']; ?>" target="<?php echo $row_articles['cible']; ?>">

                <?php }else{ ?>

                <a style="float:right;" href="<?php echo get_name_page($idsite,$row_articles['Lien']); ?>" target="<?php echo $row_articles['cible']; ?>">

                <?php } ?>

                <img src="<?php echo $row_articles['bouton']; ?>" onmouseover="$(this).attr('src','<?php echo $row_articles['bouton_hover']; ?>')" onmouseout="$(this).attr('src','<?php echo $row_articles['bouton']; ?>')" /> </a>

                <?php }?>

                <br>

                <br>

              </div></td>

          </tr>

          <tr>

            <td colspan="2"><?php if($row_articles['show_facebook']){?>

              <div class="fb-like" data-href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" data-send="true"  style="width:100% !important;" data-show-faces="false"></div>

              <div class="fb-comments" data-href="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" data-num-posts="4"  style="width:100% !important;"></div>

              <?php }?></td>

          </tr>

        </table>

      </div>

      <?php } ?>

      <?php } ?>

      <script>(function(d, s, id) {

var js, fjs = d.getElementsByTagName(s)[0];

if (d.getElementById(id)) return;

js = d.createElement(s); js.id = id;

js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";

fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));



</script>

      <?php echo '

			</div>

		</div>';








	}else if($type == 'onglet' || $type == 'accordion'){





	$req_param_onglet = "SELECT * FROM param_contenu where id='".str_replace($type."_#","",$row_donnees['contenu'])."'";

	$query_param_onglet  = mysql_query($req_param_onglet ,$connect);

	$row_param_onglet  = mysql_fetch_assoc($query_param_onglet);





	$req_onglet = "SELECT * FROM contenu_bloc where id_param='".str_replace($type."_#","",$row_donnees['contenu'])."' AND Status=1";

	$onglet  = mysql_query($req_onglet ,$connect);

	$onglet2  = mysql_query($req_onglet ,$connect);



	if($row_param_onglet['style'] == "accordion"){



	?>

      <script type="text/javascript">

$(document).ready(function() {

	$('.accordionButton').css({'background' : '<?php echo $row_param_onglet['couleur1']; ?>', 'color' : '<?php echo $row_param_onglet['texte1']; ?>', 'border' : '0px solid <?php echo $row_param_onglet['couleur2']; ?>'<?php if($row_param_onglet['taille_titre'] > 0){ ?>, 'font-size' : '<?php echo $row_param_onglet['taille_titre']; ?>px'<?php }?>});

	$('div.accordionButton').unbind("click");

	$('div.accordionButton').click(function(e) {
	$('div.accordionButton').find('.icon').html('+');
			$(this).find('.icon').html('-');

		$('div.accordionContent').slideUp('normal');

		$('div.accordionButton').css({'background' : '<?php echo $row_param_onglet['couleur1']; ?>', 'color' : '<?php echo $row_param_onglet['texte1']; ?>', 'border' : '0px solid <?php echo $row_param_onglet['couleur2']; ?>'<?php if($row_param_onglet['taille_titre'] > 0){ ?>, 'font-size' : '<?php echo $row_param_onglet['taille_titre']; ?>px'<?php }?>});

		$(this).next().slideDown('normal',function(){

			 <?php if($idsite == 50 && $id_page != 351){ ?>

      <?php if($session == 'ok'){ ?>

  $("#background_megamall").css("top","311px");

  if($("#tout").height() > $(window).height()){

	   $("#background_megamall").height($("#tout").height()-77);
	  }else{

  $("#background_megamall").height($(window).height()-77);

	  }

		<?php }else{  ?>



	if($("#tout").height() > $(window).height()){

	   $("#background_megamall").height($("#tout").height()-233);

	  }else{

  $("#background_megamall").height($(window).height()-233);

		  }

		<?php } ?>

		<?php } ?>


			});

		$(this).css({'background' : '<?php echo $row_param_onglet['couleur2']; ?>', 'color' : '<?php echo $row_param_onglet['texte2']; ?>', 'border' : '0px solid <?php echo $row_param_onglet['couleur2']; ?>'<?php if($row_param_onglet['taille_titre'] > 0){ ?>, 'font-size' : '<?php echo $row_param_onglet['taille_titre']; ?>px'<?php }?>});






		e.stopPropagation();


	});



$("div.accordionContent").hide();

$('div.accordionButton:first').css({'background' : '<?php echo $row_param_onglet['couleur2']; ?>', 'color' : '<?php echo $row_param_onglet['texte2']; ?>', 'border' : '0px solid <?php echo $row_param_onglet['couleur2']; ?>'<?php if($row_param_onglet['taille_titre'] > 0){ ?>, 'font-size' : '<?php echo $row_param_onglet['taille_titre']; ?>px'<?php }?>});

$("div.accordionContent:first").show();



});

</script>

      <?php if($valeur2 != ''){

	echo '<div class="dragbox ';



	if($row_donnees['partge'] == 1){echo 'bloc_share';}

	echo ' dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >';



if($row_donnees['partge'] == 1){echo '<div class="shareAccorOngl"><img src="'.SITEPATH.'images/social/facebook_16.png" width="16" height="16" title="facebook" /><img src="'.SITEPATH.'images/social/twitter_16.png" width="16" height="16" title="twitter" /><img src="'.SITEPATH.'images/social/google_16.png" width="16" height="16" title="google" /><img src="'.SITEPATH.'images/social/plus.png" width="16" height="16" title="plus" data-bloc="'.$valeur2.'" data-type="'.$type.'" /></div>';

}



			echo '<div class="dragbox-content '.$type.'">'; ?>

      <?php

			   while($row_onglet2 = mysql_fetch_assoc($onglet2)){ ?>

      <div class="accordionButton"><span>

        <?php echo utf8_encode(utf8_decode(stripslashes($row_onglet2['titre'.$lang_table])));?>

        </span><span class="icon"><?php if($ic == true){ echo '-'; $ic = false;}else{ echo '+';} ?></span></div>

      <div class="accordionContent">

        <?php

			  if($_SESSION['lang']== 'ar'){

			  echo stripslashes($row_onglet2['texte'.$lang_table]);

			  }else{

			  echo utf8_encode(stripslashes($row_onglet2['texte'.$lang_table]));

			  }?>

      </div>

      <?php } ?>

      <?php	echo '

			</div>

		</div>';



	}





		}else{



	$o = 1;

	$t = 1;



	?>

      <script type="text/javascript">

<!--

$(document).ready(function(){



	$("#tabsholder_<?php echo str_replace($type."_#","",$row_donnees['contenu']); ?>").tytabs({



							prefixtabs:"tabz",

							prefixcontent:"contentz",

							classcontent:"tabscontent",

							tabinit:"1",

							catchget:"tab1",

							fadespeed:"normal"

							});

});

-->

</script>

      <script language="javascript">

	$(document).ready(function(){

	$('#tabsholder_<?php echo str_replace($type."_#","",$row_donnees['contenu']); ?>').css({'border' : '1px solid <?php echo $row_param_onglet['couleur2']; ?>', 'border-radius' : '4px', 'padding' : '0.2em'});

	$('#tabsholder_<?php echo str_replace($type."_#","",$row_donnees['contenu']); ?> ul.tabs').css('border' , '1px solid <?php echo $row_param_onglet['couleur2']; ?>');

	$('#tabsholder_<?php echo str_replace($type."_#","",$row_donnees['contenu']); ?> ul.tabs li').css({'background' : '<?php echo $row_param_onglet['couleur1']; ?>', 'border' : '1px solid <?php echo $row_param_onglet['couleur1']; ?>'<?php if($row_param_onglet['taille_titre'] > 0){ ?>, 'font-size' : '<?php echo $row_param_onglet['taille_titre']; ?>px'<?php }?>});



	$('#tabsholder_<?php echo str_replace($type."_#","",$row_donnees['contenu']); ?> ul.tabs li').hover(function(){

		$(this).css({'background' : '<?php echo $row_param_onglet['couleur2']; ?>', 'border' : '1px solid <?php echo $row_param_onglet['couleur2']; ?>'})},function(){

		$(this).css({'background' : '<?php echo $row_param_onglet['couleur1']; ?>', 'border' : '1px solid <?php echo $row_param_onglet['couleur1']; ?>'})



		});



	$('#tabsholder_<?php echo str_replace($type."_#","",$row_donnees['contenu']); ?> ul.tabs li.current').hover(function(){

		$(this).css({'background' : '<?php echo $row_param_onglet['couleur2']; ?>', 'border' : '1px solid <?php echo $row_param_onglet['couleur2']; ?>'})},function(){

		$(this).css({'background' : '<?php echo $row_param_onglet['couleur2']; ?>', 'border' : '1px solid <?php echo $row_param_onglet['couleur2']; ?>'})



		});



	});

	</script>

      <style type="text/css">



#tabsholder_<?php echo str_replace($type."_#","",$row_donnees['contenu']); ?> ul.tabs li {

background:<?php echo $row_param_onglet['couleur1']; ?> !important;

border:1px solid <?php echo $row_param_onglet['couleur1']; ?> !important;

}

#tabsholder_<?php echo str_replace($type."_#","",$row_donnees['contenu']); ?> ul.tabs li.current {

background:<?php echo $row_param_onglet['couleur2']; ?> !important;

border:1px solid <?php echo $row_param_onglet['couleur2']; ?> !important;

box-shadow: 0 0 1px #000000;

}



-->

</style>

      <?php if($valeur2 != ''){

	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content '.$type.'">'; ?>

      <div id="tabsholder_<?php echo str_replace($type."_#","",$row_donnees['contenu']); ?>">

        <ul class="tabs">

          <?php while($row_onglet = mysql_fetch_assoc($onglet)){ ?>

          <li id="tabz<?php echo $t;  ?>">

            <?php

				  if($_SESSION['lang']== 'ar'){

				  echo $row_onglet['titre'.$lang_table];

				  }else{

				  echo utf8_encode($row_onglet['titre'.$lang_table]);

				  }?>

          </li>

          <?php $t++;} ?>

        </ul>

        <div class="contents marginbot">

          <?php while($row_onglet2 = mysql_fetch_assoc($onglet2)){  ?>

          <div id="contentz<?php echo $o;  ?>" class="tabscontent">

            <?php

				  if($_SESSION['lang']== 'ar'){

				  echo stripslashes($row_onglet2['texte'.$lang_table]);

				  }else{

				  echo utf8_encode(stripslashes($row_onglet2['texte'.$lang_table]));

				  }?>

          </div>

          <?php $o++;}?>

        </div>

      </div>

      <?php	echo '

			</div>

		</div>';




	}

	}

}else if($type == 'Panier'){


	echo '<div class="dragbox ';



	if($affiche_article != 'groupe' && $row_donnees['partge'] == 1){echo 'bloc_share';}

	echo ' dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >';



	if($row_donnees['partge'] == 1){echo '<div class="shareCatalogue"><img src="'.SITEPATH.'images/social/facebook_16.png" width="16" height="16" title="facebook" /><img src="'.SITEPATH.'images/social/twitter_16.png" width="16" height="16" title="twitter" /><img src="'.SITEPATH.'images/social/google_16.png" width="16" height="16" title="google" /><img src="'.SITEPATH.'images/social/plus.png" width="16" height="16" title="plus" data-bloc="'.$valeur2.'" data-type="'.$type.'" /></div>';

	}

			echo '<div class="dragbox-content '.$type.'">';





	include ("modules/Catalogue/panier.php");





		 echo '

			</div>

		</div>';


}else if($type == 'Catalogue'){



		if(isset($_GET['produit']) && !empty($_GET['produit'])){

		$Produit=mysql_escape_string(($_GET['produit']));

			$articles = "SELECT * FROM produit where id='$Produit' AND id_param='".str_replace("Catalogue_#","",$row_donnees['contenu'])."' AND status=1";

			$req_articles = mysql_query($articles ,$connect);

			$row_articles = mysql_fetch_assoc($req_articles);

			$affiche_article = "no_groupe";







		}else{



			$ordre="";

	if(isset($_POST['ordre']) && $_POST['ordre']=="decoissant"){

	$ordre="ORDER BY Prix DESC";

	}else if(isset($_POST['ordre']) && $_POST['ordre']=="coissant"){

	$ordre="ORDER BY Prix ASC";

	}



			$req_articles = "SELECT * FROM produit where id_param='".str_replace("Catalogue_#","",$row_donnees['contenu'])."' AND status=1 $ordre";

			$articles  = mysql_query($req_articles ,$connect);

			$nbr_articles=mysql_num_rows($articles);









	$affiche_article = "groupe";

			}



		$req_param = "SELECT * FROM param_catalogue where id='".str_replace("Catalogue_#","",$row_donnees['contenu'])."'";

	$param_blog  = mysql_query($req_param ,$connect);

	$row_param_blog  = mysql_fetch_assoc($param_blog);

	$point_fidelite = $row_param_blog['point_fidelite'];

	$show_tri = $row_param_blog['show_tri'];

	$show_desc = $row_param_blog['show_desc'];





	$req_devise = "SELECT devise FROM site where id_site='".$idsite."'";

	$param_devise  = mysql_query($req_devise ,$connect_m);

	$row_param_devise  = mysql_fetch_assoc($param_devise);

	$Devise = $row_param_devise['devise'];





	if($point_fidelite == 1){

		$Devise = 'Points';

		}

	$show_detail = $row_param_blog['show_detail'];



	if($row_param_blog['style'] == 1){



		if($row_param_blog['Nbr_articles'] < 1){

		$nbr_Produits_page = 10 ;

		}else{

	$nbr_Produits_page = $row_param_blog['Nbr_articles'];

		}

		$type_catalogue = 1;

		$width_item = 100;

		$row_catalogue = 1;





	}else{

		if($row_param_blog['largeur']<1){



			$row_catalogue = 5;

			}else{

				$row_catalogue = $row_param_blog['largeur'];

				}

	if($row_param_blog['hauteur']<1){

			$ligne_catalogue = 5;

			}else{

				$ligne_catalogue = $row_param_blog['hauteur'];

				}

		$nbr_Produits_page = $row_catalogue*$ligne_catalogue;

		$width_item = (100-(2*($row_catalogue-1)))/$row_catalogue;

		if($row_catalogue == 1){

			$width_item = 100;

			}

		$type_catalogue = 2;



		}

	?>

      <script language="javascript">

	$(document).ready(function(){

	$('.catalogue-item').css({'width' : '<?php echo $width_item; ?>%' <?php if($type_catalogue != 1){ ?>,'paddingTop' : '8px', 'paddingBottom' : '30px'<?php } ?><?php if($row_catalogue == 1){?>,'marginRight' : '0'<?php }?>});



	});

	</script>

      <script type="text/javascript">

$(document).ready(function() {

	$("ul.pagination").quickPagination({pagerLocation:"bottom",pageSize:"<?php echo $nbr_Produits_page; ?>"});

});

</script>

      <?php	 echo '<div class="dragbox ';



	if($affiche_article != 'groupe' && $row_donnees['partge'] == 1){echo 'bloc_share';}

	echo ' dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >';



	if($row_donnees['partge'] == 1){echo '<div class="shareCatalogue"><img src="'.SITEPATH.'images/social/facebook_16.png" width="16" height="16" title="facebook" /><img src="'.SITEPATH.'images/social/twitter_16.png" width="16" height="16" title="twitter" /><img src="'.SITEPATH.'images/social/google_16.png" width="16" height="16" title="google" /><img src="'.SITEPATH.'images/social/plus.png" width="16" height="16" title="plus" data-bloc="'.$valeur2.'" data-type="'.$type.'" /></div>';

	}

			echo '<div class="dragbox-content '.$type.'">';





		if(isset($_GET['panier2']) && empty($_GET['panier2'])){





				include 'detail_panier_cad.php';



			}else{



	include 'modules/Catalogue/catal.php';

				}

		 echo '

			</div>

		</div>';

		}else if($type == 'Annonce'){



		if(isset($_GET['annonce']) && !empty($_GET['annonce'])){

		$annonce=mysql_escape_string(($_GET['annonce']));

			$articles = "SELECT * FROM annonces where id='$annonce' AND id_param='".str_replace("Annonce_#","",$row_donnees['contenu'])."' AND status=1";

			$req_articles = mysql_query($articles ,$connect);

			$row_articles = mysql_fetch_assoc($req_articles);

			$affiche_article = "no_groupe";







		}else{





			$req_articles = "SELECT * FROM annonces where id_param='".str_replace("Annonce_#","",$row_donnees['contenu'])."' AND status=1 $ordre";

			$articles  = mysql_query($req_articles ,$connect);

			$nbr_articles=mysql_num_rows($articles);









	$affiche_article = "groupe";

			}



		$req_param = "SELECT * FROM param_annonce where id='".str_replace("Annonce_#","",$row_donnees['contenu'])."'";

	$param_blog  = mysql_query($req_param ,$connect);

	$row_param_blog  = mysql_fetch_assoc($param_blog);

	$Devise = $row_param_blog['Devise'];



	if($row_param_blog['style'] == 1){



		if($row_param_blog['Nbr_articles'] < 1){

		$nbr_Produits_page = 10 ;

		}else{

	$nbr_Produits_page = $row_param_blog['Nbr_articles'];

		}

		$type_catalogue = 1;

		$width_item = 100;

		$row_catalogue = 1;





	}else{

		if($row_param_blog['largeur']<1){



			$row_catalogue = 5;

			}else{

				$row_catalogue = $row_param_blog['largeur'];

				}

	if($row_param_blog['hauteur']<1){

			$ligne_catalogue = 5;

			}else{

				$ligne_catalogue = $row_param_blog['hauteur'];

				}

		$nbr_Produits_page = $row_catalogue*$ligne_catalogue;

		$width_item = (100-(2*($row_catalogue-1)))/$row_catalogue;

		if($row_catalogue == 1){

			$width_item = 100;

			}

		$type_catalogue = 2;



		}

	?>

      <script language="javascript">

	$(document).ready(function(){

	$('.catalogue-item').css({'width' : '<?php echo $width_item; ?>%' <?php if($type_catalogue != 1){ ?>,'paddingTop' : '8px', 'paddingBottom' : '8px'<?php } ?><?php if($row_catalogue == 1){?>,'marginRight' : '0'<?php }?>});



	});

	</script>

      <script type="text/javascript">

$(document).ready(function() {

	$("ul.pagination").quickPagination({pagerLocation:"bottom",pageSize:"<?php echo $nbr_Produits_page; ?>"});

	$('#thumb_annonce a').lightBox();

	$('.galerie_annonce a.view_annonce').click(function(){

		$this = this;

		$('img#view_annonce').attr('src','<?php echo SITEPATH; ?>uploads/site_<?php echo $idsite; ?>/annonce/min/'+$($this).attr('title'));

		$('#thumb_annonce a').attr('href','<?php echo SITEPATH; ?>uploads/site_<?php echo $idsite; ?>/annonce/min/'+$($this).attr('title'));





	});



	 $('#nom_prenom_annonce').focus(function() {

        if($(this).val() == $(this).data('default_val') || !$(this).data('default_val')) {

            $(this).data('default_val', $(this).val());

            $(this).val('');

        }

    });



    $('#nom_prenom_annonce').blur(function() {

        if ($(this).val() == '') $(this).val($(this).data('default_val'));

    });



	$('#email_annonce').focus(function() {

        if($(this).val() == $(this).data('default_val') || !$(this).data('default_val')) {

            $(this).data('default_val', $(this).val());

            $(this).val('');

        }

    });



    $('#email_annonce').blur(function() {

        if ($(this).val() == '') $(this).val($(this).data('default_val'));

    });



	$('#infos_annonce').focus(function() {

        if($(this).val() == $(this).data('default_val') || !$(this).data('default_val')) {

            $(this).data('default_val', $(this).val());

            $(this).val('');

        }

    });



    $('#infos_annonce').blur(function() {

        if ($(this).val() == '') $(this).val($(this).data('default_val'));

    });



$('#form_annonce').submit(function() {



	nom_annonce = $('#nom_prenom_annonce').val();

	email_annonce = $('#email_annonce').val();

	infos_annonce = $('#infos_annonce').val();

	email_annonceur = $('#email_annonceur').val();

	id_annonceur = $('#id_annonceur').val();





	if(nom_annonce == '' || nom_annonce == 'Nom et Prénom :'){

		$('#nom_prenom_annonce').css('border-color','red');

		}else{

		$('#nom_prenom_annonce').css('border-color','#cecece');

			}

	if(email_annonce == '' || email_annonce == 'Votre Email :'){

		$('#email_annonce').css('border-color','red');

		}else{

		$('#email_annonce').css('border-color','#cecece');

			}



	if(infos_annonce == '' || infos_annonce == 'Votre message (Toute informations nécessaires avec votre numéro de téléphone) :'){



		$('#infos_annonce').css('border-color','red');

		}else{

		$('#infos_annonce').css('border-color','#cecece');

			}

		if(nom_annonce != '' && nom_annonce != 'Nom et Prénom :' && email_annonce != '' && email_annonce != 'Votre Email :' && infos_annonce != '' && infos_annonce != 'Votre message (Toute informations nécessaires avec votre numéro de téléphone) :'){

			$('#wait').show();



			var order = 'id='+id_annonceur+'email_annonceur='+email_annonceur+'&nom='+nom_annonce+'&email='+email_annonce+'&infos='+infos_annonce;

			$.post("<?php echo SITEPATH; ?>envoi_annonce.php", order, function(theResponse){

	$('#nom_prenom_annonce').val('Nom et Prénom :');

	$('#email_annonce').val('Votre Email :');

	$('#infos_annonce').val('Votre message (Toute informations nécessaires avec votre numéro de téléphone) :');



			$('#wait').hide();

		$("#succes_annonce").dialog('open');



			});



		}



return false;

});



	$("#succes_annonce").dialog({

		autoOpen: false,

		height: 200,

		width: 300,

		modal: true,

		draggable:true,

		buttons: {

			"Fermer"	: function() {

				$(this).dialog('close');

			}

		},

		open: function(event, ui){},

		close: function() {}

	});









});

</script>

      <?php

	echo '<div class="dragbox ';



	if($affiche_article != 'groupe' && $row_donnees['partge'] == 1){echo 'bloc_share';}

	echo ' dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >';

	if($row_donnees['partge'] == 1){echo '<div class="shareAnnonce"><img src="'.SITEPATH.'images/social/facebook_16.png" width="16" height="16" title="facebook" /><img src="'.SITEPATH.'images/social/twitter_16.png" width="16" height="16" title="twitter" /><img src="'.SITEPATH.'images/social/google_16.png" width="16" height="16" title="google" /><img src="'.SITEPATH.'images/social/plus.png" width="16" height="16" title="plus" data-bloc="'.$valeur2.'" data-type="'.$type.'" /></div>';

	}

			echo '<div class="dragbox-content '.$type.'">';

		?>

      <?php if($affiche_article == 'groupe'){ ?>

      <div id="block">

        <ul class="pagination">

          <?php if($nbr_Produits_page>0){

	$nbr = 1;

	if($type_catalogue == 2){

	while($row_articles  = mysql_fetch_assoc($articles)){



	$gal="SELECT * FROM photo_annonce where id_annonce='".$row_articles['id']."' AND Couverture = '1' LIMIT 1";

	$req_gal = mysql_query($gal ,$connect);

	$row_galerie  = mysql_fetch_assoc($req_gal);



	?>

          <li class="catalogue-item" style="<?php if($nbr == $row_catalogue && $row_catalogue > 1){ $nbr = 0; ?>margin-right:0px;<?php } ?><?php if($nbr ==  1){ ?>margin-left:0px;<?php } ?>">

            <div class="catalogue-title">

              <h3> <?php echo $row_articles['Nom'.$lang_table];?> </h3>

            </div>

            <div class="catalogue-preview">

              <?php if($row_galerie['Image'] != ''){ ?>

              <img src="<?php echo SITEPATH; ?>uploads/site_<?php echo $idsite; ?>/annonce/min/<?php echo $row_galerie['Image']?>" />

              <?php }else{ ?>

              <img src="<?php echo SITEPATH; ?>images/no_image.png" />

              <?php } ?>

            </div>

            <div class="catalogue_content">

              <div class="blog-text" style="margin-bottom: 3px;">

                <?php

			echo cleanCut(stripslashes(str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',strip_tags($row_articles['Description'.$lang_table]))),40);

		?>

              </div>

              <?php if($row_articles['show_prix']){?>

              <?php echo PRICE; ?> : <span class="signature"><?php echo $row_articles['Prix'].' '.$Devise; ?></span>

              <?php }?>

              <br />

              <a class="read-more" href="<?php echo get_name_page($idsite,$id_page); ?>&annonce=<?php echo $row_articles['id']?><?php echo $lien_plus; ?>"><?php echo DETAILS; ?> »</a> </div>

          </li>

          <?php

$nbr = $nbr+1;

}

}else{ ?>

          <?php

while($row_articles  = mysql_fetch_assoc($articles)){





	$gal="SELECT * FROM photo_annonce where id_annonce='".$row_articles['id']."' AND Couverture = '1' LIMIT 1";

	$req_gal = mysql_query($gal ,$connect);

	$row_galerie  = mysql_fetch_assoc($req_gal);

	?>

          <li class="catalogue-item">

            <table width="100%" border="0" >

              <tr>

                <td width="20%" rowspan="4" valign="top"><div class="catalogue-preview">

                    <?php if($row_galerie['Image'] != ''){ ?>

                    <img src="<?php echo SITEPATH; ?>uploads/site_<?php echo $idsite; ?>/annonce/min/<?php echo $row_galerie['Image']?>" />

                    <?php }else{ ?>

                    <img src="<?php echo SITEPATH; ?>images/no_image.png" />

                    <?php } ?>

                  </div></td>

                <td rowspan="4" width="2%">&nbsp;</td>

                <td width="70%" height="20" valign="top"><h3>

                    <?php

				echo $row_articles['Nom'.$lang_table]; ?>

                  </h3></td>

              </tr>

              <tr>

                <td height="20" valign="top"><?php if($row_articles['show_prix']){?>

                  <?php echo PRICE; ?> : <span class="signature"><?php echo $row_articles['Prix'].' '.$Devise?></span>

                  <?php }?></td>

              </tr>

              <tr>

                <td valign="top"><?php

		echo cleanCut(stripslashes(str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',strip_tags($row_articles['Description'.$lang_table]))),150);?></td>

              </tr>

              <tr>

                <td align="right" valign="bottom"><a class="read-more" href="<?php echo get_name_page($idsite,$id_page); ?>&annonce=<?php echo $row_articles['id']?><?php echo $lien_plus; ?>"><?php echo DETAILS; ?> »</a></td>

              </tr>

            </table>

            <hr />

          </li>

          <?php }

?>

          <?php

}

}?>

        </ul>

      </div>

      <?php }else{



	  $gal="SELECT * FROM photo_annonce where id_annonce='".$row_articles['id']."' AND Couverture = '1' LIMIT 1";

	$req_gal = mysql_query($gal ,$connect);

	$row_galerie  = mysql_fetch_assoc($req_gal);



	 $gal2="SELECT * FROM photo_annonce where id_annonce='".$row_articles['id']."'";

	$req_gal2 = mysql_query($gal2 ,$connect);

	$row_galerie2  = mysql_fetch_assoc($req_gal2);



	$options ="SELECT * FROM options_annonce  where id_annonce='".$row_articles['id']."' ORDER by id";

	$req_options = mysql_query($options ,$connect);

	$row_options  = mysql_fetch_assoc($req_options);

	$num_options  = mysql_num_rows($req_options);





	$req_options2 = mysql_query($options ,$connect);

	$row_options2  = mysql_fetch_assoc($req_options2);



	  ?>

      <div id="block_catalogue">

        <table width="100%" border="0">

          <tr>

            <td colspan="2" id="thumb_annonce" align="center"><?php if($row_galerie['Image'] != ''){ ?>

              <a href="<?php echo SITEPATH; ?>uploads/site_<?php echo $idsite; ?>/annonce/min/<?php echo $row_galerie['Image']?>"> <img id="view_annonce" src="<?php echo SITEPATH; ?>uploads/site_<?php echo $idsite; ?>/annonce/min/<?php echo $row_galerie['Image']?>" style="width:60%" /> </a>

              <?php }else{ ?>

              <a href="<?php echo SITEPATH; ?>images/no_image.png"> <img id="view_annonce" src="<?php echo SITEPATH; ?>images/no_image.png" style="width:60%" /> </a>

              <?php } ?></td>

          </tr>

          <tr>

            <td colspan="2"><table align="center"  class="galerie_annonce">

                <tr>

                  <?php do{ ?>

                    <td width="100" align="center"><a href="javascript:void(0)" class="view_annonce" title="<?php echo $row_galerie2['Image']?>"> <img src="<?php echo SITEPATH; ?>uploads/site_<?php echo $idsite; ?>/annonce/min/<?php echo $row_galerie2['Image']?>" style="width:100%" /></a></td>

                    <?php }while($row_galerie2  = mysql_fetch_assoc($req_gal2)); ?>

                </tr>

              </table></td>

          </tr>

          <tr>

            <td><h3>

                <?php

				echo $row_articles['Nom'.$lang_table];?>

              </h3></td>

            <td align="right"><?php if($row_articles['show_prix'] == 1){?>

              <h3> <?php echo PRICE; ?> : <span class="signature"><?php echo $row_articles['Prix'].' '.$Devise?></span></h3>

              <?php } ?></td>

          </tr>

          <tr>

            <td valign="top" colspan="2"><div class="blog-text">

                <?php

			echo stripslashes($row_articles['Description'.$lang_table]);?>

              </div></td>

          </tr>

          <?php if($num_options > 0){ ?>

          <tr>

            <td colspan="2"><table width="100%">

                <tr>

                  <?php do{ ?>

                    <td width="20%" align="center" bgcolor="#999999" style="padding:5px 0;"><?php echo $row_options['libelle']; ?></td>

                    <?php }while($row_options  = mysql_fetch_assoc($req_options)); ?>

                </tr>

                <tr>

                  <?php do{ ?>

                    <td width="20%" align="center" valign="middle" height="20" style="border:1px solid #999999"><?php echo $row_options2['valeur']; ?></td>

                    <?php }while($row_options2  = mysql_fetch_assoc($req_options2)); ?>

                </tr>

              </table></td>

          </tr>

          <?php }?>

          <?php if($row_articles['show_map'] == 1){

		   $coordonee = explode ("_#_", $row_articles['lien_map']) ;



		$lat = $coordonee[0];

		$lng = $coordonee[1];

		   ?>

          <tr>

            <td colspan="2"><h3>Localisation</h3></td>

          </tr>

          <tr>

            <td colspan="2"><iframe frameborder="0" style="width:100%; height:300px" scrolling="no" src="<?php echo SITEPATH; ?>modules/gmap/gmap.php?lat=<?php echo $lat; ?>&lng=<?php echo $lng; ?>"></iframe></td>

          </tr>

          <?php }?>

          <?php if($row_articles['show_form'] == 1){

		   $email_annonceur =  $row_articles['Email'];

		   $id_annonceur =  $row_articles['id'];

		   ?>

          <tr>

            <td colspan="2"><h3>Nous contacter</h3></td>

          </tr>

          <tr>

            <td colspan="2"><p>Nous somme a votre disposition pour toute informations supplémentaire. Veuillez remplir le formulaire ci-dessous.</p>

              <form method="post" class="form_annonce" id="form_annonce">

                <input type="text" name="nom_prenom_annonce" id="nom_prenom_annonce" value="Nom et Prénom :" class="texte_left" />

                <input type="text" name="email_annonce" id="email_annonce" value="Votre Email :" class="texte_right" />

                <textarea name="infos_annonce" id="infos_annonce" class="texte_middle">Votre message (Toute informations nécessaires avec votre numéro de téléphone) :</textarea>

                <input type="hidden" name="email_annonceur" id="email_annonceur" value="<?php echo  $email_annonceur; ?>" />

                <input type="hidden" name="id_annonceur" id="id_annonceur" value="<?php echo  $id_annonceur; ?>" />

                <input class="send" type="submit" value="Envoyer" style="float:left;">

                <div id="wait"><img src="img/progress.gif" width="27" /></div>

              </form>

              <div id="succes_annonce" title="Contact Annonce">

                <p>Merci<br />

                  On a bien recu votre message concerant l'annonce

                  <?php

				echo $row_articles['Nom'.$lang_table];?>

                  .</p>

              </div></td>

          </tr>

          <?php }?>

          <tr>

            <td colspan="2" align="right"><a href="<?php echo get_name_page($idsite,$id_page); ?><?php echo $lien_plus; ?>"><< <?php echo BACK_ANNONCE; ?></a></td>

          </tr>

        </table>

      </div>

      <?php } ?>

      <?php echo '

			</div>

		</div>';






	}else if($type == 'Flux_annonce'){





		$param_flux_annonce = "SELECT * FROM param_flux_annonce where id='".str_replace("Flux_annonce_#","",$row_donnees['contenu'])."'";

		$query_param_flux_annonce  = mysql_query($param_flux_annonce ,$connect);

		$row_param_flux_annonce=mysql_fetch_assoc($query_param_flux_annonce);

		$nbr_param_flux_annonce=mysql_num_rows($query_param_flux_annonce);



	 	$flux_annonce = "SELECT f.*,a.* FROM flux_annonce f,annonces a where f.id_flux ='".str_replace("Flux_annonce_#","",$row_donnees['contenu'])."' AND f.id_annonce = a.id";

		$query_flux_annonce  = mysql_query($flux_annonce ,$connect);

		$row_flux_annonce  = mysql_fetch_assoc($query_flux_annonce);

		$num_flux_annonce  = mysql_num_rows($query_flux_annonce);



		$nbr_column = $row_param_flux_annonce['Nbr_articles'];

		$nbr_ligne  = $row_param_flux_annonce['Nbr_articles2'];

		$nbr_Produits_page = $nbr_column*$nbr_ligne;

		$width_item = (100 - (5*($nbr_column-1)))/$nbr_column;

		if($nbr_column == 1){

		$width_item = 100;

		}









	?>

      <script language="javascript">

$(document).ready(function(){

$('ul.pagination_<?php echo $valeur2; ?>,#pagination_<?php echo $valeur2; ?> li').css({'display' : 'inline' ,'padding' : '0', 'margin' : '0'});



$('ul.pagination_<?php echo $valeur2; ?> .catalogue-item').css({'marginRight' : '4.2%' ,'width' : '<?php echo $width_item; ?>%', 'display' : 'inline-block', 'list-style' : 'none', 'marginBottom' : '10px'<?php if($num_flux_annonce == 1){ ?>,'marginRight':'0'<?php } ?>});



$('ul.pagination_<?php echo $valeur2; ?> .last_item').css('marginRight','0');

$('ul.pagination_<?php echo $valeur2; ?> .first_item').css('marginLeft','0');



$('ul.pagination_<?php echo $valeur2; ?> .catalogue-item .catalogue-title h3').css({'color' : '<?php echo $row_param_flux_annonce['couleur_titre']; ?>' ,'font-size' : '<?php echo $row_param_flux_annonce['taille_titre']; ?>px'});



$('ul.pagination_<?php echo $valeur2; ?> .catalogue-item a.read-more').css({'float' : 'left' ,'paddingTop' : '4px','paddingBottom' : '4px','paddingLeft' : '6px','paddingRight' : '6px', 'border-radius' : '3px', 'font-weight' : 'bold', 'color' : '<?php echo $row_param_flux_annonce['couleur_texte']; ?>', 'background' : '<?php echo $row_param_flux_annonce['couleur_font']; ?>', 'border' : '1px solid <?php echo $row_param_flux_annonce['couleur_font']; ?>', 'font-size' : '<?php echo $row_param_flux_annonce['taille_lien']; ?>px'});



$('ul.pagination_<?php echo $valeur2; ?> .catalogue-item a.read-more').hover(function(){



	$(this).css({ 'color' : '<?php echo $row_param_flux_annonce['couleur_font']; ?>', 'background' : '<?php echo $row_param_flux_annonce['couleur_texte']; ?>'});



},function(){



	$(this).css({ 'color' : '<?php echo $row_param_flux_annonce['couleur_texte']; ?>', 'background' : '<?php echo $row_param_flux_annonce['couleur_font']; ?>'});



});



});

</script>

      <script type="text/javascript">

$(document).ready(function() {

	$("ul.pagination_<?php echo $valeur2; ?>").quickPagination({pagerLocation:"bottom",pageSize:"<?php echo $nbr_Produits_page; ?>"});

});

</script>

      <?php

	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content '.$type.'">';

		?>

      <div id="block">

        <ul class="pagination_<?php echo $valeur2; ?>">

          <?php

	$nbr = 1;

	do{



	$gal="SELECT * FROM photo_annonce where id_annonce='".$row_flux_annonce['id']."' AND Couverture = '1' LIMIT 1";

	$req_gal = mysql_query($gal ,$connect);

	$row_galerie  = mysql_fetch_assoc($req_gal);



	?>

          <li class="catalogue-item <?php if($nbr == $nbr_column){ $nbr = 0; ?>last_item<?php } ?><?php if($nbr ==  1){ ?>first_item<?php } ?>">

            <div class="catalogue-title">

              <h3>

                <?php

					  echo $row_flux_annonce['Nom'.$lang_table];?>

              </h3>

            </div>

            <div class="catalogue-preview">

              <?php if($row_galerie['Image'] != ''){ ?>

              <img src="<?php echo SITEPATH; ?>uploads/site_<?php echo $idsite; ?>/annonce/min/<?php echo $row_galerie['Image']?>" />

              <?php }else{ ?>

              <img src="<?php echo SITEPATH; ?>images/no_image.png" />

              <?php } ?>

            </div>

            <div class="catalogue_content">

              <div class="blog-text">

                <?php

			echo cleanCut(stripslashes(str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',strip_tags($row_flux_annonce['Description'.$lang_table]))),40);

		?>

              </div>

              <a class="read-more" href="<?php echo get_name_page($idsite,$row_flux_annonce['id_page']); ?>&annonce=<?php echo $row_flux_annonce['id'].$lien_plus; ?>">» <?php echo $row_param_flux_annonce['texte_detail']; ?></a> </div>

          </li>

          <?php

$nbr = $nbr+1;

}while($row_flux_annonce  = mysql_fetch_assoc($query_flux_annonce));

?>

        </ul>

      </div>

      <?php echo '

			</div>

		</div>';


}else if($type == 'Flux_catalogue'){







		$param_flux_catalogue = "SELECT * FROM param_flux_catalogue where id='".str_replace("Flux_catalogue_#","",$row_donnees['contenu'])."'";

		$query_param_flux_catalogue  = mysql_query($param_flux_catalogue ,$connect);

		$row_param_flux_catalogue=mysql_fetch_assoc($query_param_flux_catalogue);

		$nbr_param_flux_catalogue=mysql_num_rows($query_param_flux_catalogue);



	 	$flux_catalogue = "SELECT f.*,a.* FROM flux_catalogue f,produit a where f.id_flux ='".str_replace("Flux_catalogue_#","",$row_donnees['contenu'])."' AND f.id_catalogue = a.id";

		$query_flux_catalogue  = mysql_query($flux_catalogue ,$connect);

		$row_flux_catalogue  = mysql_fetch_assoc($query_flux_catalogue);

		$num_flux_catalogue  = mysql_num_rows($query_flux_catalogue);



		$nbr_column_catalogue = $row_param_flux_catalogue['Nbr_articles'];

		$nbr_ligne_catalogue  = $row_param_flux_catalogue['Nbr_articles2'];

		$nbr_Produits_page_catalogue = $nbr_column_catalogue*$nbr_ligne_catalogue;

		$width_item_catalogue = (100 - (5*($nbr_column_catalogue-1)))/$nbr_column_catalogue;

		if($nbr_column_catalogue == 1){

		$width_item_catalogue = 100;

		}





	?>

      <script language="javascript">

$(document).ready(function(){

$('ul.pagination_<?php echo $valeur2; ?>,#pagination_<?php echo $valeur2; ?> li').css({'display' : 'inline' ,'padding' : '0', 'margin' : '0'});



$('ul.pagination_<?php echo $valeur2; ?> .catalogue-item').css({'marginRight' : '4.2%' ,'width' : '<?php echo $width_item_catalogue; ?>%', 'display' : 'inline-block', 'list-style' : 'none', 'marginBottom' : '10px'<?php if($num_flux_catalogue == 1){ ?>,'marginRight':'0'<?php } ?>});



$('ul.pagination_<?php echo $valeur2; ?> .last_item').css('marginRight','0');

$('ul.pagination_<?php echo $valeur2; ?> .first_item').css('marginLeft','0');



$('ul.pagination_<?php echo $valeur2; ?> .catalogue-item .catalogue-title h3').css({'color' : '<?php echo $row_param_flux_catalogue['couleur_titre']; ?>' ,'font-size' : '<?php echo $row_param_flux_catalogue['taille_titre']; ?>px'});



$('ul.pagination_<?php echo $valeur2; ?> .catalogue-item a.read-more').css({'float' : 'left' ,'paddingTop' : '4px','paddingBottom' : '4px','paddingLeft' : '6px','paddingRight' : '6px', 'border-radius' : '3px', 'font-weight' : 'bold', 'color' : '<?php echo $row_param_flux_catalogue['couleur_texte']; ?>', 'background' : '<?php echo $row_param_flux_catalogue['couleur_font']; ?>', 'border' : '1px solid <?php echo $row_param_flux_catalogue['couleur_font']; ?>', 'font-size' : '<?php echo $row_param_flux_catalogue['taille_lien']; ?>px'});



$('ul.pagination_<?php echo $valeur2; ?> .catalogue-item a.read-more').hover(function(){



	$(this).css({ 'color' : '<?php echo $row_param_flux_catalogue['couleur_font']; ?>', 'background' : '<?php echo $row_param_flux_catalogue['couleur_texte']; ?>'});



},function(){



	$(this).css({ 'color' : '<?php echo $row_param_flux_catalogue['couleur_texte']; ?>', 'background' : '<?php echo $row_param_flux_catalogue['couleur_font']; ?>'});



});



});

</script>

      <script type="text/javascript">

$(document).ready(function() {

	$("ul.pagination_<?php echo $valeur2; ?>").quickPagination({pagerLocation:"bottom",pageSize:"<?php echo $nbr_Produits_page_catalogue; ?>"});

});

</script>

      <?php

	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content '.$type.'">';

		?>

      <div id="block">

        <ul class="pagination_<?php echo $valeur2; ?>">

          <?php

	$nbr_catalogue = 1;

	do{



	?>

            <li class="catalogue-item <?php if($nbr_catalogue == $nbr_column_catalogue){ $nbr_catalogue = 0; ?>last_item<?php } ?><?php if($nbr_catalogue ==  1){ ?>first_item<?php } ?>">

              <div class="catalogue-title">

                <h3>

                  <?php

					  echo $row_flux_catalogue['Nom'.$lang_table];?>

                </h3>

              </div>

              <div class="catalogue-preview">

                <?php if($row_flux_catalogue['Image_thumb'] != ''){ ?>

                <img src="<?php echo $row_flux_catalogue['Image_thumb']; ?>" />

                <?php }else{ ?>

                <img src="<?php echo SITEPATH; ?>images/no_image.png" />

                <?php } ?>

              </div>

              <div class="catalogue_content">

                <div class="blog-text">

                  <?php

		echo cleanCut(utf8_encode(stripslashes(str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',strip_tags($row_flux_catalogue['Description'.$lang_table])))),40);

		?>

                </div>

                <a class="read-more" href="<?php echo get_name_page($idsite,$row_flux_catalogue['id_page']); ?>&produit=<?php echo $row_flux_catalogue['id'].$lien_plus; ?>">» <?php echo $row_param_flux_catalogue['texte_detail']; ?></a> </div>

            </li>

            <?php

$nbr_catalogue = $nbr_catalogue+1;

}while($row_flux_catalogue  = mysql_fetch_assoc($query_flux_catalogue));

?>

        </ul>

      </div>

      <?php echo '

			</div>

		</div>';

	}else if($type == 'Slider'){

		if($valeur2 != ''){

	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content '.$type.'">';





			include('modules/slider_bloc/slider.php');



			echo '

			</div>

		</div>';


	}



	}else if($type == 'SondageFiltre'){



		$theme_sondage = 0;



		if(isset($_POST['filtrePoll'])){

	$theme_sondage = 1;

	$idPoll = str_replace("Sondage_#","",$_POST['filtrePoll']);



	$queryPoll  = "SELECT * FROM question_sondage  WHERE id_theme = " . $_POST['filtrePoll'] . " ";

	$resultPoll = mysql_query($queryPoll);

	$donnePoll = mysql_fetch_array($resultPoll);



		}else if($row_donnees['contenu'] != ''){

			$idPoll = str_replace("Sondage_#","",$row_donnees['contenu']);

	$queryPoll  = "SELECT securise,type,id FROM parametres_sondage  WHERE id = " . $idPoll . " ";

	$resultPoll = mysql_query($queryPoll);

	$donnePoll = mysql_fetch_array($resultPoll);

		}else{

	$queryPoll  = "SELECT q.id AS id_question,s.id AS idPoll,p.id_site FROM parametres_sondage s,pages p,question_sondage q  WHERE p.id = s.id_page AND s.id = q.id_sondage AND s.type = 1 AND  p.id_site = " . $idsite . " ORDER BY rand() LIMIT 1";

	$resultPoll = mysql_query($queryPoll);

	$donnePoll = mysql_fetch_array($resultPoll);

	$idPoll = $donnePoll['id_question'];

		}

		if($valeur2 != ''){

	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content '.$type.'">';





		?>

      <?php if($donnePoll['securise'] == 1 && (!isset($_SESSION['nom_acces']) || $_SESSION['nom_acces'] == '')){ ?>

      <script type="text/javascript">

$(document).ready(function(){



$('#signupp').click(function()

{

$('#option_acces').val('signup');

$('#password').value='';

$('.login_block').hide();

$('.signup_block').show();

$('#email').removeClass("log");

$('#password').removeClass("password");

$('#nom_prenom').addClass("required");

$('#tel').addClass("number required");

$('#date_naissance').addClass("date required");

});

$('#loginn').click(function(){

$('#option_acces').val('login');

$('#password').value='';

$('.signup_block').hide();

$('.login_block').show();

$('#email').addClass("log");

$('#password').addClass("password");

$('#nom_prenom').removeClass("required");

$('#tel').removeClass("number required");

$('#date_naissance').removeClass("date required");

});

$.validator.addMethod("email", function(value, element)

{

return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);

}, "Please enter a valid email address.");







// Validate signup form

$("#formPoll").validate({

id:"#formPoll",

url_site:"<?php echo SITEPATH; ?>",

rules: {

email: "required email",



},

});





    $('#formPoll input.input').focus(function() {

        if($(this).val() == $(this).data('default_val') || !$(this).data('default_val')) {

            $(this).data('default_val', $(this).val());

            $(this).val('');

        }

    });



    $('#formPoll input.input').blur(function() {

        if ($(this).val() == '') $(this).val($(this).data('default_val'));

    });









	$("#Espace_Securise_Sondage").dialog({

		autoOpen: false,

		height: 240,

		width: 300,

		modal: true,

		draggable:true,

		buttons: {

			"<?php echo IDENTIF; ?>"	: function() {

				$("#formPoll label.error").remove();

				$("#formPoll").submit();

			}

		},

		open: function(event, ui){},

		close: function() {

			return false;

		}

	});





});

</script>

      <div id="Espace_Securise_Sondage" style="display:none" title="Authentification">

        <?php if(isset($_SESSION['nom_acces']) && $_SESSION['nom_acces'] != ''){ ?>

        Bonjour <strong><?php echo $_SESSION['nom_acces']; ?></strong><br />

        <a href="<?php echo SITEPATH; ?>logout_acces.php"><?php echo LOGOUT; ?> </a>

        <?php }else{ ?>

        <form method="post" action="" id="formPoll">

          <div class="signup_block">

            <input type="text" name="nom_prenom" class="input" id="nom_prenom" value="<?php echo NAME_PRENAME; ?>" />

          </div>

          <input type="text" name="email"  class="input required email log" id="email" value="<?php echo EMAIL; ?>"/>

          <input type="password" name="password" class="input required password" value="<?php echo PASSWORD; ?>" id="password"/>

          <div class="signup_block">

            <input type="text" name="tel" class="input" id="tel" value="<?php echo TEL; ?>" />

            <input type="text" name="date_naissance" class="input" id="date_naissance" value="<?php echo DATE_NAISSANCE; ?>" />

          </div>

          <div id="msg_error"></div>

          <input type="hidden" name="option_acces" id="option_acces" value="login" />

          <input type="hidden" name="id_site" id="id_site" value="<?php echo $idsite; ?>" />

          <input type="radio" name="choose" id="loginn" checked="checked" class="radio"/>

          <?php echo HAVE_COUNT; ?> <br />

          <input type="radio" name="choose" id="signupp" class="radio"/>

          <?php echo HAVE_NOT_COUNT; ?><br />

        </form>

        <?php } ?>

      </div>

      <img src="<?php echo SITEPATH; ?>img/progress.gif" alt="Chargement" class="pollAjaxLoader" />

      <script language="javascript">

	$(document).ready(function() {

	showPoll('<?php echo $idPoll; ?>','<?php echo $valeur2; ?>','1','0','<?php echo $idsite; ?>','1','<?php echo $theme_sondage; ?>');

	});

	</script>

      <?php   }else{ ?>

      <img src="<?php echo SITEPATH; ?>img/progress.gif" alt="Chargement" class="pollAjaxLoader" />

      <script language="javascript">

	$(document).ready(function() {

	showPoll('<?php echo $idPoll; ?>','<?php echo $valeur2; ?>','1','1','<?php echo $idsite; ?>','1','<?php echo $theme_sondage; ?>');

	});

	</script>

      <?php	   }



		 echo '</div></div>';


	}



	}else if($type == 'Sondage'){

			?>



    <script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery.countdown.js"></script>

     <link href="<?php echo SITEPATH; ?>css/jquery.countdown.css" rel="stylesheet" />

        <div style="display:none" id="voted" title="Enquête">Vous avez déja répondu à cette enquête</div>

        <?php



	$queryPoll  = "SELECT securise,type,id FROM parametres_sondage  WHERE id = " . str_replace("Sondage_#","",$row_donnees['contenu']) . " ";

	$resultPoll = mysql_query($queryPoll);

	$donnePoll = mysql_fetch_array($resultPoll);


		if($valeur2 != ''){

	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content '.$type.'">';





		?>

      <?php if($donnePoll['securise'] == 1 && (!isset($_SESSION['nom_acces']) || $_SESSION['nom_acces'] == '')){ ?>

      <script type="text/javascript">

$(document).ready(function(){



$('#signupp').click(function()

{

$('#option_acces').val('signup');

$('#password').value='';

$('.login_block').hide();

$('.signup_block').show();

$('#email').removeClass("log");

$('#password').removeClass("password");

$('#nom_prenom').addClass("required");

$('#tel').addClass("number required");

$('#date_naissance').addClass("date required");

});

$('#loginn').click(function(){

$('#option_acces').val('login');

$('#password').value='';

$('.signup_block').hide();

$('.login_block').show();

$('#email').addClass("log");

$('#password').addClass("password");

$('#nom_prenom').removeClass("required");

$('#tel').removeClass("number required");

$('#date_naissance').removeClass("date required");

});

$.validator.addMethod("email", function(value, element)

{

return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);

}, "Please enter a valid email address.");







// Validate signup form

$("#formPoll").validate({

id:"#formPoll",

url_site:"<?php echo SITEPATH; ?>",

rules: {

email: "required email",



},

});





    $('#formPoll input.input').focus(function() {

        if($(this).val() == $(this).data('default_val') || !$(this).data('default_val')) {

            $(this).data('default_val', $(this).val());

            $(this).val('');

        }

    });



    $('#formPoll input.input').blur(function() {

        if ($(this).val() == '') $(this).val($(this).data('default_val'));

    });









	$("#Espace_Securise_Sondage").dialog({

		autoOpen: false,

		height: 240,

		width: 300,

		modal: true,

		draggable:true,

		buttons: {

			"<?php echo IDENTIF; ?>"	: function() {

				$("#formPoll label.error").remove();

				$("#formPoll").submit();

			}

		},

		open: function(event, ui){},

		close: function() {

			return false;

		}

	});





});

</script>

      <div id="Espace_Securise_Sondage" style="display:none" title="Authentification">

        <?php if(isset($_SESSION['nom_acces']) && $_SESSION['nom_acces'] != ''){ ?>

        Bonjour <strong><?php echo $_SESSION['nom_acces']; ?></strong><br />

        <a href="<?php echo SITEPATH; ?>logout_acces.php"><?php echo LOGOUT; ?> </a>

        <?php }else{ ?>

        <form method="post" action="" id="formPoll">

          <div class="signup_block">

            <input type="text" name="nom_prenom" class="input" id="nom_prenom" value="<?php echo NAME_PRENAME; ?>" />

          </div>

          <input type="text" name="email"  class="input required email log" id="email" value="<?php echo EMAIL; ?>"/>

          <input type="password" name="password" class="input required password" value="<?php echo PASSWORD; ?>" id="password"/>

          <div class="signup_block">

            <input type="text" name="tel" class="input" id="tel" value="<?php echo TEL; ?>" />

            <input type="text" name="date_naissance" class="input" id="date_naissance" value="<?php echo DATE_NAISSANCE; ?>" />

          </div>

          <div id="msg_error"></div>

          <input type="hidden" name="option_acces" id="option_acces" value="login" />

          <input type="hidden" name="id_site" id="id_site" value="<?php echo $idsite; ?>" />

          <input type="radio" name="choose" id="loginn" checked="checked" class="radio"/>

          <?php echo HAVE_COUNT; ?> <br />

          <input type="radio" name="choose" id="signupp" class="radio"/>

          <?php echo HAVE_NOT_COUNT; ?><br />

        </form>

        <?php } ?>

      </div>

      <img src="<?php echo SITEPATH; ?>img/progress.gif" alt="Chargement" class="pollAjaxLoader" />

      <script language="javascript">

	$(document).ready(function() {

	showPoll('<?php echo str_replace("Sondage_#","",$row_donnees['contenu']); ?>','<?php echo $valeur2; ?>','1','0','<?php echo $idsite; ?>','0','0');

	});

	</script>

      <?php   }else{ ?>

      <img src="<?php echo SITEPATH; ?>img/progress.gif" alt="Chargement" class="pollAjaxLoader" />

      <script language="javascript">

	$(document).ready(function() {

	showPoll('<?php echo str_replace("Sondage_#","",$row_donnees['contenu']); ?>','<?php echo $valeur2; ?>','1','1','<?php echo $idsite; ?>','0','0');

	});

	</script>

      <?php	   }



		 echo '</div></div>';



	}



	}else if($type == 'Newsletter'){



		if($valeur2 != ''){

	echo '<div class="dragbox dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >

			<div class="dragbox-content '.$type.'">'; ?>

      <link href="<?php echo SITEPATH; ?>css/newsletter.css" type="text/css" rel="stylesheet">

      <script type="text/javascript" src="<?php echo SITEPATH; ?>js/newsletter.js"></script>

      <div class="formulaire form_newsletter">

        <h3><?php echo TEXTE_NEWSLETTER; ?></h3>

        <input type="text" name="email" class="newsletterEmail default-value" value="<?php echo EMAIL_NEWSLETTER; ?>">

        <input type="text" name="emailconf" class="newsletterEmail default-value" value="<?php echo CONFIRM_NEWSLETTER; ?>" >

        <input type="hidden" name="id_site"  value="<?php echo $idsite; ?>" >

        <input id="submitButton" class="disabled send" type="submit" value="<?php echo INSCRI_NEWSLETTER; ?>">

      </div>

      <div id="submitting"><?php echo SENDING_NEWSLETTER; ?></div>

      <div id="submitted"><?php echo SEND_NEWSLETTER; ?></div>

      <div id="submitError"><?php echo ERROR_NEWSLETTER; ?></div>

      <?php echo '

			</div>

		</div>';







	}





	}else{



	$align="";

	$float="";

	$img_width="";





			if($row_donnees['Lien'] != '' || $row_donnees['Lien'] != 0){

				if($row_donnees['type_lien'] == 'lien_out'){

				$lien = '<a href="'.$row_donnees['Lien'].'" target="'.$row_donnees['cible'].'">';

					}else if($row_donnees['type_lien'] == 'lien_in'){

				$lien = '<a href="'.get_name_page($idsite,$row_donnees['Lien']).'" target="'.$row_donnees['cible'].'">';

					}

				$lien_end = "</a>";

			}else{

				$lien = "";

				$lien_end = "";

			}





		switch ($row_donnees['positionnement']) {

		case 1:

			$float="float:left";

			$img_width="20%";

			break;

		case 2:

			$float="float:right";

			$img_width="20%";

			break;

		case 3:

			$float="float:left";

			break;

		case 4:

			$float="float:right";

			break;

		}

		if($type == 'Gmap'){



			$coordonee = explode ("_#_", $row_donnees['contenu']) ;



		$lat = $coordonee[0];

		$lng = $coordonee[1];



		$contenu_final = stripslashes('Gmap');

		}if($type == 'Meteo'){



		$id_meteo = $row_donnees['contenu'] ;

		$contenu_final = stripslashes('Meteo');



		}else if($type == 'Texte' && strip_tags($row_donnees['contenu'.$lang_table], '<img>') != ''){



				$contenu_final = str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',$row_donnees['contenu'.$lang_table]);



		}else if($type == 'HTML'){



				$contenu_final = str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',$row_donnees['contenu'.$lang_table]);



		}else if($type == 'Texte' && strip_tags($row_donnees['contenu'.$lang_table], '<img>') == ''){

			$type = 'TexteVide';



		}else{

		switch ($row_donnees['positionnement']) {

		case 0:

		if($type == 'VideoT'){

		$media1 = '<embed  style="width:100%; height:100%;" id="preview2" src="'.$row_donnees['media'].'" autostart="true" loop="true"></embed>';

		}

		$contenu_final = $media1.$row_donnees['contenu'.$lang_table];

    	break;

		case 1:

		if($type == 'VideoT'){

		$media1 = '<embed autostart="true" loop="true"  style="'.$float.'; width:25%; margin: 0 5px 5px 0;" id="preview" src="'.SITEPATH.$row_donnees['media'].'"></embed>';

		}elseif($type == 'Video'){

		$media1 = '<iframe style="'.$float.'; width:25%; margin: 0 5px 5px 0;" src="'.$row_donnees['lien_video'].'" frameborder="0" allowfullscreen></iframe>';

		}elseif($type == 'Image'){

			if($row_donnees['media'] != ''){

		$media1 = $lien.'<img src="'.$row_donnees['media'].'" align="'.$align.'" style="'.$float.'; width:25%; margin: 0 5px 5px 0;" />'.$lien_end;

			}else{

		$media1 = $lien.'<img src="'.SITEPATH.'images/no_image.png" align="'.$align.'" style="'.$float.'; width:25%; margin: 0 5px 5px 0;" />'.$lien_end;

			}

		}

		$contenu_final = $media1.str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',$row_donnees['contenu'.$lang_table]);

    	break;



		case 2:

		if($type == 'VideoT'){

		$media1 = '<embed autostart="true" loop="true"  style="'.$float.'; width:25%; margin:0 0 5px 5px;" id="preview" src="'.SITEPATH.$row_donnees['media'].'"></embed>';

		}elseif($type == 'Video'){

			$media1 = '<iframe style="'.$float.'; width:25%; margin:0 0 5px 5px;" src="'.$row_donnees['lien_video'].'" frameborder="0" allowfullscreen></iframe>';





		}elseif($type == 'Image'){

			if($row_donnees['media'] != ''){

		$media1 = $lien.'<img src="'.$row_donnees['media'].'" align="'.$align.'" style="'.$float.'; width:25%; margin:0 0 5px 5px;" />'.$lien_end;

			}else{

		$media1 = $lien.'<img src="'.SITEPATH.'images/no_image.png" align="'.$align.'" style="'.$float.'; width:25%; margin:0 0 5px 5px;" />'.$lien_end;

			}

		}



		$contenu_final= $media1.str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',$row_donnees['contenu'.$lang_table]);

		break;



		case 3:





		if($type == 'VideoT'){

		$media1 = '<embed autostart="true" loop="true"  style="width:100%; height:100%;" id="preview" src="'.SITEPATH.$row_donnees['media'].'"></embed>';

		}elseif($type == 'Video'){

			$media1 = '<iframe style="width:100%;height:100%" src="'.$row_donnees['lien_video'].'" frameborder="0" allowfullscreen></iframe>';



		}elseif($type == 'Image'){

			if($row_donnees['media'] != ''){

		$media1 = $lien.'<img src="'.$row_donnees['media'].'" align="'.$align.'" width="100%"/>'.$lien_end;

			}else{



		$media1 = $lien.'<img src="'.SITEPATH.'images/no_image.png" align="'.$align.'" width="100%"/>'.$lien_end;

			}

		}



		$contenu_final= '<div style="margin-right:2%;margin-right:2%\9;width:48%;'.$float.'" >'.$media1.'</div><div style="width:49%;'.$float.'" >'.str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',$row_donnees['contenu'.$lang_table]).'</div>';

		break;



		case 4:



		if($type == 'VideoT'){

		$media1 = '<embed  autostart="true" loop="true" style="width:100%; height:100%;" id="preview" src="'.SITEPATH.$row_donnees['media'].'"></embed>';

		}elseif($type == 'Video'){

			$media1 = '<iframe style="width:100%; height:100%;" src="'.$row_donnees['lien_video'].'" frameborder="0" allowfullscreen></iframe>';



		}elseif($type == 'Image'){

			if($row_donnees['media'] != ''){

		$media1 = $lien.'<img src="'.$row_donnees['media'].'" align="'.$align.'" width="100%"/>'.$lien_end;

			}else{

		$media1 = $lien.'<img src="'.SITEPATH.'images/no_image.png" align="'.$align.'" width="100%"/>'.$lien_end;

		}

		}



		$contenu_final= '<div style="margin-left:2%;margin-right:2%\9;width:48%;'.$float.'" >'.$media1.'</div><div style="width:49%; float:left" >'.str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',$row_donnees['contenu'.$lang_table]).'</div>';

		break;



		case 5:



		if($type == 'VideoT'){

		$media1 = '<embed autostart="true" loop="true"  style="width:100%; height:100%;" id="preview" src="'.SITEPATH.$row_donnees['media'].'"></embed>';

		}elseif($type == 'Video'){

		$media1 = '<iframe style="width:100%;height:100%" src="'.$row_donnees['lien_video'].'" frameborder="0" allowfullscreen></iframe>';



		}elseif($type == 'Image'){

			if($row_donnees['media'] != ''){

		$media1 = $lien.'<img src="'.$row_donnees['media'].'" width="100%"/>'.$lien_end;

			}else{

		$media1 = $lien.'<img src="'.SITEPATH.'images/no_image.png" width="100%"/>'.$lien_end;

			}

		}

		if($row_donnees['contenu'] == ''){



		$contenu_final= '<div style="width:100%;" >'.$media1.'</div>';

			}else{

		$contenu_final= '<div style="width:100%; margin-bottom:5px;">'.str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',$row_donnees['contenu'.$lang_table]).'</div><div style="width:100%;" >'.$media1.'</div>';

			}

		break;



		case 6:



		if($type == 'VideoT'){

		$media1 = '<embed autostart="true" loop="true"  style="width:100%; height:100%;" id="preview" src="'.SITEPATH.$row_donnees['media'].'"></embed>';

		}elseif($type == 'Video'){

		$media1 = '<iframe style="width:100%;height:100%" src="'.$row_donnees['lien_video'].'" frameborder="0" allowfullscreen></iframe>';



		}elseif($type == 'Image'){

			if($row_donnees['media'] != ''){

		$media1 = $lien.'<img src="'.$row_donnees['media'].'" width="100%"/>'.$lien_end;

			}else{

		$media1 = $lien.'<img src="'.SITEPATH.'images/no_image.png" width="100%"/>'.$lien_end;

			}

		}

		if($row_donnees['contenu'] == ''){



		$contenu_final= '<div style="width:100%;float:left;" >'.$media1.'</div>';

			}else{

		$contenu_final= '<div style="width:100%;float:left;" >'.$media1.'</div><div style="width:100%; margin-top:5px;">'.str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',$row_donnees['contenu'.$lang_table]).'</div>';

			}

		break;



		}

				}



	if($row_donnees['contenu'.$lang_table] == '' && $row_donnees['media'] == '' &&  $row_donnees['lien_video'] == ''){

		$contenu_final = '<p>&nbsp;</p>';

	}else{

		$contenu_final = $contenu_final;

	}

	if($valeur2 != ''){

	echo '<div class="dragbox ';

	if($row_donnees['partge'] == 1){

		echo 'bloc_share';



		}

	echo ' dragbox_'.$row_donnees['id_reglages'].'" id="'.$valeur2.'" >';

	if($row_donnees['partge'] == 1){

		if($type == 'VideoT' || $type == 'Video'){

	echo '<div class="shareVideo">';

		}else{

	echo '<div class="share">';

		}

	echo '<img src="'.SITEPATH.'images/social/facebook_16.png" width="16" height="16" title="facebook" /><img src="'.SITEPATH.'images/social/twitter_16.png" width="16" height="16" title="twitter" /><img src="'.SITEPATH.'images/social/google_16.png" width="16" height="16" title="google" /><img src="'.SITEPATH.'images/social/plus.png" width="16" height="16" title="plus" data-bloc="'.$valeur2.'" data-type="'.$type.'" /></div>';

	}

		echo '	<div class="dragbox-content '.$type.'">';

			if($type == 'HTML'){

			?>

      <script language="javascript">

                filterJquery('<?php echo stripslashes($contenu_final); ?>','<?php echo $valeur2; ?>');

                </script>

      <?php

			}else if($type == 'Gmap'){?>

      <iframe frameborder="0" style="width:100%; height:100%" scrolling="no" src="<?php echo SITEPATH; ?>modules/gmap/gmap.php?lat=<?php echo $lat; ?>&lng=<?php echo $lng; ?>"></iframe>

      <?php	}else if($type == 'Meteo'){ ?>

      <iframe frameborder="0" style="width:100%; height:100%" scrolling="no" src="<?php echo SITEPATH; ?>modules/meteo/meteo.php?id_meteo=<?php echo $id_meteo; ?>"></iframe>

      <?php

					}else{

			if($_SESSION['lang']== 'ar'){

			echo stripslashes($contenu_final);

			}else{

			echo utf8_encode(utf8_decode(stripslashes($contenu_final)));

			}



					}

			echo '

			</div>

		</div>';

	}



	$contenu_final = "";

	}

}

echo '</div>';  }

?>

    </div>

    <?php } ?>

    <div id="tout_footer">

      <?php include("modules/parametres/parametres_footer.php"); ?>

      <div id="column_footer" class="column_footer">

        <?php // footer

$contenu_footer = "SELECT * FROM footer where id_site = '".$idsite."' ORDER BY positionnement ASC";

	$req_contenu_footer  = mysql_query($contenu_footer ,$connect);

	$row_contenu_footer = mysql_fetch_assoc($req_contenu_footer);

	$num_contenu_footer = mysql_num_rows($req_contenu_footer);

	if($num_contenu_footer > 0){



	do{



		$desactive_footer = "SELECT * FROM desactive_footer  WHERE id_site = '".$idsite."' AND id_page = '".$id_page."' AND id_footer = '".$row_contenu_footer['id']."'";

	$req_desactive_footer  = mysql_query($desactive_footer ,$connect);

	$exist_desactive_footer  = mysql_num_rows($req_desactive_footer);





		if($row_contenu_footer['id_reglages'] != 0){

			$reglage_footer = 'dragbox_'.$row_contenu_footer['id_reglages'];

		}else{

			$reglage_footer = '';

			}





if($row_contenu_footer['type'] == 'Galerie'){



	$galerie = "SELECT g.*,p.* FROM galerie g,photo p where g.id = '".str_replace("Galerie_#","",$row_contenu_footer['contenu'])."' AND g.id = p.galerie ORDER BY p.Ordre";

	$req_galerie  = mysql_query($galerie ,$connect);

	$req_galerie2  = mysql_query($galerie ,$connect);

	$row_galerie_footer  = mysql_fetch_array($req_galerie);

	$row_galerie_footer2  = mysql_fetch_array($req_galerie2);

	$num_galerie  = mysql_num_rows($req_galerie);



	if($row_galerie_footer['Largeur'] > 0){



	$nbr_colom = (100-(2*$row_galerie_footer['Largeur']))/$row_galerie_footer['Largeur'];

	}else{

		$nbr_colom = 1;

		}



 if($row_galerie_footer['type'] == 2){ ?>

        <script type="text/javascript">

$(document).ready(function() {

<?php if($row_galerie_footer['action_click'] == 1){ ?>

$('#gallery_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?> a').lightBox();

 <?php } ?>

$("ul.pagination_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?>").quickPagination({pagerLocation:"bottom",pageSize:"<?php echo ($row_galerie_footer['Largeur']*$row_galerie_footer['Hauteur']); ?>"});







});

</script>

        <script language="javascript">

$(document).ready(function(){

$('#gallery_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?>').css({'margin' : '0' ,'padding' : '0', 'width' : '100%', 'float' : 'left'});

$('#gallery_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?> .simplePagerNav').css({'height' : '0', 'width' : '100%', 'float' : 'left'});

$('#gallery_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?> .simplePagerNav li').css('width' , 'auto');

$('#gallery_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?> .simplePagerNav li.currentPage').css('font-weight' , 'bold');

$('#gallery_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?> ul').css({'list-style' : 'none', 'padding' : '0', 'margin' : '0'});



<?php if($row_galerie_footer['slice_c'] != 1){ ?>

	$('#gallery_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?> ul li').css({'float' : 'left', 'width' : '<?php echo $nbr_colom; ?>%', 'display' : 'inline', 'marginLeft' : '1%', 'marginRight' : '1%', 'marginBottom' : '8px'});

	<?php } ?>

	$('#gallery_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?> ul img').css({<?php if($row_galerie_footer['slice_c'] != 1){ ?>'width' : '100%',<?php } ?> 'height' : 'auto', 'border' : '1px solid #FFF'});





$('#gallery_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?> ul a').hover(function(){



	$(this).find('img').css('border' , '1px solid #999');



	},function(){



	$(this).find('img').css('border' , '1px solid #FFF');



	});



});

</script>

        <?php }else if($row_galerie_footer['type'] == 1){ ?>

        <script language="javascript">

$(document).ready(function(){

$('.jcarousel-skin-tango .jcarousel-item').css('width'  ,'<?php echo $row_galerie_footer['Largeur']; ?>px' );





});

</script>

        <?php if($row_galerie_footer['show_arrow'] == 1){ ?>

        <style type="text/css">

.jcarousel-skin-tango .jcarousel-container-horizontal

{ padding:0 40px !important;}

</style>

        <?php } ?>

        <?php if($row_galerie_footer['action_click'] == 1){ ?>

        <script type="text/javascript">

   $(document).ready(function() {

        $('#gallery_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?> a').lightBox();

 	});

</script>

        <?php } ?>

        <script type="text/javascript">



function mycarousel_initCallback(carousel)

{

    // Disable autoscrolling if the user clicks the prev or next button.

    carousel.buttonNext.bind('click', function() {

        carousel.startAuto(1);

    });



    carousel.buttonPrev.bind('click', function() {

        carousel.startAuto(1);

    });



    // Pause autoscrolling if the user moves with the cursor over the clip.

    carousel.clip.hover(function() {

        carousel.stopAuto();

    }, function() {

        carousel.startAuto();

    });

};



jQuery(document).ready(function() {

    jQuery('#mycarousel_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?>').jcarousel({

        auto: <?php echo $row_galerie_footer['auto_start']; ?>,

        wrap: 'last',

		<?php if($row_galerie_footer['show_arrow'] != 1){ ?>

		buttonNextHTML:'',

		buttonPrevHTML:'',

		<?php } ?>

        initCallback: mycarousel_initCallback

    });



	<?php if($row_galerie_footer['show_arrow'] == 1){ ?>

	$('.jcarousel-skin-tango .jcarousel-container-horizontal').css({'paddingLeft':'40px','paddingRight':'40px','width':($('.jcarousel-skin-tango .jcarousel-container-horizontal').width()-80)});

	$('.jcarousel-skin-tango .jcarousel-clip-horizontal').parent().css({'width':($('.jcarousel-skin-tango .jcarousel-container-horizontal').parent().width()-80)});

	$('.jcarousel-skin-tango .jcarousel-clip-horizontal').css({'width':($('.jcarousel-skin-tango .jcarousel-clip-horizontal').width()-80)});

		<?php } ?>

});



</script>

        <?php }?>

        <?php





	if($row_galerie_footer['type'] == 2){



	$contenu_final_footer = '<div id="gallery_'.str_replace("Galerie_#","",$row_contenu_footer['contenu']).'">



<ul class="pagination_'.str_replace("Galerie_#","",$row_contenu_footer['contenu']).'">';

	if($num_galerie > 0){



		do{



		if($row_galerie_footer['action_click'] == 0){

				$contenu_final_footer = $contenu_final_footer.' <li>';

            if($row_galerie_footer['Image'] != ''){

               $contenu_final_footer = $contenu_final_footer.'<img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie_footer['Image'])).'" width="'.$row_galerie_footer['Largeur'].'" alt="'.$row_galerie_footer2['Description'].'" />';

			}else{

               $contenu_final_footer = $contenu_final_footer.'<img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie_footer['Largeur'].'" alt="'.$row_galerie_footer2['Description'].'" />';

			}



         $contenu_final_footer = $contenu_final_footer.'</li>';

				}else if($row_galerie_footer['action_click'] == 1){



			$contenu_final_footer = $contenu_final_footer.' <li>';

			if($row_galerie_footer['Image'] != ''){

           $contenu_final_footer = $contenu_final_footer.'  <a href="'.$row_galerie_footer['Image'].'" title="'.$row_galerie_footer['Description'].'">

                <img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie_footer['Image'])).'" width="72" height="72" alt="" />

            </a>';

			}else{

           $contenu_final_footer = $contenu_final_footer.'  <a href="'.SITEPATH.'images/no_image.png" title="'.$row_galerie_footer['Description'].'">

                <img src="'.SITEPATH.'images/no_image.png" width="72" height="72" alt="" />

            </a>';

			}

        $contenu_final_footer = $contenu_final_footer.' </li>';



				}else if($row_galerie_footer['action_click'] == 2){

				$contenu_final_footer = $contenu_final_footer.'<li>';





            if($row_galerie_footer['type_lien'] == 1){$contenu_final_footer = $contenu_final_footer.'<a href="'.get_name_page($idsite,$row_galerie_footer['Lien']).'">';}else if($row_galerie_footer['type_lien'] == 2){$contenu_final_footer = $contenu_final_footer.'<a href="'.$row_galerie_footer['Lien'].'" target="_blank">';}else{$contenu_final_footer = $contenu_final_footer.'';}

			if($row_galerie_footer['Image'] != ''){

              $contenu_final_footer = $contenu_final_footer.'<img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie_footer['Image'])).'" width="'.$row_galerie_footer['Largeur'].'" alt="" />';

			}else{

              $contenu_final_footer = $contenu_final_footer.'<img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie_footer['Largeur'].'" alt="" />';

			}

			   if($row_galerie_footer['type_lien'] != 0){$contenu_final_footer = $contenu_final_footer.'</a>';}



    $contenu_final_footer = $contenu_final_footer.'</li>';

				}









			 }while($row_galerie_footer  = mysql_fetch_assoc($req_galerie));





		}else{

			$contenu_final_footer = GALERIE_EMPTY;

			}





	  $contenu_final_footer = $contenu_final_footer.'</ul></div>';



	}else if($row_galerie_footer['type'] == 1){

		if($row_galerie_footer['slice_c'] == 1){



	  $contenu_final_footer = $contenu_final_footer.'<div id="gallery_'.str_replace("Galerie_#","",$row_contenu_footer['contenu']).'"><ul id="webticker_'.str_replace("Galerie_#","",$row_contenu_footer['contenu']).'" >';

	if($num_galerie > 0){



		do{



			if($row_galerie_footer['action_click'] == 0){

				$contenu_final_footer = $contenu_final_footer.' <li>';

            if($row_galerie_footer2['Image'] != ''){

                $contenu_final_footer = $contenu_final_footer.'<img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie_footer2['Image'])).'" width="'.$row_galerie_footer['Largeur'].'" alt="'.$row_galerie_footer2['Description'].'" />';

			}else{

                $contenu_final_footer = $contenu_final_footer.'<img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie_footer['Largeur'].'" alt="'.$row_galerie_footer2['Description'].'" />';

			}



        $contenu_final_footer = $contenu_final_footer.'</li>';

				}else if($row_galerie_footer['action_click'] == 1){

				$contenu_final_footer = $contenu_final_footer.' <li>';

				if($row_galerie_footer2['Image'] != ''){

          $contenu_final_footer = $contenu_final_footer.'  <a href="'.$row_galerie_footer2['Image'].'" title="'.$row_galerie_footer2['Description'].'">

                <img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie_footer2['Image'])).'" width="'.$row_galerie_footer['Largeur'].'" alt="" />

            </a>';

				}else{

          $contenu_final_footer = $contenu_final_footer.'  <a href="'.SITEPATH.'images/no_image.png" title="'.$row_galerie_footer2['Description'].'">

                <img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie_footer['Largeur'].'" alt="" />

            </a>';

				}

       $contenu_final_footer = $contenu_final_footer.' </li>';



				}else if($row_galerie_footer['action_click'] == 2){

				$contenu_final_footer = $contenu_final_footer.' <li>';



		if($row_galerie_footer2['type_lien'] == 1){

			   $contenu_final_footer = $contenu_final_footer.'<a href="'.get_name_page($idsite,$row_galerie_footer2['Lien']).'">';

		}else if($row_galerie_footer2['type_lien'] == 2){

			$contenu_final_footer = $contenu_final_footer.'<a href="'.$row_galerie_footer2['Lien'].'" target="_blank">';

		}else{

			$contenu_final_footer = $contenu_final_footer.'';}

		  if($row_galerie_footer2['Image'] != ''){

              $contenu_final_footer = $contenu_final_footer.'<img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie_footer2['Image'])).'" width="'.$row_galerie_footer['Largeur'].'" alt="'.$row_galerie_footer2['Description'].'" />';

		  }else{

              $contenu_final_footer = $contenu_final_footer.'<img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie_footer['Largeur'].'" alt="'.$row_galerie_footer2['Description'].'" />';

		  }

			   if($row_galerie_footer2['type_lien'] != 0){$contenu_final_footer = $contenu_final_footer.'</a>';}



    $contenu_final_footer = $contenu_final_footer.'</li>';

				}





			 }while($row_galerie_footer2  = mysql_fetch_array($req_galerie2));





		}else{

			$contenu_final_footer = GALERIE_EMPTY;

			}





	  $contenu_final_footer = $contenu_final_footer.'</ul></div>';









		}else{



	  $contenu_final_footer = $contenu_final_footer.'<div id="gallery_'.str_replace("Galerie_#","",$row_contenu_footer['contenu']).'"><ul id="mycarousel_'.str_replace("Galerie_#","",$row_contenu_footer['contenu']).'" class="jcarousel-skin-tango">';

	if($num_galerie > 0){



		do{



			if($row_galerie_footer['action_click'] == 0){

				$contenu_final_footer = $contenu_final_footer.' <li>';

            if($row_galerie_footer2['Image'] != ''){

                $contenu_final_footer = $contenu_final_footer.' <img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie_footer2['Image'])).'" width="'.$row_galerie_footer['Largeur'].'" alt="'.$row_galerie_footer2['Description'].'" />';

			}else{

                $contenu_final_footer = $contenu_final_footer.' <img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie_footer['Largeur'].'" alt="'.$row_galerie_footer2['Description'].'" />';

			}



        $contenu_final_footer = $contenu_final_footer.' </li>';

				}else if($row_galerie_footer['action_click'] == 1){

				$contenu_final_footer = $contenu_final_footer.' <li>';

				if($row_galerie_footer2['Image'] != ''){

            $contenu_final_footer = $contenu_final_footer.'<a href="'.$row_galerie_footer2['Image'].'" title="'.$row_galerie_footer2['Description'].'">

                <img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie_footer2['Image'])).'" width="'.$row_galerie_footer['Largeur'].'" alt="'.$row_galerie_footer2['Description'].'" />

            </a>';

				}else{

            $contenu_final_footer = $contenu_final_footer.'<a href="'.SITEPATH.'images/no_image.png" title="'.$row_galerie_footer2['Description'].'">

                <img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie_footer['Largeur'].'" alt="'.$row_galerie_footer2['Description'].'" />

            </a>';

				}

       $contenu_final_footer = $contenu_final_footer.' </li>';



				}else if($row_galerie_footer['action_click'] == 2){

				$contenu_final_footer = $contenu_final_footer.' <li>';



		if($row_galerie_footer2['type_lien'] == 1){

			   $contenu_final_footer = $contenu_final_footer.'<a href="'.get_name_page($idsite,$row_galerie_footer2['Lien']).'">';

		}else if($row_galerie_footer2['type_lien'] == 2){

			$contenu_final_footer = $contenu_final_footer.'<a href="'.$row_galerie_footer2['Lien'].'" target="_blank">';

		}else{

			$contenu_final_footer = $contenu_final_footer.'';}

		  if($row_galerie_footer2['Image'] != ''){

              $contenu_final_footer = $contenu_final_footer.'<img src="'.SITEPATH.'uploads/site_'.$idsite.'/galerie/min/'.end(explode("/", $row_galerie_footer2['Image'])).'" width="'.$row_galerie_footer['Largeur'].'" alt="'.$row_galerie_footer2['Description'].'" />';

		  }else{

              $contenu_final_footer = $contenu_final_footer.'<img src="'.SITEPATH.'images/no_image.png" width="'.$row_galerie_footer['Largeur'].'" alt="'.$row_galerie_footer2['Description'].'" />';

		  }

			   if($row_galerie_footer2['type_lien'] != 0){$contenu_final_footer = $contenu_final_footer.'</a>';}



    $contenu_final_footer = $contenu_final_footer.'</li>';

				}





			 }while($row_galerie_footer2  = mysql_fetch_array($req_galerie2));





		}else{

			$contenu_final_footer = GALERIE_EMPTY;

			}





	  $contenu_final_footer = $contenu_final_footer.'</ul></div>';





	}

	}



	echo '<div class="dragbox dragbox_'.$row_contenu_footer['id_reglages'].'" id="'.$row_contenu_footer['id'].'" >';

			if($exist_desactive_footer == 0){

				echo '<div class="dragbox-content '.$row_contenu_footer['type'].'">';

	if($_SESSION['lang']== 'ar'){

			echo stripslashes($contenu_final_footer);

}else{

			echo utf8_encode(utf8_decode(stripslashes($contenu_final_footer)));

			}

			echo '</div>';

			}

			echo '



		</div>';


	 if($row_galerie_footer['slice_c'] == 1){ ?>

        <script language="javascript">

$(document).ready(function(){

$('#pCarousel a').css({'height':'43px','position':'relative','float':'left','width':'auto','marginLeft':'23px','marginRight':'23px'});

$('.caroufredsel_wrapper').css('width','961px');



});

</script>

        <script language="javascript">



$(document).ready(function () {

	$('#gallery_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?> .tickercontainer').css({'margin':'0','padding':'0','overflow':'hidden'});

	$('#gallery_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?> .tickercontainer .mask').css({'position':'relative','overflow':'hidden'});

	$('#gallery_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?> ul.newsticker').css({'position':'relative','marginLeft':'20px','list-style-type':'none','margin':'0','padding':'0'});

});

		 </script>

        <script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery.webticker.js"></script>

        <script>

	$("#webticker_<?php echo str_replace("Galerie_#","",$row_contenu_footer['contenu']); ?>").webTicker();

</script>

        <?php }

	}else{

	echo '<div class="dragbox '.$reglage_footer.'" id="'.$row_contenu_footer['id'].'" >';



				if($exist_desactive_footer == 0){

					echo '<div class="dragbox-content">';

			if($_SESSION['lang']== 'ar'){

			echo stripslashes(str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',$row_contenu_footer['contenu'.$lang_table]));

			}else{

			echo utf8_encode(utf8_decode(stripslashes(str_replace('/site1/uploads/site_',SITEPATH.'uploads/site_',$row_contenu_footer['contenu'.$lang_table]))));

			}

			echo '</div>';

				}

			echo '</div>';

		}



	}while($row_contenu_footer = mysql_fetch_assoc($req_contenu_footer));

}



?>

      </div>

    </div>

  </div>

</div>


<script src="<?php echo SITEPATH; ?>js/jquery.confirm.js"></script>

<script src="<?php echo SITEPATH; ?>js/socialShare.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50452770-3', 'lavoieexpress.com');
  ga('send', 'pageview');

</script>
</body>

</html>
