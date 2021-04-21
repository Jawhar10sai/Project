<?php 


	$fouter = "SELECT r.*,c.id_reglages,c.id_site FROM reglages_block r,footer c WHERE r.id_reglages = c.id_reglages AND c.id_site = '".$idsite."'";
	$req_fouter  = mysql_query($fouter ,$connect);
	$row_fouter  = mysql_fetch_assoc($req_fouter);
	$num_fouter  = mysql_num_rows($req_fouter);


if($num_fouter>0){
	do{
?>

   <style>
	
	#tout_footer div.column_footer div.dragbox_<?php echo $row_fouter["id_reglages"]; ?> div.dragbox-content
           {
		float : left;
			  <?php if($row_fouter['largeur'] != "0" && $row_fouter["unite_l"] == "px"){ ?>  
			  width:<?php echo ($row_fouter["largeur"]-($row_fouter["padding_left"]+$row_fouter["padding_right"])).$row_fouter["unite_l"]; ?>;<?php }else if($row_fouter['largeur'] != "0" && $row_fouter["unite_l"] != "px") {?>
			  width:<?php echo $row_fouter["largeur"].$row_fouter["unite_l"]; ?>;
			  <?php } ?>
			  
			  <?php if($row_fouter['hauteur'] != "0" && $row_fouter["unite_h"] == "px"){ ?>  
			  height:<?php echo ($row_fouter["hauteur"]-($row_fouter["padding_top"]+$row_fouter["padding_bottom"])).$row_fouter["unite_h"]; ?>;
			  <?php }else if($row_fouter['hauteur'] != "0" && $row_fouter["unite_h"] != "px") {?>
			  height:<?php echo $row_fouter["hauteur"].$row_fouter["unite_h"]; ?>;
			  <?php } ?>
			  
			 <?php if($row_fouter['marge_top'] != 0){ ?>   margin-top:<?php echo $row_fouter["marge_top"]; ?>px;<?php } ?>
			  <?php if($row_fouter['marge_bottom'] != 0){ ?>  margin-bottom:<?php echo $row_fouter["marge_bottom"]; ?>px;<?php } ?>
			  <?php if($row_fouter['marge_left'] != 0){ ?>  margin-left:<?php echo $row_fouter["marge_left"]; ?>px;<?php }else{ ?>margin-left:auto;
float : none;
<?php }?>
			  <?php if($row_fouter['marge_right'] != 0){ ?>  margin-right:<?php echo $row_fouter["marge_right"]; ?>px;<?php }else{ ?>margin-right:auto;
float : none;
<?php }?>

				<?php if($row_fouter['padding_top'] != 0){ ?>   padding-top:<?php echo $row_fouter["padding_top"]; ?>px;<?php } ?>
			  <?php if($row_fouter['padding_bottom'] != 0){ ?>  padding-bottom:<?php echo $row_fouter["padding_bottom"]; ?>px;<?php } ?>
			  <?php if($row_fouter['padding_left'] != 0){ ?>  padding-left:<?php echo $row_fouter["padding_left"]; ?>px;<?php }?>
			  <?php if($row_fouter['padding_right'] != 0){ ?>  padding-right:<?php echo $row_fouter["padding_right"]; ?>px;<?php }?>


			  <?php if($row_fouter['bordure'] != 0){ ?>  border:<?php echo $row_fouter["bordure"].'px '.$row_fouter["format_bordure"].' '.$row_fouter["couleur_b"]; ?>;<?php } ?>
			   <?php if($row_fouter["param"] == 1) { ?>
				background:<?php echo $row_fouter["couleur"]; ?>;
 <?php }else if($row_fouter["param"] == 2) { 
 $keywords3 = preg_split("/[\s,]+/", $row_fouter["degrade"]);?>
background-image: -webkit-linear-<?php echo $row_fouter["degrade"];?>;
background-image:    -moz-linear-<?php echo $row_fouter["degrade"];?>;
background-image:     -ms-linear-<?php echo $row_fouter["degrade"];?>;
background-image:      -o-linear-<?php echo $row_fouter["degrade"];?>;
background-image:         linear-<?php echo $row_fouter["degrade"];?>;

filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=<?php echo $keywords3[2]; ?>,endColorstr=<?php echo $keywords23[4]; ?>); 
zoom: 1;

 <?php }else if($row_fouter["param"] == 3) { ?>  
 <?php if($row_fouter["repeat_x"] == 0 && $row_fouter["repeat_y"] == 0){ ?>
 background:url(<?php echo $row_fouter['image']; ?>) no-repeat scroll left top transparent;
 <?php }else if($row_fouter["repeat_x"] == 1 && $row_fouter["repeat_y"] == 0){ ?>
 background:url(<?php echo $row_fouter['image']; ?>) repeat-x scroll left top transparent;
 <?php }else if($row_fouter["repeat_x"] == 0 && $row_fouter["repeat_y"] == 1){ ?>
 background:url(<?php echo $row_fouter['image']; ?>) repeat-y scroll left top transparent;
 <?php }else{ ?>
 background:url(<?php echo $row_fouter['image']; ?>) repeat scroll left top transparent;
 <?php } ?>
 
 <?php }else if($row_fouter["param"] == 4) { ?>  
 				background:Transparent;
 <?php } ?>
 <?php if($row_fouter['ombre'] == 1){ ?>
    -webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;
    -moz-box-shadow: 0px 1px 5px 0px #4a4a4a;
    box-shadow: 0px 1px 5px 0px #4a4a4a;

<?php } ?>
 <?php if($row_fouter['fixe'] == 1){ ?>
 position : fixed !important;
 bottom: 0 !important;

<?php } ?>
opacity:<?php echo $row_fouter["opacite"]/10; ?>;
color:<?php echo $row_fouter["couleur_texte"]; ?> !important;
			  
		   }
		#tout_footer div.column_footer div.dragbox_<?php echo $row_fouter["id_reglages"]; ?> div.dragbox-content div,#tout_footer div.column_footer div.dragbox_<?php echo $row_fouter["id_reglages"]; ?> div.dragbox-content div embed
           {
		/*float : left;*/
			  <?php if($row_fouter['largeur'] != "0" && $row_fouter["unite_l"] == "px"){ ?>  
			  width:<?php echo ($row_fouter["largeur"]-($row_fouter["padding_left"]+$row_fouter["padding_right"])).$row_fouter["unite_l"]; ?>;<?php }else if($row_fouter['largeur'] != "0" && $row_fouter["unite_l"] != "px") {?>
			  width:<?php echo $row_fouter["largeur"].$row_fouter["unite_l"]; ?>;
			  <?php } ?>
			  
			  <?php if($row_fouter['hauteur'] != "0" && $row_fouter["unite_h"] == "px"){ ?>  
			  height:<?php echo ($row_fouter["hauteur"]-($row_fouter["padding_top"]+$row_fouter["padding_bottom"])).$row_fouter["unite_h"]; ?>;
			  <?php }else if($row_fouter['hauteur'] != "0" && $row_fouter["unite_h"] != "px") {?>
			  height:<?php echo $row_fouter["hauteur"].$row_fouter["unite_h"]; ?>;
			  <?php } ?>
		   }
		   
		   
		   
		   
         
    </style>
    
    <?php 
	
	}while($row_fouter  = mysql_fetch_assoc($req_fouter));
	} 
	
	//echo 'style_layout : '.$row_style_layout['style_layout'];
	
	?>
    
   