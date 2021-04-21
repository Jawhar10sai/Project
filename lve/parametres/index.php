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
	
	if(isset($_POST["action"]) && $_POST["action"] == "etatp1"){
		
		
		
 $update= "UPDATE parametres_site SET nom_societe = '".utf8_decode($_POST["societe"])."', nom_resp=  '".utf8_decode($_POST["nom"])."', prenom_resp=  '".utf8_decode($_POST["prenom"])."', tel_resp=  '".utf8_decode($_POST["telephone"])."', email_resp=  '".utf8_decode($_POST["email"])."', idpays=  '".utf8_decode($_POST["pays"])."', type_site=  '1', secteur=  '".$_POST["secteur"]."'";
$queryUpdate1=mysql_query($update) or die("erreur".mysql_error());

	

		}
		
		$param = "SELECT * FROM parametres_site";
	$req_param  = mysql_query($param ,$connect);
	$row_param  = mysql_fetch_assoc($req_param);


	$pays = "SELECT * FROM pays ORDER BY pays ASC";
	$req_pays  = mysql_query($pays ,$connect);
	$row_pays  = mysql_fetch_assoc($req_pays);


	$secteur = "SELECT * FROM secteur";
	$req_secteur  = mysql_query($secteur ,$connect);
	$row_secteur  = mysql_fetch_assoc($req_secteur);
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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


<script type="text/javascript" src="js/supersized.3.1.3.core.min.js"></script>
<script type="text/javascript" src="js/superfish-compile.js"></script>
<script type="text/javascript" src="js/p2.js"></script>



<script language="javascript">

function get_indicatif(idpays){
	newid = $.ajax({
          url: "../functions/get_indicatif.php",
		  data:"idpays="+idpays,
          async: false
         }).responseText;
		$("#indicatif").val(newid);
		
}
</script>
<title>Param&egrave;tres 1</title>
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
				<h1 class="replace">Informations</h1>
			</div>
			<div id="content" class="left">
				<div class="col_312 alpha"> 
<form id="formID" class="formular" method="post" action="">

    <label> <span><strong>Soci&eacute;t&eacute; : </strong></span>
      <input class="validate[required,length[0,100]] text-input" type="text" name="societe" id="societe" value="<?php echo utf8_encode($row_param['nom_societe']); ?>" tabindex="1" />
    </label>
    <label> <span><strong>S&eacute;cteur d'activit&eacute; :</strong></span>
      <select name="secteur" id="secteur"  class="validate[required] text" style="width:100%" >
        <option value="">Votre s&eacute;cteur d'activit&eacute;</option>
        <?php do{ ?>
        <option value="<?php echo $row_secteur["id"];?>" <?php if($row_param['secteur'] == $row_secteur["id"]) { echo 'selected="selected"';} ?>><?php echo utf8_encode($row_secteur["secteur"]); ?></option>
        <?php }while($row_secteur  = mysql_fetch_assoc($req_secteur));?>
      </select></label>
    <label> <span><strong>Nom : </strong></span>
      <input class="validate[required,length[0,100]] text-input" type="text" name="nom" id="nom" value="<?php echo utf8_encode($row_param['nom_resp']); ?>" tabindex="2"  />
    </label>
    <label> <span><strong>Pr&eacute;nom : </strong></span>
      <input class="validate[required,length[0,100]] text-input" type="text" name="prenom" id="prenom"  value="<?php echo utf8_encode($row_param['prenom_resp']); ?>" tabindex="3" />
    </label>
    <label> <span><strong>Pays :</strong></span>
      <select name="pays" id="pays"  class="validate[required]" style="width:100%" onChange="get_indicatif($(this).val())" tabindex="4"  >
        <option value="">Choisissez votre Pays</option>
        <?php do{ ?>
        <option <?php if($row_param['idpays'] == $row_pays["idpays"]) { echo 'selected="selected"';} ?> value="<?php echo $row_pays["idpays"];?>"><?php echo utf8_encode($row_pays["pays"]); ?></option>
        <?php }while($row_pays  = mysql_fetch_assoc($req_pays));?>
      </select>
    </label>
    <label> <span><strong>Indicatif : </strong></span>
      <input class="text-input" type="text" name="indicatif"  id="indicatif" disabled="disabled" />
    </label>
    <label> <span><strong>T&eacute;l&eacute;phone : </strong></span>
      <input class="validate[required,custom[telephone]] text-input" type="text" name="telephone"  id="telephone"  value="<?php echo $row_param['tel_resp']; ?>" tabindex="5" />
    </label>
    <label> <span><strong>Email  :</strong></span>
      <input class="validate[required,custom[email]] text-input" type="text" name="email" id="email"   value="<?php echo $row_param['email_resp']; ?>" tabindex="6" />
    </label>
  <p>
    <input class="submit fancy" type="button" value="<< Retour au site" onClick="document.location.href='../index.php'" style="float:left" />
  <input type="hidden" name="action" value="etatp1" />
    <input class="submit fancy" type="submit" value="Modifier" />
  </p>
  <hr/>
 
</form>
					
		<script language="javascript">
get_indicatif('<?php echo $row_param['idpays']; ?>');
</script>			
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


</body>
</html>
