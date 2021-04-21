<?php
 include("functions/reglages.php"); 
include_once('wmailer/class.mailer.php');

if(isset($_GET['validate']) && !empty($_GET['validate'])){
	
	include_once('config/connect.php');
	$validate=split("_",$_GET['validate']);
	$id_compte=$validate[0];
	$id_user=$validate[1];
	
	$compte = "SELECT * FROM compte where id_account = $id_compte";
	$req_compte  = mysql_query($compte ,$connect);
	$row_compte  = mysql_fetch_assoc($req_compte);
	
	$user = "SELECT * FROM utilisateurs where id_user = $id_user";
	$req_user  = mysql_query($user ,$connect);
	$row_user  = mysql_fetch_assoc($req_user);
	
	if(isset($_POST['activer'])){

		$etat=isset($_POST['Etat'])? 1 : 0;
		
		$query_client = "update `compte` set `Status`='$etat' where id_account='$id_compte'";
		mysql_query($query_client);
		
		$query_user = "update `utilisateurs` set `Status`='$etat' where Societe='$id_compte'";
		mysql_query($query_user);
		//echo $row_user['Email'];
			$mailer = new Mailer();
			$mailer->set_priority('Highest');
			$mailer->set_from("contact@oneo.ma");
			$mailer->set_address($row_user['Email']);
			$mailer->set_format('html');
			$mailer->set_subject(utf8_decode('Notification de cr&eacute;ation de compte'));
			$message = 'Bonjour '.$row_user['Nom'].' '.$row_user['Prenom'].',<br /><br />';
			$message .= "<p>Votre compte a été activé</p>";
			$message .= '<br/>Bien cordialement,<br /><br />';
			$htmlmessage = $message;
			$mailer->set_message(utf8_decode($htmlmessage), array('TAG1' => ''));
			$mailer->send();

	}
	?>
    <script language="javascript">
	document.location.href='/';
    </script>
    
    
    <?php
	
	}else{
		header('loaction:index.php'); 
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Model_back_office.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo SITEPATH; ?>css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="<?php echo SITEPATH; ?>js/jquery.js" type="text/javascript"></script>
<script src="<?php echo SITEPATH; ?>js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="<?php echo SITEPATH; ?>js/functions.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo SITEPATH; ?>install/js/supersized.3.1.3.core.min.js"></script>
<script type="text/javascript" src="<?php echo SITEPATH; ?>install/js/superfish-compile.js"></script>
<script type="text/javascript" src="<?php echo SITEPATH; ?>install/js/p2.js"></script>
<link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/eye.js"></script>
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/utils.js"></script>
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/layout.js?ver=1.0.2"></script>
<link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>install/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo SITEPATH; ?>js/smoothness/jquery-ui-1.8.1.custom.css" />
<script type="text/javascript" src="<?php echo SITEPATH; ?>js/smoothness/jquery-ui-1.8.1.custom.min.js"></script>
<script type='text/javascript' src='<?php echo SITEPATH; ?>js/functions.js'></script>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Validation de compte</title>
<!-- InstanceEndEditable -->
<script language="javascript">
$(document).ready(function(){});
</script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>


<div id="content-wrapper"> 
	
	<!-- Container begin -->
	<div id="container"> 
		<!-- Header begin-->
		<div id="header" class="clearfix">
       
			<div id="logo" > <a href="/"><img src="<?php echo SITEPATH; ?>images/logo_oneo_web.png" alt="logo ONEO" /></a> </div>
<?php if((isset($_SESSION['login']) && isset($_SESSION['User']) && isset($_SESSION['Role'])) && !empty($_SESSION['login']) && !empty($_SESSION['User']) && !empty($_SESSION['Role'])){
?>
            <ul class="sf-menu sf-js-enabled">
			<li><a href="<?php echo SITEPATH; ?>logout.php" class="logout"></a></li>
            </ul>		
            
			<?php } ?>
            
            </div>
		<!-- Header end --> 
		
		<!-- Main begin-->
		<div id="main" class="round_8 clearfix">
			<div class="page_title round_6">
				<h1 class="replace"><!-- InstanceBeginEditable name="Titre" -->Activer l'utilisateur<!-- InstanceEndEditable --></h1>
		  </div>
			<div id="content" class="left">
				
				<div class="col_312 alpha"><!-- InstanceBeginEditable name="Contenu" -->
                <form id="form1" name="form1" method="post" action="">
                
				<p>Soci&eacute;t&eacute; :<?php echo $row_compte["Societe"]; ?></p>
				<p>S&eacute;cteur d'activit&eacute; :	<?php echo $row_compte["Secteur_activite"]; ?>			  </p>
				<p>Nom :<?php echo $row_user["Nom"]; ?></p>
				<p>Pr&eacute;nom :		<?php echo $row_user["Prenom"]; ?>		  </p>
				<p>Pays :<?php echo $row_compte["Pays"]; ?></p>
				<p>T&eacute;l&eacute;phone :		<?php echo $row_compte["Telephone"]; ?>		  </p>
				<p>Email : <?php echo $row_compte["Email"]; ?></p>
                <p>Etat : <input type="checkbox" name="Etat" id="Etat" <?php if($row_compte["Status"]) echo 'checked="checked"'; ?> /></p>

				

				<input type="submit" value="Enregistrer" class="submit fancy" name="activer" />
                </form>
				<!-- InstanceEndEditable --> 
					
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
<!-- InstanceEnd --></html>

