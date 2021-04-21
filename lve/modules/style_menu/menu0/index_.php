<?php if($num_param_bloc_menu > 0){
	
	$espace_horizontal = $row_param_bloc_menu['espace_horizontal']; 
	
	?>
    	<?php if($row_param_bloc_menu['style'] == 1){ ?>	
    <style>
	#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li{
		margin:0 <?php echo ($row_param_bloc_menu['espace_horizontal']/2); ?>px !important ;
		
		}
		#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.first{
			margin-left:0 !important;}
		#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.last{
			margin-right:0 !important;}
	
	</style>
    	<?php } ?>	
    <script language="javascript">
	$(document).ready(function(){
   $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu a').css({'color' : "none",'background' : "transparent"});
		
		
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu, .sf-menu *').css({'margin' : '0', 'margin' : '0', 'list-style' : 'none'});
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu').css('line-height' , '1.0');
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu ul').css({'position' : 'absolute', 'top' : '100%', 'width' : 'auto','display':'none'});
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu ul li').css('width','100%');
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu ul li').hover(function(){
		$(this).css('visibility','inherit');
		});
	<?php if($row_param_bloc_menu['style'] == 1){ ?>	
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li').css('margin' , "0 <?php echo ($row_param_bloc_menu['espace_horizontal']/2); ?>px" );
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.first').css('marginLeft','0');
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.last').css('marginRight','0');
	
	<?php }else{ ?>
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li').css( 'margin' , "<?php echo ($row_param_bloc_menu['espace_vertical']/2); ?>px 0");
	
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.first').css('marginTop','0');
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.last').css('marginBottom','0');
	
	<?php } ?>
	
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li').css('float','<?php if($_SESSION['lang']== 'ar'){ echo 'right'; }else{ echo 'left';}  ?>');
	<?php if($row_param_bloc_menu['style'] == 2){ ?>
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li').css({ 'marginBottom' : "1px", 'width' : "100%" });
	<?php } ?>
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu a').css({ 'display' : "block", 'float' : "left" , 'padding' : "inherit" });
	
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li').hover(function()
   {
      $(this).find('ul').css('z-index','99');
   },function()
   {
      $(this).find('ul').css('z-index','99');
   })
	
	
	
	<?php if($row_param_bloc_menu['style'] == 1){ ?>
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li').hover(function()
   {
      $(this).find('ul').css({'background':'none', 'top' : "100%",<?php if($_SESSION['lang']== 'ar'){ ?> 'right' : "0" <?php }else{ ?> 'left' : "0"  <?php }?>});
	  //$(this).find('ul').slideDown();
	  $(this).find('ul').show();
   }, function()
   {
	  //$(this).find('ul').slideUp();
	  $(this).find('ul').hide();
      $(this).find('ul').css({ 'top' : "100%",<?php if($_SESSION['lang']== 'ar'){ ?> 'right' : "0" <?php }else{ ?> 'left' : "0"  <?php }?>});
   })
	<?php }else{ ?>
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li').hover(function()
   {
	  $(this).find('ul').show();
      $(this).find('ul').css({'background':'none','top' : "0",<?php if($_SESSION['lang']== 'ar'){ ?> 'right' : "100%" <?php }else{ ?> 'left' : "100%"  <?php }?>});
   }, function()
   {
	  $(this).find('ul').hide();
      $(this).find('ul').css({ 'top' : "0",<?php if($_SESSION['lang']== 'ar'){ ?> 'right' : "100%" <?php }else{ ?> 'left' : "100%"  <?php }?>});
   })
   $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu').css('width','100%');
	<?php } ?>
	
	<?php if($row_param_bloc_menu['position_menu']== 3){ ?>
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu').css('float','right');
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?>').parent().css('float','right');
	<?php }else if($row_param_bloc_menu['position_menu']== 1){ ?>
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu').css('float','left');
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?>').parent().css('float','left');
	<?php }else if($row_param_bloc_menu['position_menu']== 2){ ?>
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?>').css({ 'display' : "table", 'marginLeft' : "auto", 'marginRight' : "auto", 'width' : "auto" });
	<?php } ?>
	
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu a').css({ 'width' : "100%", 'height' : "<?php echo $row_param_bloc_menu['hauteur']; ?>px", 'line-height' : "<?php echo $row_param_bloc_menu['hauteur']; ?>px", 'border' : "none", 'text-decoration' : "none" });
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu span').css({ 'paddingLeft' : "1em", 'paddingRight' : "1em",'height' : '100%' });
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li a.no_image').css('background','<?php if($row_param_bloc_menu['transparence'] == 0){ echo $row_param_bloc_menu['couleur_bg'];}else{ echo 'none';} ?>');
	
	<?php if($row_param_bloc_menu["contoure_s"] == 1){?>
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li ul').css('border','1px solid <?php echo $row_param_bloc_menu["couleur_contoure_s"]; ?>');
	<?php } ?>
	
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li li').css({ 'marginLeft' : "0", 'marginRight' : "0" });
	
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li a.no_image').css({ 'font-family' : "<?php $police = "SELECT texte FROM police WHERE id = '".$row_param_bloc_menu["police"]."'"; $req_police  = mysql_query($police ,$connect); $row_police = mysql_fetch_assoc($req_police); echo $row_police["texte"]; ?>", 'text-transform' : "<?php echo $row_param_bloc_menu["letre"]; ?>",'font-size' : "<?php echo $row_param_bloc_menu['taille']; ?>px",'color' : "<?php echo $row_param_bloc_menu['couleur_texte']; ?>" ,'font-weight' : "bold"});
	
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li a.no_image').hover(function()
   {
	   
      $(this).css({ 'color' : "<?php echo $row_param_bloc_menu['couleur_actif']; ?>",'background' : "<?php if($row_param_bloc_menu['transparence2'] == 0){echo $row_param_bloc_menu['couleur_menu'];}else{ echo 'none';} ?>"});
	  
	  $(this).find('a').css({ 'font-size' : "<?php echo $row_param_bloc_menu['taille_s']; ?>px",'color' : "<?php echo $row_param_bloc_menu['couleur_texte_s']; ?>",'background' : "<?php if($row_param_bloc_menu['transparence_s'] == 0){echo $row_param_bloc_menu['couleur_bg_s']; }else{ echo 'none';}?>",'white-space' : "nowrap"});
	  
   }, function()
   {
      $(this).css({ 'color' : "<?php echo $row_param_bloc_menu['couleur_texte']; ?>",'background' : "<?php if($row_param_bloc_menu['transparence'] == 0){ echo $row_param_bloc_menu['couleur_bg'];}else{ echo 'none';} ?>"});
   })
	
	
	
	
   
   $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li li a.no_image').css({ 'font-size' : "<?php echo $row_param_bloc_menu['taille_s']; ?>px",'color' : "<?php echo $row_param_bloc_menu['couleur_texte_s']; ?>",'background' : "<?php if($row_param_bloc_menu['transparence_s'] == 0){echo $row_param_bloc_menu['couleur_bg_s']; }else{ echo 'none';}?>",'white-space' : "nowrap"});
   
   
   //
   
   $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li li a.no_image').hover(function()
   {
      $(this).css({ 'color' : "<?php echo $row_param_bloc_menu['couleur_actif_s']; ?>",'background' : "<?php if($row_param_bloc_menu['transparence2_s'] == 0){echo $row_param_bloc_menu['couleur_menu_s'];}else{ echo 'none';} ?>"});
   }, function()
   {
      $(this).css({ 'color' : "<?php echo $row_param_bloc_menu['couleur_texte_s']; ?>",'background' : "<?php if($row_param_bloc_menu['transparence'] == 0){ echo $row_param_bloc_menu['couleur_bg_s'];}else{ echo 'none';} ?>"});
   })
   //
   
   <?php if($row_param_bloc_menu['position_menu'] == 2){ ?>
    $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu').css({ 'marginLeft' : "auto",'marginRight' : "auto",'width' : "auto",'width' : "-moz-max-content",'width' : "-webkit-max-content",'width' : "-o-max-content",'width' : "max-content",'width' : "-max-content",'width' : "-ms-max-content"});
   <?php } ?>
   
   
    $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> div#arr_menu').css({ 'left' : "0",'position' : "absolute",'width' : "100%",'background' : "red",'height' : "100%"});
	
	
<?php if($row_param_bloc_menu['position_menu'] == 2){ ?>
$('#tout div.column div.dragbox div.Menu').css('float','none');
<?php } ?>
	
	
	

	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li a.current.no_image').css({ 'color' : "<?php echo $row_param_bloc_menu['couleur_actif']; ?>",'background' : "<?php if($row_param_bloc_menu['transparence2'] == 0){echo $row_param_bloc_menu['couleur_menu'];}else{ echo 'none';} ?>"});
	
	
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li a.current.no_image').hover(function()
   {
	   
      $(this).css({ 'color' : "<?php echo $row_param_bloc_menu['couleur_actif']; ?>",'background' : "<?php if($row_param_bloc_menu['transparence2'] == 0){echo $row_param_bloc_menu['couleur_menu'];}else{ echo 'none';} ?>"});
	  
	  $(this).find('a').css({ 'font-size' : "<?php echo $row_param_bloc_menu['taille_s']; ?>px",'color' : "<?php echo $row_param_bloc_menu['couleur_texte_s']; ?>",'background' : "<?php if($row_param_bloc_menu['transparence_s'] == 0){echo $row_param_bloc_menu['couleur_bg_s']; }else{ echo 'none';}?>",'white-space' : "nowrap"});
	  
   }, function()
   {
       $(this).css({ 'color' : "<?php echo $row_param_bloc_menu['couleur_actif']; ?>",'background' : "<?php if($row_param_bloc_menu['transparence2'] == 0){echo $row_param_bloc_menu['couleur_menu'];}else{ echo 'none';} ?>"});
   });
   
   $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li li a.current.no_image').css({ 'color' : "<?php echo $row_param_bloc_menu['couleur_actif_s']; ?>",'background' : "<?php if($row_param_bloc_menu['transparence2_s'] == 0){echo $row_param_bloc_menu['couleur_menu_s'];}else{ echo 'none';} ?>"});
   
   $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li li a.current.no_image').hover(function()
   {
      $(this).css({ 'color' : "<?php echo $row_param_bloc_menu['couleur_actif_s']; ?>",'background' : "<?php if($row_param_bloc_menu['transparence2_s'] == 0){echo $row_param_bloc_menu['couleur_menu_s'];}else{ echo 'none';} ?>"});
   }, function()
   {
       $(this).css({ 'color' : "<?php echo $row_param_bloc_menu['couleur_actif_s']; ?>",'background' : "<?php if($row_param_bloc_menu['transparence2_s'] == 0){echo $row_param_bloc_menu['couleur_menu_s'];}else{ echo 'none';} ?>"});
   });
   
   
   
   <?php if($num_style_bloc_menu > 0){ ?>
   
	<?php if($row_style_bloc_menu['style_menu'] == 2){ ?>
	//style 2
	
   $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li span').css({ 'borderTop' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>",'borderBottom' : "0px <?php echo $row_style_bloc_menu['format_bordure']; ?> transparent"});
    $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.current span').css({ 'borderTop' : "<?php echo $row_style_bloc_menu['taille_bordure_s']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>",'borderBottom' : "0px <?php echo $row_style_bloc_menu['format_bordure']; ?> transparent"});
	
	 $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li span').hover(function()
   {
      $(this).css({ 'borderTop' : "<?php echo $row_style_bloc_menu['taille_bordure_s']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>",'borderBottom' : "0px <?php echo $row_style_bloc_menu['format_bordure']; ?> transparent"});
   }, function()
   {
       $(this).css({ 'borderTop' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>",'borderBottom' : "0px <?php echo $row_style_bloc_menu['format_bordure']; ?> transparent"});
   });
   
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.current span').hover(function()
   {
      $(this).css({ 'borderTop' : "<?php echo $row_style_bloc_menu['taille_bordure_s']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>",'borderBottom' : "0px <?php echo $row_style_bloc_menu['format_bordure']; ?> transparent"});
   }, function()
   {
      $(this).css({ 'borderTop' : "<?php echo $row_style_bloc_menu['taille_bordure_s']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>",'borderBottom' : "0px <?php echo $row_style_bloc_menu['format_bordure']; ?> transparent"});
   });
	 $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.separateur').css({ 'margin':'0'}); 
	<?php }else if($row_style_bloc_menu['style_menu'] == 3){ ?>
	
   //style 3
	
   $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li').css({ 'borderTop' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>",'borderBottom' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>"});
    $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.current').css({ 'borderTop' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure_s']; ?>",'borderBottom' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure_s']; ?>"});
	
	 $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li').hover(function()
   {
      $(this).css({ 'borderTop' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure_s']; ?>",'borderBottom' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure_s']; ?>"});
   }, function()
   {
       $(this).css({ 'borderTop' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>",'borderBottom' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>"});
   });
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.current').hover(function()
   {
      $(this).css({ 'borderTop' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure_s']; ?>",'borderBottom' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure_s']; ?>"});
   }, function()
   {
      $(this).css({ 'borderTop' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure_s']; ?>",'borderBottom' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure_s']; ?>"});
   });
   $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.separateur').css({ 'margin':'0'});
   <?php }else if($row_style_bloc_menu['style_menu'] == 4){ ?>
    //style 4
	
	
  $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li').css({'margin' : "0"});
   $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.separateur').css({ 'borderLeft' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>",'height' : "<?php echo $row_param_bloc_menu['taille']; ?>px",'marginTop':'<?php echo ($row_param_bloc_menu['hauteur']-$row_param_bloc_menu['taille'])/2; ?>px'});
   
   <?php }else if($row_style_bloc_menu['style_menu'] == 5){ ?>
    //style 5
	
    $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li a').css({ 'border-radius' : "<?php echo $row_style_bloc_menu['radius_bordure_t']; ?>px <?php echo $row_style_bloc_menu['radius_bordure_r']; ?>px <?php echo $row_style_bloc_menu['radius_bordure_l']; ?>px <?php echo $row_style_bloc_menu['radius_bordure_b']; ?>px",'border':'<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>'});
    $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu ul li a').css({ 'border-radius' : "0",'border':'none'});
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.separateur').css({ 'margin':'0'});
   <?php }else if($row_style_bloc_menu['style_menu'] == 6){ ?>
    //style 6
    $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu').css({ 'borderTop' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>",'borderBottom' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>"});
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.separateur').css({ 'margin':'0'});
   <?php }else if($row_style_bloc_menu['style_menu'] == 7){ ?>
   
    //style 7
    $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu').css({ 'border' : "<?php echo $row_style_bloc_menu['taille_bordure']; ?>px <?php echo $row_style_bloc_menu['format_bordure']; ?> <?php echo $row_style_bloc_menu['couleur_bordure']; ?>"});
   $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.separateur').css({ 'margin':'0'});
   <?php }else if($row_style_bloc_menu['style_menu'] == 8){ ?>
    //style 8
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li a span.s_menu').css({ 'paddingRight' : "24px",'background-image':'url(<?php echo SITEPATH; ?>modules/style_menu/menu0/images/topmenu-arr.png)','background-position':'90% center','background-repeat':'no-repeat'});
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.separateur').css({ 'margin':'0'});
   <?php }else if($row_style_bloc_menu['style_menu'] == 9){ ?>
    //style 9
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li a span').css({'background-image':'url(<?php echo SITEPATH; ?>modules/style_menu/menu0/images/bg_glass.png)','background-position':'center left','background-repeat':'repeat-x'});
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.separateur').css({ 'margin':'0'});
   <?php  }else if($row_style_bloc_menu['style_menu'] == 10){ ?>
    //style 10
	
  $('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li').css({'margin' : "0"});
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.separateur').css({ 'width' : "1px",'height' : "<?php echo $row_param_bloc_menu['hauteur']; ?>px",'background-image':'url(<?php echo SITEPATH; ?>modules/style_menu/menu0/images/mainbk.png)','background-position':'left 2%','background-repeat':'no-repeat'});
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?> .sf-menu li.separateur').css({ 'margin':'0'});
   <?php } ?>
   
 
   
   
   <?php } ?>
	$('#Menu_<?php echo str_replace("Menu_#","",$row_donnees['contenu']); ?>').show();
	});
	</script>
    
    
 
      <?php } 
	

	
	if($num_bloc_menu > 0){
					$contenu_menu = $contenu_menu.'<div class="table" id="Menu_'.str_replace("Menu_#","",$row_donnees['contenu']).'" style="display:none;"><ul class="sf-menu sf" id="horizontal-list"> ';
				  do{ 
				  
				  
				  
				  
                $s_menu = "SELECT * FROM menu where id_type = '".str_replace("Menu_#","",$row_donnees['contenu'])."' AND s_menu = '".$row_menu['id']."' ORDER BY disposition ASC";
						$req_s_menu  = mysql_query($s_menu ,$connect);
						$row_s_menu  = mysql_fetch_assoc($req_s_menu);
						$num_s_menu  = mysql_num_rows($req_s_menu);
						
						
				$titre_s_menu = "SELECT * FROM menu where id_type = '".str_replace("Menu_#","",$row_donnees['contenu'])."' AND s_menu = '".$row_menu['id']."'  AND lien = '".$id_page."' LIMIT 1";
					$req_titre_s_menu  = mysql_query($titre_s_menu ,$connect);
					$num_titre_s_menu = mysql_num_rows($req_titre_s_menu);
						
                
                if($num_menu != 1){
					$contenu_menu = $contenu_menu.'<li class="separateur"></li>';
				}
                $contenu_menu = $contenu_menu.'<li class="';
				if($num_menu == 1){
				$contenu_menu = $contenu_menu.'first ';
					}
				
				if($num_menu == $num_bloc_menu){
				$contenu_menu = $contenu_menu.'last ';
					}
				if(isset($id_page) && ($row_menu['lien'] == $id_page || $num_titre_s_menu > 0)){
				$contenu_menu = $contenu_menu.'current ';
				}
				$contenu_menu = $contenu_menu.'">';
				
				
				if($row_menu['show_image'] == 1){
					if($row_menu['type'] == 1){
						
						
				$contenu_menu = $contenu_menu.'<a href="'.get_name_page($idsite,$row_menu['lien']).$lien_plus.'" data-idPage =  "'.$row_menu['lien'].'"';
				if(isset($id_page) && $row_menu['lien'] == $id_page){
				$contenu_menu = $contenu_menu.' class="current" ';
				}
				$contenu_menu = $contenu_menu.'>';
				}else if($row_menu['type'] == 2){
				$contenu_menu = $contenu_menu.'<a href="'.$row_menu['lien'].'" target="_blank">';
				}else{
				$contenu_menu = $contenu_menu.'<a href="javascript:void(0)">';
				}
					if(isset($id_page) && ($row_menu['lien'] == $id_page || $num_titre_s_menu > 0)){
					$contenu_menu = $contenu_menu."<img src='".SITEPATH.$row_menu['actif']."' alt='";
					if($_SESSION['lang']== 'ar'){
					$contenu_menu = $contenu_menu.utf8_decode($row_menu['menu'.$lang_table]);
					}else{
					$contenu_menu = $contenu_menu.utf8_decode($row_menu['menu'.$lang_table]);
						}
					
					$contenu_menu = $contenu_menu."' />";
					}else{
					$contenu_menu = $contenu_menu."<img src='".SITEPATH.$row_menu['inactif']."' alt='".utf8_decode($row_menu['menu'.$lang_table])."' onmouseover=\"$(this).attr('src','".SITEPATH.$row_menu['survol']."')\" onmouseout=\"$(this).attr('src','".SITEPATH.$row_menu['inactif']."')\" /><img src='".SITEPATH.$row_menu['survol']."' alt='".utf8_decode($row_menu['menu'.$lang_table])."' style='display:none;' />";
					}
				}else{
					if($row_menu['type'] == 1){
						
					
						
				$contenu_menu = $contenu_menu.'<a href="'.get_name_page($idsite,$row_menu['lien']).$lien_plus.'" data-idPage =  "'.$row_menu['lien'].'" class="no_image';
				if(isset($id_page) && $row_menu['lien'] == $id_page){
				$contenu_menu = $contenu_menu.' current ';
				}
				$contenu_menu = $contenu_menu.'">';
				}else if($row_menu['type'] == 2){
				$contenu_menu = $contenu_menu.'<a href="'.$row_menu['lien'].'" target="_blank" class="no_image">';
				}else{
				$contenu_menu = $contenu_menu.'<a href="javascript:void(0)" class="no_image">';
				}
				if($_SESSION['lang']== 'ar'){ 
				if($num_s_menu > 0){
				$contenu_menu = $contenu_menu.'<span class="s_menu">'.utf8_decode($row_menu['menu'.$lang_table]).'</span>';
				}else{
				$contenu_menu = $contenu_menu.'<span>'.utf8_decode($row_menu['menu'.$lang_table]).'</span>';
					}
				}else{
				if($num_s_menu > 0){
				$contenu_menu = $contenu_menu.'<span class="s_menu">'.utf8_decode($row_menu['menu'.$lang_table]).'</span>';
					}else{
				$contenu_menu = $contenu_menu.'<span>'.utf8_decode($row_menu['menu'.$lang_table]).'</span>';
					}
				}
				}
				$contenu_menu = $contenu_menu.'</a>';
  
				 if($num_s_menu > 0){
					  $contenu_menu = $contenu_menu.'<ul>';
				 do{ 
                

				$contenu_menu = $contenu_menu.'<li';
				if(isset($id_page) && $row_s_menu['lien'] == $id_page){
				$contenu_menu = $contenu_menu.' class="current" ';
				}
				$contenu_menu = $contenu_menu.'>';
				
				
				
					if($row_s_menu['show_image'] == 1){
						if($row_s_menu['type'] == 1){
							
				$contenu_menu = $contenu_menu.'<a href="'.get_name_page($idsite,$row_s_menu['lien']).$lien_plus.'"  data-idPage =  "'.$row_s_menu['lien'].'"';
				if(isset($id_page) && $row_s_menu['lien'] == $id_page){
				$contenu_menu = $contenu_menu.' class="current" ';
				}
				$contenu_menu = $contenu_menu.'>';
				}else if($row_s_menu['type'] == 2){
				$contenu_menu = $contenu_menu.'<a href="'.$row_s_menu['lien'].'" target="_blank">';
				}else{
				$contenu_menu = $contenu_menu.'<a href="javascript:void(0)">';
				}
						
					if(isset($id_page) && $row_s_menu['lien'] == $id_page){
					$contenu_menu = $contenu_menu."<img src='".SITEPATH.$row_s_menu['actif']."' alt='";
					if($_SESSION['lang']== 'ar'){
					$contenu_menu = $contenu_menu.utf8_decode($row_s_menu['menu'.$lang_table]);
					}else{
					$contenu_menu = $contenu_menu.utf8_decode($row_s_menu['menu'.$lang_table]);
						}
					
					$contenu_menu = $contenu_menu."' />";
					}else{
					$contenu_menu = $contenu_menu."<img src='".SITEPATH.$row_s_menu['inactif']."' alt='".utf8_decode($row_s_menu['menu'.$lang_table])."' onmouseover=\"$(this).attr('src','".SITEPATH.$row_s_menu['survol']."')\" onmouseout=\"$(this).attr('src','".SITEPATH.$row_s_menu['inactif']."')\" /><img src='".SITEPATH.$row_s_menu['survol']."' alt='".utf8_decode($row_s_menu['menu'.$lang_table])."' style='display:none;' />";
					}
				}else{
					
					if($row_s_menu['type'] == 1){
						
						
					$titre_lien = "SELECT titre FROM pages  where id_site = '".$idsite."' AND id='".$row_s_menu['lien']."'";
					$req_titre_lien  = mysql_query($titre_lien ,$connect);
					$row_titre_lien = mysql_fetch_assoc($req_titre_lien);
							
				$contenu_menu = $contenu_menu.'<a href="'.get_name_page($idsite,$row_s_menu['lien']).$lien_plus.'"  data-idPage =  "'.$row_s_menu['lien'].'"" class="no_image';
				if(isset($id_page) && $row_s_menu['lien'] == $id_page){
				$contenu_menu = $contenu_menu.' current ';
				}
				$contenu_menu = $contenu_menu.'">';
				}else if($row_s_menu['type'] == 2){
				$contenu_menu = $contenu_menu.'<a href="'.$row_s_menu['lien'].'" target="_blank" class="no_image">';
				}else{
				$contenu_menu = $contenu_menu.'<a href="javascript:void(0)" class="no_image">';
				}
					
				
				if($_SESSION['lang']== 'ar'){ 
				$contenu_menu = $contenu_menu.'<span>'.utf8_decode($row_s_menu['menu'.$lang_table]).'</span>';
				}else{
				$contenu_menu = $contenu_menu.'<span>'.utf8_decode($row_s_menu['menu'.$lang_table]).'</span>';
				}
				}
				$contenu_menu = $contenu_menu.'</a>';
				$contenu_menu = $contenu_menu.'</li>';
                
                
               }while($row_s_menu  = mysql_fetch_assoc($req_s_menu)); $contenu_menu = $contenu_menu.'</ul>';} 
               $contenu_menu = $contenu_menu.'</li>';
            $num_menu++;
			}while($row_menu  = mysql_fetch_assoc($req_menu));
				 $contenu_menu = $contenu_menu.'</ul></div>';
				}
?>

       
				<?php echo $contenu_menu; ?>
		