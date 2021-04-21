<?php include_once('../../config/connect.php'); ?>
    <script src="js/jquery.js"></script>
<?php
$id_page = $_GET['idpage'];
$id_block = $_GET['block'];
$idsite = $_GET['idsite'];
$id_param = $_GET['id_param'];
$date = date("Y-m-d H:i:s");



if(isset($_POST["action"]) && $_POST["action"] == 'add'){
	
	/*listage du repertoire */
    $slider = "SELECT contenu FROM contenu WHERE id_page = '".$id_page."' AND id_block = '".$id_block."'";
	$req_slider  = mysql_query($slider ,$connect);
	$row_slider = mysql_fetch_assoc($req_slider);
	$num_slider = mysql_num_rows($req_slider);
	
	
	if($num_slider > 0){
		
		$id = str_replace("Slider_#","",$row_slider['contenu']);
		
		
		/*listage du repertoire */
    $slider2 = "SELECT * FROM slider_bloc WHERE id_page = '".$id_page."' AND id_bloc = '".$id_block."' AND id_param = '".$id_param."'";
	$req_slider2  = mysql_query($slider2 ,$connect);
	$row_slider2 = mysql_fetch_assoc($req_slider2);
	$num_slider2 = mysql_num_rows($req_slider2);
		
		 // Initialize the size of the output image
		
		$quality = 100;
		
		if($num_slider2 > 0){
			do{
        // Set the source image path
       	$image = $row_slider2["images"];
		$src_path = "../../uploads/site_".$idsite."/images/".end(explode("images/", $image));
		$Image2 = "../../uploads/site_".$idsite."/slider_bloc/min/".end(explode("/", $src_path));
		$ext = end(explode(".",strip_tags($src_path)));
        // Create a new image from the source image path
		
		
		
		
		
		
		if ($ext=="png" || $ext=="PNG"){
		$src_image = imagecreatefrompng($src_path);
		}elseif($ext=="gif" || $ext=="GIF"){
		$src_image = imagecreatefromgif($src_path);
		}else{
		$src_image = imagecreatefromjpeg($src_path);
		}
		
 if($_POST["width_slider"] != 0 && $_POST["height_slider"] != 0){
        $dst_w = $_POST["width_slider"];
        $dst_h = $_POST["height_slider"];
		 }else{
		
        $dst_w = imagesx($src_image);
       $dst_h = imagesy($src_image);
			 }
        // Create the output image as a true color image at the specified size
        $dst_image = imagecreatetruecolor($dst_w, $dst_h);
		if ($ext=="png" || $ext=="PNG"){
		imagealphablending($dst_image,false);
		imagesavealpha($dst_image,true);
		}
        // Copy and resize part of the source image with resampling to the
        // output image
        imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $dst_w, $dst_h);

        // Destroy the source image
        //imagedestroy($src_image);

        // Send a raw HTTP header
       // header('Content-type: image/jpeg');

        // Output the image to browser
		if ($ext=="png" || $ext=="PNG"){
	imagepng($dst_image,$Image2);
		}elseif($ext=="gif" || $ext=="GIF"){
			//header('Content-type: image/gif');
			imagegif($dst_image,$Image2);
		}else{
			//header('Content-type: image/jpeg');
			imagejpeg($dst_image,$Image2);
		}
		
		
}while($row_slider2 = mysql_fetch_assoc($req_slider2));
		}
		
		$query_content = "update parametres_slider_bloc set transition='".$_POST["transition"]."',width_slider='".$_POST["width_slider"]."',height_slider='".$_POST["height_slider"]."',delay = '".$_POST["delay"]."',transitionDuration = '".$_POST["transitionDuration"]."' where id='".$id."'";
			mysql_query($query_content);
		
			?>
            <script language="javascript">
			
			window.parent.document.location.reload();
			
			</script>
            
			
		
		<?php
		echo 'Modification effectué avec succès';
		?>
		<script language="javascript">
		
		window.parent.document.location.reload();
		</script>
		<?php exit();
	}else{
	
	$query_slider = "INSERT INTO parametres_slider_bloc (id,transition,width_slider,height_slider,delay,transitionDuration)
				VALUES(
				'',
				'".$_POST["transition"]."',
				'".$_POST["width_slider"]."',
				'".$_POST["height_slider"]."',
				'".$_POST["delay"]."',
				'".$_POST["transitionDuration"]."')";
			mysql_query($query_slider);
			$id_param = mysql_insert_id();
			
			
		/*listage du repertoire */
    $slider2 = "SELECT * FROM slider_bloc WHERE id_page = '".$id_page."' AND id_bloc = '".$id_block."' AND id_param = '".$id_param."'";
	$req_slider2  = mysql_query($slider2 ,$connect);
	$row_slider2 = mysql_fetch_assoc($req_slider2);
	$num_slider2 = mysql_num_rows($req_slider2);
		
		 // Initialize the size of the output image
		$quality = 100;
		
		if($num_slider2 > 0){
do{
        // Set the source image path
       $src_path = "../../uploads/site_".$idsite."/slider_bloc/".$row_slider2["images"];
		$Image2 = "../../uploads/site_".$idsite."/slider_bloc/min/".$row_slider2["images"];
		$ext = end(explode(".",strip_tags($src_path)));
        // Create a new image from the source image path
		
		if ($ext=="png" || $ext=="PNG"){
		$src_image = imagecreatefrompng($src_path);
		}elseif($ext=="gif" || $ext=="GIF"){
		$src_image = imagecreatefromgif($src_path);
		}else{
		$src_image = imagecreatefromjpeg($src_path);
		}
		
		
		 if($_POST["width_slider"] != 0 && $_POST["height_slider"] != 0){
        $dst_w = $_POST["width_slider"];
        $dst_h = $_POST["height_slider"];
		 }else{
		
        $dst_w = imagesx($src_path);
        $dst_h = imagesy($src_path);
			 }

        // Create the output image as a true color image at the specified size
        $dst_image = imagecreatetruecolor($dst_w, $dst_h);
if ($ext=="png" || $ext=="PNG"){
		imagealphablending($dst_image,false);
		imagesavealpha($dst_image,true);
		}
        // Copy and resize part of the source image with resampling to the
        // output image
        imagecopyresampled($dst_image, $src_image, 0, 0, 0,0, $dst_w, $dst_h, $dst_w, $dst_h);

        // Destroy the source image
        //imagedestroy($src_image);

        // Send a raw HTTP header
       // header('Content-type: image/jpeg');

        // Output the image to browser
		if ($ext=="png" || $ext=="PNG"){
	imagepng($dst_image,$Image2);
		}elseif($ext=="gif" || $ext=="GIF"){
			//header('Content-type: image/gif');
			imagegif($dst_image,$Image2);
		}else{
			//header('Content-type: image/jpeg');
			imagejpeg($dst_image,$Image2);
		}
		
		
}while($row_slider2 = mysql_fetch_assoc($req_slider2));
		}
	
	$query_contenu = "INSERT INTO contenu (id,id_page,id_block,date,contenu,media,Lien,type,positionnement)
				VALUES(
				'',
				'".$id_page."',
				'".$id_block."',
				'".$date."',
				'Slider_#".$id_param."',
				'',
				'',
				'Slider',
				'0')";
			mysql_query($query_contenu);
			
		$query_content2 = "update slider_bloc set id_param = '".$id_param."' WHERE id_page='".$id_page."' AND id_bloc = '".$id_block."'";
			mysql_query($query_content2);
			
		
			
			?>		
				
				
                <script language="javascript">
				
				$new_contenu = '<div id="<?php echo $id_block; ?>" class="dragbox" style="display:none;"><h2><?php echo $id_block; ?><div class="configure" style="visibility: hidden;"><span src="<iframe src=\'modules/block/param_block.php?id_block=<?php echo $id_block; ?>&id_page=<?php echo $id_page; ?>\' width=\'600\' height=\'600\' frameborder=\'0\'></iframe>" class="osx"><img width="18" height="18" class="osx" title="R&eacute;glages" alt="R&eacute;glages" src="images/icons/reglages_block.png"></span> <span class="osx" src="<iframe src=\'content.php?idpage=<?php echo $id_page; ?>&block=<?php echo $id_block; ?>&action=edit&Media=Slider\' width=\'650\' height=\'600\' frameborder=\'0\'></iframe>"><img width="18" height="18" title="Propri&eacute;t&eacute;s du contenu" alt="Propri&eacute;t&eacute;s du contenu" src="images/icons/propriete_contenu.png"></span> <span class="delete"><img width="18" height="18" title="Suprimer" alt="Suprimer" src="images/icons/suprimer_block.png"></span></div></h2><div class="dragbox-content"><iframe id="TB_window" src="modules/slider_bloc/slider.php?idpage=<?php echo $id_page; ?>&idbloc=<?php echo $id_block; ?>&id=<?php echo $id_param; ?>&action=modif" frameborder="0" style="width:100%; min-height:200px; margin:0; padding:0;"></iframe></div></div>';
				
				
			//alert($("#tout", window.parent.document).html());
								
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
			$.post("../../updateDB.php", order, function(theResponse){
			window.parent.document.location.reload();
			});
				
		
				
			</script>
                
                <?php
			exit();
	}
	}

/*listage du repertoire */
    $slider = "SELECT * FROM slider_bloc WHERE id_page = '".$id_page."' AND id_bloc = '".$id_block."' AND id_param = '".$id_param."'";
	$req_slider  = mysql_query($slider ,$connect);
	$row_slider = mysql_fetch_assoc($req_slider);
	$num_slider = mysql_num_rows($req_slider);

/*listage du parametre */
    $transition = "SELECT * FROM parametres_slider_bloc WHERE id = '".$id_param."'";
	$req_transition  = mysql_query($transition ,$connect);
	$row_transition = mysql_fetch_assoc($req_transition);
	$num_transition = mysql_num_rows($req_transition);

?>

<!doctype html>
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/refineslide.css" />
	<link rel="stylesheet" href="css/refineslide-theme-dark.css" />

    <script src="js/modernizr.js"></script>

    <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

    <div class="group section-wrap upper" id="upper">
    
    <?php if($num_slider > 0){ ?>
        <div class="wrap group">
            <div class="section-1">
                <ul class="translist group">
                    <li><a href="#_fade" class="button">Fade</a></li>
                    <li><a href="#_random" class="button">Random</a></li>
                    <li><a href="#_sliceH" class="button">Slice horizontal</a></li>
                    <li><a href="#_sliceV" class="button">Slice vertical</a></li>
                    <li><a href="#_slideH" class="button">Slide horizontal</a></li>
                    <li><a href="#_slideV" class="button">Slide vertical</a></li>
                    <li><a href="#_scale" class="button">Scale</a></li>
                    <li><a href="#_fan" class="button">Fan</a></li>
                    <li><a href="#_blockScale" class="button">Block scale</a></li>
                    <li><a href="#_kaleidoscope" class="button">Kaleidoscope</a></li>
                    <li><a href="#_blindH" class="button">Blind horizontal</a></li>
                    <li><a href="#_blindV" class="button">Blind Vertical</a></li>
                    <li><a href="#_cubeH" class="button">Cube horizontal</a></li>
                    <li><a href="#_cubeV" class="button">Cube vertical</a></li>
                </ul>
            </div> <!-- /.section-1 -->

            <div class="section-2 group">
				<ul id="images" class="rs-slider">
                
                <?php 
				
				do{  ?>
          
				    <li class="group"><img src="<?php echo "../../uploads/site_".$idsite."/slider_bloc/min/".end(explode("/", $row_slider["images"])); ?>" alt="" /></li>
            
            
        <?php }while($row_slider = mysql_fetch_assoc($req_slider));
				
				?>
                
				   
				</ul>
            </div> <!-- /.section-2 -->
        </div> <!-- /.wrap -->
        
        <?php }else{  ?>
	<style>
	a.back{border: 1px solid #AAAAAA;
    cursor: pointer;
    float: left;
    padding: 4px;
    text-decoration: none;
	color:#AAAAAA;
	font-weight:bold;}
</style>
Vous devez definir vos images d'abord <a href="../../uploadeur_slider_bloc.php?idpage=<?php echo $id_page; ?>&idbloc=<?php echo $id_block; ?>&idsite=<?php echo $idsite; ?>" class="back">Retour</a>	
		
<?php		 } ?>
    </div> <!-- /#upper -->
<form action="" method="post" name="form">
<?php if($num_transition > 0){
?>	
	
                <input type="hidden" name="transition" id="transition" value="<?php echo $row_transition['transition']; ?>" />
<?php	}else{ ?> 
                <input type="hidden" name="transition" id="transition" value="random" />
                <?php	}?>
                
                <label for="Titre"><span><strong>Largeur du slider</strong></span>
      <input class="validate[required] text-input text" type="text" name="width_slider" id="width_slider" value="<?php echo utf8_encode($row_transition['width_slider']) ?>" />
    </label>
	<label for="Titre"><span><strong>Hauteur du slider</strong></span>
      <input class="validate[required] text-input text" type="text" name="height_slider" id="height_slider" value="<?php echo utf8_encode($row_transition['height_slider']) ?>" />
    </label>
    
    
                <label for="Titre"><span><strong><br>
                Durée d'affichage (sec)</strong></span>
                  <input class="validate[required] text-input text" type="text" name="delay" id="delay" value="<?php echo utf8_encode($row_transition['delay']) ?>" />
  </label>
	<label for="Titre"><span><strong>Délais de transition (sec)</strong></span>
      <input class="validate[required] text-input text" type="text" name="transitionDuration" id="transitionDuration" value="<?php echo utf8_encode($row_transition['transitionDuration']) ?>" />
</label>
                <input name="" type="submit" value="Valider">
                <input type="hidden" name="action" id="action" value="add" />
                
</form>

    <script src="js/jquery.refineslide.min.js"></script>
    <script src="js/ios-orientation-change-fix.js"></script>
    <script src="js/footer.js"></script>
</body>
</html>