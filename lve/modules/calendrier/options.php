<?php
include_once('../../config/connect.php');

$id_cal   = $_GET["id_cal"];

	//Parametres menu
	
	
	if(isset($_POST["action"]) && $_POST["action"] == "option_cal"){
	
	
	$parametres_menu = "SELECT * FROM parametres_agenda where id_cal = '".$id_cal."'";
	$req_parametres_menu  = mysql_query($parametres_menu,$connect);
	$exist_parametres_menu  = mysql_num_rows($req_parametres_menu);
	
	if($exist_parametres_menu > 0){
				
	$update9= "UPDATE parametres_agenda	SET couleur_t = '#".utf8_decode($_POST["couleur_t"])."',couleur_today = '#".utf8_decode($_POST["couleur_today"])."',couleur_event = '#".utf8_decode($_POST["couleur_event"])."' where id_cal = '".$id_cal."'";
	$queryUpdate9=mysql_query($update9) or die("erreur".mysql_error());
		
	}else{
	
	$query_menu = "INSERT INTO parametres_agenda (id_cal,couleur_t,couleur_today,couleur_event)
				VALUES(
				'".utf8_decode($id_cal)."',
				'#".utf8_decode($_POST["couleur_t"])."',
				'#".utf8_decode($_POST["couleur_today"])."',
				'#".utf8_decode($_POST["couleur_event"])."')";
	mysql_query($query_menu);
	
	}
	?>
	<script language="javascript">
	document.location.reload();
	parent.document.location.reload();
	</script>
	
	<?php
	
	}

	$param_agenda = "SELECT * FROM parametres_agenda where id_cal = '".$id_cal."'";
	$req_param_agenda  = mysql_query($param_agenda ,$connect);
	$row_param_agenda  = mysql_fetch_assoc($req_param_agenda);

	
?>
<link rel="stylesheet" href="../../css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="../../js/jquery.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/colorpicker.css" type="text/css" />
<script type="text/javascript" src="../../js/colorpicker.js"></script>
<script type="text/javascript" src="../../js/eye.js"></script>
<script type="text/javascript" src="../../js/utils.js"></script>
<script type="text/javascript" src="../../js/layout.js?ver=1.0.2"></script>
<link type='text/css' href='../../css/osx.css' rel='stylesheet' media='screen' />
<script type='text/javascript' src='../../js/osx.js'></script>
<script src="../../js/functions.js" type="text/javascript"></script>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div id="wrap">
<div class="main-content">
	<div class="header" >
		<div class="hdrl"></div>
		<div class="hdrr"></div>
		<h2>Options Calendrier</h2>
	</div>
	<div class="block" style="padding:5px;">
		
		<form id="formID" class="formular" method="post" action="">

     <label style="width:100%; float:left">
     <span><strong>Couleur de texte :</strong></span>
     <div id="texte"></div>
    <div id="colorpickerBlock1"><div style="background-color: <?php echo $row_param_agenda['couleur_t']; ?>"></div></div>
      <input class="text-input" type="text" name="couleur_t" id="colorpickerField1" readonly="readonly" style="left: 43px;position: relative;width: 60px;" value="<?php echo substr($row_param_agenda['couleur_t'],1); ?>" />
      
     </label>
      <label style="width:100%; float:left">
     <span><strong>Couleur de fond (Ajourd'hui) :</strong></span>
     <div id="texte"></div>
    <div id="colorpickerBlock2"><div style="background-color: <?php echo $row_param_agenda['couleur_today']; ?>"></div></div>
      <input class="text-input" type="text" name="couleur_today" id="colorpickerField2" readonly="readonly" style="left: 43px;position: relative;width: 60px;" value="<?php echo substr($row_param_agenda['couleur_today'],1); ?>" />
      
     </label>
     <label style="width:100%; float:left"> <span><strong>Couleur de fond (èvénement) :</strong></span>
     <div id="texte2_s"></div>
  <div id="colorpickerBlock3"><div style="background-color: <?php echo $row_param_agenda['couleur_event']; ?>"></div></div>
      <input class="text-input" type="text" name="couleur_event" id="colorpickerField3" readonly="readonly" style="left: 43px;position: relative;width: 60px;" value="<?php echo substr($row_param_agenda['couleur_event'],1); ?>" />
     </label>
       <p>
  <input type="hidden" name="action" value="option_cal" />
  <input type="hidden" name="id_cal" value="<?php echo $id_cal; ?>" />
    <input class="submit" type="submit" value="Modifier" style="float:left;" />
    </p>
 </form>
	</div>
	<div class="bdrl"></div>
	<div class="bdrr"></div>
</div>

<?php require_once('footer.php') ?>