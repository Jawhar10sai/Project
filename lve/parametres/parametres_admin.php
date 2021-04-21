<div id="config">
<ul id="param_admin">
<li>
<div src='<iframe id="contenu_texte" src="<?php echo SITEPATH; ?>modules/corp/param_corp.php?idsite=<?php echo $idsite; ?>" width="650" height="600" frameborder="0"></iframe>' class="osx menu_admin btn " title="Param&eacute;tres de la page">Maquette</div>
</li>
<li>
<div class="menu_admin btn " title="Biblioth&egrave;que" id="bibliotheque">Bibliothèque</div>
</li>
<li style="display:none;">
<div class="menu_admin btn " title="Biblioth&egrave;que" id="bibliotheque_images">Bibliothèque Images</div>
</li>
<li style="display:none;">
<div class="menu_admin btn " title="Biblioth&egrave;que" id="bibliotheque_document">Bibliothèque documents</div>
</li>
<li style="display:none;">
<div class="menu_admin btn " title="Biblioth&egrave;que" id="bibliotheque_video">Bibliothèque videos</div>
</li>
<?php if($type_site != 1){ ?>
<li>  <div src='<iframe id="contenu_texte" src="<?php echo SITEPATH; ?>uploadeur_logo.php?idsite=<?php echo $idsite; ?>" width="650" height="600" frameborder="0"></iframe>' class="osx menu_admin btn " title="Param&egrave;tres Logo">Logo</div></li>
   <li>  <div src='<iframe src="<?php echo SITEPATH; ?>modules/menu/param.php?idsite=<?php echo $idsite; ?>&menu_type=<?php echo $menu_type; ?>" width="650" height="600" frameborder="0"></iframe>' class="osx menu_admin btn " title="Param&egrave;tres Menu">Menu</div></li>
   <?php } ?>
</ul>

<ul id="param_admin2">
 <!--<div onclick="document.location.href='parametres/index2.php'" title="Param&egrave;tres du site" class="btn parametre-du-site "></div>-->
   <li>  <div src='<iframe src="<?php echo SITEPATH; ?>back_up_bdd/index.php?idsite=<?php echo $idsite; ?>" width="650" height="600" frameborder="0"></iframe>' class="osx menu_admin btn " title="Publier">Publier</div></li> 
<li> <div onclick="window.open('<?php echo SITEPATH; ?>apercu/#<?php echo get_name_page($idsite,$id_page); ?>')" title="Aper&ccedil;u" class="btn menu_admin_right ">Aper&ccedil;u</div></li>
 
<li> <div onclick="document.location.href='<?php echo SITEPATH; ?>Profil.php'" title="Modifier vos informations" class="btn menu_admin_right ">Mon compte</div></li>
 <li><div onclick="document.location.href='<?php echo SITEPATH; ?>liste_sites.php'" title="Modifier vos informations" class="btn menu_admin_right ">Mes sites</div></li>
 <li><div onclick="document.location.href='<?php echo SITEPATH; ?>logout.php?site=<?php echo $idsite; ?>'" title="D&eacute;connexion" class="btn menu_admin_right ">D&eacute;connexion</div></li>
</ul>
  </div>
  
  <script language="javascript">
	$(document).ready(function(){
	$("#div_bibliotheque").dialog({
		autoOpen: false,
		height: 505,
		width: 800,
		modal: true,
		draggable:true,
		buttons: {}
	});	
		
$('#bibliotheque').click(function(){
		$("#div_bibliotheque").dialog('open');
	});
	
	$("#div_bibliotheque_images").dialog({
		autoOpen: false,
		height: 495,
		width: 800,
		modal: true,
		draggable:true,
		buttons: {}
	});	
		
$('#bibliotheque_images').click(function(){
		$("#div_bibliotheque_images").dialog('open');
	});
	
	$("#div_bibliotheque_document").dialog({
		autoOpen: false,
		height: 495,
		width: 800,
		modal: true,
		draggable:true,
		buttons: {}
	});	
		
$('#bibliotheque_document').click(function(){
		$("#div_bibliotheque_document").dialog('open');
	});
		
	$("#div_bibliotheque_video").dialog({
		autoOpen: false,
		height: 495,
		width: 800,
		modal: true,
		draggable:true,
		buttons: {}
	});	
		
$('#bibliotheque_video').click(function(){
		$("#div_bibliotheque_video").dialog('open');
	});
	});
	</script>
  
  <div id="div_bibliotheque" title="Bibliothèque" style="display:none; padding:0 !important;">
  <iframe src="<?php echo SITEPATH; ?>modules/bibliotheque/index.php?idsite=<?php echo $idsite; ?>" width="800" height="485" frameborder="0"></iframe>
  </div>
  
  
  
  <div id="div_bibliotheque_images" title="Bibliothèque des Images" style="display:none; padding:0 !important;">
  <iframe src="<?php echo SITEPATH; ?>modules/bibliotheque/bibliotheque_images.php?idsite=<?php echo $idsite; ?>" width="800" height="475" frameborder="0"></iframe>
  </div>
  
  <div id="div_bibliotheque_document" title="Bibliothèque des documents" style="display:none; padding:0 !important;">
  <iframe src="<?php echo SITEPATH; ?>modules/bibliotheque/bibliotheque_document.php?idsite=<?php echo $idsite; ?>" width="800" height="475" frameborder="0"></iframe>
  </div>
  
  <div id="div_bibliotheque_video" title="Bibliothèque des vidéos" style="display:none; padding:0 !important;">
  <iframe src="<?php echo SITEPATH; ?>modules/bibliotheque/bibliotheque_videos.php?idsite=<?php echo $idsite; ?>" width="800" height="475" frameborder="0"></iframe>
  </div>