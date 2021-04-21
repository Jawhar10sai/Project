
<?php
error_reporting(0);
 include("functions/reglages.php"); ?>
<?php include("functions/function.php"); ?>
<?php 


    $meta = "SELECT * FROM meta_site where id_site = '".$idsite."'";
	$req_meta  = mysql_query($meta ,$connect);
	$row_meta = mysql_fetch_assoc($req_meta);
	$num_meta = mysql_fetch_assoc($req_meta);
	
	
	if(isset($_GET['detail']) && !empty($_GET['detail'])){
$id_s_page = mysql_escape_string(($_GET['detail']));
}else{
$id_s_page = 0;
	}
	
	
    $background = "SELECT * FROM arriere_plan where id_site = '".$idsite."' AND id_page ='".$id_page."' AND id_s_page ='".$id_s_page."'";
	$req_background  = mysql_query($background ,$connect);
	$row_background = mysql_fetch_assoc($req_background);
	
    $param_corp = "SELECT * FROM parametres_corp where id_site = '".$idsite."'";
	$req_param_corp  = mysql_query($param_corp ,$connect);
	$row_param_corp = mysql_fetch_assoc($req_param_corp);
	
    $param_page = "SELECT * FROM parametres_page where id_site = '".$idsite."'";
	$req_param_page  = mysql_query($param_page ,$connect);
	$row_param_page = mysql_fetch_assoc($req_param_page);
	
    $param_liens = "SELECT * FROM parametres_liens where id_site = '".$idsite."'";
	$req_param_liens  = mysql_query($param_liens ,$connect);
	$row_param_liens = mysql_fetch_assoc($req_param_liens);
	
	
	$titre = "SELECT * FROM pages  where id_site = '".$idsite."' AND id='".$id_page."'";
	$req_titre  = mysql_query($titre ,$connect);
	$row_titre = mysql_fetch_assoc($req_titre);
	
	
	$catalogue_site = "SELECT catalogue FROM site where id_site = '".$idsite."'";
	$req_catalogue_site  = mysql_query($catalogue_site ,$connect_m);
	$row_catalogue_site = mysql_fetch_assoc($req_catalogue_site);
	
	$is_catalogue = $row_catalogue_site['catalogue'];

?>


<title><?php echo $row_titre['titre']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="Content-Style-Type" CONTENT="text/css" />
<meta name="description" content="<?php echo stripslashes($row_titre['description']);?>" />
<META NAME="keywords" CONTENT="<?php echo stripslashes($row_titre['mot_cles']);?>" />



<link rel="Stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/jquery.ui.theme.css"/>
<link rel="Stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/styles.css"/>
<link rel="Stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/styles_lang.css"/>
<link rel="Stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/tables.css"/>
<link rel="Stylesheet" type="text/css" href="<?php echo SITEPATH; ?>tiny_mce/css/typography.css"/>


<script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/functions.js"></script>
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/tytabs.jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/tango/skin.css" />
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery.jcarousel.min.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/tango/skin.css" />
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery.jcarousel.min.js"></script>

<script type="text/javascript" src="<?php echo SITEPATH; ?>js/sliding_effect.js"></script>

<link href="<?php echo SITEPATH; ?>css/example_ticker.css" rel="stylesheet" type="text/css" />
<script src="<?php echo SITEPATH; ?>js/jquery.zrssfeed.min.js" type="text/javascript"></script>
<script src="<?php echo SITEPATH; ?>js/jquery.vticker.js" type="text/javascript"></script>

<link type='text/css' href='<?php echo SITEPATH; ?>css/osx.css' rel='stylesheet' media='screen' />
<link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>modules/style_menu/menu0/css/menu1.css" media="screen">
<link rel="stylesheet" media="screen" href="<?php echo SITEPATH; ?>css/superfish-vertical.css" /> 
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/hoverIntent.js"></script>
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/superfish.js"></script>

<script type='text/javascript' src='<?php echo SITEPATH; ?>js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='<?php echo SITEPATH; ?>js/osx.js'></script>

<link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>js/smoothness/jquery-ui-1.8.1.custom.css" />
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/smoothness/jquery-ui-1.8.1.custom.min.js"></script>

<?php if($_SESSION['lang']== 'fr'){ ?>
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/validation.js"></script>
<?php }else{ ?>
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/validation_en.js"></script>
<?php } ?>
<?php if($idsite == 94 || $idsite == 99){?>
<link rel="shortcut icon" href="http://rmexperts.oneoweb.com/uploads/site_94/images/homepage/favicon.png" />
<?php } ?>

<script src="<?php echo SITEPATH; ?>js/modernizr.js"></script>
<script src="<?php echo SITEPATH; ?>js/jquery.refineslide.js"></script>
<script src="<?php echo SITEPATH; ?>js/ios-orientation-change-fix.js"></script>


<script type="text/javascript" src="<?php echo SITEPATH; ?>js/date.js"></script>
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery.datePicker.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo SITEPATH; ?>css/datePicker.css" />

<?php if($session == 'ok'){?>
<script language="javascript">

$(document).ready(function () {
		var userAgent = navigator.userAgent.toLowerCase();
		$.browser = {
			version: (userAgent.match( /.+(?:rv|it|ra|ie|me)[\/: ]([\d.]+)/ ) || [])[1],
     		chrome: /chrome/.test( userAgent ),
     		safari: /webkit/.test( userAgent ) && !/chrome/.test( userAgent ),
     		opera: /opera/.test( userAgent ),
     		msie: /msie/.test( userAgent ) && !/opera/.test( userAgent ), 
			mozilla: /mozilla/.test( userAgent ) && !/(compatible|webkit)/.test( userAgent )
		};
		if($.browser['mozilla'] == true && $.browser['version'] < 18){
		if(confirm('Votre navigateur n\'est pas à jour. Vous risquez de rencontrer des problèmes de compatibilité ou des bugs avec notre plateforme. Nous vous invitons à télécharger la nouvelle version de Firefox.')){
			
		window.open('http://www.mozilla.org/fr/firefox/fx/');
			}
		}
		if($.browser['chrome'] == true){
		if(confirm('Votre navigateur n\'est pas compatible avec la plateforme. Nous vous invitons à télécharger le navigateur Firefox.')){
			
		window.open('http://www.mozilla.org/fr/firefox/fx/');
			}
		}
		if($.browser['safari'] == true){
		if(confirm('Votre navigateur n\'est pas compatible avec la plateforme. Nous vous invitons à télécharger le navigateur Firefox.')){
			
		window.open('http://www.mozilla.org/fr/firefox/fx/');
			}
		}
		if($.browser['opera'] == true){
		if(confirm('Votre navigateur n\'est pas compatible avec la plateforme. Nous vous invitons à télécharger le navigateur Firefox.')){
			
		window.open('http://www.mozilla.org/fr/firefox/fx/');
			}
		}
		if($.browser['msie'] == true && $.browser['version'] < 10){
		if(confirm('Votre navigateur n\'est pas à jour. Vous risquez de rencontrer des problèmes de compatibilité ou des bugs avec notre plateforme. Nous vous invitons à télécharger la nouvelle version de Internet Explorer.')){
			
		window.open('http://windows.microsoft.com/fr-fr/internet-explorer/download-ie');
			}
		}
});
</script>


<!--Style boxes-->
<link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/styles_box_admin.css" />
<script type="text/javascript" >
$(function(){
	$('.shareBloc').click(function(){
		var order = 'id='+$(this).attr('data-id');
			$.post("<?php echo SITEPATH; ?>shareBloc.php", order, function(theResponse){
			$('.shareBloc').html('<img width="18" height="18" title="Activer/Désactiver le partage" alt="Activer/Désactiver le partage" src="<?php echo SITEPATH; ?>images/icons/partage_'+theResponse+'.png">')
			}); 
		});
	
	
	function rel(){
		$('.dragbox').each(function(){
		$(this).hover(function(){
			//$(this).find('h2').addClass('collapse');
		}, function(){
			//$(this).find('h2').removeClass('collapse');
		})
		.find('h2').hover(function(){
			$(this).find('.configure').css('visibility', 'visible');
		}, function(){
			$(this).find('.configure').css('visibility', 'hidden');
		})
		.click(function(){
			//$(this).siblings('.dragbox-content').toggle();
		})
		.end()
		.find('.configure').css('visibility', 'hidden');
		
		
	
	});
		}
		rel();
	$('.column').sortable({
		connectWith: '.column',
		handle: 'h2',
		cursor: 'move',
		placeholder: 'placeholder',
		forcePlaceholderSize: true,
		opacity: 0.4,
		stop: function(event, ui){
			$(ui.item).find('h2').click();
			var sortorder='';
			$('.column').each(function(){
				var itemorder=$(this).sortable('toArray');
				var columnId=$(this).attr('id');
				sortorder+=columnId+'='+itemorder.toString()+'_';
			});
			var order = 'order='+sortorder+'&id_page=<?php echo $id_page; ?>';
			$.post("<?php echo SITEPATH; ?>updateDB.php", order, function(theResponse){
				//alert(theResponse);
				//$("#contentRight").html(theResponse);
			}); 
			//alert('SortOrder: '+sortorder);
			/*Pass sortorder variable to server using ajax to save state*/
		}
	})
	.disableSelection();
		
	

	
	$('.dragbox .delete').click(function(){
		//alert('test');
		
		var elem = $(this).closest('.dragbox');
		var per = elem.parent().parent().attr("id");
		$.confirm({
			'title'		: 'Confirmer la supression',
			'message'	: 'Vous &ecirc;tes sur le point de supprimer ce bloc. <br /> Il ne peut pas &ecirc;tre restaur&eacute;! Continuer?',
			'buttons'	: {
				'Oui'	: {
					'class'	: 'blue',
					'action': function(){
						elem.slideUp(600,function(){
				
			elem.remove();
			var order = 'id_block='+elem.attr("id")+'&id_page=<?php echo $id_page; ?>&parent='+per;
				$.post("<?php echo SITEPATH; ?>deleteDB.php", order, function(theResponse){
					var sortorder='';
			$('.column').each(function(){
				var itemorder=$(this).sortable('toArray');
				var columnId=$(this).attr('id');
				sortorder+=columnId+'='+itemorder.toString()+'_';
			});
			var order = 'order='+sortorder+'&id_page=<?php echo $id_page; ?>';
			$.post("<?php echo SITEPATH; ?>updateDB.php", order, function(theResponse){
			}); 
					
					
			}); 
		});
						
			
					}
				},
				'Non'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		
	});
	
	
	$('.dragbox .duplicate').click(function(){
		
		var elem = $(this).closest('.dragbox');
		
		$.confirm({
			'title'		: 'Confirmer la duplication',
			'message'	: 'Vous &ecirc;tes sur le point de dupliquer ce bloc. <br /> Continuer?',
			'buttons'	: {
				'Oui'	: {
					'class'	: 'blue',
					'action': function(){
					
			
			var order = 'id_block='+elem.attr("id")+'&id_page=<?php echo $id_page; ?>';
			//alert(order);
				$.post("<?php echo SITEPATH; ?>duplicate_bloc.php", order, function(theResponse){
					
					var theRes = theResponse.split('_#_');
					
					//alert(theRes[2]);
					
			$new_contenu = '<div id="'+theRes[0]+'" class="dragbox" style="display:none;"><h2>'+theRes[0]+'<div class="configure" style="visibility: hidden;"><span src="<iframe src=\'modules/block/param_block.php?id_block='+theRes[0]+'&id_page=<?php echo $id_page; ?>\' width=\'600\' height=\'600\' frameborder=\'0\'></iframe>" class="osx"><img width="18" height="18" class="osx" title="R&eacute;glages" alt="R&eacute;glages" src="images/icons/reglages_block.png"></span> <span class="osx" src="<iframe src=\'content.php?idpage=<?php echo $id_page; ?>&block='+theRes[0]+'&action=edit\' width=\'650\' height=\'600\' frameborder=\'0\'></iframe>"><img width="18" height="18" title="Propri&eacute;t&eacute;s du contenu" alt="Propri&eacute;t&eacute;s du contenu" src="images/icons/propriete_contenu.png"></span> <span class="delete"><img width="18" height="18" title="Suprimer" alt="Suprimer" src="images/icons/suprimer_block.png"></span></div></h2><div class="dragbox-content"><p>Patientez SVP!</p></div></div>';
								
			$("#tout").find('.column').eq(0).html($new_contenu+$("#tout").find('.column').eq(0).html());
			$('#tout div.column #'+theRes[0]).slideDown(600);		
					
					
					
					
					
					var sortorder='';
			$('.column').each(function(){
				var itemorder=$(this).sortable('toArray');
				var columnId=$(this).attr('id');
				sortorder+=columnId+'='+itemorder.toString()+'_';
			});
			var order = 'order='+sortorder+'&id_page=<?php echo $id_page; ?>';
			$.post("<?php echo SITEPATH; ?>updateDB.php", order, function(theResponse){
				document.location.reload();
			}); 
					
					
			}); 
								
			
					}
				},
				'Non'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		
	});
	
	
	
	
	$('div.propriete').hover(function(){
			$(this).find('input.modif').css('visibility', 'visible');
		}, function(){
			$(this).find('input.modif').css('visibility', 'hidden');
		})
		.find('input.modif').css('visibility', 'hidden');
		
		
		
});


</script>

<link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/styles_confirm.css" />
<link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>js/jquery.confirm.css" />
<?php }else{?>
<link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/styles_box.css" />
<?php } ?>

 	<link rel="stylesheet" href="<?php echo SITEPATH; ?>modules/slider_bloc/css/reset.css" />
	<link rel="stylesheet" href="<?php echo SITEPATH; ?>modules/slider_bloc/css/main.css" />
	<link rel="stylesheet" href="<?php echo SITEPATH; ?>modules/slider_bloc/css/refineslide.css" />
	<link rel="stylesheet" href="<?php echo SITEPATH; ?>modules/slider_bloc/css/refineslide-theme-dark.css" />
    
    <style type="text/css">
	div.rs-arrows{ display:none; }
	
	</style>
<style type="text/css">
body {
 font-family: <?php $police = "SELECT texte FROM police WHERE id = '".$row_param_page["police"]."'";
 $req_police = mysql_query($police, $connect);
 $row_police = mysql_fetch_assoc($req_police);
 echo $row_police["texte"];
?> !important;
 font-size:<?php echo $row_param_page["taille"];
?>px !important;
 color:<?php echo $row_param_page["couleur"];
?> !important;
 <?php if($row_background["param"] == 1) {
?> background:<?php echo $row_background["couleur"];
?> !important;
 <?php
}
else if($row_background["param"] == 2) {   $keywords = preg_split("/[\s,]+/", $row_background["degrade"]);?> 

background-image: -webkit-linear-<?php echo $row_background["degrade"];?>;
background-image:    -moz-linear-<?php echo $row_background["degrade"];?>;
background-image:     -ms-linear-<?php echo $row_background["degrade"];?>;
background-image:      -o-linear-<?php echo $row_background["degrade"];?>;
background-image:         linear-<?php echo $row_background["degrade"];?>;
filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=<?php echo $keywords[2]; ?>,endColorstr=<?php echo $keywords[4]; ?>); 
zoom: 1; 

background-attachment:fixed;

 <?php
}
else if($row_background["param"] == 4) {
?> background:Transparent;
 <?php
}
?> background-attachment:fixed;
 background-repeat:no-repeat;
 <?php if($session == 'ok') { ?> 
 padding-top:84px;
<?php
}
?>
}
#tout .formulaire select, #tout .formulaire input, #tout .formulaire textarea{
	 font-family: <?php $police = "SELECT texte FROM police WHERE id = '".$row_param_page["police"]."'";
 $req_police = mysql_query($police, $connect);
 $row_police = mysql_fetch_assoc($req_police);
 echo $row_police["texte"];
?> !important;
	}
 <?php if($row_background["param"] == 5) {
?> body {
 background:<?php echo $row_background["couleur2"];
?>;
 background-attachment:inherit;
}
#bg1 {
 height: <?php echo $row_background["hauteur"];
?>px;
 left: 0;
 overflow: hidden;
 position: absolute;
 top: 0;
 width: 100%;
 z-index: -100;
 background:<?php echo $row_background["couleur1"];
?>;
}
 <?php
}

?> 
a img{ border:none\9;}
a {
 font-family: <?php $police = "SELECT texte FROM police WHERE id = '".$row_param_liens["police"]."'";
 $req_police = mysql_query($police, $connect);
 $row_police = mysql_fetch_assoc($req_police);
 echo $row_police["texte"];
?>;
 font-size: <?php echo $row_param_liens["taille"]; ?>px;
 color: <?php echo $row_param_liens["couleur_lien"]; ?>;
 text-decoration: <?php echo $row_param_liens["style"]; ?>;
}
<?php if($row_param_liens["couleur_lien"] != ''){ ?>


#tout .formulaire input.send,#tout #form_recrute input.btn_envoi,#tout input.btn, input.send, input#next, input#back,input.addPanier,input.addPanierCad {
    background: <?php echo $row_param_liens["couleur_lien"]; ?> !important;
	border:0;
}
 input#next, input#back{ padding:3px 7px;}
#tout .formulaire input.send:hover,#tout #form_recrute input.btn_envoi:hover,#tout input.btn:hover, input.send:hover, input#next:hover, input#back:hover,input.addPanier:hover,input.addPanierCad:hover{
    background: <?php echo $row_param_liens["couleur_survol"]; ?> !important; 
	cursor:pointer !important;
}
#GlobalPanierResult .step_panier .inactif{
    background: <?php echo $row_param_liens["couleur_survol"]; ?> !important; 
	}

<?php } ?>
#panierText{
 color: <?php echo $row_param_liens["couleur_lien"]; ?>;
	}
.cart-total {
 background: none repeat scroll 0 0 <?php echo $row_param_liens["couleur_lien"]; ?> !important;
	}
a:link {
 color: <?php echo $row_param_liens["couleur_lien"]; ?>;
 text-decoration: <?php echo $row_param_liens["style"]; ?>;
}
a:visited {
 text-decoration: <?php echo $row_param_liens["style"]; ?>;
}
a:hover {
 text-decoration: <?php echo $row_param_liens["style"]; ?>;
 	color: <?php echo $row_param_liens["couleur_survol"]; ?>;
}
a:active {
 text-decoration: <?php echo $row_param_liens["style"]; ?>;
}
body div#contenu {
 width:<?php echo $row_param_corp["largeur"]; ?>px;
 <?php if($row_param_corp["style"] == 1){ ?>
 float:left;
 <?php }else if($row_param_corp["style"] == 2){ ?>
 float:none;
 position:relative;
  <?php }else if($row_param_corp["style"] == 3){ ?>
  float:right;
  <?php } ?>
  
}
 
body div#contenu div#s_contenu div#tout {
	width:100%;
	float:left;
 <?php if($row_param_corp["param"] == 1) {
?> background:<?php echo $row_param_corp["couleur"];?>;

 <?php
}
else if($row_param_corp["param"] == 2) { $keywords2 = preg_split("/[\s,]+/", $row_param_corp["degrade"]);?>
background-image: -webkit-linear-<?php echo $row_param_corp["degrade"];?>;
background-image:    -moz-linear-<?php echo $row_param_corp["degrade"];?>;
background-image:     -ms-linear-<?php echo $row_param_corp["degrade"];?>;
background-image:      -o-linear-<?php echo $row_param_corp["degrade"];?>;
background-image:         linear-<?php echo $row_param_corp["degrade"];?>;

filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=<?php echo $keywords2[2]; ?>,endColorstr=<?php echo $keywords2[4]; ?>); 
zoom: 1;

background-attachment:fixed;

 <?php
}
else if($row_param_corp["param"] == 3) {
?>  <?php if($row_param_corp["repeat_x"] == 0 && $row_param_corp["repeat_y"] == 0){ ?>
 background:url(<?php echo $row_param_corp['image']; ?>) no-repeat scroll left top transparent;
 <?php }else if($row_param_corp["repeat_x"] == 1 && $row_param_corp["repeat_y"] == 0){ ?>
 background:url(<?php echo $row_param_corp['image']; ?>) repeat-x scroll left top transparent;
 <?php }else if($row_param_corp["repeat_x"] == 0 && $row_param_corp["repeat_y"] == 1){ ?>
 background:url(<?php echo $row_param_corp['image']; ?>) repeat-y scroll left top transparent;
 <?php }else{ ?>
 background:url(<?php echo $row_param_corp['image']; ?>) repeat scroll left top transparent;
 <?php } ?>
 <?php
}else if($row_param_corp["param"] == 4) {
?> background:Transparent;
 <?php
}
?>
}
<?php if($session == 'ok') { ?>

#lang{ top:82px !important; }

<?php } ?>
.fixed_container{
	border-color: <?php echo $row_param_page["couleur"];
?> !important;}
</style>
<?php if($row_background["param"] == 3 || $row_background["param"] == 6){
	
	
    $slide_background = "SELECT * FROM slider_bg where id_site = '".$idsite."' AND id_page = '".$id_page."' AND id_s_page = '".$id_s_page."' ORDER BY ordre";
		
	$req_slide_background  = mysql_query($slide_background ,$connect);
	$row_slide_background = mysql_fetch_assoc($req_slide_background);
	$num_slide_background = mysql_num_rows($req_slide_background);
	$num_i = 1;
	?>
<link rel="stylesheet" href="<?php echo SITEPATH; ?>css/supersized.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo SITEPATH; ?>theme/supersized.shutter.css" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery.easing.min.js"></script>
		<script type="text/javascript" src="<?php echo SITEPATH; ?>js/supersized.3.2.7.min.js"></script>
		<script type="text/javascript" src="<?php echo SITEPATH; ?>theme/supersized.shutter.min.js"></script>
		
		<script type="text/javascript">
			
			jQuery(function($){
				
				$.supersized({
				
					// Functionality
					slide_interval          :   3000,		// Length between transitions
					transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	3000,		// Speed of transition
															   
					// Components							
					slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					slides 					:  	[			// Slideshow Images
					<?php do{ ?>{image : '<?php echo SITEPATH; ?>uploads/site_<?php echo $idsite; ?>/background/min/<?php echo end(explode("/", $row_slide_background['images'])); ?>', title : '', thumb : '<?php echo SITEPATH; ?>uploads/site_<?php echo $idsite; ?>/background/min/<?php echo end(explode("/", $row_slide_background['images'])); ?>', url : ''}<?php if($num_slide_background != $num_i){ echo ','; } $num_i++; }while($row_slide_background = mysql_fetch_assoc($req_slide_background)); ?> 
												]
				});
		    });
		    
		</script>
	<style type="text/css">
	ul#demo-block{ margin:0 15px 15px 15px; }
	ul#demo-block li{ margin:0 0 10px 0; padding:10px; display:inline; float:left; clear:both; color:#aaa; background:url('img/bg-black.png'); font:11px Helvetica, Arial, sans-serif; }
	ul#demo-block li a{ color:#eee; font-weight:bold; }
	</style>
<?php }?>
<?php if($row_background["param"] == 4){
	
	
   $video_background = "SELECT * FROM arriere_plan where id_site = '".$idsite."' AND id_page = '".$id_page."'";
	$req_video_background  = mysql_query($video_background ,$connect);
	$row_video_background = mysql_fetch_assoc($req_video_background);
	
	if($row_video_background['video'] != ''){
		$video =$row_video_background['video'];
	}else{
		$video = SITEPATH.'assets/christmas_snow.mp4';
	}
	
	?>
   
<link rel="stylesheet" href="<?php echo SITEPATH; ?>assets/bigvideo.css">
<script src="<?php echo SITEPATH; ?>assets/video.js"></script>
<script src="<?php echo SITEPATH; ?>assets/bigvideo.js"></script>

<!-- Demo -->
<script language="javascript">
        var BV;
	    $(function() {
            
            // initialize BigVideo
            BV = new $.BigVideo();
			BV.init();
			BV.show('<?php echo $video; ?>',{ambient:true});

           
		   
            function scrollToSection(id) {
                $(window)._scrollable().stop();
                $(window).scrollTo(id, {
                    duration: 300,
                    offset: -50,
                    // easeInOutQuad
                    easing: function(x,t,b,c,d){if((t/=d/2)<1) return c/2*t*t+b;return -c/2*((--t)*(t-2)-1)+b;}
                });
            }
	    });
    </script>

<?php }?>
  <script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery.quick.pagination.min.js"></script> 
        <script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery.lightbox-0.5.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/jquery.lightbox-0.5.css" media="screen" />
        
        
      <link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/style_blog.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/style_catalogue.css"/>
      
      
<link rel="Stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/espace_securise.css"/>
 <script src="<?php echo SITEPATH; ?>js/jquery.validate.js" type="text/javascript"></script>
 <script language="javascript">
	$(document).ready(function(){
	$("#message_new_inscrit").dialog({
		autoOpen: false,
		height: 150,
		width: 300,
		modal: true,
		draggable:true,
		buttons: {		
			<?php echo CLOSE; ?>: function() {
				$(this).dialog('close');
			}	
		},
		open: function(event, ui){},
		close: function() {
			// clear agenda data
			//$("#display-event-form").html("");
		}
	});	
	$("#plus_partage").dialog({
		autoOpen: false,
		height: 265,
		width: 200,
		modal: true,
        resizable: false,
		draggable:false
	});	
	
	$("#email_partage").dialog({
		autoOpen: false,
		height: 420,
		width: 500,
		modal: true,
        resizable: false,
		draggable:false
	});	
	
			});	
			$(window).resize(function() {
    $("#plus_partage").dialog("option", "position", "center");
    $("#email_partage").dialog("option", "position", "center");
});
</script>
<?php 

$secure_page = "SELECT etat_secure FROM pages WHERE id_site='".$idsite."' AND id = '".$id_page."'";
$query_secure_page  = mysql_query($secure_page ,$connect);
$row_secure_page  = mysql_fetch_assoc($query_secure_page);

if($row_secure_page['etat_secure'] == 1 && $session != 'ok' ){
	
	if(!isset($_SESSION['access_page']) || $_SESSION['access_page'] != $id_page){
?>   

 <script language="javascript">
	$(document).ready(function(){
	$("#login").dialog({
		autoOpen: true,
		height: 200,
		width: 300,
		modal: true,
		draggable:true,
		buttons: {		
			"<?php echo IDENTIF; ?>"	: function() {
				$("#form_membre label.error").remove();
				$("#form_membre").submit();
			}	
		},
		open: function(event, ui){},
		close: function() {
				$("#form_membre label.error").remove();}
	});	
		

		



$.validator.addMethod("email", function(value, element)
{
return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
}, "Please enter a valid email address.");



// Validate signup form
$("#form_membre").validate({
id:"#form_membre",
id_bloc:"#login",
url_site:"<?php echo SITEPATH; ?>",
rules: {
email: "required email",

},
});


});
</script>
  
    <div id="login" class="Espace_Securise" title="Espace Sécurisé">
   <p>Veuillez saisir le mot de passe pour acceder a cette page !</p>
     
    <form method="post" action="" id="form_membre" class="Espace_Securise">
          <label><?php echo PASSWORD; ?>  </label><br />
          <input type="password" name="password" class="input required" id="password"/>
         
          <div id="msg_error"></div>
          <input type="hidden" name="id_page" id="id_page" value="<?php echo $id_page; ?>"/>
          <input type="hidden" name="option_acces" id="option_acces" value="login_password" />
          <input type="hidden" name="id_site" id="id_site" value="<?php echo $idsite; ?>" />
        </form>
        </div>
        

    <?php
	exit();
	}
	}else if(($row_secure_page['etat_secure'] == 2 || $row_secure_page['etat_secure'] == 3) && $session != 'ok' ){
	if(!isset($_SESSION['nom_acces']) || $_SESSION['nom_acces'] == "" || !isset($_SESSION['id_acces']) || $_SESSION['id_acces'] == ""){
		?>   

 <script language="javascript">
	$(document).ready(function(){
	$("#login").dialog({
		autoOpen: true,
		height: 240,
		width: 300,
		modal: true,
		draggable:true,
		buttons: {		
			"<?php echo IDENTIF; ?>"	: function() {
				$("#form_membre label.error").remove();
				$("#form_membre").submit();
			}	
		},
		open: function(event, ui){},
		close: function() {
			// clear agenda data
			//$("#display-event-form").html("");
		}
	});	
		


$.validator.addMethod("email", function(value, element)
{
return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
}, "Please enter a valid email address.");



// Validate signup form
$("#form_membre").validate({
id:"#form_membre",
id_bloc:"#login",
url_site:"<?php echo SITEPATH; ?>",
rules: {
email: "required email",

},
});


});
</script>
  
    <div id="login" class="Espace_Securise" title="Espace Sécurisé">
   
   <p><?php echo MESSAGE_INSCRIPTION2; ?></p>
     
    <form method="post" action="" id="form_membre" class="Espace_Securise">
         
          <label><?php echo EMAIL; ?></label><br />
          <input type="text" name="email"  class="input required email" id="email" tabindex="1" /><br />
          <label><?php echo PASSWORD; ?> </label><br />
          <input type="password" name="password" class="input required" id="password" tabindex="2"/>
         
          <div id="msg_error"></div>
          <input type="hidden" name="option_acces" id="option_acces" value="login" />
          <input type="hidden" name="id_site" id="id_site" value="<?php echo $idsite; ?>" />
        </form>
        </div>
        

    <?php
	exit();
	}
		
	}

?>

<div id="message_new_inscrit" title="Nouvelle inscription" style="display:none">
  <p><?php echo MESSAGE_INSCRIPTION; ?></p>
</div>
 <div id="email_partage" title="Partager" style="display:none">   </div>
<div id="plus_partage" title="Partage" style="display:none">
  <p><img src="<?php echo SITEPATH; ?>images/lightbox-ico-loading.gif" width="32" height="32" /></p>
</div>    
  
<link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>css/elastislide.css" />
        
      
      
        <script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery.autocomplete.js"></script>
        <script type="text/javascript" src="<?php echo SITEPATH; ?>js/search.js"></script>
        <link rel="stylesheet" href="<?php echo SITEPATH; ?>css/jquery.autocomplete.css" type="text/css" />
        
        
<script src="<?php echo SITEPATH; ?>js/galleria-1.2.9.min.js"></script>



<script src="js/poll.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/poll.css" />



<link href="<?php echo SITEPATH; ?>css/jquery.rollbar.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery.rollbar.min.js"></script>
<script type="text/javascript">
	  $(window).load(function(){
	  	$('.Image').rollbar({zIndex:100});
		
		$('.Image').hover(function(){
		     $(this).find('.rollbar-path-vertical').css('visibility','visible');
		},function(){
		     $(this).find('.rollbar-path-vertical').css('visibility','hidden');
		});
		
		
		$('.Texte').each(function(){
		$(this).html("<div class='innerText' >" + $(this).html() + "</div>");
		paddingRight = $(this).css("padding-right");
		$(this).find('.innerText').css("padding-right",paddingRight);
		});
		
		
		$('.innerText').rollbar({zIndex:100});
		
		
		$('.innerText').hover(function(){
		     $(this).find('.rollbar-path-vertical').css('visibility','visible');
		},function(){
		     $(this).find('.rollbar-path-vertical').css('visibility','hidden');
		});
		
		
		
	  });
</script>
    <!--Panier-->
    <script type="text/javascript" src="<?php echo SITEPATH; ?>js/jquery.PrintArea.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
       
        <link href="<?php echo SITEPATH; ?>css/panier.css" rel="stylesheet" />
        
        
        <!-- inscription --> 
       
		<link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>modules/inscription/custom.css">
        
		<link rel="stylesheet" href="<?php echo SITEPATH; ?>css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
        
        
		<script src="js/jquery.validationEngine-fr.js" type="text/javascript"></script>  
		<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
        
    <?php
	$param_page = "SELECT * FROM parametres_page where id_site = '".$idsite."'";
$req_param_page  = mysql_query($param_page ,$connect);
$row_param_page = mysql_fetch_assoc($req_param_page);
	
$param_lien = "SELECT * FROM parametres_liens where id_site = '".$idsite."'";
$req_param_lien  = mysql_query($param_lien ,$connect);
$row_param_lien = mysql_fetch_assoc($req_param_lien);
	
	
	?>    
 <!--Panier--> 
 
<style type="text/css">
#GlobalPanierResult .mode_payement{
	
	border-color: <?php echo $row_param_lien['couleur_lien'];?> !important;}
#GlobalPanierResult table, #GlobalPanierResult th, #GlobalPanierResult td {
 font-family: <?php $police = "SELECT texte FROM police WHERE id = '".$row_param_page["police"]."'";
 $req_police = mysql_query($police, $connect);
 $row_police = mysql_fetch_assoc($req_police);
 echo $row_police["texte"];?>;
 font-size:<?php echo $row_param_page["taille"];?>px;
 color:<?php echo $row_param_page["couleur"];?>;
}
#GlobalPanierResult h3,#GlobalPanierResult #total_product,#GlobalPanierResult table tr td.price,#GlobalPanierResult .cart_total_price_last  .total_panier_last,#GlobalPanierResult #livraisonPanier span,#GlobalPanierResult #livraisonPanier2 span,div.shopp div.shopp-price,#left_bar #title_left_bar span.count_title,#Espace_Securise .redRegular,#Espace_Securise .redBold,#GlobalPanierResult .titreh2,.blocRight h2,#blocLeftParams h2.redBold,.blocRight .redColor,.blocRight .price  {
 color: <?php echo $row_param_lien['couleur_lien'];?>;
}
 #GlobalPanierResult .cart_quantity_up, #GlobalPanierResult .cart_quantity_down,#GlobalPanierResult .step_panier li,#GlobalPanierResult form fieldset h3,#GlobalPanierResult ul.address .address_title,#GlobalPanierResult ul.addressPanier .address_title,#GlobalPanierResult .cart_total_price_last .total_panier_last div,#globalPanier #littlePanier,#left_bar #title_left_bar span.icone_title,#Espace_Securise .monCompteContent .bgRed,#Espace_Securise .deconnexion_compte input,.bgRed,.ligne_adresse,#defaultCountdown  {
 background:<?php echo $row_param_lien['couleur_lien'];?>;
}
#pollWrap li.pollChart span {
 background:<?php echo $row_param_lien['couleur_lien'];?> !important;
}
.bggrid,.ligne_adresse{
 background:<?php echo $row_param_lien['couleur_survol'];?>;
	}
#GlobalPanierResult .address_update a{
 color:<?php echo $row_param_page["couleur"]; ?>;
}
#globalPanier,#left_bar #title_left_bar {
	border-color:<?php echo $row_param_lien["couleur_lien"]; ?>;
	}
#GlobalPanierResult .next_step,#GlobalPanierResult .prev_step,#GlobalPanierResult .address_update a span{
background:<?php echo $row_param_lien['couleur_lien'];?>;
}

</style>