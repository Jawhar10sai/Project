<?php
include_once('../config/connect.php');
	if($session != 'ok'){
	?>
 <script language="javascript">
 document.location.href = "../index.php?etap=login";
 
 </script>
    
    <?php
	exit();
	
	}

	if(isset($_POST["action"]) && $_POST["action"] == "etatp2"){

	//META
	
	$meta_site = "SELECT * FROM meta_site";
	$req_meta_site  = mysql_query($meta_site ,$connect);
	$exist_meta_site  = mysql_num_rows($req_meta_site);
	
	if($exist_meta_site > 0){
	
	$update11= "UPDATE meta_site SET nom_page = '".utf8_decode($_POST["nom_site"])."', descriptif=  '".utf8_decode($_POST["descriptif"])."', mot_cles ='".utf8_decode($_POST["mots_cles"])."'";
	$queryUpdate11=mysql_query($update11) or die("erreur".mysql_error());
		
	}else{
	$query_meta = "INSERT INTO meta_site (nom_page,descriptif,mot_cles)
				VALUES(
				'".utf8_decode($_POST["nom_site"])."',
				'".utf8_decode($_POST["descriptif"])."',
				'".utf8_decode($_POST["mots_cles"])."')";
	mysql_query($query_meta);
	
	}
		
	//Parametres page
	
	$parametres_page = "SELECT * FROM parametres_page";
	$req_parametres_page  = mysql_query($parametres_page ,$connect);
	$exist_parametres_page  = mysql_num_rows($req_parametres_page);
	
	if($exist_parametres_page > 0){
	
	$update10= "UPDATE parametres_page	SET police = '".utf8_decode($_POST["police"])."', taille=  '".utf8_decode($_POST["taille"])."', couleur ='#".utf8_decode($_POST["couleur_page"])."'";
	$queryUpdate10=mysql_query($update10) or die("erreur".mysql_error());
		
		}else{
	$query_meta = "INSERT INTO parametres_page (police,taille,couleur)
				VALUES(
				'".utf8_decode($_POST["police"])."',
				'".utf8_decode($_POST["taille"])."',
				'#".utf8_decode($_POST["couleur_page"])."')";
	mysql_query($query_meta);
		}
	
	
	//Parametres liens
	$parametres_liens = "SELECT * FROM parametres_liens";
	$req_parametres_liens  = mysql_query($parametres_liens ,$connect);
	$exist_parametres_liens  = mysql_num_rows($req_parametres_liens);
	
	if($exist_parametres_liens > 0){
		
		$update0= "UPDATE parametres_liens	SET police = '".utf8_decode($_POST["police_lien"])."', taille=  '".utf8_decode($_POST["taille_lien"])."', couleur_lien ='#".utf8_decode($_POST["couleur_lien"])."', couleur_survol ='#".utf8_decode($_POST["couleur_survol"])."' , style ='".utf8_decode($_POST["style_lien"])."'  ";
	$queryUpdate0=mysql_query($update0) or die("erreur".mysql_error());
	}else{
	$query_meta = "INSERT INTO parametres_liens (police,taille,couleur_lien,couleur_survol,style)
				VALUES(
				'".utf8_decode($_POST["police_lien"])."',
				'".utf8_decode($_POST["taille_lien"])."',
				'#".utf8_decode($_POST["couleur_lien"])."',
				'#".utf8_decode($_POST["couleur_survol"])."',
				'".utf8_decode($_POST["style_lien"])."')";
	mysql_query($query_meta);
	}
	//Background	
	
	$arriere_plan = "SELECT * FROM arriere_plan";
	$req_arriere_plan  = mysql_query($arriere_plan ,$connect);
	$exist_arriere_plan  = mysql_num_rows($req_arriere_plan);
	
	if($exist_arriere_plan > 0){
		
	$background_deg='gradient( top, #'.$_POST["deg1"].' 0%, #'.$_POST["deg2"].' 100%)';
		
	$update1= "UPDATE arriere_plan	SET param = '".utf8_decode($_POST["option_bg"])."', couleur=  '".utf8_decode('#'.$_POST["couleur"])."', degrade ='".$background_deg."', couleur1 =  '".utf8_decode('#'.$_POST["coul1"])."', hauteur=  '".utf8_decode($_POST["hauteur"])."', couleur2=  '".utf8_decode('#'.$_POST["coul2"])."'";
	$queryUpdate1=mysql_query($update1) or die("erreur".mysql_error());
		
		
	}else{
	$background_deg='gradient( top, #'.$_POST["deg1"].' 0%, #'.$_POST["deg2"].' 100%)';
	$query_bg = "INSERT INTO arriere_plan (param,couleur,degrade,couleur1,hauteur,couleur2)
				VALUES(
				'".utf8_decode($_POST["option_bg"])."',
				'".utf8_decode('#'.$_POST["couleur"])."',
				'".$background_deg."',
				'".utf8_decode('#'.$_POST["coul1"])."',
				'".utf8_decode($_POST["hauteur"])."',
				'".utf8_decode('#'.$_POST["coul2"])."')";
	mysql_query($query_bg);
	
	}
			
	//Parametres corp	
	
	$parametres_corp = "SELECT * FROM parametres_corp";
	$req_arriere_corp  = mysql_query($parametres_corp ,$connect);
	$exist_arriere_corp  = mysql_num_rows($req_arriere_corp);
	if($exist_arriere_corp > 0){
		
	$background_deg_c='gradient( top, #'.$_POST["deg_c1"].' 0%, #'.$_POST["deg_c2"].' 100%)';
		
	$update2= "UPDATE parametres_corp	SET param = '".utf8_decode($_POST["option_c"])."',largeur ='".utf8_decode($_POST["largeur"])."',unite = '".$_POST["unite"]."', couleur=  '".utf8_decode('#'.$_POST["couleur_c"])."', degrade ='".$background_deg_c."'";
	$queryUpdate2=mysql_query($update2) or die("erreur".mysql_error());
		
		
	}else{
	
	
	$background_deg_c='gradient( top, #'.$_POST["deg_c1"].' 0%, #'.$_POST["deg_c2"].' 100%)';
	$query_corp = "INSERT INTO parametres_corp (param,largeur,unite,couleur,degrade)
				VALUES(
				'".utf8_decode($_POST["option_c"])."',
				'".utf8_decode($_POST["largeur"])."',
				'".utf8_decode($_POST["unite"])."',
				'".utf8_decode('#'.$_POST["couleur_c"])."',
				'".$background_deg_c."')";
	mysql_query($query_corp);
		
	}
	
	}
	
	
	$meta = "SELECT * FROM meta_site";
	$req_meta  = mysql_query($meta ,$connect);
	$row_meta  = mysql_fetch_assoc($req_meta);	
	
	$page = "SELECT * FROM parametres_page";
	$req_page  = mysql_query($page ,$connect);
	$row_page  = mysql_fetch_assoc($req_page);	
	
	$liens = "SELECT * FROM parametres_liens";
	$req_liens  = mysql_query($liens ,$connect);
	$row_liens  = mysql_fetch_assoc($req_liens);	
	
	$police = "SELECT * FROM police";
	$req_police  = mysql_query($police ,$connect);
	$req_police2  = mysql_query($police ,$connect);
	$row_police  = mysql_fetch_assoc($req_police);
	$row_police2  = mysql_fetch_assoc($req_police);



	$pays = "SELECT * FROM pays ORDER BY pays ASC";
	$req_pays  = mysql_query($pays ,$connect);
	$row_pays  = mysql_fetch_assoc($req_pays);

	$type_site = "SELECT * FROM type_site";
	$req_type_site  = mysql_query($type_site ,$connect);
	$row_type_site  = mysql_fetch_assoc($req_type_site);

	$bg = "SELECT * FROM arriere_plan";
	$req_bg  = mysql_query($bg ,$connect);
	$row_bg  = mysql_fetch_assoc($req_bg);

	$corp = "SELECT * FROM parametres_corp";
	$req_corp  = mysql_query($corp ,$connect);
	$row_corp  = mysql_fetch_assoc($req_corp);
			
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="../js/functions.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="../css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="../css/colorpicker.css" type="text/css" />
<script type="text/javascript" src="../js/colorpicker.js"></script>
<script type="text/javascript" src="../js/eye.js"></script>
<script type="text/javascript" src="../js/utils.js"></script>
<script type="text/javascript" src="../js/layout.js?ver=1.0.2"></script>



<link type='text/css' href='../css/osx.css' rel='stylesheet' media='screen' />
<script type='text/javascript' src='../js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='../js/osx.js'></script>


<script type="text/javascript" src="js/supersized.3.1.3.core.min.js"></script>
<script type="text/javascript" src="js/superfish-compile.js"></script>
<script type="text/javascript" src="js/p2.js"></script>
<title>Param&egrave;tres 2</title>

</head>

<body>


<div id="content-wrapper"> 
	
	<!-- Container begin -->
	<div id="container"> 
		<!-- Header begin-->
		<div id="header" class="clearfix">
			<div id="logo" > <a href="http://www.agenceoneo.com/" target="_blank"><img src="../images/logo_oneo.png" alt="logo ONEO" /></a> </div>
			<ul class="sf-menu sf-js-enabled">
			<li><a href="../logout.php">D&eacute;connexion</a></li>
            </ul>
		</div>
		<!-- Header end --> 
		
		<!-- Main begin-->
		<div id="main" class="round_8 clearfix">
			<div class="page_title round_6">
				<h1 class="replace">Param&egrave;tres</h1>
			</div>
			<div id="content" class="left">
				<div class="col_312 alpha"> 
<form id="formID" class="formular" method="post" action="">
  <fieldset>
    <legend>IDENTIT&eacute; DU SITE (M&eacute;TA)</legend>
    <label> <span><strong>Nom du site : </strong></span>
      <input class="validate[required,length[0,100]] text-input" type="text" name="nom_site" id="nom_site" value="<?php echo utf8_encode($row_meta['nom_page']); ?>" />
    </label>
    
    <label> <span><strong>Descriptif :</strong></span>
      <textarea class="validate[required,length[6,300]] text-input" name="descriptif" id="descriptif" rows="3" cols="3"><?php echo utf8_encode($row_meta['descriptif']); ?></textarea>
    </label>
    <label> <span><strong>Mots cl&eacute;s (s&eacute;par&eacute;s par des virgules):</strong></span>
      <textarea class="validate[required,length[6,300]] text-input" name="mots_cles" id="mots_cles" rows="3" cols="3"><?php echo utf8_encode($row_meta['mot_cles']); ?></textarea>
    </label>
    </fieldset>
  <fieldset>
    <legend>Propri&eacute;t&eacute;s de la page</legend>
    <label> <span><strong>Police :</strong></span>
      <select name="police" id="police" style="width:100%;" >
        <option value="0">Police par defaut</option>
        <?php do{ ?>
        <option <?php if($row_page['police'] == $row_police['id']) { echo 'selected="selected"';} ?> value="<?php echo $row_police['id']; ?>"><?php echo $row_police['texte']; ?></option>
        <?php }while($row_police  = mysql_fetch_assoc($req_police)); ?>
      </select>
    </label>
    
     <label> <span><strong>Taille :</strong></span>
       <select name="taille" id="taille" style="width:100%; height:20px;"   class="validate[required]">
        <option value="<?php echo $row_page['taille']; ?>" style="font-size:<?php echo $row_page['taille']; ?>px;" selected="selected"><?php echo $row_page['taille']; ?>px</option>
        <option value="9" style="font-size:9px;">9px</option>
        <option value="10" style="font-size:10px;">10px</option>
        <option value="12" style="font-size:12px;">12px</option>
        <option value="14" style="font-size:14px;">14px</option>
        <option value="16" style="font-size:16px;">16px</option>
        <option value="18" style="font-size:18px;">18px</option>
        <option value="24" style="font-size:24px;">24px</option>
        <option value="36" style="font-size:36px;">36px</option>
       
      </select>
    </label>
    <label> <span><strong>Couleur du texte :</strong></span>
    <div id="colorpickerBlock10"><div style="background-color: <?php echo $row_page['couleur']; ?>"></div></div>
      <input type="text" name="couleur_page" id="colorpickerField10" readonly="readonly" style="left: 43px;position: relative;width: 60px;"  class="validate[required,length[0,100]] text-input" value="<?php echo substr($row_page['couleur'],1); ?>"/>
     </label>
  </fieldset>
  <fieldset>
    <legend>Propri&eacute;t&eacute;s des liens</legend>
    <label> <span><strong>Police :</strong></span>
      <select name="police_lien" id="police_lien" style="width:100%;" >
        <option value="0">Police par defaut</option>
        <?php do{ ?>
        <option <?php if($row_liens['police'] == $row_police2['id']) { echo 'selected="selected"';} ?> value="<?php echo $row_police2['id']; ?>"><?php echo $row_police2['texte']; ?></option>
        <?php }while($row_police2  = mysql_fetch_assoc($req_police2)); ?>
      </select>
    </label>
    <label> <span><strong>Taille des liens :</strong></span>
      <select name="taille_lien" id="taille_lien" style="width:100%; height:20px;" class="validate[required]">
         <option value="<?php echo $row_liens['taille']; ?>" style="font-size:<?php echo $row_liens['taille']; ?>px;" selected="selected"><?php echo $row_liens['taille']; ?>px</option>
        <option value="9" style="font-size:9px;">9px</option>
        <option value="10" style="font-size:10px;">10px</option>
        <option value="12" style="font-size:12px;">12px</option>
        <option value="14" style="font-size:14px;">14px</option>
        <option value="16" style="font-size:16px;">16px</option>
        <option value="18" style="font-size:18px;">18px</option>
        <option value="24" style="font-size:24px;">24px</option>
        <option value="36" style="font-size:36px;">36px</option>
       
      </select>
    </label>
      
    <label style="width:50%; float:left"> <span><strong>Couleur des liens :</strong></span>
    <div id="colorpickerBlock11"><div style="background-color: <?php echo $row_liens['couleur_lien']; ?>"></div></div>
    <input class="text-input" type="text" name="couleur_lien" id="colorpickerField11" readonly="readonly" style="left: 43px;position: relative;width: 60px;" value="<?php echo substr($row_liens['couleur_lien'],1); ?>" />
     </label>
     
    <label style="width:50%; float:left"> <span><strong>Couleur au survol :</strong></span>
    <div id="colorpickerBlock12"><div style="background-color: <?php echo $row_liens['couleur_survol']; ?>"></div></div>
      <input class="text-input" type="text" name="couleur_survol" id="colorpickerField12" readonly="readonly" style="left: 43px;position: relative;width: 60px;" value="<?php echo substr($row_liens['couleur_survol'],1); ?>" />
     </label>
    <label> <span><strong>Style :</strong></span>
      <select name="style_lien" id="style_lien" style="width:100%; height:20px;" class="validate[required]">
        <option value="underline">Toujours soulign&eacute;</option>
        <option value="none">Jamais soulign&eacute;</option>
        <option value="underline_hover">Afficher le soulignement pendant le survol uniquement</option>
        <option value="none_hover">Masquer le soulignement pendant le survol</option>
       
      </select>
      </label>
  </fieldset>
  <fieldset>
    <legend>ARRI&eacute;RE PLAN</legend>
    
     <label> <span><strong>Option d'arri&eacute;re plan :</strong></span>
      <select name="option_bg" id="option_bg" onChange="change_option_bg($(this).val())" style="width:100%;" >
        <option value="1" <?php if($row_bg['param']==1){echo 'selected="selected"';} ?>>Couleur uni</option>
        <option value="5" <?php if($row_bg['param']==5){echo 'selected="selected"';} ?>>Bicolore</option>
        <option value="2" <?php if($row_bg['param']==2){echo 'selected="selected"';} ?>>D&eacute;gard&eacute;</option>
        <option value="3" <?php if($row_bg['param']==3){echo 'selected="selected"';} ?>>Slider</option>
        <option value="4" <?php if($row_bg['param']==4){echo 'selected="selected"';} ?>>Video</option>
      </select>
      </label>
    <div id="bg_1" class="bg">
    <label> <span><strong>Couleur :</strong></span>
    <div id="colorpickerBlock1"><div style="background-color: <?php echo $row_bg['couleur']; ?>"></div></div>
      <input class="text-input" type="text" name="couleur" id="colorpickerField1" readonly="readonly" style="left: 43px;position: relative;width: 60px;" value="<?php echo substr($row_bg['couleur'],1); ?>" /></label>
      </div>
      <div id="bg_2" class="bg">
    <label style="float:left; width:100%"> <span><strong>D&eacute;grad&eacute; :</strong></span> </label>
     <label style="float:left; width:125px;"> 
    <div id="colorpickerBlock4"><div style="background-color: #0000ff"></div></div>
      <input class="text-input" type="text" name="deg1" id="colorpickerField4" readonly="readonly" style="left: 43px;position: relative;width: 60px;" />
       </label> <label style="float:left; width:125px;"> 
    <div id="colorpickerBlock5"><div style="background-color: #0000ff"></div></div>
      <input class="text-input" type="text" name="deg2" id="colorpickerField5" readonly="readonly" style="left: 43px;position: relative;width: 60px;" />
     </label>
     <div id="deg" style="background:<?php echo $row_bg['degrade']; ?>"></div>
     </div>
     <div id="bg_3" class="bg">
      <label> <span><strong>Images :</strong></span>
      <input type="button" src='<iframe src="../modules/uploader/uploadeur.php" width="600" height="600" frameborder="0"></iframe>' value="Fichiers" class="osx"/>
      </label>
      </div>
     <div id="bg_4" class="bg">
      <label> <span><strong>Video (mp4,flv):</strong></span>
      <input type="button" src='<iframe src="../modules/uploader/uploadeur_bg.php" width="600" height="600" frameborder="0"></iframe>' value="Fichiers" class="osx"/>
      </label>
      </div>
       <div id="bg_5" class="bg">
      
       <label> Hauteur de la couleur 1 (px) : </label>
   <label>
      <input class="text-input" type="text" name="hauteur" id="hauteur" value="<?php echo $row_bg['hauteur']; ?>"  />
     </label> 
        <label> Couleur 1 : </label>
   <label> <div id="colorpickerBlock13"><div style="background-color: <?php echo $row_bg['couleur1']; ?>"></div></div>
      <input class="text-input" type="text" name="coul1" id="colorpickerField13" readonly="readonly" style="left: 43px;position: relative;width: 60px;" value="<?php echo substr($row_bg['couleur1'],1); ?>"/>
     </label>
       
        <label>  Couleur 2 : </label>
   <label> <div id="colorpickerBlock14"><div style="background-color: <?php echo $row_bg['couleur2']; ?>"></div></div>
      <input class="text-input" type="text" name="coul2" id="colorpickerField14" readonly="readonly" style="left: 43px;position: relative;width: 60px;" value="<?php echo substr($row_bg['couleur2'],1); ?>"/>
     </label>
      </div>
      <script language="javascript">change_option_bg(<?php echo $row_bg['param']; ?>)</script>
    </fieldset>
  <fieldset>
    <legend>Corp du site</legend>
     <label> <span><strong>Largeur :</strong></span>
     
     
     
      <input class="validate[required,length[0,100]] text-input" type="text" name="largeur" id="largeur" style="width:30%" onKeyUp="$('#frame_thumb').contents().find('#max_width').val($(this).val());" value="<?php echo $row_corp['largeur']; ?>" />
            </label>
      <label>
      <select name="unite" id="unite" style="height: 27px;left: 114px;position: relative;top: -32px;width: 10%;margin-bottom: -20px;" >
        <option value="px" <?php if($row_corp['unite']=="px"){echo 'selected="selected"';} ?> >px</option>
        <option value="%" <?php if($row_corp['unite']=="%"){echo 'selected="selected"';} ?>>%</option>
      </select>
      </label>
      <label> <span><strong>Option d'arri&eacute;re plan du corp :</strong></span>
      <select name="option_c" id="option_c" onChange="change_option_c($(this).val())" style="width:100%;" >
        <option value="4" <?php if($row_corp['param']==4){echo 'selected="selected"';} ?>>Transparent</option>
        <option value="1" <?php if($row_corp['param']==1){echo 'selected="selected"';} ?>>Couleur uni</option>
        <option value="2" <?php if($row_corp['param']==2){echo 'selected="selected"';} ?>>D&eacute;gard&eacute;</option>
        <option value="3" <?php if($row_corp['param']==3){echo 'selected="selected"';} ?>>Image</option>
      </select>
      </label>
      
    <div id="bgc_1" class="bg">
      <label> <span><strong>Couleur :</strong></span>
    <div id="colorpickerBlock2"><div style="background-color: <?php echo $row_corp['couleur']; ?>"></div></div>
      <input class="text-input" type="text" name="couleur_c" id="colorpickerField2" readonly="readonly" style="left: 43px;position: relative;width: 60px;" value="<?php echo substr($row_corp['couleur'],1); ?>" />
    </label>
    </div>
    
    <div id="bgc_2" class="bg">
    <label style="float:left; width:100%"> <span><strong>D&eacute;grad&eacute; :</strong></span> </label>
     <label style="float:left; width:125px;"> 
    <div id="colorpickerBlock6"><div style="background-color: #0000ff"></div></div>
      <input class="text-input" type="text" name="deg_c1" id="colorpickerField6" readonly="readonly" style="left: 43px;position: relative;width: 60px;" />
       </label> <label style="float:left; width:125px;"> 
    <div id="colorpickerBlock7"><div style="background-color: #0000ff"></div></div>
      <input class="text-input" type="text" name="deg_c2" id="colorpickerField7" readonly="readonly" style="left: 43px;position: relative;width: 60px;" />
     </label>
     <div id="deg_c" style="background:<?php echo $row_corp['degrade']; ?>"></div>
    </div>
    
    <div id="bgc_3" class="bg">
      <label> <span><strong>Image :</strong></span>
      <input type="button" src='<iframe src="../upload_crop.php?mode=corp" width="600" height="600" frameborder="0"></iframe>' value="Fichiers" class="osx"/>
     <!--<div id="thumb_img" style="float:left; position:relative; overflow:hidden; width:100px; height:100px;"></div>-->
	 </label>
    </div>
    <script language="javascript">change_option_c(<?php echo $row_corp['param']; ?>);</script>
    </fieldset>
  <p>
    <input class="submit fancy" type="button" value="<< Retour au site" onClick="document.location.href='../index.php'" style="float:left" />
  <input type="hidden" name="action" value="etatp2" />
    <input class="submit fancy" type="submit" value="Modifier" />
  </p>
  <hr/>
 
</form>			
				</div>
				
				<div class="clear"></div>
			</div>
			
		</div>
		<!-- Main end --> 
		<!-- Footer begin -->
		<div id="footer" class="round_8 clearfix">
		  <div id="footer-bottom">
				<div id="footer-note" class="right"><small>©2012 Copyright <a href="http://www.agenceoneo.com/" target="_blank"><strong>Oneo</strong></a>. Tous droits r&eacute;s&eacute;rv&eacute;s</small></div>
		  </div>
	  </div>
		<!-- Footer end --> 
	</div>
	<!-- Container end --> 
</div>







<!-- modal content -->
		<div id="osx-modal-content">
			<div id="osx-modal-title">Contenu à changer</div>
			<div class="close"><a href="#" class="simplemodal-close">x</a></div>
			<div id="osx-modal-data">
			</div>
		</div>
        
</body>
</html>
