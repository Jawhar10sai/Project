<?php 


	$header = "SELECT r.*,c.id_reglages,c.id_site FROM reglages_block r,header c WHERE r.id_reglages = c.id_reglages AND c.id_site = '".$idsite."'";
	$req_header  = mysql_query($header ,$connect);
	$row_header  = mysql_fetch_assoc($req_header);
	$num_header  = mysql_num_rows($req_header);


if($num_header>0){
	do{
?>

   <style>
	
	#tout_header div.column_header div.dragbox_<?php echo $row_header["id_reglages"]; ?> div.dragbox-content
           {
		float : left;
			  <?php if($row_header['largeur'] != "0" && $row_header["unite_l"] == "px"){ ?>  
			  width:<?php echo ($row_header["largeur"]-($row_header["padding_left"]+$row_header["padding_right"])).$row_header["unite_l"]; ?>;<?php }else if($row_header['largeur'] != "0" && $row_header["unite_l"] != "px") {?>
			  width:<?php echo $row_header["largeur"].$row_header["unite_l"]; ?>;
			  <?php } ?>
			  
			  <?php if($row_header['hauteur'] != "0" && $row_header["unite_h"] == "px"){ ?>  
			  height:<?php echo ($row_header["hauteur"]-($row_header["padding_top"]+$row_header["padding_bottom"])).$row_header["unite_h"]; ?>;
			  <?php }else if($row_header['hauteur'] != "0" && $row_header["unite_h"] != "px") {?>
			  height:<?php echo $row_header["hauteur"].$row_header["unite_h"]; ?>;
			  <?php } ?>
			  
			 <?php if($row_header['marge_top'] != 0){ ?>   margin-top:<?php echo $row_header["marge_top"]; ?>px;<?php } ?>
			  <?php if($row_header['marge_bottom'] != 0){ ?>  margin-bottom:<?php echo $row_header["marge_bottom"]; ?>px;<?php } ?>
			  <?php if($row_header['marge_left'] != 0){ ?>  margin-left:<?php echo $row_header["marge_left"]; ?>px;<?php }else{ ?>margin-left:auto;
float : none;
<?php }?>
			  <?php if($row_header['marge_right'] != 0){ ?>  margin-right:<?php echo $row_header["marge_right"]; ?>px;<?php }else{ ?>margin-right:auto;
float : none;
<?php }?>

				<?php if($row_header['padding_top'] != 0){ ?>   padding-top:<?php echo $row_header["padding_top"]; ?>px;<?php } ?>
			  <?php if($row_header['padding_bottom'] != 0){ ?>  padding-bottom:<?php echo $row_header["padding_bottom"]; ?>px;<?php } ?>
			  <?php if($row_header['padding_left'] != 0){ ?>  padding-left:<?php echo $row_header["padding_left"]; ?>px;<?php }?>
			  <?php if($row_header['padding_right'] != 0){ ?>  padding-right:<?php echo $row_header["padding_right"]; ?>px;<?php }?>


			  <?php if($row_header['bordure'] != 0){ ?>  border:<?php echo $row_header["bordure"].'px '.$row_header["format_bordure"].' '.$row_header["couleur_b"]; ?>;<?php } ?>
			   <?php if($row_header["param"] == 1) { ?>
				background:<?php echo $row_header["couleur"]; ?>;
 <?php }else if($row_header["param"] == 2) { 
 $keywords3 = preg_split("/[\s,]+/", $row_header["degrade"]);?>
background-image: -webkit-linear-<?php echo $row_header["degrade"];?>;
background-image:    -moz-linear-<?php echo $row_header["degrade"];?>;
background-image:     -ms-linear-<?php echo $row_header["degrade"];?>;
background-image:      -o-linear-<?php echo $row_header["degrade"];?>;
background-image:         linear-<?php echo $row_header["degrade"];?>;

filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=<?php echo $keywords3[2]; ?>,endColorstr=<?php echo $keywords23[4]; ?>); 
zoom: 1;

 <?php }else if($row_header["param"] == 3) { ?>  
 <?php if($row_header["repeat_x"] == 0 && $row_header["repeat_y"] == 0){ ?>
 background:url(<?php echo $row_header['image']; ?>) no-repeat scroll left top transparent;
 <?php }else if($row_header["repeat_x"] == 1 && $row_header["repeat_y"] == 0){ ?>
 background:url(<?php echo $row_header['image']; ?>) repeat-x scroll left top transparent;
 <?php }else if($row_header["repeat_x"] == 0 && $row_header["repeat_y"] == 1){ ?>
 background:url(<?php echo $row_header['image']; ?>) repeat-y scroll left top transparent;
 <?php }else{ ?>
 background:url(<?php echo $row_header['image']; ?>) repeat scroll left top transparent;
 <?php } ?>
 
 <?php }else if($row_header["param"] == 4) { ?>  
 				background:Transparent;
 <?php } ?>
 <?php if($row_header['ombre'] == 1){ ?>
    -webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;
    -moz-box-shadow: 0px 1px 5px 0px #4a4a4a;
    box-shadow: 0px 1px 5px 0px #4a4a4a;

<?php } ?>
opacity:<?php echo $row_header["opacite"]/10; ?>;
color:<?php echo $row_header["couleur_texte"]; ?> !important;
			  
		   }
		#tout_header div.column_header div.dragbox_<?php echo $row_header["id_reglages"]; ?> div.dragbox-content div,#tout_header div.column_header div.dragbox_<?php echo $row_header["id_reglages"]; ?> div.dragbox-content div embed
           {
		/*float : left;*/
			  <?php if($row_header['largeur'] != "0" && $row_header["unite_l"] == "px"){ ?>  
			  width:<?php echo ($row_header["largeur"]-($row_header["padding_left"]+$row_header["padding_right"])).$row_header["unite_l"]; ?>;<?php }else if($row_header['largeur'] != "0" && $row_header["unite_l"] != "px") {?>
			  width:<?php echo $row_header["largeur"].$row_header["unite_l"]; ?>;
			  <?php } ?>
			  
			  <?php if($row_header['hauteur'] != "0" && $row_header["unite_h"] == "px"){ ?>  
			  height:<?php echo ($row_header["hauteur"]-($row_header["padding_top"]+$row_header["padding_bottom"])).$row_header["unite_h"]; ?>;
			  <?php }else if($row_header['hauteur'] != "0" && $row_header["unite_h"] != "px") {?>
			  height:<?php echo $row_header["hauteur"].$row_header["unite_h"]; ?>;
			  <?php } ?>
		   }
		   
		   
		   
		   
         
    </style>
    
    <?php 
	
	}while($row_header  = mysql_fetch_assoc($req_header));
	} 
	
	//echo 'style_layout : '.$row_style_layout['style_layout'];
	
	?>
    
   