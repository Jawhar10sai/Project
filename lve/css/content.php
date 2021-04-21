<?php
include_once('config/connect.php');
include("functions/reglages.php"); 
include("functions/function.php"); 
if($session == 'ok'){
$rep = 'uploads/site_'.$_GET['id_site'];/* vous decider */
if (@file_exists($rep)){
}else{
@mkdir($rep, 0755);
}
	

	
?>
<script type="text/javascript" src="js/jquery-1.7.2.js"></script>


<link rel="stylesheet" type="text/css" href="js/smoothness/jquery-ui-1.8.1.custom.css" />
<script type="text/javascript" src="js/smoothness/jquery-ui-1.8.1.custom.min.js"></script>
<?php
if(isset($_POST['lang']) && $_POST['lang'] != ''){
	$lang = $_POST['lang'];
	}else{
		if(isset($_SESSION['lang']) && $_SESSION['lang'] != ''){
			$lang=$_SESSION['lang'];
			}else{
		
	$lang = 'fr';
		}}
		
		if($lang == 'fr'){
	$lang_table = '';
	}else{
		$lang_table = '_'.$lang;
		}

 $valid="";
 $lien_plus = "";
$action=$_GET['action'];
$Media_get=$_GET['Media'];
$id_site = $_GET['id_site'];
$id_footer = $_GET['id_footer'];
$id_header = $_GET['id_header'];
$date = date("Y-m-d H:i:s");
$_SESSION["id_site"] = $_GET['id_site'];

if(isset($_GET['id_parent']) && $_GET['id_parent'] != ''){	
$id_page=$_GET['id_page_parent'];
$id_block=$_GET['id_parent'];

$id_page_titre=$_GET['idpage'];
$id_block_titre=$_GET['block'];	
		
}else{
$id_page=$_GET['idpage'];
$id_block=$_GET['block'];
	
$id_page_titre=$_GET['idpage'];
$id_block_titre=$_GET['block'];				
}
if(isset($_GET['id_parent']) && $_GET['id_parent'] != ''){
	$lien_plus = '&id_parent='.$_GET['id_parent'].'&id_page_parent='.$_GET['id_page_parent'].'&id_page_titre='.$id_page_titre.'&id_block_titre='.$id_block_titre;
}
?>
<?php if($Media_get == "Footer" && !isset($_GET['type']) && $_GET['type'] != 'Texte'){  ?>
<table width="100%" border="0">
<tr>
    <td height="35" align="left" valign="middle">Type Footer</td>
  </tr>
  <tr><td>
<a href="content.php?id_site=<?php echo $id_site; ?>&idpage=<?php echo $idpage; ?>&block=<?php echo ($row_id["id_block"]+1); ?>&action=add&Media=Footer&type=Texte">Texte</a><br />
<a href="Galerie_footer.php?id_site=<?php echo $id_site; ?>&idpage=<?php echo $idpage; ?>&block=<?php echo ($row_id["id_block"]+1); ?>&action=add&Media=Galerie&type=Galerie">Images(Galerie)</a><br />
</td></tr>
</table>
<?php 
exit();
} ?>
<?php if($Media_get == "Header" && !isset($_GET['type']) && $_GET['type'] != 'Texte'){  ?>
<table width="100%" border="0">
<tr>
    <td height="35" align="left" valign="middle">Type Header</td>
  </tr>
  <tr><td>
<a href="content.php?id_site=<?php echo $id_site; ?>&idpage=<?php echo $idpage; ?>&block=<?php echo ($row_id["id_block"]+1); ?>&action=add&Media=Header&type=Texte">Texte</a><br />
<!--<a href="Galerie_footer.php?id_site=<?php echo $id_site; ?>&idpage=<?php echo $idpage; ?>&block=<?php echo ($row_id["id_block"]+1); ?>&action=add&Media=Galerie&type=Galerie">Images(Galerie)</a>--><br />
</td></tr>
</table>
<?php 
exit();
} ?>
<?php if($Media_get == 'Gmap'){  ?>
<script language="javascript">
document.location.href='content_gmap.php?idsite=<?php echo $id_site; ?>&idpage=<?php echo $id_page; ?>&block=<?php echo $id_block; ?>&action=edit&Media=Gmap<?php echo $lien_plus; ?>';
</script>

<?php } ?>
<?php if($Media_get == 'Flux'){  ?>
<script language="javascript">
document.location.href='listes_flux.php?idsite=<?php echo $id_site; ?>&idpage=<?php echo $id_page; ?>&block=<?php echo $id_block; ?>&action=<?php echo $action; ?>&Media=Flux<?php echo $lien_plus; ?>';
</script>

<?php } ?>
<?php if($Media_get == 'Menu'){  ?>
<script language="javascript">
document.location.href='content_menu.php?id_site=<?php echo $id_site; ?>&idpage=<?php echo $id_page; ?>&block=<?php echo $id_block; ?>&action=<?php echo $action; ?>&Media=Menu<?php echo $lien_plus; ?>';
</script>

<?php } ?>

<?php if($Media_get == 'Slider'){ 
if(isset($_GET['id_param']) && $_GET['id_param'] != ''){	
$id_param = $_GET['id_param'];
}else{
	

$param= "SELECT id FROM parametres_slider_bloc ORDER BY id DESC LIMIT 1";
				$query_param = mysql_query($param ,$connect);
				$block_param= mysql_fetch_assoc($query_param);
$id_param = ($block_param['id']+1);
	}
include('uploadeur_slider_bloc.php');
?>
<script language="javascript">
$('#osx-modal-title', window.parent.document).html("Cr&eacute;e le Slider");
</script>
<?php
exit();
} ?>
<script language="javascript">
$('#osx-modal-title', window.parent.document).html("Modifier le contenu");
</script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js" ></script>
<?php



if($Media_get == 'Esapce_Securise'){
	
	
	$query_client = "INSERT INTO contenu (id,id_page,id_block,date,titre,contenu,type)
				VALUES(
				'',
				'".$id_page."',
				'".$id_block."',
				'".$date."',
				'Espace Sécurisé',
				'',
				'Espace_Securise')";
			mysql_query($query_client);
			$text = stripslashes($text);
			
			
			?>		
				
				
                <script language="javascript">
				
				$new_contenu = '<div id="<?php echo $id_block; ?>" class="dragbox" style="display:none;"><h2>Espace Sécurisé<div class="configure" style="visibility: hidden;"><span src="<iframe src=\'modules/block/param_block.php?id_block=<?php echo $id_block; ?>&id_page=<?php echo $id_page; ?>\' width=\'600\' height=\'600\' frameborder=\'0\'></iframe>" class="osx"><img width="18" height="18" class="osx" title="R&eacute;glages" alt="R&eacute;glages" src="images/icons/reglages_block.png"></span> <span class="osx" src="<iframe src=\'content.php?idpage=<?php echo $id_page; ?>&block=<?php echo $id_block; ?>&action=edit&Media=Image\' width=\'650\' height=\'600\' frameborder=\'0\'></iframe>"><img width="18" height="18" title="Propri&eacute;t&eacute;s du contenu" alt="Propri&eacute;t&eacute;s du contenu" src="images/icons/propriete_contenu.png"></span> <span class="delete"><img width="18" height="18" title="Suprimer" alt="Suprimer" src="images/icons/suprimer_block.png"></span></div></h2><div class="dragbox-content"><?php echo $text; ?></div></div>';
								
			$("#tout", window.parent.document).find('.column').eq(0).html($new_contenu+$("#tout", window.parent.document).find('.column').eq(0).html());
			//$('#tout div.column #<?php echo $id_block; ?>', window.parent.document).slideDown(600);
			
			
		$('#tout div.column .dragbox', window.parent.document).each(function(){
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
			
			
			
				var sortorder='';
				var itemorder = "";
				
			$('#tout div.column', window.parent.document).each(function(){
				
				var columnId=$(this).attr('id');
				var children = window.parent.document.getElementById(columnId).childNodes; 
				var l = children.length;
			 
			for(x in children){ 
			
			if(children[x].id != undefined){
			itemorder = itemorder + children[x].id + ","; 
			itemorder = itemorder.replace('undefined', '')
			//alert("itemorder "+itemorder);
			
			
			

			}
			}
			
				sortorder+=columnId+'='+itemorder.toString()+'_';
				//alert("sortorder "+sortorder);
			
			itemorder = "";	
							
			});
			
			//alert('test');
			
			var order = 'order='+sortorder+'&id_page=<?php echo $id_page; ?>';
				//alert("sortorder2 "+sortorder);
			$.post("updateDB.php", order, function(theResponse){
				
window.parent.document.location.reload();
			});
				
		
				
			</script>
                
                <?php
				exit();
	}
if($Media_get == 'Inscription'){
	
	
	$query_client = "INSERT INTO contenu (id,id_page,id_block,date,titre,contenu,type)
				VALUES(
				'',
				'".$id_page."',
				'".$id_block."',
				'".$date."',
				'Inscription utilisateur',
				'',
				'Inscription')";
			mysql_query($query_client);
			$text = stripslashes($text);
			
			
			?>		
				
				
                <script language="javascript">
				
				$new_contenu = '<div id="<?php echo $id_block; ?>" class="dragbox" style="display:none;"><h2>Espace Sécurisé<div class="configure" style="visibility: hidden;"><span src="<iframe src=\'modules/block/param_block.php?id_block=<?php echo $id_block; ?>&id_page=<?php echo $id_page; ?>\' width=\'600\' height=\'600\' frameborder=\'0\'></iframe>" class="osx"><img width="18" height="18" class="osx" title="R&eacute;glages" alt="R&eacute;glages" src="images/icons/reglages_block.png"></span> <span class="osx" src="<iframe src=\'content.php?idpage=<?php echo $id_page; ?>&block=<?php echo $id_block; ?>&action=edit&Media=Image\' width=\'650\' height=\'600\' frameborder=\'0\'></iframe>"><img width="18" height="18" title="Propri&eacute;t&eacute;s du contenu" alt="Propri&eacute;t&eacute;s du contenu" src="images/icons/propriete_contenu.png"></span> <span class="delete"><img width="18" height="18" title="Suprimer" alt="Suprimer" src="images/icons/suprimer_block.png"></span></div></h2><div class="dragbox-content"><?php echo $text; ?></div></div>';
								
			$("#tout", window.parent.document).find('.column').eq(0).html($new_contenu+$("#tout", window.parent.document).find('.column').eq(0).html());
			//$('#tout div.column #<?php echo $id_block; ?>', window.parent.document).slideDown(600);
			
			
		$('#tout div.column .dragbox', window.parent.document).each(function(){
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
			
			
			
				var sortorder='';
				var itemorder = "";
				
			$('#tout div.column', window.parent.document).each(function(){
				
				var columnId=$(this).attr('id');
				var children = window.parent.document.getElementById(columnId).childNodes; 
				var l = children.length;
			 
			for(x in children){ 
			
			if(children[x].id != undefined){
			itemorder = itemorder + children[x].id + ","; 
			itemorder = itemorder.replace('undefined', '')
			//alert("itemorder "+itemorder);
			
			
			

			}
			}
			
				sortorder+=columnId+'='+itemorder.toString()+'_';
				//alert("sortorder "+sortorder);
			
			itemorder = "";	
							
			});
			
			//alert('test');
			
			var order = 'order='+sortorder+'&id_page=<?php echo $id_page; ?>';
				//alert("sortorder2 "+sortorder);
			$.post("updateDB.php", order, function(theResponse){
				
window.parent.document.location.reload();
			});
				
		
				
			</script>
                
                <?php
				exit();
	}	
	
if($Media_get == 'Profil_user'){
	
	
	$query_client = "INSERT INTO contenu (id,id_page,id_block,date,titre,contenu,type)
				VALUES(
				'',
				'".$id_page."',
				'".$id_block."',
				'".$date."',
				'Profil utilisateur',
				'',
				'Profil_user')";
			mysql_query($query_client);
			$text = stripslashes($text);
			
			
			?>		
				
				
                <script language="javascript">
				
				$new_contenu = '<div id="<?php echo $id_block; ?>" class="dragbox" style="display:none;"><h2>Espace Sécurisé<div class="configure" style="visibility: hidden;"><span src="<iframe src=\'modules/block/param_block.php?id_block=<?php echo $id_block; ?>&id_page=<?php echo $id_page; ?>\' width=\'600\' height=\'600\' frameborder=\'0\'></iframe>" class="osx"><img width="18" height="18" class="osx" title="R&eacute;glages" alt="R&eacute;glages" src="images/icons/reglages_block.png"></span> <span class="osx" src="<iframe src=\'content.php?idpage=<?php echo $id_page; ?>&block=<?php echo $id_block; ?>&action=edit&Media=Image\' width=\'650\' height=\'600\' frameborder=\'0\'></iframe>"><img width="18" height="18" title="Propri&eacute;t&eacute;s du contenu" alt="Propri&eacute;t&eacute;s du contenu" src="images/icons/propriete_contenu.png"></span> <span class="delete"><img width="18" height="18" title="Suprimer" alt="Suprimer" src="images/icons/suprimer_block.png"></span></div></h2><div class="dragbox-content"><?php echo $text; ?></div></div>';
								
			$("#tout", window.parent.document).find('.column').eq(0).html($new_contenu+$("#tout", window.parent.document).find('.column').eq(0).html());
			//$('#tout div.column #<?php echo $id_block; ?>', window.parent.document).slideDown(600);
			
			
		$('#tout div.column .dragbox', window.parent.document).each(function(){
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
			
			
			
				var sortorder='';
				var itemorder = "";
				
			$('#tout div.column', window.parent.document).each(function(){
				
				var columnId=$(this).attr('id');
				var children = window.parent.document.getElementById(columnId).childNodes; 
				var l = children.length;
			 
			for(x in children){ 
			
			if(children[x].id != undefined){
			itemorder = itemorder + children[x].id + ","; 
			itemorder = itemorder.replace('undefined', '')
			//alert("itemorder "+itemorder);
			
			
			

			}
			}
			
				sortorder+=columnId+'='+itemorder.toString()+'_';
				//alert("sortorder "+sortorder);
			
			itemorder = "";	
							
			});
			
			//alert('test');
			
			var order = 'order='+sortorder+'&id_page=<?php echo $id_page; ?>';
				//alert("sortorder2 "+sortorder);
			$.post("updateDB.php", order, function(theResponse){
				
window.parent.document.location.reload();
			});
				
		
				
			</script>
                
                <?php
				exit();
	}
	
if($Media_get == 'SondageFiltre'){
	
	
	
	$query_client = "INSERT INTO contenu (id,id_page,id_block,date,titre,contenu,type)
				VALUES(
				'',
				'".$id_page."',
				'".$id_block."',
				'".$date."',
				'Filtre Sondages',
				'',
				'SondageFiltre')";
			mysql_query($query_client);
			$text = stripslashes($text);
			
			
			?>		
				
				
                <script language="javascript">
				
				$new_contenu = '<div id="<?php echo $id_block; ?>" class="dragbox" style="display:none;"><h2>Espace Sécurisé<div class="configure" style="visibility: hidden;"><span src="<iframe src=\'modules/block/param_block.php?id_block=<?php echo $id_block; ?>&id_page=<?php echo $id_page; ?>\' width=\'600\' height=\'600\' frameborder=\'0\'></iframe>" class="osx"><img width="18" height="18" class="osx" title="R&eacute;glages" alt="R&eacute;glages" src="images/icons/reglages_block.png"></span> <span class="osx" src="<iframe src=\'content.php?idpage=<?php echo $id_page; ?>&block=<?php echo $id_block; ?>&action=edit&Media=Image\' width=\'650\' height=\'600\' frameborder=\'0\'></iframe>"><img width="18" height="18" title="Propri&eacute;t&eacute;s du contenu" alt="Propri&eacute;t&eacute;s du contenu" src="images/icons/propriete_contenu.png"></span> <span class="delete"><img width="18" height="18" title="Suprimer" alt="Suprimer" src="images/icons/suprimer_block.png"></span></div></h2><div class="dragbox-content"><?php echo $text; ?></div></div>';
								
			$("#tout", window.parent.document).find('.column').eq(0).html($new_contenu+$("#tout", window.parent.document).find('.column').eq(0).html());
			//$('#tout div.column #<?php echo $id_block; ?>', window.parent.document).slideDown(600);
			
			
		$('#tout div.column .dragbox', window.parent.document).each(function(){
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
			
			
			
				var sortorder='';
				var itemorder = "";
				
			$('#tout div.column', window.parent.document).each(function(){
				
				var columnId=$(this).attr('id');
				var children = window.parent.document.getElementById(columnId).childNodes; 
				var l = children.length;
			 
			for(x in children){ 
			
			if(children[x].id != undefined){
			itemorder = itemorder + children[x].id + ","; 
			itemorder = itemorder.replace('undefined', '')
			//alert("itemorder "+itemorder);
			
			
			

			}
			}
			
				sortorder+=columnId+'='+itemorder.toString()+'_';
				//alert("sortorder "+sortorder);
			
			itemorder = "";	
							
			});
			
			//alert('test');
			
			var order = 'order='+sortorder+'&id_page=<?php echo $id_page; ?>';
				//alert("sortorder2 "+sortorder);
			$.post("updateDB.php", order, function(theResponse){
				
window.parent.document.location.reload();
			});
				
		
				
			</script>
                
                <?php
				exit();
	
	}
if($Media_get == 'Search'){
	
	
	$query_client = "INSERT INTO contenu (id,id_page,id_block,date,titre,contenu,type)
				VALUES(
				'',
				'".$id_page."',
				'".$id_block."',
				'".$date."',
				'Moteur de recherche',
				'',
				'Search')";
			mysql_query($query_client);
			$text = stripslashes($text);
			
			
			?>		
				
				
                <script language="javascript">
				
				$new_contenu = '<div id="<?php echo $id_block; ?>" class="dragbox" style="display:none;"><h2>Espace Sécurisé<div class="configure" style="visibility: hidden;"><span src="<iframe src=\'modules/block/param_block.php?id_block=<?php echo $id_block; ?>&id_page=<?php echo $id_page; ?>\' width=\'600\' height=\'600\' frameborder=\'0\'></iframe>" class="osx"><img width="18" height="18" class="osx" title="R&eacute;glages" alt="R&eacute;glages" src="images/icons/reglages_block.png"></span> <span class="osx" src="<iframe src=\'content.php?idpage=<?php echo $id_page; ?>&block=<?php echo $id_block; ?>&action=edit&Media=Image\' width=\'650\' height=\'600\' frameborder=\'0\'></iframe>"><img width="18" height="18" title="Propri&eacute;t&eacute;s du contenu" alt="Propri&eacute;t&eacute;s du contenu" src="images/icons/propriete_contenu.png"></span> <span class="delete"><img width="18" height="18" title="Suprimer" alt="Suprimer" src="images/icons/suprimer_block.png"></span></div></h2><div class="dragbox-content"><?php echo $text; ?></div></div>';
								
			$("#tout", window.parent.document).find('.column').eq(0).html($new_contenu+$("#tout", window.parent.document).find('.column').eq(0).html());
			//$('#tout div.column #<?php echo $id_block; ?>', window.parent.document).slideDown(600);
			
			
		$('#tout div.column .dragbox', window.parent.document).each(function(){
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
			
			
			
				var sortorder='';
				var itemorder = "";
				
			$('#tout div.column', window.parent.document).each(function(){
				
				var columnId=$(this).attr('id');
				var children = window.parent.document.getElementById(columnId).childNodes; 
				var l = children.length;
			 
			for(x in children){ 
			
			if(children[x].id != undefined){
			itemorder = itemorder + children[x].id + ","; 
			itemorder = itemorder.replace('undefined', '')
			//alert("itemorder "+itemorder);
			
			
			

			}
			}
			
				sortorder+=columnId+'='+itemorder.toString()+'_';
				//alert("sortorder "+sortorder);
			
			itemorder = "";	
							
			});
			
			//alert('test');
			
			var order = 'order='+sortorder+'&id_page=<?php echo $id_page; ?>';
				//alert("sortorder2 "+sortorder);
			$.post("updateDB.php", order, function(theResponse){
				
window.parent.document.location.reload();
			});
				
		
				
			</script>
                
                <?php
				exit();
	}
if(isset($_POST['action'])){
	$text = $_POST['texte'];
	$text = str_replace("\r", "", $text);
	$text = str_replace("\n", "", $text);
	$text = mysql_escape_string($text);
	
	$media=$_POST["file"];
	$position=mysql_escape_string($_POST['type_affichage']);
	$lien=mysql_escape_string($_POST['lien_media']);
	if($_POST['autoplay'] == 1){
		$autoplay = 1;
		}else{
		$autoplay = 0;
	}
	if($_POST['autohide'] == 1){
		$autohide = 1;
		}else{
		$autohide = 0;
	}
	if($_POST['controls'] == 1){
		$controls = 1;
		}else{
		$controls = 0;
	}
	if($_POST['loop'] == 1){
		$loop = 1;
		}else{
		$loop = 0;
	}
	if($_POST['showinfo'] == 1){
		$showinfo = 1;
		}else{
		$showinfo = 0;
	}
	
	$lien_video=mysql_escape_string($_POST['lien_video']).'?wmode=transparent&autoplay='.$autoplay.'&controls='.$controls.'&autohide='.$autohide.'&loop='.$loop.'&showinfo='.$showinfo.'&rel=0';
	$type_lien = $_POST['type_lien'];
	$cible = $_POST['cible'];
	$titre_bloc = $_POST['titre_bloc'];
	
	if($Media_get=='VideoT'){
	$allowedExts = array("flv", "mp4");
	$taille = 99999999999;
	}
	
	if($action=="add"){
	//echo "add";
	
	
		if($Media_get == "Footer" && isset($_GET['type']) && $_GET['type'] == 'Texte'){
			
			
		$block_class = "SELECT positionnement FROM footer WHERE id_site = '".$id_site."' ORDER BY positionnement DESC LIMIT 1";
		$query_block_class = mysql_query($block_class ,$connect) or die(mysql_error());
		$block_class = mysql_fetch_assoc($query_block_class);
			
			
			$titre_footer = $_POST['titre_footer'];
			$query_client = "INSERT INTO footer (id,id_site,titre,contenu".$lang_table.",type,positionnement)
				VALUES(
				'',
				'".$id_site."',
				'".$titre_footer."',
				'".$text."',
				'Texte',
				'".($block_class['positionnement']+1)."')";
			mysql_query($query_client);
			
			
			
			
			$text = stripslashes($text);
			
			echo 'Footer ajouter avec succés!';
			?>
            <script language="javascript">
			window.parent.document.location.reload();
			
			</script>
            
            
            <?php
			exit();
			}else if($Media_get == "Header" && isset($_GET['type']) && $_GET['type'] == 'Texte'){
			
			
		$block_class = "SELECT positionnement FROM header WHERE id_site = '".$id_site."' ORDER BY positionnement DESC LIMIT 1";
		$query_block_class = mysql_query($block_class ,$connect) or die(mysql_error());
		$block_class = mysql_fetch_assoc($query_block_class);
			
			
			$titre_footer = $_POST['titre_footer'];
			$query_client = "INSERT INTO header (id,id_site,titre,contenu".$lang_table.",type,positionnement)
				VALUES(
				'',
				'".$id_site."',
				'".$titre_footer."',
				'".$text."',
				'Texte',
				'".($block_class['positionnement']+1)."')";
			mysql_query($query_client);
			
			
			
			
			$text = stripslashes($text);
			
	echo 'Header ajouter avec succés!';
			?>
            <script language="javascript">
			window.parent.document.location.reload();
			
			</script>
            
            
            <?php
			exit();
			}else{
			$query_client = "INSERT INTO contenu (id,id_page,id_block,date,titre,contenu".$lang_table.",media,lien_video,type,positionnement)
				VALUES(
				'',
				'".$id_page."',
				'".$id_block."',
				'".$date."',
				'".$titre_bloc."',
				'".$text."',
				'".$media."',
				'".$lien_video."',
				'".$Media_get."',
				'".$position."')";
			mysql_query($query_client);
			$text = stripslashes($text);
			
			
			?>		
				
				
                <script language="javascript">
				
				$new_contenu = '<div id="<?php echo $id_block; ?>" class="dragbox" style="display:none;"><h2><?php echo $titre_bloc; ?><div class="configure" style="visibility: hidden;"><span src="<iframe src=\'modules/block/param_block.php?id_block=<?php echo $id_block; ?>&id_page=<?php echo $id_page; ?>\' width=\'600\' height=\'600\' frameborder=\'0\'></iframe>" class="osx"><img width="18" height="18" class="osx" title="R&eacute;glages" alt="R&eacute;glages" src="images/icons/reglages_block.png"></span> <span class="osx" src="<iframe src=\'content.php?idpage=<?php echo $id_page; ?>&block=<?php echo $id_block; ?>&action=edit&Media=Image\' width=\'650\' height=\'600\' frameborder=\'0\'></iframe>"><img width="18" height="18" title="Propri&eacute;t&eacute;s du contenu" alt="Propri&eacute;t&eacute;s du contenu" src="images/icons/propriete_contenu.png"></span> <span class="delete"><img width="18" height="18" title="Suprimer" alt="Suprimer" src="images/icons/suprimer_block.png"></span></div></h2><div class="dragbox-content"><?php echo $text; ?></div></div>';
								
			$("#tout", window.parent.document).find('.column').eq(0).html($new_contenu+$("#tout", window.parent.document).find('.column').eq(0).html());
			$('#tout div.column #<?php echo $id_block; ?>', window.parent.document).slideDown(600);
			
			
		$('#tout div.column .dragbox', window.parent.document).each(function(){
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
			
			
			
				var sortorder='';
				var itemorder = "";
				
			$('#tout div.column', window.parent.document).each(function(){
				
				var columnId=$(this).attr('id');
				var children = window.parent.document.getElementById(columnId).childNodes; 
				var l = children.length;
			 
			for(x in children){ 
			
			if(children[x].id != undefined){
			itemorder = itemorder + children[x].id + ","; 
			itemorder = itemorder.replace('undefined', '')
			//alert("itemorder "+itemorder);
			
			
			

			}
			}
			
				sortorder+=columnId+'='+itemorder.toString()+'_';
				//alert("sortorder "+sortorder);
			
			itemorder = "";	
							
			});
			
			//alert('test');
			
			var order = 'order='+sortorder+'&id_page=<?php echo $id_page; ?>';
				//alert("sortorder2 "+sortorder);
			$.post("updateDB.php", order, function(theResponse){
			window.parent.document.location.reload();
			});
				
		
				
			</script>
                
                <?php
			
			
			
			}
	echo 'Bloc ajouter avec succés!';
	
	
	
exit();	  
	}
	if($action=="edit"){
		
		
		if($Media_get == "Header"){
			$titre_header = $_POST['titre_footer'];
			$query_content = "update header set contenu".$lang_table."='".$text."' ,titre ='".$titre_header."' where id = '".$id_header."'";
				mysql_query($query_content);
				
				
				$contenu_final = stripslashes($text);
		
		}else if($Media_get == "Footer"){
			$titre_footer = $_POST['titre_footer'];
			$query_content = "update footer set contenu".$lang_table."='".$text."' ,titre ='".$titre_footer."' where id = '".$id_footer."'";
				mysql_query($query_content);
				
				
				$contenu_final = stripslashes($text);
		
		}else if($Media_get == "Texte" || $Media_get == "Video"){
			
			
				$query_content = "update contenu set contenu".$lang_table."='".$text."'  ,positionnement='".$position."' ,Lien = '', lien_video='".$lien_video."' , type = '".$Media_get."' $update_media where id_block='".$id_block."' AND id_page = '".$id_page."'";
				mysql_query($query_content);
				
				
				$contenu_final = stripslashes($text);
				
				
				
			
		  }else{
		
		$update_media=$media;

			
	}
				
				if($type_lien == 'lien_out'){
				$lien = $_POST['lien_media'];
				}else if ($type_lien == 'lien_in'){
				$lien = $_POST['lien_media2'];					
					}else{$lien = '';}
				
				$query_titre = "update contenu set titre = '".$titre_bloc."'  where id_block='".$id_block_titre."' AND id_page = '".$id_page_titre."'";
			mysql_query($query_titre);
				
				$query_content = "update contenu set contenu".$lang_table."='".$text."'  ,positionnement='".$position."' , Lien='".$lien."',lien_video = '".$lien_video."' ,type_lien='".$type_lien."' ,cible='".$cible."' , type = '".$Media_get."',media = '".$update_media."' where id_block='".$id_block."' AND id_page = '".$id_page."'";
				mysql_query($query_content);
				
				
				$block1= "SELECT * FROM contenu WHERE id_block='".$id_block."' AND id_page = '".$id_page."'";
				$query_block_content1 = mysql_query($block1 ,$connect) or die(mysql_error());
				$block_content1= mysql_fetch_assoc($query_block_content1);
				$media = $block_content1['media'];
				$text = stripslashes($text);
				
			

				
					
	$align="";
	$float="";
	$img_width="";
	
	
	if($block_content1['Lien'] != '' || $block_content1['Lien'] != 0 || $type_lien == 'lien_none'){
		
				if($type_lien == 'lien_out'){
				$lien1 = '<a href="'.$lien.'" target="'.$lien.'">';
					}else if($type_lien == 'lien_in'){
				$lien1 = '<a href="'.SITEPATH.$_GET['id_site'].'_'.get_name_site($_GET['id_site']).'/'.get_name_page($_GET['id_site'],$lien).'" target="'.$cible.'">';
					}
				$lien_end1 = "</a>";	
			}else{
				$lien1 = "";	
				$lien_end1 = "";	
			}
			
	
		switch ($position) {
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
			
		
		switch ($position) {
		case 1:
		
		
		if($Media_get == 'Video'){
		$media1 = '<embed  style="'.$float.'; width:25%; margin: 0 5px 5px 0;" id="preview" src="'.$media.'"></embed>';
		}elseif($Media_get == 'Image'){
		$media1 = $lien1.'<img src="'.$media.'" align="'.$align.'" style="'.$float.'; width:25%; margin: 0 5px 5px 0;" />'.$lien_end1;
		}
		
		$contenu_final= $media1.$text;
    	break;
		
		case 2:
		if($Media_get == 'Video'){
		$media1 = '<embed  style="'.$float.'; width:25%; margin:0 0 5px 5px;"  id="preview" src="'.$media.'"></embed>';
		}elseif($Media_get == 'Image'){
		$media1 = $lien1.'<img src="'.$media.'" align="'.$align.'" style="'.$float.'; width:25%; margin:0 0 5px 5px;" />'.$lien_end1;
		}
		$contenu_final= $media1.$text;
		break;
		
		case 3:
		if($Media_get == 'Video'){
		$media1 = '<embed style="width:100%;" id="preview" src="'.$media.'"></embed>';
		}elseif($Media_get == 'Image'){
		$media1 = $lien1.'<img src="'.$media.'" align="'.$align.'" style="width:100%;"/>'.$lien_end1;
		}
		$contenu_final= '<div style="margin-right:2%;width:49%;'.$float.'" >'.$media1.'</div><div style="width:49%;'.$float.'" >'.$text.'</div>';
		break;
		
		case 4:
		if($Media_get == 'Video'){
		$media1 = '<embed style="width:100%;"  id="preview" src="'.$media.'"></embed>';
		}elseif($Media_get == 'Image'){
		$media1 = $lien1.'<img src="'.$media.'" align="'.$align.'" style="width:100%;"/>'.$lien_end1;
		}
		$contenu_final= '<div style="margin-left:2%;width:49%;'.$float.'" >'.$media1.'</div><div style="width:49%; float:left" >'.$text.'</div>';
		break;
		
		case 5:
		if($Media_get == 'Video'){
		$media1 = '<embed style="width:100%;"  id="preview" src="'.$media.'"></embed>';
		}elseif($Media_get == 'Image'){
		$media1 = $lien1.'<img src="'.$media.'" style="width:100%;"/>'.$lien_end1;
		}
		$contenu_final= '<div style="width:100%; margin-bottom:5px;">'.$text.'</div><div style="width:100%;" >'.$media1.'</div>';
		break;
		
		case 6:
		if($Media_get == 'Video'){
		$media1 = '<embed style="width:100%;" id="preview" src="'.$media.'"></embed>';
		}elseif($Media_get == 'Image'){
		$media1 = $lien1.'<img src="'.$media.'" style="width:100%;"/>'.$lien_end1;
		}
		$contenu_final= '<div style="width:100%; margin-bottom:5px;" >'.$media1.'</div><div style="width:100%;">'.$text.'</div>';
		break;
		
		}
		
		
		
	$contenu_final = str_replace("</p>rn", "</p>", $contenu_final);
	
?>		
<script language="javascript">	
/*$new_contenu = '<?php echo $contenu_final; ?>';
<?php if($Media_get == "Footer"){ ?>
$id_bloc = '<?php echo $id_footer; ?>';
window.parent.document.getElementById('column_footer').getElementById($id_bloc).children[1].innerHTML = $new_contenu;
<?php }else{ ?>
$id_bloc = '<?php echo $id_block; ?>';
window.parent.document.getElementById($id_bloc).children[1].innerHTML = $new_contenu;
<?php } ?>*/
//$('#tout div.column div#'+$id_bloc+' .dragbox-content', window.parent.document).html($new_contenu);
</script>
	
<script language="javascript">		

window.parent.document.location.reload();
window.parent.document.getElementById("osx-modal-data").innerHTML = '<p style="padding:20px;">Modification effectu&eacute; avec succ&egrave;s.</p>';

</script>

<?php

exit();	

	} 
}

		if($Media_get != "Footer" && $Media_get != "Header"){
						
 		$block= "SELECT * FROM contenu WHERE id_block='".$id_block."' AND id_page = '".$id_page."'";
		
		}else if($Media_get == "Header"){
						
 		$block= "SELECT * FROM header WHERE id = '".$id_header."'";
		
		}else{
			
 		$block= "SELECT * FROM footer WHERE id = '".$id_footer."'";
			}
		$query_block_content = mysql_query($block ,$connect) or die(mysql_error());
		$block_content= mysql_fetch_assoc($query_block_content);
		
		
		
		$titre = "SELECT titre FROM contenu  WHERE id_block='".$id_block_titre."' AND id_page = '".$id_page_titre."'";
		$req_titre  = mysql_query($titre ,$connect);
		$row_titre  = mysql_fetch_assoc($req_titre);
		
		$menu = "SELECT * FROM pages  WHERE id_site = '".$id_site."'";
		$req_menu  = mysql_query($menu ,$connect);
		$row_menu  = mysql_fetch_assoc($req_menu);
		
		
		
		$parametres_langue = "SELECT * FROM langue where id_site = '".$id_site."'";
	$req_parametres_langue  = mysql_query($parametres_langue ,$connect);
	$row_parametres_langue  = mysql_fetch_array($req_parametres_langue);


?> 
<?php if($Media_get != "HTML"){ ?>
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "silver",
        convert_urls : false,
        content_css :"tiny_mce/css/typography.css",
		theme_advanced_styles : "Tangerine=tangerine",
		theme_advanced_fonts : "Century Gothic=Century Gothic;"+
				"Andale Mono=andale mono,times;"+
                "Arial=arial,helvetica,sans-serif;"+
                "Arial Black=arial black,avant garde;"+
                "Book Antiqua=book antiqua,palatino;"+
                "Comic Sans MS=comic sans ms,sans-serif;"+
                "Courier New=courier new,courier;"+
                "Georgia=georgia,palatino;"+
                "Helvetica=helvetica;"+
                "Impact=impact,chicago;"+
                "Symbol=symbol;"+
                "Tahoma=tahoma,arial,helvetica,sans-serif;"+
                "Terminal=terminal,monaco;"+
                "Times New Roman=times new roman,times;"+
                "Trebuchet MS=trebuchet ms,geneva;"+
                "Verdana=verdana,geneva;"+
                "Webdings=webdings;"+
                "Wingdings=wingdings,zapf dingbats"+
                "champagne & limousines",


		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",
		file_browser_callback : "filebrowser",
		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,image,code,|,insertdate,inserttime,|,hr",
		theme_advanced_buttons3 : "sub,sup,|,charmap,emotions,styleprops,|,forecolor,backcolor,|,tablecontrols",
		 table_styles : "Header 1=header1;Header 2=header2;Header 3=header3",
        table_cell_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Cell=tableCel1",
        table_row_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		//content_css : "tiny_mce/css/word.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
	
	function filebrowser(field_name, url, type, win) {
  // alert('coco'+url);
    fileBrowserURL = "/pdw_file_browser/index.php?editor=tinymce&filter=" + type+"&site=<?php echo $_GET['id_site']; ?>";
     
    tinyMCE.activeEditor.windowManager.open({
        title: "PDW File Browser",
        url: fileBrowserURL,
        width: 950,
        height: 650,
        inline: 0,
        maximizable: 1,
        close_previous: 0
      },{
        window : win,
        input : field_name
      }
    );    
  }
  

  
  </script>
  <?php } ?>
  
 <script language="javascript">
$(document).ready(function(){
$('.lien').change(function ()
{
$('.cache').hide();
$('.'+$('input[name=type_lien]:radio:checked').val()).show();

if($('input[name=type_lien]:radio:checked').val() == 'lien_none'){
	$('.ouverture').hide();
	}else{
	$('.ouverture').show();
		}
});
$('.lang').click(function(){
	$('.lang').css('opacity','0.5');
	$(this).css('opacity','1');
	$('.langue').val($(this).attr('title'));
	 $('#target_lang').submit();
	
	});
});
</script>
<style>
.lang{
	opacity:0.5;
	cursor:pointer;
	}
.current{
	opacity:1;
	}
</style>

<?php echo $valid;?>
 <?php if($row_parametres_langue['fr'] == '1' || $row_parametres_langue['en'] == '1' || $row_parametres_langue['es'] == '1' || $row_parametres_langue['fr'] == '1' || $row_parametres_langue['it'] == '1' || $row_parametres_langue['de'] == '1' || $row_parametres_langue['ar'] == '1'){ ?>
<form id="target_lang" name="form1" method="post" action="">
<p>
<label for="lang">Langue : </label>
 <?php if($row_parametres_langue['fr'] == '1'){ ?><img class="lang <?php if($lang == 'fr'){echo 'current';} ?>" src="images/lang/fr.jpg" width="16" height="11" title="fr" /><?php } ?>
 <?php if($row_parametres_langue['en'] == '1'){ ?> <img class="lang <?php if($lang == 'en'){echo 'current';} ?>" src="images/lang/en.jpg" width="16" height="11" title="en" /><?php } ?>
 <?php if($row_parametres_langue['es'] == '1'){ ?> <img class="lang <?php if($lang == 'es'){echo 'current';} ?>" src="images/lang/es.jpg" width="16" height="11" title="es" /><?php } ?>
  <?php if($row_parametres_langue['it'] == '1'){ ?><img class="lang <?php if($lang == 'it'){echo 'current';} ?>" src="images/lang/it.jpg" width="16" height="11" title="it" /><?php } ?>
 <?php if($row_parametres_langue['de'] == '1'){ ?> <img class="lang <?php if($lang == 'de'){echo 'current';} ?>" src="images/lang/de.jpg" width="16" height="11" title="de" /><?php } ?>
  <?php if($row_parametres_langue['ar'] == '1'){ ?><img class="lang <?php if($lang == 'ar'){echo 'current';} ?>" src="images/lang/ar.jpg" width="16" height="11" title="ar" /><?php } ?>
<input type="hidden" name="lang" class="langue" value="<?php echo $lang; ?>" />

</p>
</form>
<?php } ?>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="lang" class="langue" value="<?php echo $lang; ?>" />

<?php 
if($lang == 'fr'){
	$lang = '';
	}else{
		$lang = '_'.$lang;
		}
	?>
<?php if($Media_get == "Footer"){ ?>
<p> 
 <label for="type_affichage">Titre Footer : </label>
 <input name="titre_footer" type="text" value="<?php echo $block_content['titre']; ?>" />
</p>


<?php }else if($Media_get == "Header"){ ?>
<p> 
 <label for="type_affichage">Titre Header : </label>
 <input name="titre_footer" type="text" value="<?php echo $block_content['titre']; ?>" />
</p>


<?php }else{ ?>
<p> 
 <label for="type_affichage">Titre du bloc (Backoffice seulement): </label>
 <input name="titre_bloc" type="text" value="<?php echo $row_titre['titre']; ?>" />
</p>


<?php } ?>

<?php if($Media_get !="Texte" && $Media_get != "VideoT" && $Media_get != "Footer" && $Media_get != "Header" && $Media_get != "HTML"){ ?>
<p> 
 <label for="type_affichage">Disposition de l'article : </label>
  <select name="type_affichage" id="type_affichage">
    <option value="1" <?php if($block_content['positionnement']==1) {echo 'selected="selected"';}?>>Medaillon : <?php echo $Media_get;?> à gauche et texte</option>
    <option value="2" <?php if($block_content['positionnement']==2) {echo 'selected="selected"';}?>>Medaillon : <?php echo $Media_get;?> à droite et texte</option>
    <option value="3" <?php if($block_content['positionnement']==3) {echo 'selected="selected"';}?>><?php echo $Media_get;?> à gauche et texte</option>
    <option value="4" <?php if($block_content['positionnement']==4) {echo 'selected="selected"';}?>><?php echo $Media_get;?> à droite et texte</option>
    <option value="5" <?php if($block_content['positionnement']==5) {echo 'selected="selected"';}?>><?php echo $Media_get;?> en bas et texte</option>
    <option value="6" <?php if($block_content['positionnement']==6) {echo 'selected="selected"';}?>><?php echo $Media_get;?> en haut et texte</option>
  </select>
</p>

<?php }?>
<?php if($Media_get == "HTML"){ ?>
<script src='codemirror-3.14/lib/codemirror.js'></script>
    <script src='codemirror-3.14/mode/xml/xml.js'></script>
    <script src='codemirror-3.14/mode/javascript/javascript.js'></script>
    <script src='codemirror-3.14/mode/css/css.js'></script>
    <script src='codemirror-3.14/mode/htmlmixed/htmlmixed.js'></script>
    <link rel=stylesheet href='codemirror-3.14/lib/codemirror.css'>
    <link rel=stylesheet href='codemirror-3.14/doc/docs.css'>
    <style type=text/css>
      .CodeMirror {
        float: left;
        width: 50%;
        border: 1px solid black;
      }
      iframe {
        width: 49%;
        float: left;
        height: 300px;
        border: 1px solid black;
        border-left: 0px;
      }
    </style>
Entrer le code HTML : <br />
<textarea name="texte" id="texte"><?php echo stripslashes($block_content['contenu'.$lang]);?></textarea>
<iframe id=preview></iframe>


    <script>
      var delay;
      // Initialize CodeMirror editor with a nice html5 canvas demo.
      var editor = CodeMirror.fromTextArea(document.getElementById('texte'), {
        mode: 'text/html',
        tabMode: 'indent'
      });
      editor.on("change", function() {
        clearTimeout(delay);
        delay = setTimeout(updatePreview, 300);
      });
      
      function updatePreview() {
        var previewFrame = document.getElementById('preview');
        var preview =  previewFrame.contentDocument ||  previewFrame.contentWindow.document;
        preview.open();
        preview.write(editor.getValue());
        preview.close();
      }
      setTimeout(updatePreview, 300);
    </script>

<?php }else if($Media_get != "VideoT" && $Media_get != "HTML"){ ?>

<p>  
<textarea name="texte" id="texte" cols="44"><?php echo stripslashes($block_content['contenu'.$lang]);?></textarea>
</p>
<?php } ?>
<?php if($Media_get != "Texte" && $Media_get != "Video" && $Media_get != "Footer" && $Media_get != "Header" && $Media_get != "HTML"){ ?>
<p>

<?php if($Media_get=="Image"){
	$src="images/empty_img.png";	
	if(!empty($block_content['media'])){
		$src=$block_content['media'];	
	}
	?>
  <label for="Media">M&eacute;dia :</label>
  <a class="" href="javascript:void(0)" title="Ajouter un fichier" id="bibliotheque">Ajouter un fichier</a>
  <input type="hidden" name="file" id="Media" value="<?php echo $src; ?>" />
</p>
<?php } ?>
<img src="<?php echo $src;?>" id="preview" style="max-width:30%" />
    <p><label for="lien_media">Ajouter un lien : </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label>Aucun</label><input name="type_lien" class="lien" type="radio" value="lien_none" <?php if($block_content['type_lien'] == 'lien_none' || $block_content['type_lien'] == ''){ echo 'checked="checked"';} ?> />&nbsp;&nbsp;&nbsp;
    <label>Externe</label><input name="type_lien" class="lien" type="radio" value="lien_out" <?php if($block_content['type_lien'] == 'lien_out'){ echo 'checked="checked"';} ?> />&nbsp;&nbsp;&nbsp;
    <label>Interne</label><input name="type_lien" class="lien" type="radio" value="lien_in" <?php if($block_content['type_lien'] == 'lien_in'){ echo 'checked="checked"';} ?> />
   </p>
    <p>
<input type="text" name="lien_media" id="lien_media" class="lien_out cache" value="<?php if(!is_numeric($block_content['Lien'])){ echo $block_content['Lien']; }?>" <?php if($block_content['type_lien'] != 'lien_out' && $block_content['type_lien'] != ''){ echo 'style="display:none"';} ?>/>
<select name="lien_media2" class="lien_in cache" <?php if($block_content['type_lien'] != 'lien_in'){ echo 'style="display:none"';} ?>>
<option value="0">Aucun</option>
<?php do{ ?>
<option value="<?php echo $row_menu['id']; ?>" <?php if($row_menu['id']==$block_content['Lien']){ echo 'selected="selected"';} ?>><?php echo utf8_encode($row_menu['titre']); ?></option>
<?php }while($row_menu = mysql_fetch_assoc($req_menu)); ?>
</select>

</p>
<p class="ouverture" <?php if($block_content['type_lien'] == 'lien_none' || $block_content['type_lien'] == ''){ echo 'style="display:none"';} ?>>
<label for="lien_media">Ouverture : </label>
<select name="cible">
  <option value="_self" <?php if($block_content['cible']=="_self" || $block_content['cible']==""){ echo 'selected="selected"';} ?>>Même page</option>
  <option value="_target" <?php if($block_content['cible']=="_target"){ echo 'selected="selected"';} ?>>Nouvelle page</option>
</select>
</p>
<?php }elseif($Media_get=="Video"){ ?>

<p><label for="lien_media">Lien du media</label>
<input type="text" name="lien_video" id="lien_video" value="<?php echo reset(explode("?wmode", $block_content['lien_video'])); ?>"  />
</p>	
<p>
<label for="lien_media">Lecture automatique</label>
<input name="autoplay" type="checkbox" <?php if(substr(end(explode("autoplay=", $block_content['lien_video'])),0,1) == 1){echo 'checked="checked"';} ?>  value="1" />
</p>	
<p>
<label for="lien_media">Afficher la barre de contrôle</label>
<input name="controls" type="checkbox" <?php if(substr(end(explode("controls=", $block_content['lien_video'])),0,1) == 1){echo 'checked="checked"';} ?> value="1" />
</p>	
<p>
<label for="lien_media">Masquer automatiquement la barre de contrôle</label>
<input name="autohide" type="checkbox" <?php if(substr(end(explode("autohide=", $block_content['lien_video'])),0,1) == 1){echo 'checked="checked"';} ?> value="1" />
</p>	
<p>
<label for="lien_media">Lecture en boucle</label>
<input name="loop" type="checkbox" value="1" <?php if(substr(end(explode("loop=", $block_content['lien_video'])),0,1) == 1){echo 'checked="checked"';} ?> />
</p>
<p>
<label for="lien_media">Afficher la bare de titre</label>
<input name="showinfo" type="checkbox" value="1" <?php if(substr(end(explode("showinfo=", $block_content['lien_video'])),0,1) == 1){echo 'checked="checked"';} ?> />
</p>


<?php	}?>

<script language="javascript">
	$(document).ready(function(){
	
$('#bibliotheque').click(function(){
	$src = $("#div_bibliotheque_images iframe", window.parent.document).attr('src');
	$("#div_bibliotheque_images iframe", window.parent.document).attr('src',$src+'&idDiv=Media&idFram=contenu_texte&idShow=preview');
		$("#bibliotheque_images", window.parent.document).click();
	});
		
	});
	</script>
 
<p><input type="submit" name="envoyer" id="envoyer" value="Enregistrer" />
<input type="hidden" id="action" name="action" value="<?php echo $action; ?>" />
</p>
</form>
 
<?php }else{ echo '<p>Accès interdit. Vous devez vous connectez pour effectuer cette opération!</p>'; }?>