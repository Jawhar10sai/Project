<?php 


   $slider = "SELECT * FROM slider WHERE id_site = '".$idsite."' ORDER BY id ASC";
	$req_slider  = mysql_query($slider ,$connect);
	$row_slider = mysql_fetch_assoc($req_slider);
	$num_slider = mysql_num_rows($req_slider);
	
    $parametres_slider = "SELECT * FROM parametres_slider WHERE id_site = '".$idsite."' ";
	$req_parametres_slider  = mysql_query($parametres_slider ,$connect);
	$row_parametres_slider = mysql_fetch_assoc($req_parametres_slider);
	$num_parametres_slider = mysql_num_rows($req_parametres_slider);
	

if($num_parametres_slider > 0 && $row_parametres_slider['active'] == 1){
?>

    <link rel="stylesheet" href="modules/slider/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="modules/slider/nivo-slider.css" type="text/css" media="screen" />
    <style type="text/css">
#module_slider{
	margin-top:<?php echo $row_parametres_slider['marge_top']; ?>px;
	margin-bottom:<?php echo $row_parametres_slider['marge_bottom']; ?>px;
	<?php if($row_parametres_slider['format'] != 'default'){ ?>height:<?php echo $row_parametres_slider['format']; ?>;<?php } ?>
	<?php if($emplcement_menu == 3 || $emplcement_menu == 4){?>width:80%;<?php } ?>
}
#module_slider #wrapper{
	height:auto !important;
}
#module_slider #wrapper .slider-wrapper{
	height:auto !important;
	}
<?php if($row_parametres_slider['ombre'] == 1){ ?>
.theme-default .nivoSlider {
    -webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;
    -moz-box-shadow: 0px 1px 5px 0px #4a4a4a;
    box-shadow: 0px 1px 5px 0px #4a4a4a;
}
<?php } ?>
</style>
<div id="module_slider" class="<?php if($session == 'ok'){ ?>propriete <?php } ?>"  >
<?php if($session == 'ok'){ ?>  
<input type="button" value="" src='<iframe src="modules/slider/param_slider.php?idsite=<?php echo $idsite; ?>" width="650" height="600" frameborder="0"></iframe>' class="osx modif info-bulle-css" title="Param&eacute;tres Slider">
  <?php } ?>
    <div id="wrapper" <?php if($row_parametres_slider['format'] != 'default'){ ?>style="height:<?php echo $row_parametres_slider['format']; ?>" <?php } ?>>
      
      <?php if($num_slider > 0){ ?>
      
        <div class="slider-wrapper theme-default" <?php if($row_parametres_slider['format'] != 'default'){ ?>style="height:<?php echo $row_parametres_slider['format']; ?>" <?php } ?>>
            <div id="slider" class="nivoSlider" <?php if($row_parametres_slider['format'] != 'default'){ ?>style="height:<?php echo $row_parametres_slider['format']; ?>" <?php } ?>>
            <?php 
			do{ ?>
            
                <img src="<?php echo SITEPATH; ?>uploads/site_<?php echo $idsite; ?>/slider/<?php echo $row_slider['images']; ?>" data-thumb="<?php echo SITEPATH; ?>uploads/site_<?php echo $idsite; ?>/slider/<?php echo $row_slider['images']; ?>"  <?php if($row_slider['descriptif']){ ?>alt="<?php echo $row_slider['descriptif']; ?>" title="<?php echo $row_slider['descriptif']; ?>"<?php } ?> />
                
                <?php }while($row_slider = mysql_fetch_assoc($req_slider));
				
				
			?>
                           </div>
        </div>
<?php }else{ 

if($session == 'ok'){?>

<div style="width:100%; height:40px; padding:80px 0; float:left; text-align:center;">Vous n'avez pas encors charger vos images<br />
<div style="color:#000; width:100%; text-align:center" src='<iframe src="modules/uploader/uploadeur_slider.php?etat=false" width="650" height="600" frameborder="0"></iframe>' class="osx menu_admin btn info-bulle-css" title="Cliquer ici pour charger vos images">Cliquer ici pour charger vos images</div>
</div>


<?php			}else{?>
	<div style="width:100%; height:40px; padding:80px 0; float:left; text-align:center;">Slider vide</div>
<?php 	}}
			?>
    </div>
    
    </div>
    
    
    <?php } ?>
	
