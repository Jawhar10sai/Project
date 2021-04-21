<?php  
include_once('../../config/connect.php');
include("../../functions/reglages.php"); 
include("../../functions/function.php"); 
		
	$idsite = $_GET['site'];
	$id_flux = $_GET['id_flux'];
	$id_bloc= $_GET['id_bloc']; 
	
	
    $param_page = "SELECT * FROM parametres_page where id_site = '".$idsite."'";
	$req_param_page  = mysql_query($param_page ,$connect);
	$row_param_page = mysql_fetch_assoc($req_param_page);
	
	$flux_actu = "SELECT * FROM flux_actu WHERE id_flux = '".$id_flux."'";
	$req_flux_actu  = mysql_query($flux_actu ,$connect);
	$row_flux_actu  = mysql_fetch_array($req_flux_actu);
	$num_flux_actu  = mysql_num_rows($req_flux_actu);
	
	
	$flux = "SELECT * FROM flux where id = '".$id_flux."'";
	$req_flux  = mysql_query($flux ,$connect);
	$row_flux  = mysql_fetch_assoc($req_flux);
	
	if($session == 'ok'){
	$lien_plus = '&mode=show';
	}else{
	$lien_plus = '';
	}
		 
?>

<!DOCTYPE html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <!-- get jQuery from the google apis -->
    <script type="text/javascript" src="services-plugin/js/jquery.js"></script>


    <!-- CSS STYLE -->
    <link rel="stylesheet" type="text/css" href="services-plugin/css/style.css" media="screen" />


     <!-- ANIMATE AND EASING LIBRARIES -->
	<script type="text/javascript" src="services-plugin/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="services-plugin/js/jquery.cssAnimate.mini.js"></script>

	<!-- TOUCH AND MOUSE WHEEL SETTINGS -->
	<script type="text/javascript" src="services-plugin/js/jquery.touchwipe.min.js"></script>
	<script type="text/javascript" src="services-plugin/js/jquery.mousewheel.min.js"></script>

	<!-- jQuery SERVICES Slider  -->
	<script type="text/javascript" src="services-plugin/js/jquery.themepunch.services.min.js"></script>
	<link rel="stylesheet" type="text/css" href="services-plugin/css/settings.css" media="screen" />

<style type="text/css">
body {
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
#services-example-<?php echo $id_bloc; ?> .main-container,#services-example-<?php echo $id_bloc; ?> .main-container .slider_holder{
	width:100% !important;
	}
#services-example-<?php echo $id_bloc; ?> li h2{

	color: <?php echo $row_flux['couleur_titre_article']; ?>;
	font-size:<?php echo $row_flux['taille_titre_article']; ?>px;
	text-decoration: none;
	border-bottom:1px solid <?php echo $row_flux['couleur_sep']; ?>;
	float:right;
	<?php if($row_flux['show_img'] != 1){ ?>
	width:100%;
	<?php }else{ ?>
	width:68%;
	<?php } ?>
	<?php if($row_flux['only_title'] != 1){ ?>
	
	display:none;
	<?php } ?>
	
	}

#services-example-<?php echo $id_bloc; ?> li h2:hover {
	color: <?php echo $row_flux['couleur_titre_article']; ?>;
	font-size:<?php echo $row_flux['taille_titre_article']; ?>px;
	text-decoration: none;
}
#services-example-<?php echo $id_bloc; ?> li div.dat,#services-example-<?php echo $id_bloc; ?> li a,#services-example-<?php echo $id_bloc; ?> li a:hover {
	font-size:<?php echo $row_flux['taille_date']; ?>px;
	margin: 5px 0 0 0;
	float:right;
	<?php if($row_flux['show_img'] != 1){ ?>
	width:100%;
	<?php }else{ ?>
	width:68%;
	<?php } ?>
}
#services-example-<?php echo $id_bloc; ?> li div.dat {
	<?php if($row_flux['show_date'] == 0){ ?>
	display:none;
	<?php } ?>
	border-bottom:1px solid  <?php echo $row_flux['couleur_sep']; ?>;
	color: <?php echo $row_flux['couleur_date']; ?>;
}
#services-example-<?php echo $id_bloc; ?> li a,#services-example-<?php echo $id_bloc; ?> li a:hover {
	color: <?php echo $row_flux['couleur_lien']; ?>;
	<?php if($row_flux['show_date'] == 0 && $row_flux['show_texte'] == 0 && $row_flux['only_title'] == 0){ ?>
	width:100%;
	margin:0;
	<?php } ?>
}
#services-example-<?php echo $id_bloc; ?> li p {
	text-align:justify;
	<?php if($row_flux['show_texte'] != 1){ ?>
	display:none;
	<?php } ?>
	color: <?php echo $row_flux['couleur_texte']; ?>;
	font-size:<?php echo $row_flux['taille_texte']; ?>px;
	<?php if($row_flux['show_img'] != 1){ ?>
	width:100%;
	<?php } ?>
	margin: 5px 0 0 0;
}
#services-example-<?php echo $id_bloc; ?> li .thumb {  
<?php if($row_flux['show_img'] != 1){ ?>
	display:none;
	<?php } ?>
	width:99%;
	border: <?php echo $row_flux['taille_bordure']; ?>px solid <?php echo $row_flux['couleur_bordure']; ?> !important;
	 }
	 #services-example-<?php echo $id_bloc; ?> li .imgholder {  

	 <?php if($row_flux['show_date'] == 0 && $row_flux['show_texte'] == 0 && $row_flux['only_title'] == 0){ ?>
	width:100%;
	margin:0;
	<?php } ?>

	 }
	<?php if($row_flux['show_fleches'] == 0){ ?>
	.toolbar{visibility:hidden}
	.theme1 .main-container{ padding:0;}
	
	
<?php }else{ ?>
	.toolbar{visibility:visible;}
	.theme1 .main-container{ padding:0 30px;}
	
<?php } ?>
</style>
</head>
<body>

<?php 
if($num_flux_actu > 0){  ?>



					<div id="services-example-<?php echo $id_bloc; ?>" class="theme1">
						<ul>

    <?php do{
			
	$actu = "SELECT * FROM article WHERE id = '".$row_flux_actu['id_actu']."'";
	$req_actu  = mysql_query($actu ,$connect);
	$row_actu  = mysql_fetch_assoc($req_actu);
	
	
 $articles_couverture = "SELECT * FROM slider_article where id_article='".$row_flux_actu['id_actu']."' AND Couverture ='1'";
			$req_articles_couverture = mysql_query($articles_couverture ,$connect);
			$row_articles_couverture = mysql_fetch_assoc($req_articles_couverture);
			$num_articles_couverture = mysql_num_rows($req_articles_couverture);
		
	
		?>
    
    
    
    <li>
    							<?php if($num_articles_couverture > 0 && $row_articles_couverture['images'] != ''){ ?>
								<img class="thumb" src="<?php echo SITEPATH; ?>uploads/site_<?php echo $idsite; ?>/blog/min/<?php 
		echo end(explode("/", strip_tags($row_articles_couverture['images'])));
		 ?>" onClick="window.parent.document.location.href='<?php echo SITEPATH.get_name_page($idsite,$row_actu['id_page']); ?>&article=<?php echo $row_actu['id'].$lien_plus; ?>'">
								<?php }else{ ?>
                                <img class="thumb" src="<?php echo SITEPATH; ?>images/no_image.png" onClick="window.parent.document.location.href='<?php echo SITEPATH.get_name_page($idsite,$row_actu['id_page']); ?>&article=<?php echo $row_actu['id'].$lien_plus; ?>'">
                                <?php } ?>
								<h2><?php 
								echo $row_actu['Titre'.$lang_table];
								?></h2>
              <div class="dat"><?php echo $row_actu['Date_creation']; ?></div>
              <p>
			<?php  if($_SESSION['lang']== 'ar'){
			  echo cleanCut(stripslashes(htmlentities($row_actu['Texte'.$lang_table])),80);  
			  }else{
			  echo cleanCut(utf8_encode(stripslashes(strip_tags($row_actu['Texte'.$lang_table]))),80);
			  }
			   ?></p>
								<?php if($row_flux['detail']==1) {?><a class="buttonlight morebutton" target="_parent" href="<?php echo SITEPATH.get_name_page($idsite,$row_actu['id_page']); ?>&detail=<?php echo $row_actu['id'].$lien_plus?>">|| Voir Plus</a>
								<?php }?>
							</li>
    
    <?php	}while($row_flux_actu  = mysql_fetch_assoc($req_flux_actu));


?>

						</ul>

						<!--	###############		-	TOOLBAR (LEFT/RIGHT) BUTTONS	-	###############	 -->
						<div class="toolbar">
							<div class="left"></div><div class="right"></div>
						</div>
					</div>

			

            	


			<!--
			##############################
			 - ACTIVATE THE BANNER HERE -
			##############################
			-->
			<?php if ($row_flux["style"] == 0 ){ ?>
			<script type="text/javascript">

				$(document).ready(function() {
					$.noConflict();

					jQuery('#services-example-<?php echo $id_bloc; ?>').services(
						{
							<?php if($row_flux['show_fleches'] == 0){ ?>
							width:<?php if($row_flux['largeur'] > 0){echo $row_flux['largeur'];}else{ echo '690';} ?>,
							<?php }else{ ?>
							width:<?php if($row_flux['largeur'] > 0){echo ($row_flux['largeur']-60);}else{ echo '690';} ?>,
							<?php } ?>
							height:<?php if($row_flux['hauteur'] > 0){echo $row_flux['hauteur'];}else{ echo '150';} ?>,
							slideAmount:<?php if($row_flux['nombre'] > 0){echo $row_flux['nombre'];}else{ echo '3';} ?>,
							slideSpacing:30,
							touchenabled:"on",
							mouseWheel:"on",
							hoverAlpha:"off",
							slideshow:<?php if($row_flux['boocle'] != 0){echo ($row_flux['vitesse']*1000);}else{ echo '0';} ?>,
							hovereffect:"Off",
							callBack:function() { }

						});

				


			});
			</script>
			<?php }else{ ?>
			<style>
			body{ margin:0; padding:0;}
			.toolbar,#services-example-<?php echo $id_bloc; ?> li a.buttonlight{ display:none;}
			#services-example-<?php echo $id_bloc; ?> li p,#services-example-<?php echo $id_bloc; ?> li h2, #services-example-<?php echo $id_bloc; ?> li div.dat{ float:left !important; margin:0 !important; border:none !important;}
			.theme1 > ul {
				margin:0; padding:0;
                visibility: visible;
            }
			#services-example-<?php echo $id_bloc; ?> li {
			    padding-bottom: 15px;
				overflow: auto;
			}
			#services-example-<?php echo $id_bloc; ?> li h2 {
			    float: none;
				margin: 5px 0px;
			}
			#services-example-<?php echo $id_bloc; ?> li a, #services-example-<?php echo $id_bloc; ?> li a:hover {
                width: auto;
				margin-right: 10px;
            }
			.theme1 .thumb{ padding:0 !important;}
			</style>
            <?php } ?>

<?php }else{
		echo "Pas d'actualités en Flux!";
		
		}
?>

	</body>

</html>
